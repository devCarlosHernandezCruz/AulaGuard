<?php

class UsuarioModel
{
    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }

    public function registrarUsuario($nombre, $apellidoP, $email, $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios (usuario_nombre, usuario_apellidoP, usuario_email, usuario_password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        $stmt->bind_param("ssss", $nombre, $apellidoP, $email, $hashedPassword);

        if ($stmt->execute()) {
            return true; // Registro exitoso
        } else {
            return false; // Error en el registro
        }
    }

    public function loginUsuario($email, $password){
        $query = "SELECT usuario_id, usuario_nombre, usuario_apellidoP, usuario_email, usuario_password FROM usuarios WHERE usuario_email = ?";
        $stmt = $this->conexion->prepare($query);

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password, $row['usuario_password'])) {
                // Contraseña válida, iniciar sesión
                $usuario = array(
                    'usuario_id' => $row['usuario_id'],
                    'usuario_nombre' => $row['usuario_nombre'],
                    'usuario_apellidoP' => $row['usuario_apellidoP'],
                    'usuario_apellidoM' => $row['usuario_apellidoM'],
                    'usuario_email' => $row['usuario_email'],
                    'usuario_password' => $row['usuario_password'],
                    'usuario_rol' => $row['usuario_rol'],
                    // Puedes agregar más información según tus necesidades
                );

                return $usuario; // Devuelve el arreglo de usuario
            } else {
                return false; // Contraseña incorrecta
            }
        } else {
            return false; // Usuario no encontrado
        }
    }

    public function cerrarSesion(){
        session_start();

        // Destruir todas las variables de sesión
        $_SESSION = array();

        // Si deseas destruir la sesión completamente, descomenta la siguiente línea
        // session_destroy();

        // Redirigir a la página principal (ajusta la ruta según tu estructura de carpetas)
        header("Location: ../../index.php");
        exit();
    }
}
?>
