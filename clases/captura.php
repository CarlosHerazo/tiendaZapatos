<?php

require '../models/database.php';
require '../controllers/config.php';
$db = new Database();
$con = $db->conectar();


$json = file_get_contents('php://input');
$datos = json_decode($json, true);

if(is_array($datos)){

    $id_transaccion = $datos['detalles']["id"];
    $total = $datos['detalles']["purchase_units"][0]['amount']['value'];
    $status = $datos['detalles']["status"];
    $fecha = $datos['detalles']["update_time"];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']["payer"]['email_address'];
    $id_cliente = $datos['detalles']["payer"]["payer_id"];

    $sql = $con ->prepare("INSERT INTO `compras`(`id_transaccion`, `fecha`, `status`, `email`, `id_cliente`, `total`) VALUES (?,?,?,?,?,?)");
    $sql ->execute([$id_transaccion,$fecha,$status,$email,$id_cliente, $total]);
    $id = $con ->lastInsertId();










    if($id > 0){
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

      
        if($productos != null){
            foreach($productos as $clave => $cantidad){
        
                $sql = $con->prepare("SELECT id, nombre, precio, descuento FROM productos WHERE id=? AND estado='activo';");
               
                $sql->execute([$clave]);
                $row_prod[] = $sql->fetchAll(PDO::FETCH_ASSOC);
               
                $precio = $row_prod[0][0]['precio'];
                $descuento = $row_prod[0][0]['descuento'];
                $nombre = $row_prod[0][0]['nombre'];
                $p_descuento = $precio - (($precio * $descuento) / 100);
              
                $sql_insert = $con->prepare("INSERT INTO detalle_compra (`id_compra`, `id_productos`, `nombre`, `precio`, `cantidad`) VALUES (?,?,?,?,?)");
                $sql_insert -> execute([$id, $clave ,$nombre, $p_descuento, $cantidad]);
            }
        }

        unset($_SESSION['carrito']);
    }

}