<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivo N°1</title>
    <style>
        body {
            font-family: Century;
            background: #D4E6F1;
        }
    </style>
</head>
<body>
    <?php
        echo "<h1>Ejercicio N°4 (Archivos)</h1>";
        echo "<h3>Ejemplo N°1:</h3>";
        $archivo  = "prueba.txt";
        echo (touch($archivo)) ? "Archivo Existente." : "El Archivo no existe.";
        echo "<br>";
        // var_dump($datos);
        echo "<h3>Ejemplo N°2:</h3>";
        if (touch($archivo))
        {
            $datos = fopen($archivo, "a");
            fwrite($datos, "\nHoy es Lunes\n");
            fwrite($datos, "Hoy es Lunes de Clases\n");
            fclose($datos);
            $datos = fopen($archivo, "r");
            while (!feof($datos)) 
            {
                $linea = fgets($datos, 1024);
                echo $linea."<br>";
            }
            fclose($datos);
        }
        else
        {
            echo "Error";
        }
    ?>
</body>
</html>
