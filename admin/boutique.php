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

if(isset($_POST['IDP']) && isset($_POST['IDD']) && isset($_POST['IDP_2']) && isset($_POST['IDD_2']))
{
$IDP = safe($_POST['IDP'],'SQL');
$IDD = safe($_POST['IDD'],'SQL');
$IDP_2 = safe($_POST['IDP_2'],'SQL');
$IDD_2 = safe($_POST['IDD_2'],'SQL');
if(isset($IDP) && isset($IDD) && isset($IDP_2) && isset($IDD_2)) {
$bdd->exec("UPDATE `retrophp_settings` SET `IDP` = '".safe($IDP,'SQL')."', `IDD` = '".safe($IDD,'SQL')."', `IDP_2` = '".safe($IDP_2,'SQL')."', `IDD_2` = '".safe($IDD_2,'SQL')."' WHERE `id` = 1");
$User->AddLogs($User->username,'Configuration de la boutique (Starpass).');
$post_boutique = true;
}
}

if(isset($_POST['Prix_VIP']) && isset($_POST['Prix_VIP_2']))
{
$Prix_VIP = safe($_POST['Prix_VIP'],'SQL');
$Prix_VIP_2 = safe($_POST['Prix_VIP_2'],'SQL');
if(isset($Prix_VIP) && isset($Prix_VIP_2)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Prix_VIP` = '".safe($Prix_VIP,'SQL')."', `Prix_VIP_2` = '".safe($Prix_VIP_2,'SQL')."' WHERE `id` = 1");
$User->AddLogs($User->username,'Configuration de la boutique (Prix VIP).');
$post_boutique = true;
}
}

if(isset($_POST['Prix_1']) && isset($_POST['Prix_1_Euro']) && isset($_POST['Prix_2']) && isset($_POST['Prix_2_Euro']))
{
$Prix_1 = safe($_POST['Prix_1'],'SQL');
$Prix_1_Euro = safe($_POST['Prix_1_Euro'],'SQL');
$Prix_2 = safe($_POST['Prix_2'],'SQL');
$Prix_2_Euro = safe($_POST['Prix_2_Euro'],'SQL');
if(isset($Prix_1) && isset($Prix_1_Euro) && isset($Prix_2) && isset($Prix_2_Euro)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Prix_1` = '".safe($Prix_1,'SQL')."', `Prix_1_Euro` = '".safe($Prix_1_Euro,'SQL')."', `Prix_2` = '".safe($Prix_2,'SQL')."', `Prix_2_Euro` = '".safe($Prix_2_Euro,'SQL')."' WHERE `id` = 1");
$User->AddLogs($User->username,'Configuration de la boutique (Prix Diamants/Jetons).');
$post_boutique = true;
}
}

if(isset($_POST['ID']) && isset($_POST['Titre']) && isset($_POST['Desc']) && isset($_POST['Prix']))
{
$ID = safe($_POST['ID'],'SQL');
$Titre = safe($_POST['Titre'],'SQL');
$Desc = safe($_POST['Desc'],'SQL');
$Prix = safe($_POST['Prix'],'SQL');
if(isset($ID) && isset($Titre) && isset($Desc) && isset($Prix)) {
if(empty($ID) && empty($Titre) && empty($Desc) && empty($Prix)) {
$post_badge_erreur = true; 
} else {
$Db->InsertSQL('retrophp_bages', array(
    'badge_id' => $ID,
    'titre' => $Titre,
    'description' => $Desc,
    'prix' => $Prix,
));

$User->AddLogs($User->username,'Ajout d\'un badge ('.$ID.').');
$post_boutique = true;
}
}
}

include './templates/header.php';
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
						<a href="<?php print Settings('Url'); ?>/images/form.png" target="_black">Liens à introduire sur Starpass</a>
						<form method="post">
						<p class="alert--text">Starpass {1} IDP.</p>
						<input type="text" class="input-text" name="IDP" value="<?php print Settings('IDP'); ?>"/>
						<p class="alert--text">Starpass {1} IDD.</p>
						<input type="text" class="input-text" name="IDD" value="<?php print Settings('IDD'); ?>"/>
						<p class="alert--text">Starpass {2} IDP.</p>
						<input type="text" class="input-text" name="IDP_2" value="<?php print Settings('IDP_2'); ?>"/>
						<p class="alert--text">Starpass {2} IDD.</p>
						<input type="text" class="input-text" name="IDD_2" value="<?php print Settings('IDD_2'); ?>"/>
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
						<input type="text" class="input-text" name="Prix_VIP" value="<?php print Settings('Prix_VIP'); ?>"/>
						<p class="alert--text">Prix VIP Premium.</p>
						<input type="text" class="input-text" name="Prix_VIP_2" value="<?php print Settings('Prix_VIP_2'); ?>"/>
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
						<input type="text" class="input-text" name="ID" value="<?php print $ID; ?>"/>
						<p class="alert--text">Titre.</p>
						<input type="text" class="input-text" name="Titre" value="<?php print $Titre; ?>"/>
						<p class="alert--text">Desc.</p>
						<input type="text" class="input-text" name="Desc" value="<?php print $Desc; ?>"/>
						<p class="alert--text">Prix.</p>
						<input type="text" class="input-text" name="Prix" value="<?php print $Prix; ?>"/>
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
						<input type="text" class="input-text" name="Prix_1" value="<?php print Settings('Prix_1'); ?>"/>
						<p class="alert--text">Premier prix en &#8364;.</p>
						<input type="text" class="input-text" name="Prix_1_Euro" value="<?php print Settings('Prix_1_Euro'); ?>"/>
						<p class="alert--text">Deuxième prix.</p>
						<input type="text" class="input-text" name="Prix_2" value="<?php print Settings('Prix_2'); ?>"/>
						<p class="alert--text">Deuxième prix en &#8364;.</p>
						<input type="text" class="input-text" name="Prix_2_Euro" value="<?php print Settings('Prix_2_Euro'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>

		
				</div>
	

			</div>

<?php include './templates/footer.php'; ?>