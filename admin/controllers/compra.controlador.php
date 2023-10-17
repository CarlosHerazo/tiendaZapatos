<?php 
class ControladorCompra{

    static public function ctrMostrarCompra(){
        $respuesta = ModeloCompra::mdlMostrarCompra();
        return $respuesta;
    }



}