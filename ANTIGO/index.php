<?
include_once("./_configure.php");
echo("<h1>Delivery 4ll</h1>");
$d=scandir('.');
foreach($d as $a){
    echo "<a href='./".$a."'>$a</a><br>";
}
echo "<hr>";
phpinfo();