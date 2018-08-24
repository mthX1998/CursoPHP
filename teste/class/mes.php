<?php

include 'compromisso.php';

class Mes{
    
    private $nome;
    private $dias;
    private $compromissos = array();

    public function __construct($name,$days){
        $this->nome = $name;
        $this->dias = $days;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    
    public function getDias()
    {
        return $this->dias;
    }

    public function setDias($dias)
    {
        $this->dias = $dias;
    }

    public function adicionarEvento($pos,$nome,$descricao){
        $this->compromissos[$pos] = new compromisso("niver amigo","nenhuma","21:00");
    }

    public function exibirEventos($j){
        echo $this->compromissos[$j];
    }


}



?>