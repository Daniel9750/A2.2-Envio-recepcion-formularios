<?php
    function valida($clave, $value, $_array){
        if (isset($_array) && !empty($_array) && is_array($_array) && arrayclave_exists($clave, $_array) && $_array[$clave] === $value)
            return true;
    }
?>
