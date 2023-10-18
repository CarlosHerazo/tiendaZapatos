<?php

require_once("conexion.php");

class ModeloCompra {

    public static  function mdlMostrarCompra(){
        $stnt = Conexion::conectar() -> prepare("SELECT `id`, `id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`, 'x' AS acciones FROM `compras`;");
        $stnt -> execute();
        return $stnt -> fetchAll();
        // $stnt = null;
    }




        static public function mdlEliminarCompra($id){
        
        
        //     // Preparar la consulta SQL 
            $stmt = Conexion::conectar()->prepare("DELETE FROM `compras` WHERE id = :id");
            
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



}

$productos = ModeloCompra::mdlMostrarCompra();