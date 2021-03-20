<?php
require_once("./../_configure.php"); // Carrega as funções e configurações globais
define('ADMIN',URL.'admin/');
require_once(_FS."admin/_auth.php"); //Verifica se esta LOGADO, se não está DIRECIONA PARA LOGIN
require_once(_FS."admin/_route.php"); //TRATA a VARIAVEL $route para chamar o VIEW e CONTROL padrão
if(file_exists(_FS."admin/_controls/".$_SESSION['control']."_control.php")){
    require_once(_FS."admin/_controls/".$_SESSION['control']."_control.php");
} else {
    if(AMBIENTE == 'DEVELOPER'){
        echo ($_SESSION['control']."_control.php");
    } else {    
        $_SESSION['control']='dashboard';
        $_SESSION['view']='list';
        $_SESSION['erro_no']='2';
        $_SESSION['erro']='CHAMADA PARA PROCEDIMENTO INVÁLIDO';
    }  
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title><?php echo SISTEM; ?> - ADMIN</title>
     <link rel="shortcut icon" href="<?php echo URL;?>img/favicon.ico" />
     <link href="https://fonts.googleapis.com/css?family=Cairo:400,700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css" integrity="sha256-F+DaKAClQut87heMIC6oThARMuWne8+WzxIDT7jXuPA=" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
     <link href="<?php echo URL;?>/css/global.css" rel="stylesheet">
     <link href="<?php echo URL;?>/css/administrador.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
     <script type="text/javascript" src="<?php echo URL;?>js/main.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js" integrity="sha256-t5ZQTZsbQi8NxszC10CseKjJ5QeMw5NINtOXQrESGSU=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js" integrity="sha256-hJ44ymhBmRPJKIaKRf3DSX5uiFEZ9xB/qx8cNbJvIMU=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="loader" style="display: block;"></div>
    <script>var spinner = $('#loader'); spinner.hide();</script>
    <nav>
        <div class=menu><?php include_once(_FS."admin/_menu.php"); ?></div>
    </nav>
    <header><?php echo(show_erro()); $_SESSION['erro']=0;?>
        <script>
            if (eShow=='S') {
                Swal.fire({
                        title: sTitulo,
                        html: sMens,
                        icon: sIcon,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Fechar'
                })
            }
        </script>
    </header>
    <section>
          <div class=main>
            <?php 
               //INCLUI CONFORME A CHAMADA DO ROTEAMENTO
               if(file_exists(_FS."admin/_views/".$_SESSION['control'].'_'.$_SESSION['view']."_view.php")){
                require_once(_FS."admin/_views/".$_SESSION['control'].'_'.$_SESSION['view']."_view.php");
               } else {
                if(AMBIENTE == 'DEVELOPER') {
                    echo "VIEW INEXISTENTE->".$_SESSION['control'].'_'.$_SESSION['view']."_view.php";
                  } else {
                    require_once(_FS."admin/_views/dashboard_list"."_view.php");
                  }            
               }
            ?>
          </div>
     </section>
     <footer>
          <div class=footer>
            <?php 
                require_once(_FS."/admin/_footer.php"); // Finaliza o script fechando as conexões e dando a saida do DEBUG
            ?>
          </div>
     </footer>
</body>
</html>
<?php 
    require_once(_FS."_footer.php"); // Finaliza o script fechando as conexões e dando a saida do DEBUG
?>
