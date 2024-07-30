<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario N°2</title>
    <style>
        body {
            font-family: Century, sans-serif;
            background: #EBF5FB;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            width: 100%;
        }
        .card h1 {
            margin-bottom: 10px;
            font-size: 15px;
            color: #2C3E50;
            text-align: center;
        }
        .card input[type="text"],
        .card input[type="email"],
        .card textarea,
        .card select {
            width: 100%;
            padding: 6px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 10px;
        }
        .card input[type="radio"],
        .card input[type="checkbox"] {
            margin-right: 6px;
        }
        .card fieldset {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            margin: 8px 0;
        }
        .card legend {
            padding: 0 6px;
            font-size: 12px;
            color: #34495E;
        }
        .card div {
            margin-bottom: 6px;
        }
        .card label {
            margin-right: 6px;
            color: #34495E;
            font-size: 12px;
        }
        .card input[type="submit"] {
            width: 100%;
            background: #3498DB;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }
        .card input[type="submit"]:hover {
            background: #2980B9;
        }
        .error-message {
            color: #A93226;
            font-size: 10px;
        }
    </style>
    <?php
        $error = array();
        $nombre = $apellido = $correo = $comentario = $idioma = $musica = $pasatiempo = '';
        if (isset($_POST['submit']))
        {
            $cadena = '/[*.@|]/';
            if (empty($_POST['nombre'])) {
                $error[0] = 'Complete el campo <strong>Nombre</strong><br>';
            }
            elseif (strlen($_POST['nombre']) < 3 || strlen($_POST['nombre']) > 20) {
                $error[0] = 'El <strong>Nombre</strong> debe tener entre 3 y 20 caracteres<br>';
            }
            else {
                $nombre = $_POST['nombre'];
            }
            if (empty($_POST['apellido'])) {
                $error[1] = 'Complete el campo <strong>Apellido</strong><br>';
            } 
            elseif (strlen($_POST['apellido']) < 3 || strlen($_POST['apellido']) > 20) {
                $error[1] = 'El <strong>Apellido</strong> debe tener entre 3 y 20 caracteres<br>';
            }
            else {
                $apellido = $_POST['apellido'];
            }
            if (empty($_POST['correo'])) {
                $error[2] = 'Complete el campo <strong>Correo</strong>';
            } 
            else {
                $correo = $_POST['correo'];
            }
            if (empty($_POST['comentario'])) {
                $error[3] = 'Complete el campo <strong>Comentario</strong><br>';
            } 
            elseif (strlen($_POST['comentario']) < 5 || strlen($_POST['comentario']) > 50){
                $error[3] = '<strong>Comentario</strong> debe tener entre 5 y 50 caracteres<br>';
            }
            elseif (preg_match($cadena, $_POST['comentario'])){
                $error[3] = '<strong>Comentario</strong> no debe contener símbolos<br>';
            }
            else {
                $comentario = $_POST['comentario'];
            }
            if (empty($_POST['idioma'])) {
                $error[4] = 'Complete el campo <strong>Idioma</strong><br>';
            } 
            else {
                $idioma = $_POST['idioma'];
            }
            if (empty($_POST['musica'])) {
                $error[5] = 'Complete el campo <strong>Música</strong><br>';
            } 
            else {
                $musica = $_POST['musica'];
            }
            if (empty($_POST['pasatiempo'])) {
                $error[6] = 'Complete el campo <strong>Pasatiempo</strong><br>';
            } 
            else {
                $pasatiempo = $_POST['pasatiempo'];
            }
            if (empty($error)) {
                echo "Nombre: $nombre<br>";
                echo "Apellido: $apellido<br>";
                echo "Correo: $correo<br>";
                echo "Comentario: $comentario<br>";
                echo "Idioma: $idioma<br>";
                echo "Música: $musica<br>";
                echo "Pasatiempo: ".implode(", ", $pasatiempo)."<br>";
            }
        }
    ?>
</head>
<body>
    <div class="card">
        <h1>Formulario</h1>
        <form action="#" method="POST">
            <?php echo isset($error[0]) ? "<input style='border: 2px solid #A93226;' type='text' name='nombre' placeholder='Nombre'>":"<input type='text' name='nombre' placeholder='Nombre'>"?>
            <?php if (isset($error[0])) { echo "<p class='error-message'>" . $error[0] . "</p>"; } ?>

            <?php echo isset($error[1]) ? "<input style='border: 2px solid #A93226;' type='text' name='apellido' placeholder='Apellido'>":"<input type='text' name='apellido' placeholder='Apellido'>"?>
            <?php if (isset($error[1])) { echo "<p class='error-message'>" . $error[1] . "</p>"; } ?>

            <?php echo isset($error[2]) ? "<input style='border: 2px solid #A93226;' type='email' name='correo' placeholder='Email'>":"<input type='email' name='correo' placeholder='Email'>"?>
            <?php if (isset($error[2])) { echo "<p class='error-message'>" . $error[2] . "</p>"; } ?>

            <?php echo isset($error[3]) ? "<textarea style='border: 2px solid #A93226; name='comentario' placeholder='Comentario'></textarea>":"<textarea name='comentario' placeholder='Comentario'></textarea>"?>
            <?php if (isset($error[3])) { echo "<p class='error-message'>" . $error[3] . "</p>"; } ?>

            <select name="idioma" class="<?php echo isset($error[4]) ? 'error-border' : ''; ?>">
                <option value="">Seleccione el Idioma</option>
                <option value="Español" <?php echo ($idioma == 'Español') ? 'selected' : ''; ?>>Español</option>
                <option value="Ingles" <?php echo ($idioma == 'Ingles') ? 'selected' : ''; ?>>Inglés</option>
                <option value="Aleman" <?php echo ($idioma == 'Aleman') ? 'selected' : ''; ?>>Alemán</option>
                <option value="Portugues" <?php echo ($idioma == 'Portugues') ? 'selected' : ''; ?>>Portugués</option>
            </select>
            <?php if (isset($error[4])) { echo "<p class='error-message'>" . $error[4] . "</p>"; } ?>

            <fieldset class="<?php echo isset($error[5]) ? 'error-border' : ''; ?>">
                <legend>Música</legend>
                <div>
                    <input type="radio" name="musica" value="Rock" <?php echo ($musica == 'Rock') ? 'checked' : ''; ?>>
                    <label>Rock</label>
                    <input type="radio" name="musica" value="Clásica" <?php echo ($musica == 'Clásica') ? 'checked' : ''; ?>>
                    <label>Clásica</label>
                    <input type="radio" name="musica" value="Pop" <?php echo ($musica == 'Pop') ? 'checked' : ''; ?>>
                    <label>Pop</label>
                </div>
            </fieldset>
            <?php if (isset($error[5])) { echo "<p class='error-message'>" . $error[5] . "</p>"; } ?>

            <fieldset class="<?php echo isset($error[6]) ? 'error-border' : ''; ?>">
                <legend>Pasatiempo</legend>
                <div>
                    <input type="checkbox" name="pasatiempo[]" value="Jugar" <?php echo (is_array($pasatiempo) && in_array('Jugar', $pasatiempo)) ? 'checked' : ''; ?>>
                    <label>Jugar</label>
                    <input type="checkbox" name="pasatiempo[]" value="Cantar" <?php echo (is_array($pasatiempo) && in_array('Cantar', $pasatiempo)) ? 'checked' : ''; ?>>
                    <label>Cantar</label>
                    <input type="checkbox" name="pasatiempo[]" value="Hornear" <?php echo (is_array($pasatiempo) && in_array('Hornear', $pasatiempo)) ? 'checked' : ''; ?>>
                    <label>Hornear</label>
                </div>
            </fieldset>
            <?php if (isset($error[6])) { echo "<p class='error-message'>" . $error[6] . "</p>"; } ?>

            <input type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>