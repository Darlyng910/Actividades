<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°5</title>
    <style>
        body {
            font-family: Century;
            background: #FCF3CF;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Ejercicio N°5 (Condicionales)</h1>";
    // Condicional If
    // Ejemplo N°1: Puntos acumulados en una compra: Si mi compra es mayor a 50 gano 5 puntos
    echo "<h3>Ejemplo N°1: Puntos acumulados en una compra</h3>";
    $compra = isset($_GET['compra']) ? $_GET['compra'] : 'Compra no definida';
    $puntos = 0;
    if ($compra > 50 and $compra <= 100)
    {
        $puntos = $puntos + 5;
    }
    elseif ($compra > 100 and $compra <= 200)
    {
        $puntos = $puntos + 15;
    }
    elseif ($compra > 200 and $compra <= 500)
    {
        $puntos = $puntos + 30;
    }
    elseif ($compra > 500) 
    {
        $puntos = $puntos + 60;
    }
    elseif($compra > 500)
    {
        $puntos = $puntos + 0;
    }
    echo "Usted ha acumulado: ".$puntos." puntos por su compra. <br>";
    // Versión Ternaria
    echo "<h4>Forma Ternaria:</h4>";
    $compra_t = isset($_GET['compra_t']) ? $_GET['compra_t'] : 'Compra no definida';
    $puntos_t = 0;
    $puntos_t = ($compra_t > 50 && $compra_t <= 100) ? $puntos_t + 5 : 
        (($compra_t > 100 && $compra_t <= 200) ? $puntos_t + 15 : 
        (($compra_t > 200 && $compra_t <= 500) ? $puntos_t + 30 : 
        ($compra_t > 500 ? $puntos_t + 60 : 
        ($puntos_t + 0))));
    echo "Usted ha acumulado: ".$puntos_t." puntos por su compra.<br>";
    // Versión Switch
    echo "<h4>Versión Switch:</h4>";
    $compra_s = isset($_GET['compra_s']) ? $_GET['compra_s'] : 'Compra no definida';
    switch ($compra_s) 
    {
        case $compra_s > 50 and $compra_s <= 100:
            echo "Su compra acumuló 5 Puntos.";
            break;
        case $compra_s > 100 and $compra_s <= 200:
            echo "Su compra acumuló 15 Puntos.";
            break;
        case $compra_s > 200 and $compra_s <=500:
            echo "Su compra acumuló 30 Puntos.";
            break;
        case $compra_s > 500:
            echo "Su compra acumuló 60 Puntos.";
            break;
        default:
            echo "Su compra acumuló 0 Puntos.";
            break;
    }
    // http://localhost/ejercicios/ejercicio5.php?compra=505&compra_t=505&compra_s=300
    // La vesión ternaria es la que consume menos recursos: 
    // Ranking de Menor a Mayor: Versión Ternaria, Switch, Condicional If

    // While
    echo "<h3>Ejemplo N°2: Múltiplos</h3>";
    $inferior = isset($_GET['inf']) ? $_GET['inf'] : 'Número inferior no definido';
    $superior = isset($_GET['sup']) ? $_GET['sup'] : 'Número superior no definido';
    $contador = 0;
    while ($inferior <= $superior) 
    {
        if ($inferior % 7 == 0)
        {
            $contador ++;
        }
        $inferior ++;
    }
    echo "Contador: ".$contador;
    // 
    echo "<h4>Forma Do While:</h4>";
    $inferior_do = isset($_GET['i']) ? $_GET['i'] : 'Número inferior no definido';
    $superior_do = isset($_GET['s']) ? $_GET['s'] : 'Número superior no definido';
    $contador_do = 0;
    do {
        if ($inferior_do % 7 == 0) 
        {
            $contador_do++;
        }
        $inferior_do++;
    } 
    while ($inferior_do <= $superior_do);
    echo "Contador: " . $contador_do;
    // Foreach
    // Array de 3 dimensiones
    echo "<h3>Ejemplo N°3: Foreach</h3>";
    $electrodomésticos = [
        ["Nombre" => "Televisor",
         "Precio" => 400,
         "Estado" => true],
        ["Nombre" => "Heladera",
         "Precio" => 300,
         "Estado" => false],
        ["Nombre" => "Bicicleta",
         "Precio" => 100,
         "Estado" => true],
    ];
    echo "<pre>";
    var_dump($electrodomésticos);
    echo "</pre>";
    echo "<h4>Productos:</h4>";
    foreach ($electrodomésticos as $productos)
    {
        echo $productos['Nombre']."<br>";
        echo $productos['Precio']."<br>";
        echo ($productos['Estado']) ? "Disponible"."<br>" : "No Disponible"."<br>";
    }
    ?>
</body>
</html>
