<?php
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    echo (strlen($usuario) >= 10) ? "Bienvenido ".$usuario: "El usuario debe contener 10 dígitos";
    $numeros = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $contador = 0;
    foreach ($numeros as $valor) 
    {
        $verificar = strpos($password, $valor);
        if ($verificar == true)
        {
            $contador++;
        }
    }
    echo "<br>";
    echo ($contador > 0) ? "Contraseña Correcta!" : "Error en la contraseña.";
?>