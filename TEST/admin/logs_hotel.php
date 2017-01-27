<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 8;
$pagename = "logs";
  
include("./init.hk.php");

include("./templates/header.php");
?>
<div class="row">

			<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Historiques des commandes</h3>
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
								<?php if(Settings('Emulator') != "Azure") { $logs = mysql_query("SELECT * FROM staff_logs ORDER BY id DESC LIMIT 15"); } else { $logs = mysql_query("SELECT * FROM server_stafflogs ORDER BY id DESC LIMIT 15"); }while($logs_user = mysql_fetch_array($logs)) { ?>
								<tr>
									<td><?php echo $logs_user['staffuser']; ?></td>
									<td><?php echo $logs_user['description']; ?></td>
									<td><?php echo $date." ".date('H:i:s', $logs_user['time']); ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					</article>
				</div>

			</div>
<?php include("./templates/footer.php"); ?>