<?php
include "../modelo/direccion.php";
$direc= new Direccion();
$id=$_GET['idB'];
$direc->BorrarDireccion($id);
print '<script>
window.alert("Dirección Borrada exitosamente");
window.location.href="../vista/direcciones.php";
</script>';
?>