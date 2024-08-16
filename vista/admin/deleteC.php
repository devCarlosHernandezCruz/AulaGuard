<?php
session_start();
include_once('../../modelo/conexion1.php');

if (isset($_GET['categoria_id'])) {
	$categoria_id = $_GET['categoria_id'];
	$database = new ConectarDB();
	$db = $database->open();

	// Validar si hay productos asociados a la categoría
	$stmt_productos = $db->prepare("SELECT * FROM productos WHERE producto_categoria_id = :categoria_id");
	$stmt_productos->execute(array(':categoria_id' => $categoria_id));

	if ($stmt_productos->rowCount() > 0) {
		$_SESSION['message'] = 'No se puede eliminar la categoría porque hay productos asociados a ella.';
	} else {
		try {
			$sql = "DELETE FROM categorias WHERE categoria_id = :categoria_id";
			$stmt = $db->prepare($sql);
			$stmt->execute(array(':categoria_id' => $categoria_id));

			$_SESSION['message'] = ($stmt->rowCount() > 0) ? 'Categoría eliminada correctamente' : 'No se pudo eliminar la categoría';
		} catch (PDOException $e) {
			$_SESSION['message'] = 'Error al eliminar la categoría: ' . $e->getMessage();
		}
	}

	$database->close();
} else {
	$_SESSION['message'] = 'Seleccione una categoría para eliminar';
}

header('location: categorias.php');
