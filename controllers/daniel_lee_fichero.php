<?php

    global $valores_defecto;

    $ruta = "database\\daniel_valores_defecto.txt";
    
    if (file_exists($ruta))
    {

        $fichero = fopen($ruta, "r");
        
        if ($fichero !== false)
        {
            $valores_defecto = array();
            
            while ($linea = fgets($fichero))
            {
                $parts = explode(": ", $linea);
                
                if (count($parts) >= 2) 
                {
                    $_clave = trim($parts[0]);                                
                    $_valor = trim($parts[1]);                                 
                    $valores_defecto[$_clave] = str_replace(",", "", $_valor); 
                }

                else 
                {
                    echo "La línea '" . $linea . "' no cumple con el formato";
                }
            }

            fclose($fichero);
        }

        else 
        {
            echo "No se puede abrir el archivo '" . $ruta . "'<br>";
        }
    }

    else 
    {
        echo "El archivo '" . $ruta . "' no existe en ese directorio. <br/>";
    }
    
?>