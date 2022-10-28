
var options = {
    onKeyPress: function (cpf, ev, el, op) {
        var mask = '00/00/0000';
        $('.dataDMY').mask(mask, op);
    }
}

$('.dataDMY').mask('00/00/0000', options);

$('.dataDMY').blur(function () {
    var valor = $(this).val();
    var valorSplit = valor.split('/');
    var valorInvalido = false;

    if (valorSplit.length == 3) {

        if ((valorSplit[0] <= 0 || valorSplit[0] >= 32) || (valorSplit[1] <= 0 || valorSplit[1] > 12) || (valorSplit[2] < 1000)) {
            valorInvalido = true;
        }
        else {
            var diasNoMes = new Date(valorSplit[2], valorSplit[1], 0).getDate();

            if (valorSplit[0] > diasNoMes) {
                valorInvalido = true;
            }
        }
    }
    else {
        valorInvalido = true;
    }

    if (valorInvalido) {
        $(this).val('');
    }
});