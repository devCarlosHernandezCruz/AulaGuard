<?php 
session_start();
include_once('../../modelo/conexion1.php');
if (isset($_GET['usuario_id'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$sql = "DELETE FROM usuarios WHERE usuario_id = '".$_GET['usuario_id']." ' ";

		$_SESSION['message']= ($db->exec($sql)) ? 'Usuario Eliminado Correctamente' : 'Algo Salio mal, No se pudo eliminar el usuario';
	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Seleccione un usuario para eliminar';

}
header('location: usuarios.php');
?>
