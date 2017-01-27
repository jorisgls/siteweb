<?php
$save_pseudo = mysql_query("SELECT * FROM users WHERE ip_last = '".$_SERVER["REMOTE_ADDR"]."' AND hote_id = '0' ORDER BY last_offline DESC LIMIT 1");
$ipseudo = mysql_fetch_assoc($save_pseudo);
?>