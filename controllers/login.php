<?php

// Establecer una conexión a la base de datos
$db = new Database();
$con = $db->conectar();
if ($_POST) {
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT id, password, nombre FROM admin WHERE user = :usuario";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $row['password'];
        $pass_c  = sha1($contra);

        if ($hashedPassword == $pass_c) {
            $_SESSION['nombre'] = $row['nombre'];
            header("Location:admin/index.php");
        }
        // Verificar la contraseña
        if (password_verify($contra, $hashedPassword)) {
            // La contraseña es correcta, puedes permitir el acceso
           echo  "Contraseña válida. Acceso permitido.";
        } else {
            // La contraseña no coincide
           echo "Contraseña incorrecta. Acceso denegado.";
        }
    } else {
        // No se encontró el usuario en la base de datos
       echo "Usuario no encontrado. Acceso denegado.";
    }
}

// Imprime la respuesta en un script JavaScript

?>