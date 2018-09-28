<?php
 
    session_start();

    require_once 'config.php';

    $cliente = new Cliente();


    $id = $_GET['id'];

    if($cliente->checkDeleteUser()){
        header("Location: ../Views/clientes.php");
    }
    else if($cliente->delete($id)){
        header("Location: ../Views/clientes.php");
        $_SESSION['CadastroCliente'] = "Cliente Excluído com Sucesso!";
    }else{
        header("Location: ../Views/clientes.php");
        $_SESSION['CadastroClienteErro'] = "ERRO ao excluir Cliente!";
    }

    


?>