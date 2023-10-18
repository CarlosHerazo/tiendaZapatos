<?php

require_once("../controllers/compra.controlador.php");
require_once("../modelo/compra.modelo.php");

class CompraProducto {

    public $id;
    public function MostrarCompra(){

        $respuesta = ControladorCompra::ctrMostrarCompra();

        echo json_encode($respuesta);
    }
  

    public function eliminarCompra(){
        $respuesta = ControladorCompra::crtEliminarCompra($this->id);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }


 


}



if(!isset($_POST["action"])){
    $respuesta = new CompraProducto();
    $respuesta -> MostrarCompra();
}else{

    if($_POST["action"] == "eliminar"){

        $eliminar = new CompraProducto();
        $eliminar ->id = $_POST['id'];
        $eliminar ->eliminarCompra();

    }
}

