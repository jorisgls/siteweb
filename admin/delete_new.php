<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Session_Disconnected($_SESSION);

$pageid = 6;
$pagename = "delete_new";
  
include './init.hk.php';
$delete = $_GET['id'];
if(isset($delete)) {
$new_s = $bdd->query("SELECT * FROM retrophp_news WHERE id = '".safe($delete,'SQL')."'");
$news = $new_s->fetch(PDO::FETCH_ASSOC);
$bdd->exec("DELETE FROM retrophp_news WHERE id = '".safe($delete,'SQL')."'");	
$User->AddLogs($User->username,'Suppression de la new ('.safe($news['title'],'SQL').').');
Redirect(Settings('Url')."/admin/delete_new");			
}

include './templates/header.php';
?>
<div class="row">

			<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Gestion des news</h3>
					</header>

					<div class="widget__content">
						<table class="table">
							<thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Par</th>
                            <th>Action</th>
                        </tr>
                        </thead>
							<tbody>
								<?php $new1 = $bdd->query("SELECT * FROM retrophp_news ORDER BY id DESC"); while($new = $new1->fetch()) { ?>
								<tr>
									<td><?php print $new['title']; ?></td>
									<td><?php print $new['snippet']; ?></td>
									<td><?php print date_fr("d M. Y H:i:s", $new['date']); ?></td>
									<td><?php print $new['auteur']; ?></td>
									<td><a href="<?php print Settings('Url'); ?>/admin/delete_new/<?php print $new['id']; ?>" class="btn btn-red" style="text-decoration:none;">Supprimer</a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					</article>
				</div>

			</div>
<?php include './templates/footer.php'; ?>