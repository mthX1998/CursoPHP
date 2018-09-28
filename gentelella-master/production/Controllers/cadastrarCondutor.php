<?php

session_start();

require_once 'config.php';

$condutor = new Condutor();


$nome = $_POST['nome'];
$rg = $_POST['rg'];
$habilita = $_POST['numhab'];
$reg = $_POST['reg'];
$validade = $_POST['validade'];
$cpf = $_POST['cpf'];
$cliente = $_POST['cliente'];
$usuario = $_SESSION['usuarioId'];

var_dump($validade);


$condutor->setNome($nome);
$condutor->setRg($rg);
$condutor->setHab($habilita);
$condutor->setReg($reg);
$condutor->setVal($validade);
$condutor->setCpf($cpf);
$condutor->setCliente($cliente);
$condutor->setUser($usuario);


if($condutor->checkCreate()){
    header("Location: ../Views/condutores.php?id=". $cliente);
}
else if($condutor->insert()){
    header("Location: ../Views/condutores.php?id=". $cliente);
    $_SESSION['CadastroCondutor'] = "Condutor Cadastrado com Sucesso!";
}else{
    header("Location: ../Views/condutores.php");
    $_SESSION['CadastroCondutorErro'] = "ERRO ao cadastrar Cliente";
}




?>