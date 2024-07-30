<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°6</title>
    <style>
        body {
            font-family: Century;
            background: #FCF3CF;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Ejercicio N°6 (Funciones)</h1>";
    // Mostrar Mensaje:
    echo "<h3>Ejemplo N°1: Mensaje</h3>";
    function Mostrar()
    {
        $mensaje = "Hola, buenos días!";
        echo $mensaje;
    }
    Mostrar();
    echo "<br>";
    function Mostrar_SMS($mensaje)
    {
        echo $mensaje;
    }
    Mostrar_SMS("Hola buen día.");
    // Determinar cuanto debe pagar (Factura o S/F): 
    echo "<h3>Ejemplo N°2: Facturación</h3>";
    $producto = isset($_GET['Nombre']) ? $_GET['Nombre'] : 'Nombre no definido';
    $monto = isset($_GET['Cantidad']) ? $_GET['Cantidad'] : 'Cantidad no definida';
    $edad = isset($_GET['Edad']) ? $_GET['Edad'] : 'Edad no definida';
    $iva = isset($_GET['Iva']) ? $_GET['Iva'] : 'Iva no definido';

    $monto_iva = 0;
    // Función para Calcular Monto:
    function ConIva(int $monto):float
    {
        $monto_iva = $monto + ($monto * 0.13);
        return $monto_iva;
    }
    function SinIva(int $monto):float
    {
        $monto_iva = $monto - ($monto * 0.13);
        return $monto_iva;
    }
    try 
    {
        $iva_bool = $iva === "true"; 
        echo "Resultado: " . ($iva_bool ? ConIva($monto) : SinIva($monto));
        echo "<br>";
    } 
    catch (TypeError $e) 
    {
        echo "Error: ".$e->getMessage();
        echo "<br>";
    }
    echo "Edad: " . ($edad >= 18 ? "Puedes realizar la compra." : "No puedes realizar la compra.");
    echo "<br>";
    // Segundo Ejercicio
    // Array de Notas y Calcular el promedio de los 10 estudiantes:
    echo "<h3>Ejemplo N°3: Promedio</h3>";
    function Promedio (int|float ...$notas):int|float
    {
        $suma = 0;
        $promedio = 0;
        foreach ($notas as $nota) 
        {
            $suma += $nota;
        }
        return $promedio = $suma / count($notas);
        //yield $suma;
        //yield $nota;
    }
    echo "El promedio de Notas es: " . Promedio(45, 56, 34, 22, 69);
    //http://localhost/ejercicios/ejercicio8.php?Nombre=Tv&Cantidad=560&Edad=17$Iva=true
    ?>
</body>
</html>
