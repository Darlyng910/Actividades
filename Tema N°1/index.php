<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparación de Números y Letras</title>
    <style>
        body {
            font-family: Century;
            background: #D4E6F1;
        }
    </style>
</head>
<body>
    <?php
    $a = isset($_GET['a']) ? $_GET['a'] : 'Nombre1 no definido';
    $b = isset($_GET['b']) ? $_GET['b'] : 'Nombre2 no definido';
    $c = isset($_GET['c']) ? $_GET['c'] : 'Nombre3 no definido';

    $n = isset($_GET['n']) ? (int)$_GET['n'] : 0;
    $n1 = isset($_GET['n1']) ? (int)$_GET['n1'] : 0;
    $n2 = isset($_GET['n2']) ? (int)$_GET['n2'] : 0;

    $letras = [$a, $b, $c];
    $numeros = [$n, $n1, $n2];

    echo "<h1>Nombres:</h1>";
    foreach ($letras as $index => $letra) {
        echo "Nombre " . ($index + 1) . ": " . htmlspecialchars($letra) . "<br>";
    }

    function Comparar($num1, $num2) {
        echo "Comparación entre $num1 y $num2:<br>";
        echo "($num1) >= ($num2): ";
        var_dump($num1 >= $num2);
        echo "<br>";
        echo "($num1) <= ($num2): ";
        var_dump($num1 <= $num2);
        echo "<br>";
        echo "($num1) == ($num2): ";
        var_dump($num1 == $num2);
        echo "<br><br>";
    }
    echo "<h1>Numeros:</h1>";
    Comparar($numeros[0], $numeros[1], '$n', '$n1');
    Comparar($numeros[0], $numeros[2], '$n', '$n2');
    Comparar($numeros[1], $numeros[2], '$n1', '$n2');
    // http://localhost/ejercicios/index.php?a=Darlyn&b=Kelly&c=Martha&n=15&n1=22&n2=47
    ?>
</body>
</html>
