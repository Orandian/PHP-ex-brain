var benelists = document.getElementById("benefitList");
var reqlists = document.getElementById("requirementList");

addRequirementInit();
addBenefitInit();

// Submit form data via Ajax
function addRequirementData() {
  let postData = {
    requirement: $("#requirement").val(),
  };

  $.ajax({
    // url: "./uploadRequirementsController.php",
    url: "../Controllers/uploadRequirementsController.php",
    type: "POST",
    data: { send: JSON.stringify(postData) },
    success: function (res) {
      document.getElementById("requirementList").innerHTML = "";
      let requirementData = JSON.parse(res);

      for (const requirement of requirementData) {
        addRequirementList(requirement.requirements);
      }
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function addRequirementInit() {
  $.get("../Controllers/uploadRequirementsController.php", function (data) {
    // Display the returned data in browser
    // console.log(data);
    let requirementData = JSON.parse(data);

    for (const requirement of requirementData) {
      addRequirementList(requirement.requirements);
    }
  });
}

function addBenefitData() {
  let postData = {
    benefit: $("#benefit").val(),
  };

  $.ajax({
    url: "../Controllers/uploadBenefitsController.php",
    type: "POST",
    data: { send: JSON.stringify(postData) },
    success: function (res) {
      document.getElementById("benefitList").innerHTML = "";
      let benefitData = JSON.parse(res);

      // console.log(benefitData);

      for (const benefit of benefitData) {
        addBenefitList(benefit.benefits);
      }
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function addBenefitInit() {
  $.get("../Controllers/uploadBenefitsController.php", function (data) {
    let benefitData = JSON.parse(data);

    for (const benefit of benefitData) {
      addBenefitList(benefit.benefits);
    }
  });
}

function uploadCourse() {
  var file_data = $("#courseCoverImage").prop("files")[0];
  var form_data = new FormData();
  form_data.append("file", file_data);

  form_data.append("courseTitle", $("#courseTitle").val());
  form_data.append("aboutCourse", $("#aboutCourse").val());
  form_data.append("courseDescription", $("#courseDescription").val());
  form_data.append("whoCourse", $("#whoCourse").val());
  form_data.append("coursePrice", $("#coursePrice").val());
  form_data.append("courseDuration", $("#courseDuration").val());
  form_data.append("courseLevel", $("#courseLevel").val());
  form_data.append("courseCategory", $("#courseCategory").val());
  form_data.append("coursePercentage", $("#number").text());
  form_data.append("coursePromotedPrice", $("#promotedPrice").text());

  $.ajax({
    url: "../Controllers/uploadCourseController.php",
    type: "POST",
    contentType: false,
    cache: false,
    processData: false,
    data: form_data,
    success: function (res) {
      location.href = res;
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function showPreview(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("preview");
    preview.src = src;
    preview.style.display = "block";
  }
}

function increaseValue() {
  var value = parseInt(document.getElementById("number").innerHTML, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  value > 100 ? (value = 100) : "";
  document.getElementById("number").innerHTML = value;
  calculatePromotedPrice(value);
}

function decreaseValue() {
  var value = parseInt(document.getElementById("number").innerHTML, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? (value = 1) : "";
  value--;
  document.getElementById("number").innerHTML = value;
  calculatePromotedPrice(value);
}

function calculatePromotedPrice(percentage) {
  var coursePrice = +document.getElementById("coursePrice").value;
  var promotedPrice = document.getElementById("promotedPrice");
  var promotion = 0;
  if (coursePrice.value == "") {
    promotedPrice.innerHTML = 0;
  } else {
    promotion = coursePrice - Math.round((coursePrice / 100) * percentage);
    promotedPrice.innerHTML = promotion;
  }
}

function addBenefit() {
  document.getElementById("benefitBox").style.display = "block";
}

function closeBenefitBox() {
  document.getElementById("benefitBox").style.display = "none";
  document.getElementById("benefit").value = "";
}

function addRequirement() {
  document.getElementById("requirementBox").style.display = "block";
}

function closeRequirementBox() {
  document.getElementById("requirementBox").style.display = "none";
  document.getElementById("requirement").value = "";
}

function addBenefitList(benefit) {
  benelists.innerHTML += `
  <li>
    <span class="benefitData">
      ${benefit}
    </span>
    <span>
      <ion-icon name="trash-bin" onclick="trash(this)"></ion-icon>
    </span>
  </li>
  `;
  benefit.value = "";
  // updateBenefitlocalstorage();
  closeBenefitBox();
}

function addRequirementList(requirement) {
  reqlists.innerHTML += `
      <li>
      <span class="requirementData">
        ${requirement}
      </span>
      <span>
        <ion-icon name="trash-bin" onclick="trash(this)"></ion-icon>
      </span>
      </li>
    `;
  requirement.value = "";
  closeRequirementBox();
  // updateRequirementlocalstorage();
}

// function updateBenefitlocalstorage() {
//   let benefits = document.querySelectorAll(".benefitData");

//   const benefitDatas = [];

//   benefits.forEach((benefit) => {
//     benefitDatas.push({
//       benefits: benefit.innerText,
//     });
//   });

//   localStorage.setItem("benefits", JSON.stringify(benefitDatas));
// }

// function updateRequirementlocalstorage() {
//   let requirements = document.querySelectorAll(".requirementData");

//   const requirementDatas = [];

//   requirements.forEach((requirement) => {
//     requirementDatas.push({
//       requirements: requirement.innerText,
//     });
//   });

//   localStorage.setItem("requirements", JSON.stringify(requirementDatas));
// }

function trash(e) {
  e.parentElement.parentElement.remove();
  // updateBenefitlocalstorage();
  // updateRequirementlocalstorage();
}
