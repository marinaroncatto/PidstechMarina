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
				<h1 id="Tpagina">Pessoas Cadastradas</h1>
			</div>
		
		</div>
		<section id="sectionTabelas">
			
                    <article id="articleCrud">
				<h1 class="TCategorias">Pesquisar/Editar Pessoas Cadastradas</h1>
				<div id="divPesquisa">		
                                    <form name="frmPesquisa" action="pessoabyId.php" method="get" >
						<h3 class="TformAdmCenter">Informe o Id: 
							
                                                <input type="number" name="txtId" value="" />
                                                <input  type="submit" name="btnPesquisarId" value=" Pesquisar" />														
                                                </h3>
					</form>		
					<form name="formEditar" action="./editarDoacao.html" method="post">
								
					</form>	
				</div>
				 
			</article> <!-- fim articleCrud -->
                                                                                
			<article id="articleConsultaG">
			
			<h1 class="TCategorias">Pessoas Físicas</h1>
				<div id="divTabG">	
								
					<table class="tabela">
                                             <!-- Dados da listagem -->
                                                <?php
                                                    include_once '../../model/database/PessoaDAO.php';
                                                    $dao = new PessoaDAO();
                                                    $lista = $dao->listPF();
                                                    foreach ($lista as $value) {
                                                        
                                                    
                                                ?>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nome</th>	                                                        	
                                                        <th>Telefone</th>
                                                        <th>E-mail</th>
                                                  </tr>
                                                  <tr>
                                                        <td><?php echo $value->idPessoa;?></td>
                                                        <td><?php echo $value->nome;?></td>                                                       
                                                        <td><?php echo $value->telefone;?></td>
                                                        <td><?php echo $value->email;?></td>
                                                  </tr>
						  <?php
                                                    }
                                                ?>
      
					</table>
				</div> <!--divTabG-->	
                                
                                <h1 class="TCategorias">Pessoas Jurídicas</h1>
				<div id="divTabG">	
								
					<table class="tabela">
                                             <!-- Dados da listagem -->
                                                <?php                                                  
                                                    $listaPJ = $dao->listPJ();
                                                    foreach ($listaPJ as $valuePJ) {
                                                        
                                                    
                                                ?>
                                                   <tr>
                                                        <th>ID</th>
                                                        <th>Nome</th>	                                                        	
                                                        <th>Telefone</th>
                                                        <th>E-mail</th>
                                                  </tr>
                                                  <tr>
                                                        <td><?php echo $valuePJ->idPessoa;?></td>
                                                        <td><?php echo $valuePJ->nome;?></td>                                                        
                                                        <td><?php echo $valuePJ->telefone;?></td>
                                                        <td><?php echo $valuePJ->email;?></td>
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