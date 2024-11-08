<?php
include_once '../model/Pessoa.php';
include_once '../model/Pessoafisica.php';
include_once '../model/Pessoajuridica.php';
include_once '../model/Endereco.php';
include_once '../model/database/PessoafisicaDAO.php';
include_once '../model/database/PessoajuridicaDAO.php';
include_once '../model/database/PessoaDAO.php';
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
                             header('location: ../view/pages/pessoa2PF.php');
                        }else{
                            header('location: ../view/pages/pessoa2PJ.php');
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
                    
                    ?>
                        <script type="text/javascript">
                            alert('Pessoa Física Cadastrada com Sucesso!');
                            location.href = '../view/pages/pessoa.php';
                        </script>
                    <?php
                    
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
                    
                       ?>
                        <script type="text/javascript">
                            alert('Pessoa Jurídica Cadastrada com Sucesso!');
                            location.href = '../view/pages/pessoa.php';
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
            if (isset($_POST['txtId']) && !empty($_POST['txtId']) && isset($_POST['txtTitulo']) && !empty($_POST['txtTitulo']) 
                && isset($_POST['destino']) && !empty($_POST['destino']) && isset($_POST['txtData']) && !empty($_POST['txtData'])                              
                && isset($_POST['txtCpf']) && !empty($_POST['txtCpf']) && isset($_POST['txtRg']) && isset($_POST['txtBairro']) 
                && isset($_POST['txtRua']) && isset($_POST['txtNumero']) && isset($_POST['txtComplemento'])){
                $dao = new DoacaoDAO();                                               
                $doacao = new Doacao();
                $doacao->titulo = $_POST['txtTitulo']; 
                $doacao->descricao = isset($_POST['txtDescricao']) ? $_POST['txtDescricao'] : null; 
                $doacao->destino = $_POST['destino'];
                $doacao->data_entrada = $_POST['txtData'];
                $doacao->baixa = isset($_POST['boxBaixa']) ? $_POST['boxBaixa'] : null;
                $doacao->idDoacao = $_POST['txtId'];
                
                var_dump($doacao);
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
            
        case 'deletarPF':
            if (isset($_GET['idPessoa'])&&isset($_GET['idPessoa'])
                && isset($_GET['idEndereco'])&&isset($_GET['idEndereco'])
                && isset($_GET['idPessoaFisica'])&&isset($_GET['idPessoaFisica'])        
                    ){
                $daoE = new EnderecoDAO();
                $idE = $_GET['idEndereco'];
                
                $daoPF = new PessoafisicaDAO();
                $idPF = $_GET['idPessoaFisica'];
                
                $daoPE = new PessoaDAO();
                $idPE = $_GET['idPessoa'];
                
                try{                                      
                    if($daoE->delete($idE) && $daoPF->delete($idPF) && $daoPE->delete($idPE)){
                        ?>
                        <script type="text/javascript">
                            alert('Pessoa Física excluída com sucesso');
                            location.href = '../view/conPessoa.php';
                        </script>
                        <?php
                    }    
                }
                catch (Exception $exc) {
                    ?>
                    <script type="text/javascript">
                        alert('Erro ao exluir a Pessoa Física \nHá um registro filho localizado. \nVerifique se não há doações ou usuário vinculado');
                        history.go(-1);
                    </script>
                    <?php
                }
            }
            break;
        
         case 'deletarPJ':
            if (isset($_GET['iditem'])&&isset($_GET['idreceita'])){
                $dao = new ItemReceitaDAO();
                $iditem = $_GET['iditem'];
                $idreceita = $_GET['idreceita'];
                try{
                    if($dao->delete($iditem, $idreceita)){
                        ?>
                        <script type="text/javascript">
                            alert('Item excluído com sucesso da receita.');
                            location.href = '../view/listaitemreceita.php';
                        </script>
                        <?php
                    }    
                }
                catch (Exception $exc) {
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao excluir o item.\nHá um registro filho localizado.');
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