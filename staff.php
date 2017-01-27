<?php

require_once './init.php';

 
$pageid = "staff";
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
<p style="float: right;position: relative;z-index: 10;top: 12px;">
<style>body{background:#fff;}#staff_display{display:inline-block;background-color:rgba(0,0,0,0.04);margin-left:19px;box-shadow:3px 3px rgba(0,0,0,.2);margin-right:19px;margin-bottom:15px;margin-top:15px;width:155px;padding:17px 3px;border-radius:4px;}#staff_display:hover{box-shadow:5px 5px rgba(0,0,0,.2);}#titre_staff{text-align:center;font-size:14px;margin-bottom:5px;color:#000;text-shadow:1px 1px #FFFFFF;font-weight:bold;}#desc_staff{text-align:center;font-size:14px;margin-bottom:5px;color:#fff;text-shadow:1px 1px #000;font-weight:bold;background:#069;}.display_staff{-ms-interpolation-mode:nearest-neighbor;image-rendering:-webkit-crisp-edges;image-rendering:-moz-crisp-edges;image-rendering:-o-crisp-edges;image-rendering:pixelated;height:83px;}</style>
<div id="gradient_bg_adow" style="background: linear-gradient(white,#FFFFFF);">
<div class="container_24">
<div class="grid_21">





<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><center><b>RESPONSABLES & COMMUNITY MANAGER</b></center></h3>
  </div>
  <div class="panel-body">




<div class="head" style="    padding: 0px 3px 0px;min-height: 4px;"></div>
<xss style="display:inline;">
<?php $sql = $bdd->query("SELECT * FROM users WHERE rank = '10' or rank = '9' or rank = '8'"); while($s = $sql->fetch()) { ?>
<div id="staff_display">
<div id="titre_staff"><?php print $s['username']; ?></div>
<div id="desc_staff" style="    <?php if($s['online'] == '0') { ?>background: #F25754;<?php } elseif($s['online'] == '1') { ?>background: #4CAF50;<?php } ?>"><?php $gradesql = $bdd->query("SELECT * FROM ranks WHERE id = '".safe($s['rank'],'SQL')."'"); while($grade = $gradesql->fetch()) { print $grade['name']; } ?></div>
<center><div style="background-image:url(<?php print Settings('Avatarimage'); ?>avatarimage?figure=<?php print $s['look'] ; ?>&direction=3&head_direction=3&gesture=sml&action=&size=l);    height: 101px;
    background-position: 10px -38px;z-index: 999;"></div></center>
<center>
<?php if($s['online'] == '0') { ?>
<button type="button" class="btn btn-danger disabled">
<div class="center" style="line-height: 32px;" fit="">ABSENT</div></button>
<paper-ripple fit=""></paper-ripple>
</a>
<?php } elseif($s['online'] == '1') { ?>
<button type="button" class="btn btn-success">
<div class="center" style="line-height: 32px;" fit="">PRESENT</div></button>
<paper-ripple fit=""></paper-ripple>
</a>
<?php } ?>
</center> </div> 
<?php } ?>

 </div>
</div>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><center><b>JOURNALISTE & CORRECTEUR</b></center></h3>
  </div>
  <div class="panel-body">




<div class="head" style="    padding: 0px 3px 0px;min-height: 4px;"></div>
<xss style="display:inline;">
<?php $sql = $bdd->query("SELECT * FROM users WHERE rank = '7' or rank = '6'"); while($s = $sql->fetch()) { ?>
<div id="staff_display">
<div id="titre_staff"><?php print $s['username']; ?></div>
<div id="desc_staff" style="    <?php if($s['online'] == '0') { ?>background: #F25754;<?php } elseif($s['online'] == '1') { ?>background: #4CAF50;<?php } ?>"><?php $gradesql = $bdd->query("SELECT * FROM ranks WHERE id = '".safe($s['rank'],'SQL')."'"); while($grade = $gradesql->fetch()) { print $grade['name']; } ?></div>
<center><div style="background-image:url(<?php print Settings('Avatarimage'); ?>avatarimage?figure=<?php print $s['look'] ; ?>&direction=3&head_direction=3&gesture=sml&action=&size=l);    height: 101px;
    background-position: 10px -38px;z-index: 999;"></div></center>
<center>
<?php if($s['online'] == '0') { ?>
<button type="button" class="btn btn-danger disabled">
<div class="center" style="line-height: 32px;" fit="">ABSENT</div></button>
<paper-ripple fit=""></paper-ripple>
</a>
<?php } elseif($s['online'] == '1') { ?>
<button type="button" class="btn btn-success">
<div class="center" style="line-height: 32px;" fit="">PRESENT</div></button>
<paper-ripple fit=""></paper-ripple>
</a>
<?php } ?>
</center> </div> 
<?php } ?>

 </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><center><b>HELPEURS SUPPORT</b></center></h3>
  </div>
  <div class="panel-body">




<div class="head" style="    padding: 0px 3px 0px;min-height: 4px;"></div>
<xss style="display:inline;">
<?php $sql = $bdd->query("SELECT * FROM users WHERE rank == '5'"); while($s = $sql->fetch()) { ?>
<div id="staff_display">
<div id="titre_staff"><?php print $s['username']; ?></div>
<div id="desc_staff" style="    <?php if($s['online'] == '0') { ?>background: #F25754;<?php } elseif($s['online'] == '1') { ?>background: #4CAF50;<?php } ?>"><?php $gradesql = $bdd->query("SELECT * FROM ranks WHERE id = '".safe($s['rank'],'SQL')."'"); while($grade = $gradesql->fetch()) { print $grade['name']; } ?></div>
<center><div style="background-image:url(<?php print Settings('Avatarimage'); ?>avatarimage?figure=<?php print $s['look'] ; ?>&direction=3&head_direction=3&gesture=sml&action=&size=l);    height: 101px;
    background-position: 10px -38px;z-index: 999;"></div></center>
<center>
<?php if($s['online'] == '0') { ?>
<button type="button" class="btn btn-danger disabled">
<div class="center" style="line-height: 32px;" fit="">ABSENT</div></button>
<paper-ripple fit=""></paper-ripple>
</a>
<?php } elseif($s['online'] == '1') { ?>
<button type="button" class="btn btn-success">
<div class="center" style="line-height: 32px;" fit="">PRESENT</div></button>
<paper-ripple fit=""></paper-ripple>
</a>
<?php } ?>
</center> </div> 
<?php } ?>

 </div>
</div>


 </xss> </div></div></div></div>
<div style="clear:both;"></div></div></div>
<br>


</body>
</html>


    
 