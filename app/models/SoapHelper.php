<?php

class SoapHelper {
    protected $conn;

    public function __construct() {
        define('SOAPADRESS', "http://localhost:9000/BookService?wsdl");
        define('OPTIONS', array('cache_wsdl'=>WSDL_CACHE_NONE));

        try {
            $this->conn = new SoapClient(SOAPADRESS, OPTIONS);
        } catch (Exception $e) {
            die('SOAP connection failed: ' . $e->getMessage());
        }
    }

    public function getBooksByTitle($title) {
        $data = $this->conn->getBookByTitle($title);
        $array = json_decode(json_encode($data), True);
        return $array["books"];
    }

    public function getBookByID($id) {
        $data = $this->conn->getBookDetailByID($id);
        $array = json_decode(json_encode($data), True);
        $output["bookID"] = $array["id"];
        $output["title"] = $array["title"];
        $output["author"] = $array["author"];
        $output["bookPicture"] = $array["image"];
        $output["synopsis"] = $array["description"];
        $output["price"] = $array["price"];
        $output["category"] = $array["category"];
        return $output;
    }

    public function getRecommendation($categories) {
        if (!is_array($categories)) {
            $categories = array_map('trim', explode('/', $categories));
        }
        $data = $this->conn->getRecommendation($categories);
        $array = json_decode(json_encode($data), True);
        $output["bookID"] = $array["id"];
        $output["title"] = $array["title"];
        $output["author"] = $array["author"];
        $output["bookPicture"] = $array["image"];
        $output["synopsis"] = $array["description"];
        $output["price"] = $array["price"];
        $output["category"] = $array["category"];
        return $output;
    }

    public function buyBook($id, $quantity, $no_rek, $token) {
        $data = $this->conn->buyBook($id, $quantity, $no_rek, $token);
        $array = json_decode(json_encode($data), True);
        return $array;
    }

    public function getTransactionByID($id) {
        $data = $this->conn->getTransactionByID($id);
        $array = json_decode(json_encode($data), True);
        return $array;
    }
}