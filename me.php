<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';

 
$pageid = "accueil";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />


<link rel="shortcut icon" href="<?php echo URL; ?>/web/images/favicon.ico" type="image/vnd.microsoft.icon">
<link href="<?php echo URL; ?>/web/styles/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/bootstrap-social.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/font-awesome.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">

</head>
<body style="background-color: rgba(232, 232, 232, 0.57);">

<?php include_once './templates/header.php'; ?>


<div class="container" style="width: 950px;">
</br>
<div style="clear:both;"></div>
<div class="after_banner" style="top:-14px;position:relative;">


 <?php
$connect = mysql_connect('localhost','root','') or die ("erreur de connexion");
mysql_select_db('siteweb',$connect) or die ("erreur de connexion base");
$result = mysql_query("SELECT article from articles");
$tab = mysql_fetch_array($result);

?>



<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Bienvenue !</strong><?php echo '<p>'. $tab['article'].'<b>'. $tab['tuteur'].'</b></p>';?>
</div>
<script type="text/javascript">
	$('.close').click(function(){
	 $('.alert').fadeOut();
	});
</script>




<div class="panel panel-warning" style="width: 100%;position: relative;float: right; border-color:#058ce1;">
<div class="panel-heading" style="font-size: 17px;font-weight: 600; background-color:#058ce1; border-color:#058ce1"><span class="glyphicon glyphicon-calendar" aria-hidden="true" style="float:right;font-size:25px;opacity:0.85;"></span> <center>ACTUS</center></div>
</br>

<?php

$connect = mysql_connect('localhost','root','') or die ("erreur de connexion");
mysql_select_db('siteweb',$connect) or die ("erreur de connexion base");
$result = mysql_query("SELECT url from retrophp_fansites ORDER BY id DESC");
echo '<table>';
while ( $row = mysql_fetch_array($result)){
	echo '<tr>';
	echo '<td><p><b>&nbsp; &nbsp;&nbsp;&nbsp;NEW :</b>  '. $row['url'].'   </td><td id="tailleMess">' .$row['message'].'</td>';
	echo '</tr>';
}
echo '</table>';
?>

</div>



<div class="panel panel-warning" style="width: 46%;position: relative;float: right;">
<div class="panel-heading" style="font-size: 17px;font-weight: 600;"><span class="glyphicon glyphicon-comment" aria-hidden="true" style="float:right;font-size:25px;opacity:0.85; margin-bottom:26px"></span> <center>TWITTER</center></div>
<div class="list-group">
 <a class="twitter-timeline" height="250" data-dnt="true" href="https://twitter.com/AlphaNewsOFF" >Tweets by AlphaNewsOFF</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
 
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
</div>







<div class="panel panel-warning" style="width: 53%;position: relative;float: right; margin-right:9px;">
<div class="panel-heading" style="font-size: 17px;font-weight: 600;"><span class="glyphicon glyphicon-pushpin" aria-hidden="true" style="float:right;font-size:25px;opacity:0.85;"></span> <center>POTINS ET BLABLA</center></div>
<div class="list-group">




<?php $news = $bdd->query("SELECT * FROM annonce ORDER BY id DESC LIMIT 1"); while($a = $news->fetch()) { ?>
<div class="jumbotron" style="float:left;padding: 0px;background-image: url(<?php echo $a['topstory_image']; ?>);background-position-y: -7px;background-position-x: -169px;height: 233px;color: white;width: 97%;overflow: hidden; margin-left:7px; margin-top:8px;">
<div style=" background-color: rgba(0, 0, 0, 0.28);position: relative;top: 0;padding-top: 2px;padding-left: 20px;padding-bottom: 8px;width: 100%;right: 0;filter: dropshadow(color=#000,offx=1,offy=1);border-top-right-radius: 5px;border-top-left-radius: 5px;">
<h3 style="color: white;"><?php echo $a['title']; ?></h3>
</div>

<div style="padding-top: 10px;padding-left: 20px;width: 70%;position: relative;">
<?php echo $a['snippet']; ?></div>
</div>
<?php } ?>
</div>
</div>

<div style="clear:both;"></div>

﻿
<?php include_once './templates/footer.php'; ?>

</div>
	</div>
</body>
</html>