<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°5 - Archivos</title>
    <style>
        body {
            font-family: Century;
            background: #DEECD9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .card h1 {
            margin-bottom: 20px;
        }
        .card input[type="text"]
        {
            width: calc(70% - 10px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .card input[type="submit"] {
            background: #3498DB;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .card input[type="submit"]:hover {
            background: #2980B9;
            font-family: Century;
        }
    </style>
    </style>
</head>
<body>
<?php
        session_start(); 
        $errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : [];
        $datos = isset($_SESSION['datos']) ? $_SESSION['datos'] : [];
        unset($_SESSION['errores']);
        unset($_SESSION['datos']);
        $campos = [
            "nombre" => "Nombre",
            "apellido" => "Apellido",
            "carrera" => "Carrera",
        ];
        function Validar($entrada, $nombre, $nombre_campo) 
        {
            global $errores, $datos;
            if (empty($entrada)) 
            {
                $errores[$nombre] = "El campo <strong>$nombre_campo</strong> es obligatorio";
            } 
            else 
            {
                $datos[$nombre] = $entrada;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            foreach ($campos as $campo => $nombre_campo) 
            {
                Validar($_POST[$campo] ?? '', $campo, $nombre_campo);
            }
            if (empty($errores)) 
            {
                $contenido_archivo = "";
                foreach ($datos as $clave => $valor) 
                {
                    $contenido_archivo .= $campos[$clave] .": ".$valor."\n";
                }
                $fecha = date("Ymd_His");
                $nombre_archivo = 'prueba/estudiante-datos'.$fecha.'.txt';
                if (!file_exists('prueba')) 
                {
                    mkdir('prueba', 0777, true);
                }
                file_put_contents($nombre_archivo, $contenido_archivo);
                $_SESSION['mensaje'] = "Envio Exitoso!";
                $_SESSION['url'] = $nombre_archivo;
                header("Location: mostrararchivo.php");
                exit();
            } 
            else 
            {
                $_SESSION['errores'] = $errores;
                $_SESSION['datos'] = $_POST;
                header("Location: archivo5.php");
                exit();
            }
        }
    ?>    
        <div class="card">
            <h1>Subir Archivos</h1>
            <form enctype="multipart/form-data" action="" method="POST">
                <div>
                    <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($datos['nombre'] ?? '') ?>" required>
                        <?php if (isset($errores['nombre'])): ?><div class="error"><?= $errores['nombre'] ?></div><?php endif; ?>
                </div> 
                <div>
                    <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($datos['apellido'] ?? '') ?>" required>
                        <?php if (isset($errores['apellido'])): ?><div class="error"><?= $errores['apellido'] ?></div><?php endif; ?>
                </div> 
                <div>
                    <label for="carrera">Carrera:</label>
                        <input type="text" id="carrera" name="carrera" value="<?= htmlspecialchars($datos['carrera'] ?? '') ?>" required>
                        <?php if (isset($errores['carrera'])): ?><div class="error"><?= $errores['carrera'] ?></div><?php endif; ?>
                </div>   
                <input type="submit" value="Enviar"/>
            </form>
        </div>
    </div>
</body>
</html>
