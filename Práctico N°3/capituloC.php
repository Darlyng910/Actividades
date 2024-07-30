<?php
    session_start();
    $errores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $campos = [
            'material_paredes',
            'paredes_revoque',
            'material_techo',
            'material_piso',
            'fuente_agua',
            'distribucion_agua',
            'energia_electrica',
            'combustible_cocinar',
            'disposicion_basura',
            'cuarto_cocina',
            'cuartos',
            'cuartos_dormir',
            'bano_letrina_',
            'desague_bano_tipo',
            'vivienda_tipo',
            'bicicleta',
            'motocicleta',
            'vehiculo',
            'carreta',
            'deslizador',
            'refrigerador',
            'microondas',
            'calefon',
            'aire_acondicionado',
            'lavadora',
            'radio_equipo_sonido',
            'televisor',
            'computadora',
            'telefono_celular',
            'internet_fijo',
            'internet_movil',
            'tv_cable_satelital',
            'telefonia_fija'
        ];

        $todos_completos = true;
        foreach ($campos as $campo) 
        {
            if (empty($_POST[$campo])) 
            {
                $todos_completos = false;
                break;
            }
        }

        if (isset($_POST['comentario'])) 
        {
            $comentario = $_POST['comentario'];
            if (strlen($comentario) > 500) 
            {
                $errores['comentario'] = 'Los comentarios no deben exceder los 500 caracteres.';
            } 
            elseif (!preg_match('/^[\p{L} \p{N}]+$/u', $comentario)) 
            {
                $errores['comentario'] = 'El comentario solo puede contener letras y espacios.';
            }
        }

        if (!$todos_completos) 
        {
            $errores['global'] = 'Por favor, complete todos los campos.';
        }

        if (empty($errores)) 
        {
            foreach ($campos as $campo) 
            {
                $datos[$campo] = $_POST[$campo] ?? 'No proporcionado';
            }
            $datos['comentario'] = $_POST['comentario'] ?? 'No proporcionado';
            $fecha = date('Y-m-d-H-i-s');
            $archivo = 'practica_3/datos-'.$fecha.'.txt';
            if (!file_exists('practica_3')) 
            {
                mkdir('practica_3', 0777, true);
            }
            $contenido_archivo = "";
            foreach ($datos as $campo => $valor) 
            {
                $valor = is_array($valor) ? implode(', ', $valor) : $valor;
                $contenido_archivo .= ucfirst(str_replace('_', ' ', $campo)) . ": " . htmlspecialchars($valor) . "\n";
            }
            file_put_contents($archivo, $contenido_archivo);
            $_SESSION['mensaje'] = 'Los datos se han guardado exitosamente.';
            $_SESSION['url'] = $archivo;
            header('Location: mostrar-capC.php');
            exit();
        } 
        else
        {
            $_SESSION['errores'] = $errores;
            $_SESSION['datos'] = $_POST;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    $material_paredes = [
        'ladrillo' => 'Ladrillo, bloque de cemento, hormigón',
        'adobe' => 'Adobe, tapial',
        'tabique' => 'Tabique, Quinche',
        'piedra' => 'Piedra',
        'madera' => 'Madera',
        'cana' => 'Caña, palma, tronco',
        'otro' => 'Otro'
    ];

    $revoque_options = [
        'si' => 'Sí',
        'no' => 'No'
    ];

    $material_techo = [
        'calamina' => 'Calamina o plancha',
        'teja' => 'Teja (de cemento, arcilla o fibrocemento)',
        'losa' => 'Losa de hormigón armado',
        'paja' => 'Paja, palma, caña, barro, jatata, motacú, chuchio',
        'otro' => 'Otro'
    ];

    $material_piso = [
        'tierra' => 'Tierra',
        'madera' => 'Tablón de madera',
        'machimbre' => 'Machimbre, parquet',
        'ceramica' => 'Cerámica, porcelanato',
        'cemento' => 'Cemento',
        'mosaico' => 'Mosaico, baldosa',
        'ladrillo' => 'Ladrillo',
        'flotante' => 'Piso flotante',
        'otro' => 'Otro'
    ];

    $fuente_agua = [
        'caneria' => 'Cañería de red',
        'pileta' => 'Pileta pública',
        'lluvia' => 'Cosecha de agua de lluvia',
        'pozo_con_bomba' => 'Pozo excavado o perforado con bomba',
        'pozo_sin_bomba' => 'Pozo no protegido o sin bomba',
        'manantial' => 'Manantial o vertiente protegida',
        'rio' => 'Río, acequía o vertiente no protegida',
        'aguatero' => 'Carro repartidor (aguatero)',
        'otro' => 'Otro'
    ];

    $distribucion_agua = [
        'caneria_interior' => 'Por cañería dentro de la vivienda',
        'caneria_exterior' => 'Por cañería fuera de la vivienda, pero dentro del lote o terreno',
        'no_distribuye' => 'No se distribuye por cañería'
    ];

    $energia_electrica = [
        'publico' => 'Servicio público de energía eléctrica',
        'generador' => 'Motor propio (generador)',
        'panel_solar' => 'Panel solar',
        'otro' => 'Otro',
        'no_tiene' => 'No tiene'
    ];

    $combustible_cocinar = [
        'gas_garrafa' => 'Gas en garrafa',
        'gas_cañeria' => 'Gas por cañería (a domicilio)',
        'leña' => 'Leña',
        'guano' => 'Guano, bosta o taquia',
        'electricidad' => 'Electricidad',
        'solar' => 'Energía solar (cocina solar)',
        'otro' => 'Otro',
        'no_cocina' => 'No cocina'
    ];

    $disposicion_basura = [
        'contenedor' => 'La depositan en el contenedor o basurero público',
        'carro' => 'La entregan al carro basurero (servicio público)',
        'terreno' => 'La botan en un terreno baldío o la calle',
        'rio' => 'La botan al río',
        'quema' => 'La queman',
        'entierra' => 'La entierran',
        'otra' => 'Otra forma'
    ];

    $cuarto_cocina_options = [
        'si' => 'Sí',
        'no' => 'No'
    ];

    $desague_bano = [
        'alcantarillado' => 'A la red de alcantarillado',
        'camara_septica' => 'A una cámara séptica',
        'pozo_ciego' => 'A un pozo ciego',
        'pozo_absorcion' => 'A un pozo de absorción',
        'superficie' => 'A la superficie (calle, quebrada o río)',
        'ecologico' => 'Es baño ecológico'
    ];

    $vivienda_tipo = [
        'pagada' => 'Propia y totalmente pagada',
        'pagando' => 'Propia y la están pagando',
        'prestada' => 'Prestada por pariente o amigos',
        'alquilada' => 'Alquilada',
        'anticretico' => 'En contrato anticrético',
        'mixto' => 'En contrato mixto (anticrético y alquiler)',
        'cedida' => 'Cedida por servicios',
        'otra' => 'Otra'
    ];

    $cuartos_options = [
        'uno' => 'Uno',
        'dos' => 'Dos',
        'tres' => 'Tres',
        'cuatro' => 'Cuatro',
        'cinco' => 'Cinco',
        'seis' => 'Seis',
        'siete' => 'Siete',
        'ocho_o_mas' => 'Ocho o más'
    ];

    $cuartos_dormir = [
        'uno' => 'Uno',
        'dos' => 'Dos',
        'tres' => 'Tres',
        'cuatro' => 'Cuatro',
        'cinco' => 'Cinco',
        'seis' => 'Seis',
        'siete' => 'Siete',
        'ocho_o_mas' => 'Ocho o más'
    ];

    $baño_letrina = [
        'solo_hogar' => 'Sí, usado solo por su hogar',
        'compartido' => 'Sí, compartido con otros hogares',
        'no_tiene' => 'No tiene'
    ];

    $si_no_opc = [
        'si' => 'Sí',
        'no' => 'No'
    ];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio N°2</title>
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
    <?php
        $datos = $_SESSION['datos'] ?? [];
        $errores = $_SESSION['errores'] ?? [];
        unset($_SESSION['datos'], $_SESSION['errores']);
    ?>
    <div class="container">
        <form action="" method="post">
            <div class="capitulo">
                <fieldset>
                    <legend>CAPÍTULO C: Características de la Vivienda con Personas Presentes</legend><br>
                    <?php if (!empty($errores['global'])): ?>
                        <p class="error"><?= htmlspecialchars($errores['global']) ?></p>
                    <?php endif; ?>
                     <h4>3. ¿Cuál es el material de construcción más utilizado en las paredes de esta vivienda?</h4>
                    <select name="material_paredes">
                        <?php foreach ($material_paredes as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>4. Las paredes interiores de esta vivienda, ¿tienen revoque?</h4>
                    <?php foreach ($revoque_options as $value => $label): ?>
                        <label for="paredes_revoque_<?= $value ?>">
                            <input type="radio" id="paredes_revoque_<?= $value ?>" name="paredes_revoque" value="<?= $value ?>">
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <!-- Pregunta 5 -->
                    <h4>5. ¿Cuál es el material de construcción más utilizado en el techo de la vivienda?</h4>
                    <select name="material_techo">
                        <?php foreach ($material_techo as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- Pregunta 6 -->
                    <h4>6. ¿Cuál es el material más utilizado en los pisos de esta vivienda?</h4>
                    <select name="material_piso">
                        <?php foreach ($material_piso as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>7. Principalmente, el agua que usan en la vivienda proviene de:</h4>
                    <select name="fuente_agua">
                        <?php foreach ($fuente_agua as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>8. El agua que usan en la vivienda se distribuye:</h4>
                    <select name="distribucion_agua">
                        <?php foreach ($distribucion_agua as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>9. ¿De dónde proviene la energía eléctrica que usan en la vivienda?</h4>
                    <select name="energia_electrica">
                        <?php foreach ($energia_electrica as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>10. ¿Cuál es el principal combustible o energía que utilizan para cocinar?</h4>
                    <select name="combustible_cocinar">
                        <?php foreach ($combustible_cocinar as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>11. Habitualmente, ¿qué hacen con la basura que generan?</h4>
                    <select name="disposicion_basura">
                        <?php foreach ($disposicion_basura as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>12. ¿Tienen un cuarto solo para cocinar?</h4>
                    <?php foreach ($cuarto_cocina_options as $value => $label): ?>
                        <label for="cuarto_cocina_<?= $value ?>">
                            <input type="radio" id="cuarto_cocina_<?= $value ?>" name="cuarto_cocina" value="<?= $value ?>">
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h4>13. ¿Cuántos cuartos o habitaciones ocupan, sin contar baño y cocina?</h4>
                    <select name="cuartos">
                        <?php foreach ($cuartos_options as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>14. De estos cuartos o habitaciones, ¿cuántos se utilizan solo para dormir?</h4>
                    <select name="cuartos_dormir">
                        <?php foreach ($cuartos_dormir as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>15. ¿Tienen baño o letrina?</h4>
                    <?php foreach ($baño_letrina as $value => $label): ?>
                        <label for="bano_letrina_<?= $value ?>">
                            <input type="radio" id="bano_letrina_<?= $value ?>" name="bano_letrina_" value="<?= $value ?>">
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h4>16. El baño o letrina tiene desagüe:</h4>
                    <select name="desague_bano_tipo">
                        <?php foreach ($desague_bano as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>17. La vivienda que ocupan es:</h4>
                    <select name="vivienda_tipo">
                        <?php foreach ($vivienda_tipo as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    <h4>18. Su hogar tiene:</h4>
                    <h5>¿Bicicleta?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="bicicleta[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['bicicleta']) && in_array($value, $_SESSION['form_data']['bicicleta'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Motocicleta o cuadratrack?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="motocicleta[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['motocicleta']) && in_array($value, $_SESSION['form_data']['motocicleta'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Vehículo automotor?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="vehiculo[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['vehiculo']) && in_array($value, $_SESSION['form_data']['vehiculo'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Carreta o carretón?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="carreta[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['carreta']) && in_array($value, $_SESSION['form_data']['carreta'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Deslizador, balsa, canoa o bote?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="deslizador[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['deslizador']) && in_array($value, $_SESSION['form_data']['deslizador'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Refrigerador o congeladora?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="refrigerador[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['refrigerador']) && in_array($value, $_SESSION['form_data']['refrigerador'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Microondas?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="microondas[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['microondas']) && in_array($value, $_SESSION['form_data']['microondas'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Calefón o termotanque?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="calefon[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['calefon']) && in_array($value, $_SESSION['form_data']['calefon'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Aire acondicionado?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="aire_acondicionado[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['aire_acondicionado']) && in_array($value, $_SESSION['form_data']['aire_acondicionado'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Lavadora de ropa?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="lavadora[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['lavadora']) && in_array($value, $_SESSION['form_data']['lavadora'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h4>19. Su hogar tiene:</h4>
                    <h5>¿Radio o equipo de sonido?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="radio_equipo_sonido[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['radio_equipo_sonido']) && in_array($value, $_SESSION['form_data']['radio_equipo_sonido'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Televisor?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="televisor[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['televisor']) && in_array($value, $_SESSION['form_data']['televisor'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Computadora, laptop o tablet?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="computadora[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['computadora']) && in_array($value, $_SESSION['form_data']['computadora'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Teléfono celular?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="telefono_celular[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['telefono_celular']) && in_array($value, $_SESSION['form_data']['telefono_celular'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Internet fijo en la vivienda?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="internet_fijo[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['internet_fijo']) && in_array($value, $_SESSION['form_data']['internet_fijo'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Internet móvil (megas o datos)?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="internet_movil[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['internet_movil']) && in_array($value, $_SESSION['form_data']['internet_movil'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Servicio de TV cable o satelital?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="tv_cable_satelital[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['tv_cable_satelital']) && in_array($value, $_SESSION['form_data']['tv_cable_satelital'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                    <h5>¿Servicio de telefonía fija?</h5>
                    <?php foreach ($si_no_opc as $value => $label): ?>
                        <label>
                            <input type="checkbox" name="telefonia_fija[]" value="<?= $value ?>" <?= (isset($_SESSION['form_data']['telefonia_fija']) && in_array($value, $_SESSION['form_data']['telefonia_fija'])) ? 'checked' : '' ?>>
                            <?= $label ?>
                        </label>
                    <?php endforeach; ?>
                </fieldset>
            </div>
            <div class="capitulo">
                <fieldset>
                    <h4>Comentarios Adicionales</h4>
                    <div class="field-group">
                        <textarea name="comentario" id=""></textarea>
                    </div>
                    <?php if (isset($errores['comentario'])): ?>
                            <div class="error"><?= $errores['comentario'] ?></div>
                        <?php endif; ?>
                </fieldset>
            </div>
            <center><button type="submit">Enviar</button></center>
        </form>
    </div>
</body>
</html>