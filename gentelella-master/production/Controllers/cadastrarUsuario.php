<?php
 
    session_start();

    require_once 'config.php';

    $usuario = new Usuario();


    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $consenha = $_POST['confirmsenha'];
    $privilegio = $_POST['priv'];

    if($senha != $consenha){
        header("Location: ../Views/usuarios.php");
        $_SESSION['CadastroUsuarioErro'] = "Erro de autenticação de senha!";
        exit;
    }

    $usuario->setNome($nome);
    $usuario->setSenha($senha);
    $usuario->setNivel($privilegio);

    if($usuario->insert()){
        header("Location: ../Views/usuarios.php");
        $_SESSION['CadastroUsuario'] = "Usuário Cadastrado com Sucesso!";
    }
    


?>