<?php

class Book extends Model
{
    function readRatingByBookId($bookid)
    {
        $sql = "SELECT COUNT(reviewID) AS votes, AVG(rating) AS avg_rating
        FROM review LEFT JOIN orders ON review.orderID = orders.orderID WHERE orders.bookID='" . $bookid . "'";
        $result = $this->conn->query($sql)->fetch_assoc();
        return $result["avg_rating"] ? $result : array("avg_rating" => 0, "votes" => 0);
    }

    function readBooksByKeyword($keyword) 
    {
        require_once "app/models/SoapHelper.php";
        $soap = new SoapHelper();
        $data = $soap->getBooksByTitle($keyword);
        if ($data[0]) {
            foreach ($data as $key => $value) {
                $data[$key]["avg_rating"] = ($this->readRatingByBookId($value["id"]))["avg_rating"];
                $data[$key]["votes"] = ($this->readRatingByBookId($value["id"]))["votes"];
            }
        }
        else {
            $data["avg_rating"] = ($this->readRatingByBookId($data["id"]))["avg_rating"];
            $data["votes"] = ($this->readRatingByBookId($data["id"]))["votes"];
        }
        return $data;
    }
}