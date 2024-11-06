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
        
        case 'inserirDoacao':            
               if (isset($_POST['txtTitulo']) && !empty($_POST['txtTitulo']) && isset($_POST['doador']) && !empty($_POST['doador']) 
                && isset($_POST['destino']) && !empty($_POST['destino']) && isset($_POST['txtData']) && !empty($_POST['txtData'])){
                $dao = new DoacaoDAO();
                $objeto = new Doacao();
                $objeto->titulo = $_POST['txtTitulo'];
                $objeto->descricao = isset($_POST['txtDescricao']) ? $_POST['txtDescricao'] : null; 
                $objeto->data_entrada = $_POST['txtData'];
                $objeto->destino = $_POST['destino'];             
                $objeto->idPessoa = $_POST['doador'];                             
                
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
            
        case 'alterar':
            if (isset($_POST['txtTitulo']) && !empty($_POST['txtTitulo']) && isset($_POST['txtId']) && !empty($_POST['txtId'])
                && isset($_POST['idPessoa']) && !empty($_POST['idPessoa'])     
                && isset($_POST['destino']) && !empty($_POST['destino']) && isset($_POST['txtData']) && !empty($_POST['txtData'])){
                $dao = new DoacaoDAO();
                $objetoA = new Doacao();
                $objetoA->idDoacao = $_POST['txtId'];
                $objetoA->titulo = $_POST['txtTitulo'];
                $objetoA->descricao = isset($_POST['txtDescricao']) ? $_POST['txtDescricao'] : null; 
                $objetoA->data_entrada = $_POST['txtData'];
                $objetoA->destino = $_POST['destino'];             
                $objetoA->idPessoa = $_POST['idPessoa'];     
                
                
               
                if($dao->update($objetoA)){
                ?>
                    <script type="text/javascript">
                        alert('Doação alterada com sucesso.');
                         history.go(-2);
                    </script>
                <?php
                }else{
                ?>
                    <script type="text/javascript">
                        alert('Problema ao alterar Doação');
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
            if (isset($_GET['idDoacao'])){
                $dao = new DoacaoDAO();
                $id = $_GET['idDoacao'];
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