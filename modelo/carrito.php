<?php 
class Carrito{
    private $producto_id;
    private $precioUnitario;
    private $cantidad;
    private $id_usuario;
 
    
    public function inicializar($producto_id, $precioUnitario, $cantidad, $id_usuario){
        $this-> producto_id = $producto_id;
        $this-> precioUnitario = $precioUnitario;
        $this-> cantidad = $cantidad;
        $this -> id_usuario = $id_usuario;
    }


    public function conectorBD()
    {
        $con = mysqli_connect("localhost", "root", "", "aulaguard")
            or die("Problemas con la conexion a la base de datos");
        return $con;
    }

    public function agregarCarrito(){
    $registro = mysqli_query($this->conectorBD(), "INSERT INTO detalles_compras(producto_id,det_com_preciounitario, det_com_cantidad, id_usuario)
    values ('$this->producto_id','$this->precioUnitario','$this->cantidad', '$this->id_usuario')");

        if ($registro) {
            echo '<script>';
            echo 'alert("Registro agregado correctamente");';
            echo 'setTimeout(function(){ window.location.href = "../vista/detalles.php?producto_id=11&id_usuario=1"; }, 100);';
            echo '</script>';
            exit();
        } else {
            echo '<script>alert("Error al agregar el registro");</script>';
        }
    }

    public function eliminarProducto($id_usuario, $producto_id){

        $conectar = $this->conectorBD();
        $id_usuario = mysqli_real_escape_string($conectar, $id_usuario);

        // Corrige la consulta de eliminación
        $sql = "DELETE FROM detalles_compras WHERE id_usuario = '$id_usuario' AND producto_id = '$producto_id'";

        $resultado = mysqli_query($conectar, $sql);

        if ($resultado) {
            echo '<script>';
            echo 'alert("Producto eliminado");';
            echo 'setTimeout(function(){ window.location.href = "../vista/carrito.php?id_usuario=1"; }, 100);';
            echo '</script>';
        } else {
            echo '<script>alert("Error al eliminar el producto");</script>';
        }
    }
    
    public function vaciarCarrito(){
        $this->id_usuario = $_GET['id_usuario'];

        $conectar = $this->conectorBD();
        $id_usuario = mysqli_real_escape_string($conectar, $this->id_usuario);

        // Corrige la consulta de eliminación
        $sql = "DELETE FROM detalles_compras WHERE id_usuario = '$id_usuario'";

        $resultado = mysqli_query($conectar, $sql);

        if ($resultado) {
            echo '<script>';
            echo 'alert("Producto eliminado");';
            echo 'setTimeout(function(){ window.location.href = "../vista/carrito.php?id_usuario=1"; }, 100);';
            echo '</script>';
        } else {
            echo '<script>alert("Error al eliminar el producto");</script>';
        }
    } 
    
}
?>