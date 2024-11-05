<?php
include_once '../model/Doacao.php';
include_once '../model/Pessoa.php';
include_once '../model/Pessoafisica.php';
include_once '../model/Pessoajuridica.php';
include_once '../model/Endereco.php';
include_once '../model/DoacaoUpdate.php';
include_once '../model/database/PessoafisicaDAO.php';
include_once '../model/database/PessoajuridicaDAO.php';
include_once '../model/database/PessoaDAO.php';
include_once '../model/database/DoacaoDAO.php';
include_once '../model/database/EnderecoDAO.php';
include_once '../model/database/DB.php';

if (isset($_REQUEST['acao'])){ //verifica se o hidden chegou

$acao = $_REQUEST['acao'];
    
    switch ($acao) {
        case 'inserirPessoa':            
            if (isset($_POST['txtNome']) && isset($_POST['txtTelefone']) 
                && isset($_POST['txtEmail']) && isset($_POST['CatPessoa']) && !empty($_POST['CatPessoa']) ){
                $dao = new PessoaDAO();
                $objeto = new Pessoa();
                $objeto->nome = $_POST['txtNome'];
                $objeto->email = $_POST['txtEmail'];
                $objeto->telefone = $_POST['txtTelefone'];                            
                
                if($dao->insert($objeto)){
                   session_start();//Lançar o idPessoa na sessão                   
                   $_SESSION['idPessoa'] = DB::getInstancia()->lastInsertId('pessoa');
                   
                        if($_POST['CatPessoa'] == 'PF'){
                             header('location: ../view/pages/doacao2PF.php');
                        }else{
                            header('location: ../view/pages/doacao2PJ.php');
                        }
                    
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao cadastrar pessoa');
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
            
        case 'inserirPF':            
            if (isset($_POST['txtCpf']) && !empty($_POST['txtCpf']) && isset($_POST['txtRg']) 
                && isset($_POST['txtBairro']) && isset($_POST['txtRua']) && isset($_POST['txtNumero']) && isset($_POST['txtComplemento'])){
                $dao = new PessoafisicaDAO();
                $objeto = new Pessoafisica();
                $objeto->cpf = $_POST['txtCpf'];
                $objeto->rg = $_POST['txtRg'];
                session_start();
                $objeto->idPessoa = $_SESSION['idPessoa'];
                
                $daoE = new EnderecoDAO();
                $objE = new Endereco();
                $objE->bairro = $_POST['txtBairro'];
                $objE->rua = $_POST['txtRua']; 
                $objE->numero = $_POST['txtNumero'];
                $objE->complemento = $_POST['txtComplemento'];
                session_start();
                $objE->idPessoa = $_SESSION['idPessoa'];
                
                if($dao->insert($objeto) && $daoE->insert($objE)){
                    
                    header('location: ../view/pages/doacao3.php');
                    
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao cadastrar pessoa física');
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
        
        case 'inserirPJ':            
             if (isset($_POST['txtCnpj']) && !empty($_POST['txtCnpj']) && isset($_POST['ResponsavelPj']) 
                && isset($_POST['txtBairro']) && isset($_POST['txtRua']) && isset($_POST['txtNumero']) && isset($_POST['txtComplemento'])){
                $dao = new PessoajuridicaDAO();
                $objeto = new Pessoajuridica();
                $objeto->cnpj = $_POST['txtCnpj'];
                $objeto->responsavel_pj = $_POST['ResponsavelPj'];
                session_start();
                $objeto->idPessoa = $_SESSION['idPessoa'];
                
                $daoE = new EnderecoDAO();
                $objE = new Endereco();
                $objE->bairro = $_POST['txtBairro'];
                $objE->rua = $_POST['txtRua']; 
                $objE->numero = $_POST['txtNumero'];
                $objE->complemento = $_POST['txtComplemento'];
                session_start();
                $objE->idPessoa = $_SESSION['idPessoa'];
                
                if($dao->insert($objeto) && $daoE->insert($objE)){
                    
                    header('location: ../view/pages/doacao3.php');
                    
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao cadastrar pessoa jurídica');
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
        
        
        case 'inserirDoacao':            
               if (isset($_POST['txtTitulo']) && !empty($_POST['txtTitulo']) && isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao']) 
                && isset($_POST['destino']) && !empty($_POST['destino']) && isset($_POST['txtData']) && !empty($_POST['txtData'])){
                $dao = new DoacaoDAO();
                $objeto = new Doacao();
                $objeto->titulo = $_POST['txtTitulo'];
                $objeto->descricao = $_POST['txtDescricao'];
                $objeto->data_entrada = $_POST['txtData'];
                $objeto->destino = $_POST['destino'];
                $objeto->baixa = $_POST['boxBaixa'];
                session_start();
                $objeto->idPessoa = $_SESSION['idPessoa'];                             
                
                if($dao->insert($objeto)){
                     ?>
                        <script type="text/javascript">
                            alert('Doação Cadastrada com Sucesso!');
                            location.href = '../view/pages/doacao.php';
                        </script>
                    <?php
                    
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao cadastrar pessoa jurídica');
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
                $objeto = new DoacaoUpdate();
                $objeto->doacao= new Doacao();
                $objeto->doacao->titulo = $_POST['txtTitulo']; 
                $objeto->doacao->descricao = $_POST['txtDescricao'];   
                $objeto->doacao->destino = $_POST['destino'];
                $objeto->doacao->data_entrada = $_POST['txtData'];
                $objeto->doacao->baixa = isset($_POST['boxBaixa']) ? $_POST['boxBaixa'] : null;
                
                
                $objeto->pessoa->nome = $_POST['txtNome'];
                $objeto->pessoa->email = $_POST['txtEmail'];
                $objeto->pessoa->telefone = $_POST['txtTelefone'];   
                $objeto->pessoafisica->cpf = $_POST['txtCpf'];
                $objeto->pessoafisica->rg = $_POST['txtRg'];   
                
                $objeto->endereco->bairro = $_POST['txtBairro'];
                $objeto->endereco->rua = $_POST['txtRua'];
                $objeto->endereco->numero = $_POST['txtNumero'];
                $objeto->endereco->complemento = $_POST['txtComplemento'];
                                
                
                $objeto->idDoacao = $_POST['txtId'];                                                                         
                var_dump($objeto);
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
            if (isset($_GET['iditem'])){
                $dao = new ItemDAO();
                $id = $_GET['iditem'];
                if($dao->delete($id)){
                    ?>
                    <script type="text/javascript">
                        alert('Item excluído com sucesso.');
                        location.href = '../view/listaitens.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao excluir o item.');
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