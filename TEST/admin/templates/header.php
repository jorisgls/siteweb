<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Administration</title>
	<link href="<?php echo Settings('Url'); ?>/admin/css/bootstrap/bootstrap.min.css?<?php echo $update; ?>" rel="stylesheet" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="<?php echo Settings('Url'); ?>/admin/css/jquery-jvectormap-1.2.2.css?<?php echo $update; ?>"/>
	<link href="<?php echo Settings('Url'); ?>/admin/css/style.css?<?php echo $update; ?>" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

</head>
<body>

	<header class="top-bar">
		<a class="mobile-nav" href="#"><i class="pe-7s-menu"></i></a>
		<div class="main-logo"><span><?php echo Settings('Name'); ?></span></div>
		<?php $sql = mysql_query("SELECT * FROM retrophp_settings WHERE Maintenance = 'true'"); while($s = mysql_fetch_array($sql)) { ?>
		<input type="checkbox" id="s-logo" class="sw" disabled checked/>
		<label class="switch switch--dark switch--header" for="s-logo"></label>
		<?php } $sql = mysql_query("SELECT * FROM retrophp_settings WHERE Maintenance = 'false'"); while($s = mysql_fetch_array($sql)) {?>
		<input type="checkbox" id="s-logo" class="sw" disabled/>
		<label class="switch switch--dark switch--header" for="s-logo"></label>
		<?php } ?>
		
		<div class="main-search">
			<form method="post" action="users" autocomplete="on">
			<input type="text" placeholder="Recherche d'un joueur" name="username" id="msearch">
		</form>
			<label for="msearch">
				<i class="pe-7s-search"></i>
			</label>
		</div>
		<ul class="profile">
			<li>
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" onclick="return false;" class="profile__user">
					<figure class="pull-left rounded-image profile__img">
						<img class="media-object" src="<?php echo Settings('Avatarimage'); ?>avatarimage?figure=<?php echo $user['look']; ?>&action=&direction=2&head_direction=2" alt="user">
					</figure>
					<span class="profile__name">
						<span><?php echo $user['username']; ?></span> <i class="pe-7s-angle-down"></i>
					</span>
				</a>
				<ul class="dropdown-menu pull-right">
					<li><a href="<?php echo Settings('Url'); ?>/account/logout"><i class="icon pe-7s-close-circle"></i> Déconnexion</a></li>
				</ul>
			</li>
			<?php if($user['rank'] >= 10) { ?>
			<li>
				<a href="<?php echo Settings('Url'); ?>/admin/site">
					<i class="pe-7f-config"></i>
				</a>
			</li>
			<?php } ?>
		</ul>

	</header>

	<div class="wrapper">

		<aside class="sidebar">
			<ul class="main-nav">
				<?php if($pageid == 1) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php echo Settings('Url'); ?>/admin/">
						<span class="main-nav__icon"><i class="icon pe-7s-home"></i></span>
						Accueil
					</a>
				</li>
				<li>
				<?php $hks = mysql_query("SELECT * FROM retrophp_hk WHERE pagename = 'config'"); $hksecu = mysql_fetch_assoc($hks); if($user['rank'] >= $hksecu['rank']) { ?>
				<?php if($pageid == 2) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php echo Settings('Url'); ?>/admin/site">
						<span class="main-nav__icon"><i class="icon pe-7s-tools"></i></span>
						Configuration
					</a>
					<ul class="main-nav__submenu">
						<li><a href="<?php echo Settings('Url'); ?>/admin/ranks"><i class="icon pe-7s-tools"></i><span>Grade</span></a></li>
						
					</ul>
				</li>
				<?php } ?>

				<?php $hks = mysql_query("SELECT * FROM retrophp_hk WHERE pagename = 'grade'"); $hksecu = mysql_fetch_assoc($hks); if($user['rank'] >= $hksecu['rank']) { ?>
				<?php if($pageid == 3) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php echo Settings('Url'); ?>/admin/staffs">
						<span class="main-nav__icon"><i class="icon pe-7s-star"></i></span>
						Gestion d'équipe
					</a>
				</li>
				<?php } ?>
				
				
				
					

				<?php $hks = mysql_query("SELECT * FROM retrophp_hk WHERE pagename = 'users'"); $hksecu = mysql_fetch_assoc($hks); if($user['rank'] >= $hksecu['rank']) { ?>
				<?php if($pageid == 9) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php echo Settings('Url'); ?>/admin/users">
						<span class="main-nav__icon"><i class="icon pe-7s-shopbag"></i></span>
						Gérer un Staff
					</a>
				</li>
				<?php } ?>

				<?php $hks = mysql_query("SELECT * FROM retrophp_hk WHERE pagename = 'bans'"); $hksecu = mysql_fetch_assoc($hks); if($user['rank'] >= $hksecu['rank']) { ?>
				<?php if($pageid == 4) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					
				</li>
				<?php } ?>

				

				

				<?php $hks = mysql_query("SELECT * FROM retrophp_hk WHERE pagename = 'logs'"); $hksecu = mysql_fetch_assoc($hks); if($user['rank'] >= $hksecu['rank']) { ?>
				<?php if($pageid == 7) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php echo Settings('Url'); ?>/admin/logs_site">
						<span class="main-nav__icon"><i class="icon pe-7s-server"></i></span>
						Historique du site
					</a>
				</li>

				<?php if($pageid == 8) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					
				</li>
				<?php } ?>
				
			</ul>
		</aside>
		
		<section class="content">
			<header class="main-header clearfix">
				<h1 class="main-header__title">
					<i class="icon pe-7s-home"></i>
					Administration
				</h1>
				<ul class="main-header__breadcrumb">
					<li><a style="text-decoration:none; "><?php echo SystemConfig('server_ver'); ?></a></li>
				</ul>
				<div class="main-header__date">
					<i class="icon pe-7s-date"></i>
					<span><?php echo $date." ".date('', time()); ?></span>
					<i class="pe-7s-angle-down-circle"></i>
				</div>
			</header>
			
