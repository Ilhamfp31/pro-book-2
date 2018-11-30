<?php

class Order extends Model
{
    function readHistoryByUserId($id)
    {

        $sql = "SELECT orderID, bookID FROM wbdprobook.orders WHERE userID = " . $id . " ORDER BY id DESC;";
        $result = $this->conn->query($sql);
        $results = [];
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
        require_once ('app/models/SoapHelper.php');
        $soap = new SoapHelper();
        foreach ($results as $key => $value) {
            $sql = "SELECT reviewID FROM wbdprobook.review WHERE orderID = '". $results[$key]['orderID'] ."';";
            $results[$key]['reviewID'] = ($this->conn->query($sql) -> fetch_assoc());
            $data['book'] = $soap->getBookByID($results[$key]['bookID']);
            $data['order'] = $soap->getTransactionByID($results[$key]['orderID']);
            $results[$key]['date'] = $data['order']['timestamp'];
            $results[$key]['quantity'] = $data['order']['jumlah'];
            $results[$key]['bookPicture'] = $data['book']['bookPicture'];
            $results[$key]['title'] = $data['book']['title'];
            $results[$key]['userID'] = $id;
        }
        return $results;
    } 

    function readReviewByOrderID($orderid)
    {
        $sql = "SELECT bookID FROM orders WHERE orders.orderID='" . $orderid . "'";
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