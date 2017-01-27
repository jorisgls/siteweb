<?php
if(isset($_SESSION['username']))
{
$username = Securise($_SESSION['username']);
$sql = mysql_query("SELECT * FROM users WHERE username = '".$username."' LIMIT 1") or die(mysql_error());
$row = mysql_num_rows($sql);
if($row > 0)
{
$user = mysql_fetch_assoc($sql);
mysql_query("UPDATE users SET ip_last = '".$_SERVER["REMOTE_ADDR"]."' WHERE id = '".$user['id']."'");
} else {
session_destroy();
Redirect("".Settings('Url')."");
exit();
}
}
if(!empty($user)) {
$retrophp_users = mysql_query("SELECT * FROM retrophp_users WHERE uid = '".$user['id']."'");
$rtp_user = mysql_fetch_assoc($retrophp_users);
$sql = mysql_query("SELECT * FROM retrophp_users WHERE uid = '".$user['id']."'");
$row = mysql_num_rows($sql);
if($row < 1) {
if($user['hote_id'] != '0') {
$hote_id = mysql_query("SELECT * FROM users WHERE hote_id = '".$user['hote_id']."'");
$hote = mysql_fetch_assoc($hote_id);
$recup = mysql_query("SELECT * FROM retrophp_users WHERE uid = '".$hote['id']."'");
$recupkey = mysql_fetch_assoc($recup);
mysql_query("INSERT INTO `retrophp_users` (`uid`, `user_key`, `renamed`, `gender_register`, `mail_verified`) VALUES ('".$user['id']."', '".$recupkey['user_key']."', '1', '1', '1');");
} else {
mysql_query("INSERT INTO `retrophp_users` (`uid`, `user_key`, `renamed`, `gender_register`) VALUES ('".$user['id']."', '".$generate_key."', '1', '1');");
}
}
}
?>