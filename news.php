<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';


$id = safe($_GET['id'],'SQL');
$idpage = safe($_GET['idpage'],'SQL');
$sql = $bdd->query("SELECT * FROM retrophp_news WHERE id_page = '".$idpage."' AND id = '".$id."'");
$n = $sql->fetch(PDO::FETCH_ASSOC);
 
$pageid = "news";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo Settings('Name'); ?>: Nouveautés</title>
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
<div style="clear:both;"></div>
<div class="after_banner">
<div class="panel panel-primary" style="width: 22%;position: relative;float: left;">
<div class="panel-heading">Nouveautes</div>
<div class="panel-body"><b>Dernièrement</b>
</div>
<?php $news = $bdd->query("SELECT * FROM retrophp_news ORDER BY id DESC"); while($a = $news->fetch()) { ?>
<div class="list-group">
	<a class="list-group-item" href="<?php echo URL; ?>/news/<?php echo $a['id']; ?>-<?php echo $a['id_page']; ?>"><?php echo $a['title']; ?></a>
</div><br> 
<?php } ?>
</div>
<div class="panel panel-info" style="width: 74%;position: relative;float: right; margin-top:0px;">
<?php 
if(empty($n)) {
$eSQL = $bdd->query("SELECT * FROM retrophp_news ORDER BY id DESC LIMIT 1");
$e = $eSQL->fetch(PDO::FETCH_ASSOC);
?>
<div class="panel-heading">
<?php echo $e['title']; ?> </div>
<div class="panel-body"><?php echo $e['body']; ?></div>
<?php } else { ?>
<div class="panel-heading">
<?php echo $n['title']; ?> </div>
<div class="panel-body"><?php echo $n['body']; ?></div>
<?php } ?>
</div>
<div style="clear:both;"></div>

﻿
<?php include_once './templates/footer.php'; ?>

</div>
</body>
</html>