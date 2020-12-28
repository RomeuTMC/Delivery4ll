<?php if(!isset($TRUE) or ($TRUE<>'index.php')) die('LOCKED'); 
logado();
$_SESSION['dados']=$_POST;
if(!isset($_SESSION['route'][1]) or $_SESSION['route'][1]=='list'){
    $_SESSION['dados']=dashboard_list();
}else {
    // VIEW PADRÃO ou MOSTRA QUE NÃO EXISTE se for DEV
    if(AMBIENTE == 'DEVELOPER') {
        print_r($_SESSION['route']);
      } else {
        $_SESSION['dados']=dashboard_list();
      }
}

function dashboard_list(){
    global $db;
    return "romeu";
}