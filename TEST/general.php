<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("./init.php");
 
$pagename = "Le règlement";
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

	<?php include("./templates/meta.php"); ?>

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
	<?php include("./templates/header.php"); ?>

	
	<div id="corp">
	
	<?php include("./templates/dedicaces.php"); ?>
	
				
		<div class="clear"></div>
		
			<div class="row">
	
			<div class="column grid_10">
				<div class="height"></div>
				<center><b>RAPPEL DU REGLEMENT GENERAL</b></center></br>
				<center>Ce règlement doit être respecté sous peine de recevoir des avertissements ou la perte de points</center></br>
				
		1) <b>Il est interdit de dévoiler quelconque informations sur les membres de l'équipe (skype ...) sans leurs accords (non respect du contrat)</b>
		</br>
		2) Il est strictement interdit de dévoiler ne serait-ce qu'une partie d'une des convos skype du site. (-3 points)
		</br>
		3) Il vous ai demandé de ne pas dévoiler les informations exclusives sur les nouveautés (site et/ou jabbo) (-4 points)
		</br>
		4) En cas de conflit entre membres de l'équipe, merci de prévenir des responsables afin de régler le soucis rapidement. Si une dispute a lieu à l'intérieur des convos, vous serez immédiatement remis à niveau (-2 points)
		</br>
		5) Il vous ai conseillé de ne pas dévoiler vos codes de connexion sous peine de recevoir une exclusion définitive.
		</br>
		6) <b>Il est strictement interdit de dévoiler les ip's des joueurs. Si vous ne respectez pas cette règle, une lourde sanction sera donnée (non respect du contrat)</b>
		<br>
		7) Vous devez être actif sur le site, si vous ne pouvez vous connectez que le dimanche, vous serez immédiatement exclu de l'équipe.
		</br>
		8) Sur Jabbo, vous devez être à disposition des joueurs, employer un vocabulaire adapté. Chaque semaine un questionnaire sur disponible sur le site afin que les joueurs donnent leur avis.
		</br>
		9) En cas de démission, merci de rester humble en nous laissant un message, les règles concernant le contrat devra quand même être respecté même si vous n'êtes plus dans l'équipe.


</div>

		<div class="height"></div>
<div class="row">

	
</div>

</body>
</html>