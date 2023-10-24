<?php
    function manuel_lee_fichero(){
        global $valDef;

        $file = "database\\manuel_valores_defecto.txt";
        
        if(file_exists($file)){
            $fichero = fopen($file, "r");
            
            if($fichero !== false){
                $valDef = array();

                while ($linea = fgets($fichero)){
                    $spl = explode(": ", $linea);
                    
                    if(count($spl) >= 2){
                        $clave = trim($spl[0]);
                        $valor = trim($spl[1]);
                        $valDef[$clave] = str_replace(",", "", $valor);
                    }else{
                        echo "La siguiente línea: '" . $linea . "' no cumple el formato correcto";
                    }
                }

                fclose($fichero);
            }else{
                echo "No se puede abrir el archivo '" . $file . "'<br>";
            }
        }else{
            echo "El archivo '" . $file . "' no existe en el directorio actual. <br/>";
        }
    }
    
?>
