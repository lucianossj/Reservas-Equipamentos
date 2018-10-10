<?php
    include_once './classes/Equipamento.php';
    include_once './bd/PDOFactory.php';

    class EquipamentoDAO{
        public function inserir(Equipamento $equipamento){

            $sql = "INSERT INTO equipamento (tipo, numPatrimonio, numSerie, statusEquipamento) VALUES (:tipo, :numPatrimonio, :numSerie, :statusEquipamento)";
            $pdo = PDOFactory::getConexao();
            
            $comando = $pdo->prepare($sql);
            $comando->bindParam(":tipo",$equipamento->tipo);
            $comando->bindParam(":numPatrimonio",$equipamento->numPatrimonio);
            $comando->bindParam(":numSerie",$equipamento->numSerie);
            $comando->bindParam(":statusEquipamento",$equipamento->statusEquipamento);
            $comando->execute();

            $equipamento->idEquipamento = $pdo->lastInsertId();

            return $equipamento;
            
        }
        
        public function listar(){
            $query = 'SELECT * FROM equipamento';
            $pdo = PDOFactory::getConexao();

            $comando = $pdo->prepare($query);
            $comando->execute();
            $equipamentos=array();
            while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $equipamentos[] = new Equipamento($row->idEquipamento, $row->tipo, $row->numPatrimonio, $row->numSerie, $row->statusEquipamento);
            }
            
            return $equipamentos;
        }

        public function atualizar(Equipamento $equipamento){
            $sql = "UPDATE equipamento SET tipo=:tipo, numPatrimonio=:numPatrimonio, numSerie=:numSerie, statusEquipamento=:statusEquipamento WHERE idEquipamento=:idEquipamento";
            $pdo = PDOFactory::getConexao();
            
            $comando = $pdo->prepare($sql);
            $comando->bindParam(":tipo", $equipamento->tipo);
            $comando->bindParam(":numPatrimonio", $equipamento->numPatrimonio);
            $comando->bindParam(":numSerie", $equipamento->numSerie);
            $comando->bindParam(":statusEquipamento", $equipamento->statusEquipamento);
            $comando->bindParam(":idEquipamento", $equipamento->idEquipamento);
            $comando->execute();
        
        }

        public function deletar($id){
            $sql = "DELETE from equipamento WHERE idEquipamento=:idEquipamento";
            $pdo = PDOFactory::getConexao();

            $comando = $pdo->prepare($sql);
            $comando->bindParam(":idEquipamento", $id);
            $comando->execute();

        }

        public function buscarId($id){
            $query = 'SELECT * FROM equipamento WHERE idEquipamento=:idEquipamento';
            $pdo = PDOFactory::getConexao();
            
            $comando = $pdo->prepare($query);
            $comando->bindParam(":idEquipamento", $id);
            $comando->execute();

            $result = $comando->fetch(PDO::FETCH_OBJ);
            return new equipamento($result->idEquipamento, $result->tipo, $result->numPatrimonio, $result->numSerie, $result->statusEquipamento);

        }
    }

?>