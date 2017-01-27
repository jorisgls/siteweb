<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
 
$pagename = "Conseils Sécurité";
$pageid = "secu";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo Settings('Name'); ?>: <?php echo $pagename; ?></title>
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/jquery.slides.min.js?<?php echo $update; ?>"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/jquery.tipTip.minifiedA.js?<?php echo $update; ?>"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/lightbox-2.6.min.js?<?php echo $update; ?>"></script>
	<script type="text/javascript" src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/cycle.js?<?php echo $update; ?>"></script>
	<script type="text/javascript" src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/general2.js?<?php echo $update; ?>"></script>
	
	<link href='http://fonts.googleapis.com/css?family=Roboto|Open+Sans:300italic,400,600,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Caesar+Dressing' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/grid.css?<?php echo $update; ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/slider.css?<?php echo $update; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/general2.css?745" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/buttons.css?<?php echo $update; ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/lightbox.css?<?php echo $update; ?>" />
	<link rel="icon" type="image/png" href="favicon.ico" />
	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic|Ubuntu+Condensed' rel='stylesheet' type='text/css'>

	<?php include("../templates/meta.php"); ?>

	<script>
		$(function(){
			$(".tip").tipTip({defaultPosition:'top',delay:0});
										titlePage('<?PHP echo $pagename; ?>');
						
							subMenu('<?PHP echo $pageid; ?>');
						forumUpdate();
			forumClear();
			menu('<?PHP echo $pageid; ?>');
		});
	</script>

</head>
<body>

<div id="details"></div>
<div id="all">
	<br>
	<?php include("../templates/header.php"); ?>

	
	<div id="corp">
	
	<?php include("../templates/dedicaces.php"); ?>
	
        
            <div class="row">
    
            <div class="column grid_10">

                 <table>
        <tr>
            <td>
                <img src="<?php echo Settings('Url'); ?>/images/safetyquiz/page_0.png" alt=""/> <br/>
            </td>
            <td>
                <h4>WHAT IS IT ?</h4>
                Le help center est l’endroit où deux fois par semaine il vous sera demandé de vous y rendre pour pouvoir répondre aux questions des joueurs. Il vous ai aussi demandé de vous inscrire au près de JorisFR pour savoir si vous participez ou non aux sessions.

            </td>
            
        </tr>
        <td>
                <img src="<?php echo Settings('Url'); ?>/images/safetyquiz/page_1.png" alt=""/> <br/>
            </td>
            <td>
                <h4>RENTRER DANS LE HELP CENTER</h4>
                Pour vous asseoir sur les sièges à votre disposition, dîtes simplement le numéro du siège (1,2,3,4,5,6,7).

            </td>
        <tr>
            <td>
                <img src="<?php echo Settings('Url'); ?>/images/safetyquiz/page_2.png" alt=""/> <br/>
            </td>
            <td>
                <h4>POUR DEBUTER</h4>
                Une fois le joueur assis devant vous vous pourrez simplement lui dire “En quoi puis-je t’aider ”

            </td>
           
        </tr>
         <td>
                <img src="<?php echo Settings('Url'); ?>/images/safetyquiz/page_3.png" alt=""/> <br/>
            </td>
            <td>
                <h4>POUR TERMINER</h4>
                Une fois la conversation terminée vous devrez dire “Souhaites-tu une autre information”.

            </td>
        <tr>
            <td>
                <img src="<?php echo Settings('Url'); ?>/images/safetyquiz/page_4.png" alt=""/> <br/>
            </td>
            <td>
                <h4>ET ENSUITE ?</h4>
               Si il dit oui vous continuez, si il dit non vous devrez le kicker et enclencher le levier qui se trouve à côté de vous.

            </td>
           
        </tr>
         <td>
                <img src="<?php echo Settings('Url'); ?>/images/safetyquiz/page_5.png" alt=""/> <br/>
            </td>
            <td>
                <h4>NE PERDEZ PAS VOTRE TEMPS !</h4>
                 Si vous voyez qu’un joueur essaye de vous faire perdre du temps vous avez l’autorisation de le kicker.

            </td>
        <tr>
            <td>
                <img src="<?php echo Settings('Url'); ?>/images/safetyquiz/page_6.png" alt=""/> <br/>
            </td>
            <td>
                <h4>SOYEZ SOUDES !</h4>
                Si un joueur vous pose une question à laquelle il vous ai impossible d’y répondre n’hésitez pas à demander aux autres loups ou à JorisFR, vous êtes ici pour être formés et l’erreur est humaine.

            </td>
        </tr>
    </table>

                </div></div>


	<div class="height"></div>
<div class="row">

	
</div>

</body>
</html>