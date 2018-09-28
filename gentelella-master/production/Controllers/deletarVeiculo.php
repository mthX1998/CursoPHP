<?php
 
    session_start();

    require_once 'config.php';

    $veiculo = new Veiculo();


    $id = $_GET['id'];

    if($veiculo->checkDeleteUser()){
        header("Location: ../Views/frota.php");
    }
    else if($veiculo->delete($id)){
        header("Location: ../Views/frota.php");
        $_SESSION['CadastroVeiculo'] = "Veículo Excluído com Sucesso!";
    }else{
        header("Location: ../Views/frota.php");
        $_SESSION['CadastroVeiculoErro'] = "ERRO ao excluir Veículo!";
    }

    


?>