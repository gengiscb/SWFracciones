// JavaScript Document
var VERDAD = "TRUE";
window.onload = function(){   
    document.getElementsByName("btn_registrar")[0].onclick=validarCamposRegistro;
    var opciones= {
        success: mostrarRespuesta
    };
    var opciones2= {
        success: mostrarRespuestaAlumno
    };
    $('#form_reg_prof').ajaxForm(opciones) ; 
    function mostrarRespuesta (responseText){        
        if(responseText.trim()=="TRUE"){
            alert("Registro exitoso");    
            window.location="index.php";
        }
        else{
            alert("Registro fallido\n(Matricula en uso) ");    
        }
    };
    $('#form_reg_alum').ajaxForm(opciones2) ; 
    function mostrarRespuestaAlumno (responseText){
        if(responseText.trim()=="TRUE"){
            alert("Éxito al registrar al alumno");    
            window.location="vistaAlumnos.php?obtener_Alumnos=obtener";
        }
        else{
            alert("Registro fallido\n(Matricula en uso)");    
        }
    };
}
function validarCamposRegistro(){
    if(!validarNombre()){
        alert("Nombre inválido.");
        document.getElementById("nombre").focus();
        return false;
    }else{
        if(!validarApellido(document.getElementById("apellidoP"))){
            alert("Apellido inválido.");
            document.getElementById("apellidoP").focus();
            return false;			
        }else{
            if(!validarApellido(document.getElementById("apellidoM"))){
                alert("Apellido inválido.");
                document.getElementById("apellidoM").focus();
                return false;			
            }else{
                if(!esMatriculaValida(document.getElementById("matricula"))){
                    alert("Matricula invalida");
                    document.getElementById("matricula").focus();
                    return false;
                }else{
                    if(!validarContrasena()){
                        document.getElementById("password").focus();
                        return false;
                    }else{ 
                        return true;
                    }
                }
            }
        }
    }		
}

function esMatriculaValida(matricula){
    if (matricula != undefined && matricula.value != "" && esTamanoAceptable(matricula.value) ){
        return true;        
    }
    else{
        return false;
    }
}


function validarContraseniasRegistros(){
    var contrasenia1 = document.getElementById("password").value;
    var contrasenia2 = document.getElementById("cpassword").value;		
    if(contrasenia1==contrasenia2 && contrasenia1!=""){
        return true;
    }
    else{
        return false;
    }
}
	
function validarApellido(apellido){
    if(apellido.value!=""){
        return true;
    }
    else{
        return false;
    }
}
function validarNombre(){
    if(document.getElementById("nombre").value!=""){
        return true;
    }
    else{
        return false;
    }
}

function validarContrasena(){
    var passwordN=document.getElementById("password").value;
    var passwordC=document.getElementById("cpassword").value;
	
    if(!esContrasenaCorrecta(passwordN)){
        alert("Contraseña inválida");
        document.getElementById("password").focus();
        return false;
    }
    if(!esContrasenaCorrecta(passwordC)){
        alert("Confirma tu contraseña");
        document.getElementById("cpassword").focus();
        return false;
    }
    if(!sonContrasenasIguales()){			
        document.getElementById("cpassword").focus();
        return false;
    }
    return true;
}


function esContrasenaCorrecta(password){
    if(password==""){
		
        return false;
    }
    else{
        return true;
    }
}

function esTamanoAceptable(matricula){
    var tamano=matricula.length;
    if(tamano!=6){
        alert("La matricula debe tener 6 caracteres.");
        return false;
    }else{
        return true;
    }
}

function sonContrasenasIguales(){
    var password=document.getElementById("password").value;
    var confirmarPassword=document.getElementById("cpassword").value;
    if(password==confirmarPassword){
        return true;
    }else{
        alert("No coinciden las contraseñas");
        return false;
    }
}
