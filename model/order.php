<?php  

require_once('database.php');

class Order {
    
    public static function getOrderByID($id) {
        try {
            $conn = Database::establishConnection();
            if ($conn != NULL) {
                $stmt = $conn -> prepare('SELECT * FROM orders WHERE id = ?');
                $stmt -> execute($id);
                $order = $stmt -> fetch(PDO::FETCH_ASSOC);

                $stmt = NULL;
                $conn = NULL;
            }

            return $order;
         } catch (PDOException $e) {
            return NULL;
         }
    }

    public static function getOrderByUser($user_id) {
        try {
            $conn = Database::establishConnection();
            if ($conn != NULL) {
                $stmt = $conn -> prepare('SELECT * FROM orders WHERE user_id = ?');
                $stmt -> execute($user_id);
                $orders = $stmt -> fetchAll(PDO::FETCH_ASSOC);

                $stmt = NULL;
                $order = NULL;
            }

            return $orders;
        } catch (PDOException $p) {
            return NULL;
        }
    }

    public static function getHistoryByUser($user_id) {
        try {
            $conn = Database::establishConnection();
            if ($conn != NULL) {
                $stmt = $conn -> prepare('SELECT books.id as book_id, books.title, books.pic, orders.quantity, orders.timestamp, orders.id AS order_id, (CASE WHEN reviews.id IS NULL THEN 0 ELSE 1 END) AS is_reviewed FROM (orders LEFT JOIN reviews ON orders.user_id = reviews.user_id AND orders.book_id = reviews.book_id) JOIN books ON books.id = orders.book_id WHERE orders.user_id = ? ORDER BY orders.timestamp DESC');
                $stmt -> execute([$user_id]);
                $history = $stmt -> fetchAll(PDO::FETCH_ASSOC);

                $stmt = NULL;
                $conn = NULL;
            }

            return $history;
        } catch (PDOException $p) {
            return NULL;
        }
    }

    public static function createOrder($data) {
        try {
            $conn = Database::establishConnection();
            if ($conn != NULL) {
                $stmt = $conn -> prepare('INSERT INTO orders(user_id, book_id, quantity) VALUES (?,?,?)');
                $stmt -> execute([$data["user_id"], $data["book_id"], $data["quantity"]]);
                
                $stmt = $conn -> prepare('SELECT * FROM orders WHERE id = LAST_INSERT_ID()');
                $stmt -> execute();
                $order = $stmt -> fetch(PDO::FETCH_ASSOC);

                $stmt = NULL;
                $conn = NULL;
            }

            return $order;
        } catch (PDOException $e) {
            return NULL;
        }   
    }

    public static function updateOrder($data) {
        try {
            $conn = Database::establishConnection();
            if ($conn != NULL) {
                $stmt = $conn -> prepare('UPDATE orders SET user_id = ?, book_id = ?, quantity = ? WHERE id = ?');
                $stmt -> execute([$data["user_id"], $data["book_id"], $data["quantity"], $data["id"]]);

                $stmt = NULL;
                $conn = NULL;

                return TRUE;
            }

            return FALSE;
        } catch (PDOException $e) {
            return FALSE;
        }
    }

    public static function deleteOrder($id) {
        try {
            $conn = Database::establishConnection();
            if ($conn != NULL) {
                $stmt = $conn -> prepare('DELETE FROM orders WHERE id = ?');
                $stmt -> execute([$id]);

                $stmt = NULL;
                $conn = NULL;

                return TRUE;
            }

            return FALSE;
        } catch (PDOException $e) {
            return FALSE;
        }
    }

}

?>