<?php

require_once("conexion.php");

class ModeloCompra {

    public static  function mdlMostrarCompra(){
        $stnt = Conexion::conectar() -> prepare("SELECT `id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`, 'x' AS acciones FROM `compras`;");
        $stnt -> execute();
        return $stnt -> fetchAll();
        // $stnt = null;
    }
}

$productos = ModeloCompra::mdlMostrarCompra();