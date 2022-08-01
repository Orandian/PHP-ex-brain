<?php

require_once "../Model/DBConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();

$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION['chapterId'];
$lectureId = $_SESSION['lectureId'];

$sql = $connection->prepare("
    DELETE FROM t_quizzs 
    WHERE instructorId = $instructorId 
    AND courseId = $courseId 
    AND chapterId = $chapterId 
    AND lectureId = $lectureId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM t_lectures 
    WHERE instructorId = $instructorId 
    AND courseId = $courseId 
    AND chapterId = $chapterId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM m_chapter 
    WHERE instructorId = $instructorId 
    AND courseId = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM t_benefits 
    WHERE instructorId = $instructorId 
    AND courseId = $courseId;
");
$sql->execute();

$sql = $connection->prepare("
    DELETE FROM t_requirements 
    WHERE instructorId = $instructorId 
    AND courseId = $courseId;
");
$sql->execute();

header("Location: ../Views/courselist.php");
