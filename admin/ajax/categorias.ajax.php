<?php

require_once("../controllers/categorias.controlador.php");
require_once("../modelo/categorias.modelo.php");

class CategoriasProductos {
public $nombre;
public $id;

    public function MostrarCategorias(){
        $respuesta = ControladorCategorias::ctrMostrarCategorias();
        echo json_encode($respuesta);
    }
    


    public function registrarCategorias(){
        $respuesta = ControladorCategorias::crtRegistrarCategorias( $this->nombre );
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function eliminarCategorias(){
        $respuesta = ControladorCategorias::crtEliminarCategorias($this->id);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function actualizarCategorias(){
        $respuesta = ControladorCategorias::crtActualizarCategorias($this->id, $this->nombre);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }




}


if(!isset($_POST["action"])){

    $respuesta = new CategoriasProductos();
    $respuesta->MostrarCategorias();
    
    
}else{

    if($_POST["action"] == "registrar"){

        $insertar = new CategoriasProductos();
        $insertar ->nombre = $_POST['nombre'];
        $insertar ->registrarCategorias();
    }
       
    if($_POST["action"] == "eliminar"){

        $eliminar = new CategoriasProductos();
        $eliminar ->id = $_POST['id'];
        $eliminar ->eliminarCategorias();

    }


    if($_POST["action"] == "actualizar"){
        $actualizar = new CategoriasProductos();
        $actualizar ->id = $_POST['id'];
        $actualizar ->nombre = $_POST['nombre'];
        $actualizar ->actualizarCategorias();
    }
}