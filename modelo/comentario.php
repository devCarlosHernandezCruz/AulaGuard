<?php

include "conexion.php";

class Comentario {
    public $comentario_id;
    public $comentario_tipo;
    public $comentario_email;
    public $comentario_comentario;

    // Constructor
    public function __construct($tipo, $email, $comentario) {
        $this->comentario_tipo = $tipo;
        $this->comentario_email = $email;
        $this->comentario_comentario = $comentario;
    }
}
//Data Access Object
class ComentarioDAO {
    private $conexion;

    public function __construct() {
        global $conexion;
        $this->conexion = $conexion;
    }

    public function insertarComentario(Comentario $comentario) {
        $tipo = $comentario->comentario_tipo;
        $email = $comentario->comentario_email;
        $contenido = $comentario->comentario_comentario;

        $query = "INSERT INTO comentarios (comentario_tipo, comentario_email, comentario_comentario) 
                  VALUES ('$tipo', '$email', '$contenido')";

        return $this->conexion->query($query);
    }  
}
?>

