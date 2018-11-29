<?php

class Book extends Model
{
    function readBooksAndRatingByTitle($title)
    {   
        $sql = "SELECT book.bookID, author, title, bookPicture, synopsis, votes, avg_rating FROM (
          SELECT bookID, COUNT(reviewID) AS votes, AVG(rating) AS avg_rating
          FROM orders INNER JOIN review ON review.orderID = orders.orderID
          GROUP BY bookID
        ) AS review_orders RIGHT OUTER JOIN book ON review_orders.bookID = book.bookID WHERE title LIKE '%" . $title . "%'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
        return $results;
    }

    function readBooksAndRatingByBookId($bookid)
    {
        $sql = "SELECT book.bookID, author, title, bookPicture, synopsis, votes, avg_rating FROM (
            SELECT bookID, COUNT(reviewID) AS votes, AVG(rating) AS avg_rating
            FROM orders INNER JOIN review ON review.orderID = orders.orderID
            GROUP BY bookID
          ) AS review_orders RIGHT OUTER JOIN book ON review_orders.bookID = book.bookID WHERE book.bookID=" . $bookid;
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    function readRatingByBookId($bookid)
    {
        $sql = "SELECT COUNT(reviewID) AS votes, AVG(rating) AS avg_rating
            FROM review INNER JOIN orders WHERE orders.bookID='" . $bookid . "'";
        $result = $this->conn->query($sql)->fetch_assoc();
        return $result["avg_rating"] ? $result : array("avg_rating" => 0, "votes" => 0);
    }

    function getBookByKeyword($keyword) 
    {
        require_once "app/models/SoapHelper.php";
        $soap = new SoapHelper();
        $data = $soap->getBooksByTitle($keyword);
        foreach ($data as $key => $value) {
            $data[$key]["avg_rating"] = ($this->readRatingByBookId($value["id"]))["avg_rating"];
            $data[$key]["votes"] = ($this->readRatingByBookId($value["id"]))["votes"];
        }
        return $data;
    }
}