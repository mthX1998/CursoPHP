<?php

spl_autoload_register(function($classe){

    $filename = $classe.".php";
    $directory = "dao";

    if(file_exists(("../" . $directory. DIRECTORY_SEPARATOR .$filename))){
        require_once("../" . $directory. DIRECTORY_SEPARATOR .$filename);
    }

});


?>