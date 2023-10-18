<?php

require_once("conexion.php");

class ModeloCategorias{

    public static  function mdlMostrarCategorias(){
        $stnt = Conexion::conectar() -> prepare("SELECT `id`, `nombre_categoria`, 'x' as acciones FROM `categoria`;");

        $stnt -> execute();
        return $stnt -> fetchAll();
        // $stnt = null;
    }



    static public function mdlRegistrarCategorias($nombre){
        // Preparar la consulta SQL (no es necesario usar comillas en los marcadores de posición)
        $stmt = Conexion::conectar()->prepare("INSERT INTO categoria(nombre_categoria) VALUES (:nombre)");
        
        // Vincular los valores a los marcadores de posición
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        if($stmt->execute()){
            return "La categoria se registró perfectamente";
        } else {
            return "Error, no se pudo registrar la categoria";
        }
        
        // Cerrar la declaración 
        // $stmt = null;
      
    }


    static public function mdlEliminarCategorias($id){
        
        
        //     // Preparar la consulta SQL 
            $stmt = Conexion::conectar()->prepare("DELETE FROM `categoria` WHERE id = :id");
            
            // Vincular los valores a los marcadores de posición
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            
            // Ejecutar la consulta
            if($stmt->execute()){
                return "La se elimino perfectamente";
            } else {
                return "Error, no se pudo eliminar la categoria";
            }
            
        //     // Cerrar la declaración 
            $stmt = null;
            
        }

        static public function mdlActualizarCategorias($id, $nombre){
      
            //     // Preparar la consulta SQL
                $stmt = Conexion::conectar()->prepare("UPDATE `categoria` 
                                                        
                                                        SET nombre_categoria = :nombre
                                                                               
                                                            
                                                        WHERE id = :id");
                
                // Vincular los valores a los marcadores de posición
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
               
                
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

$productos = ModeloCategorias::mdlMostrarCategorias();