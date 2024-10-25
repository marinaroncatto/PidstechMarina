<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Projeto Pids Tech</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
		<link rel="stylesheet" type="text/css" href="../css/layout.css" />
		<link rel="stylesheet" type="text/css" href="../css/imagens.css" />
		<link rel="stylesheet" type="text/css" href="../css/nav.css" />
	</head>	
<body>
<main>
	<header> 
		<section id="cabecalho">
			<div id="divLogo">
				<p class="center"><img id="logoPids" src="../img/LogoPidsTransparente.png" alt="Logotipo Pids Tech" title="Logotipo Pids Tech" /></p>
			</div>
							
			<input type="checkbox" id="bt_menu"/>
			<label for="bt_menu">
			<p class="right"><img id="btnMenu" src="../img/menu-aberto.png" alt="ícone menu" title="ícone menu" /></p>
			</label>
			
			<nav id="menu">
				<ul>
					<li>
						<a href="../index_pids.php">Início</a>
					</li>
					<li>
						<a href="./historia.php">História</a>
					</li>
					<li>
						<a href="./faq.php">FAQ</a>
					</li>
					<li>
						<a href="./localizacao.php">Localização</a>
					</li>
					<li>
						<a href="./contato.php">Contato</a>
					</li>
					<li>
						<a href="./login.php">Login</a>
					</li>
					
				</ul>
			</nav>
		</section>
	</header>	
	
	<hr id="hrSup" />
	
	<section id="sectionMeio">
	
	<h1 class="TboldMenor">Fale Conosco</h1>	
	
	<h3 class="TlightMenor">Deseja fazer uma doação, ser um beneficiário ou se candidatar ao voluntariado? Entre em contato com a nossa equipe preenchendo os campos abaixo!</h3>
	
	<form name="frmFaleConosco" action="#" method="post">
	
	<h3 class="Tform">Nome:</h3>
		<p class="center">
			<input class="boxText" type="text" name="txtNome" value="" required />
		</p>
	<h3 class="Tform">E-mail para contato:</h3>
		<p class="center">
			<input class="boxText" type="email" name="txtEmail" value="" required />
		</p>	
	<h3 class="Tform">Assunto:</h3>
		<p class="center">
			<input class="boxText" type="text" name="txtAssunto" value=""  />
		</p>
	<h3 class="Tform">Mensagem:</h3>
		<p class="center">
			<textarea id="boxMensagem" cols="30" rows="10" name="txtMensagem" value="" required></textarea>			
		</p>
		<p class="center">
			<input id="btnEnviarMensagem" type="submit" name="btnEnviarMensagem" value="Enviar Mensagem" />
		</p>
	</form>
	
	</section> <!--fim sectionMeio -->
	
	<footer>
		
	<div id="divContRodape"> 
	
	<div id="divLogoSub">
	
	<p class="center">	
		<img id="LogoSub" src="../img/logosenacbranco.png"  alt="Logo do Senac em Branco" title="Senac" />	
	</p>	
	</div>
	<nav id="MenuRodape">
				<ul>
					<li>
						<a href="../index_pids.php">Início</a>
					</li>
					<li>
						<a href="./historia.php">História</a>
					</li>
					<li>
						<a href="./faq.php">FAQ</a>
					</li>
					<li>
						<a href="./localizacao.php">Localização</a>
					</li>
					<li>
						<a href="./contato.php">Contato</a>
					</li>
										
				</ul>
	
	</nav>
	<nav id="NavloginRodape">
		<ul>	
			<li>
				<h3 id="h3rodape">Area Administrativa</h3>
			</li>
			<li>
				<a href="./login.php">Login</a>
			</li>
		</ul>	
	</nav>
	
	</div> <!-- fim divContRodape -->
	<div id="divDireitos">
	<p id="txtDireitos">
	© Todos os Direitos Reservados - 2024.
	</p>
	</div>
	</footer>
</main>
</body>
</html>