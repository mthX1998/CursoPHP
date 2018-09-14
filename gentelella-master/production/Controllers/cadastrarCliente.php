<?php

session_start();

require_once 'config.php';

$cliente = new Cliente();


$nome = $_POST['nome'];
$prof = $_POST['profissao'];
$end = $_POST['endereco'];
$cep = $_POST['cep'];
$tel1 = $_POST['telefone1'];
$tel2 = $_POST['telefone2'];
$bairro = $_POST['bairro'];
$cid = $_POST['cidade'];
$uf = $_POST['uf'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$hab = $_POST['hab'];
$user = $_SESSION['usuarioNiveisAcessoId'];


$cliente->setNome($nome);
$cliente->setProfissao($prof);
$cliente->setEndereco($end);
$cliente->setCep($cep);
$cliente->setTel1($tel1);
$cliente->setTel2($tel2);
$cliente->setBairro($bairro);
$cliente->setCidade($cid);
$cliente->setUf($uf);
$cliente->setCpf($cpf);
$cliente->setEmail($email);
$cliente->setNumhab($hab);
$cliente->setIduser($user);

if($cliente->insert()){
    header("Location: ../Views/clientes.php");
    $_SESSION['CadastroUsuario'] = "Usuário Cadastrado com Sucesso!";
}else{
    header("Location: ../Views/clientes.php");
    $_SESSION['CadastroUsuarioErro'] = "ERRO";
}




?>