<?php include('header.php'); ?>
<!DOCTYPE html>
<html dir="ltr" lang="fr">
<head>
  <meta charset="iso-8859-1">
  <!-- v10897 -->
  <title>Gestionnaire des abscences</title>

  <meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="dNt4JoHX8xHm3Q5zjYIrpWJnp6dzvFjlO3Pz3Fs6d6JRNFoz2J3/pSl8+kT2YQY3Mc+QWw1pc6RoMYgE+UWD7A==" />
  <link href="https://help.habbo.fr/hc/fr/requests/new" rel="canonical" />

  <!-- Entypo pictograms by Daniel Bruce — www.entypo.com -->
  <link rel="stylesheet" media="all" href="//p5.zdassets.com/hc/assets/application-31a315cd8b47a64d554b.css" id="stylesheet" />

    <link rel="stylesheet" type="text/css" href="//p5.zdassets.com/hc/themes/56308/209230348/style-6d80c3b459e70a12690ca9a927b3a706.css?brand_id=3281126&amp;locale=fr" />

  <link rel="shortcut icon" type="image/x-icon" href="/web-gallery/v2/favicon.ico" />

  <!--[if lt IE 9]>
  <script>
    //Enable HTML5 elements for <IE9
    'abbr article aside audio bdi canvas data datalist details dialog \
    figcaption figure footer header hgroup main mark meter nav output \
    progress section summary template time video'.replace(/\w+/g,function(n){document.createElement(n)});
  </script>
<![endif]-->

  <script src="//p5.zdassets.com/hc/assets/jquery-b143b457e1eadf7cf018.js"></script>
  
  
  

  <!-- add code here that should appear in the document head -->
<!-- Habbo: Ubuntu & Ubuntu Condensed-->

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu+Condensed" />



    <script type="text/javascript" src="//p5.zdassets.com/hc/themes/56308/209230348/script-6d80c3b459e70a12690ca9a927b3a706.js?brand_id=3281126&amp;locale=fr"></script>
</head>
<body class="">
  


  


 


  <main role="main">
    <nav class="sub-nav">
  <ol class="breadcrumbs">
  

<h1 class="page-header">
  Signaler une abscence
  
</h1>

<!-- Habbo: add link to front page --> 

<p><a href="/management.php">&lsaquo;&lsaquo; Retour</a></p>

Tu ne seras pas disponible pendant une certaine période ?</br>Signale ton abscence en veillant bien à remplir tous les champs<br />Le manager t'envera une confirmation et te notera sur le tableau d'abscences des STAFF</p>





<div class="form">
  
<?php



if(isset($_POST['email']) || isset($_POST['sujet']) || isset($_POST['message']))
{
	$destinataire = $adresseemail;
	$email = htmlentities($_POST['email']);
	if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',str_replace('&amp;','&',$email)))
	{
		$sujet = '[- Support -] : '.stripslashes($_POST['sujet']);
		$message = stripslashes($_POST['message']);
		$headers = "From: <".$email.">\n";
		$headers .= "Reply-To: ".$email."\n";
		$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
		if(mail($destinataire,$sujet,$message,$headers))
		{
			echo '<div class="alert alert-success">Votre abscence a bien &eacute;t&eacute; enregistr&eacute;</div><br>';
		}
		else
		{
			echo '<div class="alert alert-danger">Une erreur c\'est produite lors de l\'envois de l\'abscence</div><br>';
		}
	}
	else
	{
		echo '<div class="alert alert-danger">Nous venons de rencontrer un problème, merci de contacter les responsables</div><br>';
	}
}
?>



