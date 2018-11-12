<?php  

require_once('database.php');

class Review {
    
    public static function getReviewByTitle($title){
    	try {
	        $conn = Database::establishConnection();
	        if ($conn != NULL) {
	            $stmt = $conn -> prepare('SELECT users.username, reviews.id, books.title, reviews.message, reviews.rating FROM reviews JOIN users ON reviews.user_id = users.id JOIN books ON reviews.books_id = books.id WHERE books.title = ?');
	            $stmt -> execute([$title]);
	            $review = $stmt->fetchAll(PDO::FETCH_ASSOC);

	            $stmt = NULL;
	            $conn = NULL;
	        }

        	return $review;
	     } catch (PDOException $e) {
	     	return NULL;
	     }
    }

    public static function checkReview($data){
    	try {
    		$conn = Database::establishConnection();
    		if ($conn != NULL) {
    			$stmt = $conn -> prepare('SELECT id FROM orders WHERE book_id = ? AND user_id = ?');
    			$stmt -> execute([$data["book_id"], $data["user_id"]]);

    			if ($stmt->rowCount() > 0) {
    				$stmt = NULL;
    				$stmt2 = $conn -> prepare('SELECT id FROM reviews WHERE book_id = ? AND user_id = ?');
    				$stmt2 -> execute([$data["book_id"], $data["user_id"]]);
    				if($stmt2->rowCount() === 0){
    					$stmt2 = NULL;
    					$conn = NULL;
    					return TRUE;
    				} else{
    					$stmt2 = NULL;
    					$conn = NULL;
    					return FALSE;
    				}
    			}
    			$stmt = NULL;
				$conn = NULL;

				return FALSE;
    		}
    	} catch (PDOException $e) {
    		return FALSE;	
    	}
    }

    public static function getReviewByBookId($id) {
        try {
            $conn = Database::establishConnection();
            if ($conn != NULL) {
                $stmt = $conn -> prepare('SELECT users.username, reviews.id, reviews.message, reviews.rating, users.profile_pic FROM reviews JOIN users ON reviews.user_id = users.id JOIN books ON reviews.book_id = books.id WHERE books.id = ?');
                $stmt -> execute([$id]);
                $review = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $stmt = NULL;
                $conn = NULL;
            }

            return $review;
         } catch (PDOException $e) {
            return NULL;
         }
    }

    public static function createReview($data) {
    	try {
	    	$conn = Database::establishConnection();
	    	if ($conn != NULL) {
				$stmt = $conn -> prepare('INSERT INTO reviews(book_id, user_id, message, rating) VALUES(?,?,?,?)');
		        $stmt -> execute([$data["book_id"], $data["user_id"], $data["message"], $data["rating"]]);
		        
		        $stmt = $conn -> prepare('SELECT * FROM reviews WHERE id = LAST_INSERT_ID()');
		        $stmt -> execute();
		        $review = $stmt->fetch(PDO::FETCH_ASSOC);

		        $stmt = NULL;
	            $conn = NULL;
		    }

    		return $review;
		} catch (PDOException $e) {
			return NULL;
		}  
    }

    public static function updateReview($data) {
    	try {
    		$conn = Database::establishConnection();
    		if ($conn != NULL) {
    			$stmt = $conn -> prepare('UPDATE reviews SET books_id = ?, user_id = ?, message = ?, rating = ? WHERE id = ?');
		        $stmt -> execute([$data["books_id"], $data["user_id"], $data["message"], 
		        	$data["rating"]]);

		        $stmt = NULL;
	            $conn = NULL;

	            return TRUE;
    		}

    		return FALSE;
    	} catch (PDOException $e) {
    		return FALSE;
    	}
    }

    public static function deleteUser($id) {
    	try {
    		$conn = Database::establishConnection();
    		if ($conn != NULL) {
    			$stmt = $conn -> prepare('DELETE FROM reviews WHERE id = ?');
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