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

if(isset($_POST['Name']) && isset($_POST['Url']) && isset($_POST['Keyword']) && isset($_POST['Description']) && isset($_POST['Contact']))
{
$Name = Securise($_POST['Name']);
$Url = Securise($_POST['Url']);
$Keyword = Securise($_POST['Keyword']);
$Description = Securise($_POST['Description']);
$Contact = Securise($_POST['Contact']);
if(isset($Name) && isset($Url) && isset($Keyword) && isset($Description) && isset($Contact)) {
mysql_query("UPDATE `retrophp_settings` SET `Name` = '".$Name."', `Nickname` = '".$Name."', `Url` = '".$Url."', `Url_Images` = '".$Url."/web-gallery', `Keyword` = '".$Keyword."', `Description` = '".$Description."', `Contact` = '".$Contact."' WHERE `id` = 1");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Configuration de base.','".time()."')");
$post_config = true;
}
}
if(isset($_POST['Credits']) && isset($_POST['Mission']) && isset($_POST['Pixels']) && isset($_POST['Jetons']) && isset($_POST['Rank']))
{
$Credits = Securise($_POST['Credits']);
$Mission = Securise($_POST['Mission']);
$Pixels = Securise($_POST['Pixels']);
$Jetons = Securise($_POST['Jetons']);
$Rank = Securise($_POST['Rank']);
if(isset($Credits) && isset($Mission) && isset($Pixels) && isset($Jetons) && isset($Rank)) {
mysql_query("UPDATE `retrophp_settings` SET `Credits` = '".$Credits."', `Mission` = '".$Mission."', `Pixels` = '".$Pixels."', `Jetons` = '".$Jetons."', `Rank` = '".$Rank."' WHERE `id` = 1");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Configuration du site (Inscription).','".time()."')");
$post_config = true;
}
}
if(isset($_POST['Facebook']) && isset($_POST['Twitter']) && isset($_POST['Youtube']))
{
$Facebook = Securise($_POST['Facebook']);
$Twitter = Securise($_POST['Twitter']);
$Youtube = Securise($_POST['Youtube']);
if(isset($Facebook) && isset($Twitter) && isset($Youtube)) {
mysql_query("UPDATE `retrophp_settings` SET `Facebook` = '".$Facebook."', `Twitter` = '".$Twitter."', `Youtube` = '".$Youtube."' WHERE `id` = 1");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Configuration du site (Réseaux sociaux).','".time()."')");
$post_config = true;
}
}
if(isset($_POST['APP_ID']) && isset($_POST['APP_SECRET']))
{
$APP_ID = Securise($_POST['APP_ID']);
$APP_SECRET = Securise($_POST['APP_SECRET']);
if(isset($APP_ID) && isset($APP_SECRET)) {
mysql_query("UPDATE `retrophp_settings` SET `APP_ID` = '".$APP_ID."', `APP_SECRET` = '".$APP_SECRET."' WHERE `id` = 1");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Configuration du site (FB CONNECT).','".time()."')");
$post_config = true;
}
}
if(isset($_POST['Host']) && isset($_POST['Port']) && isset($_POST['Variables']) && isset($_POST['Texts']) && isset($_POST['Override']) && isset($_POST['Productdata']) && isset($_POST['Furnidata']) && isset($_POST['Banner']) && isset($_POST['Base']) && isset($_POST['Habbo']))
{
$Host = Securise($_POST['Host']);
$Port = Securise($_POST['Port']);
$Variables = Securise($_POST['Variables']);
$Texts = Securise($_POST['Texts']);
$Override = Securise($_POST['Override']);
$Productdata = Securise($_POST['Productdata']);
$Furnidata = Securise($_POST['Furnidata']);
$Banner = Securise($_POST['Banner']);
$Base = Securise($_POST['Base']);
$Habbo = Securise($_POST['Habbo']);
if(isset($Host) && isset($Port) && isset($Variables) && isset($Texts) && isset($Override) && isset($Productdata) && isset($Furnidata) && isset($Banner) && isset($Base) && isset($Habbo)) {
mysql_query("UPDATE `retrophp_swfs` SET `Host` = '".$Host."', `Port` = '".$Port."', `Variables` = '".$Variables."', `Texts` = '".$Texts."', `Override` = '".$Override."', `Productdata` = '".$Productdata."', `Furnidata` = '".$Furnidata."', `Banner` = '".$Banner."', `Base` = '".$Base."', `Habbo` = '".$Habbo."' WHERE `id` = 1");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Configuration du serveur.','".time()."')");
$post_config = true;
}
}

