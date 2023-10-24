<?php
    function manuel_lee_fichero(){
        global $valorDefecto;

        $file = "database\\manuel_valores_defecto.txt";
        
        if(file_exists($file)){
            $fichero = fopen($file, "r");
            
            if($fichero !== false){
                $valorDefecto = array();

                while ($linea = fgets($fichero)){
                    $splitArray = explode(": ", $linea);
                    
                    if(count($splitArray) >= 2){
                        $clave = trim($splitArray[0]);
                        $valor = trim($splitArray[1]);
                        $valorDefecto[$clave] = str_replace(",", "", $valor);
                    }else{
                        echo "La siguiente línea: '" . $linea . "' no cumple el formato correcto";
                    }
                }

                fclose($fichero);
            }else{
                echo "No se puede abrir el archivo '" . $file . "'<br>";
                fclose($fichero);
            }
        }else{
            echo "El archivo '" . $file . "' no existe en el directorio actual. <br/>";
        }
    }
    
?>
