<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$do2 = Securise($_GET['check']); if($do2 == "1") {
// Déclaration des variables
$ident=$idp=$ids=$idd=$codes=$code1=$code2=$code3=$code4=$code5=$datas='';
$idp = Settings('IDP');
// $ids n'est plus utilisé, mais il faut conserver la variable pour une question de compatibilité
$idd = Settings('IDD');
$ident=$idp.";".$ids.";".$idd;
// On récupère le(s) code(s) sous la forme 'xxxxxxxx;xxxxxxxx'
if(isset($_POST['code1'])) $code1 = $_POST['code1'];
if(isset($_POST['code2'])) $code2 = ";".$_POST['code2'];
if(isset($_POST['code3'])) $code3 = ";".$_POST['code3'];
if(isset($_POST['code4'])) $code4 = ";".$_POST['code4'];
if(isset($_POST['code5'])) $code5 = ";".$_POST['code5'];
$codes=$code1.$code2.$code3.$code4.$code5;
// On récupère le champ DATAS
if(isset($_POST['DATAS'])) $datas = $_POST['DATAS'];
// On encode les trois chaines en URL
$ident=urlencode($ident);
$codes=urlencode($codes);
$datas=urlencode($datas);
 
/* Envoi de la requête vers le serveur StarPass
Dans la variable tab[0] on récupère la réponse du serveur
Dans la variable tab[1] on récupère l'URL d'accès ou d'erreur suivant la réponse du serveur */
$get_f=@file("http://script.starpass.fr/check_php.php?ident=$ident&codes=$codes&DATAS=$datas");
if(!$get_f)
{
exit("Votre serveur n'a pas accès au serveur de StarPass, merci de contacter votre hébergeur.");
}
$tab = explode("|",$get_f[0]);
 
if(!$tab[1]) $url = Settings('Url')."/shop?p=error";
else $url = $tab[1];
 
// dans $pays on a le pays de l'offre. exemple "fr"
$pays = $tab[2];
// dans $palier on a le palier de l'offre. exemple "Plus A"
$palier = urldecode($tab[3]);
// dans $id_palier on a l'identifiant de l'offre
$id_palier = urldecode($tab[4]);
// dans $type on a le type de l'offre. exemple "sms", "audiotel, "cb", etc.
$type = urldecode($tab[5]);
// vous pouvez à tout moment consulter la liste des paliers à l'adresse : http://script.starpass.fr/palier.php
 
// Si $tab[0] ne répond pas "OUI" l'accès est refusé
// On redirige sur l'URL d'erreur
if(substr($tab[0],0,3) != "OUI")
{
      Redirect(Settings('Url')."/shop?p=error");
      exit;
}
else
{
      /* Le serveur a répondu "OUI"
 
      On place un cookie appelé CODE_BON et qui vaut la valeur 1
      Ce cookie est valide jusqu'à ce que l'internaute ferme son navigateur
      Dans les pages suivantes, nous testerons l'existence du cookie
      S'il existe, c'est que l'internaute est autorisé,
      sinon on le renverra sur une page d'erreur */
      setCookie("CODE_BON", "1", 0);
      // Si vous avez plusieurs documents, nommer le cookie plutôt 'code'+iDocumentId 
 
      // vous pouvez afficher les variables de cette façon :
      // echo "idd : $idd / codes : $codes / datas : $datas / pays : $pays / palier : $palier / id_palier : $id_palier / type : $type";
}

// On vérifie si le cookie existe
if(isset($HTTP_COOKIE_VARS['CODE_BON']))
{
// Si le cookie existe mais que le contenu n'est pas bon on le redirige sur la page d'erreur
if( $HTTP_COOKIE_VARS['CODE_BON'] != '1'){
Redirect(Settings('Url')."/shop?p=error");
exit(1);
}
}
else{ 
mysql_query("UPDATE users SET seasonal_currency = seasonal_currency + ".Settings('Prix_1')." WHERE id = '".$user['id']."'");
mysql_query("INSERT INTO `retrophp_payment` (`user_id`, `pseudo`, `statut`, `nombres`, `type`, `code`, `operation` , `remis`) VALUES ('".$user['id']."', '".$user['username']."', 'Valide', '".Settings('Prix_1')."', 'diamants', '".$codes."', 'Achat de diamants', '1');");
// Si le cookie n'existe pas on redirige l'internaute sur la page d'erreur
Redirect(Settings('Url')."/shop?p=success");
exit(1);
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo Settings('Name'); ?>:</title>
<script src="<?php echo Settings('Url_Images'); ?>/static/js/visual.js?<?php echo $update; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo Settings('Url_Images'); ?>/static/styles/cbs2creditsflow.css?<?php echo $update; ?>" type="text/css" />

</head>

<body id="home" class=" " style="background:#FDF6EC;">

    <div id="container">
        <div id="payment-details-container">
    
    <div id="payment-details-header">
        <div class="rounded"><h1>Confirmation d'achat de Diamants</h1></div>
    </div>


   
        
               
        <div id="payment-details">
            <h2>D&eacute;tails de l'achat</h2>
                        
            <table>
                <colgroup>
                    <col class="product"/>
                    <col class="price"/>
                    <col class="user"/>
                </colgroup>
                <thead>
                    <tr>
                        <th class="credit-amount">Produits</th>
                        <th class="price">Prix</th>
                        <th class="username">Pour le compte</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="credit-amount">
                            <span class="credit-amount"><?php echo Settings('Prix_1'); ?></span>
                            <span class="credit-amount-x"></span>
                            <span class="credit-amount-coin"></span>
                        </td>
                        <td class="price">
                                <?php echo Settings('Prix_1_Euro'); ?>€
                        </td>
                        <td class="username"><?php echo $user['username']; ?></td>
                    </tr>
                </tbody>
            </table>


            
		    
		   
            <div id="payment-methods" class="hide-methods">
          
                <div id="starpass_<?php echo Settings('IDD'); ?>"></div>
<script type="text/javascript" src="http://script.starpass.fr/script.php?idd=<?php echo Settings('IDD'); ?>&amp;theme=white_grey&amp;verif_en_php=1&amp;datas=">
</script>
<noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icir;t.<br />
<a href="http://www.starpass.fr">Micro Paiement StarPass</a>
</noscript>

            </div>

        </div>
<font style="font-size: 8pt;" color="black"> <a href="<?php echo Settings('Url'); ?>/boutique"><span>Retour</span></a>
</font>
<br><br>
<small><small>
<div class="disclaimer">
<h3><span>Demande toujours la permission</span></h3>
En cas d'achat sans autorisation il sera impossible d'étre remboursés
alors demande l'autorisation avant. <br>
Les fraudes à la Carte Bancaire et Internet+ sont sanctionnés d'un bannissement de compte.<br>
Le contenu numérique est fourni immédiatement ; en achetant, vous acceptez qu'il n'existe pas de droit de rétractation.
</div>
</div>
</div>
</div>

    

</div>



   </div>

<script type="text/javascript">Rounder.init();</script>
</body>
</html>