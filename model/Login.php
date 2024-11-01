<?php

include_once 'Usuario.php';
abstract class Login {
    
     public static function criaSessao($idUsuario) {              
        session_start();//criar a sessão
        $_SESSION['status'] = 'logado';
        $_SESSION['idUsuario'] = $idUsuario;
        header('location: ../view/pages/homeadm.php');
        
    }
    
     public static function verificaLogin($login, $senha) {
        $user = new Usuario();
        $resultado = $user->autenticaUsuario($login, $senha);
        $idUsuario = $resultado->idUsuario;
        self::criaSessao($idUsuario);
    }
    
    public static function verificaSessao() {
        session_start();//sempre que interagimos com a sessão precisamos começar com esse comando
        if($_SESSION['status'] != 'logado'){
            ?>
            <script>
                alert('Por favor, realize o login');
                document.location.href='../view/pages/login.php';
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
