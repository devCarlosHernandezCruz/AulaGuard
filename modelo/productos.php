<?php
    // Verifica si se reciben datos por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Incluye el archivo de conexión
        include("conexion.php");

        // Sanitiza y obtén los valores de los campos
        $producto_nombre = mysqli_real_escape_string($conexion, $_POST['producto_nombre']);
        $producto_descripcion = mysqli_real_escape_string($conexion, $_POST['producto_descripcion']);
        $producto_precio = mysqli_real_escape_string($conexion, $_POST['producto_precio']);
        $producto_descuento = mysqli_real_escape_string($conexion, $_POST['producto_descuento']);
        $producto_stock = mysqli_real_escape_string($conexion, $_POST['producto_stock']);
        $producto_categoria = mysqli_real_escape_string($conexion, $_POST['producto_categoria']);
        $producto_imagen = $_FILES['producto_imagen']['tmp_name'];
        $imgContent = file_get_contents($producto_imagen);

        // Verifica si el nombre del producto ya existe
        $query = "SELECT * FROM productos WHERE producto_nombre = '$producto_nombre'";
        $result = mysqli_query($conexion, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('El nombre del producto ya existe. Por favor, elige otro.');</script>";
            echo "<script>window.location.href = '../vista/admin/agregarProduct.php';</script>";
            exit(); // Salir para evitar que se ejecute el resto del código
        } else {
            // Prepara la consulta SQL usando parámetros
            $sql = "INSERT INTO productos (producto_nombre, producto_descripcion, producto_precio, producto_descuento, producto_stock, producto_categoria, producto_imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";

            // Prepara la sentencia
            $stmt = mysqli_prepare($conexion, $sql);

            // Vincula los parámetros
            mysqli_stmt_bind_param($stmt, "sssssss", $producto_nombre, $producto_descripcion, $producto_precio, $producto_descuento, $producto_stock, $producto_categoria, $imgContent);

            // Ejecuta la sentencia
            $resultado = mysqli_stmt_execute($stmt);

            // Verifica el resultado de la consulta
            if ($resultado) {
                // Redirige a la página de éxito
                header("Location: ../vista/admin/productos.php");
                exit();
            } else {
                // Muestra un mensaje de error
                echo "Error al insertar datos: " . mysqli_error($conexion);
            }

            // Cierra la sentencia
            mysqli_stmt_close($stmt);
        }

        // Cierra la conexión
        mysqli_close($conexion);
    } else {
        // Si no se reciben datos por POST, muestra un mensaje de error
        echo "Acceso no permitido";
    }
?>
