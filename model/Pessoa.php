<?php

class Pessoa {
    
    private $idPessoa;
    private $nome;
    private $email;
    private $telefone;
    
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