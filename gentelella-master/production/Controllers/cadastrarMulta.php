<?php

session_start();

require_once 'config.php';

$multa = new Multa();

$id = $_POST['id'];
$proprietario = $_POST['propri'];
$endereco = $_POST['ende'];
$cidade = $_POST['cidad'];
$uf = $_POST['uf'];
$localidade = $_POST['local'];
$datahora = $_POST['datahora'];
$tipo = $_POST['tipo'];
$numagente = $_POST['nagente'];
$dataequip = $_POST['dataequip'];
$emissao = $_POST['emissao'];
$observacao = $_POST['observa'];
$velocpermitida = $_POST['velopermi'];
$velocaferida = $_POST['veloaferi'];
$veloconsiderada = $_POST['veloconsi'];
$idequip = $_POST['idequip'];
$enqua = $_POST['enqua'];
$desc = $_POST['desc'];
$status = $_POST['status'];
$user = $_SESSION['usuarioId'];


$multa->setProprietario($proprietario);
$multa->setEndereco($endereco);
$multa->setMunicipio($cidade);
$multa->setUf($uf);
$multa->setLocalidade($localidade);
$multa->setDatahora($datahora);
$multa->setTipo($tipo);
$multa->setNumagente($numagente);
$multa->setDataequip($dataequip);
$multa->setEmissao($emissao);
$multa->setObservacao($observacao);
$multa->setVelocpermitida($velocpermitida);
$multa->setVelocaferida($velocaferida);
$multa->setVelocconsiderada($veloconsiderada);
$multa->setIdequip($idequip);
$multa->setEnquadramento($enqua);
$multa->setDesc($desc);
$multa->setSitua($status);
$multa->setIdvei($id);
$multa->setUsuario($user);

if($multa->checkCreate()){
    header("Location: ../Views/multas.php?id=". $id);
}
else if($multa->insert()){
    header("Location: ../Views/multas.php?id=" . $id);
    $_SESSION['CadastroMulta'] = "Multa gerada com Sucesso!";
}else{
    header("Location: ../Views/multas.php?id=" . $id);
    $_SESSION['CadastroMultaErro'] = "ERRO ao gerar Multa";
}




?>