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
				<h1 id="Tpagina">Editar Doação</h1>
			</div>
		
		</div>
		
		<div id="divForm">
                    <form name="frmDoacao" action="../../controller/DoacaoFinalBO.php" method="post">
				<?php
                                include_once '../../model/database/DoacaofinalDAO.php';
                                $dao = new DoacaofinalDAO();
                                $id = $_GET['idDoacao_final'];
                                $lista = $dao->list($id);
                                foreach ($lista as $value) {
                                    
                                                                        
                              ?>
				<div id="divDados1">	
					<h1 class="TCategorias">Dados da Doação ao Beneficiário</h1>	
					
                                        <h3 class="TformAdm">ID:</h3>
						<p class="center">	
							<input class="boxTxtAdm" type="number" name="txtId" value="<?php echo $value->idDoacao_final;?>" />
						</p>
					<h3 class="TformAdm">*Título:</h3>
						<p class="center">
							<input class="boxTxtAdm" type="text" name="txtTitulo" value="<?php echo $value->titulo;?>" required />
						</p>
					<h3 class="TformAdm">Descrição:</h3>
						<p class="center">
							<textarea id="boxTxtDescricao" cols="30" rows="10" name="txtDescricao" value="<?php echo $value->descricao ;?>" ><?php echo $value->descricao ;?></textarea>			
						</p>
					<h3 class="TformAdmCenter">Situação:</h3>
						<p class="center">
								<select id="boxTxtDestino" name="situacao" required>
								<option name="" value="<?php echo $value->sitiacao ;?>"><?php echo $value->situacao ;?></option>
								<option name="optTriagem" value="Aguardando">Aguardando</option>
								<option name="optDescarte" value="Entregue">Entregue</option>
                                                                //o que entra no banco é o valor do value
								
						</select>
							
						</p>
					<h3 class="TformAdmCenter">Data de Saída:</h3>
						<p class="center">
							<input id="boxData" type="date" name="txtData" value="<?php echo $value->data_saida;?>"  />
						</p>
                                                <h3 class="TformAdmCenter">Doador(a):</h3>
						<p class="center">
								<select id="boxTxtDestino" name="doador" required>
                                                                 
                                                                   <option name="" value="<?php echo $value->idPessoa;?>"><?php echo $value->nome;?></option> 
                                                               
                                                                 <?php
                                                                    include_once '../../model/database/PessoaDAO.php';
                                                                    $dao = new PessoaDAO();
                                                                    $lista = $dao->list();
                                                                    foreach ($lista as $value) {
                                                                ?>    
								
								<option name="optTriagem" value="<?php echo $value->idPessoa;?>"><?php echo $value->nome;?></option>
							
                                                                //o que entra no banco é o valor do value
								 <?php
                                                                    }
                                                                ?>
						</select>        
					
				</div>
				                                        				
				<div id="divBotoes">
					<p class="center">
                                                
                                            
                                                <input type="hidden" name="idDoacao" value="<?php echo $value->idDoacao_final;?>"/>
                                                <input type="hidden" name="acao" value="alterar"/>
						<input class="btnAdms" type="submit" name="btnAtualizar" value="Atualizar" />
						<input class="btnAdms" type="reset" name="btnCancelar" value="Cancelar" />
					</p>
				</div>
                        <?php
                                }
                        ?>
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