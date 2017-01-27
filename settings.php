<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';
$Auth::Session_Disconnected($_SESSION);

$do = safe($_GET['do'],'SQL');
$tab = safe($_GET['tab'],'SQL');
if($tab == "general") {
$textamigo = safe($_POST['textamigo'],'SQL');
$online = safe($_POST['online'],'SQL');
$join = safe($_POST['join'],'SQL');
if($join != "" && $online != "" && $textamigo != "") {
if(is_numeric($textamigo) && is_numeric($online) && is_numeric($join)) {
$bdd->exec("UPDATE users SET block_newfriends = '".$textamigo."', hide_online = '".$online."', hide_inroom = '".$join."' WHERE id = '".$User->id."'");
$message = "Profil actualité" and $type='success';
} else {
$message = "Une erreur c'est produit lors de la modification." and $type='danger';
}
} else {
$message = "Merci de remplir les champs vide." and $type='danger';
}
}

if(isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['retypedNewPassword']))
{
$mdpactuel = safe($_POST['currentPassword'],'SQL');
$mdpnew = safe($_POST['newPassword'],'SQL');
$mdpnewre = safe($_POST['retypedNewPassword'],'SQL');
$mdp5actuel = Hashage($mdpactuel);
$md5 = Hashage($mdpnew);
if($mdp5actuel == $User->password){
if($mdpnew == $mdpnewre){
if(strlen($mdpnew) < 6){
$message = "Ton mot de passe est trop court !" and $type='danger';
}  else {
if(strlen($mdpnew) > 25){
$message = "Ton mot de passe est trop long !" and $type='danger';
} else {
$bdd->exec("UPDATE users SET password = '".$md5."' WHERE username = '".$User->username."' and password = '".$mdp5actuel."'") or die(mysql_error());
$message     = "Profil actualité" and $type='success';
}
}
} else {
$message = "Les mots de passe ne correspondent pas." and $type='danger';
}
} else {
$message = "Le mot de passe actuel n'est pas celui-ci." and $type='danger';
}
}
 
$pageid = "settings";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo Settings('Name'); ?>: Préférence</title>
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
<img src="">
<?php include_once './templates/header.php'; ?>

<div class="container" style="width: 950px;">
<div style="clear:both;"></div>
<div class="after_banner">
<div class="panel panel-primary" style="width: 24%;position: relative;float: left;">
<div class="panel-heading">Paramètres</div>
<div class="list-group">
	
<a class="list-group-item" href="<?php echo URL; ?>/settings">Mon mot de passe</a>
</div>
</div>

<?php $do2 = safe($_GET['s'],'SQL'); if($do2 != "password") { ?>
<div class="panel panel-primary" style="width: 74%;position: relative;float: right;">
<div class="panel-heading">

Modifier votre mot de passe </div>
<div class="panel-body">
<?php if(isset($message)) { ?>
<div class="alert alert-dismissible alert-<?php echo $type; ?>"><strong>Message!</strong> <?php echo $message; ?></div>
<?php } ?>
<img src="<?php echo URL; ?>/web/images/settings.png" align="right">
<form method="post" class="form-horizontal">
<fieldset>
<span class="help-block"><strong>Entrez le nouveau mot de passe</strong><br>Votre nouveau mot de passe doit avoir au moins 6 caractères.</span>
<label class="control-label" for="inputPassword">Ancien mot de passe</label>
<div class="form-group">
<div class="col-lg-10">
<input type="password" class="form-control" name="currentPassword" id="inputPassword">
</div>
</div>

<label class="control-label" for="inputPassword">Nouveau mot de passe</label>
<div class="form-group">
<div class="col-lg-10">
<input type="password" class="form-control" name="newPassword" id="inputPassword">
</div>
</div>

<label class="control-label" for="inputPassword">Encore une fois</label>
<div class="form-group">
<div class="col-lg-10">
<input type="password" class="form-control" name="retypedNewPassword" id="inputPassword">
</div>
</div>
<hr>
<div class="form-group">
<div class="col-lg-10">
<button type="submit" class="btn btn-primary">Sauvegarder</button>
</div>
</div>
</fieldset>
</form>
</div>
</div>
<?php } ?>
</div>
<div style="clear:both;"></div>

﻿
<?php include_once './templates/footer.php'; ?>

</div>
</body>
</html>