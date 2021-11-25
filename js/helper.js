$("#imagenAlimento").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);

  const filename = pathsplit[pathsplit.length - 1];
  $("#imagenLabel").text(filename);
  $("#imagePreview").attr("src", filepath);

  const srcImage = URL.createObjectURL(e.target.files[0]);
  $("#imagePreview").attr("src", srcImage);
});

$("#inputGroupFile01").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);
  const filename = pathsplit[pathsplit.length - 1];
  const imagePorc01 = document.getElementById("outputPorc01");
  imagePorc01.src = URL.createObjectURL(e.target.files[0]);

  $("#imagenLabelPorc01").text(filename);
  $("#outputPorc01").show();
  $("#imagePreviewPorc01").attr("src", filepath);
  $("#imagePreviewPorc01").attr("src", imagePorc01);
});

$("#inputGroupFile02").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);
  const filename = pathsplit[pathsplit.length - 1];
  const imagePorc02 = document.getElementById("outputPorc02");
  imagePorc02.src = URL.createObjectURL(e.target.files[0]);

  $("#imagenLabelPorc02").text(filename);
  $("#outputPorc02").show();
  $("#imagePreviewPorc02").attr("src", filepath);
  $("#imagePreviewPorc02").attr("src", imagePorc02);
});

$("#inputGroupFile03").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);
  const filename = pathsplit[pathsplit.length - 1];
  const imagePorc03 = document.getElementById("outputPorc03");
  imagePorc03.src = URL.createObjectURL(e.target.files[0]);

  $("#imagenLabelPorc03").text(filename);
  $("#outputPorc03").show();
  $("#imagePreviewPorc03").attr("src", filepath);
  $("#imagePreviewPorc03").attr("src", imagePorc03);
});

$("#inputGroupFile04").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);
  const filename = pathsplit[pathsplit.length - 1];
  const imagePorc04 = document.getElementById("outputPorc04");
  imagePorc04.src = URL.createObjectURL(e.target.files[0]);

  $("#imagenLabelPorc04").text(filename);
  $("#outputPorc04").show();
  $("#imagePreviewPorc04").attr("src", filepath);
  $("#imagePreviewPorc04").attr("src", imagePorc04);
});