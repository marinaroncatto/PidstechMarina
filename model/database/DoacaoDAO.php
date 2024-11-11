<?php

include_once 'DB.php';

class DoacaoDAO {
    
      public function list($id = null) {
            $where = ($id ? "where doa.idDoacao = $id ":'');
        $query = "SELECT
                    doa.idDoacao, doa.titulo, doa.descricao, doa.destino, doa.data_entrada,
                    pe.idPessoa, pe.nome
                  
                 FROM
                    doacao doa
                INNER JOIN pessoa pe on doa.idPessoa = pe.idPessoa"                          
                . " $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
        public function listTriagem() {            
        $query = "SELECT doa.idDoacao, doa.titulo, doa.descricao, doa.destino, "
                . "doa.data_entrada, pe.idPessoa, pe.nome "
                . "FROM doacao doa "
                . "INNER JOIN pessoa pe on doa.idPessoa = pe.idPessoa "
                . "where destino = 'Triagem'";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function listDescarte() {            
        $query = "SELECT doa.idDoacao, doa.titulo, doa.descricao, doa.destino, "
                . "doa.data_entrada, pe.idPessoa, pe.nome "
                . "FROM doacao doa "
                . "INNER JOIN pessoa pe on doa.idPessoa = pe.idPessoa "
                . "where destino = 'Descarte'";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
     public function listAll($id = null) {
        $where = ($id ? "where doa.idDoacao = $id ":'');
        $query = "SELECT
                    doa.idDoacao, doa.titulo, doa.descricao, doa.destino, doa.data_entrada,
                    pe.idPessoa, pe.nome, pe.email, pe.telefone,
                    pf.idPessoaFisica, pf.cpf, pf.rg, pj.idPessoaJuridica, pj.cnpj, pj.responsavel_pj,
                    en.idEndereco, en.bairro, en.rua, en.numero, en.complemento
                 FROM
                    doacao doa
                INNER JOIN pessoa pe on doa.idPessoa = pe.idPessoa
                LEFT JOIN pessoafisica pf on doa.idPessoa = pf.idPessoa
                LEFT JOIN pessoajuridica pj on doa.idPessoa = pj.idPessoa
                INNER JOIN endereco en on doa.idPessoa = en.idPessoa"               
                . " $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
         public function listParc($id = null) {
        $where = ($id ? "where idDoacao = $id":'');
        $query = "SELECT
                    doa.idDoacao, doa.titulo, doa.data_entrada, pe.nome , doa.destino                                       
                 FROM
                    doacao doa
                INNER JOIN pessoa pe on doa.idPessoa = pe.idPessoa"               
                . " $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    
    public function insert(Doacao $obj) {
        $query = "INSERT INTO doacao (idDoacao, titulo, descricao, data_entrada, destino, idPessoa) "
                . "VALUES (null,:titulo, :descricao, :data_entrada, :destino, :idPessoa)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array( ':titulo'=>$obj->titulo,
                              ':descricao'=>$obj->descricao,
                              ':data_entrada'=>$obj->data_entrada,
                              ':destino'=>$obj->destino,                                         
                              ':idPessoa'=>$obj->idPessoa));
        return $conn->rowCount()>0;
    }
    
   
       public function update(Doacao $obj) {
        $query = "UPDATE doacao set titulo = :ptitulo, descricao = :pdescricao, data_entrada = :pdata_entrada, destino = :pdestino, idPessoa = :pidPessoa "
                . "where idDoacao = :pidDoacao";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':ptitulo'=>$obj->titulo,
                             ':pdescricao'=>$obj->descricao,
                             ':pdata_entrada'=>$obj->data_entrada,
                             ':pdestino'=>$obj->destino,                              
                             ':pidPessoa'=>$obj->idPessoa,
                             ':pidDoacao'=>$obj->idDoacao));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from doacao where idDoacao = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
        
        /* 
            
        DELETE doa, pe, pf, pj, en FROM doacao as doa
                LEFT JOIN pessoa  as pe on doa.idPessoa = pe.idPessoa
                LEFT JOIN pessoafisica as pf on doa.idPessoa = pf.idPessoa
                LEFT JOIN pessoajuridica as pj on doa.idPessoa = pj.idPessoa
                LEFT JOIN endereco as en on doa.idPessoa = en.idPessoa               
                where doa.idDoacao = 1; 




         * 
         *          */
    }
}
?>