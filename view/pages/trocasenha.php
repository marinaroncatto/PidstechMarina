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
                                    <form name="frmLogin" action="../../controller/TrocaSenha.php" method="post">
					
                                        <h3 class="ussenha">Login:</h3>
					<input class="txtBox" type="text" name="login" value="" required />
                                            
                                        <h3 class="ussenha">Informe o seu E-mail:</h3>
					<input class="txtBox" type="text" name="email" value="" required />																						
				
					<input id="btnEntrar" type="submit" name="btnEntrar" value="Enviar" />
				
					</form>
				</section>	
			</div>	
		</section>
	</main>
</body>
</html>