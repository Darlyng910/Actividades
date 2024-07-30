<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°4</title>
    <style>
        body {
            font-family: Century;
            background: #EBF5FB;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Pronóstico Meteorológico</h1>";
    $Clima = 
    [
        ["Fecha" => "2024-07-01", "Temperatura" => 26],
        ["Fecha" => "2024-07-02", "Temperatura" => 27],
        ["Fecha" => "2024-07-03", "Temperatura" => 25],
        ["Fecha" => "2024-07-04", "Temperatura" => 22],
        ["Fecha" => "2024-07-05", "Temperatura" => 15],
        ["Fecha" => "2024-07-06", "Temperatura" => 18],
        ["Fecha" => "2024-07-07", "Temperatura" => 12],
        ["Fecha" => "2024-07-08", "Temperatura" => 13],
        ["Fecha" => "2024-07-09", "Temperatura" => 13],
        ["Fecha" => "2024-07-10", "Temperatura" => 13],
        ["Fecha" => "2024-07-11", "Temperatura" => 13],
        ["Fecha" => "2024-07-12", "Temperatura" => 11],
        ["Fecha" => "2024-07-13", "Temperatura" => 14],
        ["Fecha" => "2024-07-14", "Temperatura" => 20],
        ["Fecha" => "2024-07-15", "Temperatura" => 21]
    ];
    // Día más caluroso
    $caluroso = $Clima[0];
    foreach ($Clima as $temperatura)
    {
        $caluroso = ($temperatura["Temperatura"] > $caluroso["Temperatura"]) ? $temperatura : $caluroso;
    }
    echo "<h2>Día más caluroso:</h2>";
    echo "Fecha: ".$caluroso["Fecha"]."<br>";
    echo "Temperatura: ".$caluroso["Temperatura"]."°C<br>";
    // Día más frío
    $frío = $Clima[0];
    foreach ($Clima as $temperatura)
    {
        $frío = ($temperatura["Temperatura"] < $frío["Temperatura"]) ? $temperatura : $frío;
    }
    echo "<h2>Día más frío:</h2>";
    echo "Fecha: ".$frío["Fecha"]."<br>";
    echo "Temperatura: ".$frío["Temperatura"]."°C<br>";
    // Promedio
    $promedio = 0;
    foreach ($Clima as $temperatura)
    {
        $promedio += $temperatura['Temperatura'];
    }
    echo "<h2>Promedio de las Temperaturas:</h2>";
    echo "Promedio: " .number_format($promedio / count($Clima), 2)." °C";
    ?>
</body>
</html>
