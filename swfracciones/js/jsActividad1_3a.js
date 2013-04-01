
$('#iniciar').click(function(){
    hideLightbox();
    $('#iniciar').attr('disabled', 'disabled');
    $('#agua').attr("src", "img/act1_3a/agua.gif");
    $("#capaAgua").animate({
        top: "+="+distancia+"px"
        },6000, 
        function(){
            $('#agua').attr("src", "img/act1_3a/agua.gif");
        alert("Seleccione una respuesta");
    });  
});

$("#detener").click(function(){
    $("#capaAgua").stop();
    $('#agua').attr("src", "img/act1_3a/nadar.png");
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