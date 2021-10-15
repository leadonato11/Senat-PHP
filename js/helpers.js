$(function () {
  $("#formCrearAlimento").on("submit", function (event) {
    event.preventDefault();
  });
});

function confirmDelete() {
  var respuesta = confirm("¿Está Seguro?");

  if (respuesta == true) {
    return true;
  } else {
    return false;
  }
}
