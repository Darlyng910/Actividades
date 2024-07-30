<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°2</title>
    <style>
        body {
            font-family: Century;
            background: #EBF5FB;
        }
    </style>
</head>
<body>
    <?php
        echo "<h1>Supermercado - Inventario</h1>";
        $Productos = 
        [
            ["Nombre" => "Leche", "Fecha" => "2025-11-05"],
            ["Nombre" => "Pan", "Fecha" => "2025-08-17"],
            ["Nombre" => "Huevos", "Fecha" => "2025-11-19"],
            ["Nombre" => "Queso", "Fecha" => "2025-07-15"],
            ["Nombre" => "Yogur", "Fecha" => "2025-12-13"],
            ["Nombre" => "Mantequilla", "Fecha" => "2025-11-07"],
            ["Nombre" => "Jugo", "Fecha" => "2025-09-08"],
            ["Nombre" => "Cereal", "Fecha" => "2025-06-29"],
            ["Nombre" => "Galletas", "Fecha" => "2025-12-26"],
            ["Nombre" => "Arroz", "Fecha" => "2025-03-31"],
            ["Nombre" => "Frijoles", "Fecha" => "2025-08-23"],
            ["Nombre" => "Lentejas", "Fecha" => "2025-07-03"],
            ["Nombre" => "Azúcar", "Fecha" => "2025-01-21"],
            ["Nombre" => "Sal", "Fecha" => "2025-01-21"],
            ["Nombre" => "Harina", "Fecha" => "2025-03-29"],
            ["Nombre" => "Aceite", "Fecha" => "2025-11-03"],
            ["Nombre" => "Vinagre", "Fecha" => "2025-07-31"],
            ["Nombre" => "Pasta", "Fecha" => "2025-11-13"],
            ["Nombre" => "Salsa", "Fecha" => "2025-02-16"],
            ["Nombre" => "Mermelada", "Fecha" => "2025-03-22"]
        ];

        $fechas = array_column($Productos, 'Fecha');
        // Ordenar
        array_multisort($fechas, SORT_ASC, $Productos);
        $actual = new DateTime();
        foreach ($Productos as $producto) 
        {
            $vencimiento = new DateTime($producto['Fecha']);
            $intervalo = $actual -> diff($vencimiento);
            $dias = (int) $intervalo -> format('%R%a');
            echo "El producto <strong>".$producto['Nombre']."</strong> vence en: ".$intervalo -> format('%a días')."<br>";
        }
    ?>
</body>
</html>
