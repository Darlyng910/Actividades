<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°3</title>
    <style>
        body {
            font-family: Century;
            background: #EBF5FB;
        }
    </style>
</head>
<body>
    <?php
        echo "<h1>Plataforma - Estudiantil</h1>";
         // De 0 a 60 estratégico, 61 a 70 autónomo, 71 a 80 resolutivo, 81 a 90 receptivo, 91 a 100 pre formal
        $Estudiantes = 
        [
            ['Nombre' => 'Miguel', 'Nota' => 50, 'Estado' => 'Pre Formal'],
            ['Nombre' => 'Ana', 'Nota' => 68, 'Estado' => 'Autónomo'],
            ['Nombre' => 'Carlos', 'Nota' => 75, 'Estado' => 'Resolutivo'],
            ['Nombre' => 'Laura', 'Nota' => 88, 'Estado' => 'Receptivo'],
            ['Nombre' => 'Diego', 'Nota' => 95, 'Estado' => 'Estratégico'],
            ['Nombre' => 'Sofía', 'Nota' => 58, 'Estado' => 'Pre Formal'],
            ['Nombre' => 'Pedro', 'Nota' => 62, 'Estado' => 'Autónomo'],
            ['Nombre' => 'María', 'Nota' => 70, 'Estado' => 'Resolutivo'],
            ['Nombre' => 'Juan', 'Nota' => 82, 'Estado' => 'Receptivo'],
            ['Nombre' => 'Luis', 'Nota' => 91, 'Estado' => 'Estratégico'],
            ['Nombre' => 'Valeria', 'Nota' => 55, 'Estado' => 'Pre Formal'],
            ['Nombre' => 'Javier', 'Nota' => 67, 'Estado' => 'Autónomo'],
            ['Nombre' => 'Paula', 'Nota' => 78, 'Estado' => 'Resolutivo'],
            ['Nombre' => 'Andrés', 'Nota' => 83, 'Estado' => 'Receptivo'],
            ['Nombre' => 'Carolina', 'Nota' => 92, 'Estado' => 'Estratégico'],
            ['Nombre' => 'Alejandro', 'Nota' => 60, 'Estado' => 'Pre Formal'],
            ['Nombre' => 'Gabriela', 'Nota' => 71, 'Estado' => 'Autónomo'],
            ['Nombre' => 'Roberto', 'Nota' => 77, 'Estado' => 'Resolutivo'],
            ['Nombre' => 'Elena', 'Nota' => 89, 'Estado' => 'Receptivo'],
            ['Nombre' => 'Daniel', 'Nota' => 93, 'Estado' => 'Estratégico'],
        ];
        
        $Estado = array_column($Estudiantes, 'Estado');
        $contador_preformal = 0;
        //Contar cuantos se encuentran en estado “Pre formal” mostrar mensaje necesita retroalimentación
        echo "<h2>Listado Estudiantes:</h2>";
        foreach ($Estudiantes as $estudiante) 
        {
            echo "<strong>Nombre:</strong> " . $estudiante['Nombre'] . "<strong> - Estado:</strong> " . $estudiante['Estado']. 
            (($estudiante['Estado'] === "Pre Formal") ? "<strong> - Necesita retroalimentación</strong>":"")."<br>";
            $contador_preformal += ($estudiante['Estado'] === "Pre Formal") ? 1 : 0;
        }
        echo "<h2>Pre Formal:</h2>";
        echo "La cantidad de estudiantes con estado <strong>Pre Formal</strong> es de: ".$contador_preformal."<br>";
        // Promedio "Estratégico"
        $promedio = 0;
        $contador_estrateg = 0;
        foreach ($Estudiantes as $estudiante) 
        {
            ($estudiante['Estado'] === "Estratégico") ? $contador_estrateg++ .$promedio+= $estudiante['Nota']:"";
        }
        echo "<h2>Estratégico:</h2>";
        echo "El Promedio de los estudiantes con el estado <strong>Estratégico</strong> es: ".$promedio = $promedio / $contador_estrateg;
    ?>
</body>
</html>
