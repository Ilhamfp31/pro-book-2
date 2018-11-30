<?php

class Token extends Model
{
    function insertToken($id, $token){   
        $sql = "DELETE FROM access_token WHERE id = '" . $id . "'";   
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $this->conn->query($sql) ;

        $sql = "INSERT INTO access_token(id, token, browser, ip_address, time) VALUE("
                .  "" . $id . ", "
                .  "'" . $token . "', "
                .  "'" . $browser . "', "
                .  "'" . $ip_address . "', "
                .  "" . (time()+(int)1200) . ")";

        return $this->conn->query($sql);    
    }

    function validateToken($token){
        $sql = "SELECT * FROM access_token WHERE token = '" . $token . "';" ;
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $result = $this->conn->query($sql)->fetch_assoc();
        if ($result['id'] && $result['browser'] == $browser && $result['ip_address'] == $ip_address && time() < (int)$result['time']) {
            $sql = "UPDATE access_token SET time = " . (time() + (int)1200) . " WHERE token = '" . $token . "';" ;
            $this->conn->query($sql);
            return $result['id'];
        } else {
            return null;
        }
    }

    function deleteToken($token){
        $sql = "DELETE FROM access_token WHERE token = '" . $token . "'";   
        return $this->conn->query($sql);
    }

}