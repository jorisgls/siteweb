<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 1;
$pagename = "hk";
 
include("./init.hk.php");

include("./templates/header.php");
?>
<div class="row">	
				<div class="col-md-7">
					<article class="widget widget--tabbed">
						<div class="tabs">
							<input type="radio" name="t" id="tab1" checked>
							
							
							<label for="tab3" class="tabs__tab">Administrateurs</label>
							<div class="tabs__content">
								<div class="tabs__content--1">
									<?php $sql = mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 5"); while($uss = mysql_fetch_array($sql)) { ?>
									<div class="media social_msg">
										
										<div class="media-body">
											<h4 class="media-heading social_msg__heading"><?php echo $uss['username'];?> <?php if($user['facebook'] == 1) { ?><span>via</span> <span>facebook</span><?php } ?></h4>
											<small class="social_msg__meta">Inscription : <?php echo $date." ".date('H:i:s', $uss['account_created']); ?></small>
										</div>
									</div>
									<?php } ?>

								</div>

								<div class="tabs__content--2">
									<?php $sql = mysql_query("SELECT * FROM users ORDER BY RAND() LIMIT 5"); while($uss = mysql_fetch_array($sql)) { ?>
									<div class="media social_msg">
										<figure class="pull-left rounded-image social_msg__img">
											 <img src="<?php echo Settings('Avatarimage'); ?>avatarimage?figure=<?php echo $uss['look'];?>&action=&direction=2&head_direction=2" alt="user">
										</figure>
										<div class="media-body">
											<h4 class="media-heading social_msg__heading"><?php echo $uss['username'];?> <?php if($user['facebook'] == 1) { ?><span>via</span> <span>facebook</span><?php } ?></h4>
											<small class="social_msg__meta">Dernière connexion : <?php echo $date." ".date('H:i:s', $uss['last_offline']); ?></small>
										</div>
									</div>
									<?php } ?>
								</div>
								
								<div class="tabs__content--3">
									<?php $sql = mysql_query("SELECT * FROM users WHERE rank >= '8' LIMIT 5"); while($uss = mysql_fetch_array($sql)) { ?>
									<div class="media social_msg">
										<figure class="pull-left rounded-image social_msg__img">
											 <img src="<?php echo Settings('Avatarimage'); ?>avatarimage?figure=<?php echo $uss['look'];?>&action=&direction=2&head_direction=2" alt="user">
										</figure>
										<div class="media-body">
											<h4 class="media-heading social_msg__heading"><?php echo $uss['username'];?> <?php if($user['facebook'] == 1) { ?><span>via</span> <span>facebook</span><?php } ?></h4>
											<small class="social_msg__meta">
												Grade : <?php $grade = mysql_query("SELECT * FROM ranks WHERE id = '".$user['rank']."'"); while($grade = mysql_fetch_array($grade)) { ?><?php echo $grade['name']; ?><?php } ?>
												<br><br>
												Dernière connexion : <?php echo $date." ".date('H:i:s', $uss['last_offline']); ?>
											</small>
										</div>
									</div>
									<?php } ?>
								</div> 
								
							</div> 

						</div>

					</article>
				</div>


				<div class="col-md-5">
					<article class="widget no-padding--lr">
						<header class="widget__header">
							<h3 class="widget__title">MES INFORMATIONS</h3>					
						</header>
						<div class="widget__content">

							<div class="media user user--added">
								
								<div class="media-body">
									<h4 class="media-heading user__name"><?php echo $user['username']; ?></h4>
									<small class="user__location"> <?php echo $date." ".date('H:i:s', $user['account_created']); ?></small>

									<input type="checkbox" class="btn-more-check" id="more3" checked>

									<div class="accordion__details">
										
										<p>RANK <span><?php $grade = mysql_query("SELECT * FROM ranks WHERE id = '".$user['rank']."'"); while($grade = mysql_fetch_array($grade)) { ?><?php echo utf8_encode($grade['name']); ?><?php } ?></span></p>
										<p>ADRESSE EMAIL VÉRIFIÉ <span><?php if($user['mail_verified'] == 0) { ?> Non <?php } if($user['mail_verified'] == 1) { ?> Oui <?php } ?> </span></p>
										<p>ADRESSE IP <span class="color--skyblue-light"><?php echo $user['ip_last']; ?></span></p>
									</div>
								</div>

							</div>
							<div class="user__more">
							<a href="mailto:<?php echo $user['mail']; ?>" id="loadmore"><i class="pe-7s-plus"></i> <?php echo $user['mail']; ?></a>
						</div>
						</div>

					</article>
				</div>

			</div>


			</section>
<?php include("./templates/footer.php"); ?>