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

if(isset($_POST['IDP']) && isset($_POST['IDD']) && isset($_POST['IDP_2']) && isset($_POST['IDD_2']))
{
$IDP = Securise($_POST['IDP']);
$IDD = Securise($_POST['IDD']);
$IDP_2 = Securise($_POST['IDP_2']);
$IDD_2 = Securise($_POST['IDD_2']);
if(isset($IDP) && isset($IDD) && isset($IDP_2) && isset($IDD_2)) {
mysql_query("UPDATE `retrophp_settings` SET `IDP` = '".$IDP."', `IDD` = '".$IDD."', `IDP_2` = '".$IDP_2."', `IDD_2` = '".$IDD_2."' WHERE `id` = 1");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Configuration de la boutique (Starpass).','".time()."')");
$post_boutique = true;
}
}

if(isset($_POST['Prix_VIP']) && isset($_POST['Prix_VIP_2']))
{
$Prix_VIP = Securise($_POST['Prix_VIP']);
$Prix_VIP_2 = Securise($_POST['Prix_VIP_2']);
if(isset($Prix_VIP) && isset($Prix_VIP_2)) {
mysql_query("UPDATE `retrophp_settings` SET `Prix_VIP` = '".$Prix_VIP."', `Prix_VIP_2` = '".$Prix_VIP_2."' WHERE `id` = 1");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Configuration du site (Prix VIP).','".time()."')");
$post_boutique = true;
}
}

if(isset($_POST['Prix_1']) && isset($_POST['Prix_1_Euro']) && isset($_POST['Prix_2']) && isset($_POST['Prix_2_Euro']))
{
$Prix_1 = Securise($_POST['Prix_1']);
$Prix_1_Euro = Securise($_POST['Prix_1_Euro']);
$Prix_2 = Securise($_POST['Prix_2']);
$Prix_2_Euro = Securise($_POST['Prix_2_Euro']);
if(isset($Prix_1) && isset($Prix_1_Euro) && isset($Prix_2) && isset($Prix_2_Euro)) {
mysql_query("UPDATE `retrophp_settings` SET `Prix_1` = '".$Prix_1."', `Prix_1_Euro` = '".$Prix_1_Euro."', `Prix_2` = '".$Prix_2."', `Prix_2_Euro` = '".$Prix_2_Euro."' WHERE `id` = 1");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Configuration du site (Prix Diamants/Jetons).','".time()."')");
$post_boutique = true;
}
}

if(isset($_POST['ID']) && isset($_POST['Titre']) && isset($_POST['Desc']) && isset($_POST['Prix']))
{
$ID = Securise($_POST['ID']);
$Titre = Securise($_POST['Titre']);
$Desc = Securise($_POST['Desc']);
$Prix = Securise($_POST['Prix']);
if(isset($ID) && isset($Titre) && isset($Desc) && isset($Prix)) {
if(empty($ID) && empty($Titre) && empty($Desc) && empty($Prix)) {
$post_badge_erreur = true; 
} else {
mysql_query("INSERT INTO `retrophp_badges` (`badge_id`, `titre`, `description`, `prix`) VALUES ('".$ID."', '".$Titre."', '".$Desc."', '".$Prix."');");
$post_boutique = true;
}
}
}

include("./templates/header.php");
?>
<div class="row">
<?php if($post_boutique == true){ ?>
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
						<?php if($post_badge_erreur == true) { ?>
<div class="col-md-12">
	<article class="widget" class="close" data-dismiss="alert" aria-hidden="true">
					<header class="widget__header">
					</header>
<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="media"><figure class="pull-left alert--icon"><i class="pe-7s-close-circle"></i></figure><div class="media-body"><h3 class="alert--title">Erreur</h3><p class="alert--text">Merci de remplir tous les champs.</p></div></div></div>
</article>
						</div>
<?php } ?>
				<div class="col-md-4">
					<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Starpass</h3>
					</header>

					<div class="widget__content">
						<a href="<?php echo Settings('Url'); ?>/images/form.png" target="_black">Liens à introduire sur Starpass</a>
						<form method="post">
						<p class="alert--text">Starpass {1} IDP.</p>
						<input type="text" class="input-text" name="IDP" value="<?php echo Settings('IDP'); ?>"/>
						<p class="alert--text">Starpass {1} IDD.</p>
						<input type="text" class="input-text" name="IDD" value="<?php echo Settings('IDD'); ?>"/>
						<p class="alert--text">Starpass {2} IDP.</p>
						<input type="text" class="input-text" name="IDP_2" value="<?php echo Settings('IDP_2'); ?>"/>
						<p class="alert--text">Starpass {2} IDD.</p>
						<input type="text" class="input-text" name="IDD_2" value="<?php echo Settings('IDD_2'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>

		
				</div>

				<div class="col-md-5">
					<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Boutique VIP (31 Jours)</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						<p class="alert--text">Prix VIP Classic.</p>
						<input type="text" class="input-text" name="Prix_VIP" value="<?php echo Settings('Prix_VIP'); ?>"/>
						<p class="alert--text">Prix VIP Premium.</p>
						<input type="text" class="input-text" name="Prix_VIP_2" value="<?php echo Settings('Prix_VIP_2'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>

					<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Badges en vente</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						<p class="alert--text">ID.</p>
						<input type="text" class="input-text" name="ID" value="<?php echo $ID; ?>"/>
						<p class="alert--text">Titre.</p>
						<input type="text" class="input-text" name="Titre" value="<?php echo $Titre; ?>"/>
						<p class="alert--text">Desc.</p>
						<input type="text" class="input-text" name="Desc" value="<?php echo $Desc; ?>"/>
						<p class="alert--text">Prix.</p>
						<input type="text" class="input-text" name="Prix" value="<?php echo $Prix; ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>
		
				</div>

				<div class="col-md-3">
					<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Diamants / Jetons</h3>
					</header>

					<div class="widget__content">
						<form method="post" action="">
						<p class="alert--text">Premier prix.</p>
						<input type="text" class="input-text" name="Prix_1" value="<?php echo Settings('Prix_1'); ?>"/>
						<p class="alert--text">Premier prix en &#8364;.</p>
						<input type="text" class="input-text" name="Prix_1_Euro" value="<?php echo Settings('Prix_1_Euro'); ?>"/>
						<p class="alert--text">Deuxième prix.</p>
						<input type="text" class="input-text" name="Prix_2" value="<?php echo Settings('Prix_2'); ?>"/>
						<p class="alert--text">Deuxième prix en &#8364;.</p>
						<input type="text" class="input-text" name="Prix_2_Euro" value="<?php echo Settings('Prix_2_Euro'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>

		
				</div>
	

			</div>

<?php include("./templates/footer.php"); ?>