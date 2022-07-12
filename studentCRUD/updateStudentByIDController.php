<?php

require_once "./DBConnection.php";

$id = $_GET['id'];

$db = new DBConnect();
$connection = $db->Connect();

// get select all data from database
$sql = $connection->prepare("SELECT * FROM m_student WHERE id = :id");
$sql->bindValue(":id", $id);
$sql->execute();

$result = $sql->fetchAll(PDO::FETCH_ASSOC);

require "./updateStudent.php";
