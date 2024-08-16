<?php
include("../modelo/carrito.php");



$carrito = new Carrito();
$carrito->conectorBD();

if (isset($_POST['opcion'])) {
    switch ($_POST['opcion']) {
        case 1:
            $id_usuario = $_GET['id_usuario'];
            $carrito->inicializar($_GET['producto_id'], $_GET['precioUnitario'], $_POST['cantidad'], $_GET['id_usuario']);
            $carrito->agregarCarrito();
            break;
        case 2:
            $carrito->eliminarProducto($_POST['id_usuario'], $_POST['producto_id']);
            break;

        case 3:
            $id_usuario = $_GET['id_usuario'];
            $carrito->vaciarCarrito();
            break;
    }
}
?>