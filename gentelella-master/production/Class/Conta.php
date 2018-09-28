<?php

require_once '../Model/dao.php';

class Conta extends dao{

    protected $table = 'Contas';
    private $id;
    private $valor;
    private $venc;
    private $tipo;
    private $usuario;
    private $ref;

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

    public function getVenc(){
        return $this->venc;
    }

    public function setVenc($venc){
        $this->venc = $venc;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getRef(){
        return $this->ref;
    }

    public function setRef($ref){
        $this->ref = $ref;
    }


    public function insert(){

        $conexao = new Conexao();
    
        $sql = "INSERT INTO $this->table (valor,tipo,ref,venc,usuario) VALUES (:valor,:tipo,:ref,:venc,:usuario)";
        
        return $conexao->query($sql, array(":valor" => $this->getValor(), ":tipo" => $this->getTipo(), ":ref" => $this->getRef(), ":venc" => $this->getVenc(), ":usuario" => $this->getUsuario()));

    }


    public function update($id){

        $conexao = new Conexao();
    
        $sql = "UPDATE $this->table SET valor = :valor, tipo = :tipo, ref = :ref, venc = :venc  WHERE id = :id";
        
        return $conexao->query($sql, array(":valor" => $this->getValor(), ":tipo" => $this->getTipo(), ":ref" => $this->getRef(), ":venc" => $this->getVenc(), ":id" => $this->getId()));

    }


    public function findContas($ref,$tipo,$valor,$venc){
        
        $conexao = new Conexao();

        $sql = "SELECT * FROM contas WHERE ref LIKE '%" . $ref . "%' AND tipo = '$tipo' OR venc = '$venc'";

        return $conexao->select($sql, array(":tipo" => $tipo, ":valor" => $valor, ":venc" => $venc));
    }


    public function getReceber(){

        $conexao = new Conexao();

        $sql = "SELECT SUM(valor) FROM $this->table WHERE tipo = 'A RECEBER'";

        $receber = $conexao->login($sql);

        $saldo = $receber[0]["SUM(valor)"];

        return $saldo;


    }

    public function getReceberDate($inicio,$termino){

        $conexao = new Conexao();

        $sql = "SELECT SUM(valor) FROM $this->table WHERE tipo = 'A RECEBER' AND venc BETWEEN '$inicio' AND '$termino' ";

        $receber = $conexao->login($sql);

        $saldo = $receber[0]["SUM(valor)"];

        return $saldo;


    }

    public function getPagar(){

        $conexao = new Conexao();

        $sql = "SELECT SUM(valor) FROM $this->table WHERE tipo = 'A PAGAR'";

        $pagar = $conexao->login($sql);

        $saldo = $pagar[0]["SUM(valor)"];

        return $saldo;


    }

    public function getPagarDate($inicio,$termino){

        $conexao = new Conexao();

        $sql = "SELECT SUM(valor) FROM $this->table WHERE tipo = 'A PAGAR' AND venc BETWEEN '$inicio' AND '$termino'";

        $pagar = $conexao->login($sql);

        $saldo = $pagar[0]["SUM(valor)"];

        return $saldo;


    }

}





?>