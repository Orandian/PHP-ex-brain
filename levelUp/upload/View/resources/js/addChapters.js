$("#addChapter").click(function () {
  let postData = {
    chapterTitle: $("#chapterTitle").val(),
  };

  $.ajax({
    url: "../Controller/uploadChapterController.php",
    type: "POST",
    data: { send: JSON.stringify(postData) },
    success: function (res) {
      location.href = res;
    },
    error: function (err) {
      console.log(err);
    },
  });
});

// FORM VALIDATION
$(document).mousemove(activeChapterButton);

$(document).click(activeChapterButton);

function activeChapterButton() {
  if (
    $("#chapterTitle").val() !== "" &&
    $("#lectureList").prop("innerText") !== ""
  ) {
    $("#addChapter").removeAttr("disabled");
  } else {
    $("#addChapter").attr("disabled", true);
  }
}
