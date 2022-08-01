<?php

require_once "../Model/DBConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];

$sql = $connection->prepare("SELECT * FROM m_chapter WHERE instructorId = $instructorId AND courseId = $courseId;");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);



$sql = $connection->prepare("
    SELECT MAX(chapter) AS chapterNo FROM m_chapter WHERE instructorId = $instructorId AND courseId = $courseId;
");
$sql->execute();
$chapterNo = $sql->fetchAll(PDO::FETCH_ASSOC);

if (count($chapterNo) > 0) {
    $chapterNo = (int)$chapterNo[0]["chapterNo"] + 1;
} else {
    $chapterNo = 1;
}
