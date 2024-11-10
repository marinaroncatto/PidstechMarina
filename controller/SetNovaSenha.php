<?php

include_once '../model/Usuario.php';

$autentica = new Usuario();

$login = $_POST['login'];
$novasenha = $_POST['senha'];
$chave = $_POST['chave'];


$chave = preg_replace('/[^a-zA-Z0-9]/','',$_POST['chave']);
$novasenha = addslashes($_POST['senha']);


$result = $autentica->checkChave($login, $chave);


if($result){
   $alterasenha = $autentica->setNovaSenha($novasenha, $result);
    ?>
            <script type="text/javascript">
                alert('Senha alterada com sucesso!');
                location.href = '../view/pages/login.php';
            </script>
            <?php
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