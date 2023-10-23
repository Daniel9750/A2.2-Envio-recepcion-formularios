<?php
<<<<<<< HEAD

    /**
     *  - Lee los datos almacenados en el fichero cristo_valores_defecto.txt
     *  - Almacena los datos del fichero en la memoria ram mediante el array $valores_defecto.
     */
    require_once "./controllers/cristo_lee_fichero.php";

    /**
     *  - Contiene una función que comprueba si los datos que devuelve el fichero son los enviados anteriormente por el usuario. 
     */
    require_once "./validations/cristo_valida_fichero.php";

=======
    // Paso 1) Declarar $valores_defecto como una variable global.
    global $valores_defecto;

    // Paso 2) Almacenar la ruta del fichero.
    $ruta = "cristo_valores_defecto.txt";
    
    // Paso 3.A) Comprobar que el fichero está dentro de la ruta.
    if (file_exists($ruta))
    {
        // Paso 4) Abrir el fichero en modo lectura porque existe en la ruta.
        $fichero = fopen($ruta, "r");
        
        // Paso 5.A) Comprobar que el fichero se abrió correctamente.
        /**
         *  - if ($fichero): No se puede comprobar directamente porque fopen devuelve un resource.
         *  - Hay que comprobar si el valor es diferente de falso, que significa que no lo pudo abrir.
         */
        if ($fichero !== false)
        {
            // Paso 6) Creamos el array asociativo que va a guardar los datos del fichero.
            $valores_defecto = array();
            
            // Paso 7) Leemos las líneas del fichero.
            while ($linea = fgets($fichero))
            {
                // Paso 8) Separamos la clave del valor.
                /**
                 *  - Al no indicar clave, la próxima línea lo sobreescribe.
                 *  - Seguirá siendo una variable convirtiéndose todo el rato en arrays.
                 */
                $parts = explode(": ", $linea);
                
                // Paso 9.A) Verificamos que el array contiene, 3 pociones o más: Clave, Valor y Null.
                if (count($parts) >= 2) 
                {
                    $_clave = trim($parts[0]);                                 // Almacenamos el primer valor del array que siempre será una clave.
                    $_valor = trim($parts[1]);                                 // Almacenamos el segundo valor del array que siempre será el valor.
                    $valores_defecto[$_clave] = str_replace(",", "", $_valor); // Añadimos al array asociativo la clave y el valor sin coma.
                }

                // Paso 9.B) Si no se cumple el formato en una línea no lo guardamos y indicamos el error de la línea.
                else 
                {
                    echo "La siguiente línea: '" . $linea . "' no cumple el formato correcto";
                }
            }

            // Paso 10) Cerramos el fichero después de usarlo para que no consuma memoria.
            fclose($fichero);
        }

        // Paso 5.B) Si el archivo no se puede abrir, lo indicamos y finalizamos la ejecución.
        else 
        {
            echo "No se puede abrir el archivo '" . $ruta . "'<br>";
        }
    }

    // Paso 3.B) Lanzar un mensaje de error porque el fichero no existe en la ruta.
    else 
    {
        echo "El archivo '" . $ruta . "' no existe en el directorio actual. <br/>";
    }

    function response_validation($_key, $_value, $_array)
    {
        if 
        (   
            isset($_array)                                 
            &&
            !empty($_array)                                
            &&
            is_array($_array)
            &&
            array_key_exists($_key, $_array)
            && 
            $_array[$_key] === $_value
        )
            return true;
    }
>>>>>>> main
?>

<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Título del documento -->
        <title>Formularios UT2</title>

        <!-- Estilos del formulario -->
        <link rel="stylesheet" href="./styles/cristo_estilo_formulario.css">
    </head>

    <body>
        <!-- Contenedor del formulario -->
        <div class="container">

            <!-- Título con el autor del código -->
            <h1>Cristo Rubén Pérez Suárez</h1>

            <br/>

            <!-- Formulario de petición laboral -->
            <!-- Añadimos el parámetro enctype="multipart/form-data" para que se puedan enviar archivos y no solo texto -->
            <!-- El método debe ser de tipo post cuando se envían archivos -->
            <form 
                action="./controllers/recibe_datos.php" 
                method="post" 
                enctype="multipart/form-data"
            >

