<?php 
class ControladorCompra{

    static public function ctrMostrarCompra(){
        $respuesta = ModeloCompra::mdlMostrarCompra();
        return $respuesta;
    }


    static public function crtEliminarCompra($id){

        $respuesta = ModeloCompra::mdlEliminarCompra($id);
        return $respuesta;
    
    }
}