<?php

date_default_timezone_set('America/Sao_Paulo');

session_start();

require_once 'config.php';

$lancamento = new Lancamento();


$valor = $_POST['valor'];
$tipo = $_POST['tipo'];
$origem = $_POST['origem'];
$data = date('Y-m-d');
$usuario = $_SESSION['usuarioId'];

number_format($valor,2, '.', ',');

$lancamento->setValor($valor);
$lancamento->setTipo($tipo);
$lancamento->setOrigem($origem);
$lancamento->setData($data);
$lancamento->setUsuario($usuario);


if($valor <= 0){
    header("Location: ../Views/caixa.php");
    $_SESSION['CadastroLancamentoErro'] = "ERRO: Valor inválido!";
}

elseif($lancamento->checkCreate()){
    header("Location: ../Views/caixa.php");
}
else if($lancamento->insert()){
    header("Location: ../Views/caixa.php");
    $_SESSION['CadastroLancamento'] = "Lançamento gerado com Sucesso!";
}else{
    header("Location: ../Views/caixa.php");
    $_SESSION['CadastroLancamentoErro'] = "ERRO ao gerar Lançamento";
}
