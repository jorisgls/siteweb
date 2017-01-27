<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("./init.php");
 
$pagename = "Réseaux sociaux";
$pageid = "communaute";
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
</br>

<center><img src="<?php echo Settings('Url'); ?>/rs.jpg"><br></center>




<div class="height"></div>

<img src="<?php echo Settings('Url'); ?>/images/icon_face_book.png"><br>
<b>Facebook</b><br>
Aime notre page facebook pour connaître toutes les nouveautés en temps réel ! Tu pourras aussi jouer, participer à des sondages et gagner beaucoup de cadeaux ! Alors qu'attends-tu ?<br>
 <br>

 <a href="http://facebook.com" target="_blank">
<img src="<?php echo Settings('Url'); ?>/face.png"><br>
</a>
 
</p>
<br>

<p>
<img src="<?php echo Settings('Url'); ?>/images/logo_twitter.png"><br>
<b>Twitter</b><br>
Joue les prolongations sur nos pages Twitter. Follow nous pour tout savoir en temps réel des nouveautés, des concours et de tout autre contenu à ne pas manquer!<br>
<br>

 <a href="http://twitter.com" target="_blank">
<img src="<?php echo Settings('Url'); ?>/tweet1.png"><br>
</a>

</p>
<br>


				
				</div></div>

</body>
</html>