<?php  
    include "../modelo/comentario.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tipo = $_POST["tipo"]; 
        $email = $_POST["email"];
        $comentario = $_POST["comentario"];

        $nuevoComentario = new Comentario($tipo, $email, $comentario);
        $comentarioDAO = new ComentarioDAO();

        if ($comentarioDAO->insertarComentario($nuevoComentario)) {
            echo '
                <script>
                    window.location = "../vista/contact.php";
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Error al insertar el comentario");
                    window.location = "../vista/contact.php";
                </script>
            '; 
        }
    }
?>
