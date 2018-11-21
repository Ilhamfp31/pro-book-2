<?php

class User extends Model
{
    function readUserByUsername($username) 
    {
        $sql = "SELECT * FROM user WHERE username = '" . $username . "'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    function readUserIdByUsername($username) 
    {
        $sql = "SELECT userID FROM user WHERE username = '" . $username . "'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    function readUserById($id) 
    {
        $sql = "SELECT * FROM user WHERE userID = " . $id;
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    function readUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email = '" . $email . "'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    function createUser($user)
    {
        $sql = "INSERT INTO user(name, username, address, password, email, phone) VALUE(" .
           "'" . $user["name"] . "', '" . $user["username"] . "', '" . $user["address"] . 
           "', '" . $user["password"] . "', '" . $user["email"] . "', '" . $user["phone"] . "')";     
        
        return $this->conn->query($sql);      
    }

    function updateUserById($user){
        $sql = "UPDATE user 
                SET name = '" . $user['name'] . "', address = '" . $user['address'] . "', phone = '" . $user['phone'] . "', userPicture = '" . $user['userPicture'] . "' WHERE userID = " . $user['id'];

        return $this->conn->query($sql);
    }
}