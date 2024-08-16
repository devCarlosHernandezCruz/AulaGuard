<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query(" delete from puntuaciones where review_id=$id");
    if ($sql == 1) {
        echo '<script>
            var resp=confirm("La puntuación se ha eliminado correctamente");
    </script>';
    } else {
        echo '<script>
            var resp=confirm("Error al eliminar la puntuación");
    </script>';
    }
}
?>
