<?php
if (!isset($TRUE) or ($TRUE<>'index.php')) die('LOCKED');
$_SESSION['rtStop'] = microtime(true);
$time = $_SESSION['rtStop']-$_SESSION['rtStart'];
$_SESSION['exec_time']="".round($time,'3')." - Segundos";
if(AMBIENTE == "DEVELOPER"){
  __out("SAIDA FINALIZADA COM SUCESSO", 200);
} else {
  echo "RODAPÉ USUÁRIO";
}
?>