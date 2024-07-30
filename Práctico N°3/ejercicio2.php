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
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: Century, sans-serif;
        }

        button:hover {
            background-color: #0056b3;
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
        <form action="" method="post">
            <div class="capitulo">
                <fieldset>
                    <legend>CAPÍTULO A: Ubicación de la Vivienda (Ocupada Y Desocupada)</legend>
                    <h4>Copie del Mapa:</h4>
                    <div class="field-group">
                        <div>
                            <label for="segmento">1. Segmento</label>
                            <input type="text" id="segmento" name="segmento" required>
                        </div>
                        <div>
                            <label for="manzana">2. Manzana</label>
                            <input type="text" id="manzana" name="manzana" required>
                        </div>
                        <div>
                            <label for="predio">3. Nro. de Predio</label>
                            <input type="text" id="predio" name="predio" required>
                        </div>
                    </div>
                    <h4>Registro del Predio:</h4>
                    <div class="field-group">
                        <div>
                            <label for="total-viviendas">4. Total de Viviendas en el Predio</label>
                            <input type="text" id="total-viviendas" name="total-viviendas" required>
                        </div>
                        <div>
                            <label for="nro-vivienda">5. Nro. de Vivienda</label>
                            <input type="text" id="nro-vivienda" name="nro-vivienda" required>
                        </div>
                    </div>
                    <h4>Complete según corresponda:</h4>
                    <label for="ciudad-comunidad">6. Ciudad o Comunidad</label>
                    <input type="text" id="ciudad-comunidad" name="ciudad-comunidad" class="short-input" required>

                    <label for="calle">7. Calle, avenida o carretera</label>
                    <input type="text" id="calle" name="calle" class="short-input" required>
                    <div class="field-group">
                        <div>
                            <label for="nro-puerta">8. Nro. de Puerta</label>
                            <input type="text" id="nro-puerta" name="nro-puerta" required>
                        </div>
                        <div>
                            <label for="planta">9. Planta, piso o nivel</label>
                            <input type="text" id="planta" name="planta" required>
                        </div>
                        <div>
                            <label for="nro-depto">10. Nro. Depto.</label>
                            <input type="text" id="nro-depto" name="nro-depto" required>
                        </div>
                    </div>
                    <div class="field-group">
                        <div>
                            <label for="nombre-edificio">11. Nombre del edificio, condominio, torre o conventillo</label>
                            <input type="text" id="nombre-edificio" name="nombre-edificio" required>
                        </div>
                        <div>
                            <label for="bloque">12. Bloque</label>
                            <input type="text" id="bloque" name="bloque" required>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="capitulo">
                <fieldset>
                    <legend>CAPÍTULO B: Tipo de Vivienda</legend>
                    <h4>2. La vivienda es:</h4>
                    <div class="radio-group">
                        <label for="vivienda-particular">
                            <input type="radio" id="vivienda-particular" name="tipo-vivienda" value="particular" <?php echo (isset($_POST['tipo-vivienda']) && $_POST['tipo-vivienda'] == 'particular') ? 'checked' : ''; ?> onchange="this.form.submit()">
                            A. Vivienda Particular
                        </label>
                        <label for="vivienda-colectiva">
                            <input type="radio" id="vivienda-colectiva" name="tipo-vivienda" value="colectiva" <?php echo (isset($_POST['tipo-vivienda']) && $_POST['tipo-vivienda'] == 'colectiva') ? 'checked' : ''; ?> onchange="this.form.submit()">
                            B. Vivienda Colectiva
                        </label>
                        <label for="sin-vivienda">
                            <input type="radio" id="sin-vivienda" name="tipo-vivienda" value="sin-vivienda" <?php echo (isset($_POST['tipo-vivienda']) && $_POST['tipo-vivienda'] == 'sin-vivienda') ? 'checked' : ''; ?> onchange="this.form.submit()">
                            C. Sin Vivienda
                        </label>
                    </div>
                    <div>
                        <label for="detalle-vivienda">Detalle de Vivienda</label>
                        <select id="detalle-vivienda" name="detalle-vivienda">
                            <?php
                            $opciones = [];
                            if (isset($_POST['tipo-vivienda'])) {
                                switch ($_POST['tipo-vivienda']) {
                                    case 'particular':
                                        $opciones = ['Casa', 'Choza, Pahuichi', 'Departamento', 'Cuarto(s) o habitación(es) suelta(s)', 'Vivienda improvisada o vivienda móvil', 'Establecimiento no destinado para vivienda'];
                                        break;
                                    case 'colectiva':
                                        $opciones = ['Hotel, hostal, residencial o alojamiento', 'Hospital o clínica con internación', 'Cuartel o establecimiento militar o policial', 'Residencia u otro de adultos mayores', 'Albergue de niñas(os) y adolescentes', 'Recinto penitenciario o de reintegración', 'Campamento de trabajo', 'Otra (Instituto de rehabilitación, convento)'];
                                        break;
                                    case 'sin-vivienda':
                                        $opciones = ['Persona que vive en la calle', 'En tránsito: Terminal, aeropuerto, puerto u otro'];
                                        break;
                                }
                            }
                            foreach ($opciones as $opcion) {
                                echo "<option value=\"$opcion\" " . (isset($_POST['detalle-vivienda']) && $_POST['detalle-vivienda'] == $opcion ? 'selected' : '') . ">$opcion</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <h4>2. La vivienda está:</h4>
                    <div class="radio-group">
                        <label for="ocupada">
                            <input type="radio" id="ocupada" name="estado-vivienda" value="ocupada" <?php echo (isset($_POST['estado-vivienda']) && $_POST['estado-vivienda'] == 'ocupada') ? 'checked' : ''; ?> onchange="this.form.submit()">
                            A. Ocupada
                        </label>
                        <label for="desocupada">
                            <input type="radio" id="desocupada" name="estado-vivienda" value="desocupada" <?php echo (isset($_POST['estado-vivienda']) && $_POST['estado-vivienda'] == 'desocupada') ? 'checked' : ''; ?> onchange="this.form.submit()">
                            B. Desocupada
                        </label>
                    </div>
                    <div>
                        <label for="detalle-estado-vivienda">Detalle del Estado de Vivienda</label>
                        <select id="detalle-estado-vivienda" name="detalle-estado-vivienda">
                            <?php
                            $estadoOpciones = [];
                            if (isset($_POST['estado-vivienda'])) {
                                switch ($_POST['estado-vivienda']) {
                                    case 'ocupada':
                                        $estadoOpciones = ['Con personas presentes', 'Con personas temporalmente ausentes'];
                                        break;
                                    case 'desocupada':
                                        $estadoOpciones = ['Para alquilar y/o vender', 'Terminándose de construir o reparar', 'Abandonada'];
                                        break;
                                }
                            }
                            foreach ($estadoOpciones as $opcion) {
                                echo "<option value=\"$opcion\" " . (isset($_POST['detalle-estado-vivienda']) && $_POST['detalle-estado-vivienda'] == $opcion ? 'selected' : '') . ">$opcion</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                    <h4>3. Imágen de la Vivienda:</h4>
                    <input name="file" type="file"/>
                    </div>
                </fieldset>
            </div>
            <?php
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

                $vivienda = [
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
                
                $desague_bano_tipo = [
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
                $si_no_opc = [
                    'si' => 'Sí',
                    'no' => 'No'
                ];
            ?>
            <div class="capitulo">
                <fieldset>
                    <legend>CAPÍTULO C: Características de la Vivienda con Personas Presentes</legend>
                     <!-- Pregunta 3 -->
                     <h4>3. ¿Cuál es el material de construcción más utilizado en las paredes de esta vivienda?</h4>
                    <select name="material_paredes">
                        <?php foreach ($material_paredes as $value => $label): ?>
                            <option value="<?= $value ?>"><?= $label ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                    <!-- Pregunta 4 -->
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
                    <div class="radio-group">
                        <?php foreach ($baño_letrina as $value => $label): ?>
                            <label for="bano_letrina_<?= $value ?>">
                                <input type="radio" id="bano_letrina_<?= $value ?>" name="bano_letrina" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <h4>16. El baño o letrina tiene desagüe:</h4>
                    <select name="desague_bano_tipo">
                        <?php foreach ($desague_bano_tipo as $value => $label): ?>
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
                                <input type="radio" name="bicicleta" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Motocicleta o cuadratrack?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="motocicleta" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Vehículo automotor?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="vehiculo" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Carreta o carretón?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="carreta" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Deslizador, balsa, canoa o bote?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="deslizador" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Refrigerador o congeladora?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="refrigerador" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Microondas?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="microondas" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Calefón o termotanque?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="calefon" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Aire acondicionado?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="aire_acondicionado" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Lavadora de ropa?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="lavadora" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                    <h4>19. Su hogar tiene:</h4>
                        <h5>¿Radio o equipo de sonido?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="radio_equipo_sonido" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Televisor?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="televisor" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Computadora, laptop o tablet?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="computadora" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Teléfono celular?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="telefono_celular" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Internet fijo en la vivienda?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="internet_fijo" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Internet móvil (megas o datos)?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="internet_movil" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Servicio de TV cable o satelital?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="tv_cable_satelital" value="<?= $value ?>">
                                <?= $label ?>
                            </label>
                        <?php endforeach; ?>
                        <h5>¿Servicio de telefonía fija?</h5>
                        <?php foreach ($si_no_opc as $value => $label): ?>
                            <label>
                                <input type="radio" name="telefonia_fija" value="<?= $value ?>">
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
                </fieldset>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>