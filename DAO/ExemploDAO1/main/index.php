<?php

require_once("../autoload". DIRECTORY_SEPARATOR . "config.php");

$sql = new Sql();

//$us = new Usuario();

//if($us->loadById(2) == true){
//echo $us;
//}

//echo json_encode(Usuario::getList());

//echo json_encode(Usuario::search("Marc"));

//echo json_encode(Usuario::search("jo"));

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//echo json_encode($usuarios);

$user = new Usuario();

//if($user->loadById(3)){
//echo $user;
//}

//$user = $user->insert("INSERT INTO tb_usuarios (deslogin,dessenha) VALUES (:user,:senha) ", array(":user" => "matheus" , ":senha" => "santosfc"));

$user->loadById(3);

$user->update("professor","profg4");

echo $user;


?>