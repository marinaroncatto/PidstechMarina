<?php
include_once '../model/Usuario.php';
include_once '../model/database/UsuarioDAO.php';
include_once '../model/database/DB.php';

if (isset($_REQUEST['acao'])){ //verifica se o hidden chegou

$acao = $_REQUEST['acao'];
    
    switch ($acao) {       
        
        case 'inserirUsuario':            
               if (isset($_POST['txtLogin']) && !empty($_POST['txtLogin'])
                && isset($_POST['txtSenha']) && !empty($_POST['txtSenha'])
                && isset($_POST['pessoa']) && !empty($_POST['pessoa'])
                ){
                $dao = new UsuarioDAO();
                $objeto = new Usuario();
                $objeto->login = $_POST['txtLogin'];
                $objeto->senha = $_POST['txtSenha'];               
                $objeto->perfil_acesso = isset($_POST['perfil']) ? $_POST['perfil'] : null;              
                $objeto->idPessoa = $_POST['pessoa'];                           
               
               
                
              if($dao->insert($objeto)){
                     ?>
                        <script type="text/javascript">
                            alert('Usuário Cadastrado com Sucesso!');
                            location.href = '../view/pages/cadDoacaofinal.php';
                        </script>
                    <?php
                    
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao cadastrar Usuário');
                        history.go(-1);
                    </script>
                    <?php
                }
            }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha os campos adequadamente.');
                        history.go(-1);
                    </script>
                <?php 
            }
            break; 
            
        case 'alterarPF':
            if (isset($_POST['txtId']) && !empty($_POST['txtId']) && isset($_POST['txtTitulo']) && !empty($_POST['txtTitulo']) && isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao']) 
                && isset($_POST['destino']) && !empty($_POST['destino']) && isset($_POST['txtData']) && !empty($_POST['txtData'])                              
                && isset($_POST['txtCpf']) && !empty($_POST['txtCpf']) && isset($_POST['txtRg']) && isset($_POST['txtBairro']) 
                && isset($_POST['txtRua']) && isset($_POST['txtNumero']) && isset($_POST['txtComplemento'])){
                $dao = new DoacaoDAO();                                               
                $doacao = new Doacao();
                $doacao->titulo = $_POST['txtTitulo']; 
                $doacao->descricao = $_POST['txtDescricao'];   
                $doacao->destino = $_POST['destino'];
                $doacao->data_entrada = $_POST['txtData'];
                $doacao->baixa = isset($_POST['boxBaixa']) ? $_POST['boxBaixa'] : null;
                $doacao->idDoacao = $_POST['txtId'];
                
                $objetoUp->doacao= $doacao;
                
                $pessoa = new Pessoa();
                
                $pessoa->nome = $_POST['txtNome'];
                $pessoa->email = $_POST['txtEmail'];
                $pessoa->telefone = $_POST['txtTelefone'];   
                
                $objetoUp->pessoa= $pessoa;
                
                $pessoafisica = new Pessoafisica();
                
                $pessoafisica->cpf = $_POST['txtCpf'];
                $pessoafisica->rg = $_POST['txtRg']; 
                
               $objetoUp->pessoafisica= $pessoafisica;
                
                $endereco= new Endereco();
                
                $endereco->bairro = $_POST['txtBairro'];
                $endereco->rua = $_POST['txtRua'];
                $endereco->numero = $_POST['txtNumero'];
                $endereco->complemento = $_POST['txtComplemento'];
                                
               $objetoUp->endereco= $endereco;
                
              $objetoUp = new DoacaoUpdate();
              $objetoUp->__constructPF( $objetoUp->doacao,  $objetoUp->pessoa,  $objetoUp->pessoafisica,  $objetoUp->endereco);
              
                    if($dao->updatePF($objetoUp)){
                    ?>
                        <script type="text/javascript">
                            alert('Dados alterados com sucesso.');
                            location.href = '../view/pages/conDoacao.php';
                        </script>
                    <?php
                    }else{
                    ?>
                        <script type="text/javascript">
                            alert('Problema ao alterar os dados');
                            history.go(-1);
                        </script>    
                    <?php
                    }
                }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha o campo adequadamente.');
                        history.go(-1);
                    </script>
                <?php
                }
            break;
            
         case 'alterarPJ':
                 if (isset($_POST['txtId']) && !empty($_POST['txtId']) && isset($_POST['txtTitulo']) && !empty($_POST['txtTitulo']) && isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao']) 
                && isset($_POST['destino']) && !empty($_POST['destino']) && isset($_POST['txtData']) && !empty($_POST['txtData'])                              
                && isset($_POST['txtCnpj']) && !empty($_POST['txtCnpj']) && isset($_POST['ResponsavelPj']) && isset($_POST['txtBairro']) 
                && isset($_POST['txtRua']) && isset($_POST['txtNumero']) && isset($_POST['txtComplemento'])){
                $dao = new DoacaoDAO();
                $objeto = new DoacaoUpdate();
                $objeto->Doacao->titulo = $_POST['txtTitulo']; 
                $objeto->Doacao->descricao = $_POST['txtDescricao'];   
                $objeto->Doacao->destino = $_POST['destino'];
                $objeto->Doacao->data_entrada = $_POST['txtData'];
                $objeto->Doacao->baixa = $_POST['boxBaixa'];
                
                
                $objeto->Pessoa->nome = $_POST['txtNome'];
                $objeto->Pessoa->email = $_POST['txtEmail'];
                $objeto->Pessoa->telefone = $_POST['txtTelefone'];   
                $objeto->Pessoajuridica->cnpj = $_POST['txtCnpj'];
                $objeto->Pessoajuridica->responsavel_pj = $_POST['ResponsavelPj'];   
                
                $objeto->Endereco->bairro = $_POST['txtBairro'];
                $objeto->Endereco->rua = $_POST['txtRua'];
                $objeto->Endereco->numero = $_POST['txtNumero'];
                $objeto->Endereco->complemento = $_POST['txtComplemento'];
                                
                
                $objeto->idDoacao = $_POST['txtId'];                                                                         
                    
                    if($dao->update($objeto)){
                    ?>
                        <script type="text/javascript">
                            alert('Dados alterados com sucesso.');
                            location.href = '../view/pages/conDoacao.php';
                        </script>
                    <?php
                    }else{
                    ?>
                        <script type="text/javascript">
                            alert('Problema ao alterar os dados');
                            history.go(-1);
                        </script>    
                    <?php
                    }
                }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha o campo adequadamente.');
                        history.go(-1);
                    </script>
                <?php
                }
            break;
            
        case 'deletar':
            if (isset($_GET['txtId'])){
                $dao = new DoacaoDAO();
                $id = $_GET['txtId'];
                if($dao->delete($id)){
                    ?>
                    <script type="text/javascript">
                        alert('Doação excluída com sucesso.');
                        location.href = '../view/pages/conDoacao.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao excluir a doação.');
                        history.go(-1);
                    </script>
                    <?php
                }
            }
            break;
        default:
            break;

            }    
}       

?>