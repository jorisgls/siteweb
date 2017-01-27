<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("./init.php");
include("./includes/files/submit.php");
include("./includes/files/register.submit.php");
include("./includes/files/session.connect.php");

$pagename = "Crée ton avatar, décore ton appart, chatte et fais-toi plein d'amis.";
$pageid = "index";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><?php echo Settings('Name'); ?>: <?php echo $pagename; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<script src="<?php echo Settings('Url'); ?>/web-gallery/index/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo Settings('Url'); ?>/web-gallery/index/js/jquery-ui.mini.js"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo Settings('Url'); ?>/web-gallery/index/css/common.css">

		<?php include("./templates/meta.php"); ?>
</head>
	<body>
		<div id="header">
			<div class="center">
			

			 <?php if($erreurc == true) { ?>
    <div id="error_message"><?php echo $erreurmess; ?></div>
    <?php } ?>
						<?php if(isset($message5)) { ?>
    <div id="error_message"><?php if(isset($message5['username'])) { echo "".$message5['username'].""; } ?></div>
    <?php } ?>
            <?php if(isset($message4)) { ?>
    <div id="error_message"><?php if(isset($message4['email'])) { echo "".$message4['email'].""; } ?></div>
    <?php } ?>

    <?php if(isset($message2)) { ?>
    <div id="error_message"><?php if(isset($message2['password'])) { echo "".$message2['password'].""; } ?></div>
    <?php } ?>
    <?php if(isset($message3)) { ?>
    <div id="error_message"><?php if(isset($message3['password'])) { echo "".$message3['password'].""; } ?></div>
    <?php } ?>
        	</div>
			</div>
       
		</div>
	<div class="center_c">
		<div class="arrow_box">
			<form id="index" method="post">
			<div id="login-column-1">
				<label style="font-size: 13px; display: block; margin-bottom: 2px;">Ton pseudo</label>
            	<input tabindex="2" type="text" value="" name="username" placeholder="Pseudo"><br>
            	<input tabindex="5" type="checkbox" disabled>
            	<label class="sub-label">Garder ma session active</label>
			</div>
			<div id="login-column-2">
            	<label style="font-size: 13px; display: block; margin-bottom: 2px;">Ton mot de passe</label>
            	<input type="password" name="password" placeholder="Password">
            	
        	</div>
			<input type="submit" value="Entrer" id="button" class="link"/>
			</form>
		</div>
			<a href="<?php echo Settings('Url'); ?>/registration" class="link"><div class="inscription"><b>Inscrire un nouveau loup</b></div></a>
			<?php $do2 = isset($_GET['p']); if($do2 == "register") { ?>
			<div class="box_register">
				<br>
				<form id="register" method="post">
				<input type="text" name="username" placeholder="Pseudo">
				<input type="email" name="email" placeholder="Adresse email">
				<input type="password" name="password" placeholder="Mot de passe">
				<input type="password" name="repassword" placeholder="Répète le (pour être sûr)">
				<a href="#" class="link" onclick="document.getElementById('register').submit()"><div class="inscription new"><b>Valider</b></div></a>
				</form>
			</div>
			<?php } ?>
		</div>
		<div id="img"></div>	
	</body>
	<div id="copyright">HelpWeb est le site officiel des loups sur www.jabbonow.fr.<br>
© 2016 


</script>
</html>