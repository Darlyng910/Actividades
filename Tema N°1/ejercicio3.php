<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticación</title>
    <style>
        body {
            font-family: Century;
            background: #D4E6F1;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Autenticación Ejercicio N°3:</h1>";
    $usuario = isset($_GET['usuario']) ? $_GET['usuario'] : 'Usuario no definido';
    $contraseña = isset($_GET['contraseña']) ? $_GET['contraseña'] : 'Contraseña no definida';
    $repetir_contraseña = isset($_GET['repetir_contraseña']) ? $_GET['repetir_contraseña'] : 'Contraseña no definida';
    echo "Tamaño del Usuario:<br>";
    var_dump($usuario);
    echo "<br>";
    //
    echo "Comparación entre Contraseñas:<br>";
    echo "($contraseña) == ($repetir_contraseña): ";
    var_dump($contraseña == $repetir_contraseña);
    echo "<br>";
    //
    echo "<br>";
    $usuario1 = explode("i", $usuario);
    var_dump($usuario1);
    echo "<br>";
    //    
    echo substr_count($usuario1[0], "m")."<br>";
    echo substr_count($usuario1[1], "m")."<br>";
    echo substr_count($usuario1[2], "m");
    // http://localhost/ejercicios/ejercicio3.php?usuario=Administrador&contrase%C3%B1a=limon&repetir_contrase%C3%B1a=limon
    ?>
</body>
</html>
