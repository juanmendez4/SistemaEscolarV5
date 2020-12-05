<?php
//arreglo con mensajes que puede recibir
$messages = [
    "1" => "Credenciales incorrectas",
    "2" => "No ha iniciado sesión"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar V4</title>
</head>
<body>
<div class="header">

<h1>Registro de calificaciones </h1>

</div>

<div class="body">
<div class="panel-login">
    <h4>Inicio de Sesion</h4>
    <form method="post" class="form" action="login_post.php">
        <label>Usuario</label><br>
        <input type="text" name="username">
        <br>
        <label>Contraseña</label><br>
        <input type="password" name="password">
        <br><br>
        <button type="submit">Entrar</button>
    </form>
<?php
if(isset($_GET['err']) && is_numeric($_GET['err']) && $_GET['err'] > 0 && $_GET['err'] < 3 )
    echo '<span class="error">'.$messages[$_GET['err']].'</span>';
?>
</div>
</div>

</body>

</html>