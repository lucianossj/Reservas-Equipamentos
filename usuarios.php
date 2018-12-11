<?php

include_once 'classes/Usuario.php';
include_once 'dao/UsuarioDAO.php';

if (version_compare(phpversion(), '7.1', '>=')) {
    ini_set('serialize_precision', -1);
}

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {

    case 'GET':

        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);

            $dao = new UsuarioDAO;
            $usuario = $dao->buscarId($id);

            $usuario_json = json_encode($usuario);
            header('Content-Type:application/json');
            echo ($usuario_json);
        } else {
            $dao = new UsuarioDAO;
            $usuarios = $dao->listar();

            $usuario_json = json_encode($usuarios);
            header('Content-Type:application/json');
            echo ($usuario_json);
        }
        break;

    case 'POST':
        $data = file_get_contents("php://input");
        $var = json_decode($data);

        $usuario = new Usuario(0, $var->tipo, $var->nome, $var->nomeUsuario, $var->senha, $var->email);

        $dao = new UsuarioDAO;
        $usuario = $dao->inserir($usuario);

        $usuario_json = json_encode($usuario);
        header('HTTP/1.1 201 Created');
        header('Content-Type:application/json');

        echo ($usuario_json);

        break;

    case 'PUT':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $data = file_get_contents("php://input");
            $var = json_decode($data);
            $usuario = new Usuario($id, $var->tipo, $var->nome, $var->nomeUsuario, $var->senha);

            $dao = new UsuarioDAO;
            $dao->atualizar($usuario);

            $usuario_json = json_encode($usuario);
            header('Content-Type:application/json');
            echo ($usuario_json);
        }
        break;

    case 'DELETE':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);

            $dao = new UsuarioDAO;
            $usuario = $dao->buscarId($id);
            $dao->deletar($id);

            $usuario_json = json_encode($usuario);
            header('Content-Type:application/json');
            echo ($usuario_json);

            break;
        }

    default:
        header('HTTP/1.1 405 Method Not Allowed');
        break;

}
