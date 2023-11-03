<?php

    function guardarFichero1(){
        $pathDirectorio = "..\\ficheros\\";
        $pathFichero = $pathDirectorio . basename($_FILES["fichero1"]["name"]);

        $contador1 = 0;
        $contador2 = 0;

        while (file_exists($pathFichero)){
            $contador1++;
    
            $pathinfo = pathinfo($pathFichero);

            $name = $pathinfo["filename"];
            $extension = $pathinfo["extension"];

            $pathFichero =  $pathDirectorio . $name . "_" . $contador1 . "." . $extension;
        }

        move_uploaded_file($_FILES["fichero1"]["tmp_name"], $pathFichero);
    }

    function guardarFichero2(){
        $pathDirectorio = "..\\ficheros\\";
        $pathFichero = $pathDirectorio . basename($_FILES["fichero2"]["name"]);

        $contador2 = 0;

        while (file_exists($pathFichero)){
            $contador2++;
    
            $pathinfo = pathinfo($pathFichero);

            $name = $pathinfo["filename"];
            $extension = $pathinfo["extension"];

            $pathFichero =  $pathDirectorio . $name . "_" . $contador2 . "." . $extension;
        }

        move_uploaded_file($_FILES["fichero2"]["tmp_name"], $pathFichero);
    }

?>