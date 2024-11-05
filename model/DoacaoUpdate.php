<?php

include_once 'Doacao.php';
include_once 'Pessoa.php';
include_once 'Pessoafisica.php';
include_once 'Pessoajuridica.php';
include_once 'Endereco.php';

class DoacaoUpdate {
    private Doacao $doacao;
    private Pessoa $pessoa;
    private Pessoafisica $pessoafisica;
    private Pessoajuridica $pessoajuridica;
    private Endereco $endereco;
    
    public function __constructPF(Doacao $d, Pessoa $p, Pessoafisica $pf, Endereco $e) { 
        $this->doacao = $d;
        $this->pessoa = $p;  
        $this->pessoafisica = $pf;    
        $this->endereco = $e;
    }
    
      public function __constructPJ(Doacao $d, Pessoa $p, Pessoajuridica $pj, Endereco $e) { 
        $this->doacao = $d;
        $this->pessoa = $p;          
        $this->pessoajuridica = $pj;
        $this->endereco = $e;
    }
    
     public function __get($param) {
        return $this->$param;
    }
    
    public function __set($param,$value) {
        $this->$param = $value;
    }
    
    
    
}
