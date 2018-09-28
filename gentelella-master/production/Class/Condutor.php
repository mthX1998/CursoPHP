<?php

require_once '../Model/dao.php';

class Condutor extends dao{

    protected $table = 'Condutores';
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
    
        $sql = "INSERT INTO $this->table (nome,rgpassport,numhab,numregistro,validade,cpf,cliente,usuario) VALUES (:nome, :rgpassport, :numhab, :numregistro, :validade, :cpf, :cliente,:usuario)";
        
        return $conexao->query($sql, array(":nome" => $this->getNome(), ":rgpassport" => $this->getRg(), "numhab" => $this->getHab(), ":numregistro" => $this->getReg(), ":validade" => $this->getVal(), ":cpf" => $this->getCpf(), ":cliente" => $this->getCliente(), ":usuario" => $this->getUser()));

    }

    public function update($id){

        $conexao = new Conexao();
    
        $sql = "UPDATE $this->table SET nome = :nome , rgpassport = :rgpassport, numhab = :numhab, numregistro = :numregistro , validade = :validade, cpf = :cpf  WHERE id = :id";
        
        return $conexao->query($sql, array(":nome" => $this->getNome(), ":rgpassport" => $this->getRg(), ":numhab" => $this->getHab(), ":numregistro" => $this->getReg(), ":validade" => $this->getVal(), ":cpf" => $this->getCpf(), ":id" => $this->getId()));

    }
}








?>