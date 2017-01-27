<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Session_Disconnected($_SESSION);

$pageid = 9;
$pagename = "users";
  
include './init.hk.php';

if(isset($_POST['username']))
{
$username = safe($_POST['username'],'SQL');
$usid = $bdd->query("SELECT * FROM users WHERE username = '".safe($username,'SQL')."'");
$row = $usid->rowCount();
if($row < 1) {
$erreur = true;
} else {
$usid = $usid->fetch(PDO::FETCH_ASSOC);
$trouver = true;
}
}

if(isset($_POST['Number']) && isset($_POST['Username']) && isset($_POST['points']) && isset($_POST['test']) && isset($_POST['tuteur']) && isset($_POST['online']))
{
$Number = safe($_POST['Number'],'SQL');
$Username = safe($_POST['Username'],'SQL');
$points = $_POST['points'];
$test = $_POST['test'];
$tuteur = $_POST['tuteur'];
$online = $_POST['online'];


if(isset($Number) && isset($Username) && isset($points) && isset($test) && isset($tuteur) && isset($online)) {
$bdd->exec("UPDATE `users` SET `points` = '".safe($points,'SQL')."', `test` = '".safe(utf8_decode($test),'SQL')."', `online` = '".safe(utf8_decode($online),'SQL')."', `tuteur` = '".safe($tuteur,'SQL')."' WHERE `id` = '".safe($Number,'SQL')."'");
$User->AddLogs($User->username,'Modification du compte ('.safe($Username,'SQL').').');

}

$post_user = true;
}

include './templates/header.php';
?>
<div class="row">
<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Recherchez un utilisateur.</h3>
					</header>

					<div class="widget__content">
<?php if($erreur == true) { ?>
<br>
<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="media"><figure class="pull-left alert--icon"><i class="pe-7s-close-circle"></i></figure><div class="media-body"><h3 class="alert--title">Erreur</h3><p class="alert--text">Le nom de l'utilisateur est introuvable.</p></div></div></div>
<?php } ?>
<?php if($post_user == true){ ?>
						<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<div class="media">
								<figure class="pull-left alert--icon">
									<i class="pe-7s-attention"></i>
								</figure>
								<div class="media-body">
									<h3 class="alert--title">C'est fait !</h3> 
									<p class="alert--text">La modification a bien été prise en compte.</p>
								</div>
							</div>
						</div>
						<?php } ?>
<form method="post">
<input type="text" value="" name="username" class="input-text" placeholder="Pseudo" />
<br/>
<input type="submit" value="Rechercher" class="btn btn-light pull-right"/>
<div class="clearfix"></div>
</form>
<?php if($trouver == true) {
$ms = $bdd->query("SELECT * FROM users WHERE id = '".safe($usid['id'],'SQL')."'"); while($ms1 = $ms->fetch()) {
?>
<div class="media">
<figure class="pull-left rounded-image social_msg__img">
<img src="<?php print $User->Avatar($usid['look'],"b,2,2,sml,1,0"); ?>" alt="user">
</figure>
<div class="media-body">
<form method="post" action="users">
<h4 class="media-heading social_msg__heading"><?php print $usid['username']; ?> </h4>
<small class="social_msg__meta">ID de l'utilisateur</small>
<input type="text" class="input-text" disabled="disabled" value="<?php print $usid['id']; ?>" />
<input type="hidden" name="Number" value="<?php print $usid['id']; ?>" />
<small class="social_msg__meta">Pseudo</small>
<input type="text" class="input-text" disabled="disabled" value="<?php print $usid['username']; ?>" />
<input type="hidden" name="Username" value="<?php print $usid['username']; ?>" />

<small class="social_msg__meta">Points</small>
<input type="text" class="input-text" name="points" value="<?php echo utf8_encode(stripslashes($usid['points'])); ?>" />
<small class="social_msg__meta">Absent (0 = oui ; 1 = non)</small>
<input type="text" class="input-text" name="online" value="<?php echo utf8_encode(stripslashes($usid['online'])); ?>" />
<small class="social_msg__meta">Test du staff (réussi, prolongé)</small>
<input type="text" class="input-text" name="test" value="<?php echo utf8_encode(stripslashes($usid['test'])); ?>" />
<small class="social_msg__meta">Tuteur du staff (pseudo)</small>
<input type="text" class="input-text" name="tuteur" value="<?php echo utf8_encode(stripslashes($usid['tuteur'])); ?>" />
<small class="social_msg__meta">Dernière connexion</small>
<input type="text" class="input-text" disabled="disabled" value="<?php print $date." ".date('H:i:s', $usid['last_offline']); ?>" />
<?php if($User->rank >= 9) { ?>
<small class="social_msg__meta">Dernière IP</small>
<input type="text" class="input-text" disabled="disabled" value="<?php print $usid['ip_last']; ?>" />
<small class="social_msg__meta">IP à l'inscription</small>
<input type="text" class="input-text" disabled="disabled" value="<?php print $usid['ip_reg']; ?>" />
<?php } ?>
<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
</form>
<div class="social_msg"></div><br>

<?php }} ?>
</article>
</div></div>
<?php include './templates/footer.php'; ?>