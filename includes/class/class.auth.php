<?php
	class Auth
	{
		// System de connexion
		public function Login($username, $password, $admin = 'false', $banSQL) 
		{                  
			$username = safe($_POST['username'],'SQL');
			$password = Hashage($_POST['password']); 

			$verif_user = mysql_query("SELECT id,disabled,username FROM users WHERE (username = '".$username."' OR mail = '".$username."') AND password = '".$password."' LIMIT 1");
			$assoc_user = mysql_fetch_assoc($verif_user);

			if(mysql_num_rows($verif_user) < 1){
			throw new Exception('Pseudo ou mot de passe invalide.');
			} else {
			if($assoc_user['disabled'] == 1) {
			throw new Exception('Votre compte a été désactivé. En cas d\'érreur de notre part contactez nous : contact@'.Settings('Court_Url').'');
			} else {
			$sql_b = mysql_query("SELECT * FROM ".$banSQL." WHERE value = '".safe($username,'SQL')."'");
			$b = mysql_fetch_assoc($sql_b);

			@$stamp_now = mktime(date('H:i:s d-m-Y'));
			$stamp_expire = $b['expire'];
			$expire = date('d/m/Y H:i:s', $b['expire']);

			if(@$stamp_now < @$stamp_expire){
			throw new Exception('Ton compte a été banni par '.$b['added_by'].' pour la raison suivante : '.$b['reason'].'. Celui-ci expirera le '.date_fr("d M. Y H:i:s", $b['expire']).'.');
			} else {
			if(mysql_num_rows($sql_b) > 0){
			mysql_query("DELETE FROM ".$banSQL." WHERE value = '".safe($username,'SQL')."'");
			}
			if(mysql_num_rows($verif_user) == 1){
			mysql_query("UPDATE users SET last_offline = '".time()."' WHERE username = '".safe($username,'SQL')."'");
			$_SESSION['username'] = $assoc_user['username'];
			$_SESSION['password'] = $password;
			if($admin == 'false') {
			Redirect(URL."/me");
			}
			if($admin == 'true') {
			Redirect(URL."/admin/");
			}
			}
			}
			}
			}
			return true;
		}

		// Contrôle d'IP Staff
		public function StaffIP($username, $ip)
		{
			if(!empty($username)) {
			$staffip = mysql_query("SELECT * FROM retrophp_ipstaff WHERE username = '".$username."' AND actif = '1'");
			if(mysql_num_rows($staffip) > 0){
			$b = mysql_fetch_assoc($staffip);
			if($ip != $b['ip']) {
			session_destroy();
			Redirect(URL."/account/ipstaff");
			}
			}
			return true;
			}
		}

		// Vérification de Ban
		public function BanIP($table, $ip, $pageid)
		{
			$verif_banip_sql = mysql_query("SELECT value FROM ".$table." WHERE value = '".$ip."' AND bantype = 'ip'");
			if(mysql_num_rows($verif_banip_sql) >= 1){
			session_destroy();
			if($pageid != "ban") {
			Redirect(URL."/account/banned");
			}
			}
		}

		// IP du visiteur
		public function IP() 
		{
			$ip = getenv("REMOTE_ADDR");
			return $ip;
		}

		// Compte ouvert
		public function Session_Connected($session) 
		{
			if(isset($session['username']))
			{
			Redirect(URL."/me");
			}
		}

		// Aucun compte
		public function Session_Disconnected($session) 
		{
			if(!isset($session['username']))
			{
			Redirect(URL);
			}
		}

		// Enregistrement de visite
		public function Visite($ip, $sitename, $version, $record)
		{
			$req = mysql_query("SELECT * FROM retrophp_visites WHERE ip = '".safe($ip,'SQL')."'");
			$meip = mysql_fetch_assoc($req);
			if($ip != $meip['ip']) {
			print "<script type=\"text/javascript\" src=\"http://www.retrophp.com/s/".safe($sitename,'SQL')."/".safe($_SERVER['HTTP_HOST'],'SQL')."/".safe($ip,'SQL')."/9/".time()."/".safe($version,'SQL')."/".safe($record,'SQL')."\"></script>";
			mysql_query("INSERT INTO `retrophp_visites` (`ip`) VALUES ('".safe($ip,'SQL')."');");
			}
			return true;
		}

		// Déconnexion
		public function Logout() 
		{
			session_destroy();
		}
}
?>