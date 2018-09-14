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

        $conn = new PDO("mysql:dbname=pcdb; host=localhost", "root", "");
    
        
        $sql = "INSERT INTO $this->table (nome,senha,nivel) VALUES (:nome, :senha, :nivel)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome',$this->nome);
        $stmt->bindParam(':senha',$this->senha);
        $stmt->bindParam(':nivel',$this->nivel);
        return $stmt->execute();
        

        
    }

    public function update($id){
           
        $conn = new PDO("mysql:dbname=pcdb; host=localhost", "root", "");

        $sql = "UPDATE $this->table SET nome = :nome, senha = :senha, nivel = :nivel WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome',$this->nome);
        $stmt->bindParam(':senha',$this->senha);
        $stmt->bindParam(':nivel',$this->nivel);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }




  }

?>