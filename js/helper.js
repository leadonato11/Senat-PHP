// Crear usuario
$("#imagenUsuario").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);

  const filename = pathsplit[pathsplit.length - 1];
  $("#labelImagenUsuario").text(filename);
  $("#previewImagenUsuario").attr("src", filepath);

  const srcImage = URL.createObjectURL(e.target.files[0]);
  $("#previewImagenUsuario").attr("src", srcImage);
});

//Crear alimento imagen representativa
$("#imagenAlimento").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);

  const filename = pathsplit[pathsplit.length - 1];
  $("#imagenLabel").text(filename);
  $("#imagePreview").attr("src", filepath);

  const srcImage = URL.createObjectURL(e.target.files[0]);
  $("#imagePreview").attr("src", srcImage);
});

// Crear alimento porción 1
$("#inputGroupFile01").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);

  const filename = pathsplit[pathsplit.length - 1];
  $("#imagenLabelPorc01").text(filename);
  $("#outputPorc01").attr("src", filepath);

  const imagePorc01 = URL.createObjectURL(e.target.files[0]);
  $("#outputPorc01").attr("src", imagePorc01);
  $("#outputPorc01").show()
});

// Crear alimento porción 2
$("#inputGroupFile02").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);

  const filename = pathsplit[pathsplit.length - 1];
  $("#imagenLabelPorc02").text(filename);
  $("#outputPorc02").attr("src", filepath);

  const imagePorc02 = URL.createObjectURL(e.target.files[0]);
  $("#outputPorc02").attr("src", imagePorc02);
  $("#outputPorc02").show()
});

// Crear alimento porción 3
$("#inputGroupFile03").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);

  const filename = pathsplit[pathsplit.length - 1];
  $("#imagenLabelPorc03").text(filename);
  $("#outputPorc03").attr("src", filepath);

  const imagePorc03 = URL.createObjectURL(e.target.files[0]);
  $("#outputPorc03").attr("src", imagePorc03);
  $("#outputPorc03").show()
});

// Crear alimento porción 4
$("#inputGroupFile04").on("change", function (e) {
  const filepath = e.target.value;
  const pathsplit = filepath.split(/[\\\/]/);

  const filename = pathsplit[pathsplit.length - 1];
  $("#imagenLabelPorc04").text(filename);
  $("#outputPorc04").attr("src", filepath);

  const imagePorc04 = URL.createObjectURL(e.target.files[0]);
  $("#outputPorc04").attr("src", imagePorc04);
  $("#outputPorc04").show()
});