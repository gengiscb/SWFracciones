<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'GestorActividad.php';

class GestorActividad1_2 extends GestorActividad {

    private $nombre;
    private $instruccionesA;
    private $instruccionesB;
    private $escenario;
    private $respuestas = array();
    private $actividadHTMLA;
    private $actividadHTMLB;
    private $actividadCSSA;
    private $actividadCSSB;
    private $actividadJSA;
    private $actividadJSB;
    private $respuestaCorrecta;
    private $htmlResponderA;
    private $htmlResponderB;
    private static $idActividad = 3;
    private $escenario1 = 1;
    private $escenario2 = 2;
    private $idAlumno;

    public function __construct($idAlumno) {
        $this->nombre = "Fracciones y Volumenes";
        //La mitad, Un cuarto, Un octavo, Tres cuartos, Tres octavos, Cinco octavos y Siete octavos
        $this->respuestas[0] = new respuestaAct13("La mitad", -130); //bien
        $this->respuestas[1] = new respuestaAct13("Un cuarto", -62); //bien
        $this->respuestas[2] = new respuestaAct13("Un octavo", -31); //bien
        $this->respuestas[3] = new respuestaAct13("Tres cuartos", -195); //bien
        $this->respuestas[4] = new respuestaAct13("Tres octavos", -96); //bien
        $this->respuestas[5] = new respuestaAct13("Cinco octavos", -162); //bien
        $this->respuestas[6] = new respuestaAct13("Siete octavos", -230); //bien
        $posicion = rand(0, 6);
        $this->idAlumno = $idAlumno;
        $this->respuestas[$posicion]->setEsCorrecta();
        $this->respuestaCorrecta = $this->respuestas[$posicion];

        $pos_res = $this->obtenerPosiblesRespuestas($posicion);


        //Instrucciones de las dos versiones de la actividad 
        $this->instruccionesA = '<br/><span class="texto_act">“De acuerdo al vaso de cristal, selecciona hasta que parte del vaso se ha llenado.”</span><br/>';
        $this->instruccionesB = '<br/><span class="texto_act">“De acuerdo a la pecera del acuario,  selecciona hasta que parte se ha llenado la pecera.”</span><br/>';

        //CSS de las dos versiones de la actividad

        $this->actividadCSSA = '<link href="css/cssActividad1_3a.css" rel="stylesheet" type="text/css"/>';
        $this->actividadCSSB = '<link href="css/cssActividad1_3b.css" rel="stylesheet" type="text/css"/>';

        $this->htmlResponderA = '
            <div id="contestar">
                <br/>
                <span class="texto_act">Selecciona la respuesta correcta</span>
                <br/>
                <span class="respuestas">
                    <input class="bot_act" type="button"  onclick="javascript:esCorrecta(' . $pos_res[0]->getEsCorrecta() . ',' . GestorActividad1_2::$idActividad . ',' . $this->idAlumno . ')" value="' . $pos_res[0]->getValor() . '"></input>
                    <input class="bot_act" type="button" onclick="javascript:esCorrecta(' . $pos_res[3]->getEsCorrecta() . ',' . GestorActividad1_2::$idActividad . ',' . $this->idAlumno . ')"  value="' . $pos_res[3]->getValor() . '"></input>
                    <input  class="bot_act" type="button" onclick="javascript:esCorrecta(' . $pos_res[1]->getEsCorrecta() . ',' . GestorActividad1_2::$idActividad . ',' . $this->idAlumno . ')"  value="' . $pos_res[1]->getValor() . '"></input>
                    <input class="bot_act" type="button"  onclick="javascript:esCorrecta(' . $pos_res[2]->getEsCorrecta() . ',' . GestorActividad1_2::$idActividad . ',' . $this->idAlumno . ')" value="' . $pos_res[2]->getValor() . '"></input>
                </span>
            </div>';

        $this->htmlResponderB = '
            <div id="contestar">
                <br/>
                <span class="texto_act">Selecciona la respuesta correcta</span>
                <br/>
                <span class="respuestas">
                    <input class="bot_act" type="button"   value="' . $pos_res[0]->getValor() . '"></input>
                    <input class="bot_act" type="button"   value="' . $pos_res[3]->getValor() . '"></input>
                    <input  class="bot_act" type="button"  value="' . $pos_res[1]->getValor() . '"></input>
                    <input class="bot_act" type="button"   value="' . $pos_res[2]->getValor() . '"></input>
                </span>
            </div>';


        //Javascript de las dos versiones de la actividad

        $this->actividadJSA = '
               <script type="text/javascript">
                    var distancia=' . $this->respuestaCorrecta->getDistancia() . ';
                </script>
            <script type="text/javascript" src="js/jsActividad1_3a.js"></script>' . $this->obtenerHtmlInicializadorLighBox();
        ;

        $this->actividadJSB = '
            <script type="text/javascript">
                    var distancia=' . $this->respuestaCorrecta->getDistancia() . ';
                </script>
            <script type="text/javascript" src="js/jsActividad1_3b.js"></script>' . $this->obtenerHtmlInicializadorLighBox();
        ;

        //Aleatorizar los escenarios de la actividad
        $escenario1 = $this->escenario1;
        $escenario2 = $this->escenario2;

        $this->escenario = rand($escenario1, $escenario2);
        echo $this->escenario;
        $this->inicializarHtmlA();
        $this->inicializarHtmlB();
    }

