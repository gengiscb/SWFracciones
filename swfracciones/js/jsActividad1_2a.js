var x = 0;
var y = "px"
  
$(document).ready(function () {
    showLightbox();
    $('#iniciar').click(podar);    
});
podar=function () {
    hideLightbox();    
    $('#podador')
    .animate({
        'width':'180px',
        'margin-left':'-=630px'
    },3000, function(){
        $('#podador').animate({
            'margin-left':'+=630px'
        },2000,function(){
            $('#podador').animate({                
                'margin-botton':'40px'
            },500,function(){
                if(!veces==0){
                    veces--;
                    podar()
                }
                else{
                    alert("Seleccione una respuesta");
                }
            });
        } );
    });
    $("#pastoPodado2").animate({
        position:'relative',
        "width":"0px", 
        "margin-left":"747px"
    }, 0, function(){
        $("#pastoPodado2").animate({
            position:'relative',
            "width":"747px", 
            "margin-left":"0px"
        }, 3000);
    });
            
    $("#pastoPodado").animate({            
        width: "800px"
    }, 3000, function(){
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
    }       
}