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
				<h1 id="Tpagina">Cadastro de Usuário</h1>
			</div>
		
		</div>
		
		<div id="divForm">
                    <form name="frmUsuario" action="../../controller/UsuarioBO.php" method="post">
				
				<div id="divDados1">	
					<h1 class="TCategorias">Novo Usuário</h1>	
					
					<h3 class="TformAdm">*Login:</h3>
						<p class="center">
							<input class="boxTxtAdm" type="text" name="txtLogin" value="" required />
						</p>
                                        <h3 class="TformAdm">*Senha:</h3>
						<p class="center">
                                                    <input class="boxTxtAdm" type="password" name="txtSenha" value="" required />
						</p>
                                                
                                         <h3 class="TformAdmCenter">*Pessoa:</h3>
                                            <p class="center">
                                                <select id="boxTxtDestino" name="pessoa" required>
                                                 <?php
                                                    include_once '../../model/database/PessoaDAO.php';
                                                    $dao = new PessoaDAO();
                                                    $lista = $dao->list();
                                                    foreach ($lista as $value) {
                                                ?>    
                                                <option name="" value=""></option>
                                                <option name="optPessoa" value="<?php echo $value->idPessoa;?>"><?php echo $value->nome;?></option>

                                                //o que entra no banco é o valor do value
                                                 <?php
                                                    }
                                                ?>
                                                </select>

                                            </p>       
					<h3 class="TformAdmCenter">Perfil:</h3>
						<p class="center">
								<select id="boxTxtDestino" name="perfil" required>
								<option name="" value=""></option>
								<option name="opt1" value="Adm">Administrador</option>
								<option name="opt0" value="Pad">Padrão</option>
                                                                //o que entra no banco é o valor do value
								
						</select>
							
						</p>
					
				</div>		
                  													
				
				<div id="divBotoes">
					<p class="center">
                                                <input type="hidden" name="acao" value="inserirUsuario"/>
						<input class="btnAdms" type="submit" name="btnSalvar" value="Salvar" />
						<input class="btnAdms" type="reset" name="btnCancelar" value="Cancelar" />
					</p>
				</div>
			</form>
		
		</div> <!--fim divForm -->
	</section>
	
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