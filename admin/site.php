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

if(isset($_POST['Name']) && isset($_POST['Url']) && isset($_POST['Keyword']) && isset($_POST['Description']) && isset($_POST['Contact']))
{
$Name = safe($_POST['Name'],'SQL');
$Url = safe($_POST['Url'],'SQL');
$Keyword = safe($_POST['Keyword'],'SQL');
$Description = safe($_POST['Description'],'SQL');
$Contact = safe($_POST['Contact'],'SQL');
if(isset($Name) && isset($Url) && isset($Keyword) && isset($Description) && isset($Contact)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Name` = '".safe($Name,'SQL')."', `Nickname` = '".safe($Name,'SQL')."', `Url` = '".safe($Url,'SQL')."', `Url_Images` = '".safe($Url,'SQL')."/web-gallery', `Keyword` = '".safe($Keyword,'HTML')."', `Description` = '".safe($Description,'HTML')."', `Contact` = '".safe($Contact,'SQL')."' WHERE `id` = 1");
$User->AddLogs($User->username,'Configuration de base.');
$post_config = true;
}
}
if(isset($_POST['Credits']) && isset($_POST['Mission']) && isset($_POST['Pixels']) && isset($_POST['Jetons']) && isset($_POST['Rank']))
{
$Credits = safe($_POST['Credits'],'SQL');
$Mission = safe($_POST['Mission'],'SQL');
$Pixels = safe($_POST['Pixels'],'SQL');
$Jetons = safe($_POST['Jetons'],'SQL');
$Rank = safe($_POST['Rank']);
if(isset($Credits) && isset($Mission) && isset($Pixels) && isset($Jetons) && isset($Rank)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Credits` = '".safe($Credits,'SQL')."', `Mission` = '".safe($Mission,'SQL')."', `Pixels` = '".safe($Pixels,'SQL')."', `Jetons` = '".safe($Jetons,'SQL')."', `Rank` = '".safe($Rank,'SQL')."' WHERE `id` = 1");
$User->AddLogs($User->username,'Configuration du site (Inscription).');
$post_config = true;
}
}
if(isset($_POST['Facebook']) && isset($_POST['Twitter']) && isset($_POST['Youtube']))
{
$Facebook = safe($_POST['Facebook'],'SQL');
$Twitter = safe($_POST['Twitter'],'SQL');
$Youtube = safe($_POST['Youtube'],'SQL');
if(isset($Facebook) && isset($Twitter) && isset($Youtube)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Facebook` = '".safe($Facebook,'SQL')."', `Twitter` = '".safe($Twitter,'SQL')."', `Youtube` = '".safe($Youtube,'SQL')."' WHERE `id` = 1");
$User->AddLogs($User->username,'Configuration du site (Réseaux sociaux).');
$post_config = true;
}
}
if(isset($_POST['APP_ID']) && isset($_POST['APP_SECRET']))
{
$APP_ID = safe($_POST['APP_ID'],'SQL');
$APP_SECRET = safe($_POST['APP_SECRET'],'SQL');
if(isset($APP_ID) && isset($APP_SECRET)) {
$bdd->exec("UPDATE `retrophp_settings` SET `APP_ID` = '".safe($APP_ID,'SQL')."', `APP_SECRET` = '".safe($APP_SECRET,'SQL')."' WHERE `id` = 1");
$User->AddLogs($User->username,'Configuration du site (FB CONNECT).');
$post_config = true;
}
}
if(isset($_POST['Host']) && isset($_POST['Port']) && isset($_POST['Mus']) && isset($_POST['Variables']) && isset($_POST['Texts']) && isset($_POST['Override']) && isset($_POST['Productdata']) && isset($_POST['Furnidata']) && isset($_POST['Banner']) && isset($_POST['Base']) && isset($_POST['Habbo']))
{
$Host = safe($_POST['Host'],'SQL');
$Port = safe($_POST['Port'],'SQL');
$Mus = safe($_POST['Mus'],'SQL');
$Variables = safe($_POST['Variables'],'SQL');
$Texts = safe($_POST['Texts'],'SQL');
$Override = safe($_POST['Override'],'SQL');
$Productdata = safe($_POST['Productdata'],'SQL');
$Furnidata = safe($_POST['Furnidata'],'SQL');
$Banner = safe($_POST['Banner'],'SQL');
$Base = safe($_POST['Base'],'SQL');
$Habbo = safe($_POST['Habbo'],'SQL');
if(isset($Host) && isset($Port) && isset($Mus) && isset($Variables) && isset($Texts) && isset($Override) && isset($Productdata) && isset($Furnidata) && isset($Banner) && isset($Base) && isset($Habbo)) {
$bdd->exec("UPDATE `retrophp_swfs` SET `Host` = '".safe($Host,'SQL')."', `Port` = '".safe($Port,'SQL')."', `Mus` = '".safe($Mus,'SQL')."', `Variables` = '".safe($Variables,'SQL')."', `Texts` = '".safe($Texts,'SQL')."', `Override` = '".safe($Override,'SQL')."', `Productdata` = '".safe($Productdata,'SQL')."', `Furnidata` = '".safe($Furnidata,'SQL')."', `Banner` = '".safe($Banner,'SQL')."', `Base` = '".safe($Base,'SQL')."', `Habbo` = '".safe($Habbo,'SQL')."' WHERE `id` = 1");
$User->AddLogs($User->username,'Configuration du serveur.');
$post_config = true;
}
}

if(isset($_POST['MaintenanceTrue']))
{
$MaintenanceTrue = safe($_POST['MaintenanceTrue'],'SQL');
if(isset($MaintenanceTrue)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Maintenance` = 'true' WHERE `Maintenance` = 'false'");
$User->AddLogs($User->username,'Maintenance activer.');
$post_config = true;
}
}

