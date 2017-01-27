<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Session_Disconnected($_SESSION);

$pageid = 2;
$pagename = "config";
  
include './init.hk.php';

if(isset($_POST['rank']) && isset($_POST['rankid']))
{
$rank = safe($_POST['rank'],'SQL');
$rankid = safe($_POST['rankid'],'SQL');
if(isset($rank) && isset($rankid)) {
$bdd->exec("UPprint ranks SET name = '".safe($rank,'SQL')."' WHERE id = '".safe($rankid,'SQL')."'");
$User->AddLogs($User->username,'Modification du rank ('.safe($rank,'SQL').').');
$post_config = true;
}
}

if(isset($_POST['suppid']))
{
$suppid = safe($_POST['suppid'],'SQL');
if(isset($suppid)) {
if($suppid > 7) {
$bdd->exec("DELETE FROM `ranks` WHERE `id` = '".safe($suppid,'SQL')."'");
$User->AddLogs($User->username,'Suppresion du rank ('.safe($suppid,'SQL').').');
$post_config = true;
}
}
}

if(isset($_POST['pagename']) && isset($_POST['autorisation']))
{
$pagename = safe($_POST['pagename'],'SQL');
$autorisation = safe($_POST['autorisation'],'SQL');
if(isset($pagename) && isset($autorisation)) {
$bdd->exec("UPprint retrophp_hk SET rank = '".safe($autorisation,'SQL')."' WHERE `nom` = '".safe($pagename,'SQL')."'");
$User->AddLogs($User->username,'Autorisation des ranks au dessus de ('.safe($autorisation,'SQL').') sur la page ('.safe($pagename,'SQL').').');
$post_config = true;
}
}
include './templates/header.php';
?>
<div class="row">
<?php if($post_config == true){ ?>
<div class="col-md-12">
	<article class="widget" class="close" data-dismiss="alert" aria-hidden="true">
					<header class="widget__header">
					</header>
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
					</article>
						</div>
						<?php } ?>
			<div class="col-md-7">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Nom des grades</h3>
					</header>

					<div class="widget__content">
							<table class="table">
							<thead>
                        <tr>
                        	<th>Rank</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                        </thead>
							<tbody>
				<?php  $ranks = $bdd->query("SELECT * FROM ranks"); while($rank = $ranks->fetch()) { ?>
				<tr>
				<td><?php print $rank['id']; ?></td>
				<form method="post">
				<td><input type="text" value="<?php print utf8_encode($rank['name']); ?>" name="rank" class="input-text"/></td>
				<td><button class="btn btn-green" name="rankid" value="<?php print $rank['id']; ?>" type="submit">Modifier</button></form><form method="post"><button class="btn btn-red" style="margin-top:-80px;margin-left:100px;" name="suppid" value="<?php print $rank['id']; ?>" type="submit" <?php if ($rank['id'] <= 7) { ?>disabled<?php } ?>>Supprimer</button></form></td>
				</tr>
				<?php } ?>
				</tbody>
						</table>
					</article>
				</div>

				<div class="col-md-5">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Sécurité de l'administration</h3>
					</header>

					<div class="widget__content">
						<table class="table">
							<thead>
                        <tr>
                        	<th>Page</th>
                        	<th>Choix</th>
                            <th>Action</th>
                        </tr>
                        </thead>
							<tbody>
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk"); while($hk = $hks->fetch()) { ?>
				<tr>
				<td><?php print $hk['nom']; ?></td>
				<td><div class="dropdown">
					<form method="post">
						<select name="autorisation" class="dropdown-select">
						<?php $ranks = $bdd->query("SELECT * FROM ranks WHERE `id` = '".safe($hk['rank'],'SQL')."'"); while($rank = $ranks->fetch()) { ?>
						<?php if ($rank['id'] > 3) { ?><option value="<?php print $rank['id']; ?>"><?php print $rank['name']; ?> ></option><?php } ?>
						<?php } ?>
						<?php $ranks = $bdd->query("SELECT * FROM ranks WHERE `id` != '".safe($hk['rank'],'SQL')."'"); while($rank = $ranks->fetch()) { ?>
						<?php if ($rank['id'] > 3) { ?><option value="<?php print $rank['id']; ?>"><?php print $rank['name']; ?> ></option><?php } ?>
						<?php } ?>
						</select>
						<td><button class="btn btn-green" name="pagename" value="<?php print $hk['nom']; ?>" type="submit">Modifier</button></form></td>
						</div>
				</td>
				</tr>
				<?php } ?>
				</tbody>
						</table>
					</form>
					</article>
				</div>

			</div>
<?php include './templates/footer.php'; ?>