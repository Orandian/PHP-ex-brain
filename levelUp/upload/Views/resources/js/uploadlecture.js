addQuizInit();

// Submit form data via Ajax
function addQuizz() {
  let postData = {
    question: $("#question").val(),
    answer1: $("#answer1").val(),
    answer2: $("#answer2").val(),
    answer3: $("#answer3").val(),
    realAnswer: $("#realAnswer").val(),
  };
  $.ajax({
    url: "../Controllers/uploadQuizzController.php",
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
  $.get("../Controllers/uploadQuizzController.php", function (data) {
    let quizzData = JSON.parse(data);

    for (const quizz of quizzData) {
      addQuizzUI(quizz);
    }
  });
}

var quizzLists = document.getElementById("quizzs");

let quizzArray = [];

// const quizzs = JSON.parse(localStorage.getItem("quizz"));

// if (quizzs) {
//   quizzArray.push(quizzs[0]);
//   quizzs.forEach((quizz) => {
//     quizzLists.innerHTML += `
//     <div class="quizz">
//     <div class="dropdown is-hoverable">
//         <div class="dropdown-trigger">
//             <div class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
//                 <span>${quizz.quizzs.quizzQuestion}</span>
//                 <span class="icon is-small">
//                     <ion-icon name="chevron-down-outline"></ion-icon>
//                 </span>
//             </div>
//         </div>
//         <div class="dropdown-menu" id="dropdown-menu4" role="menu">
//             <div class="dropdown-content">
//                 <div class="dropdown-item">
//                     ${quizz.quizzs.quizzAnswer1}
//                 </div>
//                 <div class="dropdown-item">
//                     ${quizz.quizzs.quizzAnswer2}
//                 </div>
//                 <div class="dropdown-item">
//                     ${quizz.quizzs.quizzAnswer3}
//                 </div>
//             </div>
//         </div>
//     </div>
//     <div class="edit">
//         <a href="#">Edit</a>
//         <a href="#">
//             <ion-icon name="trash-bin-outline"></ion-icon>
//         </a>
//     </div>
//   </div>
//     `;
//   });
// }

function openQuizzBox() {
  document.getElementById("quizzBox").style.display = "block";
}

function closeQuizzBox() {
  document.getElementById("quizzBox").style.display = "none";
}

function addQuizzUI(quizzUI) {
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
                <div class="dropdown-item" answer2>
                    ${answer2}
                </div>
                <div class="dropdown-item" answer3>
                    ${answer3}
                </div>
            </div>
        </div>
    </div>
    <div class="edit">
        <a href="#">Edit</a>
        <a href="#">
            <ion-icon name="trash-bin-outline"></ion-icon>
        </a>
    </div>
  </div>
    `;

  closeQuizzBox();
  updateQuizz(question, answer1, answer2, answer3, realAnswer);
}

function updateQuizz(question, answer1, answer2, answer3, realAnswer) {
  quizzArray.push({
    quizzs: {
      quizzQuestion: question,
      quizzAnswer1: answer1,
      quizzAnswer2: answer2,
      quizzAnswer3: answer3,
      quizzRealAnswer: realAnswer,
    },
  });
  localStorage.setItem("quizz", JSON.stringify(quizzArray));
}

function cancel() {
  localStorage.removeItem("quizz");
}

function addLecture() {
  var lectureTitle = document.getElementById("lectureTitle").value;
  var lectureDescription = document.getElementById("lectureDescription").value;
  var lectureScripts = document.getElementById("lectureScripts").value;

  localStorage.setItem("lectureTitle", lectureTitle);
  localStorage.setItem("lectuteDescription", lectureDescription);
  localStorage.setItem("lectureScripts", lectureScripts);

  let date = new Date();
}

function showPreview(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
