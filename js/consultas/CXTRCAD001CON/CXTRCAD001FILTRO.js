jQuery(document).ready(function () {
  vm = new Vue({
    el: "#div_filtro",
    data: {},
    methods: {
      filtrarForm() {
        var filtro_perfil = $("#filtro_perfil").val();
        var filtro_status = $("#filtro_status").val();
        var filtro_inicio = $("#filtro_inicio").val();
        var filtro_fim = $("#filtro_fim").val();
        vm.enviarFiltro(
          filtro_perfil,
          filtro_status,
          filtro_inicio,
          filtro_fim
        );
      },
      enviarFiltro(filtro_perfil, filtro_status, filtro_inicio, filtro_fim) {
        $("#resultado_grid").empty();
        var carrega = document.getElementById("aguarde");
        carrega.style.display = "block";

        jQuery.ajax({
          type: "POST",
          url: "processos/CXTRCAD001CON/CXTRCAD001FILTRO.php",
          data: {
            filtro_perfil: filtro_perfil,
            filtro_status: filtro_status,
            filtro_inicio: filtro_inicio,
            filtro_fim: filtro_fim,
          },
          success: function (data) {
            var exp = data.split("_");

            if (exp[0] == 0) {
              var msg = exp[1];
              carrega.style.display = "none";

              $("#erro_filtro").empty();
              $("#erro_filtro").html("<center>" + msg + "</center>");
              $("#erro_filtro").attr("style", "display:block;");

              setTimeout(() => {
                $("#erro_filtro").attr("style", "display:none;");
              }, 2000);
            } else {
              const colunas = ":visible";
              const nomeConsulta = "Consulta";

              carrega.style.display = "none";
              $("#resultado_grid").empty();
              $("#resultado_grid").html(data);
            }

            return false;
          },
        });
        return false;
      },
    },
  });

  $(document).on("click", "#confirma_editar_cliente", function () {
    var retorno = ValidarForm();
    if (retorno == "") {
      var dados = $("#form-edit").serialize();
      $.ajax({
        type: "POST",
        url: "processos/CXTRCAD001CON/CXTRCAD001GRAEDIT.php",
        data: dados,
        success: function (retornoAjax) {
          if (retornoAjax == 1) {
            var icone = "success";
            var mensagem = "Registro atualizado com sucesso!";
          } else {
            var icone = "error";
            var mensagem = "Erro:" + retornoAjax;
          }
          Swal.fire({
            title: "Mensagem do sistema",
            icon: icone,
            html: mensagem,
          }).then(() => {
            if (retornoAjax == 1) {
              window.location.reload();
            }
          });
          return false;
        },
      });
    } else {
      var campo_retorno = retorno;
      $("#" + campo_retorno).focus();
      return false;
    }
    return false;
  });

  //Filtrar();
  return false;
});

function ValidarForm() {
  var forms = document.getElementsByClassName("needs-validation");
  let obrigatorios = true;
  var campo = "";

  $(".obrigatorios").each(function () {
    if ($(this).val() == "") {
      if (campo == "") {
        campo = $(this).attr("id");
      }
      obrigatorios = false;
      return;
    }
  });
  var validation = Array.prototype.filter.call(forms, function (form) {
    form.classList.add("was-validated");
  });

  return campo;
}
