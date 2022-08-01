<?php
$time = time();

session_start();

echo $_SESSION['instructorId'];
echo $_SESSION['courseId'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Add New Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="./resources/css/addChapters.css?v=<?= $time; ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=<?= $time; ?>"></script>
    <script src="./resources/js/addChapters.js?v=<?= $time; ?>" defer></script>

</head>

<body>
    <div class="sidebar">
    </div>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">

            <p class="is-size-3 has-text-weight-bold">Chapter
                <span id="chapterId">
                    <?php
                    require_once "../Controllers/showChapterController.php";
                    // require_once "./uploadChapterController.php";

                    echo $chapterNo;

                    $_SESSION['chapterNo'] = $chapterNo;
                    ?>
                </span>
            </p>

            <input type="text" placeholder="Chapter Title" class="chaptertitle" id="chapterTitle" />

            <div class="lectures">
                <div class="bar">
                    <p class="is-size-5 has-text-weight-bold">Lectures</p>
                    <a href="../Controllers/uploadLectureController.php">
                        <!-- <a href="./uploadLectureController.php"> -->
                        <div class="button is-primary">Add</div>
                    </a>
                </div>
                <hr />
                <div class="listbar">
                    <p class="is-size-6 has-text-weight-bold">Lecture Title</p>
                    <p class="is-size-6 has-text-weight-bold">Created At</p>
                </div>
                <hr />
                <div class="lectureList" id="lectureList">
                    <?php
                    require "../Controllers/showLectureController.php";
                    // require "./showLectureController.php";

                    foreach ($result as $key => $value) {
                        echo "<a href='#' class='lectureNo'>";
                        echo "<div class='lecture'>";
                        echo "<p>" . $value["lectureTitle"] . "</p>";
                        echo "<p>20/6/2022</p>";
                        echo "</div>";
                        echo "</a>";
                    };
                    ?>
                    <!-- <a href="#" class="lectureNo">
                        <div class="lecture">
                            <p>Hello</p>
                            <p>2022</p>
                        </div>
                    </a> -->
                </div>
            </div>

            <div class="buttons">
                <a href="../Controllers/cancelAddChaptersController.php" class="button">Cancel</a>
                <div class="button" id="addChapter">Save</div>
            </div>
        </form>

    </div>
</body>

</html>