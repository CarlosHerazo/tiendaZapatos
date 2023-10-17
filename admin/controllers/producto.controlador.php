<?php

class ControladorProducto{
    static public function ctrMostrarProducto(){
        $respuesta = ModeloProducto::mdlMostrarProducto();
        return $respuesta;
    }

    static public function crtRegistrarProducto($nombre, $descripcion, $precio, $descuento, $imagen, $cantidad, $estado){

            $respuesta = ModeloProducto::mdlRegistrarProducto($nombre, $descripcion, $precio, $descuento, $imagen, $cantidad, $estado);
            return $respuesta;
        
        
    }


    static public function crtEliminarProducto($id){

        $respuesta = ModeloProducto::mdlEliminarProducto($id);
        return $respuesta;
    
    
    }


    static public function crtActualizarProducto($id, $nombre, $descripcion, $precio, $descuento, $imagen, $cantidad, $estado){

        $respuesta = ModeloProducto::mdlActualizarProducto($id, $nombre, $descripcion, $precio, $descuento, $imagen, $cantidad, $estado);
        return $respuesta;
    
    
    }




}