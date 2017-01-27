<?php
if($pageid != "maintenance") { 
if($user['rank'] <= 5){
$sql = mysql_query("SELECT * FROM retrophp_settings WHERE Maintenance = 'true'");
while($s = mysql_fetch_array($sql)) {
session_destroy();
Redirect(Settings('Url')."/maintenance");
}
} 
}
?>