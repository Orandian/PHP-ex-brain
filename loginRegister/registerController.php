<?php

require_once "./DBconnection.php";

if (isset($_POST)) {
    $name = $_POST['userName'];
    $mail = $_POST['userMail'];
    $password = $_POST['userPassword'];

    $db = new DBConnect();
    $connection = $db->Connect();

    $sql = $connection->prepare("
        INSERT INTO m_login(
            userName,
            userMail,
            userPassword
        ) VALUES(
            :name,
            :mail,
            :password    
        );
    ");

    $sql->bindValue(":name", $name);
    $sql->bindValue(":mail", $mail);
    $sql->bindValue(":password", $password);
    $sql->execute();

    require "./success.php";
} else {
    echo "Error";
}
