<?php
    include_once './classes/Usuario.php';
    include_once './bd/PDOFactory.php';

    class UsuarioDAO {
        public function inserir(Usuario $usuario){
            
            $sql = "INSERT INTO usuario(tipo, nome, nomeUsuario, senha) VALUES (:tipo, :nome, :nomeUsuario, :senha);";
            $pdo = PDOFactory::getConexao();
            
            $comando = $pdo->prepare($sql);
            $comando->bindParam(":tipo",$usuario->tipo);
            $comando->bindParam(":nome",$usuario->nome);
            $comando->bindParam(":nomeUsuario",$usuario->nomeUsuario);
            $comando->bindParam(":senha",$usuario->senha);

            $comando->execute();

            $usuario->idUsuario = $pdo->lastInsertId();

            return $usuario;


        }


    }






?>