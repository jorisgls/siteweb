<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/register.php");
include("../includes/files/session.disconnect.php");

if($user['rank'] <= 3) {
$sql = mysql_query("SELECT * FROM retrophp_abonnement WHERE user_id = '".$user['id']."'");
$row = mysql_num_rows($sql);
if($row > 0) { 
Redirect(Settings('Url')."/boutique?p=error");
} else {
if($user['online'] == 0) {
if($user['seasonal_currency'] >= Settings('Prix_VIP')) {
mysql_query("UPDATE users SET seasonal_currency = seasonal_currency - ".Settings('Prix_VIP')." WHERE id = '".$user['id']."'");
mysql_query("UPDATE users SET rank = '2' WHERE id = '".$user['id']."'");
mysql_query("INSERT INTO `retrophp_abonnement` (`user_id`, `abonnement`, `timestamp_activated`, `timestamp_expire`) VALUES ('".$user['id']."', 'Classic', '".$now_unixtime."', '".$vipexpire."');");
Redirect(Settings('Url')."/boutique?p=success");
} else {
Redirect(Settings('Url')."/boutique?p=error");
}
}
if($user['online'] == 1) {
Redirect(Settings('Url')."/boutique?p=online_error");
}
}
} else {
Redirect(Settings('Url')."/boutique?p=error");
}
?>