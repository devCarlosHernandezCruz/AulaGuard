<?php
session_start();
include "../modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar variable $usuario_data 
    if (isset($_SESSION['usuario_data']) && is_array($_SESSION['usuario_data']) && array_key_exists('usuario_id', $_SESSION['usuario_data'])) {
        // Obtén los valores del formulario
        $nuevo_nombre = $_POST['nuevo_nombre'];
        $nuevo_apellidoP = $_POST['nuevo_apellidoP'];
        $nuevo_apellidoM = $_POST['nuevo_apellidoM'];
        $nuevo_correo = isset($_POST['nuevo_email']) ? $_POST['nuevo_email'] : '';
        $nuevo_password = isset($_POST['nuevo_password']) ? $_POST['nuevo_password'] : '';
        $nuevo_telefono = $_POST['nuevo_telefono'];

        // Acceso a datos por $usuario_data
        $usuario_id = $_SESSION['usuario_data']['usuario_id']; // <-- Asegúrate de usar 'usuario_id'

        // Construccion consulta SQL
        $actualizar_query = "UPDATE usuarios SET usuario_nombre = '$nuevo_nombre', usuario_apellidoP = '$nuevo_apellidoP', usuario_apellidoM = '$nuevo_apellidoM', usuario_email = '$nuevo_correo', usuario_password = '$nuevo_password', usuario_telefono = '$nuevo_telefono' WHERE usuario_id = $usuario_id";

        // Agrega este echo para ver la consulta SQL
        echo "Consulta SQL: $actualizar_query";

        if (mysqli_query($conexion, $actualizar_query)) {
            // Actualiza la sesión con los nuevos valores
            $_SESSION['usuario_data']['usuario_nombre'] = $nuevo_nombre;
            $_SESSION['usuario_data']['usuario_apellidoP'] = $nuevo_apellidoP;
            $_SESSION['usuario_data']['usuario_apellidoM'] = $nuevo_apellidoM;
            $_SESSION['usuario_data']['usuario_email'] = $nuevo_correo;
            $_SESSION['usuario_data']['usuario_password'] = $nuevo_password;
            $_SESSION['usuario_data']['usuario_telefono'] = $nuevo_telefono;

            // Redirige al perfil 
            header("Location: ../vista/perfil.php");
            exit();
        } else {
            // Error actualización
            echo "Error al actualizar: " . mysqli_error($conexion);
        }
    } else {
        echo "Error: La variable de sesión 'usuario_data' no está definida o no contiene 'usuario_id'.";
    }
} else {
    // Por si intentan acceder directamente sin enviar datos por POST
    echo "Acceso no permitido";
}
?>
