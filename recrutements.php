<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';

 
$pageid = "recrutements";
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

<div class="container" style="width: 950px; background-color:white">
</br>
<div style="clear:both;"></div>
<div class="after_banner" style="top:-14px;position:relative;">

</br>
<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>[OPEN]</strong> Les recrutements sont ouverts, si tu souhaites rejoindre notre équipe c'est ici !
</div>
<script type="text/javascript">
	$('.close').click(function(){
	 $('.alert').fadeOut();
	});
</script>


<div class="jumbotron">
  <b><h1>Les avantages</h1></b>
  - Une évolution de rang sur le long terme est garantie</br>- Une administration complète te permettant de faire ton travail le plus agréablement possible</br>- Tu bénéficies d'une formation complète et d'un suivi durant toute la durée de ton rang par des responsables qui ont déjà été staff</br>
  </br>

  <p><a class="btn btn-primary btn-lg" href="/recruts/recrutements" role="button">POSTULER</a></p>
</div>

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="/web/images/1.png" alt="...">
      <div class="caption">
        <h3>Journaliste</h3>
        <p>Un poste qui n'est pas à prendre à la légère puisqu'il s'agit d'un des postes le plus important. Il imagine et rédige les articles et les interviews.</p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="/web/images/2.gif" alt="...">
      <div class="caption">
        <h3>Correcteur</h3>
        <p>Il sera en permanente communication avec le journaliste afin de corriger tous les articles ... Il doit avoir une orthographe parfaite. </p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="/web/images/3.gif" alt="...">
      <div class="caption">
        <h3>Helpeur support</h3>
        <p>Il s'occupe de répondre à toutes les demandes des internautes via le support. Il doit être disponible souvent pour répondre aux messages.</p>
        
      </div>
    </div>
  </div>
</div>




<div style="clear:both;"></div>
﻿
<?php include_once './templates/footer.php'; ?>

</div>
</div>
</body>
</html>