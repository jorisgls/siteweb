<?php
function ConnectMYSQL($HOST,$USERNAME,$PASSWORD,$PORT,$DATABASE){
if(mysql_connect("".$HOST.":".$PORT."","".$USERNAME."","".$PASSWORD."")){
mysql_select_db("".$DATABASE."");
}else{
if(file_exists("./install/error.php") or file_exists("../install/error.php")){
include("./install/error.php");
include("../install/error.php");
} else {
echo "Une erreur est survenue.";
}
die;
}
}
$MYSQL_CREATE_C = array(
"localhost", // Serveur de connexion � la base de donn�es
"root", // Nom d'utilisateur
"", // Mot de passe
"siteweb"); // Nom de la base de donn�es 
ConnectMYSQL($MYSQL_CREATE_C[0],$MYSQL_CREATE_C[1],$MYSQL_CREATE_C[2],3306,$MYSQL_CREATE_C[3]);
?>