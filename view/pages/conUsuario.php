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
                <?php
                    include_once '../../model/Login.php';
                    Login::verificaSessao();
                    Login::verificaPerfil();
                ?>
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
                                                        <li><a href="./pessoa.php">Pessoa</a></li>
							<li><a href="./doacao.php">Doação ao Projeto</a></li>                                                       
							<li><a href="./cadDoacaofinal.php">Doação Final</a></li>						
							<li><a href="./cadUsuario.php">Novo Usuário</a></li>						
						</ul>
					</li>
					<li>
						<a href="#">Consultar ou Editar</a>
						<ul>
							<li><a href="./conPessoa.php">Pessoas Cadastradas</a></li>
                                                        <li><a href="./conDoacao.php">Doações ao Projeto</a></li>
							<li><a href="./conDoacaofinal.php">Doações Finais</a></li>						
							<li><a href="./conUsuario.php">Usuários</a></li>						
						</ul>
					</li>
					<li>
						<a href="../../controller/LogoutBO.php">Sair</a>
					</li>
					
					
				</ul>
			</nav>
		</section>
	</header>	
	
	<hr id="hrSupAdm" />
	
	<section id="sectionMeioAdm">
		
		<div id="divPagina">
			
			<div id="divContorno">
				<h1 id="Tpagina">Usuários Cadastrados</h1>
			</div>
		
		</div>
		<section id="sectionTabelas">
			
                    <article id="articleCrud">
				<h1 class="TCategorias">Pesquisar/Editar Usuário</h1>
				<div id="divPesquisa">		
                                    <form name="frmPesquisa" action="usuariobyId.php" method="get" >
						<h3 class="TformAdmCenter">Informe o Id: 
							
                                                    <input type="number" name="txtId" value="" />
                                                    <!-- <input type="number" name="txtId" value="" <?php // perfil de acesso: session_start(); if($_SESSION['perfil']=='Pad'){echo 'disabled'; }?>/> -->
                                                    
                                                <input  type="submit" name="btnPesquisarId" value=" Pesquisar" />														
                                                </h3>
					</form>		
					<form name="formEditar" action="./editarDoacao.html" method="post">
								
					</form>	
				</div>
				 
			</article> <!-- fim articleCrud -->
                                                                                
			<article id="articleConsultaG">
			
			<h1 class="TCategorias">Usuários Cadastrados</h1>
				<div id="divTabG">	
								
					<table class="tabela">
                                              <tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Login</th>
							<th>Perfil</th>
							
						  </tr>
						  <tr>
                                             <!-- Dados da listagem -->
                                                <?php
                                                    include_once '../../model/database/UsuarioDAO.php';
                                                    $dao = new UsuarioDAO();
                                                    $lista = $dao->list();
                                                    foreach ($lista as $value) {
                                                        
                                                    
                                                ?>
						
							<td><?php echo $value->idUsuario;?></td>
                                                        <td><?php echo $value->nome;?></td>
							<td><?php echo $value->login;?></td>                                                     							
							<td><?php echo $value->perfil_acesso;?></td>
							
						  </tr>
						 
                                                   <?php
                                                    }
                                                ?>
					</table>
                                    
				</div> <!--divTabG-->	
			</article> <!--fim articleConsultaG -->
						
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