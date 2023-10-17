<?php

require_once("conexion.php");

class ModeloProducto{
    public static  function mdlMostrarProducto(){
        $stnt = Conexion::conectar() -> prepare("SELECT `id`, `nombre`, `descripcion`, `precio`, `descuento`, `imagen`, `estado`,`cantidad`, 'x' AS acciones FROM `productos`;");
        $stnt -> execute();
        return $stnt -> fetchAll();
        // $stnt = null;
    }

    static public function mdlRegistrarProducto($nombre, $descripcion, $precio, $descuento, $imagen, $cantidad, $estado){
        // Preparar la consulta SQL (no es necesario usar comillas en los marcadores de posición)
        $stmt = Conexion::conectar()->prepare("INSERT INTO `productos`( `nombre`, `descripcion`, `precio`, `descuento`, `imagen`, `cantidad`, `estado`) VALUES (:nombre, :descripcion, :precio, :descuento, :imagen, :cantidad, :estado)");
        
        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
        $stmt->bindParam(":descuento", $descuento, PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);    
        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        if($stmt->execute()){
            return "El producto se registró perfectamente";
        } else {
            return "Error, no se pudo registrar el producto";
        }
        
        // Cerrar la declaración 
        // $stmt = null;
      
    }


    static public function mdlEliminarProducto($id){
        
        
    //     // Preparar la consulta SQL 
        $stmt = Conexion::conectar()->prepare("DELETE FROM `productos` WHERE id = :id");
        
        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        // Ejecutar la consulta
        if($stmt->execute()){
            return "El producto se elimino perfectamente";
        } else {
            return "Error, no se pudo eliminar el producto";
        }
        
    //     // Cerrar la declaración 
        $stmt = null;
        
    }

    static public function mdlActualizarProducto($id, $nombre, $descripcion, $precio, $descuento, $imagen, $cantidad, $estado){
      
    //     // Preparar la consulta SQL
        $stmt = Conexion::conectar()->prepare("UPDATE `productos` 
                                                
                                                SET nombre = :nombre,
                                                    precio = :precio,
                                                    descuento = :descuento,
                                                    descripcion = :descripcion,
                                                    imagen = :imagen,
                                                    cantidad = :cantidad,
                                                    estado = :estado
                                                    
                                                    
                                                WHERE id = :id");
        
        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
        $stmt->bindParam(":descuento", $descuento, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $imagen, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
       
        
    //     // Ejecutar la consulta
        if($stmt->execute()){
            return "El producto se actualizo perfectamente";
        } else {
            return "Error, no se pudo actualizar el producto";
        }
        
    //     // Cerrar la declaración 
        // $stmt = null;
    }  
}   

$productos = ModeloProducto::mdlMostrarProducto();


