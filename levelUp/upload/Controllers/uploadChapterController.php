<?php

require_once "../Model/DBConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();
$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterNo = $_SESSION['chapterNo'];

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $chapterTitle = $data["chapterTitle"];

    $sql = $connection->prepare("
        INSERT INTO m_chapter(
            instructorId,
            courseId,
            chapter,
            chapterTitle
        )VALUES(
            :instructorId,
            :courseId,
            :chapterNo,
            :chapterTitle
        );
    ");


    $sql->bindValue(":instructorId", $instructorId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(":chapterNo", $chapterNo);
    $sql->bindValue(":chapterTitle", $chapterTitle);
    $sql->execute();

    echo "../Views/uploadCourse.php";
} else {
    $sql = $connection->prepare("
        INSERT INTO m_chapter(
            instructorId,
            courseId,
            chapter
        )VALUES(
            :instructorId,
            :courseId,
            (SELECT (MAX(chapter) + 1) FROM m_chapter WHERE instructorId = :instructorNo AND courseId = :courseNo)
        );
    ");

    $sql->bindValue(":instructorId", $instructorId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(":instructorNo", $instructorId);
    $sql->bindValue(":courseNo", $courseId);
    $sql->execute();

    header("Location: ../Views/addChapters.php");
}
