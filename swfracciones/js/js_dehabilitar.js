$(document).ready(function() { 
    var opciones= {
        success: mostrarRespuesta //funcion que se ejecuta una vez enviado el formulario
    };
    $('#deshab_form').ajaxForm(opciones) ; 
    function mostrarRespuesta (responseText){
        alert(responseText);
    };
 
}); 
 