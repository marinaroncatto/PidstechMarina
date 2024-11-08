<?php
include_once '../model/Endereco.php';
include_once '../model/database/EnderecoDAO.php';
include_once '../model/database/DB.php';

if (isset($_REQUEST['acao'])){ //verifica se o hidden chegou

$acao = $_REQUEST['acao'];
    
    switch ($acao) {                  
        case 'alterar':
            if (isset($_POST['idEndereco']) && !empty($_POST['idEndereco']) && isset($_POST['idPessoa']) && !empty($_POST['idPessoa'])){
                $dao = new EnderecoDAO();                                               
                $endereco = new Endereco();
                $endereco->bairro = isset($_POST['txtBairro']) ? $_POST['txtBairro'] : null; 
                $endereco->rua = isset($_POST['txtRua']) ? $_POST['txtRua'] : null; 
                $endereco->numero = isset($_POST['txtNumero']) ? $_POST['txtNumero'] : null; 
                $endereco->complemento = isset($_POST['txtComplemento']) ? $_POST['txtComplemento'] : null;                 
                $endereco->idPessoa = $_POST['idPessoa'];
                $endereco->idEndereco = $_POST['idEndereco'];
                            
                  if($dao->update($endereco)){
                    ?>
                        <script type="text/javascript">
                            alert('Endeço alterado com sucesso.');
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
                    
            
        default:
            break;

            }    
}       

?>