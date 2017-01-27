<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Session_Disconnected($_SESSION);

$pageid = 7;
$pagename = "logs";
  
include './init.hk.php';

include './templates/header.php';
?>
<div class="row">

			<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Historiques des opération</h3>
					</header>

					<div class="widget__content">
						<table class="table">
							<thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                        </thead>
							<tbody>
								<?php $logs = $bdd->query("SELECT * FROM retrophp_stafflog ORDER BY id DESC LIMIT 15"); while($logs_user = $logs->fetch()) { ?>
								<tr>
									<td><?php print $logs_user['pseudo']; ?></td>
									<td><?php print $logs_user['action']; ?></td>
									<td><?php print date_fr("d M. Y H:i:s", $logs_user['date']); ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					</article>
				</div>

			</div>
<?php include './templates/footer.php'; ?>