<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°4</title>
    <style>
        body {
            font-family: Century;
            background: #D4E6F1;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Ejercicio N°4 (Arrays):</h1>";
    // Declarar Arrays
    // Array de una dimensión
    $platos = array("Saice", "Sopa","Pescado");
    $platos = ["Saice", "Sopa", "Pollo"];

    echo "<pre>";
    var_dump($platos);
    echo "</pre>";
    // Insertar Datos por Posición
    $platos[2] = "Nuevo Plato";
    $platos[3] = "Filete";

    echo "<pre>";
    var_dump($platos);
    echo "</pre>";
    // Insertar al Inicio
    array_unshift($platos, "Jugos");

    echo "<pre>";
    var_dump($platos);
    echo "</pre>";
    // Insertar al Final
    array_push($platos, "Ensaladas");

    echo "<pre>";
    var_dump($platos);
    echo "</pre>";
    // Array de dos dimensiones
    $electrodomésticos = [
        "Nombre" => "Televisor",
        "Modelo" => "LG",
        "Precio" => 450,
        "Pulgadas" => 16,
        "Procedencia" => "China",
        "Accesorios" => [
            "Gamer" => "Si",
            "Smart" => "No",
            "Control" => "Si"
        ]
    ];
    echo "<pre>";
    var_dump($electrodomésticos);
    echo "</pre>";
    echo $electrodomésticos["Nombre"]."<br>".
    $electrodomésticos["Precio"]."<br>".
    $electrodomésticos["Accesorios"]["Smart"];
    // Otra forma:
    $electrodomésticos = array(
        "Nombre" => "Televisor",
        "Modelo" => "LG",
        "Precio" => 450,
        "Pulgadas" => 16,
        "Procedencia" => "China",
        "Accesorios" => array(
            "Gamer" => "Si",
            "Smart" => "No",
            "Control" => "Si"
        )
    );
    echo "<pre>";
    var_dump($electrodomésticos);
    echo "</pre>";
    // Agregar un accesorio al array
    $electrodomésticos["Accesorios"]["Usb"] = "Si";
    echo "<pre>";
    var_dump($electrodomésticos);
    echo "</pre>";
    // Manejar
    $clientes = [];
    // Pregunta si esta vacío:
    echo "Pregunta si esta vacío:";
    echo "<br>";
    var_dump(empty($clientes));
    echo "<br>";
    var_dump(empty($platos));
    echo "<br>";
    var_dump(empty($electrodomésticos));
    echo "<br>";
    // Pregunta si esta declarado:
    echo "Pregunta si esta declarado:";
    echo "<br>";
    var_dump(isset($clientes));
    echo "<br>";
    var_dump(isset($electrodomésticos["Procedencia"]));
    echo "<br>";
    var_dump(isset($nombres));
    // Ordenar Array de una Dimensión
    // Ordenar de Menor a Mayor:
    sort($platos);
    echo "<pre>";
    var_dump($platos);
    echo "</pre>";
    // Ordenar de Mayor a Menor:
    rsort($platos);
    echo "<pre>";
    var_dump($platos);
    echo "</pre>";
    // Ordenar Array de dos Dimensiones
    // Valores de acuerdo al orden alfabético - Ascendente
    asort($electrodomésticos);
    echo "<pre>";
    var_dump($electrodomésticos);
    echo "</pre>";
    // Valores de acuerdo al orden alfabético - Descendente
    arsort($electrodomésticos);
    echo "<pre>";
    var_dump($electrodomésticos);
    echo "</pre>";
    // índices de acuerdo al orden alfabético - Ascendente
    ksort($electrodomésticos);
    echo "<pre>";
    var_dump($electrodomésticos);
    echo "</pre>";
    // índices de acuerdo al orden alfabético - Descendente
    krsort($electrodomésticos);
    echo "<pre>";
    var_dump($electrodomésticos);
    echo "</pre>";
    // Una Dimensión: Sort (Asc) - Rsort (Desc)
    // Dos Dimensiones: [Valor]: Asort (Asc) - Arsort (Desc) | [Índice]: Ksort (Asc) - Krsort (Desc)
    ?>
</body>
</html>
