// JavaScript Document


//$(function (){
	   $('#iniciar').click(function(){
               hideLightbox();
           $('#iniciar').attr('disabled', 'disabled');
       //    $('#imagen').attr("src", "img/act1_2b/agua.gif");
	   $("#capaAcuario").animate({top:"+="+distancia+"px"},{queue:false,duration:5000},function(){
         //   $('#imagen').attr("src", "img/act1_2a/agua.gif");	
            alert("Seleccione una respuesta");    
        
           });
           
           
     });

    $("#detener").click(function(){
    $("#capaAcuario").stop(); 
   // $('#imagen').attr("src", "img/act1_2b/agua.gif");
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