<?php

class Equipamento {

    public $idEquipamento;
    public $tipo;
    public $numPatrimonio;
    public $numSerie;
    public $statusEquipamento; 

    function __construct($idEquipamento, $tipo, $numPatrimonio, $numSerie, $statusEquipamento){

        $this->idEquipamento = $idEquipamento;
        $this->tipo = $tipo;
        $this->numPatrimonio = $numPatrimonio;
        $this->numSerie = $numSerie;
        $this->statusEquipamento = $statusEquipamento;

    }

}

?>