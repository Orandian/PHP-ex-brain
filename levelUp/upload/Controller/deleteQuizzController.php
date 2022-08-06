<?php

require_once "../Model/dbConnection.php";

$db = new DBConnect();
$connection = $db->Connect();

if (count($_POST)) {
    $data = json_decode($_POST["send"], true);

    $quizzId = $data['id'];

    $sql = $connection->prepare("DELETE FROM t_quizzs WHERE id = :quizzId");
    $sql->bindValue(":quizzId", $quizzId);
    $sql->execute();

    echo "../View/uploadlecture.php";
} else {
    echo "ERROR";
}
