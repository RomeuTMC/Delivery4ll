<?php
define("SISTEM", "Delivery 4ll - Sistema de Delivery Integrado");
define("SIS_VER", "Versão 1.0"); // VERSÃO DO SISTEMA ADMIN
define("SIS_COPYRIGHT", "Copyright Brasap/Romeu Gomes - 06/2020 - Proibido Cópia Total ou Parcial");
define("URL","https://127.0.0.1/Delivery4ll/"); //URL da RAIZ do SISTEMA
define("_FS","/home/daniel/DRIVE/SITES/Delivery4ll/");
define("SERVERDB","localhost");
define("DBNAME","delivery");
define("DBUSER","delivery");
define("DBPASSW","rg004040#");
define("SSID", "Dli.".md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));

ini_set('session.name',SSID);
date_default_timezone_set('America/Sao_Paulo'); //garante que a TIMEZONE esteja correta
$cookieParams['lifetime'] = 0;
$cookieParams['domain'] = 'romeugomes.ddns.net';
$cookieParams['secure'] = true;
$cookieParams['httponly'] = true;
$cookieParams['samesite'] = "Lax";
session_set_cookie_params($cookieParams);
session_name(SSID);
?>
