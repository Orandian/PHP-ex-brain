<?php
$time = time();

session_start();

// session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- <link rel="stylesheet" href="./courselist.css"> -->
    <link rel="stylesheet" href="./resources/css/courselist.css?v=<?= $time; ?>">
</head>

<body>
    <section class="sections"></section>
    <section class="section">
        <div class="header">
            <h2 class="is-size-4 has-text-weight-bold">My Courses</h2>
            <a href="../Controller/uploadNewCourseController.php" class=" button is-primary is-one-fifth">Add New Course</a>
        </div>

        <div class="card-container">
            <?php
            // $delete = 1;
            // require_once "./showCourseListController.php";
            require_once "../Controller/showCourseListController.php";

            foreach ($result as $key => $value) {
            ?>
                <a href="#">
                    <div class="cards">
                        <img src="../images/<?php echo $value['courseCoverImage']; ?>" alt="" />
                        <div class="details">
                            <div class="detail">
                                <ion-icon name="bar-chart-outline"></ion-icon>
                                <div class="content">
                                    <span>Level</span>
                                    <h4><?php echo $value['courseLevel'] ?></h4>
                                </div>
                            </div>
                            <div class="detail">
                                <ion-icon name="bar-chart-outline"></ion-icon>
                                <div class="content">
                                    <span>Hours</span>
                                    <h4><?php echo $value['courseDuration'] ?> Hours</h4>
                                </div>
                            </div>
                            <div class="detail">
                                <ion-icon name="bar-chart-outline"></ion-icon>
                                <div class="content">
                                    <span>Lectures</span>
                                    <h4><?php echo $result1[$key]['lectureNumber']; ?> Lectures</h4>
                                </div>
                            </div>
                        </div>
                        <h2><?php echo $value['courseTitle']; ?></h2>
                        <div class="info">
                            <a href="#" class="title is-6 has-text-weight-bold">Edit</a>
                        </div>
                        <div class="rating">
                            <ion-icon name="bar-chart-outline"></ion-icon>
                            <p class="has-text-weight-bold">4.6/5</p>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </section>

    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }

        setTimeout("preventBack()", 0);

        window.onunload = function() {
            null
        };
    </script>
</body>

</html>