<?php

    function store_file()
    {
        $target_dir = "C:\\xampp\\htdocs\\dsw\\A2.2-Envio-recepcion-formularios\\ficheros\\";
        $target_file = $target_dir . basename($_FILES["fichero1"]["name"]);
        move_uploaded_file($_FILES["fichero1"]["tmp_name"], $target_file);
    }

    function store_image()
    {
        $target_dir = "C:\\xampp\\htdocs\\dsw\\A2.2-Envio-recepcion-formularios\\ficheros\\";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    }

?>