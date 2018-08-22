<?php

require_once("../dao". DIRECTORY_SEPARATOR . "sql.php");

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;
     

    





    
    

  
    public function getIdusuario()
    {
        return $this->idusuario;
    }

  
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

   
    public function getDeslogin()
    {
        return $this->deslogin;
    }

    public function setDeslogin($deslogin)
    {
        $this->deslogin = $deslogin;
    }

    public function getDessenha()
    {
        return $this->dessenha;
    }

    public function setDessenha($dessenha)
    {
        $this->dessenha = $dessenha;
    }

    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    public function setDtcadastro($dtcadastro)
    {
        $this->dtcadastro = $dtcadastro;
    }

    public function loadById($id){
         
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID" => $id));

        if(count($result) > 0){

            $this->setData($result[0]);

            return $this->setData($result[0]);
        }
        else{
            echo "Usuário Não Encontrado";
            return false;
        }
    }


    public static function getList(){

        $sql = new Sql();

        return $result = $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

    }


    public static function search($login){
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :search ORDER BY deslogin", array(':search' => "%". $login ."%"));

        if(count($result) > 0){
            return $result;
        }
        else{
            return "ERRO: Nenhum dado encontrado";
        }
    }


    public function login($login,$senha){

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :deslogin AND dessenha = :senha", array(":deslogin" => $login, ":senha" => $senha));

        if(count($result) > 0){

            $this->setData($result[0]);

            return true;
        }
        else{
           echo "ERRO: Credenciais incorretas";
           return false;
            
        }

    }

    public function setData($data){

        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));

    }


    public function insert($rawquery, $params = array()){

        $sql = new Sql();

        $busca = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :user", array(":user" => "matheus"));

        if(count($busca) > 0){
            echo "Erro Login já existe!";

            return false;
        }

        else{

        $stmt = $sql->query($rawquery,$params);

        echo "Usuário Cadastrado com sucesso";

        return true;

        }
    }

    public function update($login,$senha){

        $this->setDeslogin($login);
        $this->setDessenha($senha);

        $sql = new Sql();

        $sql->query("UPDATE FROM tb_usuarios SET deslogin = :loggin, dessenha = :senha WHERE idusuario = :id", array(
            ":loggin" => $this->getDeslogin(),
            ":senha" => $this->getDessenha(),
            ":id" => $this->getIdusuario()
        ));
    }


    public function __toString(){

    return json_encode(array(
        "ID" => $this->getIdusuario(),
        "Login" => $this->getDeslogin(),
        "Senha" => $this->getDessenha(),
        "Data-Cadastro" => $this->getDtcadastro()->format("d/m/Y H:i:s")
    ));

    }

}


?>