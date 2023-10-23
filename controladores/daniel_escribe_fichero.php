<?php

    function daniel_escribe_fichero()
    {
        $dataToStore = "name: " . $_REQUEST['name'] . ",\n";
        $dataToStore .= "email: " . $_REQUEST['email'] . ",\n";
        $dataToStore .= "dni: " . $_REQUEST['dni'] . ",\n";
        
        $portatil = in_array('Full-Stack Engineer', $_REQUEST['device']) ? 'portatil' : 'Otro';
        $dataToStore .= "portatil: $portatil,\n";

        $genero = ($_REQUEST['genero'] === 'otro') ? 'otro' : 'Otro';
        $dataToStore .= "genero: $genero,\n";

        $file = fopen("..\\datos\\daniel_almacena_formulario.txt", "a");
        fwrite($file, $dataToStore);
        fclose($file);
    }

?>