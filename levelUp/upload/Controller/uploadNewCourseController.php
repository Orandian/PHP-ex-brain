<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();



session_start();

$instructorId = 1;

$_SESSION['instructorId'] = $instructorId;

$sql = $connection->prepare("
    INSERT INTO m_courseinfo (
        instructorId,
        createdDate
    )VALUES(
        :instructorId,
        :createdDate
    );
");
$sql->bindValue(":instructorId", $instructorId);
$sql->bindValue(":createdDate", date("Y/m/d"));
$sql->execute();

$sql = $connection->prepare("
    SELECT MAX(id) AS courseId FROM m_courseinfo;
");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$courseId = $result[0]["courseId"];

$_SESSION['courseId'] = $courseId;

header("Location: ../View/uploadCourse.php");
