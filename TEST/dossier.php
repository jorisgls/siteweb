<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|



include("./init.php");
 
$pagename = "Dossier STAFF";
$pageid = "dossier";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo Settings('Name'); ?>: <?php echo $pagename; ?></title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/jquery.slides.min.js?<?php echo $update; ?>"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/jquery.tipTip.minifiedA.js?<?php echo $update; ?>"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/lightbox-2.6.min.js?<?php echo $update; ?>"></script>
	<script type="text/javascript" src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/cycle.js?<?php echo $update; ?>"></script>
	<script type="text/javascript" src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/general2.js?<?php echo $update; ?>"></script>
	
	<link href='http://fonts.googleapis.com/css?family=Roboto|Open+Sans:300italic,400,600,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Caesar+Dressing' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/grid.css?<?php echo $update; ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/slider.css?<?php echo $update; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/general2.css?745" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/buttons.css?<?php echo $update; ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/lightbox.css?<?php echo $update; ?>" />
	<link rel="icon" type="image/png" href="favicon.ico" />
	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic|Ubuntu+Condensed' rel='stylesheet' type='text/css'>

	<?php include("./templates/meta.php"); ?>

	<script>
		$(function(){
			$(".tip").tipTip({defaultPosition:'top',delay:0});
										titlePage('<?PHP echo $pagename; ?>');
						
							subMenu('<?PHP echo $pageid; ?>');
						forumUpdate();
			forumClear();
			menu('<?PHP echo $pageid; ?>');
		});
	</script>

</head>
<body>

<div id="details"></div>
<div id="all">
	<br>
	<?php include("./templates/header.php"); ?>

	
	<div id="corp">
	
	<?php include("./templates/dedicaces.php"); ?>
	
<div class="clear"></div>
		
			<div class="row">
	
			<div class="column grid_10">
</br>
<div class="height"></div>

<link href="../bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap.css" rel="stylesheet">

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

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	<i>Tu as perdu des points et tu n'en connais pas la raison ? Contacte le responsable, il t'indiquera le motif.</i>
  </div>
</div>
</br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"></b>> MES MESSAGES</b></h3>
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
	
	
	- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	<i>Ton tuteur est là pour te former si tu as quelconque questions , tu peux t'adresser à lui. Tu peux aussi contacter les gérants si ils sont disponible.</i>
	
	
	
  </div>
</div>



<br>

<br>


				
				</div></div>





<br>


				
				</div></div>

</body>
</html>