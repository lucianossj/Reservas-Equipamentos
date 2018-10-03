<?php

include_once 'classes/Usuario.php';
include_once 'dao/UsuarioDAO.php';

if(version_compare(phpversion(), '7.1', '>=')){
    ini_set('serialize_precision', -1);
}

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){

    case 'POST':
        $data = file_get_contents("php://input");
        $var = json_decode($data);

        $usuario = new Usuario(0, $var->tipo, $var->nome, $var->nomeUsuario, $var->senha);

        $dao = new UsuarioDAO;
        $usuario = $dao->inserir($usuario);

        $usuario_json = json_encode($usuario);
        header('HTTP/1.1 201 Created');
        header('Content-Type:application/json');

        echo($usuario_json);

        break;

    default:
        header('HTTP/1.1 405 Method Not Allowed');

}

?>