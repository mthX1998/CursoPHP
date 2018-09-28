<?php
 
    session_start();

    require_once 'config.php';

    $condutor = new Condutor();

    $cliente = $_GET['id'];

    $id = $_GET['idcon'];

    if($condutor->checkCreate()){
        header("Location: ../Views/condutores.php?id=". $cliente);
    }
    else if($condutor->delete($id)){
        header("Location: ../Views/condutores.php?id=". $cliente);
        $_SESSION['CadastroCondutor'] = "Condutor Excluído com Sucesso!";
    }else{
        header("Location: ../Views/condutores.php");
        $_SESSION['CadastroCondutorErro'] = "ERRO ao excluir Condutor";
    }

    


?>