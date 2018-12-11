<?php

class Usuario {

    public $idUsuario;
    public $tipo;
    public $nome;
    public $nomeUsuario;
    public $senha;
    public $email;

    function __construct($idUsuario, $tipo, $nome, $nomeUsuario, $senha, $email){

        $this->idUsuario = $idUsuario;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->nomeUsuario = $nomeUsuario;
        $this->senha = $senha;
        $this->email = $email;

    }

}

?>