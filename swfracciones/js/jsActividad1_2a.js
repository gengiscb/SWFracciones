    var x = 0;
    var y = "px"
//    var veces = 5;
  
$(document).ready(function () {
    showLightbox();
    $('#iniciar').click(podar);    
});
podar=function () {
        hideLightbox();    
        $('#podador')
        .animate({
            'width':'180px',
            //            'height':'79px',
            left:'-=630px'
        },1500, function(){
            $('#podador').animate({
                left:'+=630px'
            },2000,function(){
                $('#podador').animate({                
                    'margin-botton':'40px'
                },500,function(){
                    if(!veces==0){
                        veces--;
                        podar()
                    }
                });
            } );
        });
        $("#pastoPodado2").animate({
            "width":"0px", 
            //            top:'300px',
            "margin-left":"747px"
        }, 0, function(){
            $("#pastoPodado2").animate({
                //            top:'300px',    
                "width":"747px", 
                "margin-left":"0px"
            }, 1500);
        });
            
        $("#pastoPodado").animate({            
            width: "800px"
        }, 1500, function(){
            $("#pastoPodado").css("top","202px");
            $("#pastoPodado").css("height",x.toString() + y);
            $("#pastoPodado2").css("width", "0px")
        }); 
        
        x = x + 40;
    }
    
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