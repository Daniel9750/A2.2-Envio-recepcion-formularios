<?php

    function store_file()
    {
        $target_dir = "..\\ficheros\\";                                     
        $target_file = $target_dir . basename($_FILES["fichero1"]["name"]); 

        $counter = 0;                                                       

        while (file_exists($target_file)) 
        {
            $counter++;                                                     
    
            $pathinfo = pathinfo($target_file);                             

            $name = $pathinfo["filename"];                                  
            $extension = $pathinfo["extension"];                            

            $target_file =  $target_dir                                     
                            . 
                            $name                                           
                            . 
                            "_"                                            
                            . 
                            $counter                                       
                            .
                            "."                                             
                            .
                            $extension;                                     
        }

        move_uploaded_file($_FILES["fichero1"]["tmp_name"], $target_file);  
    }

    function store_image()
    {
        $target_dir = "..\\ficheros\\";                                     
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);     

        $counter = 0;                                                       

        while (file_exists($target_file)) 
        {
            $counter++;                                                     

            $pathinfo = pathinfo($target_file);                             

            $name = $pathinfo["filename"];                                  
            $extension = $pathinfo["extension"];                            
    
            $target_file =  $target_dir                                     
                            . 
                            $name                                          
                            . 
                            "_"                                             
                            . 
                            $counter                                        
                            .
                            "."
                            .
                            $extension;                                     
        }

        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);      
    }

?>