=======
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Título del documento -->
        <title>Formularios UT2</title>
        <!-- Estilos del formulario -->
        <style>
            body 
            {
                margin: 0;
                padding: 0;
                font-family: Arial, Helvetica, sans-serif;
            }
            .container 
            {
                width: 50%;
                margin: 2% auto;
                padding: 2%;
                border: 1px solid darkgray;
                background-color: lightgray;
            }
            h1 
            {
                margin: 0;
                padding: 0;
                text-align: center;
            }
            label 
            {
                width: 30%;
                font-weight: bold;
            }
            input 
            {
                width: 70%;
                float: right;
            }
            .disponibilidad 
            {
                display: flex;
            }
            p 
            {
                margin: 0;
                padding: 0;
            }
            .enviar 
            {
                width: 20%;
                float: none;
                margin: 0 auto;
            }
            .checkbox, .radio 
            {
                font-weight: normal !important;
            }
        </style>
    </head>
    <body>
        <!-- Contenedor del formulario -->
        <div class="container">
            <!-- Título con el autor del código -->
            <h1>Cristo Rubén Pérez Suárez</h1>
            <br/>
            <!-- Formulario de petición laboral -->
            <form action="./recibe_datos.php" method="post">
>>>>>>> main
                <!-- Input de texto -->
                <div>
                    <label for="name">Nombre:</label>
                    <input 
<<<<<<< HEAD
                        type="text"
                        id="name"
                        name="name"
=======
                        type="text" 
                        id="name" 
                        name="name" 
>>>>>>> main
                        value="<?php if (response_validation("name", "Cristo Rubén Pérez Suárez", $valores_defecto)) echo $valores_defecto["name"]; ?>">
                </div>
                <br/>
                <div>
                    <label for="password">Contraseña:</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        value="<?php if (response_validation("password", "asdf76asd7f6", $valores_defecto)) echo $valores_defecto["password"]; ?>">
                </div>
                <br/>
                <div>
                    <label for="repeatPassword">Confirme su contraseña:</label>
                    <input 
                        type="password" 
                        id="repeatPassword" 
                        name="repeatPassword"
                        value="<?php if (response_validation("repeatPassword", "asdf76asd7f6", $valores_defecto)) echo $valores_defecto["repeatPassword"]; ?>"> 
                </div>

                <br/>
<<<<<<< HEAD

=======
>>>>>>> main
                <!-- Input checkbox -->
                <fieldset style="font-weight: normal !important;">
                    <legend><b>Selecciona los puestos de interés:</b></legend>
                    <br/>
                    <div>
                        <input
                            type="checkbox"
                            id="desing"
                            value="UX/UI Design"
                            name="job[]" 
                            <?php if (response_validation("desing", "UX/UI Design", $valores_defecto)) echo "checked"; ?>
                        />
                        <label for="desing" class="checkbox">UX/UI Design</label>
                    </div>
                    <br/>
                    <div>
                        <input 
                            type="checkbox"
                            id="developer"
                            value="Full-Stack Engineer"
                            name="job[]" 
                            <?php if (response_validation("developer", "Full-Stack Engineer", $valores_defecto)) echo "checked"; ?>
                        />
                        <label for="developer" class="checkbox">Full-Stack Engineer</label>
                    </div>
                    <br/>
                    <div>
                        <input 
                            type="checkbox" 
                            id="devops" 
                            value="DevOps" 
                            name="job[]"
                            <?php if (response_validation("devops", "DevOps", $valores_defecto)) echo "checked"; ?>
                        />
                        <label for="devops" class="checkbox">DevOps</label>
                    </div>
                    <br/>
                    <div>
                        <input 
                            type="checkbox"
                            id="cloud"
                            value="Cloud Solutions Architect"
                            name="job[]"
                            <?php if (response_validation("cloud", "Cloud Solutions Architect", $valores_defecto)) echo "checked"; ?>
                        />
                        <label for="cloud" class="checkbox">Cloud Solutions Architect</label>
                    </div>
                    <br/>
                    <div>
                        <input 
                            type="checkbox" 
                            id="data" 
                            value="Data Science" 
                            name="job[]"
                            <?php if (response_validation("data", "Data Science", $valores_defecto)) echo "checked"; ?>
                        />
                        <label for="data" class="checkbox">Data Science</label>
                    </div>
                    <br/>
                </fieldset>
