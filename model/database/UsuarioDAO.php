<?php

include_once 'DB.php';

class UsuarioDAO {
  public function list($id = null) {
        $where = ($id ? "where idUsuario = $id":'');
        $query = "SELECT * FROM usuario $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Usuario $obj) {
        $query = "INSERT INTO usuario (idUsuario, login, senha, perfil_acesso, idPessoa) "
                . "VALUES (null,:login, :senha, :perfil_acesso, :idPessoa)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array( ':login'=>$obj->login,
                              ':senha'=>$obj->senha,
                              ':perfil_acesso'=>$obj->perfil_acesso,
                              ':idPessoa'=>$obj->idPessoa));
        return $conn->rowCount()>0;
    }
    
    public function update(Usuario $obj) {
        $query = "UPDATE usuario set login = :plogin, senha = :psenha, perfil_acesso = :pperfil_acesso, idPessoa = :pidPessoa "
                . "where idUsuario = :pidUsuario";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':plogin'=>$obj->login,
                              ':psenha'=>$obj->senha,
                              'pperfil_acesso'=>$obj->perfil_acesso,
                              ':pidPessoa'=>$obj->idPessoa,                              
                              ':pidUsuario'=>$obj->idUsuario));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from usuario where idUsuario = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}
?>