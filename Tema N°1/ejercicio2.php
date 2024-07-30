<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <style>
        body {
            font-family: Century;
            background: #F8F9F9;
        }
    </style>
</head>
<body>
<?php 
    echo "<h1>Ejercicio N°2 (Cadenas):</h1>";
    $cliente = "Juan Perez";
    // Saber el tamaño de la cadena
    print(strlen($cliente));
    echo "<br>";
    // También podemos saber el tamaño de una cadena con "var_dump"
    var_dump($cliente);
    // Limpiar espacios en blanco
    echo "<br>";
    $texto = "Juan Perez";
    var_dump($texto);
    echo "<br>";
    // El trim limpia al inicio y al final pero no en medio
    $texto2 = strlen(trim($texto));
    echo $texto2."<br>";
    // Convertir mayúsculas y minúsculas
    echo (strtolower($cliente));
    echo "<br>";
    echo (strtoupper($cliente));
    echo "<br>";
    var_dump(strtolower($cliente) === strtolower($texto));
    // Reemplazar
    echo "<br>"; 
    echo str_replace("Juan", "Jose", $cliente);
    // Buscar Posición
    echo "<br>";
    echo strpos($cliente, "Pedro");
    // Buscar
    echo "<br>";
    echo substr_count($cliente, "e");
    // Dividir una cadena
    echo "<br>";
    $cadena = explode("e", $texto);
    var_dump($cadena);
    // Unir cadena
    echo "<br>";
    $cadena = implode("e", $cadena);
    var_dump($cadena)
?>
</body>
</html>