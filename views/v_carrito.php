<?php
require '../models/database.php';
require '../controllers/config.php';
$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

// session_destroy();
$lista_carrito = array();
if($productos != null){
    foreach($productos as $clave => $cantidad){

        $sql = $con->prepare("SELECT id, nombre, precio, descuento, imagen,  $cantidad AS cantidad FROM productos WHERE id=? AND activo=1;");
       
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetchAll(PDO::FETCH_ASSOC);
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
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="./productos.php">Sandalias</a></li>
            <li><a href="./productos.php">Zapatos</a></li>
            <li><a href="./productos.hp">Botas</a></li>
            <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #fff
                            }
                        </style>
                        <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg></a><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?> </span></li>
        </ul>
    </nav>

    <main class="container mt-5 mb-5">
    <div class="table-responsive">
        <table class="table table-hover  text-center">
            <thead>
                <tr>
                    <th>Productos</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                $total = 0;
                if ($lista_carrito == null) {
                    echo '<tr><td colspan="6" class="text-center">Productos sin agregar</td></tr>';
                } else {
                    $total = 0;
                    foreach ($lista_carrito as $producto) {
                        $_id = $producto[0]['id'];
                        $nombre = $producto[0]['nombre'];
                        $cantidad = $producto[0]['cantidad'];
                        $imagen = $producto[0]['imagen'];
                        $precio = $producto[0]['precio'];
                        $descuento = $producto[0]['descuento'];
                        $p_descuento = $precio - (($precio * $descuento) / 100);
                        $subtotal = $cantidad * $p_descuento; 
                        $total += $subtotal; 
                ?>
                        <tr>
                            <td><?php echo $nombre; ?></td>
                            <td> <img src="<?php echo $imagen; ?>" alt="Imagen del producto" width="60"></td>
                            <td><?php echo MONEDA . number_format($p_descuento, 2, '.', ','); ?></td>
                            <td>
                                <input class="disabled" type="number" min="1" max="10" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="acCantidad(this.value, <?php echo $_id; ?>)">
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                            </td>
                            <td><a href="#" id="eliminar" type="button"  class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id ?>" data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar</a></td>

                        </tr>
                <?php }
                } ?>
                <tr>
                    <td colspan="3"></td>
                    <td colspan="3">
                        <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2">
                    <button class="btn btn-danger btn-lg">Realizar Pago</button>
                </div>
    </div>
</main>


<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Alerta!!!</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el producto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btn-eliminar" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>

 

        <!--- Inicio del footer-->

        <!-- Footer -->
        <footer class="text-center bg-danger text-lg-start text-white">
            <!-- Grid container -->
            <div class="container">
                <!-- Section: Links -->
                <section>
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Company name
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer
                                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                            <p>
                                <a class="text-white">MDBootstrap</a>
                            </p>
                            <p>
                                <a class="text-white">MDWordPress</a>
                            </p>
                            <p>
                                <a class="text-white">BrandFlow</a>
                            </p>
                            <p>
                                <a class="text-white">Bootstrap Angular</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Useful links
                            </h6>
                            <p>
                                <a class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a class="text-white">Help</a>
                            </p>
                        </div>

                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                            <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->

                <hr class="my-3">

                <!-- Section: Copyright -->
                <section class="p-3 pt-0">
                    <div class="row d-flex align-items-center">
                        <!-- Grid column -->
                        <div class="col-md-7 col-lg-8 text-center text-md-start">
                            <!-- Copyright -->
                            <div class="p-3">
                                © 2020 Copyright:
                                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                            </div>
                            <!-- Copyright -->
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                            <!-- Facebook -->
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-google"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-instagram"></i></a>
                        </div>
                        <!-- Grid column -->
                    </div>
                </section>
                <!-- Section: Copyright -->
            </div>
            <!-- Grid container -->
        </footer>
        <!-- Footer -->

        <!-- End of .container -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>

            let eliminarModal =document.getElementById("eliminarModal")
            eliminarModal.addEventListener('show.bs.modal', (event)=>{
                let button = event.relatedTarget
                let id =button.getAttribute('data-bs-id')
                let buttonEliminar = eliminarModal.querySelector(".modal-footer #btn-eliminar");
                buttonEliminar.value = id;
            })

            
            function acCantidad(cantidad, id) {
                let url = '../clases/actualizarCarrito.php'
                let formData = new FormData()
                formData.append('action', 'agregar')
                formData.append('id', id)
                formData.append('cantidad', cantidad)
                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                    
                }).then(response => response.json())
                .then(data=>{
                    if(data.ok){
                        let divSubtotal = document.getElementById('subtotal_'+ id);
                        divSubtotal.innerHTML = data.sub;


                        let total = 0.00;
                        let list =document.getElementsByName('subtotal[]')

                        for(let i =0; i<list.length; i++){
                            total +=parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                        }
                        total = new Intl.NumberFormat('en-US',{
                            minimumFractionDigits:2
                        }).format(total);
                        document.getElementById('total').innerHTML = '<?echo MONEDA; ?>' + total;
                    }
                })

            }

            function eliminar() {


                let botonEliminar = document.getElementById('btn-eliminar');
                let id =botonEliminar.value;
                let url = '../clases/actualizarCarrito.php'
                let formData = new FormData()
                formData.append('action', 'eliminar')
                formData.append('id', id)
                fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                    
                }).then(response => response.json())
                .then(data=>{
                    if(data.ok){
                        location.reload();
                    }
                })

            }
 
        </script>

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