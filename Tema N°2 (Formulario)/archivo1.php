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
        echo "<h1>Ejercicio N°1 (Archivos)</h1>";
        $carpeta = "prueba/";
        $archivo = "texto.txt";
        echo "<h3>Ejemplo N°1:</h3>";
        echo (file_exists($carpeta.$archivo)) ? "Archivo Existente" : "Archivo no existente";
        echo "<h3>Ejemplo N°2:</h3>";
        echo (is_file($archivo)) ? "Archivo Existente" : "Archivo no existente";
        echo "<h3>Ejemplo N°3:</h3>";
        echo (is_dir($carpeta)) ? "Carpeta Existente" : "Carpeta no existente";
        echo "<h3>Ejemplo N°1 (Imágenes):</h3>";
        $archivo2 = "imagen.jpg";
        if (file_exists($carpeta.$archivo2))
        {
            // Tamaño del archivo:
            $size = filesize ($carpeta.$archivo2);
            $kb = number_format($size / 1024, 2);
            // Cuando ha sido creado:
            $creado = filectime($carpeta.$archivo2);
            $creado_date = date("d/m/Y H:i:s", $creado);
            // Cuando ha sido modificado:
            $modificado = filemtime($carpeta.$archivo2);
            $modificado_date = date("d/m/Y H:i:s", $modificado);
            echo "<strong>Tamaño:</strong> ".$kb." Kbytes.<br>";
            echo "<strong>Fecha de Creación:</strong> ".$creado_date."<br>";
            echo "<strong>Fecha de Modificación:</strong> ".$modificado_date."<br>";
        }
        else 
        {
            echo "El Archivo $archivo2 no existe. <br>";
            $size = "-";
            $creado = "-";
            $modificado = "-";
            echo "<strong>Tamaño:</strong> ".$size." Bytes.<br>";
            echo "<strong>Fecha de Creación:</strong> ".$creado."<br>";
            echo "<strong>Fecha de Modificación:</strong> ".$modificado."<br>";
        }
    ?>
</body>
</html>
