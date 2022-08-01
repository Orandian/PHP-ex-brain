<?php

require_once "../Model/DBConnection.php";
// require_once "./DBConnection.php";

$db = new DBConnect();
$connection = $db->Connect();


$sql = $connection->prepare("
                SELECT * FROM m_courseinfo WHERE updatedDate IS NOT null;
    ");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $connection->prepare("
    SELECT count(id) AS lectureNumber FROM t_lectures GROUP BY id;
");
$sql->execute();
$result1 = $sql->fetchAll(PDO::FETCH_ASSOC);
