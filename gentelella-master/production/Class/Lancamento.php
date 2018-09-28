<?php

require_once '../Model/dao.php';

class Lancamento extends dao{

    protected $table = 'Lancamentos';
    private $id;
    private $valor;
    private $tipo;
    private $origem;
    private $usuario;
    private $data;

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getOrigem(){
        return $this->origem;
    }

    public function setOrigem($origem){
        $this->origem = $origem;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }


    public function insert(){

        $conexao = new Conexao();
    
        $sql = "INSERT INTO $this->table (valor,tipo,origem,datalanc,usuario) VALUES (:valor,:tipo,:origem,:datta,:usuario)";
        
        return $conexao->query($sql, array(":valor" => $this->getValor(), ":tipo" => $this->getTipo(), ":origem" => $this->getOrigem(), ":datta" => $this->getData(), ":usuario" => $this->getUsuario()));

    }


    public function update($id){

        $conexao = new Conexao();
    
        $sql = "UPDATE $this->table SET valor = :valor, tipo = :tipo, origem = :origem, usuario = :usuario, datalanc = :datalanc  WHERE id = :id";
        
        return $conexao->query($sql, array(":valor" => $this->getValor(), ":tipo" => $this->getTipo(), ":origem" => $this->getOrigem(), ":datalanc" => $this->getData(), ":usuario" => $this->getUsuario(), ":id" => $this->getId()));

    }

    public function getSaldo(){

        $conexao = new Conexao();

        $sql1 = "SELECT SUM(valor) FROM $this->table WHERE tipo = 'Entrada' ";
        $sql2 = "SELECT SUM(valor) FROM $this->table WHERE tipo = 'Saida' ";

        $entrada = $conexao->login($sql1);

        $saida = $conexao->login($sql2);

        $saldo = $entrada[0]["SUM(valor)"] - $saida[0]["SUM(valor)"];

        return $saldo;


    }

}





?>