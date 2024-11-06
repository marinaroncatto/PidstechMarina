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
                    <form name="frmDoacao" action="../../controller/DoacaoBO.php" method="post">
				<?php
                                include_once '../../model/database/DoacaoDAO.php';
                                $dao = new DoacaoDAO();
                                $id = $_GET['idDoacao'];
                                $lista = $dao->listAll($id);
                                foreach ($lista as $value) {
                              ?>
				<div id="divDados1">	
					<h1 class="TCategorias">Dados da Doação</h1>	
					
                                        <h3 class="TformAdm">ID:</h3>
						<p class="center">	
							<input class="boxTxtAdm" type="number" name="txtId" value="<?php echo $value->idDoacao;?>" />
						</p>
					<h3 class="TformAdm">*Título:</h3>
						<p class="center">
							<input class="boxTxtAdm" type="text" name="txtTitulo" value="<?php echo $value->titulo;?>" required />
						</p>
					<h3 class="TformAdm">Descrição:</h3>
						<p class="center">
							<textarea id="boxTxtDescricao" cols="30" rows="10" name="txtDescricao" value="<?php echo $value->descricao ;?>" ></textarea>			
						</p>
					<h3 class="TformAdmCenter">Destino:</h3>
						<p class="center">
								<select id="boxTxtDestino" name="destino" required>
								<option name="" value="<?php echo $value->destino ;?>"><?php echo $value->destino ;?></option>
								<option name="optTriagem" value="triagem">Triagem</option>
								<option name="optDescarte" value="descarte">Descarte</option>
                                                                //o que entra no banco é o valor do value
								
						</select>
							
						</p>
					<h3 class="TformAdmCenter">*Data de entrada:</h3>
						<p class="center">
							<input id="boxData" type="date" name="txtData" value="<?php echo $value->data_entrada;?>" required />
						</p>
					<h3 class="TformAdmCenter">Dar baixa</h3>
						<p class="center">
							<input id="checkbox" type="checkbox" name="boxBaixa" value="<?php echo $value->baixa;?>" />
						</p>
				</div>
				
                                        <?php
                                             if(!empty($value->cpf)){
                                            ?>
                        
                                                <div id="DivDados2">	
                                                        <h1 class="TCategorias">Dados do(a) Doador(a) PF</h1>	
                                                        <input type="hidden" name="acao" value="alterarPF"/>
                                                        <h3 class="TformAdm">Nome Completo:</h3>
                                                                <p class="center">
                                                                        <input class="boxTxtAdm" type="text" name="txtNome" value="<?php echo $value->nome;?>" />
                                                                </p>
                                                        <h3 class="TformAdm">CPF:</h3>
                                                                <p class="center">	
                                                                        <input class="boxTxtAdm" type="number" name="txtCpf" value="<?php echo $value->cpf;?>" />
                                                                </p>
                                                        <h3 class="TformAdm">RG:</h3>
                                                                <p class="center">
                                                                        <input  class="boxTxtAdm" type="number" name="txtRg" value="<?php echo $value->rg;?>" />
                                                                </p>
                                                        <h3 class="TformAdm">Telefone:</h3>
                                                                <p class="center">	
                                                                        <input class="boxTxtAdm" type="tel" name="txtTelefone" value="<?php echo $value->telefone;?>" />
                                                                </p>
                                                        <h3 class="TformAdm">E-mail:</h3>
                                                                <p class="center">
                                                                        <input class="boxTxtAdm" type="email" name="txtEmail" value="<?php echo $value->email;?>" />
                                                                </p>
                                                </div>
                                                    
                                                <?php
                                             }else{ //mostrar PJ
                                                    ?>
                        
                                                <div id="divDados2">	
                                                        <h1 class="TCategorias">Dados do(a) Doador(a) PJ</h1>
                                                        <input type="hidden" name="acao" value="alterarPJ"/>
                                                        <h3 class="TformAdm">Nome Completo:</h3>
                                                                <p class="center">
                                                                        <input class="boxTxtAdm" type="text" name="txtNome" value="<?php echo $value->nome;?>" />
                                                                </p>
                                                        <h3 class="TformAdm">CNPJ:</h3>
                                                                <p class="center">	
                                                                        <input  class="boxTxtAdm" type="number" name="txtCnpj" value="<?php echo $value->cnpj;?>" />
                                                                </p>
                                                        <h3 class="TformAdm">Responsável PJ:</h3>
                                                                <p class="center">	
                                                                        <input class="boxTxtAdm" type="text" name="ResponsavelPj" value="<?php echo $value->responsavel_pj;?>" />
                                                                </p>
                                                        <h3 class="TformAdm">Telefone:</h3>
                                                                <p class="center">	
                                                                        <input class="boxTxtAdm" type="tel" name="txtTelefone" value="<?php echo $value->telefone;?>" />
                                                                </p>
                                                        <h3 class="TformAdm">E-mail:</h3>
                                                                <p class="center">
                                                                        <input class="boxTxtAdm" type="email" name="txtEmail" value="<?php echo $value->email;?>" />
                                                                </p>	
                                                </div>
				
                                                <?PHP
                                             }
                                                    ?>
                        
                                    <div id="DivDados1">	
					<h1 class="TCategorias">Endereço</h1>
					
					<h3 class="TformAdm">Bairro:</h3>
						<p class="center">
							<input class="boxTxtAdm" type="text" name="txtBairro" value="<?php echo $value->bairro;?>" />
						</p>
					<h3 class="TformAdm">Rua:</h3>
						<p class="center">
							<input class="boxTxtAdm" type="text" name="txtRua" value="<?php echo $value->rua;?>" />
						</p>
					<h3 class="TformAdm">Número:</h3>
						<p class="center">	
							<input class="boxTxtAdm" type="text" name="txtNumero" value="<?php echo $value->numero;?>" />
						</p>
					<h3 class="TformAdm">Complemento:</h3>
						<p class="center">	
							<input class="boxTxtAdm" type="text" name="txtComplemento" value="<?php echo $value->complemento;?>" />
						</p>
				</div>
				
				<div id="divBotoes">
					<p class="center">
                                                
                                                <input type="hidden" name="idDoacao" value="<?php echo $value->idDoacao;?>"/>
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