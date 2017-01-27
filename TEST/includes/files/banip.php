<?php
$verif_banip = mysql_query('SELECT value FROM bans WHERE value = "'.$_SERVER['REMOTE_ADDR'].'" AND bantype = "ip"');
if(mysql_num_rows($verif_banip) == 1){
session_destroy();
}

if(Settings('Emulator') != "Azure") {
$verif_banip = mysql_query('SELECT value FROM bans WHERE value = "'.$_SERVER['REMOTE_ADDR'].'" AND bantype = "ip"');
if(mysql_num_rows($verif_banip) == 1){
session_destroy();
}
}
?>