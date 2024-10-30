<?php

include_once 'DB.php';

class PessoafisicaDAO {
  public function list($id = null) {
        $where = ($id ? "where idPessoaFisica = $id":'');
        $query = "SELECT * FROM pessoafisica $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Pessoafisica $obj) {
        $query = "INSERT INTO pessoafisica (idPessoaFisica, cpf, rg, idPessoa) "
                . "VALUES (null,:cpf, :rg, :idPessoa)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array( ':cpf'=>$obj->cpf,
                              ':rg'=>$obj->rg,
                              ':idPessoa'=>$obj->idPessoa));
        return $conn->rowCount()>0;
    }
    
    public function update(Pessoafisica $obj) {
        $query = "UPDATE pessoafisica set cpf = :pcpf, rg = :prg, idPessoa = :pidPessoa "
                . "where idPessoaFisica = :pidPessoaFisica";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pcpf'=>$obj->cpf,
                              ':prg'=>$obj->rg,
                              ':pidPessoa'=>$obj->idPessoa,                              
                              ':pidPessoaFisica'=>$obj->idPessoaFisica));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from pessoafisica where idPessoaFisica = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}
?>