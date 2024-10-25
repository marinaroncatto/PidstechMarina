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
		<link rel="stylesheet" type="text/css" href="../css/navadm.css" />
		<link rel="stylesheet" type="text/css" href="../css/tabelas.css" />
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
						<a href="./homeAdm.php">Início</a>
					</li>
					<li>
						<a href="#">Cadastrar</a>
						<ul>
							<li><a href="./doacao.php">Doação ao Projeto</a></li>
							<li><a href="./cadDoacaofinal.php">Doação Final</a></li>						
							<li><a href="./cadUsuario.php">Novo Usuário</a></li>						
						</ul>
					</li>
					<li>
						<a href="#">Consultar ou Editar</a>
						<ul>
							<li><a href="./conDoacao.php">Doações ao Projeto</a></li>
							<li><a href="./conDoacaofinal.php">Doações Finais</a></li>						
							<li><a href="./conUsuario.php">Usuários</a></li>						
						</ul>
					</li>
					<li>
						<a href="../index_pids.php">Sair</a>
					</li>
					
					
				</ul>
			</nav>
		</section>
	</header>	
	
	<hr id="hrSupAdm" />
	
	<section id="sectionMeioAdm">
		
		<div id="divPagina">
			
			<div id="divContorno">
				<h1 id="Tpagina">Consulta de Doações</h1>
			</div>
		
		</div>
		<section id="sectionTabelas">
			
			<article id="articleConsultaG">
			
			<h1 class="TCategorias">Doações Recebidas</h1>
				<div id="divTabG">	
								
					<table class="tabela">
						  <tr>
							<th>Id</th>
							<th>Título</th>
							<th>Data</th>
							<th>Doador(a)</th>
							<th>Disponível</th>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
						  </tr>
						  <tr>
							<td>0</td>
							<td>mouse</td>
							<td>02/01/2024</td>
							<td>Josefina Cardoso</td>
							<td>n</td>
							
						  </tr>
					</table>
				</div> <!--divTabG-->	
			</article> <!--fim articleConsultaG -->
			
			<article id="articleCrud">
				<h1 class="TCategorias">Pesquisar/Editar Doação</h1>
				<div id="divPesquisa">		
						<form name="frmPesquisa" action="#" method="post" >
						<h3 class="TformAdmCenter">Informe o Id: 
							
								<input type="number" name="txtId" value="" />
								<input  type="submit" name="btnPesquisarId" value=" Pesquisar" />														
								</h3>
					</form>		
					<form name="formEditar" action="./editarDoacao.html" method="post">
								<p class="right"><input  type="submit" name="btnEditar" value="Editar" /></p>
					</form>	
				</div>
				
				<div class="divCon1">
				<h3 class="TformAdmCenter">Dados da Doação</h3>
				<table class="tabela">
					  <tr>
						<th>Título</th>
						<th>Descrição</th>
						<th>Destino</th>
						<th>Data</th>
						<th>Disponível</th>
					  </tr>
					  <tr>
						<td>mouse</td>
						<td>entrada usb</td>
						<td>triagem</td>
						<td>02/01/2024</td>
						<td>s</td>
					  </tr>
					 
				</table>
				</div>
				
				<div class="divCon2">
					<h3 class="TformAdmCenter">Dados do Doadoar PF</h3>
					<table class="tabela">
						  <tr>
							<th>Nome</th>
							<th>CPF</th>
							<th>RG</th>
							<th>Telefone</th>
							<th>E-mail</th>
						  </tr>
						  <tr>
							<td>Godofredo Alves</td>
							<td>5465843444</td>
							<td>65465464</td>
							<td>5199668754</td>
							<td>masd@asdasd</td>
						  </tr>
						 
					</table>
				</div>

				<div class="divCon1">	
					<h3 class="TformAdmCenter">Dados do Doadoar PJ</h3>
					<table class="tabela">
						  <tr>
							<th>Nome</th>
							<th>CNPJ</th>
							<th>Responsável PJ</th>
							<th>Telefone</th>
							<th>E-mail</th>
							
						  </tr>
						  <tr>
							<td>Americanas</td>
							<td>5465843444</td>
							<td>Fred</td>						
							<td>456456312</td>						
							<td>Fred@GMAIL</td>						
						  </tr>
						 
					</table>
				</div>
				
				<div class="divCon2">
					<h3 class="TformAdmCenter">Endereço</h3>
					<table class="tabela">
						  <tr>
							<th>Bairro</th>
							<th>Rua</th>
							<th>Número</th>
							<th>Complemento</th>						
						  </tr>
						  <tr>
							<td>Alpes</td>
							<td>Avenida</td>
							<td>05</td>
							<td>ap 01</td>						
						  </tr>
						 
					</table>
				</div>
			</article> <!-- fim articleCrud -->
		</section> <!--fim sectionTabelas -->
	</section> <!--fim sectionMeioAdm -->
	
	<footer>
	
	<div id="divDireitos">
	<p id="txtDireitos">
	© Todos os Direitos Reservados - 2024.
	</p>
	</div>
	</footer>
</main>
</body>
</html>