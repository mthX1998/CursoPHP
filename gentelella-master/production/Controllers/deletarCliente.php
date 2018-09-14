<?php
 
    session_start();

    require_once 'config.php';

    $cliente = new Cliente();


    $id = $_GET['id'];

    if($cliente->delete($id)){
        header("Location: ../Views/clientes.php");
        $_SESSION['CadastroUsuario'] = "Cliente Excluído com Sucesso!";
    }else{
        header("Location: ../Views/clientes.php");
        $_SESSION['CadastroUsuarioErro'] = "ERRO ao excluir Cliente!";
    }
    


?>