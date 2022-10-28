function enviarFoto(id_usuario) {
  var form = new FormData();

  form.append("file", $("#nova_foto").prop("files")[0]);
  form.append("id_usuario", id_usuario);

  $.ajax({
    url: "processos/CXTRCAD001CON/CXTRCAD001GRAVAFOTO.php",
    data: form,
    processData: false,
    contentType: false,
    type: "POST",
    success: function (retornoAjax) {
      var exp = retornoAjax.split("_?_");
      var status = exp[0];
      var msg = exp[1];

      if (status == 1) {
        $("#div_imagem_usuario").empty();
        $("#div_imagem_usuario").html(
          '<img id="imagem_usuario" style="width: 60px; height: 60px;" src="img/aguarde.gif" />'
        );

        setTimeout(() => {
          $("#div_imagem_usuario").empty();
          $("#div_imagem_usuario").html(
            '<img id="imagem_usuario" style="width: 160px; height: 160px;" src="' +
              msg +
              '" />'
          );
        }, 1000);

      } else {
        Swal.fire({
          title: "Confirmação",
          icon: "error",
          html: "Erro!" + msg,
        });
      }
      return false;
    },
  });
  return false;
}

jQuery(document).ready(function () {
  $(document).on("click", ".btnEditar", function () {
    var id_usuario = $(this).attr("id");

    jQuery.ajax({
      type: "POST",
      url: "processos/CXTRCAD001CON/CXTRCAD001EDIT.php",
      data: { id_usuario: id_usuario },
      success: function (retornoAjax) {
        $("#dados_editar_cliente").empty();
        $("#dados_editar_cliente").html(retornoAjax);
        $("#ModalEditarCliente").modal("show");

        return false;
      },
    });
    return false;
  });

  $(document).on("click", ".btnFoto", function () {
    var id_usuario = $(this).attr("id");
    jQuery.ajax({
      type: "POST",
      url: "processos/CXTRCAD001CON/CXTRCAD001BUSCAFOTO.php",
      data: { id_usuario: id_usuario },
      success: function (retornoAjax) {
        Swal.fire({
          title: "Foto do Usuário",
          //icon: 'question',
          html: retornoAjax,
          confirmButtonText: "Confirmar",
          cancelButtonText: "Cancelar",
          showCancelButton: true,
          reverseButtons: true,
          confirmButtonColor: "red",
          cancelButtonColor: "green",
          preConfirm: () => {
            var campo_foto = $("#nova_foto").val();

            if (campo_foto == "") {
              Swal.showValidationMessage("Carregue uma Foto!");
            } else {
              enviarFoto(id_usuario);
            }
            return false;
          },
        });
      },
    });

    return false;
  });

  $(document).on("click", ".btnDesativar", function () {
    var id_usuario = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "processos/CXTRCAD001CON/CXTRCAD001DES.php",
      data: { id_usuario: id_usuario },
      success: function (retornoAjax) {
        $("#dados_desativar").empty();
        $("#dados_desativar").html(retornoAjax);
        $("#ModalDesativar").modal("show");
      },
    });
    return false;
  });

  return false;
});
