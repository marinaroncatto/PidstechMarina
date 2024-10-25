<?php

class Usuario {
    private $idUsuario;
    private $login;
    private $senha;
    private $perfil_acesso;
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