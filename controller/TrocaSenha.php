<?php

include_once '../model/Usuario.php';

$autentica = new Usuario();

$email = $_POST['email'];
$login = $_POST['login'];

$email = preg_replace('/[^[:alnum:]_.-@]/','',$email);

$chave = $autentica->geraChaveAcesso($login, $email);

if($chave){
    echo '<br/><h1>Clique no link abaixo para redefinir a senha: </h1><a href="http://localhost/PidstechMarina/view/pages/alterarsenha.php?chave='.$chave.'">href="http://localhost/PidstechMarina/view/pages/alterarsenha.php?chave='.$chave.'</a>';
}else{
    ?>
            <script type="text/javascript">
                alert('Erro: Usuario não encontrado');
                history.go(-1);
            </script>
            <?php
          return 0;
}




?>