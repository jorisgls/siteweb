<?php
if($user['rank'] == 0) {
mysql_query("UPDATE users SET rank='1' WHERE id='".$user['id']."'");
}

if($user['rank'] <= 6) {
mysql_query("DELETE FROM user_badges WHERE (user_id,badge_id) = ('".$user['id']."','ADM')");
mysql_query("DELETE FROM user_badges WHERE (user_id,badge_id) = ('".$user['id']."','HS1')");
}
?>