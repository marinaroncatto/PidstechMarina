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
                 <script type="text/javascript">
                function deletar(idPessoa){
                    if(confirm('deseja excluir a Pessoa?')){
                        document.location.href='../../controller/PessoaBO.php?acao=deletar&idPessoa='+idPessoa;
                    }
                    }
               </script>
               <script type="text/javascript">
                function deletar(idDoacao){
                    if(confirm('deseja excluir a Doação?')){
                        document.location.href='../../controller/DoacaoBO.php?acao=deletar&idDoacao='+idDoacao;
                    }
                    }
               </script>
               <script type="text/javascript">
              function deletar(idDoacao_final){
                  if(confirm('deseja excluir a Doação?')){
                      document.location.href='../../controller/DoacaoFinalBO.php?acao=deletar&idDoacao_final='+idDoacao_final;
                  }
                  }
             </script>
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
				 <?php
                                 
                                     if (isset($_GET['txtId'])) {
                                        include_once '../../model/database/PessoaDAO.php';
                                        $dao = new PessoaDAO();
                                        $id = $_GET['txtId'];
                                        $lista = $dao->listAllPessoas($id);
                                      
                                        
                                       if (!empty($lista)) {
                                             foreach ($lista as $value) {
                                       
                                    
                                                if(!empty($value->cpf)){

                                                        ?>
                                                                <div class="divCon1">
                                                                        <h3 class="TformAdmCenter">Dados do(a) Doadoar(a) PF</h3>
                                                                        <p class="right"> <button name="btnalterar" onclick="location.href='editarPessoa.php?idPessoa=<?php echo $value->idPessoa; ?>'" > Alterar</button></p>
                                                                        <p class="right"><button name="btnexcluir" onclick="javascript:deletar(<?php echo $value->idPessoa; ?>)" > Excluir</button></p>
                                                                        <table class="tabela">
                                                                                  <tr>
                                                                                        <th>Nome</th>	
                                                                                        <th>CPF</th>
                                                                                        <th>RG</th>	
                                                                                        <th>Telefone</th>
                                                                                        <th>E-mail</th>
                                                                                  </tr>
                                                                                  <tr>
                                                                                        <td><?php echo $value->nome;?></td>
                                                                                        <td><?php echo $value->cpf;?></td>
                                                                                        <td><?php echo $value->rg;?></td>
                                                                                        <td><?php echo $value->telefone;?></td>
                                                                                        <td><?php echo $value->email;?></td>
                                                                                  </tr>

                                                                        </table>
                                                                </div>
                                                        <?php 
                                                           }else{

                                                           ?>

                                                              <div class="divCon1">
                                                                       <h3 class="TformAdmCenter">Dados do(a) Doadoar(a) PJ</h3>
                                                                       <p class="right"> <button name="btnalterar" onclick="location.href='editarPessoa.php?idPessoa=<?php echo $value->idPessoa; ?>'" > Alterar</button></p>
                                                                       <p class="right"><button name="btnexcluir" onclick="javascript:deletar(<?php echo $value->idPessoa; ?>)" > Excluir</button></p>
                                                                       <table class="tabela">
                                                                                 <tr>
                                                                                       <th>Nome</th>	
                                                                                       <th>CNPJ</th>
                                                                                       <th>Responsável PJ</th>	
                                                                                       <th>Telefone</th>
                                                                                       <th>E-mail</th>
                                                                                 </tr>
                                                                                 <tr>
                                                                                       <td><?php echo $value->nome;?></td>
                                                                                        <td><?php echo $value->cnpj;?></td>
                                                                                       <td><?php echo $value->responsavel_pj;?></td>
                                                                                       <td><?php echo $value->telefone;?></td>
                                                                                       <td><?php echo $value->email;?></td>
                                                                                 </tr>

                                                                       </table>
                                                               </div>

                                               <?php
                                                           }
                                               ?>
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
							<td><?php echo $value->bairro;?></td>
							<td><?php echo $value->rua;?></td>
							<td><?php echo $value->numero;?></td>
							<td><?php echo $value->complemento;?></td>												
						  </tr>
						
					</table>
                                       
                                       
				</div>
                            
                            <div class="divCon1">
				<h3 class="TformAdmCenter">Doações feitas ao projeto</h3>
                                <p class="right"> <button name="btnalterar" onclick="location.href='editarDoacao.php?idDoacao=<?php echo $doacoes->idDoacao; ?>'" > Alterar</button></p>
                                <p class="right"><button name="btnexcluir" onclick="javascript:deletar(<?php echo $doacoes->idDoacao; ?>)" > Excluir</button></p>
				<table class="tabela">
                                     
                                   
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descrição</th>
                                                <th>Destino</th>
                                                <th>Data</th>
                                                
                                            </tr>
                                            <tr>
                                        <?php                                                                                                                                                    
                                        $id = $value->idPessoa;
                                        $listaD = $dao->listDoacoes($id);
                                        if (!empty($listaD)) {
                                             foreach ($listaD as $doacoes) {
                                            ?>
				
                                           
                                                
                                                    <td><?php echo $doacoes->titulo; ?></td>
                                                    <td><?php echo $doacoes->titulo; ?></td>
                                                    <td><?php echo $doacoes->descricao; ?></td>
                                                    <td><?php echo $doacoes->destino; ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($doacoes->data_entrada));?></td>                                                    
                                                </tr>
                                                
                                                <?php
                                                 }      }
                                                ?>
				</table>
				</div>
                            
                            	
				<div class="divCon1">
				<h3 class="TformAdmCenter">Doações recebidas do Projeto</h3>
                                <p class="right"> <button name="btnalterar" onclick="location.href='editarDoacaoFinal.php?idDoacao_final=<?php echo $doacoes->idDoacao_final; ?>'" > Alterar</button></p>
                                <p class="right"><button name="btnexcluir" onclick="javascript:deletar(<?php echo $doacoes->idDoacao_final; ?>)" > Excluir</button></p>
				<table class="tabela">
                                     
                                   
                                            <tr>
                                                <th>Título</th>
                                                <th>Descrição</th>
                                                <th>Situação</th>
                                                <th>Data de Saída</th>
                                                
                                            </tr>
                                           
                                                <tr>
                                                    <?php                                                                                                                                                    
                                                    $id = $value->idPessoa;
                                                    $listaD = $dao->listDoacoes($id);
                                                    if (!empty($listaD)) {
                                                         foreach ($listaD as $doacoes) {
                                                        ?>
                                                    
                                                    <td><?php echo $doacoes->titulo; ?></td>
                                                    <td><?php echo $doacoes->descricao; ?></td>
                                                    <td><?php echo $doacoes->situacao; ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($doacoes->data_saida));?></td>
                                                </tr>
                                                
				</table>
				</div>
                            
                            <?php
                                             }                                                                                            
                                        } else { 
                                            echo "<tr><td colspan='5'>Nenhuma doação encontrada.</td></tr>";
                                       } } }
                                    } else {
                                        echo "<script>alert('Preencha o campo adequadamente.'); "
                                        . "location.href = './conDoacao.php';</script>";
                                    } ?>
                            
                            
                            
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
