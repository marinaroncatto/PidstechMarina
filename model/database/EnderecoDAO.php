<?php

include_once 'DB.php';

class EnderecoDAO {
    
     public function list($id = null) {
        $where = ($id ? "where idEndereco = $id":'');
        $query = "SELECT * FROM endereco $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Endereco $obj) {
        $query = "INSERT INTO endereco (idEndereco, bairro, rua, numero, complemento, idPessoa) "
                . "VALUES (null,:bairro, :rua, :numero, :complemento, :idPessoa)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array( ':bairro'=>$obj->bairro,
                              ':rua'=>$obj->rua,
                              ':numero'=>$obj->numero,
                              ':complemento'=>$obj->complemento,            
                              ':idPessoa'=>$obj->idPessoa));
        return $conn->rowCount()>0;
    }
    
    public function update(Endereco $obj) {
        $query = "UPDATE endereco set bairro = :pbairro, rua = :prua, numero = :pnumero, complemento = :pcomplemento, idPessoa = :pidPessoa "
                . "where idEndereco = :pidEndereco";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pbairro'=>$obj->bairro,
                              ':prua'=>$obj->rua,
                              ':pnumero'=>$obj->numero,
                              ':pcomplemento'=>$obj->complemento,                                          
                              ':pidPessoa'=>$obj->idPessoa,
                              ':pidEndereco'=>$obj->idEndereco));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from endereco where idEndereco = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}
?>