<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título del documento -->
    <title>Formularios UT2</title>
    <!-- Estilos del formulario -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            width: 50%;
            margin: 2% auto;
            padding: 2%;
            border: 1px solid darkgray;
            background-color: lightgray;
        }
        h1 {
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
        .disponibilidad {
            display: flex;
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
        .checkbox {
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
            <!-- Input de texto -->
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="Cristo Rubén Pérez Suárez">
            </div>
            <br/>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" value="1234">
            </div>
            <br/>
            <div>
                <label for="repeatPassword">Confirme su contraseña:</label>
                <input type="password" id="repeatPassword" name="repeatPassword" value="1234">
            </div>
            <br/>
            <!-- Input checkbox -->
            <fieldset style="font-weight: normal !important;">
                <legend><b>Selecciona los puestos de interés:</b></legend>
                <br/>
                <div>
                    <input type="checkbox" id="desing" value="UX/UI Design" name="job[]" checked />
                    <label for="desing" class="checkbox">UX/UI Design</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="developer" value="Full-Stack Engineer" name="job[]" />
                    <label for="developer" class="checkbox">Full-Stack Engineer</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="devops" value="DevOps" name="job[]" />
                    <label for="devops" class="checkbox">DevOps</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="cloud" value="Cloud Solutions Architect" name="job[]" />
                    <label for="cloud" class="checkbox">Cloud Solutions Architect</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="data" value="Data Science" name="job[]" />
                    <label for="data" class="checkbox">Data Science</label>
                </div>
                <br/>
            </fieldset>
            <br/>
            <!-- Selector de opciones -->
            <div class="disponibilidad">
                <p><b>Disponibilidad:<span>&nbsp;</b></span></p>
                <select name="incorporation" title="Fecha de incorporación">
                    <option value="Inmediata">Inmediata</option>
                    <option value="15 días" selected>15 días</option>
                </select>
            </div>
            <input type="hidden" id="postId" name="postId" value="Cristo" />
            <br/>
            <!-- Botón que envía el formulario a ser validado -->
            <div style="display: flex;">
                <input type="submit" value="Enviar" class="enviar">
            </div>
        </form>
    </div>
</body>
</html>