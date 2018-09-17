<?php

require_once '../Model/dao.php';

class Condutor extends dao{

    protected $table = 'condutores';
    private $id;
    private $nome;
    private $rg;
    private $hab;
    private $reg;
    private $val;
    private $cpf;
    private $cliente;
    private $user;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getRg(){
        return $this->rg;
    }

    public function setRg($rg){
        $this->rg = $rg;
    }

    public function getHab(){
        return $this->hab;
    }

    public function setHab($hab){
        $this->hab = $hab;
    }

    public function getReg(){
        return $this->reg;
    }

    public function setReg($reg){
        $this->reg = $reg;
    }
 
    public function getVal(){
        return $this->val;
    }

    public function setVal($val){
        $this->val = $val;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }
 
    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
    }



    public function findById($id){
        
        $conexao = new Conexao();

        $sql = "SELECT * FROM $this->table WHERE cliente = :id";

        return $conexao->select($sql, array(":id" => $id));
    }

    public function insert(){

        $conexao = new Conexao();
    
        $sql = "INSERT INTO $this->table (nome,profissao,endereco,numhab,telefone1,telefone2,bairro,cidade,cpf,uf,cep,email,usuario) VALUES (:nome, :profissao, :endereco, :numhab, :tel1, :tel2, :bairro, :cidade, :cpf, :uf,:cep, :email,:usuario)";
        
        return $conexao->query($sql, array(":nome" => $this->getNome(), ":profissao" => $this->getProfissao(), ":endereco" => $this->getEndereco(), ":numhab" => $this->getNumhab(), ":tel1" => $this->getTel1(), ":tel2" => $this->getTel2(), ":bairro" => $this->getBairro(), ":cidade" => $this->getCidade(), ":cpf" => $this->getCpf(), ":uf" => $this->getUf(), ":cep" => $this->getCep(), ":email" => $this->getEmail(), ":usuario" => $this->getIduser() ) );

    }

    public function update($id){

        $conexao = new Conexao();
    
        $sql = "UPDATE $this->table SET nome = :nome, profissao = :profissao , endereco = :endereco , numhab = :numhab, telefone1 = :tel1, telefone2 = :tel2, bairro = :bairro, cidade = :cidade, cpf = :cpf, uf = :uf , cep = :cep ,email = :email WHERE id = :id";
        
        return $conexao->query($sql, array(":nome" => $this->getNome(), ":profissao" => $this->getProfissao(), ":endereco" => $this->getEndereco(), ":numhab" => $this->getNumhab(), ":tel1" => $this->getTel1(), ":tel2" => $this->getTel2(), ":bairro" => $this->getBairro(), ":cidade" => $this->getCidade(), ":cpf" => $this->getCpf(), ":uf" => $this->getUf(), ":cep" => $this->getCep(), ":email" => $this->getEmail(), ":id" => $this->getId()));

    }
}








?>