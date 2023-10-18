<?php 
class ControladorCategorias{

    static public function ctrMostrarCategorias(){
        $respuesta = ModeloCategorias::mdlMostrarCategorias();
        return $respuesta;
    }

    static public function crtRegistrarCategorias($nombre){

        $respuesta = ModeloCategorias::mdlRegistrarCategorias($nombre);
        return $respuesta;
    
    
    }

    static public function crtEliminarCategorias($id){

        $respuesta = ModeloCategorias::mdlEliminarCategorias($id);
        return $respuesta;
    
    
    }

    static public function crtActualizarCategorias($id, $nombre){

        $respuesta = ModeloCategorias::mdlActualizarCategorias($id, $nombre);
        return $respuesta;
    
    
    }
}