<?php  

require_once('database.php');

class Book {
    static function getBookById($id) {
        try {
            $conn = Database::establishConnection();

            if ($conn != NULL) {
                $statement = $conn->prepare('SELECT * FROM books WHERE id = ?');
                $statement->execute([$id]);
                $book = $statement->fetch(PDO::FETCH_ASSOC);

                $conn = NULL;
                $statement = NULL;
            }

            return $book;
        } catch (PDOException $e) {
            return NULL;
        }
    }

    static function getBooksByTitle($title) {
        try {
            $conn = Database::establishConnection();

            if ($conn != NULL) {
                $query = 'SELECT books.id, books.title, books.synopsis, books.author, books.pic, books.avg_rating, IFNULL(COUNT(reviews.id),0) AS number_of_reviews FROM books LEFT JOIN reviews ON(reviews.book_id = books.id)  WHERE LOWER(books.title) 
                    LIKE \'%' . $title . '%\' GROUP BY books.id;';
                $statement = $conn->prepare($query);
                $statement->execute();
                $books = $statement->fetchAll(PDO::FETCH_ASSOC);

                $conn = NULL;
                $statement = NULL;
            }

            return $books;
        } catch (PDOException $e) {
            return NULL;
        }
    }

    static function createBook($data) {
        try {
            $conn = Database::establishConnection();

            if ($conn != NULL) {
                $statement = $conn->prepare('INSERT INTO books(title, synopsis, author, avg_rating) VALUES(?,?,?,?,?)');
                $statement->execute([$data["title"], $data["synopsis"], $data["author"], 0]);

                $conn = NULL;
                $statement = NULL;

                return TRUE;
            }

            return FALSE;
        } catch (PDOException $e) {
            return FALSE;
        }
    }

    static function deleteBook($id) {
        try {
            $conn = Database::establishConnection();

            if ($conn != NULL) {
                $statement = $conn->prepare('DELETE FROM books WHERE id = ?');
                $statement->execute([$id]);

                $conn = NULL;
                $statement = NULL;

                return TRUE;
            }

            return FALSE;
        } catch (PDOException $e) {
            return FALSE;
        }
    }

    static function updateBookRating($id) {
        try {
            $conn = Database::establishConnection();

            if ($conn != NULL) {
                $stmt = $conn -> prepare('UPDATE books SET books.avg_rating = IFNULL((SELECT AVG(rating) FROM reviews WHERE reviews.book_id = ? GROUP BY reviews.book_id), 0) WHERE books.id = ?');
                $stmt -> execute([$id, $id]);

                $conn = NULL;
                $stmt = NULL;

                return TRUE;
            }

            return FALSE;
        } catch (PDOException $e) {
            return FALSE;
        }
    }
}


?>