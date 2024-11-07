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
            
        case 'alterar':
                    if (isset($_POST['txtLogin']) && !empty($_POST['txtLogin'])
                        && isset($_POST['txtId']) && !empty($_POST['txtId'])    
                        && isset($_POST['txtSenha']) && !empty($_POST['txtSenha'])
                        && isset($_POST['pessoa']) && !empty($_POST['pessoa'])
                        ){
                        $dao = new UsuarioDAO();
                        $objetoU = new Usuario();
                        $objetoU->idUsuario = $_POST['txtId'];
                        $objetoU->login = $_POST['txtLogin'];
                        $objetoU->senha = $_POST['txtSenha'];               
                        $objetoU->perfil_acesso = isset($_POST['perfil']) ? $_POST['perfil'] : null;              
                        $objetoU->idPessoa = $_POST['pessoa'];        

                       
                        
                       if($dao->update($objetoU)){
                       ?>
                           <script type="text/javascript">
                               alert('Usuário alterado com sucesso.');
                                history.go(-2);
                           </script>
                       <?php
                       }else{
                       ?>
                           <script type="text/javascript">
                               alert('Problema ao alterar Usuário');
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
            if (isset($_GET['idUsuario'])){
                $dao = new UsuarioDAO();
                $id = $_GET['idUsuario'];
                if($dao->delete($id)){
                    ?>
                    <script type="text/javascript">
                        alert('Usuário excluído com sucesso.');
                        location.href = '../view/pages/conUsuario.php';
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