<?php

$mypath = "xmls/";//remplacer par quelque chose de personnalisé pour des raisons de sécurité

if (get_magic_quotes_gpc()) {
   function stripslashes_deep($value){
       $value = is_array($value) ?
                   array_map('stripslashes_deep', $value) :
                   stripslashes($value);

       return $value;
   }

   $_POST   = array_map('stripslashes_deep', $_POST);
   $_GET    = array_map('stripslashes_deep', $_GET);
   $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
}

if (!isset($_GET['action'])) {
    die('Ce serveur chat ne peut etre utilise que par le client!');
}

$action = $_GET['action'];

// recup messages ou ajout ou autre!!
switch($action){
	case 'get':
	  send_messages();
	break;
	case 'set_reads':
	  set_reads();
	break;
	case 'add_client':
	  add_client();
	break;
	case 'add':
	  add_message();
	break;
	case 'eff_user':
	  eff_user();
	break;
}


function send_messages() {	
	global $mypath;
	
    if (!isset($_GET['user'])) {
		die("erreur: no-user");
	}
	
	$user_file = $mypath . $_GET['user']."_messages.xml";
	if(!is_dir($mypath)){
		 mkdir($mypath);
		 $findex = fopen($mypath . "index.html","w");
		 fwrite($findex,'<h1>acces prive</h1>');	
	}
	
	if(!file_exists($user_file)){
		$fn = fopen($user_file,"w");
		fwrite($fn,'<?xml version="1.0"?><messages></messages>');
		die('{"messages": []}');
	}else{
	$str = '{"messages":[';
	$messages = simplexml_load_file($user_file);

    foreach ($messages as $message) {
		//regexs! sur $message['message']
		$user    = $message->user;
		$mess    = $message->message;
		$me      = $message->me;
		$lu      = $message->lu;
		$regex="@(http://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@";
		$mess = preg_replace($regex, "<a href='$1' target='_blank'>$1</a>", $mess);   
			
		$mess = str_replace("[:)]","<img src='images/smilies/sm_biggrin.gif' />",$mess);
		$mess = str_replace("[:(]","<img src='images/smilies/sad.gif' />",$mess);
		$mess = str_replace("[:s]","<img src='images/smilies/sm_upset.gif' />",$mess);
		$mess = str_replace("[:o]","<img src='images/smilies/sm_bigeek.gif' />",$mess);
		$mess = str_replace("[:|]","<img src='images/smilies/sm_confused.gif' />",$mess);
		$mess = str_replace("[;)]","<img src='images/smilies/sm_wink.gif' />",$mess);
		$mess = str_replace("[:p]","<img src='images/smilies/sm_razz.gif' />",$mess);
		$mess = str_replace("[8)]","<img src='images/smilies/sm_cool.gif' />",$mess);
		$mess = str_replace("[8|]","<img src='images/smilies/sm_dead.gif' />",$mess);
		$mess = str_replace("[:-(]","<img src='images/smilies/sm_sigh.gif' />",$mess);
		$mess = str_replace("[:D]","<img src='images/smilies/biggrin.gif' />",$mess);
		$mess = str_replace("[8-(]","<img src='images/smilies/sm_cry.gif' />",$mess);
		
		$str .= '{"user":"' . addslashes($user) . '", "message":"' .addslashes($mess) .'", "me":"' . $me . '", "lu":"' .$lu .'"},';
		
    }
	$length = strlen($str);
	$str[$length-1] = " ";
	$str .= "]}";

	die($str);
	}
}

