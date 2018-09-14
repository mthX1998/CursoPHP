<?php


require_once '../Model/dao.php';

class Cliente extends dao{


    protected $table = 'clientes';
    private $id;
    private $nome;
    private $profissao;
    private $endereco;
    private $numhab;
    private $telefone1;
    private $telefone2;
    private $bairro;
    private $cidade;
    private $cpf;
    private $uf;
    private $cep;
    private $email;
    private $usuario;

    
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

    public function getProfissao(){
        return $this->profissao;
    }

    public function setProfissao($profissao){
        $this->profissao = $profissao;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getNumhab(){
        return $this->numhab;
    }

    public function setNumhab($numhab){
        $this->numhab = $numhab;
    }

    public function getTel1(){
        return $this->telefone1;
    }
 
    public function setTel1($telefone1){
        $this->telefone1 = $telefone1;
    }


    public function getTel2(){
        return $this->telefone2;
    }

    public function setTel2($telefone2){
        $this->telefone2 = $telefone2;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
 
    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getUf(){
        return $this->uf;
    }

    public function setUf($uf){
        $this->uf = $uf;
    }

    public function getCep(){
        return $this->cep;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getIduser(){
        return $this->usuario;
    }

    public function setIduser($usuario){
        $this->usuario = $usuario;
    }


    public function insert(){

        $conexao = new Conexao();
    
        $sql = "INSERT INTO $this->table (nome,profissao,endereco,numhab,telefone1,telefone2,bairro,cidade,cpf,uf,cep,email,usuario) VALUES (:nome, :profissao, :endereco, :numhab, :tel1, :tel2, :bairro, :cidade, :cpf, :uf,:cep, :email,:usuario)";
        
        $conexao->query($sql, array(":nome" => $this->getNome(), ":profissao" => $this->getProfissao(), ":endereco" => $this->getEndereco(), ":numhab" => $this->getNumhab(), ":tel1" => $this->getTel1(), ":tel2" => $this->getTel2(), ":bairro" => $this->getBairro(), ":cidade" => $this->getCidade(), ":cpf" => $this->getCpf(), ":uf" => $this->getUf(), ":cep" => $this->getCep(), ":email" => $this->getEmail(), ":usuario" => $this->getIduser() ) );

    }

    public function update($id){

        $conexao = new Conexao();

        $conn = new PDO("mysql:dbname=pcdb; host=localhost", "root", "");
    
        $sql = "UPDATE $this->table SET nome = :nome, profissao = :profissao , endereco = :endereco , numhab = :numhab, telefone1 = :tel1, telefone2 = :tel2, bairro = :bairro, cidade = :cidade, cpf = :cpf, uf = :uf , cep = :cep ,email = :email WHERE id = :id";
        
        $conexao->query($sql, array(":nome" => $this->getNome(), ":profissao" => $this->getProfissao(), ":endereco" => $this->getEndereco(), ":numhab" => $this->getNumhab(), ":tel1" => $this->getTel1(), ":tel2" => $this->getTel2(), ":bairro" => $this->getBairro(), ":cidade" => $this->getCidade(), ":cpf" => $this->getCpf(), ":uf" => $this->getUf(), ":cep" => $this->getCep(), ":email" => $this->getEmail(), ":id" => $this->getId()));

    }


}



?>