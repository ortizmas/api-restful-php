<?php

require_once 'config.php';

class Connection
{

    public static function connect()
    {
        try {
            $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            //echo "Connected successfully";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection falied: " . $e->getMessage();
        }
    }

    public static function prepare($sql)
    {
        return self::connect()->prepare($sql);
	}
}

//$conn = new Connection();
//$conn->connect();

?>