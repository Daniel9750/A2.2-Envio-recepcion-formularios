<?php
    $valores_defecto = array (
        "name"        => "Daniel Sánchez González",
        "email"       => "danielsánchezgonzalez@alumno.ieselricon.com",
        "dni"         => "12345678A",
        "dispositivo" => "portatil",
        "genero"      => "otro",

        "android"     => "Teléfono móvil (Android)",
        "ios"         => "Teléfono móvil (iOS)",
        "portatil"    => "Ordenador Portátil",
        "sobremesa"   => "Ordenador de sobremesa",
        "hombre"      => "Hombre",
        "mujer"       => "Mujer",
        "otro"        => "Otro",
        "especificar" => "Prefiero no decirlo",
    );

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Daniel Sánchez González</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            color: rgb(255, 255, 255);
            background-color: black;
        }
        .container {
            width: 50%;
            margin: 2% auto;
            padding: 2%;
            background-color: rgb(0, 48, 110);
        }
        h1 {
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h4 {
            margin: 0;
            padding: 0;
            text-align: center;
        }
        label {
            width: 30%;
            font-weight: bold;
        }
        input {
            width: 70%;
            float: right;
        }
        p {
            margin: 0;
            padding: 0;
        }
        .enviar {
            width: 20%;
            float: none;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulario Daniel Sánchez González</h1>
        <br/>
        <form action="./recibe_datos.php" method="post">
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="<?php echo $valores_defecto["name"] ?>">
            </div>
            <br/>
            <div>
                <label for="email">Correo electrónico:</label>
                <input type="text" id="email" name="email" value="<?php echo $valores_defecto["email"] ?>">
            </div>
            <br/>
            <div>
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" value="<?php echo $valores_defecto["dni"] ?>">
            </div>
            <br/>

                <h4 text-align: center>Selecciona los dispositivos que posees:</h4>
                <br/>
                <div>
                    <input type="checkbox" id="android" value="android" name="device[]"

                        <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("android", $valores_defecto)            // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("android", $valores_defecto)              // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />

                    <label for="android" class="checkbox">Teléfono móvil (Android)</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="ios" value="ios" name="device[]"

                    <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("ios", $valores_defecto)            // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("ios", $valores_defecto)              // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />

                    <label for="ios" class="checkbox">Teléfono móvil (iOS)</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="portatil" value="portatil" name="device[]"

                    <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("portatil", $valores_defecto)            // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("portatil", $valores_defecto)              // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />


                    <label for="laptop" class="checkbox">Ordenador Portátil</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="sobremesa" value="sobremesa" name="device[]"

                    <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("sobremesa", $valores_defecto)            // Compruebo si el array contiene la clave del campo antes de chequear.
                                && 
                                in_array("sobremesa", $valores_defecto)              // Compruebo si el valor que nos llega es el mismo que el del campo.
                                &&
                                isset($valores_defecto)                                 // Compruebo que el array está declarado y no tiene un valor nulo.
                                &&
                                !empty($valores_defecto)                                // Compruebo que el array no está vacío.
                                &&
                                is_array($valores_defecto)                              // Compruebo que es un array con un conjunto de datos del usuario lo que nos llega.
                            )
                                echo "checked";
                        ?>
                    />


                    <label for="pc" class="checkbox">Ordenador de sobremesa</label>
                </div>
                <br/>
            <br/>
            <div class="genero">
                <p><b>Género:<span>&nbsp;</b></span></p>
                <select name="genero" title="elige_genero">
                    <option value="hombre"
                    <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("genero", $valores_defecto)    
                                && 
                                in_array("hombre", $valores_defecto)                 
                                &&
                                isset($valores_defecto)                                
                                &&
                                !empty($valores_defecto)                               
                                &&
                                is_array($valores_defecto)                             
                            )
                                echo "selected";
                        ?>
                    >Hombre</option>

                    <option value="mujer" 
                    <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("genero", $valores_defecto)     
                                && 
                                in_array("mujer", $valores_defecto)                 
                                &&
                                isset($valores_defecto)                                 
                                &&
                                !empty($valores_defecto)                                
                                &&
                                is_array($valores_defecto)                              
                            )
                                echo "selected";
                        ?>
                    >Mujer</option>

                    <option value="otro" 
                    
                    <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("genero", $valores_defecto)     
                                && 
                                in_array("otro", $valores_defecto)                 
                                &&
                                isset($valores_defecto)                                 
                                &&
                                !empty($valores_defecto)                                
                                &&
                                is_array($valores_defecto)                              
                            )
                                echo "selected";
                        ?>
                    
                    
                    >Otro</option>


                    <option value="especificar" 
                    
                    <?php
                            if 
                            (
                                // Condición.
                                array_key_exists("genero", $valores_defecto)    
                                && 
                                in_array("especificar", $valores_defecto)                
                                &&
                                isset($valores_defecto)                                 
                                &&
                                !empty($valores_defecto)                               
                                &&
                                is_array($valores_defecto)                             
                            )
                                echo "selected";
                        ?>
                       
                    >Prefiero no decirlo</option>
                </select>

            </div>
            <input type="hidden" id="postId" name="postId" value="Daniel" />
            <br/>
            <div style="display: flex;">
                <input type="submit" value="Enviar" class="enviar" style="color: white; background-color: rgb(15, 71, 175)">
            </div>
        </form>
    </div>
</body>
</html>
