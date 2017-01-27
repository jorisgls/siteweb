<?php
	class User
	{

		// User
		public function __construct($bdd, $username, $password)
		{
			global $bdd;
			$req = $bdd->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
			$req->execute(Array(':username' => $username, ':password' => $password));
			if($req->rowCount() == 1)
			{
				$data = $req->fetch();
				foreach($data as $k=>$v){
					$this->$k = safe($v,'HTML');
				}
			}
		}

		// Vérification du compte
		public function RtpUser($userid, $hoteid, $userlook, $username, $gkey, $page)
		{
			global $bdd;
			$retrophp_users = $bdd->prepare("SELECT * FROM retrophp_users WHERE uid = :uid");
			$retrophp_users->execute(Array(":uid" => $userid));
			if($retrophp_users->rowCount() < 1) {
			if($hoteid != '0') {
			$hote_id = $bdd->prepare("SELECT * FROM users WHERE hote_id = :hote_id");
			$hote_id->execute(Array(":hote_id" => $hoteid));
			$hote = $hote_id->fetch(PDO::FETCH_ASSOC);
			$recup = $bdd->prepare("SELECT * FROM retrophp_users WHERE uid = :uid");
			$recup->execute(Array(":uid" => $hote['id']));
			$recupkey = $recup->fetch(PDO::FETCH_ASSOC);
			$bdd->exec("INSERT INTO `retrophp_users` (`uid`, `user_key`, `renamed`, `gender_register`, `mail_verified`) VALUES ('".$userid."', '".$recupkey['user_key']."', '1', '1', '1');");
			} else {
			$bdd->exec("INSERT INTO `retrophp_users` (`uid`, `user_key`, `renamed`, `gender_register`) VALUES ('".$userid."', '".".$gkey."."', '1', '1');");
			}
			}
			return true;
		}

		// Modification de l'IP du compte
		public function UpdateIP($userID)
		{
			global $bdd;
			$req = $bdd->prepare("UPDATE users SET ip_last = :ip WHERE id = :user_id");
			$req->execute(Array(":ip" => getenv("REMOTE_ADDR"), ":user_id" => $userID));
		}

		// Modification du KEY du compte
		public function UpdateKEY($generate_key, $userID)
		{
			global $bdd;
			$req = $bdd->prepare("UPDATE retrophp_users SET user_key = :user_key WHERE uid = :user_id");
			$req->execute(Array(":user_key" => $generate_key, ":user_id" => $userID));
		}

		// Verification d'inscription
		public function Verif($renamed, $gender_register)
		{
			if($renamed == 0) {
			Redirect(URL."/client");
			}
 			if($gender_register == 0) {
			Redirect(URL."/client");
			}
			return true;
		}
	
		// Paiement StarPass
		public function StarPass($uid, $username, $prix, $code) 
		{
			global $bdd;
			$bdd->exec("UPDATE users SET seasonal_currency = seasonal_currency + ".$prix." WHERE id = '".$uid."'");
			$bdd->exec("INSERT INTO `retrophp_payment` (`user_id`, `pseudo`, `statut`, `nombres`, `type`, `code`, `operation` , `remis`) VALUES ('".$uid."', '".$username."', 'Valide', '".$prix."', 'diamants', '".$code."', 'Achat de diamants', '1');");
			return true;
		}

		// Générateur de Token
		public function Token() 
		{
			$token = bin2hex(mcrypt_create_iv(10, MCRYPT_DEV_RANDOM));
			return $token;
		}

		// Vérification d'abonnement VIP
		public function Expire($userid)
		{
			global $bdd;
			$verif_date = $bdd->query("SELECT * FROM retrophp_abonnement WHERE `timestamp_expire` <= '".time()."' AND `user_id` = '".$userid."'");
			if($verif_date->rowCount() >= 1) {
			$bdd->exec("DELETE FROM `retrophp_abonnement` WHERE `user_id` = '".$userid."'");
			$bdd->exec("UPDATE users SET rank = '1' WHERE `id` = '".$userid."' AND rank <= '3'");
			}
		}

		// Ajout de log (Administration)
		public function AddLogs($pseudo, $action)
		{
			global $bdd;
			$req = $bdd->prepare("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES (:pseudo,:action,:date)");
			$req->execute(Array(":pseudo" => $pseudo, ":action" => $action, ":date" => time()));
		}

		// Script d'avatar
		function Avatar($figure, $style, $action = ''){
			$style = explode(",", $style);
			if($style[0] == "s"){ $style[6] = "1"; }else{ $style[6] = "0"; }
			if($style[3] == "sml"){ $style[7] = "1"; }else{ $style[7] = "0"; }
		
			return Settings('Avatarimage')."avatarimage?figure=".$figure."&size=".$style[0]."&direction=".$style[1]."&head_direction=".$style[2]."&crr=".$style[5]."&action=".$action."&gesture=".$style[3]."&frame=".$style[4]."&headonly=".$style[5];
		}
}
?>