$(document).ready(function () {
    relogio();
    setTimeout(function(){
        window.location.reload(1);
    }, 60*60000);

});

function relogio(){
    horaAtual = new Date();
    horaFormatada = pad(horaAtual.getHours(), 2) + ":" +  pad(horaAtual.getMinutes(), 2) + ":" + pad(horaAtual.getSeconds(), 2);
    $('.clock').html(horaFormatada);
    setTimeout("relogio()",1000)
}

function pad(str, length) {
    const resto = length - String(str).length;
    return '0'.repeat(resto > 0 ? resto : '0') + str;
}
