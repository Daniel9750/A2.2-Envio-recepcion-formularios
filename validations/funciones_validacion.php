<?php

    // Importa la función que almacena los archivos si se han validado correctamente.
    include_once "..\\controllers\\cristo_guardar_ficheros.php";
    include_once "..\\controllers\\manuel_guardar_ficheros.php";
    include_once "..\\controllers\\daniel_guardar_ficheros.php";

    /**
     *  - Función que se encarga de escribir los datos en el fichero.
     *  - Recibe como parámetros los datos recibidos del formulario y el nombre del fichero.
     */
    require_once "..\\controllers\\cristo_escribe_fichero.php";
    require_once "..\\controllers\\daniel_escribe_fichero.php";

    // Función que comprueba los datos enviados al controlador.
    function validate_form_cristo()
    {
        $datosErroneos = array();

        // Validación de texto.
        (!isset($_REQUEST['name'])           || empty($_REQUEST['name']))           ? $datosErroneos[] = "El campo nombre contiene un error ❌"                 : null;
        (!isset($_REQUEST['password'])       || empty($_REQUEST['password']))       ? $datosErroneos[] = "El campo contraseña contiene un error ❌"             : null;
        (!isset($_REQUEST['repeatPassword']) || empty($_REQUEST['repeatPassword'])) ? $datosErroneos[] = "El campo confirmé su contraseña contiene un error ❌" : null;

        // Validación de checkbox.
        if (!isset($_REQUEST['job']) || empty($_REQUEST['job'])) 
        {
            $datosErroneos[] = "Debe seleccionar al menos un puesto de trabajo de interés ❌";
        }

        // Validación de los input type radio.
        ($_REQUEST['proyect'] !== 'i+d' && $_REQUEST['proyect'] !== 'ecommerce') ? $datosErroneos[] = "Debe seleccionar una opción de proyecto ❌" : null;

        // Validación de selección de opción.
        ($_REQUEST['incorporation'] !== 'Inmediata' && $_REQUEST['incorporation'] !== '15 días') ? $datosErroneos[] = "Debe seleccionar una fecha de incorporación ❌" : null;

        // Validación de los ficheros con extensión de tipo documento.
        if 
        (
            !isset($_FILES['fichero1']) || empty($_FILES['fichero1']) 
        ) 
        {
            $datosErroneos[] = "Debe incluir un documento como mínimo.";
        }

        $_fileName1      = $_FILES['fichero1']['name'];     
        $_fileError1     = $_FILES['fichero1']['error'];    
        $_fileSize1      = $_FILES['fichero1']['size'];    
        $_fileMaxSize1   = 1024 * 1024 * 1;
        $_fileExtension1 = pathinfo($_fileName1, PATHINFO_EXTENSION);
        $_fileFormats1   = array('txt','pdf','docx','xlsx','pptx','odt');
        
        if
        (
            $_fileError1 === true                       ||
            $_fileSize1   >  $_fileMaxSize1             ||
            $_fileSize1   <  1                          ||
            !in_array($_fileExtension1, $_fileFormats1)
        )
        {
            $datosErroneos[] = "No se ha podido guarda el documento, compruebe el formato y el tamaño.";
        }
        else 
        {
            store_file();
        }

        // Validación de los ficheros con extensión de tipo imagen.
        if 
        (
            !isset($_FILES['foto']) || empty($_FILES['foto'])
        ) 
        {
            $datosErroneos[] = "Debe incluir una imagen como mínimo.";
        }

        $_photoName      = $_FILES['foto']['name'];     
        $_photoError     = $_FILES['foto']['error'];    
        $_photoSize      = $_FILES['foto']['size'];    
        $_photoMaxSize   = 1024 * 1024 * 1;
        $_photoExtension = pathinfo($_photoName, PATHINFO_EXTENSION);
        $_photoFormats   = array('jpg','png','gif','jfif');

        if
        (
            $_photoError === true                       ||
            $_photoSize   >  $_photoMaxSize             ||
            $_photoSize   <  1                          ||
            !in_array($_photoExtension, $_photoFormats)
        )
        {
            $datosErroneos[] = "No se ha podido guarda la imagen, compruebe el formato y el tamaño.";
        }
        else
        {
            store_image();
        }

        /**
         *  - 1. Después de validar los campos, comprobamos si el array no está vacío para imprimir los campos que fueron erróneos.
         *  - 2. Después redireccionamos para que vuelva a cumplimentar los datos de manera correcta.
         */
        if (!empty($datosErroneos)) 
        {
            echo '<div id="mensajes">';
            
            foreach ($datosErroneos as $value) 
            {
                echo "$value <br/>";

                // Antes de volver a imprimir el siguiente campo erróneo espera 2 segundos.
                // Hay que limpiar el buffer para que el código no dispare errores internos de PHP.
                ob_flush();
                flush();
                sleep(2);
            }

            // ATENCIÓN: Imprimir un mensaje con echo y luego redireccionar con PHP dispara error por el buffer, así que se redireccionó con JS.
            // Si PHP ya ha enviado algún contenido al navegador antes de intentar cambiar los encabezados con header(), se genera el error "Cannot modify header information - headers already sent."
            // header("Location: archivo2.php");
            // exit;
            
            echo '</div>';
            
            // Redireccionar 2 segundos después de mostrar todos los mensajes utilizando JavaScript.
            echo 
            "
                <script>
                    setTimeout(function() 
                    {
                        alert('Vuelva a rellenar el formulario.');
                        window.location.href = '../formulario_cristo.php';
                    }, 2000);
                </script>
            ";
            
            exit;
        }

        // Si el formulario está correcto, imprimimos un mensaje indicándolo y mostrando los datos.
        // Tambien almacenamos los datos del formulario en el archivo cristo_almacena_formulario dado que está correcta la validación.
        else 
        {

            // Escribimos los datos del fichero si todo esta correcto.
            cristo_escribe_fichero();

            echo 
                'El formulario está correcto ✅'
                .
                '<br/><br/> <b>Nombre:</b> '               
                . 
                $_REQUEST['name']              
                .
                '<br/> <b>Contraseña1:</b> '          
                .
                $_REQUEST['password']          
                .
                '<br/> <b>Contraseña2:</b> '          
                .
                $_REQUEST['repeatPassword']    
                .
                '<br/>'                        
                ;

            echo '<b>Puesto:</b> ';

            foreach ($_REQUEST['job'] as $value) 
            {
                if ($value == end($_REQUEST['job'])) 
                    echo $value . ".";
                else 
                    echo $value . ", ";
            }

            echo '<br/>';

            echo '<b>Fecha de incorporación:</b> ' . $_REQUEST['incorporation'] . '<br/>';

            echo '<br/> <b>Archivos almacenados correctamente!</b>';
        }
    }

    function validate_form_daniel()
    {
        $datosErroneos = array();

        (!isset($_REQUEST['name'])           || empty($_REQUEST['name']))           ? $datosErroneos[] = "Error en el nombre ❌"             : null;
        (!isset($_REQUEST['email'])          || empty($_REQUEST['email']))          ? $datosErroneos[] = "Error en el correo electrónico ❌" : null;
        (!isset($_REQUEST['dni'])            || empty($_REQUEST['dni']))            ? $datosErroneos[] = "Error en el DNI ❌"                : null;


            if (!isset($_REQUEST['device']) || empty($_REQUEST['device'])) 
            {
                $datosErroneos[] = "Por favor, seleccione al menos un dispositivo ❌";
            }


        ($_REQUEST['genero'] !== 'hombre' && $_REQUEST['genero'] !== 'mujer' 
        && $_REQUEST['genero'] !== 'otro' && $_REQUEST['genero'] !== 'especificar') 
        ? $datosErroneos[] = "Por favor, elija una opción ❌" : null;

        if 
        (
            !isset($_FILES['fichero1']) || empty($_FILES['fichero1'])
        ) 
        {
            $datosErroneos[] = "Por favor, incluya un documento. ❌";
        }

        $_fileName1      = $_FILES['fichero1']['name'];     
        $_fileError1     = $_FILES['fichero1']['error'];    
        $_fileSize1      = $_FILES['fichero1']['size'];    
        $_fileMaxSize1   = 1024 * 1024 * 1;
        $_fileExtension1 = pathinfo($_fileName1, PATHINFO_EXTENSION);
        $_fileFormats1   = array('txt','pdf','docx','xlsx','pptx','odt');
        
        if
        (
            $_fileError1 === true                       ||
            $_fileSize1   >  $_fileMaxSize1             ||
            $_fileSize1   <  1                          ||
            !in_array($_fileExtension1, $_fileFormats1)
        )
        {
            $datosErroneos[] = "Error al guardar documento, compruebe el formato y/o el tamaño. ❌";
        }
        else 
        {
            store_file();
        }

        if 
        (
            !isset($_FILES['foto']) || empty($_FILES['foto'])
        ) 
        {
            $datosErroneos[] = "Por favor, incluya una imágen. ❌";
        }

        $_photoName      = $_FILES['foto']['name'];     
        $_photoError     = $_FILES['foto']['error'];    
        $_photoSize      = $_FILES['foto']['size'];    
        $_photoMaxSize   = 1024 * 1024 * 1;
        $_photoExtension = pathinfo($_photoName, PATHINFO_EXTENSION);
        $_photoFormats   = array('jpg','png','gif','jfif');

        if
        (
            $_photoError === true                       ||
            $_photoSize   >  $_photoMaxSize             ||
            $_photoSize   <  1                          ||
            !in_array($_photoExtension, $_photoFormats)
        )
        {
            $datosErroneos[] = "Error al guardar la imagen, compruebe el formato y/o el tamaño. ❌";
        }
        else
        {
            store_image();
        }

        if (!empty($datosErroneos)) 
        {
            echo '<div id="mensajes">';
            
            foreach ($datosErroneos as $value) 
            {
                echo "$value <br/>";

                ob_flush();
                flush();
                sleep(2);
            }

            
            echo '</div>';
            
            echo 
            "
                <script>
                    setTimeout(function() 
                    {
                        alert('Vuelva a rellenar el formulario.');
                        window.location.href = '/A2.2-Envio-recepcion-formularios/formulario_daniel.php';
                    }, 2000);
                </script>
            ";
            
            exit;
        }


        else {
            echo 
                'El formulario está correcto ✅'
                .
                '<br/><br/> <b>Nombre:</b> '               
                . 
                $_REQUEST['name']              
                .
                '<br/> <b>Correo electrónico:</b> '          
                .
                $_REQUEST['email']          
                .
                '<br/> <b>DNI:</b> '          
                .
                $_REQUEST['dni']    
                .
                '<br/>'                        
                ;

            foreach ($_REQUEST['device'] as $value) 
            {
                echo '<b>Dispositivo:</b> ' . $value . '<br/>';
            }

            echo '<b>Género:</b> ' . $_REQUEST['genero'];

            echo '<br/> <b>Se han guardados los archivos.</b>';
        }


    }


    // Función que comprueba los datos enviados al controlador - MANUEL -.
    function validate_form_manuel()
    {
        $errors = array();
    
        if (!isset($_REQUEST['name']) || empty($_REQUEST['name'])) {
            $errors[] = "Error en el campo nombre ❌";
        }
    
        if (!isset($_REQUEST['password']) || empty($_REQUEST['password'])) {
            $errors[] = "Error en el campo contraseña ❌";
        }
    
        if (!isset($_REQUEST['repeatPassword']) || empty($_REQUEST['repeatPassword'])) {
            $errors[] = "Error en el campo repita su contraseña ❌";
        }
    
        if (!isset($_REQUEST['transp']) || empty($_REQUEST['transp'])) {
            $errors[] = "Error en el tipo de transporte ❌";
        }
    
        if (!isset($_REQUEST['spare']) || empty($_REQUEST['spare'])) {
            $errors[] = "Error en el tipo de repuesto ❌";
        }
    
        if ($_REQUEST['entrega'] !== 'Origen' && $_REQUEST['entrega'] !== 'Destino') {
            $errors[] = "Error en la elección de entrega ❌";
        }
    
        if (!empty($errors)) {
            echo '<div id="mensajes">';
    
            foreach ($errors as $value) {
                echo "$value <br/>";
            }
    
            echo '</div>';
    
            echo '<br/><a href="./formulario_manuel.php">Rellena el formulario otra vez</a>';
    
            exit;
        } else {
            echo 'El formulario está correcto ✅' . '<br/><br/> <b>Nombre:</b> ' . $_REQUEST['name'] . '<br/> <b>Contraseña1:</b> ' . $_REQUEST['password'] . '<br/> <b>Contraseña2:</b> ' . $_REQUEST['repeatPassword'] . '<br/>';
    
            foreach ($_REQUEST['transp'] as $value) {
                echo '<b>Tipo Transporte:</b> ' . $value . '<br/>';
            }
    
            foreach ($_REQUEST['spare'] as $value) {
                echo '<b>Tipo Repuesto:</b> ' . $value . '<br/>';
            }
    
            echo '<b>Lugar de Entrega:</b> ' . $_REQUEST['entrega'];
        }
    }
?>
