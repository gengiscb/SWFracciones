/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    var opciones= {
        success: mostrarRespuesta 
    };
    $('#hab_form').ajaxForm(opciones) ; 
    function mostrarRespuesta (responseText){
        alert($.trim(responseText));

    };
});
 