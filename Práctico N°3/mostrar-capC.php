<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <style>
        body {
            font-family: Century, sans-serif;
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
        $mensaje = $_SESSION['mensaje'] ?? '';
        $url = $_SESSION['url'] ?? '';
        unset($_SESSION['mensaje'], $_SESSION['url']);
    ?>
    <div class="card">
        <?php if ($mensaje): ?>
            <div class="success-message"><?= htmlspecialchars($mensaje) ?></div>
            <?php if ($url): ?>
                <a href="<?= htmlspecialchars($url) ?>" download><strong>Ver documento TXT</strong></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
