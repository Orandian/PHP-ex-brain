<?php

require_once "./DBConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

// get select all data from database
$sql = $connection->prepare("SELECT * FROM m_student;");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
