<?php
    if (isset($_POST['bandera']))
    {
        $archivo = $_FILES['file']['name'];
        $archivo = $_FILES['file']['type'];
        $archivo = $_FILES['file']['size'];
        echo "<h1>Datos Archivo</h1>";
        echo "<strong>Filename:</strong> ".$_FILES['file']['name']."<br>";
        echo "<strong>Type</strong>: ".$_FILES['file']['type']."<br>";
        echo "<strong>Size:</strong> ".$_FILES['file']['size']."<br>";
        echo "<strong>Temp Name:</strong> ".$_FILES['file']['tmp_name']."<br>";
        echo "<strong>Error:</strong> ".$_FILES['file']['error']."<br>";
    }
?>