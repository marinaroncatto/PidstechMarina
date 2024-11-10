<?php

if(isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
   && isset($_POST['txtNome']) && !empty($_POST['txtNome'])     
   && isset($_POST['txtMensagem']) && !empty($_POST['txtMensagem'])     
        ){
    
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $mensagem = $_POST['txtMensagem'];
    
    $to = "contato@pidstech.com";
    $subject = "CONTATO - PROJETO PIDSTECH";
    $body = 'Nome: '.$nome."\nEmail: ".$email."\nMensagem: ".$mensagem;
    $header = "From:contato@pidstech.com"."\n"."Reply-To:".$email."\n"."X=Mailer:PHP/".phpversion();
    
   if(mail($to, $subject,$body,$header)){
        ?>
        <script type="text/javascript">
            alert('Email enviado com sucesso!');
            history.go(-1);
        </script>
         <?php
   }else{
       ?>
        <script type="text/javascript">
            alert('Erro ao enviar Email');
            history.go(-1);
        </script>
         <?php
       
   }
    
    
}
