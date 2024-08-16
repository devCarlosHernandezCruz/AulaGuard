<?php
class Instalador{
    private $fecha;
    private $idVenta;
    private $estatus;
    private $cliente;

    public function inicializarCita($fecha, $idVenta,$estatus, $cliente){
        $this->fecha=$fecha;
        $this->estatus=$estatus;
        $this->idVenta=$idVenta;
        $this->cliente=$cliente;
    }
    
    public function conectarBD(){
        $con = mysqli_connect("localhost", "root", "", "aulaguard") or die ("problema con la conexion");
        return $con;
    }
    public function cerrarBD($con){
        mysqli_close($con);
    }

    public function citar(){
        $con=$this->conectarBD();
        $query="INSERT INTO citas (cita_fecha, cita_Status, Ventas_idVenta, Usuario_idUsuario) VALUES ('$this->fecha', '$this->estatus', '$this->idVenta', '$this->cliente')" or die ("problema con la insercion");
        mysqli_query($con, $query);

    }

    public function mostrarselect(){
        $con=$this->conectarBD();
        $query=mysqli_query($con, "SELECT * from direcciones") or die (mysqli_error($con));
        

        print "<select> required";
        print "<option value='' disabled selected>Seleccione un instalador</option>";
        while($reg=mysqli_fetch_assoc($query)){
            print '<option value='.$reg['Id_direc'].'>'.$reg['Calle_direc'].'</option>';
        }
        print "</select>";
    }

    public function ventas(){
        $con=$this->conectarBD();
        $query = "SELECT * FROM ventas";
        $que=mysqli_query($con, $query);
        print "<table class='table table-striped'>";
        print "<thead>";
        print "<tr><th>ID</th><th>Fecha</th><th>Total</th><th>Id Transaccion</th><th>Status</th><th>usuario</th><th>opc</th></tr>";
        print "</thead>";
        print "<tbody>";
        while($reg=mysqli_fetch_assoc($que)){
            print "<tr><td>".$reg["venta_id"]."</td><td>".$reg["venta_fecha"]."</td><td>".$reg["venta_total"]."</td><td>".$reg["venta_idTransaccion"]."</td><td>".$reg["status"]."</td><td>".$reg["usuario_id"]."</td><td><a href='formcitas.php?idV=".$reg['venta_id']."&idC=".$reg['usuario_id']."'><button class='btn btn-primary'>Citar</button></a></td></tr>";
        }
        print "<tbody>";
        print "<table>";   
    }
    public function citas(){
        $con=$this->conectarBD();
        $query = "SELECT * FROM citas";
        $que=mysqli_query($con, $query);
        print "<table class='table table-striped'>";
        print "<thead>";
        print "<tr><th>ID</th><th>Fecha</th><th>Status</th><th>id Venta</th><th>opc</th></tr>";
        print "</thead>";
        print "<tbody>";
        while($reg=mysqli_fetch_assoc($que)){
            print "<tr><td>".$reg["cita_id"]."</td><td>".$reg["cita_fecha"]."</td><td>".$reg["cita_status"]."</td><td>".$reg["Ventas_idVenta"]."</td><td><a href='modcitas.php?idC=".$reg['cita_id']."'><button class='btn btn-primary'>Modificar Statuss</button></a></td></tr>";
        }
        
        print "</tbody>";
        print "<table>";   
    }

    public function status($id, $status){
        $con=$this->conectarBD();
        $query ="UPDATE citas SET cita_status = '$status' WHERE cita_id='$id'";
        mysqli_query($con, $query);

    }
    public function citasAdmin(){
        $con=$this->conectarBD();
        $query = "SELECT * FROM citas";
        $que=mysqli_query($con, $query);
        print "<table class='table table-striped'>";
        print "<thead>";
        print "<tr><th>ID</th><th>Fecha de la cita</th><th>Status</th><th>id Venta</th><th>Id Usuario</th><th>opc</th></tr>";
        print "</thead>";
        print "<tbody>";
        while($reg=mysqli_fetch_assoc($que)){
            print "<tr><td>".$reg["cita_id"]."</td><td>".$reg["cita_fecha"]."</td><td>".$reg["cita_status"]."</td><td>".$reg["Ventas_idVenta"]."</td><td>".$reg['Usuario_idUsuario']."</td><td><a href='../admin/CitaM.php?idC=".$reg['cita_id']."'><button name='Modificar' class='btn btn-primary'>Modificar</button></a></td></tr>";
        }
        print "</body>";
        print "<table>";   
    }

    public function modificarCita($id){
        $con=$this->conectarBD();
        $query=mysqli_query($con, "SELECT * FROM citas WHERE cita_id=$id");
        $query=mysqli_fetch_assoc($query);

        print'
        <form action="../../controlador/Control.php" method="post" class="mb-3">

        Seleccione la fecha de cita:
        <br>
        <input type="datetime-local" name="fecha" class="form-control" value="'.$query['cita_fecha'].'" required>
        <input type="hidden" name="idVenta" value="'.$query['Ventas_idVenta'].'">
        <input type="hidden" name="status" value="Pendiente">
        <input type="hidden" name="id_cita" value="'.$query['cita_id'].'">
        <input type="hidden" name="idCliente" value="'.$query['Usuario_idUsuario'].'">
        
        <br>
        
    
        <button type="submit" name="ModificarCita" class="btn btn-primary">Modificar cita</button>
    
    ';
    }

    

    
    public function modCita($id){
        $con=$this->conectarBD();
        mysqli_query($con, "UPDATE citas SET cita_fecha='$this->fecha', cita_status='$this->estatus', Ventas_idVenta='$this->idVenta', Usuario_idUsuario='$this->cliente' WHERE cita_id=$id") or die(mysqli_error($con));
        
    }

    public function citasUsuario($id){
        $con=$this->conectarBD();
        $query = "SELECT * FROM citas WHERE Usuario_idUsuario=$id";
        $que=mysqli_query($con, $query);
        print "<table class='table table-striped'>";
        print "<thead>";
        print "<tr><th>ID</th><th>Fecha de la cita</th><th>Status</th></tr>";
        print "</thead>";
        print "<tbody>";
        while($reg=mysqli_fetch_assoc($que)){
            print "<tr><td>".$reg["cita_id"]."</td><td>".$reg["cita_fecha"]."</td><td>".$reg["cita_status"]."</td></tr>";
        }
        print "</body>";
        print "<table>";  
    }
}
?>