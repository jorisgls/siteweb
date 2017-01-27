<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("./init.php");
include("./includes/files/session.disconnect.php");

$pagename = "Envoyer une alerte";
$pageid = "boutique";

if(isset($_POST['dedi'])) {
$dedi = Securise($_POST['dedi']);
if($user['seasonal_currency'] >= Settings('Prix_Dedi')) {
mysql_query("UPDATE users SET seasonal_currency = seasonal_currency - ".Settings('Prix_Dedi')." WHERE id = '".$user['id']."'");
mysql_query("INSERT INTO `retrophp_dedicaces` (`uid`, `message`, `date`, `ip`) VALUES ('".$user['id']."', '".$dedi."', '".time()."', '".$user['ip_last']."');");
$sendDedi = true;   
} else {
$sendErreur = true;
}
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
		<div class="">
			<div class="height"></div>
			<h2>ENVOYER UN MESSAGE SUR LE SITE</h2>


		<?php if ($sendDedi == true) { ?>
		<div class="message hide success" id="result-profile" style="display: block;">Ton message a bien été envoyé!</div>
		<div class="height"></div>
		<?php } ?>
		<?php if ($sendErreur == true) { ?>
		<div class="message error margin">Un problème est survenue ! Contacte les gérants !(ERREUR 112009)</div>
		<?php } ?>
		<form method="post">

    <script>
$(function(){
	$('#dedi-in').html;
});
</script>
		<center>
			<input id="dedi-input" style="width:550px;" type="text" name='dedi' maxlength="110" placeholder="Entre ton alerte ici" onkeypress="refuserToucheEntree(event);" onkeyup="$('#dedi-in').text($(this).val());">
			<div style="width:564px;margin-left:auto;margin-right:auto;">
				<div class="left">
					
				</div>
				<div class="right">
					<span id="number"></span> caractères restants
				</div>
				<div class="clear"></div>
			</div>
			<div class="height"></div>
			<div style="width:554px;margin-left:auto;margin-right:auto;background:#eee;padding:5px;border-radius:2px;">
				<div class="left">
										<table style="padding-top:5px;">
					
					</table>
									</div>
				<div class="right">
					<input type="submit" name="submit" class="btn cyan rounded" value="Envoyer l'alerte !" class="submit">
				</div>
				</form>
				<div class="clear"></div>
			</div>
		</center>
	</div>
</div></div>

<script>
(function($) {
	$.fn.extend( {
		limiter: function(limit, elem) {
			$(this).on("keyup focus", function() {
				setCount(this, elem);
			});
			function setCount(src, elem) {
				var chars = src.value.length;
				if (chars > limit) {
					src.value = src.value.substr(0, limit);
					chars = limit;
				}
				elem.html( limit - chars );
			}
			setCount($(this)[0], elem);
		}
	});
})(jQuery);
$(document).ready( function() {
	var elem = $("#number");
	$("#dedi-input").limiter(110, elem);
});

function refuserToucheEntree(event)
{
    // Compatibilité IE / Firefox
    if(!event && window.event) {
        event = window.event;
    }
    // IE
    if(event.keyCode == 13) {
        event.returnValue = false;
        event.cancelBubble = true;
    }
    // DOM
    if(event.which == 13) {
        event.preventDefault();
        event.stopPropagation();
    }
}
</script>

		<div class="height"></div>

</body>
</html>