<?php
    require_once "./controllers/manuel_lee_fichero.php";
    $valores_defecto = manuel_lee_fichero();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título del documento -->
    <title>Formularios UT2</title>
    <link rel="stylesheet" href="./styles/cristo_estilo_formulario.css">
</head>
<body>
    <!-- Contenedor del formulario -->
    <div class="container">
        <!-- Título con el autor del código -->
        <h1>Manuel Castillo Casañas</h1>
        <br/>
        <!-- Formulario de petición de datos -->
        <form action="./controllers/recibe_datos.php" method="post">
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
                <input type="password" id="repeatPassword" name="repeatPassword" value="<?php echo $valores_defecto['repeatPassword'] ?>">
            </div>
            <br/>
            <!-- Input checkbox -->
            <fieldset style="font-weight: normal !important;">
                <legend><b>Selecciona el tipo de transporte:</b></legend>
                <br/>
                <div>
                    <input type="checkbox" id="aereo" value="aereo" <?php if($valores_defecto['checkTransp'] == "aereo") echo "checked" ?> name="transp[]" />
                    <label for="aereo" class="checkbox">Aéreo</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="maritimo" value="maritimo" <?php if($valores_defecto['checkTransp'] == "maritimo") echo "checked" ?> name="transp[]"/>
                    <label for="maritimo" class="checkbox">Marítimo</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="terrestre" value="terrestre" <?php if($valores_defecto['checkTransp'] == "terrestre") echo "checked" ?> name="transp[]" />
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
                    <input type="radio" id="rotables" value="rotables" <?php if($valores_defecto['radioBut'] === "rotables") echo "checked" ?> name="spare[]"/>
                    <label for="rotables" class="radio">Rotables</label>
                </div>
                <br/>
                <div>
                    <input type="radio" id="consumibles" value="consumibles" <?php if($valores_defecto['radioBut'] === "consumibles") echo "checked" ?> name="spare[]" />
                    <label for="consumibles" class="radio">Consumibles</label>
                </div>
                <br/>
                <div>
                    <input type="radio" id="utileria" value="utileria" <?php if($valores_defecto['radioBut'] === "utileria") echo "checked" ?> name="spare[]" />
                    <label for="utileria" class="radio">Utilería</label>
                </div>
                <br/>
            </fieldset>
            <br/>
            <!-- Selector de opciones -->
            <div class="entrega">
                <p><b>Entrega:<span>&nbsp;</b></span></p>
                <select name="entrega" title="Lugar de entrega">
                    <option value="Origen" <?php if($valores_defecto['entregaSelect'] === "origen") echo "selected" ?>>Origen</option>
                    <option value="Destino" <?php if($valores_defecto['entregaSelect'] === "destino") echo "selected" ?>>Destino</option>
                </select>
            </div>
            <br/>

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
