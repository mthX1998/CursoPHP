<?php

session_start();

require_once 'config.php';

$veiculo = new Veiculo();

$id = $_POST['id'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$motor = $_POST['motor'];
$cor = $_POST['cor'];
$comb = $_POST['comb'];
$chass = $_POST['chassi'];
$obs = $_POST['obs'];
$placa = $_POST['placa'];
$situa = $_POST['situa'];


$veiculo->setId($id);
$veiculo->setMarca($marca);
$veiculo->setModelo($modelo);
$veiculo->setAno($ano);
$veiculo->setMotor($motor);
$veiculo->setCor($cor);
$veiculo->setComb($comb);
$veiculo->setPlaca($placa);
$veiculo->setChass($chass);
$veiculo->setObs($obs);
$veiculo->setSitua($situa);

if($veiculo->checkUpdate()){
    header("Location: ../Views/frota.php");
}
else if($veiculo->update($id)){
    header("Location: ../Views/frota.php");
    $_SESSION['CadastroVeiculo'] = "Veículo atualizado com sucesso!";
}else{
    header("Location: ../Views/frota.php");
    $_SESSION['CadastroVeiculoErro'] = "ERRO ao atualizar Veículo";
}




?>