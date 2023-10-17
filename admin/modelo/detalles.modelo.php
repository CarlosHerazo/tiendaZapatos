<?php 


require_once("conexion.php");

class ModeloDetalles {

    public static  function mdlMostrarDetalles(){
        $stnt = Conexion::conectar() -> prepare("SELECT `id`, `id_compra`, `id_productos`, `nombre`, `precio`, `cantidad`, 'x' AS acciones FROM `detalle_compra`;");
        $stnt -> execute();
        return $stnt -> fetchAll();
        // $stnt = null;
    }
}

$productos = ModeloDetalles::mdlMostrarDetalles();