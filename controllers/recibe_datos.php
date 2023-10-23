<?php

     // Añadimos las validaciones al fichero de control de datos.
     include_once "..\\validations\\funciones_validacion.php";

     // Si el formulario enviado contiene el identificador oculto Cristo, se ejecuta la validación correspondiente.
     if ($_REQUEST['postId'] === "Cristo")
     {
          validate_form_cristo();
     }

     if ($_REQUEST['postId'] === "Daniel")
     {
          validate_form_daniel();
     }

     if ($_REQUEST['postId'] === "Manuel")
     {
          validate_form_manuel();
     }

?>
