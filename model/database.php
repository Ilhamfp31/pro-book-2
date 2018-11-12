<?php  

class Database {
    const servername = "127.0.0.1";
    const dbname = "tubeswbd";
    const username = "root";
    const password = "";

    public static function establishConnection() {
        try {
            $servername = constant("self::servername");
            $dbname = constant("self::dbname");

            $dsn = "mysql:host=$servername;dbname=$dbname";
            $conn = new PDO($dsn, constant("self::username"), constant("self::password"));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch (PDOException $p) {
            return NULL;
        }
    }
}

?>