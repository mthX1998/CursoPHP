<?php

class Compromisso{

    private $nome;
    private $descricao;
    private $horario;


    public function __construct($n,$desc,$hr){
        $this->nome = $n;
        $this->descricao = $desc;
        $this->horario = $hr;
    }
    
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getHorario()
    {
        return $this->horario;
    }

    
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }
}

?>