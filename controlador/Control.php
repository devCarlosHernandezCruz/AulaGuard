<?php
include "../Modelo/direccion.php";
include "../Modelo/instaladores.php";

$direc= new Direccion();
$cita= new Instalador();
//agregar una nueva dirección
if(isset($_REQUEST["AgregarDireccion"])){

$direc->inicializar($_POST['Calle'], $_POST['NumeroInterior'], $_POST['NumeroExterior'], $_POST['Estado'], $_POST['Colonia'], $_POST['CodigoPos'], $_POST['Ciudad'], $_POST['idCliente']);
$direc->agregarDireccion();
print '<script>
    window.alert("Dirección agregada");
    window.location.href="../vista/direcciones.php";
    </script>';

}//Registrar una cita para un producto
//El status debe de estar como pendiente
elseif(isset($_REQUEST["RegistrarCita"])){

    $cita->inicializarCita($_POST['fecha'], $_POST['idVenta'], $_POST['status'], $_POST['idCliente']);
    $cita->citar();
    print '<script>
        window.alert("Cita registrada");
        window.location.href="../vista/admin/ventas.php";
        </script>';
}//se modifica el estatus (el control es del instalador)
elseif(isset($_REQUEST["CambiarStatus"])){

    $cita->status($_POST['id'], $_POST['status']);
    print '<script>
    window.alert("Status actualizado correctamente");
    window.location.href="../vista/admin/instalacion.php";
    </script>'; 

}//se modifica la fecha y la hora
elseif(isset($_REQUEST['ModificarCita'])){
    $cita->inicializarCita($_POST['fecha'], $_POST['idVenta'], $_POST['status'], $_POST['idCliente']);
    $cita->modCita($_POST['id_cita']);
    print '<script>
        window.alert("Cita Modificada exitosamente");
        window.location.href="../vista/admin/citas.php";
        </script>';
}//se modifica la direccion
elseif(isset($_REQUEST['ModificarDireccion'])){
    $direc->inicializar($_POST['Calle'], $_POST['NumeroInterior'], $_POST['NumeroExterior'], $_POST['Estado'], $_POST['Colonia'], $_POST['CodigoPos'], $_POST['Ciudad'], $_POST['idCliente']);
    $direc->modDireccion($_POST['id']);
    print '<script>
    window.alert("Dirección modificada exitosamente");
    window.location.href="../vista/direcciones.php";
    </script>';
    
}



?>