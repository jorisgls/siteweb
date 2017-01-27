<?php
$staffip = mysql_query("SELECT * FROM retrophp_ipstaff WHERE username = '".$username."'");
if(mysql_num_rows($staffip) > 0){
$b = mysql_fetch_assoc($staffip);
$ipactuel = $_SERVER[REMOTE_ADDR];
if($ipactuel != $b['ip']) {
Redirect(Settings('Url')."/ipstaff");
session_destroy();
}
}
?>