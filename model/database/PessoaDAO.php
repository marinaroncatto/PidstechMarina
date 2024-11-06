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
    
    /* public function updatePF(DoacaoUpdate $obj) {
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
    } */
    
    
    
    
    
    
}
?>