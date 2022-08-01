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
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Add New Course</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" />

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- <link rel="stylesheet" href="style.css?v="> -->
  <link rel="stylesheet" href="./resources/css/style.css?v=<?= $time; ?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js?v=<?= $time; ?>"></script>
  <script src="./resources/js/app.js?v=<?= $time; ?>" defer></script>
</head>

<body>
  <!-- ================== START SIDE MENU BAR ===================== -->
  <div class="sidebar"></div>
  <!-- ================== END SIDE MENU BAR ===================== -->

  <!-- ================== START FORM CONTAINER ===================== -->
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">

      <!-- Start Left Side -->
      <div class="left">
        <label for="">Course Title</label><br />
        <input type="text" id="courseTitle" /><br />

        <label for="">About Course</label><br />
        <input type="text" id="aboutCourse" />
        <hr />

        <div class="additional">
          <p>Benefits</p>
          <a href="#" onclick="addBenefit()">Add</a>
        </div>

        <div class="benefitList">
          <ul id="benefitList">
            <!-- <li>
              <span>
                <ion-icon name="radio-button-on"></ion-icon>hello
              </span>
              <span>
                <ion-icon name="trash-bin"></ion-icon>
              </span>
            </li> -->
          </ul>
        </div>

        <div class="additional">
          <p>Pre-requisites</p>
          <a href="#" onclick="addRequirement()">Add</a>
        </div>

        <div class="requirementList">
          <ul id="requirementList">
            <!-- <li>
              <span>
                <ion-icon name="radio-button-on"></ion-icon>hello
              </span>
              <span>
                <ion-icon name="trash-bin"></ion-icon>
              </span>
            </li> -->
          </ul>
        </div>

        <hr />

        <label for="">Course Description</label><br />
        <textarea name="" id="courseDescription"></textarea><br />

        <label for="">Who this course is for</label><br />
        <textarea name="" id="whoCourse"></textarea>
      </div>
      <!-- End Left Side -->

      <div class="centerbar"></div>

      <!-- Start Right Side -->
      <div class="right">
        <div class="chapterBar">
          <a href="../Controllers/uploadChapterController.php" class="button">Add Chapters</a>
        </div>

        <div class="chapters">
          <?php
          require_once "../Controllers/showChapterController.php";

          foreach ($result as $key => $value) {
            echo "<a href='#'>";
            echo "<div class='chapter'>";
            echo "<p>Chapter <span id='chapterId'>" . $value['chapter'] . "</span> : <span id='chapterTitle'>" . $value["chapterTitle"] . "</span> </p>";
            echo "</div>";
            echo "</a>";
          };
          ?>
          <!-- <a href="#">
            <div class="chapter">
              <p>Chapter <span id="chapterId">1</span> : <span id="chapterTitle">Nuclear Physics</span> </p>
            </div>
          </a> -->
        </div>
        <hr />

        <div class="form-input">
          <div class="preview">
            <img id="preview" />
          </div>
          <label for="courseCoverImage">Upload Cover Photo</label>
          <input type="file" accept="image/*" onchange="showPreview(event);" id="courseCoverImage" />
        </div>

        <label for="">Course Price</label><br />
        <input type="text" id="coursePrice" /><br />

        <label for="">Course Duration</label><br />
        <input type="text" id="courseDuration" /><br />

        <label for="">Level</label><br />
        <select name="example" id="courseLevel">
          <option value="basic" selected>Basic</option>
          <option value="intermediate">Intermediate</option>
          <option value="advance">Advance</option>
        </select><br />

        <label for="">Categories</label><br />
        <select name="example" id="courseCategory">
          <option value="basic" selected>Basic</option>
          <option value="intermediate">Intermediate</option>
          <option value="advance">Advance</option>
        </select><br />

        <div class="promotion">
          <label for="">Promotion</label>
          <div class="percentage">
            <div id="number">0</div>
            <p>%</p>
            <div class="set">
              <div onclick="increaseValue()">
                <ion-icon name="chevron-up-outline"></ion-icon>
              </div>
              <div onclick="decreaseValue()">
                <ion-icon name="chevron-down-outline"></ion-icon>
              </div>
            </div>
          </div>
        </div>

        <span>Promoted Price - </span>
        <span id="promotedPrice">0</span>

        <div class="buttons">
          <a href="../Controllers/cancelUploadCourseController.php" class="button">Cancel</a>
          <span class="button" onclick="uploadCourse()">Save</span>
        </div>
      </div>
      <!-- End Right Side -->
    </form>

    <!-- Start Benefit Box -->
    <div class="benefit" id="benefitBox">
      <p class="is-size-5 has-text-weight-bold">Benefits</p>
      <input type="text" id="benefit" />

      <div class="buttons">
        <div class="button" onclick="closeBenefitBox()">Cancel</div>
        <div class="button" onclick="addBenefitData()">Save</div>
      </div>
    </div>
    <!-- End Benefit Box -->

    <!-- Start Benefit Box -->
    <div class="requirement" id="requirementBox">
      <p class="is-size-5 has-text-weight-bold">Pre-requisites</p>
      <input type="text" id="requirement" />

      <div class="buttons">
        <div class="button" onclick="closeRequirementBox()">Cancel</div>
        <div class="button" onclick="addRequirementData()">Save</div>
      </div>
    </div>
    <!-- End Benefit Box -->
  </div>
  <!-- ================== END FORM CONTAINER ===================== -->

</body>

</html>