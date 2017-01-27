<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';

 
$pageid = "dossier";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="../bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo URL; ?>/web/images/favicon.ico" type="image/vnd.microsoft.icon">
<link href="<?php echo URL; ?>/web/styles/style.css" rel="stylesheet" type="text/css">
<link href="https://bootswatch.com/lumen/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/bootstrap-social.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/font-awesome.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">

</head>
<body style="background-color: rgba(232, 232, 232, 0.57);">

<?php include_once './templates/header.php'; ?>


<center>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><b>> MES POINTS</b></h3>
  </div>
  <div class="panel-body">
    <?php


$connect = mysql_connect('localhost','root','') or die ("erreur de connexion");
mysql_select_db('siteweb',$connect) or die ("erreur de connexion base");
$user_name = $_SESSION['username'];
$result = mysql_query("SELECT id,points from users WHERE username='".$user_name."'");
$tab = mysql_fetch_array($result);
echo '<p>Il vous reste <b>'. $tab['points'].'</b> point(s)</p>';


?>


	<i>Tu as perdu des points et tu n'en connais pas la raison ? Contacte le responsable, il t'indiquera le motif.</i>
  </div>
</div>
</br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><b>> MES MESSAGES</b></h3>
  </div>
  <div class="panel-body">
    <?php

$result = mysql_query("SELECT message,username_envoi from message_users WHERE user_id='".$tab['id']."' ORDER BY id_message DESC");
echo '<table>';
while ( $row = mysql_fetch_array($result)){
	echo '<tr>';
	echo '<td><p> Message de <b>'. $row['username_envoi'].' </b> : </td><td id="tailleMess">' .$row['message'].'</td>';
	echo '</tr>';
}
echo '</table>';
?>
  </div>
</div>
</br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><b>> MON STATUT</b></h3>
  </div>
  <div class="panel-body">
    <?php


$connect = mysql_connect('localhost','root','') or die ("erreur de connexion");
mysql_select_db('siteweb',$connect) or die ("erreur de connexion base");
$user_name = $_SESSION['username'];
$result = mysql_query("SELECT test,tuteur from users WHERE username='".$user_name."'");
$tab = mysql_fetch_array($result);
echo '<p>Ton test est <b>'. $tab['test'].'</b> et ton tuteur est <b>'. $tab['tuteur'].'</b></p>';


?>  
	
	
	
	<i>Ton tuteur est là pour te former si tu as quelconque questions , tu peux t'adresser à lui. Tu peux aussi contacter les gérants si ils sont disponible.</i>
	
	
	
  </div>
</div>

</center>

<br>

<br>








</body>
</html>