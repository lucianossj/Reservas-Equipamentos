<?php
    include_once './classes/Equipamento.php';
    include_once './bd/PDOFactory;php';

    class EquipamentoDAO{
        public function inserirEquip(Equipamento $equipamento){

            $sql = "INSERT INTO equipamento";
            $pdo = PDOFactory::getConexao();
            
            $comando = $pdo->prepare($sql);
            
        }






    }





?>