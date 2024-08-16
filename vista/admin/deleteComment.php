<?php 
session_start();
 include_once('../../modelo/conexion1.php');
if (isset($_GET['comentario_id'])) {
	$database = new ConectarDB();
	$db = $database->open();
	try {
		$sql = "DELETE FROM comentarios WHERE comentario_id = '".$_GET['comentario_id']." ' ";

		$_SESSION['message']= ($db->exec($sql)) ? 'Comentario Eliminada Correctamente' : 'Algo Salio mal, No se pudo eliminar la comentario';
	    
	} catch (PDOException $e) {
		$_SESSION['message']= $e->getMessage();
	}
	$database->close();
}else{
	$_SESSION['message']= 'Seleccione un comentario para eliminar';

}
header('location: comentarios.php');

?>
