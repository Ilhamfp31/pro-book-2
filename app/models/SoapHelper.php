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
        return $array;
    }

    public function getRecommendation($categories) {
        if (!is_array($categories)) {
            $categories = array($categories);
        }
        $data = $this->conn->getRecommendation($categories);
        $array = json_decode(json_encode($data), True);
        return $array;
    }

    public function buyBook($id, $quantity, $no_rek) {
        $data = $this->conn->buyBook($id, $quantity, $no_rek);
        $array = json_decode(json_encode($data), True);
        return $array;
    }
}