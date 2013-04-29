/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var parametros = {
    "valorCaja1" : valorCaja1,
    "valorCaja2" : valorCaja2
};
$.ajax({
    data:  parametros,
    url:   'ejemplo_ajax_proceso.php',
    type:  'post',
    beforeSend: function () {
        $("#resultado").html("Procesando, espere por favor...");
    },
    success:  function (response) {
        $("#resultado").html(response);
    }
});