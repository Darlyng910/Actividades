<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°5</title>
    <style>
        body {
            font-family: Century;
            background: #EBF5FB;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Tráfico Vehicular</h1>";
    $Vehículos = 
    [
        ["Vehiculo" => "JHN284", "Tiempo_Espera" => 18],
        ["Vehiculo" => "LKM352", "Tiempo_Espera" => 22],
        ["Vehiculo" => "PYX764", "Tiempo_Espera" => 15],
        ["Vehiculo" => "BFD901", "Tiempo_Espera" => 25],
        ["Vehiculo" => "ZXC148", "Tiempo_Espera" => 30],
        ["Vehiculo" => "QWE562", "Tiempo_Espera" => 20],
        ["Vehiculo" => "RTY098", "Tiempo_Espera" => 17],
        ["Vehiculo" => "UIO654", "Tiempo_Espera" => 12],
        ["Vehiculo" => "ASD753", "Tiempo_Espera" => 10],
        ["Vehiculo" => "FGH876", "Tiempo_Espera" => 28],
        ["Vehiculo" => "JKL432", "Tiempo_Espera" => 21],
        ["Vehiculo" => "CVB543", "Tiempo_Espera" => 23],
        ["Vehiculo" => "NMJ678", "Tiempo_Espera" => 19],
        ["Vehiculo" => "XPL999", "Tiempo_Espera" => 27],
        ["Vehiculo" => "MNB321", "Tiempo_Espera" => 16],
    ];
    // Vehículo que espera más tiempo
    $vehiculo = $Vehículos[0];
    foreach ($Vehículos as $tiempo)
    {
        $vehiculo = ($tiempo["Tiempo_Espera"] > $vehiculo["Tiempo_Espera"]) ? $tiempo : $vehiculo;
    }
    echo "<h2>Vehículo que esperó más tiempo:</h2>";
    echo "<h3>Datos Vehículo</h3>";
    echo "Vehiculo: ".$vehiculo["Vehiculo"]."<br>";
    echo "Tiempo de Espera: ".$vehiculo["Tiempo_Espera"]." Min.<br>";
    // Promedio
    $promedio = 0;
    foreach ($Vehículos as $tiempo)
    {
        $promedio += $tiempo['Tiempo_Espera'];
    }
    echo "<h2>Promedio de los Tiempos de Espera:</h2>";
    echo "Promedio: ".$promedio / count($Vehículos)." Min.";
    ?>
</body>
</html>
