addQuizInit();

// Submit form data via Ajax
// $("#addQuizz").click(function () {
// console.log("hello");
// let postData = {
//   question: $("#question").val(),
//   answer1: $("#answer1").val(),
//   answer2: $("#answer2").val(),
//   answer3: $("#answer3").val(),
//   realAnswer: $("#realAnswer").val(),
// };
// $.ajax({
//   url: "../Controller/uploadQuizzController.php",
//   type: "POST",
//   data: { send: JSON.stringify(postData) },
//   success: function (res) {
//     document.getElementById("quizzs").innerHTML = "";
//     $("#question").val("");
//     $("#answer1").val("");
//     $("#answer2").val("");
//     $("#answer3").val("");
//     let quizzData = JSON.parse(res);
//     for (const quizz of quizzData) {
//       addQuizzUI(quizz);
//     }
//   },
//   error: function (err) {
//     console.log(err);
//   },
// });
// });

function addQuizz() {
  let postData = {
    question: $("#question").val(),
    answer1: $("#answer1").val(),
    answer2: $("#answer2").val(),
    answer3: $("#answer3").val(),
    realAnswer: $("#realAnswer").val(),
  };
  $.ajax({
    url: "../Controller/uploadQuizzController.php",
    type: "POST",
    data: { send: JSON.stringify(postData) },
    success: function (res) {
      document.getElementById("quizzs").innerHTML = "";
      $("#question").val("");
      $("#answer1").val("");
      $("#answer2").val("");
      $("#answer3").val("");
      let quizzData = JSON.parse(res);

      for (const quizz of quizzData) {
        addQuizzUI(quizz);
      }
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function addQuizInit() {
  $.get("../Controller/uploadQuizzController.php", function (data) {
    let quizzData = JSON.parse(data);

    for (const quizz of quizzData) {
      addQuizzUI(quizz);
    }
  });
}

var quizzLists = document.getElementById("quizzs");

let quizzArray = [];

function openQuizzBox() {
  document.getElementById("quizzBox").style.display = "block";
}

function closeQuizzBox() {
  document.getElementById("quizzBox").style.display = "none";
}

function addQuizzUI(quizzUI) {
  var quizzId = quizzUI.id;
  var question = quizzUI.question;
  var answer1 = quizzUI.answer1;
  var answer2 = quizzUI.answer2;
  var answer3 = quizzUI.answer3;
  var realAnswer = quizzUI.realAnswer;

  quizzLists.innerHTML += `
  <div class="quizz">
    <div class="dropdown is-hoverable">
        <div class="dropdown-trigger">
            <div class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
                <span class="question">${question}</span>
                <span class="icon is-small">
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </span>
            </div>
        </div>
        <div class="dropdown-menu" id="dropdown-menu4" role="menu">
            <div class="dropdown-content">
                <div class="dropdown-item answer1">
                    ${answer1}
                </div>
                <div class="dropdown-item answer2">
                    ${answer2}
                </div>
                <div class="dropdown-item answer3">
                    ${answer3}
                </div>
                <div class="dropdown-item realAnswer">
                    ${realAnswer}
                </div>
            </div>
        </div>
    </div>
    <div class="edit" onclick="deleteQuizz(this)" id=${quizzId}>
      <ion-icon name="trash-bin-outline"></ion-icon>
    </div>
  </div>
    `;

  closeQuizzBox();
}

function deleteQuizz(e) {
  e.parentElement.remove();

  let postData = {
    id: e.id,
  };

  $.ajax({
    url: "../Controller/deleteQuizzController.php",
    type: "POST",
    data: { send: JSON.stringify(postData) },
    success: function (res) {
      location.url = res;
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function showPreview(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("videoPreview");
    preview.src = src;
    preview.style.display = "block";
  }
}

// FORM VALIDATION
$(document).mousemove(activeLectureButton);

$(document).click(activeLectureButton);

$("#quizzBox").mousemove(activeQuizzButton);

$("#quizzBox").click(activeQuizzButton);

function activeLectureButton() {
  if (
    $("#videoPreview").prop("src") !== "" &&
    $("#lectureTitle").val() !== "" &&
    $("#lectureDescription").val() !== "" &&
    $("#lectureScripts").val() !== ""
  ) {
    $("#saveLectureButton").removeAttr("disabled");
  } else {
    $("#saveLectureButton").attr("disabled", true);
  }
}

function activeQuizzButton() {
  if (
    $("#question").val() !== "" &&
    $("#answer1").val() !== "" &&
    $("#answer2").val() !== "" &&
    $("#answer3").val() !== ""
  ) {
    $("#addQuizz").removeAttr("disabled");
  } else {
    $("#addQuizz").attr("disabled", true);
  }
}
