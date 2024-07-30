<?php
$Ventas = [
    ["Nombre" => "Pizza Jamón y Queso", "Precio" => 35, "Cliente" => "Juan"],
    ["Nombre" => "Pizza Hawaiana", "Precio" => 45, "Cliente" => "Juan"],
    ["Nombre" => "Pizza Napolitana", "Precio" => 65, "Cliente" => "Martín"],
    ["Nombre" => "Pizza Jamón y Queso", "Precio" => 35, "Cliente" => "Marlos"],
    ["Nombre" => "Pizza Jamón y Queso", "Precio" => 35, "Cliente" => "Mario"],
    ["Nombre" => "Pizza Hawaiana", "Precio" => 45, "Cliente" => "Alba"],
];
$contador_pizzajamon = 0;
$contador_pizzahawaiana = 0;
$contador_pizzanapolitana = 0;
$compras = [];
foreach ($Ventas as $venta) 
{
    switch ($venta['Nombre'])
    {
        case 'Pizza Jamón y Queso':
            $contador_pizzajamon++;
            break;
        case 'Pizza Hawaiana':
            $contador_pizzahawaiana++;
            break;
        case 'Pizza Napolitana':
            $contador_pizzanapolitana++;
            break;
    }
    $cliente = $venta['Cliente'];
    if (!isset($compras[$cliente]))
    {
        $compras[$cliente] = 0;
    }
    $compras[$cliente]++;
};
echo "Se vendió:<br>";
echo "Pizza Jamón y Queso: " .$contador_pizzajamon. "<br>";
echo "Pizza Hawaiana: " .$contador_pizzahawaiana. "<br>";
echo "Pizza Napolitana: " .$contador_pizzanapolitana;
echo "<pre>";
var_dump($compras);
echo "</pre>";
rsort($compras);
echo "El mayor comprador: ".$compras[0];
?>