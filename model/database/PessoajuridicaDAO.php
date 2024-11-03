<?php

include_once 'DB.php';

class PessoajuridicaDAO {
   public function list($id = null) {
        $where = ($id ? "where idPessoaJuridica = $id":'');
        $query = "SELECT * FROM pessoajuridica $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Pessoajuridica $obj) {
        $query = "INSERT INTO pessoajuridica (idPessoaJuridica, cnpj, responsavel_pj, idPessoa) "
                . "VALUES (null,:cnpj, :responsavel_pj, :idPessoa)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array( ':cnpj'=>$obj->cnpj,
                              ':responsavel_pj'=>$obj->responsavel_pj,
                              ':idPessoa'=>$obj->idPessoa));
        return $conn->rowCount()>0;
    }
    
    public function update(Pessoajuridica $obj) {
        $query = "UPDATE pessoajuridica set cnpj = :pcnpj, responsavel_pj = :presponsavel_pj, idPessoa = :pidPessoa "
                . "where idPessoaJuridica = :pidPessoaJuridica";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pcnpj'=>$obj->cnpj,
                              ':presponsavel_pj'=>$obj->responsavel_pj,
                              ':pidPessoa'=>$obj->idPessoa,                              
                              ':pidPessoaJuridica'=>$obj->idPessoaJuridica));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from pessoajuridica where idPessoaJuridica = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}
?>