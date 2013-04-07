// JavaScript Document
//$(function (){
	$('#iniciar').click(function(){
            hideLightbox();
            $('#iniciar').attr('disabled', 'disabled');                    
    $('#imagen').animate({
		left: "+="+distancia+"px"
		},6000,function (){
			$('#imagen').attr("src", "img/act1_1b/nadador4.png");
                        alert("Seleccione una respuesta");
		});
	});
	$("#stop").click(function(){
    $("#imagen").stop();
	$("#imagen").attr("src","img/act1_1b/nadador4.png");
	});
//});
function showLightbox() {
    document.getElementById('iniciar').style.display='block';
    document.getElementById('fade').style.display='block';
}
function hideLightbox() {
    document.getElementById('iniciar').style.display='none';
    document.getElementById('fade').style.display='none';
}

function esCorrecta(valor,idAct,idAlum){
    if(valor){
        alert("La respuesta es correcta... la actividad se cerrara");     
        actualizarAsciertos(idAct, idAlum);
        window.location='principal_alumno.php';
    }    
    else{
        alert("La respuesta es incorrecta... vuelva a intentarlo");
        actualizarFallos(idAct, idAlum);        
        window.location = window.location.href+'&int=y'; 
//        window.location.reload();        
    }
        
}