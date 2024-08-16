<?php

class categoria
{
    private $categoria_id;
    private $nombre;

    public function inicializar($categoria_id, $nombre)
    {
        $this->categoria_id = $categoria_id;
        $this->nombre = $nombre;
    }

    public function conexionBD()
    {
        $con = mysqli_connect("localhost", "root", "", "aulaguard") or die("Problemas con la conexión a la base de datos");
        return $con;
    }
    public function agregar()
    {
        $registro = mysqli_query($this->conexionBD(), "SELECT * FROM categorias WHERE categoria_nombre = '$this->nombre'")
            or die("Problemas en la consulta" . mysqli_error($this->conexionBD()));

        if ($reg = mysqli_fetch_array($registro)) {
            return 'Ya existe esta categoria';
        } else {

            // Insertar nuevo usuario con la contraseña hasheada
            mysqli_query($this->conexionBD(), "INSERT INTO categorias (categoria_nombre) VALUES
                ('$this->nombre')")
                or die("Problemas en el insert" . mysqli_error($this->conexionBD()));
            header("Location: ../vista/admin/categorias.php");
            exit(); // Asegurar que no se ejecute más código después de la redirección
        }
    }
    public function modificar()
    {
        // Verificar si la categoría ya existe
        $consultaExistencia = mysqli_query($this->conexionBD(), "SELECT * FROM categorias WHERE categoria_nombre = '$this->nombre'")
            or die("Problemas en la consulta: " . mysqli_error($this->conexionBD()));

        if (mysqli_num_rows($consultaExistencia) > 0) {
            return 'Ya existe esta categoría';
        } else {
            // Actualizar la categoría
            mysqli_query($this->conexionBD(), "UPDATE categorias SET categoria_nombre = '$this->nombre' WHERE categoria_id = $this->categoria_id")
                or die("Problemas en la actualización: " . mysqli_error($this->conexionBD()));

            header("Location: ../vista/admin/categorias.php");
            exit(); // Asegurar que no se ejecute más código después de la redirección
        }
    }

    public function eliminar($categoria_id)
    {
        // Validar que el ID de la categoría sea un entero
        $categoria_id = intval($this->categoria_id);

        // Verificar si la categoría existe
        $consulta = mysqli_query($this->conexionBD(), "SELECT * FROM categorias WHERE categoria_id = $categoria_id")
            or die("Problemas en la consulta: " . mysqli_error($this->conexionBD()));

        if (mysqli_num_rows($consulta) == 0) {
            return 'La categoría no existe';
        } else {
            // Eliminar la categoría
            $eliminacion = mysqli_query($this->conexionBD(), "DELETE FROM categorias WHERE categoria_id = $categoria_id")
                or die("Problemas en la eliminación: " . mysqli_error($this->conexionBD()));

            if ($eliminacion) {
                header("Location: ../vista/admin/categorias.php");
                exit(); // Asegurar que no se ejecute más código después de la redirección
            } else {
                return 'Error al eliminar la categoría';
            }
        }
    }


    public function cerrarBD()
    {
        mysqli_close($this->conexionBD());
    }
}
