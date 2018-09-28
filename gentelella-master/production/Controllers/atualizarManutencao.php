<?php

session_start();

require_once 'config.php';

$veiculo = new Veiculo();


$id = $_POST['id'];
$km = $_POST['km'];
$doc = $_POST['doc'];
$oleo = $_POST['oleo'];
$filtro = $_POST['filtro'];
$vistoria = $_POST['vistoria'];



$veiculo->setId($id);
$veiculo->setKm($km);
$veiculo->setDoc($doc);
$veiculo->setTrocaoleo($oleo);
$veiculo->setTrocafiltro($filtro);
$veiculo->setVistoria($vistoria);


if($veiculo->checkUpdate()){
    header("Location: ../Views/manutencao.php");
}
else if($veiculo->updateManutencao($id)){
    header("Location: ../Views/manutencao.php?id=".$id);
    $_SESSION['CadastroVeiculo'] = "Manutenção atualizada com sucesso!";
}else{
    header("Location: ../Views/manutencao.php?id=".$id);
    $_SESSION['CadastroVeiculoErro'] = "ERRO ao atualizar Manutenção";
}




?>