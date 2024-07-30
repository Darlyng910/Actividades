<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°1</title>
    <style>
        body {
            font-family: Century, sans-serif;
            background: #D0ECE7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .card-header img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
        .card-header h1 {
            margin: 0;
            color: #2C3E50;
        }
        .card input[type="text"],
        .card textarea,
        .card input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Century, sans-serif;
        }
        .card input[type="submit"] {
            background: #3498DB;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Century, sans-serif;
        }
        .card input[type="submit"]:hover {
            background: #2980B9;
        }
        .error-message {
            color: #A93226;
            font-size: 12px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <img src="image/logo.png" alt="Logo">
            <h1>Gestión de Proyectos</h1>
        </div>
        <?php
            session_start();
            $errores = array();
            $nombre = '';
            $descripcion = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $documento = $_FILES['documento'];
                if (!preg_match('/^[a-zA-Z0-9 ]+$/', $nombre)) 
                {
                    $errores['nombre'] = "El nombre del proyecto solo puede contener letras, números y espacios.";
                }
                if (strlen($descripcion) < 50) 
                {
                    $errores['descripcion'] = "La descripción del proyecto debe tener un mínimo de 50 caracteres.";
                }

                $extensiones = array('pdf', 'docx');
                $doc_nombre = $documento['name'];
                $doc_tmp = $documento['tmp_name'];
                $doc_tamaño = $documento['size'];
                $doc_error = $documento['error'];
                $doc_ext = strtolower(pathinfo($doc_nombre, PATHINFO_EXTENSION));
                $max_tamaño = 5 * 1024 * 1024; 

                if ($doc_error === 0) 
                {
                    if (!in_array($doc_ext, $extensiones)) 
                    {
                        $errores['documento'] = 'El documento del proyecto debe ser un archivo <strong>PDF</strong> o <strong>DOCX</strong>.';
                    } 
                    elseif ($doc_tamaño > $max_tamaño) 
                    {

                        $errores['documento'] = "El documento del proyecto no debe exceder los <strong>5 MB</strong>.";
                    }
                } 
                else 
                {
                    $errores['documento'] = "Debe subir un documento.";
                }

                if (empty($errores)) 
                {
                    $nuevo_nombre = $nombre.' ('.date('Ymd').')'.'.'.$doc_ext;
                    $destino = 'practica_3/'.$nuevo_nombre;
                    if (!is_dir('practica_3')) 
                    {
                        mkdir('practica_3', 0777, true);
                    }
                    if (move_uploaded_file($doc_tmp, $destino)) 
                    {
                        $_SESSION['ejercicio1'] = array('nombre' => $nombre, 'descripcion' => $descripcion, 'documento' => $destino);
                        header('Location: mostrar.php');
                        exit();
                    } 
                    else 
                    {
                        echo "<p class='error-message'>Error al guardar el documento.</p>";
                    }
                }
            }
            ?>
        <form enctype="multipart/form-data" action="#" method="POST">
            <input type="text" name="nombre" placeholder="Nombre del Proyecto" value="<?php echo htmlspecialchars($nombre); ?>">
            <?php if (isset($errores['nombre'])) { echo "<p class='error-message'>".$errores['nombre']."</p>"; } ?>
            <input type="text" name="descripcion" placeholder="Descripción del Proyecto" value="<?php echo htmlspecialchars($descripcion); ?>">
            <?php if (isset($errores['descripcion'])) { echo "<p class='error-message'>".$errores['descripcion']."</p>"; } ?>
            <input name="documento" type="file">
            <?php if (isset($errores['documento'])) { echo "<p class='error-message'>".$errores['documento']."</p>"; } ?>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
