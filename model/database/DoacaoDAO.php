<?php

include_once 'DB.php';

class DoacaoDAO {
    
     public function list($id = null) {
        $where = ($id ? "where idDoacao = $id":'');
        $query = "SELECT * FROM doacao $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Doacao $obj) {
        $query = "INSERT INTO doacao (idDoacao, titulo, descricao, data_entrada, destino, baixa, idPessoa) "
                . "VALUES (null,:titulo, :descricao, :data_entrada, :destino, :baixa, :idPessoa)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array( ':titulo'=>$obj->titulo,
                              ':descricao'=>$obj->descricao,
                              ':data_entrada'=>$obj->data_entrada,
                              ':destino'=>$obj->destino,            
                              ':baixa'=>$obj->baixa,
                              ':idPessoa'=>$obj->idPessoa));
        return $conn->rowCount()>0;
    }
    
    public function update(Doacao $obj) {
        $query = "UPDATE doacao set titulo = :ptitulo, descricao = :pdescricao, data_entrada = :pdata_entrada, destino = :pdestino, baixa = :pbaixa, idPessoa = :pidPessoa "
                . "where idDoacao = :pidDoacao";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':ptitulo'=>$obj->titulo,
                              ':pdescricao'=>$obj->descricao,
                              ':pdata_entrada'=>$obj->data_entrada,
                              ':pdestino'=>$obj->destino,            
                              ':pbaixa'=>$obj->baixa,
                              ':pidPessoa'=>$obj->idPessoa,
                              ':pidDoacao'=>$obj->idDoacao));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from doacao where idDoacao = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}
?>