<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Login</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../css/login.css" />		
		<link rel="stylesheet" type="text/css" href="../css/estilo.css" />		
	</head>	
<body>
	<main>
		<section id="sectionLogin">	
			<div id="DivEsq">
				<p class="center">
				<img id="logoLogin" src="../img/logoLogin.png" alt="Logotipo Pids Tech" title="Logotipo Pids Tech" />
				</p>
			</div>
			
			<div id="DivDir">	
				<section id="sectionForm">
                                    
                                    <?php
                                    $chave = "";
                                    if($_GET['chave']){
                                        
                                    $chave = preg_replace('/[^a-zA-Z0-9]/','',$_GET['chave']);
                                    
                                    ?>
                                    
                                    
					<form name="frmLogin" action="../../controller/SetNovaSenha.php" method="post">
                                            <input  type="hidden" name="chave" value="<?php echo $chave; ?>" />			
                                        <h3 class="ussenha">Alteração de Senha</h3>
                                            
                                        <h3 class="ussenha">Usuário</h3>
					<input class="txtBox" type="text" name="login" value="" required />			
					
					<h3 class="ussenha">Nova senha</h3>
					<input class="txtBox" type="password" name="senha" value="" required />
					
					
				
					<input id="btnEntrar" type="submit" name="btnEntrar" value="Redefinir" />
				
					</form>
                                    <?php
                                    }else{
                                        
                                        ?>
                                            <script type="text/javascript">
                                                alert('Erro: Chave de Acesso não Localizada');
                                                history.go(-1);
                                            </script>
                                            <?php
                                    }
                                    ?>
                                    
				</section>	
			</div>	
		</section>
	</main>
</body>
</html>