<?php
   // Añadimos las validaciones al fichero de control de datos.
   include_once "./funciones_validacion.php";

   // Si el formulario enviado contiene el identificador oculto Cristo, se ejecuta la validación correspondiente.
   if ($_REQUEST['postId'] === "Cristo") 
   {
        validate_form_cristo();
   }
?>