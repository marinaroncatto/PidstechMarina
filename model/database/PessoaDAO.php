<?php

include_once 'DB.php';

class PessoaDAO {
     public function list($id = null) {
        $where = ($id ? "where idPessoa = $id":'');
        $query = "SELECT * FROM pessoa $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Pessoa $obj) {
        $query = "INSERT INTO pessoa (idPessoa, nome, email, telefone) "
                . "VALUES (null,:nome, :email, :telefone)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array( ':nome'=>$obj->nome,
                              ':email'=>$obj->email,
                              ':telefone'=>$obj->telefone));
        return $conn->rowCount()>0;
    }
    
    public function update(Pessoa $obj) {
        $query = "UPDATE pessoa set nome = :pnome, email = :pemail, telefone = :ptelefone "
                . "where idPessoa = :pidPessoa";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pnome'=>$obj->nome,
                              ':pemail'=>$obj->email,
                              ':ptelefone'=>$obj->telefone,                              
                              ':pidPessoa'=>$obj->idPessoa));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from pessoa where idPessoa = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}
?>