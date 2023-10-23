<?php

    /**
     *  - Lee los datos almacenados en el fichero cristo_valores_defecto.txt
     *  - Almacena los datos del fichero en la memoria ram mediante el array $valores_defecto.
     */
    require_once "./controllers/cristo_lee_fichero.php";

    cristo_lee_fichero();

    /**
     *  - Contiene una función que comprueba si los datos que devuelve el fichero son los enviados anteriormente por el usuario. 
     */
    require_once "./validations/cristo_valida_fichero.php";

?>

<!DOCTYPE html>
<html lang="en">

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

                <!-- Input de texto -->
                <div>
                    <label for="name">Nombre:</label>
                    <input 
                        type="text"
                        id="name"
                        name="name"
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
                    <input 
                        type="submit" 
                        value="Enviar" 
                        class="enviar"
                    />
                </div>

            </form>

        </div>
        
    </body>

</html>
