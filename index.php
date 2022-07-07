<?php
$hostname = "localhost";
$port = "3306";
$dbname = "school_db";
$username = "root";
$password = "";

$pdo = new PDO(
    "mysql:
    host=$hostname;
    port=$port;
    dbname=$dbname",
    $username,
    $password
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = $pdo->prepare("SELECT * FROM m_student");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($result);
