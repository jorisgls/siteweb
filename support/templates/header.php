<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SUPPORT</title>
	<link href="<?php print URL; ?>/admin/css/bootstrap/bootstrap.min.css?<?php print UPDATE; ?>" rel="stylesheet" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="<?php print URL; ?>/admin/css/jquery-jvectormap-1.2.2.css?<?php print UPDATE; ?>"/>
	<link href="<?php print URL; ?>/admin/css/style.css?<?php print UPDATE; ?>" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

</head>
<body>

	

	<div class="wrapper">

		<aside class="sidebar">
			<ul class="main-nav">
				
				

				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'news'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 5) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/support/new">
						<span class="main-nav__icon"><i class="glyphicon glyphicon-envelope"></i></span>
						MESSAGE
					</a>
				</li>
				<?php } ?>
				
				

				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'x'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 20) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/me.php">
						<span class="main-nav__icon"><i class="icon pe-7s-photo-gallery"></i></span>
						Retour
					</a>
				</li>
				<?php } ?>

				
				
			</ul>
		</aside>
		
		<section class="content">
			<header class="main-header clearfix">
				<h1 class="main-header__title">
					<i class="icon pe-7s-home"></i>
					SUPPORT
				</h1>
				
				<div class="main-header__date">
					<i class="icon pe-7s-date"></i>
					<span><?php print date_fr("d M. Y", time()); ?></span>
					<i class="pe-7s-angle-down-circle"></i>
				</div>
			</header>
			
			