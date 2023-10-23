<?php

    function cristo_lee_fichero()
    {
        // Paso 1) Declarar $valores_defecto como una variable global.
        global $valores_defecto;

        // Paso 2) Almacenar la ruta del fichero.
        $ruta = "database\\cristo_valores_defecto.txt";
        
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
    }
    
?>
