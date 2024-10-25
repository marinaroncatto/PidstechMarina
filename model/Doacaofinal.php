<?php

class Doacaofinal {
    private $idDoacao_final;
    private $descricao;
    private $situacao;
    private $data_saida;
    private $idPessoa;
    
    public function __construct() {
        
    }
    
    public function __get($param) {
        return $this->$param;
    }
    
    public function __set($param,$value) {
        $this->$param = $value;
    }
    
    
    
}

?>