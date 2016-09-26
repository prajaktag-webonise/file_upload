<?php

/*
 * Abstract class that defines common behavior and specific behavior of connection is kept abstract
 */

abstract class pdoDatabase {

    abstract function connectToDb();

    function insertQuery($connection, $query) {
        try {
            $connection->exec($query);
            echo "New record created successfully";
        } catch (PDOException $exception) {
            echo $query . "<br>" . $exception->getMessage();
        }
    }

}

/*
 *
 * class for mysql db which inherits pdoDatabase class and defines connection
 */

class mySql extends pdoDatabase {

    var $serverName;
    var $username;
    var $password;
    var $databaseName;

    /*
     * initialize connection variables
     *
     */

    function __construct() {
        $this->serverName = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->databaseName = "assignments";
    }

    /*
     * connection to mysql and returns connection handler
     *
     */

    function connectToDb() {
        try {
            $connection = new PDO("mysql:host=$this->serverName;dbname=$this->databaseName", $this->username, $this->password);
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "<br>" . $exception->getMessage();
        }
        return $connection;
    }

}

?>
