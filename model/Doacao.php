<?php

class Doacao {
    
    private $idDoacao;
    private $titulo;
    private $descricao;
    private $data_entrada;
    private $destino;
    private $baixa;
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