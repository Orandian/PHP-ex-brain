<?php

require_once "./DBconnection.php";

if (isset($_POST)) {
    $mail = $_POST['userMail'];
    $password = $_POST['userPassword'];

    $db = new DBConnect();
    $connection = $db->Connect();

    $sql = $connection->prepare("SELECT * FROM m_login WHERE userPassword=:password");
    $sql->bindValue(":password", $password);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $value) {
        echo "Thanks " . $value["userName"];
    }
} else {
    echo "Error";
}
