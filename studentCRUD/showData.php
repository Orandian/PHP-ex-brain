<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Student Record</h2>
        <table class="table table-success table-striped">
            <tr>
                <th>ID</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Gender</th>
                <th colspan="2">More</th>
            </tr>

            <?php
            require "./showStudentController.php";
            foreach ($result as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value['id'] . "</td>";
                echo "<td><img src=./profile/" . $value['studentProfile'] . "></td>";
                echo "<td>" . $value['studentName'] . "</td>";
                echo "<td>" . $value['studentAge'] . "</td>";
                echo "<td>" . $value['studentAddress'] . "</td>";
                echo "<td>" . $value['studentPhone'] . "</td>";
                if ($value["studentGender"] == 1)
                    echo "<td>Male</td>";
                else
                    echo "<td>Female</td>";
                echo "<td><a href='./updateStudentByIDController.php?id=" . $value['id'] . "'class='text-success'>Edit</a></td>";
                echo "<td><a href='./deleteStudentController.php?id=" . $value['id'] . "'class='text-danger'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>