// JavaScript Document
window.onload = function(){    
    document.getElementById("acceder").onclick=validarCamposAcceso;
    validarRecuerdame();
}

function validarCamposAcceso(){
    if(!esMatriculaValida(document.getElementById("usuario"))){
        alert("Usuario incorrecto");
        document.getElementById("usuario").focus();
        return false;
    }
    else{
        if(!validarContrasenia()){
            alert("Escriba correctamente la contraseña.");
            document.getElementById("password").focus();
            return false;
        }
        else{
            return true;
        }
    }		
}
function esMatriculaValida(matricula){
    if (matricula != undefined && matricula.value != "" ){
       
           return true;
        
    }
    else{
        return false;
    }
}

function validarContrasenia(){
    var contrasenia1 = document.getElementById("password").value;
    if(contrasenia1!=""){
        return true;
    }
    else{
        return false;
    }
}	
