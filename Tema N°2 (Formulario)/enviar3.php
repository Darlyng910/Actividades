<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $bandera = $_POST['bandera'];

    $imagen = $_FILES['imagen'];
    $imgNombre = $imagen['name'];
    $imgTmpNombre = $imagen['tmp_name'];
    $imgTamaño = $imagen['size'];
    $imgError = $imagen['error'];
    $imgTipo = $imagen['type'];

    $expediente = $_FILES['expediente'];
    $expNombre = $expediente['name'];
    $expTmpNombre = $expediente['tmp_name'];
    $expTamaño = $expediente['size'];
    $expError = $expediente['error'];
    $expTipo = $expediente['type'];

    $extensionimagen = 'png';
    $imgExt = strtolower(pathinfo($imgNombre, PATHINFO_EXTENSION));
    $maxImg = 2 * 1024 * 1024; 

    $extensionexp = 'pdf';
    $expExt = strtolower(pathinfo($expNombre, PATHINFO_EXTENSION));
    $maxExp = 10 * 1024 * 1024;

    $imagenSubida = false;
    $expedienteSubido = false;

    if ($imgError === 0) {
        if ($imgExt === $extensionimagen && $imgTamaño <= $maxImg) 
        {
            $imgNuevo = uniqid('', true) . '.' .$imgExt;
            $imgDestino = 'subidas/images/' .$imgNuevo;
            move_uploaded_file($imgTmpNombre, $imgDestino);
            $imagenSubida = true;
        } 
        else { echo "<strong>Error:</strong> La imagen debe ser un archivo (.png) y pesar máximo 2MB<br>"; }
    } 
    else { echo "Error al cargar la imagen<br>"; }
    if ($expError === 0) 
    {
        if ($expExt === $extensionexp && $expTamaño <= $maxExp) {
            $expNuevo = uniqid('', true) . '.' .$expExt;
            $expDestino = 'subidas/expedientes/' .$expNuevo;
            move_uploaded_file($expTmpNombre, $expDestino);
            $expedienteSubido = true;
        } 
        else { echo "<strong>Error:</strong> El expediente debe ser un archivo (.pdf) y pesar máximo 10MB<br>"; }
    } 
    else { echo "Error al cargar el expediente.<br>"; }
    if ($imagenSubida && $expedienteSubido) {
        echo "<strong>Nombre:</strong> " . htmlspecialchars($nombre) . "<br>";
        echo "<strong>Imagen:</strong><br>";
        echo "<img src='" . htmlspecialchars($imgDestino) . "' alt='Imagen subida' style='max-width:100%; height:auto;'><br>";
        echo "<strong>Expediente:</strong><br>";
        echo "<embed src='" . htmlspecialchars($expDestino) . "' type='application/pdf' width='600' height='400'><br>";
    }
}
?>