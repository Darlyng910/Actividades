<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario N°1</title>
    <style>
        body {
            font-family: Century;
            background: #EBF5FB;
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
        .card input[type="text"],
        .card input[type="password"] {
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
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Inicio de Sesión</h1>
        <form action="enviar.php" method="POST">
            <input type="text" name="usuario" placeholder="Nombre de usuario">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
