<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

$pageid = "index";
require_once './init.php';

if(isset($_POST['username']) && isset($_POST['password'])){
        if(!empty($_POST['username']) || !empty($_POST['password'])) {
        try {
            $password = isset($_POST['password']) ? Hashage($_POST['password']) : '';
            $username = isset($_POST['username']) ? safe($_POST['username'],'SQL') : '';
            $Auth::Login($username, $password, 'false', $table['BanSQL']);
            } catch(Exception $e){
        $erreurmess = $e->getMessage() AND $erreurc = true;
    }
        }else{
            $erreurmess = 'Merci de remplir les champs vides.' AND $erreurc = true;
        }
}

require_once './includes/files/register.php';

$Auth::Session_Connected($_SESSION);

$pagename = "Connexion STAFF";
?>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo Settings('Name'); ?>: <?php echo $pagename; ?> </title>

<link href="<?php echo URL; ?>/web/styles/style.css?1337" rel="stylesheet" type="text/css">
<link href="https://bootswatch.com/lumen/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/bootstrap-social.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/font-awesome.css" rel="stylesheet">
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">

</head>
<body style="background-color: rgba(232, 232, 232, 0.57);">
<div id="overlay"></div>
<div class="header" style="height: 56px;">
<div class="container" style="width: 950px;">
<a href="<?php echo URL; ?>"><div class="logotipo" style="width: 82px; float: left; height: 34px; font-size: 37px; font-family: 'Pacifico', cursive; top: 0px; position: absolute;"><?php echo Settings('Name'); ?></div></a>


<div class="clear"></div>
</div>
</div> <div style="clear:both;"></div>
<div class="container" style="width: 950px;">

<?php if ($erreurc == true) { ?>
<div class="alert alert-dismissible alert-warning" style="display:block;"><a href="<?php echo URL; ?>" type="button" class="close" data-dismiss="alert">x</a><strong>Oops!</strong> <?php echo $erreurmess; ?></div>
<?php } ?>
<div class="jumbotron" style="background: url('<?php echo URL; ?>/web/images/leet_view.png') no-repeat center center;position: relative; width: 100%; height: 300px; top: 0; left: 0; color: white; -webkit-box-sizing: border-box;text-align: left;">
<div class="login" style="width:100%;height:68px;">
<form method="post" class="navbar-form navbar-right" style="position:relative;top:-6px;" role="search">
<div class="form-group" style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.25);">
<i class="glyphicon glyphicon-user"></i> <input type="text" class="form-control" name="username" placeholder="Pseudo...">
</div>
<div class="form-group" style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.25);">
&nbsp;<i class="glyphicon glyphicon-lock"></i> <input type="password" class="form-control" name="password" placeholder="Mot de passe...">
</div>
<button type="submit" class="btn btn-info">Connexion</button>
</form>
</div>
<h2 style="padding-top: 20px; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.25);text-align: left; color: white;"><?php echo Settings('Name'); ?>...</h2>
<p class="lead" style="text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.25);">Si tu fais partie de l'équipe administrative tu peux te connecter grâce aux identifiants qui t'ont été fourni.</p>
<p><a class="btn btn-lg btn-success" href="<?php echo URL; ?>/register" role="button">AJOUTER UN STAFF</a> <!--<a role="button" href="<?php echo URL; ?>/account/forgot" class="btn btn-lg btn-danger" style="float:right">Mot de passe oublié ?</a>--></p>
</div>
<div style="clear:both;"></div>
<div class="after_banner">

<div class="panel panel-success" style="width: 49%;position: relative;float: left;">
<div class="panel-heading" style="background-color: #3FB618;font-size: 17px;font-weight: 600;"><?php echo Settings('Name'); ?>? <span class="glyphicon glyphicon-info-sign" aria-hidden="true" style="float: right;font-size: 25px;opacity: 0.85;"></span></div>
<div class="panel-body">
<?php echo Settings('Name'); ?> est un fansite officiel. Cette page est uniquement destinée à te connecter à ton espace personnel.</div>
</div>
<div class="panel panel-danger" style="width: 49%;position: relative;float: right;">
<div class="panel-heading" style="background-color: #FF0039;font-size: 17px;font-weight: 600;">PROBLEMES DE CONNEXION ? <span class="glyphicon glyphicon-warning-sign" aria-hidden="true" style="float: right;font-size: 25px;opacity: 0.85;"></span></div>
<div class="panel-body">
Si tu ne peux pas te connecter, tu peux contacter le manager ou un de tes responsables</div>
</div>
<div style="clear:both;"></div>
﻿
<?php include_once './templates/footer.php'; ?>

</div>
</body>
</html>