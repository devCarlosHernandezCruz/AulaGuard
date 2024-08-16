<?php 
    //Acceso a la base
    include 'conexion_be.php';

    //Envio de datos
    $usuario_nombre = $_POST['usuario_nombre'];
    $usuario_apellidoP = $_POST['usuario_apellidoP'];
    $usuario_email = $_POST['usuario_email']; 
    $usuario_password = $_POST['usuario_password'];
               
    //Encriptar contraseña
    //$usuario_password = hash('sha512', $password);

    //Insercion de datos a la basse de datos
    $query = "INSERT INTO usuarios(usuario_nombre, usuario_apellidoP, usuario_email, usuario_password)
        VALUES('$usuario_nombre', '$usuario_apellidoP', '$usuario_email', '$usuario_password')";
    
    //Verificar que no este el correo en la BD
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario_email = '$usuario_email' ");

    if(mysqli_num_rows($verificar_correo) >0){
        echo '
            <script> 
                alert("Este correo ya esta registrado, ingresa otro diferente.");
                window.location = "../registrarse.php";
            </script>
        ';
        exit();
    }
    //Ejecuta la consulta SQL para insertar un nuevo usuario en la base de datos
    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../login.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Parece que hubo un error, intenta registrarte de nuevo");
                window.location = "vista/registrarse.php";
            </script>
        ';
    }
    //cerrar la conexión a la base de datos 
    mysqli_close($conexion);
?>
