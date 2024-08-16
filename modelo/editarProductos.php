<?php
include_once("conexion.php");

// Obtén los valores del formulario
$producto_id = $_POST['producto_id'];
$producto_nombre = $_POST['producto_nombre'];
$producto_descripcion = $_POST['producto_descripcion'];
$producto_precio = $_POST['producto_precio'];
$producto_descuento = $_POST['producto_descuento'];
$producto_stock = $_POST['producto_stock'];
$producto_categoria = $_POST['producto_categoria'];

// Prepara la consulta SQL utilizando sentencia preparada
$sql = "UPDATE productos SET 
        producto_nombre = ?,
        producto_descripcion = ?,
        producto_precio = ?,
        producto_descuento = ?,
        producto_stock = ?,
        producto_categoria = ?
        WHERE producto_id = ?";

// Prepara la sentencia
$stmt = $conexion->prepare($sql);

// Vincula los parámetros
$stmt->bind_param("ssssssi", $producto_nombre, $producto_descripcion, $producto_precio, $producto_descuento, $producto_stock, $producto_categoria, $producto_id);

// Ejecuta la sentencia
if ($stmt->execute()) {
    header("Location: ../vista/admin/productos.php");
} else {
    echo "Error al actualizar el producto: " . $stmt->error;
}

// Cierra la sentencia
$stmt->close();

// Cierra la conexión
$conexion->close();
?>
