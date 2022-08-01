$("#addChapter").click(function () {
  let postData = {
    chapterTitle: $("#chapterTitle").val(),
  };

  $.ajax({
    url: "../Controllers/uploadChapterController.php",
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
