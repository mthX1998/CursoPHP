<?php

  require_once 'conexao.php';

  $conn = new Conexao();

  abstract class DAO extends conexao {
   
    protected $table;

    abstract public function insert();
    abstract public function update($id);

    public function find($id){
        $conn = new PDO("mysql:dbname=pcdb; host=localhost", "root", "");

        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function findAll(){
        $conn = new PDO("mysql:dbname=pcdb; host=localhost", "root", "");

        $sql = "SELECT * FROM $this->table";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete($id){

        $conn = new PDO("mysql:dbname=pcdb; host=localhost", "root", "");

        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();
    }


  }


?>