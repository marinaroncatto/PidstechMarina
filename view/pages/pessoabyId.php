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
                function deletarPF(idPessoa, idEndereco, idPessoaFisica){
                    if(confirm('Deseja excluir a Pessoa Física? Certifique-se de que não há nenhuma doação vinculada antes de prosseguir!')){
                        document.location.href='../../controller/PessoaBO.php?acao=deletarPF&idPessoa='+idPessoa+'&idEndereco='+idEndereco+'&idPessoaFisica='+idPessoaFisica;                               
        
                    }
                    }
               </script>
               
               <script type="text/javascript">
                function deletarPJ(idPessoa, idEndereco, idPessoaJuridica){
                    if(confirm('Deseja excluir a Pessoa Jurídica? Certifique-se de que não há nenhuma doação vinculada antes de prosseguir!')){
                        document.location.href='../../controller/PessoaBO.php?acao=deletar&idPessoa&idPessoaJuridica&idEndereco='+idPessoa+idPessoaJuridica+idEndereco;
                    }
                    }
               </script>                       
             
               <script type="text/javascript">
                function deletarD(idDoacao){
                    if(confirm('deseja excluir a Doação?')){
                        document.location.href='../../controller/DoacaoBO.php?acao=deletar&idDoacao='+idDoacao;
                    }
                    }
               </script>
               <script type="text/javascript">
              function deletarDf(idDoacao_final){
                  if(confirm('deseja excluir a Doação ao Beneficiário?')){
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
                                      
                                        var_dump($lista);
                                       if (!empty($lista)) {
                                             foreach ($lista as $value) {
                                       
                                    
                                                if(!empty($value->cpf)){

                                                        ?>
                                                                <div class="divCon1">
                                                                        <h3 class="TformAdmCenter">Dados do(a) Doadoar(a) PF</h3>
                                                                        
                                                                        
                                                                        <table class="tabela">
                                                                                  <tr>
                                                                                        <th>Nome</th>	
                                                                                        <th>CPF</th>
                                                                                        <th>RG</th>	
                                                                                        <th>Telefone</th>
                                                                                        <th>E-mail</th>
                                                                                        <th></th>
                                                                                         <th></th>
                                                                                  </tr>
                                                                                  <tr>
                                                                                        <td><?php echo $value->nome;?></td>
                                                                                        <td><?php echo $value->cpf;?></td>
                                                                                        <td><?php echo $value->rg;?></td>
                                                                                        <td><?php echo $value->telefone;?></td>
                                                                                        <td><?php echo $value->email;?></td>
                                                                                        <td><button name="btnalterar" onclick="location.href='editarPessoa.php?idPessoa=<?php echo $value->idPessoa; ?>'" > Alterar</button></td>
                                                                                        <td><button name="btnexcluir" onclick="javascript:deletarPF(<?php echo $value->idPessoa; ?>, <?php echo $value->idEndereco; ?>, <?php echo $value->idPessoaFisica; ?>)" > Excluir</button></td>
                                                                                  </tr>

                                                                        </table>
                                                                </div>
                                                        <?php 
                                                           }else{

                                                           ?>

                                                              <div class="divCon1">
                                                                       <h3 class="TformAdmCenter">Dados do(a) Doadoar(a) PJ</h3>
                                                                      
                                                                       <table class="tabela">
                                                                                 <tr>
                                                                                       <th>Nome</th>	
                                                                                       <th>CNPJ</th>
                                                                                       <th>Responsável PJ</th>	
                                                                                       <th>Telefone</th>
                                                                                       <th>E-mail</th>
                                                                                       <th></th>
                                                                                       <th></th>
                                                                                 </tr>
                                                                                 <tr>
                                                                                       <td><?php echo $value->nome;?></td>
                                                                                        <td><?php echo $value->cnpj;?></td>
                                                                                       <td><?php echo $value->responsavel_pj;?></td>
                                                                                       <td><?php echo $value->telefone;?></td>
                                                                                       <td><?php echo $value->email;?></td>
                                                                                       <td><button name="btnalterar" onclick="location.href='editarPessoa.php?idPessoa=<?php echo $value->idPessoa; ?>'" > Alterar</button></td>
                                                                                       <td><button name="btnexcluir" onclick="javascript:deletarPJ(<?php echo $value->idPessoa, $value->idPessoaJuridica, $value->idEndereco; ?>)" > Excluir</button></td>
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
                                                        <th></th>
                                                        
						  </tr>
						  <tr>
							<td><?php echo $value->bairro;?></td>
							<td><?php echo $value->rua;?></td>
							<td><?php echo $value->numero;?></td>
							<td><?php echo $value->complemento;?></td>
                                                        <td><button name="btnalterar" onclick="location.href='editarEndereco.php?idPessoa=<?php echo $value->idPessoa; ?>'" > Alterar</button></td>
                                                        
						  </tr>
						
					</table>
                                       
                                       
				</div>
                            
                            <div class="divCon1">
				<h3 class="TformAdmCenter">Doações feitas ao projeto</h3>                                
				<table class="tabela">
                                     
                                   
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descrição</th>
                                                <th>Destino</th>
                                                <th>Data</th>
                                                <th></th>
                                                <th></th>
                                                
                                            </tr>
                                            <tr>
                                        <?php                                                                                                                                                    
                                        $id = $value->idPessoa;
                                        $listaD = $dao->listDoacoes($id);
                                        
                                        if (!empty($listaD)) {
                                             foreach ($listaD as $doacoes) {
                                            ?>
				
                                           
                                
                                                
                                                    <td><?php echo $doacoes->idDoacao; ?></td>
                                                    <td><?php echo $doacoes->titulo; ?></td>
                                                    <td><?php echo $doacoes->descricao; ?></td>
                                                    <td><?php echo $doacoes->destino; ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($doacoes->data_entrada));?></td>
                                                    <td><button name="btnalterar" onclick="location.href='editarDoacao.php?idDoacao=<?php echo $doacoes->idDoacao; ?>'" > Alterar</button></td>
                                                    <td><button name="btnexcluir" onclick="javascript:deletarD(<?php echo $doacoes->idDoacao; ?>)" > Excluir</button></td>
                                                </tr>
                                                
                                                <?php
                                                 }      }
                                                ?>
				</table>
				</div>
                            
                            	
				<div class="divCon1">
				<h3 class="TformAdmCenter">Doações recebidas do Projeto</h3>                                
				<table class="tabela">
                                     
                                   
                                            <tr>
                                                <th>ID</th>
                                                <th>Título</th>
                                                <th>Descrição</th>
                                                <th>Situação</th>
                                                <th>Data de Saída</th>
                                                <th></th>
                                                <th></th>
                                                
                                            </tr>
                                           
                                                <tr>
                                                    <?php                                                                                                                                                    
                                                    $id = $value->idPessoa;
                                                    $listaDF = $dao->listDoacoesFinais($id);
                                                   
                                                    if (!empty($listaDF)) {
                                                         foreach ($listaDF as $doacoesf) {
                                                        ?>
                                                    
                                                    <td><?php echo $doacoesf->idDoacao_final; ?></td>
                                                    <td><?php echo $doacoesf->titulo; ?></td>
                                                    <td><?php echo $doacoesf->descricao; ?></td>
                                                    <td><?php echo $doacoesf->situacao; ?></td>
                                                    <td><?php echo date("d/m/Y", strtotime($doacoesf->data_saida));?></td>
                                                    <td><button name="btnalterar" onclick="location.href='editarDoacaoFinal.php?idDoacao_final=<?php echo $doacoesf->idDoacao_final; ?>'" > Alterar</button></td>
                                                    <td><button name="btnexcluir" onclick="javascript:deletarDf(<?php echo $doacoesf->idDoacao_final; ?>)" > Excluir</button></td>
                                                </tr>
                                                <?php
                                                    } 
                                                ?>
				</table>
				</div>
                            
                            <?php
                                                                                                                                        
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
