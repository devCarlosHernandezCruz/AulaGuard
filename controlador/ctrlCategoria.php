<?php

include("../modelo/categorias.php");
    $cat = new categoria();
    $cat -> conexionBD();
    switch ($_REQUEST['opcion']) {
    case 1:
    $cat -> inicializar($_REQUEST['categoria_id'],$_REQUEST['nombre']);
    case 2:
    $cat -> agregar();
    case 3:
    $cat -> modificar();
    case 4:
    $cat -> eliminar($_REQUEST['categoria_id']);
    case 5:
    $cat -> cerrarBD();
    }
