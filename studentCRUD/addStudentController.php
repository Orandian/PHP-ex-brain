<?php

require_once "./DBConnection.php";

if (isset($_POST)) {
    $name = $_POST["stdName"];
    $age = $_POST["stdAge"];
    $address = $_POST["stdAddress"];
    $phone = $_POST["stdPhone"];
    $gender = $_POST["stdGender"];
    $file = $_FILES["stdProfile"]["name"];
    $location = $_FILES["stdProfile"]["tmp_name"];

    if (move_uploaded_file($location, "./profile/$file")) {
        $db = new DBConnect();
        $connection = $db->Connect();

        // set data from insert form to database
        $sql = $connection->prepare("
            INSERT INTO m_student(
                studentProfile,
                studentName,
                studentAge,
                studentAddress,
                studentPhone,
                studentGender
            ) VALUES (
                :img,
                :name,
                :age,
                :address,
                :phone,
                :gender
            );
        ");

        $sql->bindValue(":img", $file);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":age", $age);
        $sql->bindValue(":address", $address);
        $sql->bindValue(":phone", $phone);
        $sql->bindValue(":gender", $gender);
        $sql->execute();

        // get select all data from database
        $sql = $connection->prepare("SELECT * FROM m_student");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        header("Location: ./showData.php");
    } else {
        echo "Upload Error";
    }
} else {
    echo "ERROR";
}
