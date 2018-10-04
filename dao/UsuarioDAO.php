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

        public function listar(){
            $query = 'SELECT * FROM produtos';
            $pdo = PDOFactory::getConexao();

            $comando = $pdo->prepare($query);
            $comando->execute();
            $produtos=array();
            while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $usuarios[] = new Usuario($row->id,$row->tipo,$row->nome,$row->nomeUsuario);
            }
            
            return $usuarios;
        }

        public function atualizar(Usuario $usuario){
            $sql = "UPDATE usuario SET nome=:nome, nomeUsuario=:nomeUsuario, senha=:senha WHERE id=:id";
            $pdo = PDOFactory::getConexao();
            
            $comando = $pdo->prepare($sql);
            $comando->bindParam(":nome", $usuario->nome);
            $comando->bindParam(":nomeUsuario", $usuario->nomeUsuario);
            $comando->bindParam(":senha", $usuario->senha);
            $comando->bindParam(":idUsuario", $usuario->idUsuario);
            $comando->execute();
        
        }

        public function deletar($id){
            $sql = "DELETE from usuario WHERE id=:id";
            $pdo = PDOFactory::getConexao();

            $comando = $pdo->prepare($sql);
            $comando->bindParam(":id", $id);
            $comando->execute();

        }

        public function buscarId($id){
            $query = 'SELECT * FROM usuario WHERE id=:id';
            $pdo = PDOFactory::getConexao();
            
            $comando = $pdo->prepare($query);
            $comando->bindParam(":id", $id);
            $comando->execute();

            $result = $comando->fetch(PDO::FETCH_OBJ);
            return new Usuario($result->id, $result->tipo, $result->nome, $result->nomeUsuario, $result->senha);

        }
    }

?>