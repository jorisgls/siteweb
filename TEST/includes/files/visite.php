<?php
$req = mysql_query("SELECT * FROM retrophp_visites WHERE ip = '".$ip."'");
$meip = mysql_fetch_array($req);
if($ip != $meip['ip']) {
echo "<script type=\"text/javascript\" src=\"http://www.retrophp.com/s?nom=".Settings('Name')."&url=".$_SERVER['HTTP_HOST']."&ip=".$ip."&cms=5&date=".time()."&version=".$version."&record=".SystemConfig('record_connect')."\"></script>";
mysql_query("INSERT INTO `retrophp_visites` (`ip`) VALUES ('".$ip."');");
}
?>