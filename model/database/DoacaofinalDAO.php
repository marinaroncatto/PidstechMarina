<?php

include_once 'DB.php';

class DoacaofinalDAO {
    
    
      public function list($id = null) {
            $where = ($id ? "where df.idDoacao_final = $id ":'');
        $query = "SELECT
                    df.idDoacao_final, df.titulo, df.descricao, df.situacao, df.data_saida,
                    pe.idPessoa, pe.nome
                  
                 FROM
                    doacaofinal df
                INNER JOIN pessoa pe on df.idPessoa = pe.idPessoa"                          
                . " $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
        public function listAguardando() {         
        $query = "SELECT
                    df.idDoacao_final, df.titulo, df.descricao, df.situacao, df.data_saida,
                    pe.idPessoa, pe.nome
                  
                 FROM
                    doacaofinal df
                INNER JOIN pessoa pe on df.idPessoa = pe.idPessoa
                WHERE situacao = 'Aguardando'";                          
               
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
       public function listEntregue() {         
        $query = "SELECT
                    df.idDoacao_final, df.titulo, df.descricao, df.situacao, df.data_saida,
                    pe.idPessoa, pe.nome
                  
                 FROM
                    doacaofinal df
                INNER JOIN pessoa pe on df.idPessoa = pe.idPessoa
                WHERE situacao = 'Entregue'";                          
               
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    
     public function listAll($id = null) {
        $where = ($id ? "where df.idDoacao_final = $id ":'');
        $query = "SELECT
                    df.idDoacao_final, df.titulo, df.descricao, df.situacao, df.data_saida,
                    pe.idPessoa, pe.nome, pe.email, pe.telefone,
                    pf.cpf, pf.rg, pj.cnpj, pj.responsavel_pj,
                    en.bairro, en.rua, en.numero, en.complemento
                 FROM
                    doacaofinal df
                INNER JOIN pessoa pe on df.idPessoa = pe.idPessoa
                LEFT JOIN pessoafisica pf on df.idPessoa = pf.idPessoa
                LEFT JOIN pessoajuridica pj on df.idPessoa = pj.idPessoa
                INNER JOIN endereco en on df.idPessoa = en.idPessoa"               
                . " $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
     public function listParc($id = null) {
        $where = ($id ? "where df.idDoacao_final = $id":'');
        $query = "SELECT
                    df.idDoacao_final, df.titulo, df.data_saida, pe.nome, df.situacao                                        
                 FROM
                    doacaofinal df
                INNER JOIN pessoa pe on df.idPessoa = pe.idPessoa"               
                . " $where";
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
    
    public function update(Doacaofinal $obj) {
        $query = "UPDATE doacaofinal set titulo = :ptitulo, descricao = :pdescricao, situacao = :psituacao, data_saida = :pdata_saida, idPessoa = :pidPessoa "
                . "where idDoacao_final = :pidDoacao_final";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':ptitulo'=>$obj->titulo,
                              ':pdescricao'=>$obj->descricao,
                              ':psituacao'=>$obj->situacao,
                              ':pdata_saida'=>$obj->data_saida,            
                              ':pidPessoa'=>$obj->idPessoa,
                              ':pidDoacao_final'=>$obj->idDoacao_final));
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