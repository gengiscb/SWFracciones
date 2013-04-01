function nuevoAjax()
{ 
    /* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
    var xmlhttp=false; 
    try 
    { 
        // Creacion del objeto AJAX para navegadores no IE
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
    }
    catch(e)
    { 
        try
        { 
            // Creacion del objet AJAX para IE 
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
        } 
        catch(E) {
            xmlhttp=false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!="undefined") {
        xmlhttp=new XMLHttpRequest();
    }

    return xmlhttp; 
}



function actualizarIntentos(idAct, idAlum){
    var ajax=nuevoAjax();
    ajax.open("POST", "_ControladorActividades.php", true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("ajax=int&idAct="+idAct+"&idAlum="+idAlum);    
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4){
            var respuesta="";
            if(ajax.responseText){
                respuesta=ajax.responseText;
                if($.trim(respuesta)=='true'){
                    
                }
                else{
                    alert("Numero maximo de intentos, vuelva a ingresar a la actividad");
                    window.location='principal_alumno.php';
                }
            }
        }
    }
}

function actualizarAsciertos(idAct, idAlum){ 
    var ajax=nuevoAjax();
    ajax.open("POST", "_ControladorActividades.php", false);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("ajax=asc&idAct="+idAct+"&idAlum="+idAlum);    
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4){
//            return true;
//            alert(ajax.responseText)
//            var respuesta="";
//            if(ajax.responseText){
//                respuesta=ajax.responseText;
//                if(respuesta='true'){
//                }
//                else{
//                    alert("Numero maximo de intentos, vuelva a ingresar a la actividad");
//                    window.location='principal_alumno.php';
//                }
//            }
        }
    }
}
function actualizarFallos(idAct, idAlum){ 
    var ajax=nuevoAjax();
    ajax.open("POST", "_ControladorActividades.php", false);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send("ajax=fal&idAct="+idAct+"&idAlum="+idAlum);    
    ajax.onreadystatechange=function(){
    }
}