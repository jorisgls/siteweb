<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 6;
$pagename = "delete_new";
  
include("./init.hk.php");
$delete = $_GET['id'];
if(isset($delete)) {
$new_s = mysql_query("SELECT * FROM retrophp_news WHERE id = '".$delete."'");
$news = mysql_fetch_assoc($new_s);
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Suppression de la new (".$news['title']."). ','".time()."')");
mysql_query("DELETE FROM retrophp_news WHERE id = '".$delete."'") or die(mysql_error());	
Redirect("".Settings('Url')."/admin/delete_new");			
}

include("./templates/header.php");
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
								<?php $new1 = mysql_query("SELECT * FROM retrophp_news ORDER BY id DESC"); while($new = mysql_fetch_array($new1)) { ?>
								<tr>
									<td><?php echo $new['title']; ?></td>
									<td><?php echo $new['snippet']; ?></td>
									<td><?php echo $date." ".date('H:i:s', $new['date']); ?></td>
									<td><?php echo $new['auteur']; ?></td>
									<td><a href="<?php echo Settings('Url'); ?>/admin/delete_new/<?php echo $new['id']; ?>" class="btn btn-red" style="text-decoration:none;">Supprimer</a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					</article>
				</div>

			</div>
<?php include("./templates/footer.php"); ?>