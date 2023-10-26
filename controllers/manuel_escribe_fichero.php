<?php
function escribirFichero()
    {
        $datos = "name: " . $_REQUEST['name'] . ",\n";
        $datos .= "password: " . $_REQUEST['password'] . ",\n";
        $datos .= "repeatPassword: " . $_REQUEST['repeatPassword'] . ",\n";
        
        $checkB = in_array('maritimo', $_REQUEST['transp']) ? 'maritimo' : 'Otro';
        $datos .= "checkB: $checkB,\n";

        $rad = ($_REQUEST['spare'] === 'consumibles') ? 'consumibles' : 'Otro';
        $datos .= "consumibles: $rad,\n";

        $entrega = ($_REQUEST['entrega'] === 'Oorigen') ? 'Origen' : 'Otro';
        $datos .= "entrega: $entrega,\n";

        $file = fopen("..\\database\\manuel_almacena_formulario.txt", "a");
        fwrite($file, $datos);
        fclose($file);
    }

?>