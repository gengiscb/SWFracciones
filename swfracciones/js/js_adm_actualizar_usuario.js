// JavaScript Document
window.onload=function(){
    document.getElementById("registrar").onclick=sonCamposCorrectos;
}

function sonCamposCorrectos(){
    var passwordN=document.getElementById("password_nuevo").value;
    var passwordC=document.getElementById("password_nuevo_v").value;
	
    if(!esContrasenaCorrecta(passwordN)){
        document.getElementById("password_nuevo").focus();
        return false;
    }
    if(!esContrasenaCorrecta(passwordC)){
        document.getElementById("password_nuevo_v").focus();
        return false;
    }
    if(!esTamanoAceptable(passwordN)){				
        document.getElementById("password_nuevo").focus();
        return false;
    }
    if(!esTamanoAceptable(passwordC)){				
        document.getElementById("password_nuevo_v").focus();
        return false;
    }
    if(!sonContrasenasIguales()){
        alert("Las contraseñas no coinciden.");				
        document.getElementById("password_nuevo_v").focus();
        return false;
    }
    //	return true;
    if(window.confirm("¿Está seguro que desea realizar esta acción?")){
        return true;
    }
    else{
        return false;
    }
}



function esContrasenaCorrecta(password){
    if(password==""){
        alert("Debe llenar todos los campos antes de actualizar.");
        return false;
    }
    else{
        return esTamanoAceptable(password);
    }
}

function esTamanoAceptable(password){
    var tamano=password.length;
    if(tamano<6){
        alert("La nueva contraseña debe tener un mínimo de 6 caracteres");
        return false;
    }else{
        return true;
    }
}

function sonContrasenasIguales(){
    var password=document.getElementById("password_nuevo").value;
    var confirmarPassword=document.getElementById("password_nuevo_v").value;
    if(password==confirmarPassword){
        return true;
    }else{
        return false;
    }
}