<?php

class Sessao{

    public static function verificarSessao(){
        
        if ($_SESSION['OK'] == true){

          session_start();
          
        }else{
            header("Location: ../Views/page_403.html");
        }
    }


}



?>