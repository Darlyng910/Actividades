<?php
    $error = array();
    $cadena = '/[*.@|]/';
    if (empty($_POST['nombre'])) {
        $error[] = 'Complete el campo <strong>Nombre</strong><br>';
    }
    elseif (strlen($_POST['nombre']) < 3 || strlen($_POST['nombre']) > 20) {
        $error[] = 'El <strong>Nombre</strong> debe tener entre 3 y 20 caracteres<br>';
    }
    else {
        $nombre = $_POST['nombre'];
    }
    if (empty($_POST['apellido'])) {
        $error[] = 'Complete el campo <strong>Apellido</strong><br>';
    } 
    elseif (strlen($_POST['apellido']) < 3 || strlen($_POST['apellido']) > 20) {
        $error[] = 'El <strong>Apellido</strong> debe tener entre 3 y 20 caracteres<br>';
    }
    else {
        $apellido = $_POST['apellido'];
    }
    if (empty($_POST['correo'])) {
        $error[] = 'Correo';
    } 
    else {
        $correo = $_POST['correo'];
    }
    if (empty($_POST['comentario'])) {
        $error[] = 'Complete el campo Comentario<br>';
    } 
    elseif (strlen($_POST['comentario']) < 5 || strlen($_POST['comentario']) > 50){
        $error[] = 'Comentario (debe tener entre 5 y 50 caracteres)<br>';
    }
    elseif (preg_match($cadena, $_POST['comentario'])){
        $error[] = 'Comentario no debe contener símbolos<br>';
    }
    else {
        $comentario = $_POST['comentario'];
    }
    if (empty($_POST['idioma'])) {
        $error[] = 'Complete el campo Idioma<br>';
    } 
    else {
        $idioma = $_POST['idioma'];
    }
    if (empty($_POST['musica'])) {
        $error[] = 'Complete el campo Música<br>';
    } 
    else {
        $musica = $_POST['musica'];
    }
    if (empty($_POST['pasatiempo'])) {
        $error[] = 'Complete el campo Pasatiempo<br>';
    } 
    else {
        $pasatiempo = $_POST['pasatiempo'];
    }
    if (!empty($error)) {
        echo "<p style='color:red;'>Error en los siguientes datos: <br>".implode($error)."</p>";
    } 
    else {
        echo "Nombre: $nombre<br>";
        echo "Apellido: $apellido<br>";
        echo "Correo: $correo<br>";
        echo "Comentario: $comentario<br>";
        echo "Idioma: $idioma<br>";
        echo "Música: $musica<br>";
        echo "Pasatiempo: ".implode(", ", $pasatiempo)."<br>";
    }
?>