<?php
    require './controllers/config.php';

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                    <img src="./img/logo.png" alt="Logo de la tienda de zapatos">
                </div>
            </div>
          
        </div>
    </header>
    <!-- Sección de Navegación -->
    <nav class="bg-danger">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="./views/productos.php">Sandalias</a></li>
            <li><a href="./views/productos.php">Zapatos</a></li>
            <li><a href="./views/productos.php">Botas</a></li>
            <li><a href="./views/v_carrito.php"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #fff
                            }
                        </style>
                        <path
                            d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg></a><span class="badge bg-secondary"><?php echo $num_cart; ?> </span></li>
        </ul>
    </nav>

   <main class="container">
        <!-- Sección de Inicio de Sesión -->
        <h1 class="fw-bold text-danger">new balance</h1>
        <section class="row">
            <div class="col"  data-aos="fade-up" >
                <h4>Iniciar Sesión</h4>
                <form >

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Sesion administrativa</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-danger w-50">INGRESAR</button>
                </form>
            </div>

            <!-- Sección Principal -->
            <div class="col-md-9 ">
                <h2 class="text-center">Bienvenido a la Tienda de Zapatos</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem laboriosam, harum eos doloribus
                    ipsum voluptatibus quo deleniti eaque, cum facere incidunt corrupti omnis odio assumenda repudiandae
                    commodi, illo reiciendis perspiciatis.
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem laboriosam, harum eos doloribus
                    ipsum voluptatibus quo deleniti eaque, cum facere incidunt corrupti omnis odio assumenda repudiandae
                    commodi, illo reiciendis perspiciatis.
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem laboriosam, harum eos doloribus
                    ipsum voluptatibus quo deleniti eaque, cum facere incidunt corrupti omnis odio assumenda repudiandae
                    commodi, illo reiciendis perspiciatis.
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem laboriosam, harum eos doloribus
                    ipsum voluptatibus quo deleniti eaque, cum facere incidunt corrupti omnis odio assumenda repudiandae
                    commodi, illo reiciendis perspiciatis.
                </p>
            </div>
        </section>
    </main> 
    <!-- Swiper -->



 <section class="container mt-5">

        <div class="row" data-aos="zoom-in" >
            <div class="card-horizontal col-sm">
                <img src="./img/card2-zapatos.jpg" alt="Imagen de la tarjeta" class="card-img-top">
                <div class="card-content">
                    <h3>Título de la tarjeta</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste id harum, impedit odio natus dicta
                        praesentium architecto </p>
                    <div class="justify-content-center">
                        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="#">
                            Ver detalles
                        </a>
                    </div>

                </div>
            </div>

            <div class="card-horizontal col-sm" data-aos="zoom-in" >
                <img src="./img/card1-zapatos.avif" alt="Imagen de la tarjeta" class="card-img-top">
                <div class="card-content">
                    <h3>Título de la tarjeta</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste id harum, impedit odio natus dicta
                        praesentium architecto </p>
                    <div class="justify-content-center">
                        <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="#">
                            Ver detalles
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </section> 
    <!---Aqui empieza la seccion de la imagen-->
    <section class="container-fluid section-img mt-5">

        <img data-aos="fade-right"  src="./img/zapato_seccion.png" alt="Imagen 1" class="image-bottom-left">
        <img data-aos="fade-left"  src="./img/zapato_seccion2.png" alt="Imagen 2" class="image-top-right">

        <div class="container" data-aos="zoom-in">
            <h2>¿Que Esperas?</h2>
            <p >Enterate de lo nuevo, ponte comodo  y mira nuestros nuevos modelos <br> <span class="fw-bold">¡Sorprendete!</span> </p>
            <button type="button" class="btn btn-outline-warning">Ver detalles</button>
        </div>
    </section>

    <main class="container">
        <h2 class="mt-5">Productos Exclusivos</h2>
        <!--contenedor productos inicio-->
        <div class="row">

            <section class="col">
                <div 
                    class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 column-gap-3 justify-content-center text-center">
                    <!--inicio card-->
                    <div class="card col-md " data-aos="fade-up" style="width: 18rem;">
                        <img src="./img/zapato1.webp" class="card-img-top" alt="zapato1">
                        <div class="card-body">
                            <h5 class="card-title">Zapato 1</h5>
                            <p class="card-text">Some quick example text</p>
                            <div class="stars">★★★★★</div>
                            <!-- Puedes ajustar el número de estrellas según la calificación -->
                            <div class="price">$99.99</div>
                            <button class="btn btn-danger">Agregar al carrito</button>
                        </div>

                    </div>
                    <!--fin card-->
                    <!--inicio card-->
                    <div class="card col-md" data-aos="zoom-in" style="width: 18rem;">
                        <img src="./img/zapato1.webp" class="card-img-top" alt="zapato1">
                        <div class="card-body">
                            <h5 class="card-title">Zapato 1</h5>
                            <p class="card-text">Some quick example text</p>
                            <div class="stars">★★★★★</div>
                            <!-- Puedes ajustar el número de estrellas según la calificación -->
                            <div class="price">$99.99</div>
                            <button class="btn btn-danger">Agregar al carrito</button>
                        </div>

                    </div>
                    <!--fin card-->
                    <!--inicio card-->
                    <div class="card col-md" data-aos="fade-up" style="width: 18rem;">
                        <img src="./img/zapato1.webp" class="card-img-top" alt="zapato1">
                        <div class="card-body">
                            <h5 class="card-title">Zapato 1</h5>
                            <p class="card-text">Some quick example text</p>
                            <div class="stars">★★★★★</div>
                            <!-- Puedes ajustar el número de estrellas según la calificación -->
                            <div class="price">$99.99</div>
                            <button class="btn btn-danger">Agregar al carrito</button>
                        </div>

                    </div>
                    <!--fin card-->
                    <!--inicio card-->
                    <div class="card col-md" data-aos="zoom-in" style="width: 18rem;">
                        <img src="./img/zapato1.webp" class="card-img-top" alt="zapato1">
                        <div class="card-body">
                            <h5 class="card-title">Zapato 1</h5>
                            <p class="card-text">Some quick example text</p>
                            <div class="stars">★★★★★</div>
                            <!-- Puedes ajustar el número de estrellas según la calificación -->
                            <div class="price">$99.99</div>
                            <button class="btn btn-danger">Agregar al carrito</button>
                        </div>

                    </div>
                    <!--fin card-->
                    <!--inicio card-->
                    <div class="card col-md"  data-aos="fade-up" style="width: 18rem;">
                        <img src="./img/zapato1.webp" class="card-img-top" alt="zapato1">
                        <div class="card-body">
                            <h5 class="card-title">Zapato 1</h5>
                            <p class="card-text">Some quick example text</p>
                            <div class="stars">★★★★★</div>
                            <!-- Puedes ajustar el número de estrellas según la calificación -->
                            <div class="price">$99.99</div>
                            <button class="btn btn-danger">Agregar al carrito</button>
                        </div>

                    </div>
                    <!--fin card-->
                    <!--inicio card-->
                    <div class="card col-md" data-aos="zoom-in" style="width: 18rem;">
                        <img src="./img/zapato1.webp" class="card-img-top" alt="zapato1">
                        <div class="card-body">
                            <h5 class="card-title">Zapato 1</h5>
                            <p class="card-text">Some quick example text</p>
                            <div class="stars">★★★★★</div>
                            <!-- Puedes ajustar el número de estrellas según la calificación -->
                            <div class="price">$99.99</div>
                            <button class="btn btn-danger">Agregar al carrito</button>
                        </div>

                    </div>
                    <!--fin card-->
                    <!--inicio card-->
                    <div class="card col-md" data-aos="fade-up"  style="width: 18rem;">
                        <img src="./img/zapato1.webp" class="card-img-top" alt="zapato1">
                        <div class="card-body">
                            <h5 class="card-title">Zapato 1</h5>
                            <p class="card-text">Some quick example text</p>
                            <div class="stars">★★★★★</div>
                            <!-- Puedes ajustar el número de estrellas según la calificación -->
                            <div class="price">$99.99</div>
                            <button class="btn btn-danger">Agregar al carrito</button>
                        </div>

                    </div>
                    <!--fin card-->
                    <!--inicio card-->
                    <div class="card col-md" data-aos="zoom-in" style="width: 18rem;">
                        <img src="./img/zapato1.webp" class="card-img-top" alt="zapato1">
                        <div class="card-body">
                            <h5 class="card-title">Zapato 1</h5>
                            <p class="card-text">Some quick example text</p>
                            <div class="stars">★★★★★</div>
                            <!-- Puedes ajustar el número de estrellas según la calificación -->
                            <div class="price">$99.99</div>
                            <button class="btn btn-danger">Agregar al carrito</button>
                        </div>

                    </div>
                    <!--fin card-->
                </div>
            </section>
        </div>
    </main>


    <!--reseñas-->
    <section class="container mb-5 mt-5">
        <h3>Nuestas reseñas</h3>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card-horizontal col">
                        <img src="./img/card1-zapatos.avif" alt="Imagen de la tarjeta">
                        <div class="card-content">
                            <h3>Título de la tarjeta</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste id harum, impedit odio
                                natus
                                dicta
                                praesentium architecto </p>
                            <div class="justify-content-center">
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                    href="#">
                                    Ver detalles
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card-horizontal col">
                        <img src="./img/card2-zapatos.jpg" alt="Imagen de la tarjeta" class="card-img-top">
                        <div class="card-content">
                            <h3>Título de la tarjeta</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste id harum, impedit odio
                                natus dicta
                                praesentium architecto </p>
                            <div class="justify-content-center">
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                    href="#">
                                    Ver detalles
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-horizontal col">
                        <img src="./img/card2-zapatos.jpg" alt="Imagen de la tarjeta" class="card-img-top">
                        <div class="card-content">
                            <h3>Título de la tarjeta</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste id harum, impedit odio
                                natus dicta
                                praesentium architecto </p>
                            <div class="justify-content-center">
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                    href="#">
                                    Ver detalles
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card-horizontal col">
                        <img src="./img/card2-zapatos.jpg" alt="Imagen de la tarjeta" class="card-img-top">
                        <div class="card-content">
                            <h3>Título de la tarjeta</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste id harum, impedit odio
                                natus dicta
                                praesentium architecto </p>
                            <div class="justify-content-center">
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                                    href="#">
                                    Ver detalles
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
    </section>
    <!---Fin de las reseñas-->
    <!--- Inicio del footer-->
    <!-- Remove the container if you want to extend the Footer to full width. -->

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
                        <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                class="fab fa-instagram"></i></a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="../javascript/app.js"></script>

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