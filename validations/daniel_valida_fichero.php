<?php

    function response_validation($_key, $_value, $_array)
    {
        if 
        (   
            isset($_array)                                 
            &&
            !empty($_array)                                
            &&
            is_array($_array)
            &&
            array_key_exists($_key, $_array)
            && 
            $_array[$_key] === $_value
        )
            return true;
    }
    
?>