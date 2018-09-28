<?php

date_default_timezone_set('America/Sao_Paulo');

session_start();

require_once 'config.php';

$conta = new Conta();


$valor = $_POST['valor'];
$tipo = $_POST['tipo'];
$origem = $_POST['ref'];
$vencimento = $_POST['venc'];
$usuario = $_SESSION['usuarioId'];

number_format($valor,2, '.', ',');

$conta->setValor($valor);
$conta->setTipo($tipo);
$conta->setRef($origem);
$conta->setVenc($vencimento);
$conta->setUsuario($usuario);


if($valor <= 0){
    header("Location: ../Views/contas.php");
    $_SESSION['CadastroContaErro'] = "ERRO: Valor inválido!";
}

elseif($conta->checkCreate()){
    header("Location: ../Views/contas.php");
}
else if($conta->insert()){
    header("Location: ../Views/contas.php");
    $_SESSION['CadastroConta'] = "Conta gerada com Sucesso!";
}else{
    header("Location: ../Views/contas.php");
    $_SESSION['CadastroContaErro'] = "ERRO ao gerar Conta";
}
