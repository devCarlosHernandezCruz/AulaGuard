<?php
class Direccion{
    private $calle;
    private $numeroIn;
    private $numeroEx;
    private $estado;
    private $colonia;
    private $codigoPos;
    private $ciudad;
    private $idCliente;
    public function inicializar($calle, $numeroIn, $numeroEx, $estado, $colonia, $codigoPos, $ciudad,  $idCliente){
        $this->calle=$calle;
        $this->numeroIn=$numeroIn;
        $this->numeroEx=$numeroEx;
        $this->estado=$estado;
        $this->colonia=$colonia;
        $this->codigoPos=$codigoPos;
        $this->ciudad=$ciudad;
        $this->idCliente=$idCliente;
    }

    public function conectarBD(){
        $con = mysqli_connect("localhost", "root", "", "aulaguard") or die("problemas con la conexion a la base de datos");
        return $con;
    }

    public function cerrarBD($con){
        mysqli_close($con);
    }

    public function agregarDireccion(){
        $con=$this->conectarBD();
        $query = "INSERT INTO direcciones (direccion_calle, direccion_numInt, direccion_numExt, direccion_estado, direccion_colonia, direccion_codigoPost, 	direccion_ciudad, id_usuario) VALUES ('$this->calle','$this->numeroIn','$this->numeroEx','$this->estado','$this->colonia','$this->codigoPos','$this->ciudad', '$this->idCliente')";
        mysqli_query($con, $query) or die(mysqli_error($con));
    }

    public function mostrar($id){
        //$idsession
        $con=$this->conectarBD();
        $query =mysqli_query($con, "SELECT * FROM direcciones WHERE id_usuario=$id") or die (mysqli_error($con));
        foreach($query as $reg){
           print'<div class="card mar" style="width: 18rem; ">
        <div class="card-body">
            <h5 class="card-title">Calle: '.$reg['direccion_calle'].'</h5>
            <p class="text">Numero Exterior: '.$reg['direccion_numExt'].'<br>C.P :'.$reg['direccion_codigoPost'].'</p>
            <br>
            <form method="POST" action="direccionM.php?idD='.$reg['direccion_id'].'"><button type="submit" class="btn btn-warning">Modificar</button> </form> <a href="borrar.php?idB='.$reg['direccion_id'].'"><button class="btn btn-danger">Borrar</button></a>
        </div>
        </div>';                                                                                                                                                                                                                                             
        print "<div>";
        }
        
    }

    public function direc($id){
        $con=$this->conectarBD();
        $query =mysqli_query($con, "SELECT * FROM direcciones where direccion_id=$id") or die (mysqli_error($con));
        $query=mysqli_fetch_assoc($query);

        
        print'<section class="section_login">
        <div class="center">
        
        <h1 class="title">Modificar Dirección</h1>
        <form action="../Controlador/Control.php" method="post">

        <input type="hidden" name="id" id="id" value="'.$query["direccion_id"].'">

        <div class="txt_field">
        Nombre de la calle
        <br>
        <input type="text" class="col-sm-2 col-form-label" name="Calle" id="Calle" value="'.$query["direccion_calle"].'">
        </div>


        <div class="txt_field">        
        Numero Interior
        <br>
        <input type="number" class="col-sm-2 col-form-label" name="NumeroInterior" id="NumeroInterior" value="'.$query["direccion_numInt"].'">
         </div>

        <div class="txt_field">
        Numero Exterior
        <br>
        <input type="number" class="col-sm-2 col-form-label" name="NumeroExterior" id="NumeroExterior" value="'.$query["direccion_numExt"].'">
         </div> 
        <div class="txt_field">
        Estado
        <br>
        <input type="text" class="col-sm-2 col-form-label" name="Estado" id="Estado" value="'.$query["direccion_estado"].'">
         </div> 
        <div class="txt_field">
        Colonia
        <br>
        <input type="text" class="col-sm-2 col-form-label" name="Colonia" id="Colonia" value="'.$query["direccion_colonia"].'">
         </div> 
        <div class="txt_field">
        Codigo Postal
        <br>
        <input type="number" class="col-sm-2 col-form-label" name="CodigoPos" id="CodigoPos" value="'.$query["direccion_codigoPost"].'">
         </div> 
        <div class="txt_field">        
        Ciudad
        <input type="text" class="col-sm-2 col-form-label" name="Ciudad" id="Ciudad" value="'.$query["direccion_ciudad"].'">
        </div> 

        
        <input type="hidden" name="idCliente" value="'.$query["id_usuario"].'">
        
        <button type="submit" class="btn btn-warning" name="ModificarDireccion">Modificar direccion</button>
        
        </form>
        </div>
    </section>';
        
    }

    public function modDireccion($id){
        $con=$this->conectarBD();
        mysqli_query($con, "UPDATE direcciones SET direccion_calle='$this->calle', direccion_numInt='$this->numeroIn', direccion_numExt='$this->numeroEx', direccion_estado='$this->estado', direccion_colonia='$this->colonia', direccion_codigoPost='$this->codigoPos', direccion_ciudad='$this->ciudad'    WHERE direccion_id =$id") or die(mysqli_error($con));
    }

    public function BorrarDireccion($id){
        $con=$this->conectarBD();
        mysqli_query($con, "DELETE FROM direcciones where direccion_id='$id'");
    }
}

?>