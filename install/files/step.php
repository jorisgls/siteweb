<?php
if(!defined('INSTALL')) die('Error');
if(file_exists("../includes/settings.inc.php")){
include '../includes/settings.inc.php';
try {
$bdd = new PDO('mysql:host='.HOST.';dbname='.DATABASE.';charset=utf8', USERNAME, PASSWORD);
} catch (PDOException $e) {
$erreurSQL = true;
}
if($erreurSQL == false) {
$VerifMySQL = true;
if(!tableExists('retrophp_settings') OR !tableExists('retrophp_news') OR !tableExists('retrophp_swfs')) {
$Etape = 2;
if(isset($_POST['insert'])) {
foreach(explode(";", file_get_contents('sql/retrophp.sql')) as $query){ $result = $bdd->query($query); header("Refresh:0"); }
Redirect(URL);
}
} else {
$tt1 = $bdd->query("SELECT * FROM retrophp_settings WHERE id = '1'");
if($tt1->rowCount() < 1) {
$Etape = 3;
if(isset($_POST['nom']) && isset($_POST['emu'])) { 
$nom = $_POST['nom'];
$emu = $_POST['emu'];
$Install->BaseSQL($nom, $emu);
Redirect(URL);
}
} else {
$Etape = 5;
}
}
}
} else {
unlink('../includes/settings.inc.php');
}
?>