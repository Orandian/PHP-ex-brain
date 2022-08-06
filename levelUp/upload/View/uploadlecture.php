<?php
$time = time();

session_start();

// echo $_SESSION['instructorId'];
// echo $_SESSION['courseId'];
// echo $_SESSION['chapterId'];
// echo $_SESSION['lectureId'];
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
    <link rel="stylesheet" href="./resources/css/uploadlecture.css?v=<?= $time; ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=<?= $time; ?>"></script>
    <script src="./resources/js/uploadlecture.js?v=<?= $time; ?>" defer></script>

</head>

<body>
    <div class="sidebar">
    </div>
    <div class="container">
        <form action="../Controller/uploadLectureController.php" method="POST" enctype="multipart/form-data">
            <div class="left">
                <div class="form-input">
                    <div class="preview">
                        <video id="videoPreview" />
                    </div>
                    <label for="video" class="has-text-weight-bold">Add Video</label>
                    <input type="file" id="video" accept="video/*" onchange="showPreview(event)" name="video" />
                </div>

                <label for="">Lecture Title</label><br />
                <input type="text" placeholder="lecture title" id="lectureTitle" name="lectureTitle" /><br />

                <label for="">Lecture Description</label><br />
                <textarea name="lectureDescription" id="lectureDescription"></textarea><br />

                <label for="">Lecture Scripts</label><br />
                <textarea name="lectureScripts" id="lectureScripts"></textarea><br />
            </div>
            <div class="centerbar"></div>
            <div class="right">
                <div class="quizzAdd">
                    <p>Lecture Quizzes</p>
                    <p onclick="openQuizzBox()">Add</p>
                </div>

                <div class="quizzs" id="quizzs">
                </div>

                <div class="buttons">
                    <a href="../Controller/cancelLectureController.php" class="button">Cancel</a>
                    <button type="submit" class="button" id="saveLectureButton" disabled>Save</button>
                </div>

                <div class="quizzBox" id="quizzBox">
                    <p class="is-size-5 has-text-weight-bold">Lecture Quiz</p>
                    <div id="quizzForm">
                        <input type="text" placeholder="question" id="question" name="question"><br />
                        <input type="text" placeholder="answer 1" id="answer1" name="answer1"><br />
                        <input type="text" placeholder="answer 2" id="answer2" name="answer2"><br />
                        <input type="text" placeholder="answer 3" id="answer3" name="answer3"><br />

                        <div class="answer">
                            <p>Answer</p>
                            <select name="realAnswer" id="realAnswer">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="buttons">
                            <div class="button" onclick="closeQuizzBox()">Cancel</div>
                            <div class="button" onclick="addQuizz()" id="addQuizz" disabled>Save</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>