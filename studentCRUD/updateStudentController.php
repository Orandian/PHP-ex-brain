<?php
require_once "./DBConnection.php";

if (isset($_POST)) {
    $name = $_POST['stdName'];
    $age = $_POST['stdAge'];
    $address = $_POST['stdAddress'];
    $phone = $_POST['stdPhone'];
    $gender = $_POST['stdGender'];
    $id = $_POST["stdId"];
    $file = $_FILES["stdProfile"]["name"];
    $location = $_FILES["stdProfile"]["tmp_name"];

    if (move_uploaded_file($location, "./profile/$file")) {
        $db = new DBConnect();
        $connection = $db->Connect();
        // set data from insert form to database
        $sql = $connection->prepare("
            UPDATE m_student SET
            studentProfile = :img,
            studentName = :name,
            studentAge = :age,
            studentAddress = :address,
            studentPhone = :phone,
            studentGender = :gender
            WHERE id = :id
    ");
        $sql->bindValue(":img", $file);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":age", $age);
        $sql->bindValue(":address", $address);
        $sql->bindValue(":phone", $phone);
        $sql->bindValue(":gender", $gender);
        $sql->bindValue(":id", $id);
        $sql->execute();
        header("Location: ./showData.php");
    } else {
        echo "Upload Error";
    }
} else {
    echo "ERROR";
}
