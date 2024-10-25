<?php

class Endereco {
    
    private $idEndereco;
    private $bairro;
    private $rua;
    private $numero;
    private $complemento;
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