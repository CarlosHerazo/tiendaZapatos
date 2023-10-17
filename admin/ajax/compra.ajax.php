<?php

require_once("../controllers/compra.controlador.php");
require_once("../modelo/compra.modelo.php");

class CompraProducto {

    public function MostrarCompra(){

        $respuesta = ControladorCompra::ctrMostrarCompra();

        echo json_encode($respuesta);
    }


}

$respuesta= new CompraProducto();
$respuesta -> MostrarCompra();