// JavaScript Document


$('#iniciar').click(function(){
    hideLightbox();
    $('#iniciar').attr('disabled', 'disabled');
    $('#img_agua').attr("src", "img/act1_3b/nadar.gif");
    $("#capaAcuario").animate({
        top:"+="+distancia+"px"
        },
    6000,
    function(){
        $('#img_agua').attr("src", "img/act1_3b/nadar.gif");	
        alert("Seleccione una respuesta");    
        
    });
           
           
});

$("#detener").click(function(){
    $("#capaAcuario").stop(); 
    $('#img_agua').attr("src", "img/act1_3b/nadar.gif");
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
        window.location.reload();
    //        actualizarIntentos(idAct, idAlum);
    }       
}