<?php
require '../models/database.php';
require '../controllers/config.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la peticion';
    exit;
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        $sql = $con->prepare("SELECT count(id)  FROM productos WHERE id=? AND activo=1;");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {

            $sql = $con->prepare("SELECT nombre, precio, descuento, descripcion, imagen  FROM productos WHERE id=? AND activo=1;");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            $nombre = $row['nombre'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $imagen = $row['imagen'];
            $descripcion = $row['descripcion'];
        }
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo 'Error al procesar la peticion';
        exit;
    }
}



?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Swiper CCS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!--AOS-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Tienda de Zapatos</title>
</head>

<body>
    <nav class="border-bottom">
        <ul>
            <li><a>Lenguaje</a></li>
            <li><a>USD</a></li>
            <li><a>+57 3135772703</a></li>
            <li><a>Dejanos un mensaje</a></li>

        </ul>
    </nav>

    <!-- Header -->
    <header class="header border-bottom border-danger">
        <div class="container">
            <div class="row">
                <div class="logo col">
                    <img src="../img/logo.png" alt="Logo de la tienda de zapatos">
                </div>
            </div>

        </div>
    </header>
    <!-- Sección de Navegación -->
    <nav class="bg-danger">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="./views/productos.html">Sandalias</a></li>
            <li><a href="./views/productos.html">Zapatos</a></li>
            <li><a href="./views/productos.html">Botas</a></li>
            <li><a href="./views/productos.html"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #fff
                            }
                        </style>
                        <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg></a></li>
        </ul>
    </nav>

    <main class="container">
        <!-- Sección de Inicio de Sesión -->
        <h1 class="fw-bold text-danger">new balance</h1>



        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <img src="<?php echo $imagen ?>" alt="">
                </div>
                <div class="col-md-6 order-md-2">
                    <h2><?php echo $nombre; ?></h2>
                    <?php
                    if ($descuento > 0) { ?>
                        <p><del><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></del></p>
                        <h2>
                            <?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?>
                            <small class="text-success"><?php echo $descuento; ?>% descuento</small>
                        </h2>
                    <?php } else { ?>

                        <h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h2>
                    <?php } ?>


                    <p class="lead">
                        <?php echo $descripcion; ?>
                    <div class="stars">★★★★★</div>
                    </p>
                    <div class="d-grid gap-3 col-10">
                        <button class="btn btn-danger" type="button">Comprar ahora</button>
                        <button class="btn btn-outline-danger" type="button" onclick="addProducto(<?php echo $id;?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>

        <!--- Inicio del footer-->


        <!-- Footer -->
<script>
    function addProducto(id, token) {
        let url = 'clases/carrito.php';
        let formData = new FormData();
        formData.append('id',id);
        formData.append('token',token);

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cros'
        }) .then(response=> response.json())

    }
</script>
        <!-- End of .container -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script src="./javascript/app.js"></script>

        <!--AOS-->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                easing: 'ease-out-back',
                duration: 1000
            });
        </script>
</body>

</html>