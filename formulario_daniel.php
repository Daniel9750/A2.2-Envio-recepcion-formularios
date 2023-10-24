<?php

    require_once "./controllers/daniel_lee_fichero.php";

    require_once "./validations/daniel_valida_fichero.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Daniel Sánchez González</title>
        <link rel="stylesheet" href="styles/daniel_estilos_formulario.css">
    </head>

    <body>
        <div class="container">

            <h1>Daniel Sánchez González</h1>

            <br/>

            <form 
                action="./controllers/recibe_datos.php" 
                method="post" 
                enctype="multipart/form-data"
            >

                <div>
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name"
                    value="<?php if (response_validation("name", "Daniel Sánchez González", 
                    $valores_defecto)) echo $valores_defecto["name"]; ?>">
                </div>
                <br/>
                <div>
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email"
                    value="<?php if (response_validation("email", 
                    "danielsanchezgonzalez@alumno.ieselricon.com", $valores_defecto))
                    echo $valores_defecto["email"]; ?>">
                </div>
                <br/>
                <div>
                    <label for="dni">DNI:</label>
                    <input type="dni" id="dni" name="dni"
                    value="<?php if (response_validation("dni", "12345678A", $valores_defecto))
                    echo $valores_defecto["dni"]; ?>"> 
                </div>




                <br/>

               
                <h4 text-align: center>Selecciona los dispositivos que posees:</h4>
                    <br/>
                    <div>
                        <input type="checkbox" id="android" value="android" name="device[]"
                        <?php if (response_validation("android", "android", $valores_defecto)) echo "checked";?>
                        />
                        <label for="android" class="checkbox">Teléfono móvil (Android)</label>
                    </div>
                    <br/>
                    <div>
                        <input  type="checkbox" id="ios" value="ios" name="device[]"
                        <?php if (response_validation("ios", "ios", $valores_defecto)) echo "checked"; ?>
                        />
                        <label for="ios" class="checkbox">Teléfono móvil (iOS)</label>
                    </div>
                    <br/>
                    <div>
                        <input type="checkbox" id="portatil" value="portatil" name="device[]"
                        <?php if (response_validation("portatil", "portatil", $valores_defecto)) echo "checked"; ?>
                        />
                        <label for="portatil" class="checkbox">Ordenador portátil</label>
                    </div>
                    <br/>
                    <div>
                        <input type="checkbox" id="sobremesa" value="sobremesa" name="device[]"
                        <?php if (response_validation("sobremesa", "sobremesa", $valores_defecto)) echo "checked"; ?>
                        />
                        <label for="sobremesa" class="checkbox">Ordenador de sobremesa</label>
                    </div>
                    <br/>
               

                <br/>


                <div class="genero">
                    <p><b>Genero:<span>&nbsp;</b></span></p>
                    <select 
                        name="genero" 
                        title="elige_genero"
                    >
                        <option 
                            value="hombre"
                            <?php if (response_validation("genero", "hombre", $valores_defecto)) echo "checked"; ?>
                        >Hombre
                        </option>
                        <option 
                            value="mujer" 
                            <?php if (response_validation("genero", "mujer", $valores_defecto)) echo "checked"; ?>
                        >Mujer
                        </option>
                        <option 
                            value="otro" 
                            <?php if (response_validation("genero", "otro", $valores_defecto)) echo "checked"; ?>
                        >Otro
                        </option>
                        <option 
                            value="especificar" 
                            <?php if (response_validation("genero", "especificar", $valores_defecto)) echo "checked"; ?>
                        >Prefiero no decirlo
                        </option>
                    </select>
                </div>

                <br/>

                <div>
                    <label for="foto">Suba una foto: </label>
                    <input type="file" name="foto" id="foto" accept=".jpg,.gif,.png,.jfif"/>
                </div>

                <br/>

                <div>
                    <label for="fichero1">Suba un documento: </label>
                    <input type="file" name="fichero1" id="fichero1" accept=".txt,.pdf,.docx,.xlsx,.pptx,.odt"/>
                </div>


                <input value="Daniel" type="hidden" name="postId" id="postId"/>

                <br/><br/>

                <div style="display: flex;">
                <input type="submit" value="Enviar" class="enviar" style="color: white; background-color: rgb(15, 71, 175)">
                </div>

            </form>

        </div>
        
    </body>

</html>