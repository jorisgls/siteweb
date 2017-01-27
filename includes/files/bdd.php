<?php
try { 
		$bdd = new MyPDO(HOST, DATABASE, USERNAME, PASSWORD); 
		$Mysql = new Mysql(HOST, DATABASE, USERNAME, PASSWORD);
if(MODE_DEV == '0') { 
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} 
		}catch(PDOException $e){ 
			if(!file_exists(PATH."includes/settings.inc.php")) { 
	if(file_exists("./install/index.php")) {
@header("Location: ./install"); 
} else {
	ini_set("display_errors",0); 
	print "* Aucun dossier d'installation.<br>* Aucun fichier de configuration."; 
}
} else {

if(file_exists("./install/error.php")) { require_once './install/error.php'; 
} else {
	print "Une erreur est survenue."; 
}
}
}
?>