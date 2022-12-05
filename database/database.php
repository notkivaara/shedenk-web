<?php
class database{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "db_shedenk";
    public $con;
    function connectMySQL()
    {
        $this->con = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass,$this->dbName);
    }
}
?>