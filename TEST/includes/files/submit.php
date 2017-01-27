<?php
$erreurc = false;
if(isset($_POST['username']) && isset($_POST['password']))
{
$username = Securise($_POST['username']);
$password = Hashage($_POST['password']);                    
if(empty($username) || empty($password))
{
$erreurmess = "Merci de remplir les champs vides";
$erreurc = true;
}
else 
{
$sql = mysql_query("SELECT id,disabled FROM users WHERE username = '".$username."' AND password = '".$password."' LIMIT 1") or die(mysql_error());
$row = mysql_num_rows($sql);
$assoc = mysql_fetch_assoc($sql);
if(($row < 1) && ($row2 < 1))
{
$erreurmess = "Pseudo ou mot de passe invalide.";
$erreurc = true;
}
else
{
if($assoc['disabled'] == 1)
{
$erreurmess = "Votre compte a été désactivé. En cas d'érreur de notre part contactez nous : contact@".Settings('Court_Url')."";
$erreurc = true;
}
else
{
$sql = mysql_query("SELECT * FROM bans WHERE value = '".$username."'");
$b = mysql_fetch_assoc($sql);
$row_ban = mysql_num_rows($sql);
$stamp_now = mktime(date('H:i:s d-m-Y'));
$stamp_expire = $b['expire'];
$expire = date('d/m/Y H:i:s', $b['expire']);
if($stamp_now < $stamp_expire){
$erreurmess = "Ton compte à était bannis pour la raison suivante: ".$b['reason'].". Il expira le: ".$expire."";
$erreurc = true;
} else {
if($row_ban > 0) {
mysql_query("DELETE FROM bans WHERE value = '".$username."'");
}
if($row == 1) {
$erreurc = false;
mysql_query("UPDATE users SET last_offline = '".time()."' WHERE username = '".$username."'");
session_start();
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
Redirect(Settings('Url')."/me"); 
}
elseif($row2 == 1) {
$sql = mysql_query("SELECT * FROM users WHERE username = '".$username."'") or die(mysql_error());
$assoc2 = mysql_fetch_assoc($sqlii);
$assoc3 = $assoc2['username'];                                      
$erreurc = false;
mysql_query("UPDATE users SET last_offline = '".time()."' WHERE username = '".$assoc2."'");
session_start();
$_SESSION['username'] = $assoc2['username'];
Redirect(Settings('Url')."/me"); 
}          
}
}
}
}
}
?>