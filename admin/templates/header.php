<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administration</title>
	<link href="<?php print URL; ?>/admin/css/bootstrap/bootstrap.min.css?<?php print UPDATE; ?>" rel="stylesheet" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="<?php print URL; ?>/admin/css/jquery-jvectormap-1.2.2.css?<?php print UPDATE; ?>"/>
	<link href="<?php print URL; ?>/admin/css/style.css?<?php print UPDATE; ?>" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

</head>
<body>

	<header class="top-bar">
		<a class="mobile-nav" href="#"><i class="pe-7s-menu"></i></a>
		<div class="main-logo"><span><?php print Settings('Name'); ?></span></div>
		<?php if(Settings('Maintenance') == 'true') { ?>
		<input type="checkbox" id="s-logo" class="sw" disabled checked/>
		<label class="switch switch--dark switch--header" for="s-logo"></label>
		<?php } if(Settings('Maintenance') == 'false') { ?>
		<input type="checkbox" id="s-logo" class="sw" disabled/>
		<label class="switch switch--dark switch--header" for="s-logo"></label>
		<?php } ?>
		
		<div class="main-search">
			<form method="post" action="users" autocomplete="off">
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
						<img class="media-object" src="<?php print Settings('Avatarimage'); ?>avatarimage?figure=<?php print $User->look; ?>&action=&direction=2&head_direction=2" alt="user">
					</figure>
					<span class="profile__name">
						<span><?php print $User->username; ?></span> <i class="pe-7s-angle-down"></i>
					</span>
				</a>
				<ul class="dropdown-menu pull-right">
					<li><a href="<?php print URL; ?>/account/logout"><i class="icon pe-7s-close-circle"></i> Déconnexion</a></li>
				</ul>
			</li>
			<?php if($User->rank >= 10) { ?>
			<li>
				<a href="<?php print URL; ?>/admin/site">
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
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/">
						<span class="main-nav__icon"><i class="icon pe-7s-home"></i></span>
						Accueil
					</a>
				</li>
				
				
				
			
			
				<li>
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'config'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 2) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/site">
						<span class="main-nav__icon"><i class="icon pe-7s-tools"></i></span>
						Website 
					</a>
					
				</li>
				<?php } ?>
			
			
			
			
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'grade'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 3) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/staffs">
						<span class="main-nav__icon"><i class="icon pe-7s-star"></i></span>
						Gestion d'équipe
					</a>
				</li>
				<?php } ?>
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'abs'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 980) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/abs">
						<span class="main-nav__icon"><i class="icon pe-7s-star"></i></span>
						Signaler une abscence
					</a>
				</li>
				<?php } ?>
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'absgestion'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 9800) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/absgestion">
						<span class="main-nav__icon"><i class="icon pe-7s-star"></i></span>
						Gérer les abscences
					</a>
				</li>
				<?php } ?>
				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'users'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 9) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/users">
						<span class="main-nav__icon"><i class="icon pe-7s-shopbag"></i></span>
						Staff
					</a>
				</li>
				<?php } ?>
				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'retrophp_fansites'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 98) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/fansites">
						<span class="main-nav__icon"><i class="icon pe-7s-shopbag"></i></span>
						Gérer les actus
					</a>
				</li>
				<?php } ?>
			
				
				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'news'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 5) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/new">
						<span class="main-nav__icon"><i class="icon pe-7s-photo-gallery"></i></span>
						Poster un article
					</a>
				</li>
				<?php } ?>
			
				
				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'delete_new'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 6) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/delete_new">
						<span class="main-nav__icon"><i class="icon pe-7s-trash"></i></span>
						Supprimer un article
					</a>
				</li>
				<?php } ?>
				
				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'delete_support'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 99990) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/delete_support">
						<span class="main-nav__icon"><i class="icon pe-7s-trash"></i></span>
						Gestion support
					</a>
				</li>
				<?php } ?>
			
				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'delete_cv'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 9999000) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/delete_cv">
						<span class="main-nav__icon"><i class="icon pe-7s-trash"></i></span>
						Gestion des cv's
					</a>
				</li>
				<?php } ?>
			
				
				
				
				
				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'delete_new'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 102) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/alertes">
						<span class="main-nav__icon"><i class="icon pe-7s-trash"></i></span>
						Alerte accueil
					</a>
				</li>
				<?php } ?>
			
				
				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'annonce'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 19) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/annonce">
						<span class="main-nav__icon"><i class="icon pe-7s-photo-gallery"></i></span>
						Lancer une annonce
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

				
				
				
				
				
				
				
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'logs'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 7) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/admin/logs_site">
						<span class="main-nav__icon"><i class="icon pe-7s-home"></i></span>
						Historique du site
					</a>
				</li>

				
				<?php } ?>
				
				
				<?php $hks = $bdd->query("SELECT * FROM retrophp_hk WHERE pagename = 'deco'"); $hksecu = $hks->fetch(PDO::FETCH_ASSOC); if($User->rank >= $hksecu['rank']) { ?>
				<?php if($pageid == 790) { ?>
				<li class="main-nav--active">
				<?php } else { ?> 
				<li class="main-nav--collapsible">
				<?php } ?>
					<a class="main-nav__link" style="text-decoration:none;" href="<?php print URL; ?>/account/logout">
						<span class="main-nav__icon"><i class="icon pe-7s-home"></i></span>
						Déconnexion
					</a>
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
				
				<div class="main-header__date">
					<i class="icon pe-7s-date"></i>
					<span><?php print date_fr("d M. Y", time()); ?></span>
					<i class="pe-7s-angle-down-circle"></i>
				</div>
			</header>
			
			