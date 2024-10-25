<?php

class Pessoafisica {
    private $cpf;
    private $rg;
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