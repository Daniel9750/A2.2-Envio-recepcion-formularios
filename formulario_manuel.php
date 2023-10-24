<?php

require_once "./controllers/manuel_lee_fichero.php";

manuel_lee_fichero();

require_once "./validations/manuel_valida_fichero.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título del documento -->
    <title>Formularios UT2</title>
    <!-- Estilos del formulario -->
    <link rel="stylesheet" href="./styles/manuel_estilo_formularios.css">
</head>
<body>
    <!-- Contenedor del formulario -->
    <div class="container">
        <!-- Título con el autor del código -->
        <h1>Manuel Castillo Casañas</h1>
        <br/>
        <!-- Formulario de petición de datos -->
        <form action="./recibe_datos.php" method="post">
            <!-- Input de texto -->
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="<?php if(valida("name", "Manuel", $valores_defecto)) echo $valores_defecto["name"]; ?>">
            </div>
            <br/>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" value="<?php if(valida("password", "12345", $valores_defecto)) echo $valores_defecto['password'] ?>">
            </div>
            <br/>
            <div>
                <label for="repeatPassword">Repita su contraseña:</label>
                <input type="password" id="repeatPassword" name="repeatPassword" value="<?php if (valida("repeatPassword", "12345", $valores_defecto)) echo $valores_defecto['repeatPassword'] ?>">
            </div>
            <br/>
            <!-- Input checkbox -->
            <fieldset style="font-weight: normal !important;">
                <legend><b>Selecciona el tipo de transporte:</b></legend>
                <br/>
                <div>
                    <input type="checkbox" id="aereo" value="aereo" <?php if(valida("aereo", "aereo", $valores_defecto)) echo "checked" ?> name="transp[]" />
                    <label for="aereo" class="checkbox">Aéreo</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="maritimo" value="maritimo" <?php if(valida("maritimo", "maritimo", $valores_defecto)) echo "checked" ?> name="transp[]"/>
                    <label for="maritimo" class="checkbox">Marítimo</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="terrestre" value="terrestre" <?php if(valida("terrestre", "terrestre", $valores_defecto)) echo "checked" ?> name="transp[]" />
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
                    <input type="radio" id="rotables" value="rotables" <?php if(valida("rotables", "rotables", $valores_defecto)) echo "checked" ?> name="spare[]"/>
                    <label for="rotables" class="radio">Rotables</label>
                </div>
                <br/>
                <div>
                    <input type="radio" id="consumibles" value="consumibles" <?php if(valida("consumibles", "consumibles", $valores_defecto)) echo "checked" ?> name="spare[]" />
                    <label for="consumibles" class="radio">Consumibles</label>
                </div>
                <br/>
                <div>
                    <input type="radio" id="utileria" value="utileria" <?php if(valida("utileria", "utileria", $valores_defecto)) echo "checked" ?> name="spare[]" />
                    <label for="utileria" class="radio">Utilería</label>
                </div>
                <br/>
            </fieldset>
            <br/>
            <!-- Selector de opciones -->
            <div class="entrega">
                <p><b>Entrega:<span>&nbsp;</b></span></p>
                <select name="entrega" title="Lugar de entrega">
                    <option value="Origen" <?php if(valida("entrega", "origen", $valores_defecto)) echo "selected" ?>>Origen</option>
                    <option value="Destino" <?php if(valida("entrega", "destino", $valores_defecto)) echo "selected" ?>>Destino</option>
                </select>
            </div>
            <input type="hidden" id="postId" name="postId" value="Manuel" />
            <br/>

            <!-- Input type file para documentos -->
            <div>
                    <label for="fichero1">Selecciona un documento: </label>
                    <input
                        id="fichero1" 
                        type="file" 
                        name="fichero1"
                        accept=".txt,.pdf,.docx,.xlsx,.pptx,.odt" 
                    />
                </div>

                <br/>

                <!-- Input type file para imágenes -->
                <div>
                    <label for="foto">Selecciona una foto: </label>
                    <input 
                        type="file" 
                        id="foto"
                        name="foto"
                        accept=".jpg,.gif,.png,.jfif"
                    />
                </div>


                <input 
                    type="hidden" 
                    id="postId" 
                    name="postId" 
                    value="Cristo" 
                />

                <br/><br/><br/>


            <!-- Botón que envía el formulario a ser validado -->
            <div style="display: flex;">
                <input type="submit" value="Enviar" class="enviar">
            </div>
        </form>
    </div>
</body>
</html>
