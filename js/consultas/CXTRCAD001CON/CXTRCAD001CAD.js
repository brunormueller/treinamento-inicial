$(document).ready(function () {
  // vcad = new Vue({
  //   el: "#div_cad",
  //   data: {},
  //   methods: {
  //     cadastrarForm() {
  //       var dados = $("#form_usuario").serialize();
  //       vcad.envioForm(dados);
  //     },

  //     envioForm(dados) {
  $(document).on("click", "#btnRegistrar", function () {
    var dados = $("#form_usuario").serialize();
    $.ajax({
      type: "POST",
      url: "processos/CXTRCAD001CAD/CXTRCAD001CADREG.php",
      data: dados,
      success: function (data) {
        var exp = data.split("_?_");

        // var status = exp[0];
        var mensagem = exp[1];

        if (exp[0] == 1) {
          Swal.fire({
            title: "Sucesso",
            html: "Usuario inserido com sucesso!",
            icon: "success",
          }).then(function () {
            window.location.reload();
          });
        } else {
          Swal.fire({
            title: "Aviso",
            html: mensagem,
            icon: "error",
          });
        }
        return false;
      },
    });
    return false;
  });

  //   },
  // });

  // $(document).on("click", "#registrar", function () {
  //   var dados = $("#form_usuario").serialize();

  // });

  $("#form-edit").on("change", function () {});
});

$(function validaCampos() {
  $("#form_usuario").on("change", function () {
    input = document.form_edit;
  });
});

function mascara(i) {
  var v = i.value;

  if (isNaN(v[v.length - 1])) {
    i.value = v.substring(0, v.length - 1);
    return;
  }

  i.setAttribute("maxlength", "14");
  if (v.length == 3 || v.length == 7) i.value += ".";
  if (v.length == 11) i.value += "-";
}
