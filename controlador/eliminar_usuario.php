<?php
include "../modelo/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario_id'];

    // Realizar la eliminación en la base de datos
    $deleteQuery = "DELETE FROM usuarios WHERE usuario_id = $usuario_id";
    $conexion->query($deleteQuery);

    // Redirigir a la página de lista de usuarios después de la eliminación
    header("Location: ../vista/admin/usuarios.php");
}

if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE usuario_id = $usuario_id";
    $result = $conexion->query($query);
    $usuario = $result->fetch_object();
}
?>

<?php if (isset($usuario)) : ?>
    <h1>Eliminar Usuario</h1>
    <p>¿Estás seguro que deseas eliminar el usuario: <?= $usuario->usuario_nombre ?>?</p>
    <form method="POST">
        <input type="hidden" name="usuario_id" value="<?= $usuario->usuario_id ?>">
        <button type="submit">Sí, eliminar</button>
    </form>
<?php else : ?>
    <p>Usuario no encontrado.</p>
<?php endif; ?>
