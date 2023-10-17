<?php

class ControladorDetalles{

    static public function ctrMostrarDetalles(){
        $respuesta = ModeloDetalles::mdlMostrarDetalles();
        return $respuesta;
    }
    
    
    
    }