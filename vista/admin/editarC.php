<?php
session_start();
include_once('../../modelo/conexion1.php');

if (isset($_POST['editC'])) {
    // Validar que el nombre de la categoría no esté vacío
    if (!empty($_POST['categoria_nombre'])) {
        $database = new ConectarDB();
        $db = $database->open();

        try {
            $id = $_GET['categoria_id'];
            $nombrec = $_POST['categoria_nombre'];

            // Validar si el nuevo nombre ya existe en la base de datos (excluyendo el nombre actual del registro que se está editando)
            $stmt_check = $db->prepare("SELECT * FROM categorias WHERE categoria_nombre = :categoria_nombre AND categoria_id != :categoria_id");
            $stmt_check->execute(array(':categoria_nombre' => $nombrec, ':categoria_id' => $id));

            if ($stmt_check->rowCount() > 0) {
                $_SESSION['message'] = 'El nombre de la categoría ya existe. Introduce un nombre diferente.';
            } else {
                $sql = "UPDATE categorias SET categoria_nombre = '$nombrec' WHERE categoria_id = '$id'";
                $_SESSION['message'] = ($db->exec($sql)) ? 'Datos actualizados correctamente' : 'La categoria ya existe, no se pudo actualizar la categoría';
            }
        } catch (PDOException $e) {
            $_SESSION['message'] = $e->getMessage();
        }

        $database->close();
    } else {
        $_SESSION['message'] = 'El nombre de la categoría no puede estar vacío. Rellene el formulario correctamente.';
    }
} else {
    $_SESSION['message'] = 'Rellene el formulario';
}

header('location: categorias.php');
?>