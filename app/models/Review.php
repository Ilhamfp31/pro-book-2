<?php

class Review extends Model
{
    function readAllReviewsByBookId($bookid)
    {
        $sql = "SELECT username, userPicture, rating, comment
        FROM user INNER JOIN orders ON user.userID = orders.userID INNER JOIN review ON review.orderID = orders.orderID
        WHERE orders.bookID =" . $bookid;
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
        return $results;
    }

    function readRowsOfReview(){
        $sql = "SELECT reviewID FROM review";
        $result = $this->conn->query($sql);
        return count($result);
    }

    function createReview($review){
        $sql = "INSERT INTO review(comment, rating, orderID, reviewID) VALUE(" .
                "'" . $review["comment"] . "', '" . $review["rating"] . "', '" . $review["orderID"] .
                "')";
        return $this->conn->query($sql);
    }
}
