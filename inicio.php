<!DOCTYPE html>
<?php
require 'functions.php';
$permisos = ['alumno','Profesor'];
permisos($permisos);

?>
<html>
<head>
<title>Inicio | Registro de calificaciones </title>
    <meta name="description" content="Registro de calificaciones" />
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
<div class="header">
        <h1>Registro de calificaciones CBTIS 253</h1>
        <h3>Usuario:  <?php echo $_SESSION["username"] ?></h3>
</div>
<nav>
    <ul>
        <li class="active"><a href="inicio.view.php">Inicio</a> </li>
        <li><a href="alumnos.view.php">Registro del Alumno</a> </li>
        <li><a href="listadoalumnos.view.php">Listado del Alumno</a> </li>
        <li><a href="notas.view.php">Registra calificacion</a> </li>
        <li><a href="listadonotas.view.php">Consultar la calificacion</a> </li>
        <li class="right"><a href="logout.php">Salir</a> </li>

    </ul>
</nav>

<div class="body">
    <div class="panel">
           <h1 class="text-center">Centro de Bachillerato Industrial y de Servicios 253</h1>
        <?php
        if(isset($_GET['err'])){
            echo '<h3 class="error text-center">ERROR: Usuario no autorizado</h3>';
        }
        ?>
        
</body>

</html>