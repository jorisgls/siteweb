<?php 
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword']))
{
$username = Securise($_POST['username']);
$email = Securise($_POST['email']);
$mdp = Securise($_POST['password']);
$remdp = Securise($_POST['repassword']);
$email_check = preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email);
$tmp2 = mysql_query("SELECT id FROM users WHERE mail = '".$email."' LIMIT 1") or die(mysql_error());
$tmp2 = mysql_num_rows($tmp2);
$filter = preg_replace("/[^a-z\d'\-=\?!@:\.]/i", "", $username);
$tmp3 = mysql_query("SELECT id FROM users WHERE username = '".$username."' LIMIT 1") or die(mysql_error());
$tmp3 = mysql_num_rows($tmp3);
if(isset($username) && isset($email) && isset($mdp) && isset($remdp)) {
$failure = false;

if(strlen($username) < 0){
$message5['username'] = "Votre pseudo est trop court.";
$failure = true;
} elseif(strlen($username) > 15){
$message5['username'] = "Votre pseudo est trop long.";
$failure = true;
} elseif($filter !== $username){
$message5['username'] = "Votre Pseudo contient des carractères non-autorisé.";
$failure = true;
} elseif($tmp3 > 0){
$message5['username'] = "Ce Pseudo existe déjà.";
$failure = true; 
}

elseif(strlen($email) < 6){
$message4['email'] = "Merci d'indiquer une adresse email valide";
$failure = true;
} elseif($email_check !== 1){
$message4['email'] = "Merci d'indiquer une adresse email valide";
$failure = true;
}
elseif($tmp2 > 0){
$message4['email'] = "Cette adresse email existe déjà.";
$failure = true; }

elseif(strlen($mdp) < 0){
$message2['password'] = "Ton mot de passe doit avoir au moins 6 caractères.";
$failure = true;
}

elseif($mdp !== $remdp){
$message3['password'] = "Les mots de passe ne correspondent pas.";
$failure = true;
} elseif(strlen($mdp) < 0){
$message2['password'] = "Votre mot de passe est trop court.";
$failure = true;
}
    
if($failure == false){
        
$mdp = Hashage($mdp);
mysql_query("INSERT INTO users (username,password,mail,rank,look,ip_reg,gender,motto,credits,activity_points,last_offline,account_created) VALUES ('".$username."','".$mdp."','".$email."','".Settings('Rank')."','".Settings('Look_Boy')."','".$ip."','M','".Settings('Mission')."','".Settings('Credits')."','".Settings('Pixels')."','".time()."','".time()."')") or die(mysql_error());
$_SESSION['username'] = $username;
$_SESSION['password'] = $mdp;
Redirect("".Settings('Url')."/register/verif");
exit();
}
} 
}
?>