<?php

    class Conexion{

        static public  function conectar(){

            $con = new PDO("mysql:host=localhost;dbname=tienda_online","root","",
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
          return $con;
        }
      
    
    
    }