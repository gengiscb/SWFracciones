    var x = 0;
    var y = "px"    
$(document).ready(function () {
    showLightbox();
    $('#iniciar').click(pintar);
      
});

  pintar=function () {
      hideLightbox();
        $('#pintor')
        .animate({
            'width':'220px',
            'margin-left':'-=630px'
        },1500, function(){
            $('#pintor').animate({
                'margin-left':'+=630px'
            },2000,function(){
                $('#pintor').animate({                
                    'margin-botton':'40px'
                },500,function(){
                    if(!veces==0){
                        veces--;
                        pintar()
                    }
                });
            } );
        });
        $("#paredPintada2").animate({
            position:'relative',
            "width":"0px", 
            "margin-left":"742px"
        }, 0, function(){
            $("#paredPintada2").animate({
                position:'relative',
                "width":"742px", 
                "margin-left":"0px"
            }, 1500);
        });
            
        $("#paredPintada").animate({            
            width: "800px"
        }, 1500, function(){
            $("#paredPintada").css("top","32px");
            $("#paredPintada").css("height",x.toString() + y);
            $("#paredPintada2").css("width", "0px")
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