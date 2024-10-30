<?php

include_once 'DB.php';

class DoacaofinalDAO {
     public function list($id = null) {
        $where = ($id ? "where idDoacao_final = $id":'');
        $query = "SELECT * FROM doacaofinal $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Doacaofinal $obj) {
        $query = "INSERT INTO doacaofinal (idDoacao_final, titulo, descricao, situacao, data_saida, idPessoa) "
                . "VALUES (null,:titulo, :descricao, :situacao, :data_saida, :idPessoa)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array( ':titulo'=>$obj->titulo,
                              ':descricao'=>$obj->descricao,
                              ':situacao'=>$obj->situacao,
                              ':data_saida'=>$obj->data_saida,            
                              ':idPessoa'=>$obj->idPessoa));
        return $conn->rowCount()>0;
    }
    
    public function update(Doacao $obj) {
        $query = "UPDATE doacaofinal set titulo = :ptitulo, descricao = :pdescricao, situacao = :situacao, data_saida = :data_saida, idPessoa = :pidPessoa "
                . "where idDoacao_final = :pidDoacao_final";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':ptitulo'=>$obj->titulo,
                              ':pdescricao'=>$obj->descricao,
                              ':situacao'=>$obj->situacao,
                              ':data_saida'=>$obj->data_saida,            
                              ':idPessoa'=>$obj->idPessoa,
                              ':idDoacao_final'=>$obj->idDoacao_final));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from doacaofinal where idDoacao_final = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}
?>