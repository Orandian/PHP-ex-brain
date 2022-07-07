<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <form action="./updateStudentController.php" method="post" enctype="multipart/form-data">
            <h2 class="mt-5">Student Register</h2>
            <div class="mb-3">
                <label for="" class="form-label">Profile</label>
                <input type="file" class="form-control" name="stdProfile">
            </div>
            <input type="hidden" name="stdId" value="<?php echo $result[0]['id']; ?>">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="stdName" value="<?php echo $result[0]['studentName'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Age</label>
                <input type="number" class="form-control" name="stdAge" value="<?php echo $result[0]['studentAge'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" name="stdAddress" value="<?php echo $result[0]['studentAddress'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="number" class="form-control" name="stdPhone" value="<?php echo $result[0]['studentPhone'] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gender</label>
                <select class="form-select" name="stdGender">
                    <option selected>Select Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Student</button>
        </form>
    </div>
</body>

</html>