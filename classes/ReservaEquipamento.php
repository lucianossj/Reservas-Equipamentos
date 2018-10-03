<?php

class ReservaEquipamento {

    public $idReservaEquipamento;
    public $idEquipamento;
    public $idUsuario;
    public $numSala;
    public $responsavel;
    public $curso;
    public $disciplina; 

    function __construct($idReservaEquipamento, $idEquipamento, $idUsuario, $numSala, $responsavel, $curso, $disciplina){

        $this->idReservaEquipamento = $idReservaEquipamento;
        $this->idEquipamento = $idEquipamento;
        $this->idUsuario = $idUsuario;
        $this->numSala = $$numSala;
        $this->responsavel = $responsavel;
        $this->curso = $curso;
        $this->disciplina = $disciplina;

    }

}

?>