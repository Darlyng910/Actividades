<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°2 - Capítulo A</title>
    <style>
        body {
            font-family: Century, sans-serif;
            background-color: #F2F3F4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #FDFEFE;
            color: black;
            padding: 20px 0;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            height: 100px;
            margin-right: 20px;
        }

        .header-text {
            text-align: center;
            max-width: 600px;
        }

        h1 {
            margin: 0;
        }

        p {
            margin: 10px 0 0;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .capitulo {
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #DEECD9;
            font-family: 'Calibri';
            font-size: 16px;
        }

        fieldset {
            border: none;
            padding: 0;
        }

        legend {
            font-size: 1.2em;
            font-weight: bold;
            padding: 0 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-family: Century, sans-serif;
            font-size: 12px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            padding: 10px 20px;
            background-color: #BFD1B9;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: Century, sans-serif;
            max-width: 30%;
        }

        button:hover {
            background-color: #81937A;
        }

        .field-group {
            display: flex;
            gap: 35px;
            margin-bottom: 15px;
        }

        .field-group label,
        .field-group input {
            flex: 1;
        }

        .short-input {
            width: 60%;
            max-width: 400px;
        }

        .error {
            color: #C0392B;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 15px;
            font-family: Century, sans-serif;
        }

        .error strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <img src="image/censologo.jpg" alt="Logo" class="logo">
            <div class="header-text">
                <h1>Censo de Población y Vivienda 2024</h1>
                <p>Según Ley N°1405 de Estadísticas Oficiales, la información proporcionada por las/los informantes respeta el Secreto Estadístico (CONFIDENCIALIDAD)</p>
            </div>
        </div>
    </header>
    <div class="container">
    <?php
        session_start(); 

        $errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : [];
        $datos = isset($_SESSION['datos']) ? $_SESSION['datos'] : [];
        unset($_SESSION['errores']);
        unset($_SESSION['datos']);

        $campos = [
            "segmento" => "Segmento",
            "manzana" => "Manzana",
            "predio" => "Nro. de Predio",
            "total-viviendas" => "Total de Viviendas en el Predio",
            "nro-vivienda" => "Nro. de Vivienda",
            "ciudad-comunidad" => "Ciudad o Comunidad",
            "calle" => "Calle, avenida o carretera",
            "nro-puerta" => "Nro. de Puerta",
            "planta" => "Planta, piso o nivel",
            "nro-depto" => "Nro. Depto.",
            "nombre-edificio" => "Nombre del edificio, condominio, torre o conventillo",
            "bloque" => "Bloque"
        ];

        function Validar($entrada, $nombre, $nombre_campo) 
        {
            global $errores, $datos;
            if (empty($entrada)) 
            {
                $errores[$nombre] = "El campo <strong>$nombre_campo</strong> es obligatorio";
            } 
            elseif (strlen($entrada) > 50) 
            {
                $errores[$nombre] = "El campo <strong>$nombre_campo</strong> no debe exceder los 50 caracteres";
            } 
            elseif (!preg_match("/^[a-zA-Z0-9 ]+$/", $entrada)) 
            {
                $errores[$nombre] = "El campo <strong>$nombre_campo</strong> solo debe contener letras, números y espacios";
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
                $nombre_archivo = 'practica_3/form_datos'.$fecha.'.txt';
                if (!file_exists('practica_3')) 
                {
                    mkdir('practica_3', 0777, true);
                }
                file_put_contents($nombre_archivo, $contenido_archivo);
                $_SESSION['mensaje'] = "Envio Exitoso!";
                $_SESSION['url'] = $nombre_archivo;
                header("Location: mostrar-capA.php");
                exit();
            } 
            else 
            {
                $_SESSION['errores'] = $errores;
                $_SESSION['datos'] = $_POST;
                header("Location: capituloA.php");
                exit();
            }
        }
    ?>
        <form action="" method="post">
            <div class="capitulo">
                <fieldset>
                    <legend>CAPÍTULO A: Ubicación de la Vivienda (Ocupada Y Desocupada)</legend>
                    <h4>Copie del Mapa:</h4>
                    <div class="field-group">
                        <div>
                            <label for="segmento">1. Segmento</label>
                            <input type="text" id="segmento" name="segmento" value="<?= htmlspecialchars($datos['segmento'] ?? '') ?>" required>
                            <?php if (isset($errores['segmento'])): ?><div class="error"><?= $errores['segmento'] ?></div><?php endif; ?>
                        </div>
                        <div>
                            <label for="manzana">2. Manzana</label>
                            <input type="text" id="manzana" name="manzana" value="<?= htmlspecialchars($datos['manzana'] ?? '') ?>" required>
                            <?php if (isset($errores['manzana'])): ?><div class="error"><?= $errores['manzana'] ?></div><?php endif; ?>
                        </div>
                        <div>
                            <label for="predio">3. Nro. de Predio</label>
                            <input type="text" id="predio" name="predio" value="<?= htmlspecialchars($datos['predio'] ?? '') ?>" required>
                            <?php if (isset($errores['predio'])): ?><div class="error"><?= $errores['predio'] ?></div><?php endif; ?>
                        </div>
                    </div>
                    <h4>Registro del Predio:</h4>
                    <div class="field-group">
                        <div>
                            <label for="total-viviendas">4. Total de Viviendas en el Predio</label>
                            <input type="text" id="total-viviendas" name="total-viviendas" value="<?= htmlspecialchars($datos['total-viviendas'] ?? '') ?>" required>
                            <?php if (isset($errores['total-viviendas'])): ?><div class="error"><?= $errores['total-viviendas'] ?></div><?php endif; ?>
                        </div>
                        <div>
                            <label for="nro-vivienda">5. Nro. de Vivienda</label>
                            <input type="text" id="nro-vivienda" name="nro-vivienda" value="<?= htmlspecialchars($datos['nro-vivienda'] ?? '') ?>" required>
                            <?php if (isset($errores['nro-vivienda'])): ?><div class="error"><?= $errores['nro-vivienda'] ?></div><?php endif; ?>
                        </div>
                    </div>
                    <h4>Complete según corresponda:</h4>
                    <label for="ciudad-comunidad">6. Ciudad o Comunidad</label>
                    <input type="text" id="ciudad-comunidad" name="ciudad-comunidad" class="short-input" value="<?= htmlspecialchars($datos['ciudad-comunidad'] ?? '') ?>" required>
                    <?php if (isset($errores['ciudad-comunidad'])): ?><div class="error"><?= $errores['ciudad-comunidad'] ?></div><?php endif; ?>

                    <label for="calle">7. Calle, avenida o carretera</label>
                    <input type="text" id="calle" name="calle" class="short-input" value="<?= htmlspecialchars($datos['calle'] ?? '') ?>" required>
                    <?php if (isset($errores['calle'])): ?><div class="error"><?= $errores['calle'] ?></div><?php endif; ?>
                    <div class="field-group">
                        <div>
                            <label for="nro-puerta">8. Nro. de Puerta</label>
                            <input type="text" id="nro-puerta" name="nro-puerta" value="<?= htmlspecialchars($datos['nro-puerta'] ?? '') ?>" required>
                            <?php if (isset($errores['nro-puerta'])): ?><div class="error"><?= $errores['nro-puerta'] ?></div><?php endif; ?>
                        </div>
                        <div>
                            <label for="planta">9. Planta, piso o nivel</label>
                            <input type="text" id="planta" name="planta" value="<?= htmlspecialchars($datos['planta'] ?? '') ?>" required>
                            <?php if (isset($errores['planta'])): ?><div class="error"><?= $errores['planta'] ?></div><?php endif; ?>
                        </div>
                        <div>
                            <label for="nro-depto">10. Nro. Depto.</label>
                            <input type="text" id="nro-depto" name="nro-depto" value="<?= htmlspecialchars($datos['nro-depto'] ?? '') ?>" required>
                            <?php if (isset($errores['nro-depto'])): ?><div class="error"><?= $errores['nro-depto'] ?></div><?php endif; ?>
                        </div>
                    </div>
                    <div class="field-group">
                        <div>
                            <label for="nombre-edificio">11. Nombre del edificio, condominio, torre o conventillo</label>
                            <input type="text" id="nombre-edificio" name="nombre-edificio" value="<?= htmlspecialchars($datos['nombre-edificio'] ?? '') ?>" required>
                            <?php if (isset($errores['nombre-edificio'])): ?><div class="error"><?= $errores['nombre-edificio'] ?></div><?php endif; ?>
                        </div>
                        <div>
                            <label for="bloque">12. Bloque</label>
                            <input type="text" id="bloque" name="bloque" value="<?= htmlspecialchars($datos['bloque'] ?? '') ?>" required>
                            <?php if (isset($errores['bloque'])): ?><div class="error"><?= $errores['bloque'] ?></div><?php endif; ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <center><button type="submit">Enviar</button></center>
        </form>
    </div>
</body>
</html>
