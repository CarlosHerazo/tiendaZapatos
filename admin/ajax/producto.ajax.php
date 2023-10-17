<?php
require_once("../controllers/producto.controlador.php");
require_once("../modelo/producto.modelo.php");
class ajaxCategoria {


  

   
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $descuento;
    public $estado;
    public $cantidad;

    public $imagen;
    public function MostrarProducto(){

        $respuesta = ControladorProducto::ctrMostrarProducto();
        echo json_encode($respuesta);
    }

    public function registrarProducto(){
        $respuesta = ControladorProducto::crtRegistrarProducto($this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->imagen, $this->cantidad, $this -> estado);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function eliminarProducto(){
        $respuesta = ControladorProducto::crtEliminarProducto($this->id);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function actualizarProducto(){
        $respuesta = ControladorProducto::crtActualizarProducto($this->id, $this->nombre, $this->descripcion, $this->precio, $this->descuento, $this->imagen, $this->cantidad, $this -> estado);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }




}

 

if(!isset($_POST["action"])){
    $respuesta = new ajaxCategoria();
    $respuesta -> MostrarProducto();
}else{

    if($_POST["action"] == "registrar"){

        $insertar = new ajaxCategoria();
        $insertar ->nombre = $_POST['nombre'];
        $insertar ->precio = $_POST['precio'];
        $insertar ->descripcion = $_POST['descripcion'];
        $insertar ->descuento = $_POST['descuento'];
        $insertar ->imagen = $_POST['imagen'];
        $insertar ->cantidad = $_POST['cantidad'];
        $insertar ->estado = $_POST['estado'];
        $insertar ->registrarProducto();
    }
       
    if($_POST["action"] == "eliminar"){

        $eliminar = new ajaxCategoria();
        $eliminar ->id = $_POST['id'];
        $eliminar ->eliminarProducto();

    }


    if($_POST["action"] == "actualizar"){
        $actualizar = new ajaxCategoria();
        $actualizar ->id = $_POST['id'];
        $actualizar ->nombre = $_POST['nombre'];
        $actualizar ->precio = $_POST['precio'];
        $actualizar ->descripcion = $_POST['descripcion'];
        $actualizar ->descuento = $_POST['descuento'];
        $actualizar ->imagen = $_POST['imagen'];
        $actualizar ->cantidad = $_POST['cantidad'];
        $actualizar ->estado = $_POST['estado'];
        $actualizar ->actualizarProducto();
    }
}



