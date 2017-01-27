<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
$page = 'hk';
include '../init.php';

if(empty($_SESSION)) {
include './login.php';
} else {

$Auth::Session_Disconnected($_SESSION);

$pageid = 1;
$pagename = "hk";
 
include './init.hk.php';

include './templates/header.php';
?>


				<div class="col-md-5">
					<article class="widget no-padding--lr">
						<header class="widget__header">
							<h3 class="widget__title">MES INFORMATIONS</h3>					
						</header>
						<div class="widget__content">

							<div class="media user user--added">
							
								<div class="media-body">
									<p>Pseudo :<small class="user__location"> <?php print $User->username; ?></small></p>
									<p>Dernière connexion :<small class="user__location"> <?php print date_fr("d M. Y H:i:s", $User->account_created); ?></small></p>

									<input type="checkbox" class="btn-more-check" id="more3" checked>

									<div class="accordion__details">
										
										<p>GRADE <span><?php $grades = $bdd->query("SELECT * FROM ranks WHERE id = '".$User->rank."'"); while($grade = $grades->fetch()) { ?><?php print utf8_encode($grade['name']); ?><?php } ?></span></p>
										<p>ADRESSE IP <span class="color--skyblue-light"><?php print $User->ip_last; ?></span></p></br>
										<p>NOMBRE DE POINTS <span><?php print $User->points; ?></span></p>	
										<p>TON TEST <span><?php print $User->test; ?></span></p>	
										
										
									</div>
									
									
								</div>

							</div>
							<div class="user__more">
							<a href="mailto:<?php print $User->mail; ?>" id="loadmore"><i class="pe-7s-plus"></i> <?php print $User->mail; ?></a>
						</div>
						</div>

					</article>
				</div>

			</div>


			</section>
<?php include './templates/footer.php'; } ?>