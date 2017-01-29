<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

if(!defined('INSTALL')) die('Error') ;
/*+===================================+
|             Sécurité                |
+===================================+*/
$injection = 'INSERT|UNION|SELECT|NULL|COUNT|FROM|LIKE|DROP|TABLE|WHERE|COUNT|COLUMN|TABLES|INFORMATION_SCHEMA|OR' ;
foreach($_GET as $getSearchs){
$getSearch = explode(" ", $getSearchs);
foreach($getSearch as $k=>$v){
if(in_array(strtoupper(trim($v)),explode('|', $injection))){
exit;
}
}
}

/*+===================================+
|          Configuration PHP          |
+===================================+*/
if(!headers_sent())
header('Content-Type: text/html; charset=utf-8');
ini_set('default_charset', 'utf-8');
if(function_exists('date_default_timezone_set')){
@date_default_timezone_set('Europe/Paris'); }
if(!defined('_MYSQL_REAL_ESCAPE_STRING_'))
define('_MYSQL_REAL_ESCAPE_STRING_', function_exists('mysql_real_escape_string'));
ini_set("display_errors",0); error_reporting(0);

/*+===================================+
|     Importation des librarys        |
+===================================+*/
@include("../includes/functions.php");
@include("../includes/class/class.config.php");
@include("../includes/class/class.install.php");
@include("../includes/class/class.db.php");

/*+===================================+
|   Initialisation des class          |
+===================================+*/
$Config = new Config(); //Configuration
$Install = new Install($bdd); //Installation
$Db = new Db($bdd); //SQL
?>