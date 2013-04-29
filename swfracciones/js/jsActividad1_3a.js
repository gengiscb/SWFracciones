
$('#iniciar').click(function(){
    hideLightbox();
    $('#iniciar').attr('disabled', 'disabled');
    $("#capaAgua").animate({
        top: "+="+distancia+"px"
        },{
        queue:false, 
        duration:5000
    }, function(){
        alert("Seleccione una respuesta");
    });  
});

$("#detener").click(function(){
    $("#capaAgua").stop();
    $('#imagen').attr("src", "img/act1_2a/agua.png");
});
	   

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
    }       
}