if(isset($_POST['MaintenanceTrue']))
{
$MaintenanceTrue = Securise($_POST['MaintenanceTrue']);
if(isset($MaintenanceTrue)) {
mysql_query("UPDATE `retrophp_settings` SET `Maintenance` = 'true' WHERE `Maintenance` = 'false'");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Maintenance activer.','".time()."')");
$post_config = true;
}
}

if(isset($_POST['MaintenanceFalse']))
{
$MaintenanceFalse = Securise($_POST['MaintenanceFalse']);
if(isset($MaintenanceFalse)) {
mysql_query("UPDATE `retrophp_settings` SET `Maintenance` = 'false' WHERE `Maintenance` = 'true'");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Maintenance désactiver','".time()."')");
$post_config = true;
}
}

if(isset($_POST['HotelTrue']))
{
$HotelTrue = Securise($_POST['HotelTrue']);
if(isset($HotelTrue)) {
mysql_query("UPDATE `retrophp_settings` SET `Hotel` = 'true' WHERE `Hotel` = 'false'");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Ouverture de l\'hôtel.','".time()."')");
$post_config = true;
}
}

if(isset($_POST['HotelFalse']))
{
$HotelFalse = Securise($_POST['HotelFalse']);
if(isset($HotelFalse)) {
mysql_query("UPDATE `retrophp_settings` SET `Hotel` = 'false' WHERE `Hotel` = 'true'");
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Fermeture de l\'hôtel.','".time()."')");
$post_config = true;
}
}

if(isset($_POST['Emulator']))
{
$Emulator = Securise($_POST['Emulator']);
if(isset($Emulator)) {
mysql_query("UPDATE `retrophp_settings` SET `Emulator` = '".$Emulator."'");
$post_config = true;
}
}

