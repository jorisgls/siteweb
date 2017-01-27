<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';

 
$pageid = "site";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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

<div class="container" style="width: 950px;">
</br>
<div style="clear:both;"></div>
<div class="after_banner" style="top:-14px;position:relative;">

<?php $news = $bdd->query("SELECT * FROM retrophp_news ORDER BY id DESC LIMIT 1"); while($a = $news->fetch()) { ?>
<div class="jumbotron" style="float:left;padding: 0px;background-image: url(<?php echo $a['topstory_image']; ?>);background-position-y: -7px;background-position-x: -169px;height: 233px;color: white;width: 50%;overflow: hidden;">
<div style=" background-color: rgba(0, 0, 0, 0.28);position: relative;top: 0;padding-top: 2px;padding-left: 20px;padding-bottom: 8px;width: 100%;right: 0;filter: dropshadow(color=#000,offx=1,offy=1);border-top-right-radius: 5px;border-top-left-radius: 5px;">
<h3 style="color: white;"><?php echo $a['title']; ?></h3>
</div>
<div style="padding-right:8px;position:relative;top:50px;"><a href="<?php echo URL; ?>/news/<?php echo $a['id']; ?>-<?php echo $a['id_page']; ?>" class="btn btn-success" style="float: right;top: 14px;position: relative;box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.48);text-transform: none;font-size: 13px;">
En savoir <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
</div>
<div style="padding-top: 10px;padding-left: 20px;width: 70%;position: relative;">
<?php echo $a['snippet']; ?></div>
</div>
<?php } ?>

<div class="panel panel-warning" style="width: 46%;position: relative;float: right;">
<div class="panel-heading" style="font-size: 17px;font-weight: 600;"><span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="float:right;font-size:25px;opacity:0.85;"></span> INTERVIEWS</div>

</br>
<center><p><b>[INTERVIEW]</b> Olpha, gérante mais pas que ...</p></center>


</div> 





<div style="clear:both;"></div>
﻿
<?php include_once './templates/footer.php'; ?>

</div>
</div>
</body>
</html>