    public function getIntrucciones() {
        if ($this->escenario == $this->escenario1) {
            return $this->instruccionesA;
        } else {
            return $this->instruccionesB;
        }
    }

    public function getActividadHTML() {
        if ($this->escenario == $this->escenario1) {
            return $this->actividadHTMLA;
        } else {
            return $this->actividadHTMLB;
        }
    }

    public function getActividadCSS() {
        if ($this->escenario == $this->escenario1) {
            return $this->actividadCSSA;
        } else {
            return $this->actividadCSSB;
        }
    }

    public function getActividadJS() {
        if ($this->escenario == $this->escenario1) {
            return $this->actividadJSA;
        } else {
            return $this->actividadJSB;
        }
    }

    private function obtenerPosiblesRespuestas($posicionCorrecta) {
//        $randPosition = rand(0, 3);
        $posibles_res = array();
        $posibles_res[3] = $this->respuestas[$posicionCorrecta];
        for ($indiceRespuestas = 0; $indiceRespuestas < 3; $indiceRespuestas++) {

            if ($posicionCorrecta > 3) {
                $posibles_res[$indiceRespuestas] = $this->respuestas[$posicionCorrecta - ($indiceRespuestas + 1)];
            } else {
                $posibles_res[$indiceRespuestas] = $this->respuestas[$posicionCorrecta + ($indiceRespuestas + 1)];
            }
        }
        return $posibles_res;
    }

    private function inicializarHtmlA() {
        $this->actividadHTMLA = '
           <div id="Vaso">
    <img id="segmento" height="10px" src="img/act1_3a/segmento2.png" />
  <div id="contenedorAgua">
 
     <div class="frame">     
       <img id="vaso" src="img/act1_3a/Vaso.png"/>
     </div>                  
       <div id="capaAgua">    
         <div id="BloquearAgua">&nbsp;</div>
       </div>
      <img src="img/act1_3a/agua.gif" id="agua"/>
    </div>
<img id="fruta" src="img/act1_3a/fruta.png"/>
<img id="lentes" src="img/act1_3a/lentes.png"/>
  </div>
';
    }

    public function getNombreActividad() {
        return $this->nombre;
    }

    public function getHtmlResponder($tipo) {
        if ($tipo == $this->escenario1) {
            return $this->htmlResponderA;
        } else {
            return $this->htmlResponderB;
        }
    }

    private function inicializarHtmlB() {
        $this->actividadHTMLB = '
  <div id="Acuario">
  
    <img id="segmento" height="10px" src="img/act1_3b/segmento2.png" />

  <div id="contenedorAcuario">
    

     <div class="pecera">
     
       <img id="img_pecera" src="img/act1_3b/pez.png"/>
       
       
       
 
     </div>
                               
       <div id="capaAcuario">    
         <div id="capaBloquear">&nbsp;</div>
       </div>
      
      
      <img id="img_agua" src="img/act1_3b/nadar.png" id="agua"/>
     

             
    </div>
       
  </div>
';
    }

    public function getLightBox() {
        return '<div id="fade" class="fadebox"> 
                    <button class="boton" id="iniciar" >Iniciar Actividad 3</button>
                </div>';
    }

}

class respuestaAct13 {

    private $valor;
    private $distancia;
    private $esCorrecta;

    public function __construct($valor, $distancia) {
        $this->distancia = $distancia;
        $this->valor = $valor;
        $this->esCorrecta = false;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setDistancia($valor) {
        $this->distancia = $valor;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getDistancia() {
        return $this->distancia;
    }

    public function getEsCorrecta() {
        if ($this->esCorrecta) {
            return $this->esCorrecta;
        } else {
            return 0;
        }
    }

    public function setEsCorrecta() {
        $this->esCorrecta = true;
    }

}
?>

