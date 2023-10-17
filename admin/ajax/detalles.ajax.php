<?php

require_once("../controllers/detalles.controlador.php");
require_once("../modelo/detalles.modelo.php");

class DetallesProducto {

    public function MostrarDetalles(){

        $respuesta = ControladorDetalles::ctrMostrarDetalles();

        echo json_encode($respuesta);
    }


}

$respuesta= new DetallesProducto();
$respuesta -> MostrarDetalles();