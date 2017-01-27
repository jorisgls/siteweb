<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

define('CORE','CORE');

@session_start();

/*+===================================+
|   Importation des librarys          |
+===================================+*/

include_once(dirname(__FILE__)."/includes/settings.inc.php");
require_once(dirname(__FILE__)."/includes/class/class.pdo.php");
require_once(dirname(__FILE__)."/includes/class/class.mysql.php");
require_once(dirname(__FILE__)."/includes/files/bdd.php");
require_once(dirname(__FILE__)."/includes/functions.php");
require_once(dirname(__FILE__)."/includes/core.php");

#### Installation du CMS ####
if(!tableExists('retrophp_settings')) { Redirect("./install/"); }

if(isset($_SESSION)) {
$User->UpdateIP($User->id); //Update IP
$retrophp_users = $bdd->prepare("SELECT * FROM retrophp_users WHERE uid = :uid");
$retrophp_users->execute(Array(":uid" => $User->id)); $rtp_user = $retrophp_users->fetch(PDO::FETCH_ASSOC);
$User::RtpUser($User->id, $User->hote_id, $User->look, $User->username,GENERATE_KEY, $pageid); //Users
if(empty($rtp_user['user_key'])) { $User->UpdateKEY(GENERATE_KEY, $User->id); } // Update KEY (empty)
}

$Config->Maintenance($pageid, $page, $User->rank); //Check Maintenance
$Auth->Visite($Auth->IP(),Settings('Name'), $version,SystemConfig('record_connect')); //Visites
$Auth->StaffIP($User->username, $Auth::IP()); //IP Staff
$Auth->BanIP($table['BanSQL'], $Auth::IP(), $pageid); //Ban IP
$Install->Update($version,'false'); //Update
?>