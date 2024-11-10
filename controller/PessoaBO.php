<?php
include_once '../model/Pessoa.php';
include_once '../model/Usuario.php';
include_once '../model/Pessoafisica.php';
include_once '../model/Pessoajuridica.php';
include_once '../model/Endereco.php';
include_once '../model/database/PessoafisicaDAO.php';
include_once '../model/database/PessoajuridicaDAO.php';
include_once '../model/database/PessoaDAO.php';
include_once '../model/database/EnderecoDAO.php';
include_once '../model/database/UsuarioDAO.php';
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
            if (isset($_POST['idPessoaFisica']) && !empty($_POST['idPessoaFisica']) && isset($_POST['idPessoa']) && !empty($_POST['idPessoa'])
                && isset($_POST['txtNome']) && !empty($_POST['txtNome']) && isset($_POST['txtCpf']) && !empty($_POST['txtCpf'])  
                 ){
                $daoP = new PessoaDAO();                                               
                $pessoa = new Pessoa();
                $pessoa->nome = $_POST['txtNome']; 
                $pessoa->email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null; 
                $pessoa->telefone = isset($_POST['txtTelefone']) ? $_POST['txtTelefone'] : null; 
                $pessoa->idPessoa = $_POST['idPessoa'];
                
                $daoPF = new PessoafisicaDAO();                                               
                $pf = new Pessoafisica();
                $pf->cpf = $_POST['txtCpf']; 
                $pf->rg = isset($_POST['txtRg']) ? $_POST['txtRg'] : null; 
                $pf->idPessoa = $_POST['idPessoa'];   
                $pf->idPessoaFisica = $_POST['idPessoaFisica'];                                            
                
                  if($daoP->update($pessoa) && $daoPF->update($pf)){
                    ?>
                        <script type="text/javascript">
                            alert('Dados alterados com sucesso.');
                            history.go(-2);
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
                if (isset($_POST['idPessoaJuridica']) && !empty($_POST['idPessoaJuridica']) && isset($_POST['idPessoa']) && !empty($_POST['idPessoa'])
                && isset($_POST['txtNome']) && !empty($_POST['txtNome']) && isset($_POST['txtCnpj']) && !empty($_POST['txtCnpj'])  
                 ){
                $daoP = new PessoaDAO();                                               
                $pessoa = new Pessoa();
                $pessoa->nome = $_POST['txtNome']; 
                $pessoa->email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null; 
                $pessoa->telefone = isset($_POST['txtTelefone']) ? $_POST['txtTelefone'] : null; 
                $pessoa->idPessoa = $_POST['idPessoa'];
                
                $daoPJ = new PessoajuridicaDAO();                                               
                $pj = new Pessoajuridica();
                $pj->cnpj = $_POST['txtCnpj']; 
                $pj->responsavel_pj = isset($_POST['ResponsavelPj']) ? $_POST['ResponsavelPj'] : null; 
                $pj->idPessoa = $_POST['idPessoa'];   
                $pj->idPessoaJuridica = $_POST['idPessoaJuridica'];                                            
                
                  if($daoP->update($pessoa) && $daoPJ->update($pj)){
                    ?>
                        <script type="text/javascript">
                            alert('Dados alterados com sucesso.');
                            history.go(-2);
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
            if (isset($_GET['idPessoa'])&& !empty($_GET['idPessoa'])
                && isset($_GET['idEndereco'])&& !empty($_GET['idEndereco'])
                && isset($_GET['idPessoaFisica'])&& !empty($_GET['idPessoaFisica'])                
                    ){
                // ids para testar se há registros filhos de usuario ou doações
                $idU = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : null;                                                  
                
                $daoE = new EnderecoDAO();
                $idE = $_GET['idEndereco'];
               
                $daoPF = new PessoafisicaDAO();
                $idPF = $_GET['idPessoaFisica'];
                
                $daoPE = new PessoaDAO();
                $idPE = $_GET['idPessoa'];
                
                try{   
                                       
                    if(!empty($idU)){
                        
                    ?>
                        <script type="text/javascript">
                        alert('Erro: A pessoa possui um usuário vinculado');
                        history.go(-1);
                    </script>
                        <?php
                    }else{
                        if ($daoE->delete($idE)) {
                            if ($daoPF->delete($idPF)) {
                                if ($daoPE->delete($idPE)) {
                                    // Sucesso
                                    echo "<script>alert('Pessoa Física excluída com sucesso');</script>";
                                    header("Location: ../view/pages/conPessoa.php");
                                    exit;
                                } else {
                                    echo "<script>alert('Erro ao excluir a Pessoa');</script>";
                                }
                            } else {
                                echo "<script>alert('Erro ao excluir o endereço');</script>";
                            }
                        } else {
                            echo "<script>alert('Erro ao excluir o endereço');</script>";
                        }
                        
                    }   
                }
                
                catch (Exception $exc) {
                    ?>
                    <script type="text/javascript">
                        alert('Erro ao exluir a Pessoa Física');
                        history.go(-1);
                    </script>
                    <?php
                }
            }
            break;
        
         case 'deletarPJ':
            if (isset($_GET['idPessoa'])&&isset($_GET['idPessoa'])
                && isset($_GET['idEndereco'])&&isset($_GET['idEndereco'])
                && isset($_GET['idPessoaJuridica'])&&isset($_GET['idPessoaJuridica'])        
                    ){
                $daoE = new EnderecoDAO();
                $idE = $_GET['idEndereco'];
                
                $daoPeJ = new PessoajuridicaDAO();
                $idPJ = $_GET['idPessoaJuridica'];
                
                $daoPE = new PessoaDAO();
                $idPE = $_GET['idPessoa'];
                
                try{                                      
                    if($daoE->delete($idE) && $daoPeJ->delete($idPJ) && $daoPE->delete($idPE)){
                        ?>
                        <script type="text/javascript">
                            alert('Pessoa Jurídica excluída com sucesso');
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
            
        default:
            break;

            }    
}       

?>