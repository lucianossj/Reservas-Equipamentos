<?php

include_once 'classes/Equipamento.php';
include_once 'dao/EquipamentoDAO.php';

if(version_compare(phpversion(), '7.1', '>=')){
    ini_set('serialize_precision', -1);
}

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){

    case 'GET':

        if(!empty($_GET["id"])){
            $id = intval($_GET["id"]);

            $dao = new EquipamentoDAO;
            $equipamento = $dao->buscarId($id);

            $equipamento_json = json_encode($equipamento);
            header('Content-Type:application/json');
            echo($equipamento_json);
        }
        else{
            $dao = new EquipamentoDAO;
            $equipamentos = $dao->listar();

            $equipamento_json = json_encode($equipamentos);
            header('Content-Type:application/json');
            echo($equipamento_json);
        }
        break;

    case 'POST':
        $data = file_get_contents("php://input");
        $var = json_decode($data);

        $equipamento = new Equipamento(0, $var->tipo, $var->numPatrimonio, $var->numSerie, $var->statusEquipamento);

        $dao = new EquipamentoDAO;
        $equipamento = $dao->inserir($equipamento);

        $equipamento_json = json_encode($equipamento);
        header('HTTP/1.1 201 Created');
        header('Content-Type:application/json');

        echo($equipamento_json);

        break;

    case 'PUT':
        if(!empty($_GET["id"]))
        {
            $id = intval($_GET["id"]);
            $data = file_get_contents("php://input");
            $var = json_decode($data);
            $equipamento = new Equipamento($id, $var->tipo, $var->numPatrimonio, $var->numSerie, $var->statusEquipamento);

            $dao = new EquipamentoDAO;
            $dao->atualizar($equipamento);

            $equipamento_json = json_encode($equipamento);
            header('Content-Type:application/json');
            echo($equipamento_json);
        }
        break;

    case 'DELETE':
        if(!empty($_GET["id"])){
            $id = intval($_GET["id"]);

            $dao = new EquipamentoDAO;
            $equipamento = $dao->buscarId($id);
            $dao->deletar($id);

            $equipamento_json = json_encode($equipamento);
            header('Content-Type:application/json');
            echo($equipamento_json);

            break;
        }

    default:
        header('HTTP/1.1 405 Method Not Allowed');
        break;

}

?>