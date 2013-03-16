/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


 $(document).ready(function() { 
            // definimos las opciones del plugin AJAX FORM
            var opciones= {
//                               beforeSubmit: mostrarLoader, //funcion que se ejecuta antes de enviar el form
                               success: mostrarRespuesta //funcion que se ejecuta una vez enviado el formulario
            };
             //asignamos el plugin ajaxForm al formulario myForm y le pasamos las opciones
            $('#hab_form').ajaxForm(opciones) ; 
 
             //lugar donde defino las funciones que utilizo dentro de "opciones"
//             function mostrarLoader(){
//                          $(#loader_gif).fadeIn("slow"); //muestro el loader de ajax
//             };
             function mostrarRespuesta (responseText){
                 alert(responseText);
//                           alert("Mensaje enviado: "+responseText);  //responseText es lo que devuelve la página contacto.php. Si en contacto.php hacemos echo "Hola" , la variable responseText = "Hola" . Aca hago un alert con el valor de response text
//                          $("#loader_gif").fadeOut("slow"); // Hago desaparecer el loader de ajax
//                          $("#ajax_loader").append("<br>Mensaje: "+responseText); // Aca utilizo la función append de JQuery para añadir el responseText  dentro del div "ajax_loader"
             };
 
        }); 
 