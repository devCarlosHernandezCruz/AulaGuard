<?php
session_start();
include_once('../../modelo/conexion1.php');

if (isset($_POST['add'])) {
    $database = new ConectarDB();
    $db = $database->open();

    try {
        // Obtener los datos del formulario
        $producto_nombre = $_POST['producto_nombre'];
        $producto_descripcion = $_POST['producto_descripcion'];
        $producto_imagen = $_FILES['producto_imagen']['tmp_name'];
        $imgContent = file_get_contents($producto_imagen);
        $producto_precio = $_POST['producto_precio'];
        $producto_descuento = $_POST['producto_descuento'];
        $producto_stock = $_POST['producto_stock'];
        $producto_categoria_id = $_POST['producto_categoria_id'];

        // Consulta para verificar si el nombre del producto ya existe
        $stmt = $db->prepare("SELECT COUNT(*) as count FROM productos WHERE producto_nombre = :producto_nombre");
        $stmt->execute(array(':producto_nombre' => $producto_nombre));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            $_SESSION['message'] = 'El nombre del producto ya existe.';
        } else {
            // Insertar el nuevo producto en la base de datos
            $stmt = $db->prepare("INSERT INTO productos (producto_nombre, producto_descripcion, producto_imagen, producto_precio, producto_descuento, producto_stock, producto_categoria_id)
            VALUES (:producto_nombre, :producto_descripcion, :producto_imagen, :producto_precio, :producto_descuento, :producto_stock, :producto_categoria_id)");

            $inserted = $stmt->execute(array(
                ':producto_nombre' => $producto_nombre,
                ':producto_descripcion' => $producto_descripcion,
                ':producto_imagen' => $imgContent,
                ':producto_precio' => $producto_precio,
                ':producto_descuento' => $producto_descuento,
                ':producto_stock' => $producto_stock,
                ':producto_categoria_id' => $producto_categoria_id
            ));

            $_SESSION['message'] = $inserted ? 'Producto agregado correctamente' : 'Algo salió mal, no se pudo agregar el producto';
        }

    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error en la base de datos: ' . $e->getMessage();
    } finally {
        $database->close();
    }
} else {
    $_SESSION['message'] = 'Rellene el formulario';
}

header('location: productos.php');
?>