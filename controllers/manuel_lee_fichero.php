<?php

    function manuel_lee_fichero()
    {
        global $valores_defecto;
        $pathFile = "database\\manuel_valores_defecto.txt";
        
        if (file_exists($pathFile)){
            $fichero = fopen($pathFile, "r");
            
            if ($fichero !== false){
                $valores_defecto = array();
                
                while ($linea = fgets($fichero)){
                    $splitArray = explode(": ", $linea);
                    if (count($splitArray) >= 2){
                        $_clave = trim($splitArray[0]);
                        $_valor = trim($splitArray[1]);
                        $valores_defecto[$_clave] = str_replace(",", "", $_valor);
                        
                    }else{
                        echo "La siguiente línea: '" . $linea . "' no cumple el formato correcto";
                    }
                }
                return $valores_defecto;
            }else {
                echo "No se puede abrir el archivo '" . $pathFile . "'<br>";
            }
            fclose($fichero);
        }else 
        {
            echo "El archivo '" . $pathFile . "' no existe en el directorio actual. <br/>";
        }
    }
    
?>
