<?php

require_once("../controllers/detalles.controlador.php");
require_once("../modelo/detalles.modelo.php");

class DetallesProducto {


    public $id;
    public function MostrarDetalles(){

        $respuesta = ControladorDetalles::ctrMostrarDetalles();

        echo json_encode($respuesta);
    }


    public function eliminarDetalles(){
        $respuesta = ControladorDetalles::crtEliminarDetalles($this->id);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



}

if(!isset($_POST["action"])){
    $respuesta = new DetallesProducto();
    $respuesta -> MostrarDetalles();
}else{

    if($_POST["action"] == "eliminar"){

        $eliminar = new DetallesProducto();
        $eliminar ->id = $_POST['id'];
        $eliminar ->eliminarDetalles();

    }
}


