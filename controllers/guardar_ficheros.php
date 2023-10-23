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
    
            $pathinfo = pathinfo($target_file);                             // Obtener la información sobre el archivo.

            $name = $pathinfo["filename"];                                  // Obtener el nombre del archivo.
            $extension = $pathinfo["extension"];                            // Obtener la extesión del archivo.

            $target_file =  $target_dir                                     // Directorio donde se van a guardar los archivos.
                            . 
                            $name                                           // basename devuelve el nombre del archivo sin el directorio.
                            . 
                            "_"                                             // Añadimos la barra baja para concatenar el número incremental.
                            . 
                            $counter                                        // Concatenamos el contador para diferenciar el nuevo archivo del viejo.
                            .
                            "."                                             // Punto antés de la extesión del archivo.
                            .
                            $extension;                                     // Extensión del archivo.
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

            $pathinfo = pathinfo($target_file);                             // Obtener la información sobre la imagen.

            $name = $pathinfo["filename"];                                  // Obtener el nombre de la imagen.
            $extension = $pathinfo["extension"];                            // Obtener la extesión de la imagen.
    
            $target_file =  $target_dir                                     // Directorio donde se van a guardar las imagenes.
                            . 
                            $name                                           // Nombre de la imagen.
                            . 
                            "_"                                             // Añadimos la barra baja para concatenar el número incremental.
                            . 
                            $counter                                        // Concatenamos el contador para diferenciar la nueva imagen de la vieja.
                            .
                            "."
                            .
                            $extension;                                     // Extensión de la imagen.
        }

        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);      // Movemos la imagen de la ruta temporal a la ruta de destino.
    }

?>