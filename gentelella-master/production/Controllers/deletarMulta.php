<?php
 
    session_start();

    require_once 'config.php';

    $multa = new Multa();


    $idvei = $_GET['id'];

    $id = $_GET['idmul'];

    if($multa->checkDeleteUser()){
        header("Location: ../Views/multas.php?id=". $idvei);
    }
    else if($multa->delete($id)){
        header("Location: ../Views/multas.php?id=". $idvei);
        $_SESSION['CadastroMulta'] = "Multa Excluída com Sucesso!";
    }else{
        header("Location: ../Views/multas.php?id=". $idvei);
        $_SESSION['CadastroMultaErro'] = "ERRO ao excluir Multa!";
    }

?>