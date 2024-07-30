<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad N°5</title>
    <style>
        body {
            font-family: Century;
            background: #FCF3CF;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Competiciones Universidad Domingo Savio</h1>";
    $competidores = [
        ["Nombre" => "Juan", "Hora" => "10:05:00"],
        ["Nombre" => "Maria", "Hora" => "10:01:30"],
        ["Nombre" => "Pedro", "Hora" => "10:03:45"],
        ["Nombre" => "Lucia", "Hora" => "10:02:15"],
        ["Nombre" => "Ana", "Hora" => "10:06:50"],
        ["Nombre" => "Carlos", "Hora" => "10:04:10"],
        ["Nombre" => "Jorge", "Hora" => "10:07:25"],
        ["Nombre" => "Laura", "Hora" => "10:05:30"],
        ["Nombre" => "Diego", "Hora" => "10:03:00"],
        ["Nombre" => "Sofia", "Hora" => "10:02:45"]
    ];
    echo "<pre>";
    var_dump($competidores);
    echo "</pre>";

    $horas = array_column($competidores, 'Hora');
    $nombres = array_column($competidores, 'Nombre');
    array_multisort($horas, SORT_ASC, $competidores);
    echo "<pre>";
    var_dump($competidores);
    echo "</pre>";
    // Ganador
    echo "<h2>Ganador:</h2>";
    $ganador = $competidores[0];
    echo "Nombre: ".$ganador["Nombre"]."<br>";
    echo "Tiempo: ".$ganador["Hora"]."<br>";
    // Diferencia
    $segundo = $competidores[1];
    $diferencia = strtotime($segundo["Hora"]) - strtotime($ganador["Hora"]);
    echo "<h2>Diferencia Segundo - Primero:</h2>";
    echo "Segundo Puesto: ".$segundo["Nombre"]."<br>";
    echo "Diferencia con el Ganador: ".$diferencia." segundos<br>";
    // Último
    echo "<h2>Último Puesto:</h2>";
    $ultimo = $competidores[count($competidores) - 1];
    echo "Nombre: " . $ultimo["Nombre"]."<br>";
    echo "Tiempo: " . $ultimo["Hora"]."<br>";
    // Tres primeros lugares
    echo "<h2>Tres primeros lugares:</h2>";
    echo "Primer Lugar: Nombre: ".$competidores[0]["Nombre"]." - Tiempo: ".$competidores[0]["Hora"]."<br>";
    echo "Segundo Lugar: Nombre: ".$competidores[1]["Nombre"]." - Tiempo: ".$competidores[1]["Hora"]."<br>";
    echo "Tercer Lugar: Nombre: ".$competidores[2]["Nombre"]." - Tiempo: ".$competidores[2]["Hora"]."<br>";
    ?>
</body>
</html>
