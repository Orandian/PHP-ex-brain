<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();


$chapterId = $_SESSION['chapterId'];
$lectureId = $_SESSION['lectureId'];

$sql = $connection->prepare("
    DELETE FROM t_quizzs 
    WHERE lectureId = $lectureId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM t_lectures 
    WHERE id = $lectureId;
");
$sql->execute();

header("Location: ../View/addChapters.php");
