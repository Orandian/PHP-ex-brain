<?php

require_once "./DBConnection.php";

$id = $_GET['id'];

$db = new DBConnect();
$connection = $db->Connect();

// Physical delete
// $sql = $connection->prepare("DELETE FROM m_student WHERE id = :id");
// $sql->bindValue(":id", $id);
// $sql->execute();

// logical delete
$sql = $connection->prepare("
    UPDATE m_student SET
    del_flg = 1
    WHERE id = :id
");
$sql->bindValue(":id", $id);
$sql->execute();

header("Location: ./showData.php");
