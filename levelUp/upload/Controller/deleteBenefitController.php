<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $benefitId = $data['id'];

    $sql = $connection->prepare("DELETE FROM t_benefits WHERE id = :benefitId");
    $sql->bindValue(":benefitId", $benefitId);
    $sql->execute();

    echo "../View/uploadCourse.php";
} else {
    echo "ERROR";
}
