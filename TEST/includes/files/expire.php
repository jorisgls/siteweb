<?php
if(!empty($user)) {
$now_unixtime = time();
$vipexpire = ($now_unixtime + '2678400');
$verif_date = mysql_query("SELECT * FROM retrophp_abonnement WHERE `timestamp_expire` <= '".$now_unixtime."' AND `user_id` = '".$user['id']."'");
while($verif = mysql_fetch_array($verif_date)) {
mysql_query("DELETE FROM `tylerphp_abonnement` WHERE `user_id` = '".$user['id']."'");
mysql_query("UPDATE users SET rank = '1' WHERE `id` = '".$user['id']."' AND rank <= '3'");
} 
}
?>