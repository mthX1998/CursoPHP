<?php

require_once("../autoload". DIRECTORY_SEPARATOR . "config.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios ");

echo json_encode($usuarios);

?>