if(isset($_POST['MaintenanceFalse']))
{
$MaintenanceFalse = safe($_POST['MaintenanceFalse'],'SQL');
if(isset($MaintenanceFalse)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Maintenance` = 'false' WHERE `Maintenance` = 'true'");
$User->AddLogs($User->username,'Maintenance désactiver.');
$post_config = true;
}
}

if(isset($_POST['HotelTrue']))
{
$HotelTrue = safe($_POST['HotelTrue'],'SQL');
if(isset($HotelTrue)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Hotel` = 'true' WHERE `Hotel` = 'false'");
$User->AddLogs($User->username,'Ouverture de l\'hôtel.');
$post_config = true;
}
}

if(isset($_POST['HotelFalse']))
{
$HotelFalse = safe($_POST['HotelFalse'],'SQL');
if(isset($HotelFalse)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Hotel` = 'false' WHERE `Hotel` = 'true'");
$User->AddLogs($User->username,'Fermeture de l\'hôtel.');
$post_config = true;
}
}

if(isset($_POST['Emulator']))
{
$Emulator = safe($_POST['Emulator'],'SQL');
if(isset($Emulator)) {
$bdd->exec("UPDATE `retrophp_settings` SET `Emulator` = '".safe($Emulator,'SQL')."'");
$User->AddLogs($User->username,'Changement d\'emulateur.');
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
						<h3 class="widget__title">Configuration de base</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						<p class="alert--text">Nom de votre site.</p>
						<input type="text" class="input-text" name="Name" value="<?php print Settings('Name'); ?>"/>
						<p class="alert--text">URL de votre site.</p>
						<input type="text" class="input-text" name="Url" value="<?php print Settings('Url'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>
				</div>

				

				<div class="col-md-5">
		

				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Réseaux sociaux</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						<p class="alert--text">Facebook.</p>
						<input type="text" class="input-text" name="Facebook" value="<?php print Settings('Facebook'); ?>"/>
						<p class="alert--text">Twitter.</p>
						<input type="text" class="input-text" name="Twitter" value="<?php print Settings('Twitter'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>

					
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
					</br>
			</br>
			</br>
			</br>
			</br>
			</br>
<?php include './templates/footer.php'; ?>