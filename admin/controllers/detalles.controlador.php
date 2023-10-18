<?php

class ControladorDetalles{

    static public function ctrMostrarDetalles(){
        $respuesta = ModeloDetalles::mdlMostrarDetalles();
        return $respuesta;
    }
    
    static public function crtEliminarDetalles($id){

        $respuesta = ModeloDetalles::mdlEliminarDetalles($id);
        return $respuesta;
    
    }
    
    }