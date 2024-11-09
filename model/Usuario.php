<?php

include_once 'database/DB.php';
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
    
    public function autenticaUsuario($login, $senha) {
    $query = "select * from usuario where login = '$login' "
            . "and senha = PASSWORD('$senha')";
    $conn = DB::getInstancia()->query($query);
    $resultado = $conn->fetchAll();
        if (count($resultado) == 1) { // alterado para apenas usar "=="
            return $resultado;
      }else{
          ?>
            <script type="text/javascript">
                alert('Erro na autenticação');
                history.go(-1);
            </script>
            <?php
          return 0;
      }
  }
    
    
}

?>