<<<<<<< HEAD

                <br/>

                <!-- Input type radio -->
                <div>
                    <fieldset>
                        <legend><b>Selecciona un proyecto:</b></legend>
                            <br/>
                            <div>
                                <input 
                                    type="radio" 
                                    id="ecommerce" 
                                    name="proyect" 
                                    value="ecommerce"
                                    <?php if (response_validation("ecommerce", "E-commerce", $valores_defecto)) echo "checked"; ?>
                                />
                                <label for="ecommerce" class="radio">E-commerce</label>
                            </div>
                            <br/>
                            <div>
                                <input 
                                    type="radio" 
                                    id="i+d" 
                                    name="proyect" 
                                    value="i+d"
                                    <?php if (response_validation("i+d", "I+D", $valores_defecto)) echo "checked"; ?>
                                />
                                <label for="i+d" class="radio">I+D</label>
                            </div>
                            <br/>
                    </fieldset>
                </div>

                <br/>

=======
                <br/>
                <!-- Input type radio -->
                <div>
                    <fieldset>
                    <legend><b>Selecciona un proyecto:</b></legend>
                        <br/>
                        <div>
                            <input 
                                type="radio" 
                                id="ecommerce" 
                                name="proyect" 
                                value="ecommerce"
                                <?php if (response_validation("ecommerce", "E-commerce", $valores_defecto)) echo "checked"; ?>
                            />
                            <label for="ecommerce" class="radio">E-commerce</label>
                        </div>
                        <br/>
                        <div>
                            <input 
                                type="radio" 
                                id="i+d" 
                                name="proyect" 
                                value="i+d"
                                <?php if (response_validation("i+d", "I+D", $valores_defecto)) echo "checked"; ?>
                            />
                            <label for="i+d" class="radio">I+D</label>
                        </div>
                        <br/>
                    </fieldset>
                </div>
                <br/>
>>>>>>> main
                <!-- Selector de opciones -->
                <div class="disponibilidad">
                    <p><b>Disponibilidad:<span>&nbsp;</b></span></p>
                    <select 
                        name="incorporation" 
                        title="Fecha de incorporación"
                    >
                        <option 
                            value="Inmediata"
                            <?php if (response_validation("incorporation", "Inmediata", $valores_defecto)) echo "checked"; ?>
                        >
                            Inmediata
                        </option>
                        <option 
                            value="15 días" 
                            <?php if (response_validation("incorporation", "15 días", $valores_defecto)) echo "checked"; ?>
                        >
                            15 días
                        </option>
                    </select>
                </div>
<<<<<<< HEAD

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


=======
>>>>>>> main
                <input 
                    type="hidden" 
                    id="postId" 
                    name="postId" 
                    value="Cristo" 
                />
<<<<<<< HEAD

                <br/><br/><br/>

=======
                <br/>
>>>>>>> main
                <!-- Botón que envía el formulario a ser validado -->
                <div style="display: flex;">
                    <input 
                        type="submit" 
                        value="Enviar" 
                        class="enviar"
                    />
                </div>
<<<<<<< HEAD

            </form>

        </div>
        
    </body>

=======
            </form>
        </div>
    </body>
>>>>>>> main
</html>
