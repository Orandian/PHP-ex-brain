<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

session_start();
$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION['chapterId'];

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $chapterTitle = $data["chapterTitle"];

    $sql = $connection->prepare("
        UPDATE m_chapter SET chapterTitle = :chapterTitle, updatedDate = :updatedDate WHERE id = :chapterId;
    ");

    $sql->bindValue(":chapterTitle", $chapterTitle);
    $sql->bindValue(":updatedDate", date("Y/m/d"));
    $sql->bindValue(":chapterId", $chapterId);
    $sql->execute();

    echo "../View/uploadCourse.php";
} else {
    $sql = $connection->prepare("
        INSERT INTO m_chapter(
            instructorId,
            courseId,
            chapter,
            createdDate
        )VALUES(
            :instructorId,
            :courseId,
            (SELECT IF(Max(chapter)>0,Max(chapter),0) + 1 AS chapterNo FROM m_chapter AS m_c WHERE m_c.instructorId = :instructorNo AND m_c.courseId = :courseNo),
            :createdDate
        );
    ");

    $sql->bindValue(":instructorId", $instructorId);
    $sql->bindValue(":courseId", $courseId);
    $sql->bindValue(":createdDate", date("Y/m/d"));
    $sql->bindValue(":instructorNo", $instructorId);
    $sql->bindValue(":courseNo", $courseId);
    $sql->execute();

    $sql = $connection->prepare("
    SELECT MAX(id) AS chapterId FROM m_chapter");
    $sql->execute();
    $chapterId = $sql->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['chapterId'] = $chapterId[0]['chapterId'];

    header("Location: ../View/addChapters.php");
}
