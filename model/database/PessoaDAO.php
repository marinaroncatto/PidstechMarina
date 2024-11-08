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
    
      public function listAllPessoas($id = null) {
        $where = ($id ? "where pe.idPessoa = $id;":'');
        $query = " SELECT
                    pe.idPessoa, pe.nome, pe.email, pe.telefone,
                    pf.idPessoaFisica, pf.cpf, pf.rg,
                    pj.idPessoaJuridica, pj.cnpj, pj.responsavel_pj,
                    en.idEndereco, en.bairro, en.rua, en.numero, en.complemento                  
                 FROM
                    pessoa as pe               
                LEFT JOIN pessoafisica as pf on pe.idPessoa = pf.idPessoa
                LEFT JOIN pessoajuridica as pj on pe.idPessoa = pj.idPessoa
                LEFT JOIN endereco as en on pe.idPessoa = en.idPessoa
              	$where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
     public function listPF($id = null) {
        $where = ($id ? "where pe.idPessoa = $id;":'');
        $query = " SELECT
                    pe.idPessoa, pe.nome, pe.email, pe.telefone,
                    pf.idPessoaFisica, pf.cpf, pf.rg,
                    en.idEndereco, en.bairro, en.rua, en.numero, en.complemento                  
                 FROM
                    pessoafisica as pf               
                INNER JOIN pessoa as pe on pf.idPessoa = pe.idPessoa
                LEFT JOIN endereco as en on pf.idPessoa = en.idPessoa
              	$where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
         public function listPJ($id = null) {
        $where = ($id ? "where pe.idPessoa = $id":'');
        $query = "SELECT
                    pe.idPessoa, pe.nome, pe.email, pe.telefone,
                    pj.idPessoaJuridica, pj.cnpj, pj.responsavel_pj,
                    en.idEndereco, en.bairro, en.rua, en.numero, en.complemento                  
                 FROM
                   pessoajuridica as pj               
                INNER JOIN pessoa as pe on pj.idPessoa = pe.idPessoa
                LEFT JOIN endereco as en on pj.idPessoa = en.idPessoa;
              	$where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
        public function listDoacoes($id = null) {
        $where = ($id ? "where pe.idPessoa = $id":'');
        $query = "SELECT
                    pe.idPessoa, pe.nome, 
                    doa.idDoacao, doa.titulo, doa.descricao, doa.destino, doa.data_entrada
                                     
                 FROM
                    pessoa as pe               
                LEFT JOIN  doacao as doa on pe.idPessoa = doa.idPessoa                              
              	$where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
        public function listDoacoesFinais($id = null) {
        $where = ($id ? "where pe.idPessoa = $id":'');
        $query = "SELECT
                    pe.idPessoa, pe.nome,                     
                    df.idDoacao_final, df.titulo, df.descricao, df.situacao, df.data_saida                  
                 FROM
                    pessoa as pe                              
                LEFT JOIN  doacaofinal as df on pe.idPessoa = df.idPessoa              
              	$where";
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
        return $conn->rowCount()>0;;
        //descobrir uma forma de ao invés de retornar o número de colunas alteradas, 
        //retornar o valor do ID criado
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