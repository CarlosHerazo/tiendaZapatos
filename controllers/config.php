<?php
    session_start();

    define("CLIENT_ID", "AdnNr3ISDnSg7C1qZIVg60s9Hez3KT6X-a0zH1ps_39l21g-81JJvgBx0INqjzj6okhFFpY81jQCtP1Z");
    define("KEY_TOKEN", "APR.wqc-354*");
    define("CURRENCY", "USD");
    define("MONEDA", "$");
    $num_cart = 0;
    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }
?>