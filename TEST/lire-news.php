<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("./init.php");
 
$pagename = "Actualité";
$pageid = "news";

$id = Securise($_GET['id']);
$sql = mysql_query("SELECT * FROM retrophp_news WHERE id_page = '".$id."'");
$n = mysql_fetch_assoc($sql);

if(empty($n)) {
Redirect(Settings('Url')."/articles");
}
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
				<h2><b><?PHP echo $n['title'];?></b></h2>
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_10">
				<div class="">
					<div class="lire-news-content" id="body-news">
						<p><?php echo stripslashes($n['body']);?></p>
<p>&nbsp;</p>				<br><br>
<!-- Facebook Like, Send and Comments code BEGIN -->

<script src="//connect.facebook.net/fr_FR/all.js#xfbml=1" ></script>
<fb:like href="<?php echo Settings('Url'); ?>/articles/<?php echo $n['id_page']; ?>" layout="button_count" send="true" width="450" show_faces="false" font=""></fb:like>

<br>

<div class="fb-like-box" data-href="http://www.facebook.com/<?php echo Settings('Facebook'); ?>" data-width="350" data-show-faces="false" data-stream="false" data-header="false"></div>
<!-- Facebook Like, Send and Comments code END -->	</div>
				</div>
<div class="row">

	
</div>

</body>
</html>