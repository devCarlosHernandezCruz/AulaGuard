<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>AULAGUARD | CODECREATORS</title>
	<!--LINKS-->
	<link rel="stylesheet" href="recursos/css/font-awesome.min.css" type="text/css" />
    <script src="https://kit.fontawesome.com/a45e4463fd.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
	<link rel="stylesheet" href="recursos/css/login.css" />
</head>
<body >
    <!--HEADER-->
    

    <?php
include "../modelo/direccion.php";
$id=$_GET['idD'];
$dir=new Direccion;
$dir->direc($id);  

?>

<!-- Contact Section End -->
    




    
