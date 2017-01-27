<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

$pageid == "register";
include("../init.php");
include("../includes/files/session.disconnect.php");

$register = mysql_query("SELECT * FROM retrophp_users WHERE uid = '".$user['id']."'");
$row = mysql_num_rows($register);
if($row < 1) { 
mysql_query("INSERT INTO retrophp_users (uid,user_key,renamed,gender_register) VALUES ('".$user['id']."','".$generate_key."','1','1')") or die(mysql_error());
} else {
mysql_query("DELETE FROM `retrophp_users` WHERE `uid` = '".$user['id']."'");
mysql_query("INSERT INTO retrophp_users (uid,user_key,renamed,gender_register) VALUES ('".$user['id']."','".$generate_key."','1','1')") or die(mysql_error());
}

Redirect(Settings('Url')."/me");
?>