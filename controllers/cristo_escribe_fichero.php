<?php

    function cristo_escribe_fichero()
    {
        // Crear la cadena de datos en el formato requerido.
        $dataToStore = "name: " . $_REQUEST['name'] . ",\n";
        $dataToStore .= "password: " . $_REQUEST['password'] . ",\n";
        $dataToStore .= "repeatPassword: " . $_REQUEST['repeatPassword'] . ",\n";
        
        $developer = in_array('Full-Stack Engineer', $_REQUEST['job']) ? 'Full-Stack Engineer' : 'Otro';
        $dataToStore .= "developer: $developer,\n";

        $iplusd = ($_REQUEST['proyect'] === 'i+d') ? 'I+D' : 'Otro';
        $dataToStore .= "i+d: $iplusd,\n";

        $incorporation = ($_REQUEST['incorporation'] === '15 días') ? '15 días' : 'Otro';
        $dataToStore .= "incorporation: $incorporation,\n";

        // Almacenar los datos del formulario en el archivo cristo_almacena_formulario.
        $file = fopen("..\\database\\cristo_almacena_formulario.txt", "a");
        fwrite($file, $dataToStore);
        fclose($file);
    }

?>