<?php

class Model
{
    protected $conn;
    public function __construct() {
        $this->conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if(!$this->conn) {
            die("Error, could not connect. " . mysqli_connect_error());
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}
