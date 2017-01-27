<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Session_Disconnected($_SESSION);

$pageid = 980;
$pagename = "abs";
  
include './init.hk.php';

if(isset($_POST['url']))
{
$url = safe($_POST['url'],'SQL');
if(!empty($url)) {
$bdd->exec("INSERT INTO `abs` (`url`) VALUES ('".safe($url,'SQL')."');");
$post_url = true;
} else {
$erreur = true;
}
}

if(isset($_POST['delete']))
{
$delete = safe($_POST['delete'],'SQL');
if(isset($delete)) {
$bdd->exec("DELETE FROM `abs` WHERE `id` = '".safe($delete,'SQL')."'");
$post_delete = true;
}
}

include './templates/header.php';
?>

<div class="row">

			<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Signaler une abscence</h3>
					</header>

					<div class="widget__content">
						<?php if($erreur == true) { ?>
<br>
<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="media"><figure class="pull-left alert--icon"><i class="pe-7s-close-circle"></i></figure><div class="media-body"><h3 class="alert--title">Erreur</h3><p class="alert--text">Merci de remplir le champ.</p></div></div></div>
<?php } ?>
						<?php if($post_delete == true or $post_url == true){ ?>
						<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<div class="media">
								<figure class="pull-left alert--icon">
									<i class="pe-7s-attention"></i>
								</figure>
								<div class="media-body">
									<h3 class="alert--title">Et voilà !</h3> 
									<p class="alert--text">Ton abscence a bien été prise en compte.</p>
								</div>
							</div>
						</div>
						<?php } ?>
						<form method="post">
						<p class="alert--text">Date (ou durée) de l'abscence + motif </p>
						<input type="text" class="input-text" name="url" value=""/>
						<button class="btn btn-light pull-right" type="submit">Ajouter</button>
						<div class="clearfix"></div>
						</form>

						
					</article>
				</div>

			</div>
<?php include './templates/footer.php'; ?>