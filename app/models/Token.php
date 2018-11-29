<?php

class Token extends Model
{
    function insertToken($id, $token, $browser, $ip_address){   
        $sql = "DELETE FROM access_token WHERE id = '" . $id . "'";   
        $this->conn->query($sql);


        $sql = "INSERT INTO access_token(id, token, browser, ip_address, time) VALUE("
                .  "" . $id . ", "
                .  "'" . $token . "', "
                .  "'" . $browser . "', "
                .  "'" . $ip_address . "', "
                .  "" . (time()+(int)1200) . ")";

        return $this->conn->query($sql);    
    }

    function getIdByToken($token){

    }

    function validateToken(){

    }

    function deleteToken($token){
        $sql = "DELETE FROM access_token WHERE token = '" . $token . "'";   
        return $this->conn->query($sql);
    }

}