<?php 
session_start();
 include_once('../../modelo/conexion1.php');
if (isset($_GET['producto_id'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$sql = "DELETE FROM productos WHERE producto_id = '".$_GET['producto_id']." ' ";

		$_SESSION['message']= ($db->exec($sql)) ? 'Producto Eliminado Correctamente' : 'Algo Salio mal, No se pudo eliminar el producto';
	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Seleccione un contacto para eliminar';

}
header('location: productos.php');

?>