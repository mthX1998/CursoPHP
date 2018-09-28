<?php
 
    session_start();

    require_once 'config.php';

    $lancamento = new Lancamento();


    $id = $_GET['id'];

    if($lancamento->checkDeleteUser()){
        header("Location: ../Views/caixa.php");
    }
    else if($lancamento->delete($id)){
        header("Location: ../Views/caixa.php");
        $_SESSION['CadastroLancamento'] = "Lançamento Excluído com Sucesso!";
    }else{
        header("Location: ../Views/caixa.php");
        $_SESSION['CadastroLancamentoErro'] = "ERRO ao excluir Lançamento!";
    }

    


?>