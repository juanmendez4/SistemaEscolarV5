<!DOCTYPE html>
<?php
require 'functions.php';
//Define queienes tienen permiso en este archivo
$permisos = ['Administrador','Profesor'];
permisos($permisos);
//consulta las secciones
$secciones = $conn->prepare("select * from secciones");
$secciones->execute();
$secciones = $secciones->fetchAll();

//consulta de grados
$grados = $conn->prepare("select * from grados");
$grados->execute();
$grados = $grados->fetchAll();
?>
<html>
<head>
<title>Inicio | Registro de calificaciones </title>
    <meta name="description" content="Registro de Calificaciones CBTIS 253" />
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
<div class="header">
        <h1>Registro de Calificaciones - Centro de Bachillerato Industrial y de Servicios 253 </h1>
        <h3>Usuario:  <?php echo $_SESSION["username"] ?></h3>
</div>
<nav>
    <ul>
        <li><a href="inicio.view.php">Inicio</a> </li>
        <li class="active"><a href="alumnos.view.php">Registro de Alumnos</a> </li>
        <li><a href="listadoalumnos.view.php">Lista de  Alumnos</a> </li>
        <li><a href="notas.view.php">Calificaciones </a> </li>
        <li><a href="listadonotas.view.php">Consultar calificaciones</a> </li>
        <li class="right"><a href="logout.php">Salir</a> </li>

    </ul>
</nav>

<div class="body">
    <div class="panel">
            <h4>Registro de Alumnos</h4>
            <form method="post" class="form" action="procesaralumno.php">
                <label>Nombres</label><br>
                <input type="text" required name="nombres" maxlength="45">
                <br>
                <label>Apellidos</label><br>
                <input type="text" required name="apellidos" maxlength="45">
                <br><br>
                <label>Numero de Lista</label><br>
                <input type="number" min="1" class="number" name="numlista">
                <br><br>
                <br><br>
                <label>Grado</label><br>
                <select name="grado" required>
                    <?php foreach ($grados as $grado):?>
                        <option value="<?php echo $grado['id'] ?>"><?php echo $grado['nombre'] ?></option>
                    <?php endforeach;?>
                </select>
                <br><br>
                <label>Sección</label><br>

                    <?php foreach ($secciones as $seccion):?>
                        <input type="radio" name="seccion" required value="<?php echo $seccion['id'] ?>">Sección <?php echo $seccion['nombre'] ?>
                    <?php endforeach;?>

                <br><br>
                <button type="submit" name="insertar">Guardar</button> <button type="reset">Limpiar</button> <a class="btn-link" href="listadoalumnos.view.php">Ver Listado</a>
                <br><br>
                <!--mostrando los mensajes que recibe a traves de los parametros en la url-->
                <?php
                if(isset($_GET['err']))
                    echo '<span class="error">Error al registrarse </span>';
                if(isset($_GET['info']))
                    echo '<span class="success">Registrado correctamente!</span>';
                ?>

            </form>
        <?php
        if(isset($_GET['err']))
            echo '<span class="error">Error al guardar</span>';
        ?>
        </div>
</div>
</body>

</html>