<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 4;
$pagename = "bans";
  
include("./init.hk.php");

if(isset($_POST['deban']))
{
$deban = Securise($_POST['deban']);
if(isset($deban)) {
mysql_query("DELETE FROM bans WHERE value = '".$deban."'");
if(Settings('Emulator') == "Azure") {
mysql_query("DELETE FROM users_bans WHERE value = '".$deban."'");
}
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Dé-bannissement (".$deban."). ','".time()."')");	
$post_deban = true;			
}	
}

include("./templates/header.php");
?>
<div class="row">
			<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Listes des joueurs bannis...</h3>
					</header>
<?php if($post_deban == true){ ?>
				<div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<div class="media">
								<figure class="pull-left alert--icon">
									<i class="pe-7s-attention"></i>
								</figure>
								<div class="media-body">
									<h3 class="alert--title">C'est fait !</h3> 
									<p class="alert--text">Le dé-bannissement du joueur <?php echo $deban; ?> a bien été prise en compte.</p>
								</div>
							</div>
						</div>
						<?php } ?>
					<div class="widget__content">
						<table class="table">
							<thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>Motif</th>
                            <th>Banni par</th>
                            <th>Expiration</th>
                            <th>Action</th>
                        </tr>
                        </thead>
							<tbody>
								<?php $bans = mysql_query("SELECT * FROM bans ORDER BY id DESC"); while($ban_user = mysql_fetch_array($bans)) { ?>
								<tr>
									<td><?php echo $ban_user['value']; ?></td>
									<td><?php echo $ban_user['reason']; ?></td>
									<td><?php echo $ban_user['added_by']; ?></td>
									<td><?php echo $date." ".date('H:i:s', $ban_user['expire']); ?></td>
									<form method="post">
									<td><button class="btn btn-red" type="submit" name="deban" value="<?php echo $ban_user['value']; ?>">Débannir</button></td>
								</form>
								</tr>
								<?php } ?>

								<?php if(Settings('Emulator') == "Azure") { $bans = mysql_query("SELECT * FROM users_bans ORDER BY id DESC"); while($ban_user = mysql_fetch_array($bans)) { ?>
								<tr>
									<td><?php echo $ban_user['value']; ?></td>
									<td><?php echo $ban_user['reason']; ?></td>
									<td><?php echo $ban_user['added_by']; ?></td>
									<td><?php echo $date." ".date('H:i:s', $ban_user['expire']); ?></td>
									<form method="post">
									<td><button class="btn btn-red" type="submit" name="deban" value="<?php echo $ban_user['value']; ?>">Débannir</button></td>
								</form>
								</tr>
								<?php }} ?>
							</tbody>
						</table>

					</article>
				</div>

			</div>
<?php include("./templates/footer.php"); ?>