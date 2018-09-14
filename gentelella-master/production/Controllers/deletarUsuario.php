<?php
 
    session_start();

    require_once 'config.php';

    $usuario = new Usuario();


    $id = $_GET['id'];

    if($usuario->delete($id)){
        header("Location: ../Views/usuarios.php");
        $_SESSION['CadastroUsuario'] = "Usuário Excluído com Sucesso!";
    }else{
        header("Location: ../Views/usuarios.php");
        $_SESSION['CadastroUsuarioErro'] = "ERRO ao excluir Usuário!";
    }
    


?>