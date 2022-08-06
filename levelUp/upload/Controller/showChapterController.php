<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

if ($page == 0) {
    $instructorId = $_SESSION['instructorId'];
    $courseId = $_SESSION['courseId'];

    $sql = $connection->prepare("SELECT * FROM m_chapter WHERE instructorId = $instructorId AND courseId = $courseId;");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    $chapterId = $_SESSION['chapterId'];
    $sql = $connection->prepare("
        SELECT * FROM m_chapter WHERE id = $chapterId;
    ");
    $sql->execute();
    $chapterNo = $sql->fetchAll(PDO::FETCH_ASSOC);

    $chapterNo = $chapterNo[0]["chapter"];
}
