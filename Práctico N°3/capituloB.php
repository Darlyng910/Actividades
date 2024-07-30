<?php
    session_start();
    $errores = [];
    $datos = [];
    $mensaje = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $tipo_vivienda = $_POST['tipo-vivienda'] ?? '';
        $detalle_vivienda = $_POST['detalle-vivienda'] ?? '';
        $estado_vivienda = $_POST['estado-vivienda'] ?? '';
        $detalle_estado_vivienda = $_POST['detalle-estado-vivienda'] ?? '';
            
        if (empty($tipo_vivienda)) 
        {
            $errores['tipo-vivienda'] = "Debe seleccionar un tipo de vivienda.";
        }
        if (empty($detalle_vivienda)) 
        {
            $errores['detalle-vivienda'] = "Debe seleccionar un detalle de la vivienda.";
        }
        if (empty($estado_vivienda)) 
        {
            $errores['estado-vivienda'] = "Debe seleccionar el estado de la vivienda.";
        }
        if (empty($detalle_estado_vivienda)) 
        {
            $errores['detalle-estado-vivienda'] = "Debe seleccionar un detalle del estado de la vivienda.";
        }

        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) 
        {
            $imgTmpPath = $_FILES['file']['tmp_name'];
            $imgName = $_FILES['file']['name'];
            $imgSize = $_FILES['file']['size'];
            $imgType = $_FILES['file']['type'];
            $imgNameCmps = explode(".", $imgName);
            $imgExtension = strtolower(end($imgNameCmps));
                
            $extensiones = ['jpg', 'png'];
            if (!in_array($imgExtension, $extensiones)) 
            {
                $errores['file'] = "Solo se permiten archivos JPG y PNG.";
            }
            if ($imgSize > 2 * 1024 * 1024) 
            {
                $errores['file'] = "El archivo debe pesar menos de 2 MB.";
            }
            } 
            else 
            {
                $errores['file'] = "Debe cargar una imagen.";
            }

            if (empty($errores)) 
            {
                $contenido_archivo = "Tipo de Vivienda: $tipo_vivienda\n";
                $contenido_archivo .= "Detalle de Vivienda: $detalle_vivienda\n";
                $contenido_archivo .= "Estado de Vivienda: $estado_vivienda\n";
                $contenido_archivo .= "Detalle del Estado de Vivienda: $detalle_estado_vivienda\n";
                $fecha = date("Ymd_His");
                $nombre_archivo = 'practica_3/form_datos_'.$fecha.'.txt';
                if (!file_exists('practica_3')) 
                {
                    mkdir('practica_3', 0777, true);
                }
                file_put_contents($nombre_archivo, $contenido_archivo);

                $fileNewName = 'practica_3/datos-'.$fecha.'.'.$imgExtension;
                move_uploaded_file($imgTmpPath, $fileNewName);

                $_SESSION['mensaje'] = "Envio Exitoso!";
                $_SESSION['url'] = $nombre_archivo;
                header("Location: mostrar-capB.php");
                exit();
            } 
            else 
            {
                $_SESSION['errores'] = $errores;
                $_SESSION['datos'] = $_POST;
                header("Location: capituloB.php");
                exit();
            }
        } 
        else 
        {
            if (isset($_SESSION['errores'])) 
            {
                $errores = $_SESSION['errores'];
                $datos = $_SESSION['datos'];
                unset($_SESSION['errores']);
                unset($_SESSION['datos']);
            }
        }

        $opciones_detalle_vivienda = [];
        if (isset($datos['tipo-vivienda'])) 
        {
            switch ($datos['tipo-vivienda']) 
            {
                case 'particular':
                    $opciones_detalle_vivienda = ['Casa', 'Choza, Pahuichi', 'Departamento', 'Cuarto(s) o habitación(es) suelta(s)', 'Vivienda improvisada o vivienda móvil', 'Establecimiento no destinado para vivienda'];
                    break;
                case 'colectiva':
                    $opciones_detalle_vivienda = ['Hotel, hostal, residencial o alojamiento', 'Hospital o clínica con internación', 'Cuartel o establecimiento militar o policial', 'Residencia u otro de adultos mayores', 'Albergue de niñas(os) y adolescentes', 'Recinto penitenciario o de reintegración', 'Campamento de trabajo', 'Otra (Instituto de rehabilitación, convento)'];
                    break;
                case 'sin-vivienda':
                    $opciones_detalle_vivienda = ['Persona que vive en la calle', 'En tránsito: Terminal, aeropuerto, puerto u otro'];
                    break;
            }
        }

        $estadoOpciones = [];
        if (isset($datos['estado-vivienda'])) 
        {
            switch ($datos['estado-vivienda']) 
            {
                case 'ocupada':
                    $estadoOpciones = ['Con personas presentes', 'Con personas temporalmente ausentes'];
                    break;
                case 'desocupada':
                    $estadoOpciones = ['Para alquilar y/o vender', 'Terminándose de construir o reparar', 'Abandonada'];
                    break;
            }
        }
        ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°2 - Capítulo B</title>
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
            font-family: 'Calibri';
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
        .radio-group {
            display: flex;
            flex-direction: column;
        }
        .radio-group label {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .radio-group input[type="radio"] {
            margin-right: 15px;
        }
        .question-container {
            margin-bottom: 1em;
        }
        .question-container h5 {
            margin: 0;
            display: inline;
            margin-right: 10px;
        }
        .radio-group {
            display: flex;
            align-items: center;
        }
        .radio-group label {
            margin-right: 10px;
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="capitulo">
                <fieldset>
                    <legend>CAPÍTULO B: Tipo de Vivienda</legend>
                    <h4>2. La vivienda es:</h4>
                    <div class="radio-group">
                        <label for="vivienda-particular">
                            <input type="radio" id="vivienda-particular" name="tipo-vivienda" value="particular" <?php echo (isset($datos['tipo-vivienda']) && $datos['tipo-vivienda'] == 'particular') ? 'checked' : ''; ?> onchange="this.form.submit();">
                            A. Vivienda Particular
                        </label>
                        <label for="vivienda-colectiva">
                            <input type="radio" id="vivienda-colectiva" name="tipo-vivienda" value="colectiva" <?php echo (isset($datos['tipo-vivienda']) && $datos['tipo-vivienda'] == 'colectiva') ? 'checked' : ''; ?> onchange="this.form.submit();">
                            B. Vivienda Colectiva
                        </label>
                        <label for="sin-vivienda">
                            <input type="radio" id="sin-vivienda" name="tipo-vivienda" value="sin-vivienda" <?php echo (isset($datos['tipo-vivienda']) && $datos['tipo-vivienda'] == 'sin-vivienda') ? 'checked' : ''; ?> onchange="this.form.submit();">
                            C. Sin Vivienda
                        </label>
                    </div>
                    <?php if (isset($errores['tipo-vivienda'])): ?><div class="error"><?= $errores['tipo-vivienda'] ?></div><?php endif; ?>
                    <div>
                        <label for="detalle-vivienda">Detalle de Vivienda</label>
                        <select id="detalle-vivienda" name="detalle-vivienda">
                            <?php
                            foreach ($opciones_detalle_vivienda as $opcion) {
                                echo "<option value=\"$opcion\" " . (isset($datos['detalle-vivienda']) && $datos['detalle-vivienda'] == $opcion ? 'selected' : '') . ">$opcion</option>";
                            }
                            ?>
                        </select>
                        <?php if (isset($errores['detalle-vivienda'])): ?><div class="error"><?= $errores['detalle-vivienda'] ?></div><?php endif; ?>
                    </div>
                    <h4>2. La vivienda está:</h4>
                    <div class="radio-group">
                        <label for="ocupada">
                            <input type="radio" id="ocupada" name="estado-vivienda" value="ocupada" <?php echo (isset($datos['estado-vivienda']) && $datos['estado-vivienda'] == 'ocupada') ? 'checked' : ''; ?> onchange="this.form.submit();">
                            A. Ocupada
                        </label>
                        <label for="desocupada">
                            <input type="radio" id="desocupada" name="estado-vivienda" value="desocupada" <?php echo (isset($datos['estado-vivienda']) && $datos['estado-vivienda'] == 'desocupada') ? 'checked' : ''; ?> onchange="this.form.submit();">
                            B. Desocupada
                        </label>
                    </div>
                    <?php if (isset($errores['estado-vivienda'])): ?><div class="error"><?= $errores['estado-vivienda'] ?></div><?php endif; ?>
                    <div>
                        <label for="detalle-estado-vivienda">Detalle del Estado de Vivienda</label>
                        <select id="detalle-estado-vivienda" name="detalle-estado-vivienda">
                            <?php
                            foreach ($estadoOpciones as $opcion) {
                                echo "<option value=\"$opcion\" " . (isset($datos['detalle-estado-vivienda']) && $datos['detalle-estado-vivienda'] == $opcion ? 'selected' : '') . ">$opcion</option>";
                            }
                            ?>
                        </select>
                        <?php if (isset($errores['detalle-estado-vivienda'])): ?><div class="error"><?= $errores['detalle-estado-vivienda'] ?></div><?php endif; ?>
                    </div>
                    <div>
                        <h4>3. Imagen de la Vivienda:</h4>
                        <input name="file" type="file" accept=".jpg, .png" />
                    </div><br>
                    <?php if (isset($errores['file'])): ?><div class="error"><?= $errores['file'] ?></div><?php endif; ?>
                </fieldset>
            </div>
            <center><button type="submit">Enviar</button></center>
        </form>
    </div>
</body>
</html>