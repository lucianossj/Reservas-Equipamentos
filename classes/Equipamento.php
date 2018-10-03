<?php

class Equipamento {

    public $idEquipamento;
    public $idUsuario;
    public $tipo;
    public $numPatrimonio;
    public $numSerie;
    public $statusEquipamento; 

    function __construct($idEquipamento, $idUsuario, $tipo, $numPatrimonio, $numSerie, $statusEquipamento){

        $this->idEquipamento = $idEquipamento;
        $this->idUsuario = $idUsuario;
        $this->tipo = $tipo;
        $this->numPatrimonio = $numPatrimonio;
        $this->numSerie = $numSerie;
        $this->statusEquipamento = $statusEquipamento;

    }

}

?>