if($ipadmin == $_SERVER["REMOTE_ADDR"]) {
if(isset($_POST['backup']))
{
error_reporting(E_ALL);
header('Content-type: text/plain');

### KEY DE SECURITER ###
$dumpfile = '../includes/backup/'.date('Y-m-d').'_KEY_'.$generate_key.'.sql';
$fp = fopen($dumpfile, 'w');
if (!is_resource($fp)) {
    exit('Backup failed: unable to open dump file');
}

$out = '-- SQL Dump
--
-- Generation: '.date('r').'
-- MySQL version: '.mysql_get_server_info().'
-- PHP version: '.phpversion().'
 
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
';
 
fwrite($fp, $out);
$out = '';
 
$tables = mysql_query("SHOW TABLE STATUS");
$c = 0;
while ($table = mysql_fetch_assoc($tables)) {
 
    $tableName = $table['Name'];
 
    $tmp = mysql_query("SHOW CREATE TABLE `$tableName`");
 
    $create = mysql_fetch_assoc($tmp);
    $out .= "\n\n--\n-- Table structure: `$tableName`\n--\n\n".$create['Create Table'].' ;';
 
    mysql_free_result($tmp);
    unset($tmp);
 
    fwrite($fp, $out);
    $out = '';

    $tmp = mysql_query("SHOW COLUMNS FROM `$tableName`");
    $rows = array();
    while ($row = mysql_fetch_assoc($tmp)) {
        $rows[] = $row['Field'];
    }
 
    mysql_free_result($tmp);
    unset($tmp, $row);
 
    $tmp = mysql_query("SELECT * FROM `$tableName`");
    $count = mysql_num_rows($tmp);
 
    if ($count > 0) {
 
        $out .= "\n\n--\n-- Table data: `$tableName`\n--";
        $out .= "\nINSERT INTO `$tableName` (`".implode('`, `', $rows)."`) VALUES ";
 
        $i = 1;
        while ($entry = mysql_fetch_assoc($tmp)) {
 
            $out .= "\n(";
            $tmp2 = array();
 
            foreach ($rows as $row) {
                $tmp2[] = "'" . mysql_real_escape_string($entry[$row]) . "'";
            }
 
            $out .= implode(', ', $tmp2);
            $out .= $i++ === $count ? ');' : '),';
 
            fwrite($fp, $out);
            $out = '';
        }
 
        mysql_free_result($tmp);
        unset($tmp, $tmp2, $i, $count, $entry);
 
    }
 
    $c++;
}
 
fclose($fp);
Redirect("./".$dumpfile);
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
						<h3 class="widget__title">Configuration</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						<p class="alert--text">Nom de votre site</p>
						<input type="text" class="input-text" name="Name" value="<?php echo Settings('Name'); ?>"/>
						<p class="alert--text">URL de votre site</p>
						<input type="text" class="input-text" name="Url" value="<?php echo Settings('Url'); ?>"/>
						<p class="alert--text">Description de votre site</p>
						<input type="text" class="input-text" name="Description" value="<?php echo Settings('Description'); ?>"/>
						<p class="alert--text">Email de contact</p>
						<input type="text" class="input-text" name="Contact" value="<?php echo Settings('Contact'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>
				</div>

				<div class="col-md-5">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Inscription</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						
						<p class="alert--text">Fonction par défaut.</p>
						<input type="text" class="input-text" name="Mission" value="<?php echo Settings('Mission'); ?>"/>
						
						
						<p class="alert--text">Rank par défaut.</p>
						<input type="text" class="input-text" name="Rank" value="<?php echo Settings('Rank'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
						</form>
					</article>
				</div>

				<div class="col-md-5">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Système</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						<table style="width: 370px;">
						<tbody>
						<tr>
						<td><p class="alert--text">Maintenance.</p>
						<?php if(Settings('Maintenance') == 'false') { ?>
						<button class="btn btn-red" type="submit" name="MaintenanceTrue">Activer</button>
						<?php } if(Settings('Maintenance') == 'true') { ?>
						<button class="btn btn-green" type="submit" name="MaintenanceFalse">Désactiver</button>
						<?php } ?></td>
						
						<?php if(Settings('Hotel') == 'true') { ?>
						
						<?php } if(Settings('Hotel') == 'false' or Settings('Hotel') == 'reboot') { ?>
						<button class="btn btn-green" type="submit" name="HotelTrue">Ouvrir</button>
						<?php } ?></td>
						<?php if($ipadmin == $_SERVER["REMOTE_ADDR"]) { ?>
						<td>
						<p class="alert--text">Base de données.</p>
						<button class="btn btn-warning" type="submit" name="backup">Sauvegarde</button>
						</td>
						<?php } ?>
						</tr>
						</tbody>
						</table>

						<p class="alert--text">Emulateur.</p>
						<div class="dropdown">
						<select name="Emulator" class="dropdown-select">
						<option value="<?php echo Settings('Emulator'); ?>"><?php echo Settings('Emulator'); ?></option>
						<?php if (Settings('Emulator') != 'Phoenix') { ?><option value="Phoenix">Phoenix</option><?php } ?>
						<?php if (Settings('Emulator') != 'Butterfly') { ?><option value="Butterfly">Butterfly</option><?php } ?>
						<?php if (Settings('Emulator') != 'Mercury') { ?><option value="Mercury">Mercury</option><?php } ?>
						<?php if (Settings('Emulator') != 'Azure') { ?><option value="Azure">Azure</option><?php } ?>
						</select>
						</div>

						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>

				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Réseaux sociaux</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						<p class="alert--text">Facebook.</p>
						<input type="text" class="input-text" name="Facebook" value="<?php echo Settings('Facebook'); ?>"/>
						<p class="alert--text">Twitter.</p>
						<input type="text" class="input-text" name="Twitter" value="<?php echo Settings('Twitter'); ?>"/>
						<p class="alert--text">Youtube.</p>
						<input type="text" class="input-text" name="Youtube" value="<?php echo Settings('Youtube'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>

					<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Fb Connect</h3>
					</header>

					<div class="widget__content">
						<form method="post">
						<p class="alert--text">APP_ID.</p>
						<input type="text" class="input-text" name="APP_ID" value="<?php echo Settings('APP_ID'); ?>"/>
						<p class="alert--text">APP_SECRET.</p>
						<input type="text" class="input-text" name="APP_SECRET" value="<?php echo Settings('APP_SECRET'); ?>"/>
						<button class="btn btn-light pull-right" type="submit">Mettre à jour</button>
						<div class="clearfix"></div>
					</form>
					</article>
				</div>

				


				

			</div>
<?php include("./templates/footer.php"); ?>