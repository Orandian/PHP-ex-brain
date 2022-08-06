<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();

$courseId = $_SESSION['courseId'];

$sql = $connection->prepare("
    DELETE FROM t_quizzs 
    WHERE courseId = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM t_lectures 
    WHERE courseId = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM m_chapter 
    WHERE courseId = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM t_benefits 
    WHERE courseId = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM t_requirements 
    WHERE courseId = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM m_courseinfo 
    WHERE id = $courseId;
");
$sql->execute();

header("Location: ../View/courselist.php");
