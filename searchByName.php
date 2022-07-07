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

if (isset($_POST)) {
    $name = $_POST['stdName'];
    $query = "SELECT * FROM m_student WHERE studentName = :stdname";

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $pdo->prepare($query);
    $sql->bindValue(":stdname", $name);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    require "./showData.php";
}
