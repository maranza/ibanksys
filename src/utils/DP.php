<?php

//kwesidev
//connecting to a database using PDO
//PDO prevents mysql injections 
class DP {

    private static $handle;
    private static $user = "root";
    private static $password = "root";

    const MARIADB = "mysql:host=127.0.0.1;port=3306;dbname=banksys";

    public static function getLink() {
        try {
            self::$handle = new PDO(DP::MARIADB, self::$user, self::$password, array("PDO::ATTR_PRESISTENT" => true));
        } catch (PDOException $e) {
            echo "Failed to connect..Check your database connection";
        }
        return(self::$handle);
    }

}
