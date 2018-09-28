<?php

require_once '../Model/dao.php';

class Multa extends dao{

    protected $table = 'Multas';
    private $id;
    private $proprietario;
    private $endereco;
    private $municipio;
    private $uf;
    private $localidade;
    private $datahora;
    private $tipo;
    private $numagente;
    private $dataequip;
    private $emissao;
    private $observacao;
    private $velocpermitida;
    private $velocaferida;
    private $velocconsiderada;
    private $idequip;
    private $enquadramento;
    private $desc;
    private $situa;
    private $idvei;
    private $usuario;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }


    public function getProprietario(){
        return $this->proprietario;
    }

    public function setProprietario($proprietario){
        $this->proprietario = $proprietario;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getMunicipio(){
        return $this->municipio;
    }

    public function setMunicipio($municipio){
        $this->municipio = $municipio;
    }

    public function getUf(){
        return $this->uf;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function getLocalidade(){
        return $this->localidade;
    }

    public function setLocalidade($localidade){
        $this->localidade = $localidade;
    }

    public function getDatahora(){
        return $this->datahora;
    }

    public function setDatahora($datahora){
        $this->datahora = $datahora;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getNumagente(){
        return $this->numagente;
    }

    public function setNumagente($numagente){
        $this->numagente = $numagente;
    }

    public function getDataequip(){
        return $this->dataequip;
    }

    public function setDataequip($dataequip){
        $this->dataequip = $dataequip;
    }

    public function getEmissao(){
        return $this->emissao;
    }

    public function setEmissao($emissao){
        $this->emissao = $emissao;
    }

    public function getObservacao(){
        return $this->observacao;
    }

    public function setObservacao($observacao){
        $this->observacao = $observacao;
    }

    public function getVelocpermitida(){
        return $this->velocpermitida;
    }

    public function setVelocpermitida($velocpermitida){
        $this->velocpermitida = $velocpermitida;
    }

    public function getVelocaferida(){
        return $this->velocaferida;
    }

    public function setVelocaferida($velocaferida){
        $this->velocaferida = $velocaferida;
    }

    public function getVelocconsiderada(){
        return $this->velocconsiderada;
    }

    public function setVelocconsiderada($velocconsiderada){
        $this->velocconsiderada = $velocconsiderada;
    }

    public function getIdequip(){
        return $this->idequip;
    }

    public function setIdequip($idequip){
        $this->idequip = $idequip;
    }

    public function getEnquadramento(){
        return $this->enquadramento;
    }

    public function setEnquadramento($enquadramento){
        $this->enquadramento = $enquadramento;
    }

    public function getDesc(){
        return $this->desc;
    }

    public function setDesc($desc){
        $this->desc = $desc;
    }

    public function getSitua(){
        return $this->situa;
    }

    public function setSitua($situa){
        $this->situa = $situa;
    }

    public function getIdvei(){
        return $this->idvei;
    }

    public function setIdvei($idvei){
        $this->idvei = $idvei;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }



    public function findById($id){
        
        $conexao = new Conexao();

        $sql = "SELECT * FROM $this->table WHERE idveiculo = :id";

        return $conexao->select($sql, array(":id" => $id));
    }

    public function insert(){

        $conexao = new Conexao();
    
        $sql = "INSERT INTO $this->table (proprietario,endereco,municipio,uf,localidade,datahora,tipo,nagente,dataequip,emissao,observacao,velocpermitida,velocaferida,velocconsiderada,idequipamento,enquadramento,descricao,idveiculo,usuario,situacao) values (:proprietario,:endereco,:municipio,:uf,:localidade,:datahora,:tipo,:nagente,:dataequip,:emissao,:observacao,:velocpermitida,:velocaferida,:velocconsiderada,:idequipamento,:enquadramento,:descricao,:idveiculo,:usuario,:situacao)";
        
        return $conexao->query($sql, array(":proprietario" => $this->getProprietario(), ":endereco" => $this->getEndereco(), "municipio" => $this->getMunicipio(), ":uf" => $this->getUf(), ":localidade" => $this->getLocalidade(), ":datahora" => $this->getDatahora(), ":tipo" => $this->getTipo(), ":nagente" => $this->getNumagente(), ":dataequip" => $this->getDataequip(), ":emissao" => $this->getEmissao(), ":observacao" => $this->getObservacao(), ":velocpermitida" => $this->getVelocpermitida(), ":velocaferida" => $this->getVelocaferida(), ":velocconsiderada" => $this->getVelocconsiderada(), ":idequipamento" => $this->getIdequip(), ":enquadramento" => $this->getEnquadramento(), ":descricao" => $this->getDesc(), ":idveiculo" => $this->getIdvei(), ":usuario" => $this->getUsuario(), ":situacao" => $this->getSitua()));

    }

    public function update($id){

        $conexao = new Conexao();
    
        $sql = "INSERT INTO $this->table SET proprietario = :proprietario, endereco = :endereco , municipio = :municipio , uf = :uf , localidade = :localidade , datahora = :datahora , tipo = :tipo , nagente = :nagente, dataequip = :dataequip , emissao = :emissao , observacao = :observacao , velocpermitida = :velocpermitida , velocaferida = :velocaferida, velocconsiderada = :velocconsiderada, idequipamento = :idequipamento , enquadramento = :enquadramento, descricao = :descricao , idveiculo = :idveiculo, usuario = :usuario, situacao = :situacao WHERE id = :id";
        
        return $conexao->query($sql, array(":proprietario" => $this->getProprietario(), ":endereco" => $this->getEndereco(), ":municipio" => $this->getMunicipio(), ":uf" => $this->getUf(), ":localidade" => $this->getLocalidade(), ":datahora" => $this->getDatahora(), ":tipo" => $this->getTipo(), ":nagente" => $this->getNumagente(), ":dataequip" => $this->getDataequip(), ":emissao" => $this->getEmissao(), ":observacao" => $this->getObservacao(), ":velocpermitida" => $this->getVelocpermitida(), ":velocaferida" => $this->getVelocaferida(), ":velocconsiderada" => $this->getVelocconsiderada(), ":idequipamento" => $this->getIdequip(), ":enquadramento" => $this->getEnquadramento(), ":descricao" => $this->getDesc(), ":idveiculo" => $this->getIdvei(), ":usuario" => $this->getUsuario(), ":situacao" => $this->getSitua(), ":id" => $this->getId()));

    }
}








?>