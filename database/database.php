<?php
class database{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "db_shedenk";
    
    function connectMySQL()
    {
        $con = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass,$this->dbName);
    }
}
?>