<?php
 
    session_start();

    require_once 'config.php';

    $conta = new Conta();


    $id = $_GET['id'];

    if($conta->checkDeleteUser()){
        header("Location: ../Views/contas.php");
    }
    else if($conta->delete($id)){
        header("Location: ../Views/contas.php");
        $_SESSION['CadastroConta'] = "Conta Excluída com Sucesso!";
    }else{
        header("Location: ../Views/contas.php");
        $_SESSION['CadastroContaErro'] = "ERRO ao excluir Conta!";
    }

    


?>