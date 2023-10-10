<?php
    $valores_defecto = array(
        "name" => "Manuel",
        "password" => "Contraseña de manolo",
        "repitPassword" => "Contraseña repetida de manolo",
        "checkboxAereo" => "Aéreo",
        "checkboxMaritimo" => "Marítimo",
        "checkboxTerrestre" => "Terrestre",
        "radioRotables" => "Rotables",
        "radioConsumibles" => "Consumibles",
        "radioUtileria" => "Utilería",
        "opcionOrigen" => "Origen",
        "opcionDestino" => "Destino",
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título del documento -->
    <title>Formularios UT2</title>
    <!-- Estilos del formulario -->
    <style>
        /* Estilo para el cuerpo de la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        /* Estilo para el contenedor del formulario */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        /* Estilo para el título */
        h1 {
            text-align: center;
            color: #333;
        }
        /* Estilo para los campos de entrada de texto */
        input[type="text"],
        input[type="password"],
        select {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        /* Estilo para los checkbox y radio buttons */
        .checkbox,
        .radio {
            font-weight: bold;
        }
        /* Estilo para los botones */
        .enviar {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        /* Estilo para los botones al pasar el cursor */
        .enviar:hover {
            background-color: #0056b3;
        }
        /* Estilo para los fieldsets */
        fieldset {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }
        /* Estilo para los legends */
        legend {
            font-weight: bold;
        }
        /* Estilo para el párrafo "Entrega" */
        .entrega p {
            font-weight: bold;
        }
        /* Estilo para el select "Entrega" */
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        /* Estilo para los elementos ocultos (hidden) */
        input[type="hidden"] {
            display: none;
        }
        /* Estilo para los saltos de línea */
        br {
            clear: both;
        }
    </style>
</head>
<body>
    <!-- Contenedor del formulario -->
    <div class="container">
        <!-- Título con el autor del código -->
        <h1>Manuel Castillo Casañas</h1>
        <br/>
        <!-- Formulario de petición laboral -->
        <form action="./recibe_datos.php" method="post">
            <!-- Input de texto -->
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="<?php echo $valores_defecto['name'] ?>">
            </div>
            <br/>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" value="<?php echo $valores_defecto['password'] ?>">
            </div>
            <br/>
            <div>
                <label for="repeatPassword">Repita su contraseña:</label>
                <input type="password" id="repeatPassword" name="repeatPassword" value="<?php echo $valores_defecto['repitPassword'] ?>">
            </div>
            <br/>
            <!-- Input checkbox -->
            <fieldset style="font-weight: normal !important;">
                <legend><b>Selecciona el tipo de transporte:</b></legend>
                <br/>
                <div>
                    <input type="checkbox" id="aereo" value="<?php echo $valores_defecto['checkboxAereo'] ?>" name="transp[]" checked />
                    <label for="aereo" class="checkbox">Aéreo</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="maritimo" value="<?php echo $valores_defecto['checkboxMaritimo'] ?>" name="transp[]" />
                    <label for="maritimo" class="checkbox">Marítimo</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="terrestre" value="<?php echo $valores_defecto['checkboxTerrestre'] ?>" name="transp[]" />
                    <label for="terrestre" class="checkbox">Terrestre</label>
                </div>
                <br/>
            </fieldset>
            <br>
            <!-- Input radio -->
            <fieldset style="font-weight: normal !important;">
                <legend><b>Selecciona el tipo de repuesto:</b></legend>
                <br/>
                <div>
                    <input type="radio" id="rotables" value="<?php echo $valores_defecto['radioRotables'] ?>" name="spare[]" checked />
                    <label for="rotables" class="radio">Rotables</label>
                </div>
                <br/>
                <div>
                    <input type="radio" id="consumibles" value="<?php echo $valores_defecto['radioConsumibles'] ?>" name="spare[]" />
                    <label for="consumibles" class="radio">Consumibles</label>
                </div>
                <br/>
                <div>
                    <input type="radio" id="utileria" value="<?php echo $valores_defecto['radioUtileria'] ?>" name="spare[]" />
                    <label for="utileria" class="radio">Utilería</label>
                </div>
                <br/>
            </fieldset>
            <br/>
            <!-- Selector de opciones -->
            <div class="entrega">
                <p><b>Entrega:<span>&nbsp;</b></span></p>
                <select name="entrega" title="Lugar de entrega">
                    <option value="<?php echo $valores_defecto['opcionOrigen'] ?>">Origen</option>
                    <option value="<?php echo $valores_defecto['opcionDestino'] ?>" selected>Destino</option>
                </select>
            </div>
            <input type="hidden" id="postId" name="postId" value="Manuel" />
            <br/>
            <!-- Botón que envía el formulario a ser validado -->
            <div style="display: flex;">
                <input type="submit" value="Enviar" class="enviar">
            </div>
        </form>
    </div>
</body>
</html>
