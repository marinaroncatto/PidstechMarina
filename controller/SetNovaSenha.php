<?php

include_once '../model/Usuario.php';

$autentica = new Usuario();

$login = $_POST['login'];
$novasenha = $_POST['senha'];
$chave = $_POST['chave'];

$email = preg_replace('/[^[:alnum:]_.-@]/','',$email);
$chave = preg_replace('/[^a-zA-Z0-9]/','',$_GET['chave']);
$novasenha = addslashes($senha);

$result = $autentica->checkChave($login, $chave);

if($chave){
    echo '<a href="http://localhost/PidstechMarina/view/pages/alterarsenha.php?chave='.$chave.'">href="http://localhost/PidstechMarina/view/pages/alterarsenha.php?chave='.$chave.'</a>';
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