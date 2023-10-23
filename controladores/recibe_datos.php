<?php
   include_once "..\\validaciones\\funciones_validacion.php";

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