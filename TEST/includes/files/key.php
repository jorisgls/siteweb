<?php
$generate_key = md5(microtime().rand());
if(empty($user['user_key'])) {
mysql_query("UPDATE users SET user_key = '".$generate_key."' WHERE username = '".$user['username']."'");
}
?>