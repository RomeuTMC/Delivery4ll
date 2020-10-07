<?php
if(!isset($TRUE) or ($TRUE<>'index.php')) die('LOCKED');
$_SESSION['login']=FALSE;
$_SESSION['control']='login';
$_SESSION['view']='list';