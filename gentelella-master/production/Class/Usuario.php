<?php
  
  require_once '../Model/dao.php';


  class Usuario extends dao{


    protected $table = 'usuarios';
    private $id;
    private $nome;
    private $senha;
    private $nivel;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }
 
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getNivel()
    {
        return $this->nivel;
    }

    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    public function insert(){

        $conexao = new Conexao();
    
        $sql = "INSERT INTO $this->table (nome,senha,nivel) VALUES (:nome, :senha, :nivel)";

        return $conexao->query($sql, array(":nome" => $this->getNome() , ":senha" => $this->getSenha(), ":nivel" => $this->getNivel())); 
    
    }

    public function update($id){
           
        $conexao = new Conexao();

        $sql = "UPDATE $this->table SET nome = :nome, senha = :senha, nivel = :nivel WHERE id = :id";

        return $conexao->query($sql, array(":nome" => $this->getNome() , ":senha" => $this->getSenha(), ":nivel" => $this->getNivel(), ":id" => $this->getId())); 

    }




  }

?>