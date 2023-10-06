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
                <input type="text" id="name" name="name" value="Daniel Sánchez González">
            </div>
            <br/>
            <div>
                <label for="email">Correo electrónico:</label>
                <input type="text" id="email" name="email" value="danielsanchezgonzalez@alumno.ieselrincon.es">
            </div>
            <br/>
            <div>
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" value="12345678A">
            </div>
            <br/>

                <h4 text-align: center>Selecciona los dispositivos que posees:</h4>
                <br/>
                <div>
                    <input type="checkbox" id="android" value="Teléfono móvil (Android)" name="device[]" checked />
                    <label for="android" class="checkbox">Teléfono móvil (Android)</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="ios" value="Teléfono móvil (iOS)" name="device[]" />
                    <label for="ios" class="checkbox">Teléfono móvil (iOS)</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="laptop" value="Ordenador Portátil" name="device[]" checked/>
                    <label for="laptop" class="checkbox">Ordenador Portátil</label>
                </div>
                <br/>
                <div>
                    <input type="checkbox" id="pc" value="Ordenador de sobremesa" name="device[]" />
                    <label for="pc" class="checkbox">Ordenador de sobremesa</label>
                </div>
                <br/>
            <br/>
            <div class="genero">
                <p><b>Género:<span>&nbsp;</b></span></p>
                <select name="genero_elegir" title="elige_genero">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer" selected>Mujer</option>
                    <option value="Otro" selected>Otro</option>
                    <option value="No especificado" selected>Prefiero no decirlo</option>
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