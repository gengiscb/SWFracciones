// JavaScript Document
window.onload=function(){
    document.getElementById("actualizar_banner").onclick=sonCamposCorrectos;
}

function sonCamposCorrectos(){
    var i=1;
    var hayBanner=false;
    do{
        var idImagen="fl_imagen"+i;
        if(esURLImagenCorrecta(idImagen)){
            hayBanner=true;
            break;
        }
        i++;
    }while(i<=4);
	
    if(hayBanner==false){
        alert("Debe subir al menos una imagen para la portada de la página.");
        return false;
    }        
    //return hayBanner;        
    if(window.confirm("¿Está seguro que desea continuar con la Modificación?")){
        return true;
    }
    else{
        return false;
    }
}

function esURLImagenCorrecta(idImagen){
    var url=document.getElementById(idImagen).value;
    if(url==""){
        return false;
    }else{
        return true;
    }
}