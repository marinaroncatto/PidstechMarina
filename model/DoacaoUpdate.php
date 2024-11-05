<?php

include_once 'Doacao.php';
include_once 'Pessoa.php';
include_once 'Pessoafisica.php';
include_once 'Pessoajuridica.php';
include_once 'Endereco.php';

class DoacaoUpdate {
    private Doacao $doacao;
    private Pessoa $pessoa;
    private Pessoafisica $pessoafísica;
    private Pessoajuridica $pessoajuridica;
    private Endereco $endereco;
    
    public function __construct() {
        $this->doacao = new Doacao();  
        $this->pessoa = new Pessoa();  
        $this->pessoafisica = new Pessoafisica();
        $this->pessoajuridica = new Pessoajuridica();
        $this->endereco = new Endereco();
    }
    
     public function __get($param) {
        return $this->$param;
    }
    
    public function __set($param,$value) {
        $this->$param = $value;
    }
    
    
    
}
