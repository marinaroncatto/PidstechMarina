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
    
   public function geraChaveAcesso($login, $email) {
    $query = "select 
                us.idUsuario, us.login, us.senha, us.perfil_acesso, us.idPessoa, 
                pe.email 
                from usuario as us 
                INNER JOIN pessoa AS pe ON us.idPessoa = pe.idPessoa 
                where us.login = '$login' and pe.email = '$email'";
    
    
    $conn = DB::getInstancia()->query($query);
    $resultado = $conn->fetchAll();
        if (count($resultado) == 1) { // alterado para apenas usar "=="
           
            $chave = sha1($resultado[0]->idUsuario.$resultado[0]->senha);
            return $chave;
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
      
      public function checkChave($login, $chave) {
        $query = "select 
                us.idUsuario, us.login, us.senha, us.perfil_acesso, us.idPessoa, 
                pe.email 
                from usuario as us 
                INNER JOIN pessoa AS pe ON us.idPessoa = pe.idPessoa 
                where us.login = '$login'";
    
    
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
            if (count($resultado) == 1) { // alterado para apenas usar "=="

                $chaveCorreta = sha1($resultado[0]->idUsuario.$resultado[0]->senha);
                 if($chave == $chaveCorreta){
                     return $resultado[0]->idUsuario;
                 }
            }

      }
  
        public function setNovaSenha($novasenha, $id) {
        $query = "UPDATE usuario SET senha = PASSWORD(:pnovasenha) "
                . "WHERE idUsuario = :pid";
                   
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pnovasenha'=>$novasenha,
                             ':pid'=>$id ));
        return $conn->rowCount()>0;

      }
    

}

?>