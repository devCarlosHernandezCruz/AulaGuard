<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "aulaguard";

    $conexion=new mysqli("localhost","root","","aulaguard");
    $conexion->set_charset("utf8");

    if(!$conexion){
        echo 'Conexion fallida';
    }

?>