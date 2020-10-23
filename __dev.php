<?php
define("SISTEM", "Amazing Thailand Virtual Trade Meet");
define("SIS_VER", "Versão 1.0"); // VERSÃO DO SISTEMA ADMIN
define("SIS_COPYRIGHT", "Copyright TMC Comunicação - 06/2020 - Proibido Cópia Total ou Parcial");
define("URL","https://127.0.0.1/Delivery4ll/"); //URL da RAIZ do SISTEMA
define("_FS","/home/romeu/www/Delivery4ll/");
define("DATA_FIM_CADASTRO", '2020-08-25');
define("EMAIL_FROM","Thai Latin <dev@thailatintrademeet.com>");
define("EMAIL","dev@thailatintrademeet.com");
define("SERVERDB","localhost");
define("DBNAME","delivery4ll");
define("DBUSER","delivery4ll");
define("DBPASSW","xoxota1234");
define("SSID", "Dli.".md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));

ini_set('session.name','THAIloginControl');
date_default_timezone_set('America/Sao_Paulo'); //garante que a TIMEZONE esteja correta
$cookieParams['lifetime'] = 0;
$cookieParams['domain'] = 'thailatintrademeet.com';
$cookieParams['secure'] = true;
$cookieParams['httponly'] = true;
$cookieParams['samesite'] = "Lax";
session_set_cookie_params($cookieParams);
session_name('THAIloginControl');
?>