// JavaScript Document
window.onload=function(){
	document.getElementById("guardar").onclick=sonCamposCorrectos;
}

function sonCamposCorrectos(){
	var nombre=document.getElementById("nombre").value;
	if(!esNombreCorrecto(nombre)){
		alert("Su nombre no puede estar vacío.");
		document.getElementById("nombre").focus();
		return false;
	}
	var apellido=document.getElementById("apellido").value;
	if(!esNombreCorrecto(apellido)){
		alert("Su apellido no puede estar vacío.");
		document.getElementById("apellido").focus();
		return false;
	}
	if(!esGeneroSeleccionado()){
		alert("Debe seleccionar su género.");
		return false;
	}
	if(!validarContrasena()){
		return false;
	}
        if(window.confirm("¿Está seguro que desea continuar con la Modificación?")){
            return true;
        }
        else{
            return false;
        }
}

function esNombreCorrecto(nombre){
	if(nombre==""){
		return false;
	}
	else{
		return true;
	}
}

function esGeneroSeleccionado(){
	var m=document.getElementsByName("sexo");
	var i=0;
	while(i<m.length){
		var opcion=m[i].checked;
		if(opcion){
			return true;
		}
		i++;
	}
	return false;
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
		alert("La nueva contraseña debe tener un minimo de 6 caracteres.");
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
