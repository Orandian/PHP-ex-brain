<?php

class DBConnect{
    private $hostname = "localhost";
    private $port = 3306;
    private $dbname = "";
    private $username = "root";
    private $password = "";

    public function connect(){
        //connection
        $pdo = new PDO("mysql:host=$this->hostname;port=$this->port;dbname=$this->dbname",$this->username, $this->password);
        //set error reply
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
?>