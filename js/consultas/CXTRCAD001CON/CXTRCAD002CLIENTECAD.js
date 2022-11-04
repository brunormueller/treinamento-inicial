$(document).ready(function () {
    $(document).on("click", "#btnRegistrarClient", function () {
      var dados = $("#form_cliente").serialize();
      $.ajax({
        type: "POST",
        url: "processos/CXTRCAD001CAD/CXTRCAD001CLIENTEREG.php",
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
  
    $("#form-edit").on("change", function () {});
  });
  
  $(function validaCampos() {
    $("#form_cliente").on("change", function () {
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
  