<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 9;
$pagename = "users";
  
include("./init.hk.php");

if(isset($_POST['username']))
{
$username = $_POST['username'];
$usid = mysql_query("SELECT * FROM users WHERE username = '".$username."'");
$row = mysql_num_rows($usid);
if($row < 1) {
$erreur = true;
} else {
$usid = mysql_fetch_assoc($usid);
$trouver = true;
}
}

if(isset($_POST['Number']) && isset($_POST['Username']) && isset($_POST['Perso']) && isset($_POST['points']) && isset($_POST['test']) && isset($_POST['tuteur']) && isset($_POST['groupemessage']) && isset($_POST['look']))
{
$Number = Securise($_POST['Number']);
$Username = Securise($_POST['Username']);
$Perso = Securise($_POST['Perso']);
$points = Securise ($_POST['points']);
$test = Securise ($_POST['test']);
$tuteur = Securise ($_POST['tuteur']);
$groupemessage = Securise ($_POST['groupemessage']);
$look = Securise ($_POST['look']);

if(isset($Perso) && isset($Number) && isset($Username) && isset($points) && isset($test) && isset($tuteur) && isset($groupemessage) && isset($look)) {
mysql_query("UPDATE `users` SET `points` = '".$points."',`test` = '".$test."' ,`groupemessage` = '".$groupemessage."',`look` = '".$look."',`tuteur` = '".$tuteur."' ,`motto` = '".utf8_decode($Perso)."' WHERE `id` = '".$Number."'");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Modification du compte (".$Username.").','".time()."')");
$post_user = true;
}
}

include("./templates/header.php");
?>
<div class="row">
<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Recherchez un staff</h3>
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
$ms = mysql_query("SELECT * FROM users WHERE id = '".$usid['id']."'");
while($ms1 = mysql_fetch_array($ms)) {
?>
<div class="media">
<figure class="pull-left rounded-image social_msg__img">
<img src="<?php echo Settings('Avatarimage'); ?>avatarimage?figure=<?php echo $usid['look']; ?>&action=&direction=2&head_direction=2" alt="user">
</figure>
<div class="media-body">
<form method="post">
<h4 class="media-heading social_msg__heading"><?php echo $usid['username']; ?> </h4>
<small class="social_msg__meta">ID de l'utilisateur</small>
<input type="text" class="input-text" disabled="disabled" value="<?php echo $usid['id']; ?>" />
<input type="hidden" name="Number" value="<?php echo $usid['id']; ?>" />
<small class="social_msg__meta">Pseudo</small>
<input type="text" class="input-text" disabled="disabled" value="<?php echo $usid['username']; ?>" />
<input type="hidden" name="Username" value="<?php echo $usid['username']; ?>" />
<small class="social_msg__meta">Fonction</small>
<input type="text" class="input-text" name="Perso" value="<?php echo utf8_encode(stripslashes($usid['motto'])); ?>" />
<small class="social_msg__meta">Groupe message (1=administrateur, 2=journaliste, 3=modérateur, 4=autres)</small>
<input type="text" class="input-text" name="groupemessage" value="<?php echo utf8_encode(stripslashes($usid['groupemessage'])); ?>" />
<small class="social_msg__meta">Points</small>
<input type="text" class="input-text" name="points" value="<?php echo utf8_encode(stripslashes($usid['points'])); ?>" />
<small class="social_msg__meta">Test du staff (réussi, prolongé)</small>
<input type="text" class="input-text" name="test" value="<?php echo utf8_encode(stripslashes($usid['test'])); ?>" />
<small class="social_msg__meta">Tuteur du staff (pseudo)</small>
<input type="text" class="input-text" name="tuteur" value="<?php echo utf8_encode(stripslashes($usid['tuteur'])); ?>" />
<small class="social_msg__meta">Modifier le look</small>
<input type="text" class="input-text" name="look" value="<?php echo utf8_encode(stripslashes($usid['look'])); ?>" />
<small class="social_msg__meta">Dernière connexion</small>
<input type="text" class="input-text" disabled="disabled" value="<?php echo $date." ".date('H:i:s', $usid['last_offline']); ?>" />
<?php if($user['rank'] >= 9) { ?>
<small class="social_msg__meta">Dernière IP</small>
<input type="text" class="input-text" disabled="disabled" value="<?php echo $usid['ip_last']; ?>" />
<small class="social_msg__meta">IP à l'inscription</small>
<input type="text" class="input-text" disabled="disabled" value="<?php echo $usid['ip_reg']; ?>" />
<?php } ?>
<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
</form>
<div class="social_msg"></div><br>
<button type="button" class="btn btn-red">Bannir le compte</button> <?php if($user['rank'] >= 10) { ?><button type="button" class="btn btn-orange">Désactiver le compte</button><?php } ?>
<form method="post" action="chatlogs"><input type="hidden" value="<?php echo $usid['username']; ?>" name="pseudo"><input type="submit" value="Chatlog" style="margin-top:-40px;" class="btn btn-green pull-right"/></form>
<?php }} ?>
</article>
</div></div>
<?php include("./templates/footer.php"); ?>