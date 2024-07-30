<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad N°7</title>
    <style>
        body {
            font-family: Century;
            background: #FCF3CF;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Actividad N°7</h1>";
    $libro = isset($_GET['Libro']) ? $_GET['Libro'] : 'Libro no definido';
    $Libros = [
        "La Ladrona de Libros",
        "Cien años de soledad",
        "Bajo la misma estrella",
        "Matar a un ruiseñor",
        "El Gran Gatsby",
        "Orgullo y prejuicio"
    ];
    function Busqueda($libro, $libros) 
    {
        foreach ($libros as $nombre) 
        {
            if (strcasecmp($nombre, $libro) == 0) 
            {
                return true;
            }
        }
        return false;
    }
    if ($libro !== 'Libro no definido') 
    {
        if (Busqueda($libro, $Libros)) 
        {
            echo "$libro: Está en el estante.";
        } 
        else 
        {
            echo "$libro: No está en el estante.";
        }
    } 
    else 
    {
        echo "No se ha proporcionado el nombre del libro.";
    }
    //http://localhost/ejercicios/ejercicio9.php?Libro=La%20Ladrona%20de%20Libros
    ?>
</body>
</html>
