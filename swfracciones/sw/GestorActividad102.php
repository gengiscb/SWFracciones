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
    private $escenari;
    private $respuestas = array();
    private $actividadHTMLA;
    private $actividadHTMLB;
    private $actividadCSSA;
    private $actividadCSSB;
    private $actividadJSA;
    private $actividadJSB;
    private $respuestaCorrecta;
    private $htmlResponder;
    private static $idActividad=2;
    private $idAlumno;

    public function __construct($idAlumno) {
        $this->nombre = "Medición y comparación de superficies";
        //La mitad, Un cuarto, Un octavo, Tres cuartos, Tres octavos, Cinco octavos y Siete octavos
        $this->respuestas[0] = new respuestaAct12("Tres octavos", 225);
        $this->respuestas[1] = new respuestaAct12("Cinco octavos", 375);
        $this->respuestas[2] = new respuestaAct12("La mitad", 3);
        $this->respuestas[3] = new respuestaAct12("Un cuarto", 1);
        $this->respuestas[4] = new respuestaAct12("Un octavo", 0);
        $this->respuestas[5] = new respuestaAct12("Tres cuartos",5);        
        $this->respuestas[6] = new respuestaAct12("Siete octavos",525);
        $posicion = rand(2, 5);
        $this->idAlumno=$idAlumno;
        $this->respuestas[$posicion]->setEsCorrecta();
        $this->respuestaCorrecta = $this->respuestas[$posicion];
        
        $pos_res = $this->obtenerPosiblesRespuestas($posicion);

        $this->instruccionesA = '<br/><span class="texto_act">“De acuerdo al área podada  selecciona que parte se ha podado de la superficie total.”</span><br/>';
        $this->instruccionesB = '<br/><span class="texto_act">“De acuerdo al área pintada  selecciona que parte se ha pintado de la superficie total.”</span><br/>';
        $this->actividadCSSA = '<link href="css/cssActividad1_2a.css" rel="stylesheet" type="text/css"/>';
        $this->actividadCSSB = '<link href="css/cssActividad1_2b.css" rel="stylesheet" type="text/css"/>';

        $this->htmlResponder = '
            <div id="contestar">
                <br/>
                <span class="texto_act">Selecciona la respuesta correcta</span>
                <br/>
                <span class="respuestas">
                    <input class="bot_act" type="button"  onclick="javascript:esCorrecta('.$pos_res[0]->getEsCorrecta().','.GestorActividad1_2::$idActividad.','.$this->idAlumno.')" value="'.$pos_res[0]->getValor().'"></input>
                    <input class="bot_act" type="button" onclick="javascript:esCorrecta('.$pos_res[3]->getEsCorrecta().','.GestorActividad1_2::$idActividad.','.$this->idAlumno.')"  value="'.$pos_res[3]->getValor().'"></input>
                    <input  class="bot_act" type="button" onclick="javascript:esCorrecta('.$pos_res[1]->getEsCorrecta().','.GestorActividad1_2::$idActividad.','.$this->idAlumno.')"  value="'.$pos_res[1]->getValor().'"></input>
                    <input class="bot_act" type="button"  onclick="javascript:esCorrecta('.$pos_res[2]->getEsCorrecta().','.GestorActividad1_2::$idActividad.','.$this->idAlumno.')" value="'.$pos_res[2]->getValor().'"></input>
                </span>
            </div>';
        $this->htmlResponderB = '
            <div id="contestar">
                <br/>
                <span class="texto_act">Selecciona la respuesta correcta</span>
                <br/>
                <span class="respuestas">
                    <input class="bot_act" type="button"   value="'.$pos_res[0]->getValor().'"></input>
                    <input class="bot_act" type="button"   value="'.$pos_res[3]->getValor().'"></input>
                    <input  class="bot_act" type="button"  value="'.$pos_res[1]->getValor().'"></input>
                    <input class="bot_act" type="button"   value="'.$pos_res[2]->getValor().'"></input>
                </span>
            </div>';
        $this->actividadJSA = '
               <script type="text/javascript">
                    var veces=' . $this->respuestaCorrecta->getDistancia() . ';
                </script>
            <script type="text/javascript" src="js/jsActividad1_2a.js"></script>' . $this->obtenerHtmlInicializadorLighBox();
        ;

        $this->actividadJSB = '
            <script type="text/javascript">
                    var veces=' . $this->respuestaCorrecta->getDistancia() . ';
                </script>
            <script type="text/javascript" src="js/jsActividad1_2b.js"></script>' . $this->obtenerHtmlInicializadorLighBox();
        ;
        $this->escenari = rand(1, 2);
        echo $this->escenari;
        $this->inicializarHtmlA();
        $this->inicializarHtmlB();
    }

    public function getIntrucciones() {
        if ($this->escenari == 1) {
            return $this->instruccionesA;
        } else {
            return $this->instruccionesB;
        }
    }

    public function getActividadHTML() {
        if ($this->escenari == 1) {
            return $this->actividadHTMLA;
        } else {
            return $this->actividadHTMLB;
        }
    }

    public function getActividadCSS() {
        if ($this->escenari == 1) {
            return $this->actividadCSSA;
        } else {
            return $this->actividadCSSB;
        }
    }

    public function getActividadJS() {
        if ($this->escenari == 1) {
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
            
                if($posicionCorrecta>3){
                    $posibles_res[$indiceRespuestas] = $this->respuestas[$posicionCorrecta-($indiceRespuestas+1)];
                }
                else{
                    $posibles_res[$indiceRespuestas] = $this->respuestas[$posicionCorrecta+($indiceRespuestas+1)];
                }
            
        }
        return $posibles_res;
    }

    private function inicializarHtmlA() {
        $this->actividadHTMLA = '            
             <div id="pasto" style="background"> 
                <div id="pastoPodado" >                    
                </div>
                <div id="pastoPodado2">
                </div>
                <img id="podador" src="img/act1_2a/podador.gif"/>
            </div>
            ';
    }
    public function getNombreActividad(){
        return $this->nombre;
    }

    public function getHtmlResponder($tipo) {
        if($tipo==1){
            return $this->htmlResponder;
        }
        else{
            return $this->htmlResponderB;
        }
    }

    private function inicializarHtmlB() {
        $this->actividadHTMLB = '
             <div id="pared" style="background"> 
                <div id="paredPintada" >
                </div>
                <div id="paredPintada2">
                </div>
                <img id="pintor" src="img/act1_2b/painter.gif"/>
            </div>
            ';
    }
    public function getLightBox(){
        return '<div id="fade" class="fadebox"> 
                    <button class="boton" id="iniciar" astyle="height:50px" >Iniciar Actividad</button>
                </div>';
        //<button id="iniciar" astyle="height:50px" onclick="javascript:actualizarIntentos('.GestorActividad1_1::$idActividad.','.$this->idAlumno.')" >Iniciar Actividad</button>

    }
}

class respuestaAct12 {

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
        if($this->esCorrecta){
            return $this->esCorrecta;
        }
        else {
            return 0;
        }
    }

    public function setEsCorrecta() {
        $this->esCorrecta = true;
    }

}
?>

