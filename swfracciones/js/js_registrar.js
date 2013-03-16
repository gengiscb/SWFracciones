// JavaScript Document
window.onload = function(){   
    document.getElementById("registrar").onclick=validarCamposRegsitro;
}
function validarCamposRegsitro(){
    if(!validarNombre()){
        alert("Nombre inválido.");
        document.getElementById("nombre").focus();
        return false;
    }
    else{
        if(!validarApellido()){
            alert("Apellido inválido.");
            document.getElementById("apellido").focus();
            return false;			
        }
        else{
            if(!esEmailValido(document.getElementById("email"))){
                alert("Email inválido.");
                document.getElementById("email").focus();
                return false;
            }
            else{
                if(!validarContrasena()){
//                    alert("Escriba correctamente la contraseña");
                    document.getElementById("password_nuevo").focus();
                    return false;
                }
                else{ 
                    return true;
                }
//    if(window.confirm("Esta seguro que desea realizar esta acción")){
//        return true;
//    }
//    else{
//        return false;
//    }
            }
        }
    }
		
}

function esEmailValido(email){
    if (email != undefined && email.value != "" ){
        var expreEmail=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
        if(!email.value.match(expreEmail)){
            return false;
        }
        else{
            return true;
        }
    }
    else{
        return false;
    }
}
function validarContraseniasRegistros(){
    var contrasenia1 = document.getElementById("password_nuevo").value;
    var contrasenia2 = document.getElementById("password_nuevo_v").value;		
    if(contrasenia1==contrasenia2 && contrasenia1!=""){
        return true;
    }
    else{
        return false;
    }
}
	
function validarApellido(){
    if(document.getElementById("apellido").value!=""){
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
	return true;
}


function esContrasenaCorrecta(password){
	if(password==""){
		alert("Debe llenar los campos de contraseña antes de actualizar.");
		return false;
	}
	else{
		return esTamanoAceptable(password);
	}
}

function esTamanoAceptable(password){
	var tamano=password.length;
	if(tamano<6){
		alert("La nueva contraseña debe tener un mínimo de 6 caracteres.");
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
