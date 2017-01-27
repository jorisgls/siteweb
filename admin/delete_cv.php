<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Session_Disconnected($_SESSION);

$pageid = 9999000;
$pagename = "delete_cv";
  
include './init.hk.php';
$delete = $_GET['id'];
if(isset($delete)) {
$new_s = $bdd->query("SELECT * FROM recruts WHERE id = '".safe($delete,'SQL')."'");
$news = $new_s->fetch(PDO::FETCH_ASSOC);
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
                            <th>Pseudo HA</th>
                            <th>Pseudo skype</th>
							<th>CV</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
							<tbody>
								<?php $new1 = $bdd->query("SELECT * FROM recruts ORDER BY id DESC"); while($new = $new1->fetch()) { ?>
								<tr>
									<td><?php print $new['title']; ?></td>
									<td><?php print $new['snippet']; ?></td>
									<td><?php print $new['body']; ?></td>
									<td><?php print date_fr("d M. Y H:i:s", $new['date']); ?></td>
									<td><a href="<?php print Settings('Url'); ?>/admin/delete_recruts" class="btn btn-red" style="text-decoration:none;">NON SELECTIONNE</a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					</article>
				</div>

			</div>
<?php include './templates/footer.php'; ?>