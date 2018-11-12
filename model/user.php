<?php  

require_once('database.php');

class User  {
 
    public static function getUserLogin($username, $password) {
    	try {
	        $conn = Database::establishConnection();
	        if ($conn != NULL) {
	            $stmt = $conn -> prepare('SELECT * FROM users WHERE username = ? AND password = ?');
	            $stmt -> execute([$username, $password]);
	            $user = $stmt->fetch(PDO::FETCH_ASSOC);

                unset($user["password"]);

	            $stmt = NULL;
	            $conn = NULL;
	        }

        	return $user;
	     } catch (PDOException $e) {
	     	return NULL;
	     }
    }

    public static function getUserById($id) {
        try {
            $conn = Database::establishConnection();
            if ($conn != NULL) {
                $stmt = $conn -> prepare('SELECT * FROM users WHERE id = ?');
                $stmt -> execute([$id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                unset($user["password"]);

                $stmt = NULL;
                $conn = NULL;
            }

            return $user;
         } catch (PDOException $e) {
            return NULL;
         }
    }

    public static function isEmailExist($email) {
    	try {
    		$conn = Database::establishConnection();
    		if ($conn != NULL) {
    			$stmt = $conn -> prepare('SELECT id FROM users WHERE email = ?');
    			$stmt -> execute([$email]);

    			if ($stmt->rowCount() > 0) {
    				$stmt = NULL;
    				$conn = NULL;

    				return TRUE;
    			}
    			$stmt = NULL;
				$conn = NULL;

				return FALSE;
    		}
    	} catch (PDOException $e) {
    		return FALSE;
    	}
    }

    public static function isUsernameExist($username) {
    	try {
    		$conn = Database::establishConnection();
    		if ($conn != NULL) {
    			$stmt = $conn -> prepare('SELECT id FROM users WHERE username = ?');
    			$stmt -> execute([$username]);

    			if ($stmt->rowCount() > 0) {
    				$stmt = NULL;
    				$conn = NULL;

    				return TRUE;
    			}
    			$stmt = NULL;
				$conn = NULL;

				return FALSE;
    		}
    	} catch (PDOException $e) {
    		return FALSE;
    	}
    }

    public static function createUser($data) {
    	try {
	    	$conn = Database::establishConnection();
	    	if ($conn != NULL) {
				$stmt = $conn -> prepare('INSERT INTO users(name, username, password, email, address, phone_num, profile_pic) VALUES(?,?,?,?,?,?,?)');
		        $stmt -> execute([$data["name"], $data["username"], $data["password"], $data["email"], $data["address"], $data["phone_num"], $data["profile_pic"]]);
		        
		        $stmt = $conn -> prepare('SELECT * FROM users WHERE id = LAST_INSERT_ID()');
		        $stmt -> execute();
		        $user = $stmt->fetch(PDO::FETCH_ASSOC);

		        $stmt = NULL;
	            $conn = NULL;
		    }

    		return $user;
		} catch (PDOException $e) {
			return $e;
		}  	
    }

    public static function updateUser($data) {
    	try {
    		$conn = Database::establishConnection();
    		if ($conn != NULL) {
                $stmt = $conn -> prepare('SELECT name, address, phone_num, profile_pic FROM users WHERE id = ?');
                $stmt -> execute([$data["id"]]);
                $user = $stmt -> fetch(PDO::FETCH_ASSOC);

                if (!isset($data["name"])) {
                    $data["name"] = $user["name"];
                }

                if (!isset($data["address"])) {
                    $data["address"] = $user["address"];
                }

                if (!isset($data["phone_num"])) {
                    $data["phone_num"] = $user["phone_num"];
                }

                if (!isset($data["profile_pic"])) {
                    $data["profile_pic"] = $user["profile_pic"];
                }

    			$stmt = $conn -> prepare('UPDATE users SET name = ?, address = ?, phone_num = ?, profile_pic = ? WHERE id = ?');
		        $stmt -> execute([$data["name"], $data["address"], $data["phone_num"], $data["profile_pic"], $data["id"]]);

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
    			$stmt = $conn -> prepare('DELETE FROM users WHERE id = ?');
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