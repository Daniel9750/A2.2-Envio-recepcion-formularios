<?php

    function store_file(){
        $target_dir = "..\\ficheros\\";
        $target_file = $target_dir . basename($_FILES["fichero1"]["name"]);

        $cont = 0;

        while (file_exists($target_file)){
            $cont++;
    
            $pathinfo = pathinfo($target_file);

            $name = $pathinfo["filename"];
            $extension = $pathinfo["extension"];

            $target_file =  $target_dir . $name . "_" . $cont . "." . $extension;
        }

        move_uploaded_file($_FILES["fichero1"]["tmp_name"], $target_file);
    }

?>