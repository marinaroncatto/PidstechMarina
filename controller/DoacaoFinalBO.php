<?php
include_once '../model/Doacaofinal.php';
include_once '../model/Pessoa.php';
include_once '../model/Pessoafisica.php';
include_once '../model/Pessoajuridica.php';
include_once '../model/Endereco.php';
include_once '../model/DoacaoUpdate.php';
include_once '../model/database/PessoafisicaDAO.php';
include_once '../model/database/PessoajuridicaDAO.php';
include_once '../model/database/PessoaDAO.php';
include_once '../model/database/DoacaofinalDAO.php';
include_once '../model/database/EnderecoDAO.php';
include_once '../model/database/DB.php';

if (isset($_REQUEST['acao'])){ //verifica se o hidden chegou

$acao = $_REQUEST['acao'];
    
    switch ($acao) {       
        
        case 'inserirDoacao':            
               if (isset($_POST['txtTitulo']) && !empty($_POST['txtTitulo'])
                && isset($_POST['beneficiario']) && !empty($_POST['beneficiario'])
                && isset($_POST['situacao']) && !empty($_POST['situacao'])){
                $dao = new DoacaofinalDAO();
                $objeto = new Doacaofinal();
                $objeto->titulo = $_POST['txtTitulo'];
                $objeto->descricao = isset($_POST['txtDescricao']) ? $_POST['txtDescricao'] : null; 
                $objeto->data_saida = isset($_POST['txtData']) ? $_POST['txtData'] : null;
                $objeto->situacao = $_POST['situacao'];              
                $objeto->idPessoa = $_POST['beneficiario'];                           
                
                if($dao->insert($objeto)){
                     ?>
                        <script type="text/javascript">
                            alert('Doação Final Cadastrada com Sucesso!');
                            location.href = '../view/pages/cadDoacaofinal.php';
                        </script>
                    <?php
                    
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao cadastrar Doação Final');
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
                && isset($_POST['situacao']) && !empty($_POST['situacao'])){
                $dao = new DoacaofinalDAO();
                $objetoA = new Doacaofinal();
                $objetoA->idDoacao_final = $_POST['txtId'];
                $objetoA->titulo = $_POST['txtTitulo'];
                $objetoA->descricao = isset($_POST['txtDescricao']) ? $_POST['txtDescricao'] : null; 
                $objetoA->data_saida = isset($_POST['txtData']) ? $_POST['txtData'] : null;  
                $objetoA->situacao = $_POST['situacao'];             
                $objetoA->idPessoa = $_POST['idPessoa'];     
                                
               
                if($dao->update($objetoA)){
                ?>
                    <script type="text/javascript">
                        alert('Doação Final alterada com sucesso.');
                         history.go(-2);
                    </script>
                <?php
                }else{
                ?>
                    <script type="text/javascript">
                        alert('Problema ao alterar Doação Final');
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
            if (isset($_GET['idDoacao_final'])){
                $dao = new DoacaofinalDAO();
                $id = $_GET['idDoacao_final'];
                if($dao->delete($id)){
                    ?>
                    <script type="text/javascript">
                        alert('Doação Final excluída com sucesso.');
                        location.href = '../view/pages/conDoacaofinal.php';
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