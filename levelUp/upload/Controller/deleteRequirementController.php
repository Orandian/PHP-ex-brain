<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $requirementId = $data['id'];

    $sql = $connection->prepare("DELETE FROM t_requirements WHERE id = :requirementId");
    $sql->bindValue(":requirementId", $requirementId);
    $sql->execute();

    echo "../View/uploadCourse.php";
} else {
    echo "ERROR";
}
