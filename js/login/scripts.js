jQuery(document).ready(function () {
  $(document).on("click", "#enviar", function () {
    /* capturar todos os dados do formulario "serializar" */
    var dados = $("#form").serialize();

    /* Capturar campo por campo */
    var usuario = $("#usuario").val();
    var senha = $("#senha").val();

    jQuery.ajax({
      type: "POST",
      url: "processos/login/verificaLogin.php",
      data: { usuario: usuario, senha: senha },
      //data: dados, "quando envia serializado"
      success: function (retornoAjax) {
        var exp = retornoAjax.split("_?_");

        var status = exp[0];
        var mensagem = exp[1];

        if (status == 1) {
          //script para logar
          location.href = "dashboard";
        } else {
          Swal.fire({
            //title: 'Login',
            icon: "error",
            html: mensagem,
          });
        }

        return false;
      },
    });

    return false;
  });
  return false;
});
