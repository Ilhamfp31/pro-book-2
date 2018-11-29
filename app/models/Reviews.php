<?php

class Reviews extends Model
{
    function readAllReviewsByBookId($bookid)
    {
        $sql = "SELECT username, userPicture, rating, comment 
        FROM user INNER JOIN orders ON user.userID = orders.userID INNER JOIN review ON review.orderID = orders.orderID 
        WHERE orders.bookID ='" . $bookid . "'";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
        return $results;
    }

    function createReview($temp){
        $sql = "INSERT INTO review(comment, rating, orderID) VALUE(" .
                "'" . $temp["comment"] . "', " . $temp["rating"] . ", '" . $temp["orderID"] . 
                "')";
        return $this->conn->query($sql);
    }
}