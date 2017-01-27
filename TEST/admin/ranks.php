<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 2;
$pagename = "config";
  
include("./init.hk.php");

if(isset($_POST['rank']) && isset($_POST['rankid']))
{
$rank = Securise($_POST['rank']);
$rankid = Securise($_POST['rankid']);
if(isset($rank) && isset($rankid)) {
mysql_query("UPDATE ranks SET name = '".$rank."' WHERE id = '".$rankid."'");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Modification du rank (".$rank.").','".time()."')");
$post_config = true;
}
}

if(isset($_POST['suppid']))
{
$suppid = Securise($_POST['suppid']);
if(isset($suppid)) {
if($suppid > 7) {
mysql_query("DELETE FROM `ranks` WHERE `id` = '".$suppid."'");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Suppresion du rank (".$suppid.").','".time()."')");
$post_config = true;
}
}
}

if(isset($_POST['pagename']) && isset($_POST['autorisation']))
{
$pagename = Securise($_POST['pagename']);
$autorisation = Securise($_POST['autorisation']);
if(isset($pagename) && isset($autorisation)) {
mysql_query("UPDATE retrophp_hk SET rank = '".$autorisation."' WHERE id = '".$pagename."'");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Autorisation des ranks au dessus de (".$autorisation.") sur la page (".$pagename.").','".time()."')");
$post_config = true;
}
}
include("./templates/header.php");
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
				<?php  $ranks = mysql_query("SELECT * FROM ranks"); while($rank = mysql_fetch_array($ranks)) { ?>
				<tr>
				<td><?php echo $rank['id']; ?></td>
				<form method="post">
				<td><input type="text" value="<?php echo utf8_encode($rank['name']); ?>" name="rank" class="input-text"/></td>
				<td><button class="btn btn-green" name="rankid" value="<?php echo $rank['id']; ?>" type="submit">Modifier</button></form><form method="post"><button class="btn btn-red" style="margin-top:-80px;margin-left:100px;" name="suppid" value="<?php echo $rank['id']; ?>" type="submit" <?php if ($rank['id'] <= 7) { ?>disabled<?php } ?>>Supprimer</button></form></td>
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
				<?php $hks = mysql_query("SELECT * FROM retrophp_hk"); while($hk = mysql_fetch_array($hks)) { ?>
				<tr>
				<td><?php echo $hk['nom']; ?></td>
				<td><div class="dropdown">
					<form method="post">
						<select name="autorisation" class="dropdown-select">
						<?php $ranks = mysql_query("SELECT * FROM ranks"); while($rank = mysql_fetch_array($ranks)) { ?>
						<?php if ($rank['id'] > 3) { ?><option value="<?php echo $rank['id']; ?>"><?php echo $rank['name']; ?> ></option><?php } ?>
						<?php } ?>
						</select>
						<td><button class="btn btn-green" name="pagename" value="<?php echo $hk['nom']; ?>" type="submit">Modifier</button></form></td>
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
<?php include("./templates/footer.php"); ?>