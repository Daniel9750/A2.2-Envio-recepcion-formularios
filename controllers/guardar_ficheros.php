<?php

    // Guarda el archivo si paso las validaciones.
    function store_file()
    {
        $target_dir = "..\\ficheros\\";                                     // Directorio donde se van a guardar los archivos.
        $target_file = $target_dir . basename($_FILES["fichero1"]["name"]); // basename devuelve el nombre del archivo sin el directorio.

        $counter = 0;                                                       // Incrementa los nombres del archivo.

        while (file_exists($target_file)) 
        {
            $counter++;                                                     // Si el archivo existe, aumentar el valor de counter en 1.
    
            $target_file =  $target_dir                                     // Directorio donde se van a guardar los archivos.
                            . 
                            basename($_FILES["fichero1"]["name"])           // basename devuelve el nombre del archivo sin el directorio.
                            . 
                            "_"                                             // Añadimos la barra baja para concatenar el número incremental.
                            . 
                            $counter;                                       // Concatenamos el contador para diferenciar el nuevo archivo del viejo.
        }

        move_uploaded_file($_FILES["fichero1"]["tmp_name"], $target_file);  // Movemos el archivo de la ruta temporal a la ruta de destino.
    }

    // Guarda la imagen si paso las validaciones.
    function store_image()
    {
        $target_dir = "..\\ficheros\\";                                     // Directorio donde se van a guardar las imágenes.
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);     // basename devuelve el nombre de la imagen sin el directorio.

        $counter = 0;                                                       // Incrementa el nombre de la imagen.

        while (file_exists($target_file)) 
        {
            $counter++;                                                     // Si la imagen existe, aumentar el valor de counter en 1.
    
            $target_file =  $target_dir                                     // Directorio donde se van a guardar las imagenes.
                            . 
                            basename($_FILES["fichero1"]["name"])           // basename devuelve el nombre de la imagen sin el directorio.
                            . 
                            "_"                                             // Añadimos la barra baja para concatenar el número incremental.
                            . 
                            $counter;                                       // Concatenamos el contador para diferenciar la nueva imagen de la vieja.
        }
    }

    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);          // Movemos la imagen de la ruta temporal a la ruta de destino.
?>