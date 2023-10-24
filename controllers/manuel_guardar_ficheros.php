<?php

    function guardarFichero(){
        $pathDirectorio = "..\\ficheros\\";
        $pathFichero = $pathDirectorio . basename($_FILES["fichero1"]["name"]);

        $contador = 0;

        while (file_exists($pathFichero)){
            $contador++;
    
            $pathinfo = pathinfo($pathFichero);

            $name = $pathinfo["filename"];
            $extension = $pathinfo["extension"];

            $pathFichero =  $pathDirectorio . $name . "_" . $contador . "." . $extension;
        }

        move_uploaded_file($_FILES["fichero1"]["tmp_name"], $pathFichero);
    }

?>