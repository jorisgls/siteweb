<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';

 
$pageid = "management";
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
    <h3 class="panel-title"><b>Bienvenue sur la page management <?php echo $User->username; ?></b></h3>
	
  </div>
  <div class="panel-body">
    <?php



?>



	
<b>Tu peux noter ton abscence en accédant à l'administration via "Signaler une abscence"</b>
	<div style=""><a href="<?php echo URL; ?>/admin/abs" class="btn btn-success" style="box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.48);text-transform: none;font-size: 13px;">
ABSCENCES</a>
</div>
</br>
</br>
<b>Tu peux accéder à ton dossier pour voir ton nombre de points, tes messages et ton statut </b>
	<div style=""><a href="<?php echo URL; ?>/dossier.php" class="btn btn-success" style="box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.48);text-transform: none;font-size: 13px;">
MON DOSSIER</a>
</div>

</br>
</br>
<b>Tu peux modifier ton mot de passe ici, il t'est conseillé d'utiliser un mot de passe inhabituel </b>
	<div style=""><a href="<?php echo URL; ?>/settings.php" class="btn btn-success" style="box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.48);text-transform: none;font-size: 13px;">
MODIFIER MON MOT DE PASSE</a>
</div>

  </div>
</div>
</br>


	
	
	
	
	
	
  </div>
</div>

</center>

<br>

<br>








</body>
</html>

