<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION['chapterId'];

$sql = $connection->prepare("
            SELECT * FROM t_lectures WHERE instructorId = $instructorId AND courseId = $courseId AND chapterId = $chapterId;
        ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