function add_message() {
	global $mypath;

    // tout le monde est la?
    if (!isset($_GET['user'])) {
        die('erreur:no-user');
    }
    if (!isset($_GET['message'])) {
        die('erreur:no-message');
    }
	if (!isset($_GET['dest'])) {
        die('erreur:no-message');
    }

    $user    = htmlentities(strip_tags($_GET['user']));
    $dest    = htmlentities(strip_tags($_GET['dest']));
    $message = htmlentities(strip_tags($_GET['message']));
    $datetimestamp = time();
	//bbcoding
		$message = str_replace(":)","[:)]",$message);
		$message = str_replace(":(","[:(]",$message);
		$message = str_replace(":s","[:s]",$message);
		$message = str_replace(":o","[:o]",$message);
		$message = str_replace(":|","[:|]",$message);
		$message = str_replace(";)","[;)]",$message);
		$message = str_replace(":p","[:p]",$message);
		$message = str_replace("8)","[8)]",$message);
		$message = str_replace("8|","[8|]",$message);
		$message = str_replace(":-(","[:-(]",$message);
		$message = str_replace(":D","[:D]",$message);
		$message = str_replace("8-(","[8-(]",$message);
		
	$file_user =$mypath .$user."_messages.xml";

	$dom = new DomDocument();
	$dom->load($file_user);
//ajoute le message chez user	
	$user_mess = $dom->createElement("mess");
	$mess = $dom->createElement("message", $message);
	$user_mess->appendChild($mess);
	$myuser = $dom->createElement("user", $dest);
	$user_mess->appendChild($myuser);
	$isme = $dom->createElement("me", '1');
	$user_mess->appendChild($isme);
	$isread = $dom->createElement("lu", '0');
	$user_mess->appendChild($isread);
	$dom->documentElement->appendChild($user_mess);
	$dom->save($file_user);
//ajoute le message chez dest	
	$file_dest =$mypath . $dest."_messages.xml";
	if(!file_exists("$file_dest")){
		$fn = fopen("$file_dest","w");
		fwrite($fn,'<?xml version="1.0"?><messages></messages>');
	}
		
	$domdest = new DomDocument();
	$domdest->load($file_dest);
	
	$dest_mess = $domdest->createElement("mess");
	$dmess = $domdest->createElement("message", $message);
	$dest_mess->appendChild($dmess);
	$dmyuser = $domdest->createElement("user", $user);
	$dest_mess->appendChild($dmyuser);
	$disme = $domdest->createElement("me", '0');
	$dest_mess->appendChild($disme);
	$disread = $domdest->createElement("lu", '1');
	$dest_mess->appendChild($disread);
	$domdest->documentElement->appendChild($dest_mess);
	$domdest->save($file_dest);
}

function set_reads(){
	global $mypath;

    // tout le monde est la?
    if (!isset($_GET['user'])) {
        die('erreur:no-user');
    }
	if (!isset($_GET['cible'])) {
        die('erreur:no-cible');
    }

	$user      = $_GET['user'];
	$user_file = $mypath.$user."_messages.xml";
	$cible     = $_GET['cible'];
	$dom = new DOMDocument();
	$dom->load($user_file);
	$xpath = new DOMXPath($dom);
	
	$users = $xpath->evaluate("/messages/mess/user");
	$lus   = $xpath->evaluate("/messages/mess/lu");
	for($i=0;$i < $users->length ; $i++) {
			if($users->item($i)->nodeValue==$cible){
				$lus->item($i)->nodeValue = 0;
			}
		}
	$dom->save($user_file);
}

function add_client(){
	global $mypath;

    // tout le monde est la?
    if (!isset($_GET['client'])) {
        die('erreur:no-client');
    }
	if (!isset($_GET['user'])) {
        die('erreur:no-user');
    }

	$client      = $_GET['client'];
	$user        = $_GET['user'];
	$file_user   = $user."_messages.xml";
	
		$file_user =$mypath .$user."_messages.xml";

	$dom = new DomDocument();
	$dom->load($file_user);
//ajoute un nouvel utilisateur	
	$user_mess = $dom->createElement("mess");
	$mess = $dom->createElement("message", "");
	$user_mess->appendChild($mess);
	$myuser = $dom->createElement("user", $client);
	$user_mess->appendChild($myuser);
	$isme = $dom->createElement("me", '0');
	$user_mess->appendChild($isme);
	$isread = $dom->createElement("lu", '0');
	$user_mess->appendChild($isread);
	$dom->documentElement->appendChild($user_mess);
	$dom->save($file_user);
}

function eff_user(){
	global $mypath;

    // tout le monde est la?
    if (!isset($_GET['user'])) {
        die('erreur:no-user');
    }
	if (!isset($_GET['cible'])) {
        die('erreur:no-cible-baby');
    }
	$user      = $_GET['user'];
	$user_file = $mypath . $user . "_messages.xml";
	$cible     = $_GET['cible'];
	
	if($_GET['cible']=="all"){
		$fn = fopen("$user_file","w");
		fwrite($fn,'<?xml version="1.0"?><messages></messages>');
		die('{"messages": []}');
	}
		
	$dom = new DOMDocument();
	$dom->load($user_file);
	$xpath = new DOMXPath($dom);
	$hit = array();
	$num = $xpath->evaluate("/messages/mess/user");
	for($i=0;$i<$num->length;$i++){
		$user = $num->item($i);
		$url = $user->nodeValue;
		if($url==$cible) $hit[] = $i;
	}
	for($i=0;$i<count($hit);$i++){
		$node = $dom->getElementsByTagName("mess")->item($hit[0]);
		$dom->getElementsByTagName("messages")->item(0)->removeChild($node);
	}
$dom->save($user_file);
}


?> 