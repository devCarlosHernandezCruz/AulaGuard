<?php
include "../modelo/conexion.php";

if (isset($_POST['busqueda'])) {
    $termino = $_POST['busqueda'];

    $query = "SELECT * FROM usuarios WHERE 
              usuario_id LIKE '%$termino%' OR
              usuario_nombre LIKE '%$termino%' OR
              usuario_apellidoP LIKE '%$termino%' OR
              usuario_apellidoM LIKE '%$termino%' OR
              usuario_email LIKE '%$termino%' OR
              usuario_password LIKE '%$termino%' OR
              usuario_telefono LIKE '%$termino%' OR
              usuario_rol LIKE '%$termino%'";

    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>Usuario ID: " . $row['usuario_id'] . ", Nombre: " . $row['usuario_nombre'] . "</p>";
            // Puedes mostrar más información de la fila según tu necesidad
        }
    } else {
        echo "No se encontraron resultados.";
    }
}
?>
