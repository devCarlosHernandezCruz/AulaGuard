<?php
session_start();
include_once('../../modelo/conexion1.php');

if (isset($_POST['add'])) {
    // Validar que el nombre de la categoría no esté vacío
    if (!empty($_POST['categoria_nombre'])) {
        $database = new ConectarDB();
        $db = $database->open();

        // Validar si la categoría ya existe en la base de datos
        $categoria_nombre = $_POST['categoria_nombre'];
        $stmt_check = $db->prepare("SELECT * FROM categorias WHERE categoria_nombre = :categoria_nombre");
        $stmt_check->execute(array(':categoria_nombre' => $categoria_nombre));

        if ($stmt_check->rowCount() > 0) {
            $_SESSION['message'] = 'La categoría ya existe. Introduce un nombre de categoria diferente.';
        } else {
            try {
                $stmt = $db->prepare("INSERT INTO categorias (categoria_nombre) VALUES (:categoria_nombre)");
                $_SESSION['message'] = ($stmt->execute(array(':categoria_nombre' => $categoria_nombre))) ? 'Categoría agregada correctamente' : 'Esta categoria ya existe';
            } catch (PDOException $e) {
                $_SESSION['message'] = $e->getMessage();
            }
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