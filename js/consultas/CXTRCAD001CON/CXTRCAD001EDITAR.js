$(document).ready(function() {


    $('#form-edit').on('change', function () {
       
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

function mascaraDate(i) {
    var v = i.value;

    if (isNaN(v[v.length - 1])) {
        i.value = v.substring(0, v.length - 1);
        return;
    }
    i.setAttribute("maxlength", "10");
    if (v.length == 2 || v.length == 5) i.value += "/";
}

// $(document).on("click", "#confirma_editar_cliente", function () {
//     $.ajax({
//         type: 'POST',
//         url: 'index.php'
//     });

// });


$(function validaCampos() {
    $('#form-edit').on('change', function () {
        input = document.form_edit;




    });
});



function enviarEdicao(id_usuario) {
    var id_usuario = $(this).attr("id")

    $.ajax({
        type: 'POST',
        url: 'processos/CXTRCAD001CON/CXTRCAD001GRAEDIT.php',
        data: { id_usuario: id_usuario },
        success: function (data) {
            $('#ModalEditarCliente').modal("hide");
            consultar();
        }
    });

};




