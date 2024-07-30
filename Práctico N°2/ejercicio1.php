<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°1</title>
    <style>
        body {
            font-family: Century;
            background: #EBF5FB;
        }
    </style>
</head>
<body>
    <?php
        echo "<h1>Empresa de Marketing Digital</h1>";
        // Generar Datos
        $Opciones = ["Me Gusta", "Comentarios", "Compartir"];
        $Estados = [];
        for ($i = 0; $i < 50; $i++) 
        {
            $Estados[] = $Opciones[array_rand($Opciones)];
        }
        // Contadores
        $likes = 0;
        $comentarios = 0;
        $compartidos = 0;
        foreach ($Estados as $limite) 
        {
            ("Me Gusta" == $limite) ? $likes++ :
            (("Comentarios" == $limite) ? $comentarios++ :
            (("Compartir" == $limite) ? $compartidos++ :""));
        };
        echo "<h2>Contadores:</h2>";
        echo "Me Gusta: ".$likes."<br>";
        echo "Comentario: ".$comentarios."<br>";
        echo "Compartido: ".$compartidos;
        // Estado más utilizado
        echo "<h2>Estado más Utilizado:</h2>";
        echo ($likes >= $comentarios & $likes >= $compartidos & $likes == $comentarios) ? "Los estados más utilizados son el <strong>Me gusta</strong> y el <strong>Comentario</strong>":
        (($likes >= $compartidos & $likes >= $comentarios & $likes == $compartidos) ? "Los estados más utilizados son el <strong>Me gusta</strong> y el <strong>Compartido</strong>":
        (($comentarios >= $compartidos & $comentarios == $compartidos & $comentarios >= $likes) ? "Los estados más utilizados son el <strong>Comentario</strong> y el <strong>Compartido</strong>":
        (($likes >= $comentarios & $likes>=$compartidos) ? "El estado más utilizado es el <strong>Me Gusta</strong>":
        (($comentarios >= $likes & $comentarios >= $compartidos) ? "El estado más utilizado es el <strong>Comentario</strong>":
        (($compartidos >= $likes & $compartidos >= $comentarios) ? "El estado más utilizado es el <strong>Compartido</strong>":"")))));
        // Promedios
        echo "<h2>Estadísticas:</h2>";
        echo "El Promedio de <strong>Me Gusta</strong> es %". ($likes / 50) * 100;
        echo "<br>";
        echo "El Promedio de <strong>Comentario</strong> es %". ($comentarios / 50) * 100;
        echo "<br>";
        echo "El Promedio de <strong>Compartido</strong> es %". ($compartidos / 50) * 100;
        echo "<br>";
        // Estado menos utilizado
        echo "<h2>Estado menos Utilizado:</h2>";
        echo ($likes <= $comentarios & $likes <= $compartidos & $likes == $comentarios) ? "Los estados menos utilizados son el <strong>Me Gusta</strong> y el <strong>Comentario</strong>":
        (($likes <= $compartidos & $likes<=$comentarios & $likes==$compartidos) ? "Los estados menos utilizados son el <strong>Me Gusta</strong> y el <strong>Compartido</strong>":
        (($comentarios <= $compartidos & $comentarios == $compartidos & $comentarios <= $likes) ? "Los estados menos utilizados son el <strong>Comentario</strong> y el <strong>Compartido</strong>":
        (($likes <= $comentarios & $likes <= $compartidos) ? "El estado menos utilizado es el <strong>Me Gusta</strong>":
        (($comentarios <= $likes & $comentarios <= $compartidos) ? "El estado menos utilizado es el <strong>Comentario</strong>":
        (($compartidos <= $likes & $compartidos <= $comentarios) ? "El estado menos utilizado es el <strong>Compartido</strong>":"")))));
    ?>
</body>
</html>
