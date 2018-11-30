<?php

class Order extends Model
{
    function readHistoryByUserId($id)
    {
        $sql = "SELECT * FROM
                (SELECT date, quantity, bookPicture, title, reviewID, userID, orders.orderID
                FROM orders INNER JOIN book ON orders.bookID = book.bookID
                LEFT JOIN review ON review.orderID=orders.orderID
                WHERE userid = '". $id ."') AS temp ORDER BY date DESC";

        $sql = "SELECT orderID, bookID WHERE userID = " . $id . "ORDER BY id DESC";
        $result = $this->conn->query($sql);
        $results = [];
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
        $soap = new SoapHelper();
        foreach ($results as $key -> $value) {
            $data = []
            $data['book'] = $soap->getBookByID($results[$key]['bookID']);
            $data['order'] = $soap->getTransactionByID($results[$key]['orderID']);
            $results[$key]['date'] = $data['order']['timestamp'];
            $results[$key]['quantity'] = $data['order']['jumlah'];
            $results[$key]['bookPicture'] = $data['book']['bookPicture'];
            //TODO REVIEW
            $results[$key]['reviewID'] = '';
            $results[$key]['title'] = $data['book']['title'];
            $results[$key]['userID'] = $id;
        }
        return $results;
    } 

    function readReviewByOrderID($orderid)
    {
        $sql = "SELECT bookID FROM orders WHERE orders.id='" . $orderid . "'";
        $result = $this->conn->query($sql)->fetch_assoc();
        
        require_once ('app/models/SoapHelper.php');
        $soap = new SoapHelper();
        $data = $soap->getBookByID($result['bookID']);
        return $data;
    } 
    
    function createOrder($bookid, $userid, $orderid)
    {
        $sql = "INSERT INTO orders(bookID, userID, orderID)
                VALUES ('" . $bookid . "', " . $userid . ", " . $orderid . ")";
        $this->conn->query($sql);
        return $this->conn->insert_id;
    }
}