<form action="../abscences/index.php" method="post">
	
	<div class="form-group">
	<label for="email">Ton email:*</label><br>
	<input type="text"  placeholder="Veuillez entrez un pseudo valide." name="email" id="email" size="70"/> 
	</div><br>
	
	<div class="form-group">
	<label for="sujet">Date de l'abscence:*</label><br>
	<input type="text" class="form-control" placeholder="Entrez la date de votre abscence." name="sujet" id="sujet" size="80"/> 
	</div><br>
	
	<div class="form-group">
	<label for="message">Motif de l'abscence:*</label><br>
	<textarea class="form-control" cols="70" placeholder="Entrez votre motif ici." rows="6" name="message" id="message"></textarea><br>
	</div><br>
	<center>Les champs avec <b>*</b> doivent être remplis.</center>
	<br>
	<input type="submit" value="Envoyer" class="btn btn-default"/>
</form>




  



  </main>

  

 

  <!-- / -->

  <script type="text/javascript" src="//p5.zdassets.com/hc/fr/locales-624b144d70812b853be57cea12143ea332bc1682.js"></script>
  <script src="https://habbohelpfr.zendesk.com/auth/v2/host.js" data-brand-id="3281126" data-return-to="https://help.habbo.fr/hc/fr/requests/new" data-theme="hc" data-locale="16" data-auth-origin="3281126,true,true"></script>
  <script type="text/javascript" src="https://p5.zdassets.com/assets/zendesk_pci_hc.v4.js"></script>

  <script type="text/javascript">
  /*

    Greetings sourcecode lurker!

    This is for internal Zendesk and legacy usage,
    we don't support or guarantee any of these values
    so please don't build stuff on top of them.

  */

  HelpCenter = {};
  HelpCenter.account = {"subdomain":"habbohelpfr","environment":"production","name":"Centre d'Aide Habbo"};
  HelpCenter.user = {"identifier":"da39a3ee5e6b4b0d3255bfef95601890afd80709","email":null,"name":null,"role":"anonymous","avatar_url":"https://assets.zendesk.com/hc/assets/user_avatar.png","organizations":[],"groups":[]};
  HelpCenter.internal = {"asset_url":"//p5.zdassets.com/hc/assets/","current_session":{"locale":"fr","csrf_token":"1WqOgMIpqtkFdQT1m7P3QZftMNxE7uYrkZFuRVOVVHfwhayVm2OmbcrU8MLgUNrTxEUHIDo7zWrC0xWd8eqgOQ==","shared_csrf_token":null},"settings":{"zopim_enabled":false,"spam_filter_enabled":true},"current_record_id":null,"current_record_url":null,"current_record_title":null,"search_results_count":null,"current_text_direction":"ltr","current_brand_url":"https://habbohelpfr.zendesk.com","current_path":"/hc/fr/requests/new","show_new_community_ipm_for_custom_theme":false,"authentication_domain":"https://habbohelpfr.zendesk.com","show_autocomplete_breadcrumbs":true,"heap_analytics_id":null,"user_info_changing_enabled":false,"has_user_profiles_enabled":false,"has_unlimited_categories":true,"has_anonymous_kb_voting":false,"has_advanced_upsell":false,"mobile_request":false,"mobile_site_enabled":true,"show_at_mentions":false,"has_copied_content":true,"embeddables_config":{"embeddables_web_widget":false,"embeddables_automatic_answers":false,"embeddables_connect_ipms":false},"plans_url":"https://help.habbo.fr/hc/admin/plan?locale=fr"};
</script>

  <script src="//p5.zdassets.com/hc/assets/hc_enduser-66150b357bbb71d63348.js"></script>
  

  <script type="text/javascript">
    (function() {
  var Tracker = {};

  Tracker.track = function(eventName, data) {
    var url = "https://help.habbo.fr/hc/tracking/events?locale=fr";

    var payload = {
      "event": eventName,
      "data": data,
      "referrer": document.referrer
    };

    var xhr = new XMLHttpRequest();

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    xhr.send(JSON.stringify(payload));
  };

    Tracker.track("submit_request_form_viewed", "BAh7BjoVcGFyZW50X3RpY2tldF9pZDA=--1f67c278ee26e628b2ae01fbc8e0925848d23158");
})();

  </script>
</body>
</html>
<!--- partager sur Habbo-Dev par Jason code mail: habbo-dev.fr/mailto/