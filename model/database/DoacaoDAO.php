<?php

include_once 'DB.php';

class DoacaoDAO {
    
     public function listAll($id = null) {
        $where = ($id ? "where doa.idDoacao = $id ":'');
        $query = "SELECT
                    doa.idDoacao, doa.titulo, doa.descricao, doa.destino, doa.data_entrada, doa.baixa,
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
                    doa.idDoacao, doa.titulo, doa.data_entrada, pe.nome, doa.baixa                                        
                 FROM
                    doacao doa
                INNER JOIN pessoa pe on doa.idPessoa = pe.idPessoa"               
                . " $where";
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
    
    public function updatePF(DoacaoUpdate $obj) {
        $query = "  UPDATE doacao as doa
                    INNER JOIN pessoa as pe on doa.idPessoa = pe.idPessoa
                    LEFT JOIN pessoafisica as pf on doa.idPessoa = pf.idPessoa                    
                    INNER JOIN endereco en on doa.idPessoa = en.idPessoa
                    SET
                    doa.titulo = :ptitulo, 
                    doa.descricao = :pdescricao, 
                    doa.destino = :pdestino, 
                    doa.data_entrada = :pdata_entrada, 
                    doa.baixa = :pbaixa,
                    pe.nome = :pnome, 
                    pe.email = :pemail, 
                    pe.telefone = :ptelefone,
                    pf.cpf = :pcpf, 
                    pf.rg = :prg,                  
                    en.bairro = :pbairro, 
                    en.rua = :prua, 
                    en.numero = :pnumero, 
                    en.complemento = :pcomplemento
                    WHERE doa.idDoacao = :pidDoacao ";
        
        
        
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':ptitulo'=>$obj->titulo,
                              ':pdescricao'=>$obj->descricao,
                              ':pdata_entrada'=>$obj->data_entrada,
                              ':pdestino'=>$obj->destino,            
                              ':pbaixa'=>$obj->baixa,
                              ':pnome'=>$obj->nome,
                              ':pemail'=>$obj->email,
                              ':ptelefone'=>$obj->telefone,
                              ':pcpf'=>$obj->cpf,
                              ':prg'=>$obj->rg,                              
                              ':pbairro'=>$obj->bairro,
                              ':prua'=>$obj->rua,
                              ':pnumero'=>$obj->numero,
                              ':pcomplemento'=>$obj->complemento,
                              ':pidDoacao'=>$obj->idDoacao));
        return $conn->rowCount()>0;
    }
    
    public function updatePJ(DoacaoUpdate $obj) {
        $query = "  UPDATE doacao as doa
                    INNER JOIN pessoa as pe on doa.idPessoa = pe.idPessoa
                    LEFT JOIN pessoafisica as pf on doa.idPessoa = pf.idPessoa
                    LEFT JOIN pessoajuridica as pj on doa.idPessoa = pj.idPessoa
                    INNER JOIN endereco en on doa.idPessoa = en.idPessoa
                    SET
                    doa.titulo = :ptitulo, 
                    doa.descricao = :pdescricao, 
                    doa.destino = :pdestino, 
                    doa.data_entrada = :pdata_entrada, 
                    doa.baixa = :pbaixa,
                    pe.nome = :pnome, 
                    pe.email = :pemail, 
                    pe.telefone = :ptelefone,
                    pf.cpf = :pcpf, 
                    pf.rg = :prg, 
                    pj.cnpj = :pcnpj, 
                    pj.responsavel_pj = :presponsavel_pj,
                    en.bairro = :pbairro, 
                    en.rua = :prua, 
                    en.numero = :pnumero, 
                    en.complemento = :pcomplemento
                    WHERE doa.idDoacao = :pidDoacao ";
        
        
        
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':ptitulo'=>$obj->titulo,
                              ':pdescricao'=>$obj->descricao,
                              ':pdata_entrada'=>$obj->data_entrada,
                              ':pdestino'=>$obj->destino,            
                              ':pbaixa'=>$obj->baixa,
                              ':pnome'=>$obj->nome,
                              ':pemail'=>$obj->email,
                              ':ptelefone'=>$obj->telefone,
                              ':pcpf'=>$obj->cpf,
                              ':prg'=>$obj->rg,
                              ':pcnpj'=>$obj->cnpj,
                              ':presponsavel_pj'=>$obj->responsavel_pj,
                              ':pbairro'=>$obj->bairro,
                              ':prua'=>$obj->rua,
                              ':pnumero'=>$obj->numero,
                              ':pcomplemento'=>$obj->complemento,
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