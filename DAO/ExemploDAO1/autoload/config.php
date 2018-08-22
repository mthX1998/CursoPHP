<?php

spl_autoload_register(function($classe){

    $filename = $classe.".php";
    $directory = "dao";

    if(file_exists(("../" . $directory. DIRECTORY_SEPARATOR .$filename))){
        require_once("../" . $directory. DIRECTORY_SEPARATOR .$filename);
    }

});


spl_autoload_register(function($classe){

    $filename = $classe.".php";
    $directory = "classes";

    if(file_exists(("../" . $directory. DIRECTORY_SEPARATOR .$filename))){
        require_once("../" . $directory. DIRECTORY_SEPARATOR .$filename);
    }

});




?>