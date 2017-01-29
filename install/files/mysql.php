<?php
if(!defined('INSTALL')) die('Error');
if(isset($_POST['mysql'])) {
if(mysqli_connect($_POST['host'], $_POST['username'], $_POST['password'], $_POST['database'])){
if(empty($_POST['host']) || empty($_POST['database'])) {
$message = 'Merci de remplir les champs vide!';
} else {
$config = "<?php
define('HOST','".$_POST['host']."'); // Serveur de connexion à la base de données
define('USERNAME','".$_POST['username']."'); // Nom d'utilisateur
define('PASSWORD','".$_POST['password']."'); // Mot de passe
define('DATABASE','".$_POST['database']."'); // Nom de la base de données
define('MODE_DEV','1'); // Autoriser l'affichage d'erreur PHP (0 = Oui, 1 = Non) 
define('IP_ADMIN_BACKUP','::1'); // Autorisation de backup (Indique ton adresse IP) - (::1 = IP en localhost)
?>";
$f = '../includes/settings.inc.php';
$handle = fopen($f,"w"); 
if(is_writable($f))
fwrite($handle, $config);
fclose($handle);
} 
} else {
$message = 'Les informations de connexion vers la base de donnée sont incorrecte.';
}
}
?>