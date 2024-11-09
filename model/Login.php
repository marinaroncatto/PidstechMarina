<?php

include_once 'Usuario.php';
abstract class Login {
    
     public static function criaSessao($idUsuario, $perfil_acesso) {              
        session_start();//criar a sessão
        $_SESSION['status'] = 'logado';
        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['perfil'] = $perfil_acesso;
         
        header('location: ../view/pages/homeadm.php');        
    }
    
     public static function verificaLogin($login, $senha) {
        $user = new Usuario();
        $resultado = $user->autenticaUsuario($login, $senha);
         if (is_array($resultado)){ // Testa se o retorno é um array preenchido
             foreach ($resultado as $value) {
                $idUsuario  = $value->idUsuario;
                $perfil_acesso = $value->perfil_acesso;
             }
            
//                  var_dump($resultado);
//                 die('teste');
        self::criaSessao($idUsuario, $perfil_acesso);
        }else{// se não for, envia para o login
            header('location: ../view/pages/login.php');
        }
     }      
     
    
    public static function verificaSessao() {
        session_start();//sempre que interagimos com a sessão precisamos começar com esse comando
        if($_SESSION['status'] != 'logado'){
            ?>
            <script>
                alert('Por favor, realize o login');
                document.location.href="../view/pages/login.php";
            </script>

            <?php     
        }else{
            return true;
            }
        }
    public static function verificaPerfil() {
        
        if($_SESSION['perfil'] != 'Administrador'){
           
            ?>
            <script>
                alert('Para acessar essa página é necessário ser Admnistrador do sistema.');
                history.go(-1);
            </script>

            <?php     
        }else{
            return true;
            }
        }    
     public static function deslogar(){
        session_start();
        session_destroy();       
        
    
    }
    
}
