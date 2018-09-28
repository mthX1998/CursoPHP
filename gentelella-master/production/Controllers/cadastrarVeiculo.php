<?php

session_start();

require_once 'config.php';

$veiculo = new Veiculo();


$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$motor = $_POST['motor'];
$km = $_POST['km'];
$cor = $_POST['cor'];
$comb = $_POST['comb'];
$chass = $_POST['chassi'];
$obs = $_POST['obs'];
$doc = $_POST['doc'];
$placa = $_POST['placa'];
$trocaoleo = $_POST['oleo'];
$trocafiltro = $_POST['filtro'];
$vistoria = $_POST['vistoria'];
$situa = $_POST['situa'];



$veiculo->setMarca($marca);
$veiculo->setModelo($modelo);
$veiculo->setAno($ano);
$veiculo->setPlaca($placa);
$veiculo->setMotor($motor);
$veiculo->setComb($comb);
$veiculo->setKm($km);
$veiculo->setCor($cor);
$veiculo->setChass($chass);
$veiculo->setObs($obs);
$veiculo->setDoc($doc);
$veiculo->setTrocaoleo($trocaoleo);
$veiculo->setTrocafiltro($trocafiltro);
$veiculo->setVistoria($vistoria);
$veiculo->setSitua($situa);

if($veiculo->checkCreate()){
    header("Location: ../Views/frota.php");
}
else if($veiculo->insert()){
    header("Location: ../Views/frota.php");
    $_SESSION['CadastroVeiculo'] = "Veículo cadastrado com sucesso!";
}else{
    header("Location: ../Views/frota.php");
    $_SESSION['CadastroVeiculoErro'] = "ERRO ao cadastrar Veículo";
}




?>