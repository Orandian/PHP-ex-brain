<?php

session_start();
require_once "../Model/DBConnection.php";

$db = new DBConnect();
$connection = $db->Connect();



$sql = $connection->prepare("
    INSERT INTO 
");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['lectureId'] = count($result) + 1;

$instructorId = $_SESSION['instructorId'];
$courseId = $_SESSION['courseId'];
$chapterId = $_SESSION['chapterId'];

if (count($_POST)) {

    $sql = $connection->prepare("
        SELECT count(id) FROM t_lectures GROUP BY chapterId;
    ");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['lectureId'] = count($result) + 1;
    // $date = date('Y-m-d H:i:s');
    $lectureTitle = $_POST["lectureTitle"];
    $lectureDescription = $_POST["lectureDescription"];
    $lectureScripts = $_POST["lectureScripts"];
    $videoFile = $_FILES["video"]["name"];
    $location = $_FILES["video"]["tmp_name"];

    if (move_uploaded_file($location, "../videos/$videoFile")) {
        try {
            $sql = $connection->prepare("
            INSERT INTO t_lectures(
                instructorId,
                courseId,
                chapterId,
                lectureVideo,
                lectureTitle,
                lectureDescription,
                lectureScript
            )VALUES(
                $instructorId,
                $courseId,
                $chapterId,
                :video,
                :lectureTitle,
                :lectureDescription,
                :lectureScripts
            );
        ");

            $sql->bindValue(":video", $videoFile);
            $sql->bindValue("lectureTitle", $lectureTitle);
            $sql->bindValue(":lectureDescription", $lectureDescription);
            $sql->bindValue(":lectureScripts", $lectureScripts);
            $sql->execute();

            $sql = $connection->prepare("
                SELECT * FROM t_lectures WHERE instructorId = $instructorId AND courseId = $courseId AND chapterId = $chapterId;
            ");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            header("Location: ../Views/addChapters.php");
            die();
        } catch (PDOException $th) {
            var_dump($th);
        }
    }
} else {
    require "./showLectureController.php";

    header("Location: ../Views/uploadlecture.php");
}


// Die Function 
// function redirect($url, $statusCode = 303)
// {
//    header('Location: ' . $url, true, $statusCode);
//    die();
// }
