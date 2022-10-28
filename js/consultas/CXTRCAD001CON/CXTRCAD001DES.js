


$(document).ready(function() {

    consultar();
    return false;

});
    // $(document).on("click", "#confirma_desativar", function() {
    //     var id_usuario = $(this).attr("id")
    function alterarStatus(){
        var id_usuario = $(this).attr("id")
        $.ajax({
            type: 'POST',
            url: 'processos/CXTRCAD001CON/CXTRCAD001DES.php',
            data: {id_usuario : id_usuario },
            success: function (data) {                
                $('#ModalDesativar').modal("hide");
                consultar();
                
            }
        });
       
    };

   


function consultar() {
    $.ajax({
        type: 'POST',
        url: 'processos/CXTRCAD001CON/CXTRCAD001FILTRO.php',
        data: '',
        success: function (data) {
            $('#tab_grid').html(data);

        }
    });

}