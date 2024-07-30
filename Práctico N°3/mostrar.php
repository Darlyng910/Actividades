<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°1 (Detalles)</title>
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
        }
        .card h1 {
            margin-bottom: 20px;
            color: #2C3E50;
        }
        .card a {
            color: #3498DB;
            text-decoration: none;
        }
        .card a.button {
            display: inline-block;
            background: #3498DB;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .card a.button:hover {
            background: #2980B9;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['ejercicio1'])) {
            header('Location: Ejercicio-1.php'); 
            exit();
        }
        $ejercicio = $_SESSION['ejercicio1'];
        unset($_SESSION['ejercicio1']);
    ?>
    <div class="card">
        <h1>Detalles del Proyecto</h1>
        <p><strong>Nombre: </strong><?php echo htmlspecialchars($ejercicio['nombre']); ?></p>
        <p><strong>Descripción: </strong><?php echo htmlspecialchars($ejercicio['descripcion']); ?></p>
        <p><strong>Documento: </strong><a href="<?php echo htmlspecialchars($ejercicio['documento']); ?>" target="_blank">Ver Documento</a></p>
        <center><a href="ejercicio1.php" class="button">Atrás</a></center>
    </div>
</body>
</html>
