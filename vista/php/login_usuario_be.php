<?php
    // Método Session iniciada
    session_start();

    include 'conexion_be.php';

    $usuario_email = $_POST['usuario_email'];   
    $usuario_password = $_POST['usuario_password'];

    // Validar correo y contraseña
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario_email = '$usuario_email'");

    if (mysqli_num_rows($validar_login) > 0) {
        $row = mysqli_fetch_assoc($validar_login);
        $stored_password = $row['usuario_password'];

        // Compara las contraseñas en texto plano
        if ($stored_password === $usuario_password) {
           // Almacena todas las variables en un arreglo de sesión
            $usuario_data = array(
                'usuario_id' => $row['usuario_id'],
                'usuario_nombre' => $row['usuario_nombre'],
                'usuario_apellidoP' => $row['usuario_apellidoP'],
                'usuario_apellidoM' => $row['usuario_apellidoM'],
                'usuario_email' => $row['usuario_email'],
                'usuario_password' => $row['usuario_password'],
                'usuario_telefono' => $row['usuario_telefono'],
                'usuario_rol' => $row['usuario_rol']
            );
                
            // Muestra algunas variables para depuración
            var_dump($usuario_data);
            var_dump($_SESSION);
            
            // Asigna el arreglo de sesión
            $_SESSION['usuario_data'] = $usuario_data;

            // Redirige al usuario según su rol
            if ($usuario_data['usuario_rol'] === 'administrador') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../../index.php");
            }
            exit;
        } else {
            echo '
                <script>
                    alert("La contraseña es incorrecta. Verifique sus datos.");
                    window.location = "../login.php";
                </script>
            ';
        }
    } else {
        echo '
            <script>
                alert("Este usuario no existe. Verifique sus datos.");
                window.location = "../login.php";
            </script>
        ';
    }
?>


