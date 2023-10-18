<?php 


require_once("conexion.php");

class ModeloDetalles {

    public static  function mdlMostrarDetalles(){
        $stnt = Conexion::conectar() -> prepare("SELECT `id`, `id_compra`, `id_productos`, `nombre`, `precio`, `cantidad`, 'x' AS acciones FROM `detalle_compra`;");
        $stnt -> execute();
        return $stnt -> fetchAll();
        // $stnt = null;
    }

    static public function mdlEliminarDetalles($id){
        
        
        //     // Preparar la consulta SQL 
            $stmt = Conexion::conectar()->prepare("DELETE FROM `detalle_Compra` WHERE id = :id");
            
            // Vincular los valores a los marcadores de posición
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            
            // Ejecutar la consulta
            if($stmt->execute()){
                return "El detalle se elimino perfectamente";
            } else {
                return "Error, no se pudo eliminar el detalle";
            }
            
        //     // Cerrar la declaración 
            $stmt = null;
            
        }
}

$productos = ModeloDetalles::mdlMostrarDetalles();