<?php
session_start();
include_once('../../modelo/conexion1.php');

if (isset($_POST['edit'])) {
    $database = new ConectarDB();
    $db = $database->open();

    try {
        $producto_id = $_GET['producto_id'];
        $producto_nombre = $_POST['producto_nombre'];
        $producto_descripcion = $_POST['producto_descripcion'];
        $producto_precio = $_POST['producto_precio'];
        $producto_descuento = $_POST['producto_descuento'];
        $producto_stock = $_POST['producto_stock'];
        $producto_categoria_id = $_POST['producto_categoria_id'];

        // Consulta para verificar si el nombre del producto ya existe, excluyendo el producto actual
        $stmt = $db->prepare("SELECT COUNT(*) as count FROM productos WHERE producto_nombre = :producto_nombre AND producto_id != :producto_id");
        $stmt->execute(array(':producto_nombre' => $producto_nombre, ':producto_id' => $producto_id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            $_SESSION['message'] = 'El nombre del producto ya existe';
        } else {
            // Actualizar los datos del producto en la base de datos
            $sql = "UPDATE productos SET producto_nombre = :producto_nombre, producto_descripcion = :producto_descripcion, producto_precio = :producto_precio, producto_descuento = :producto_descuento, producto_stock = :producto_stock, producto_categoria_id = :producto_categoria_id WHERE producto_id = :producto_id";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(
                ':producto_nombre' => $producto_nombre,
                ':producto_descripcion' => $producto_descripcion,
                ':producto_precio' => $producto_precio,
                ':producto_descuento' => $producto_descuento,
                ':producto_stock' => $producto_stock,
                ':producto_categoria_id' => $producto_categoria_id,
                ':producto_id' => $producto_id
            ));

            $_SESSION['message'] = ($stmt->rowCount() > 0) ? 'Datos actualizados correctamente' : 'No se realizaron cambios en los datos';

            // Verificar y actualizar la imagen del producto en la base de datos
            $nueva_imagen = $_FILES['nueva_imagen']['tmp_name'];

            if (!empty($nueva_imagen)) {
                $nueva_imagen_contenido = file_get_contents($nueva_imagen);

                $sql = "UPDATE productos SET producto_imagen = :nueva_imagen WHERE producto_id = :producto_id";
                $stmt = $db->prepare($sql);
                $stmt->execute(array(':nueva_imagen' => $nueva_imagen_contenido, ':producto_id' => $producto_id));
            }
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