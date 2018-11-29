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
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
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
    
    function createOrder($bookid, $qty, $userid)
    {
        $sql = "INSERT INTO orders(bookID, date, quantity, userID)
                VALUES (" . $bookid . ", '" . date("Y-m-d H:i:s") . "', " . $qty . ", " . $userid . ")";
        $this->conn->query($sql);
        return $this->conn->insert_id;
    }
}