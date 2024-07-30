<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad N°6</title>
    <style>
        body {
            font-family: Century;
            background: #FCF3CF;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Actividad N°6</h1>";
    $dimension = isset($_GET['d']) ? $_GET['d'] : 'Dimensión no definida';
    for ($indice = 1; $indice <= $dimension; $indice++) 
    {
        echo str_repeat("&nbsp", $dimension - $indice);
        echo str_repeat("* ", $indice)."<br>";
    }
    ?>
</body>
</html>
