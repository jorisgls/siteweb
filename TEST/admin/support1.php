<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 30;
$pagename = "grade";
  
include("./init.hk.php");
if(isset($_POST['User']) && isset($_POST['Grade']))
{
$User = Securise($_POST['User']);
$Grade = Securise($_POST['Grade']);
if(isset($User) && isset($Grade)) {
$user_s = mysql_query("SELECT * FROM users WHERE username = '".$User."'");
$row = mysql_num_rows($user_s);
if($row < 1) {
$error = true;
$grade = false;
} else {
$users = mysql_fetch_assoc($user_s);
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Attribue un grade (".$users['username']."). ','".time()."')");
mysql_query("UPDATE users SET rank = '".$Grade."' WHERE id = '".$users['id']."'");	
$staffs = true;
$grade = true;
}
}
}

if(isset($_POST['Retrograde']))
{
$Retrograde = Securise($_POST['Retrograde']);
if(isset($Retrograde)) {
$user_s = mysql_query("SELECT * FROM users WHERE id = '".$Retrograde."'");
$users = mysql_fetch_assoc($user_s);
if($user['id'] != $users['id']) {
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Rétrograde (".$users['username']."). ','".time()."')");
} else {
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Un staff quitte l\'équipe (".$users['username']."). ','".time()."')");
}
mysql_query("UPDATE users SET rank = '".Settings('Rank')."' WHERE id = '".$users['id']."'");
$staffs = true;	
$retrograde = true;
}
}

include("./templates/header.php");
?>
<div class="row">

			<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">SUPPORT</h3></br>
						<h3 class="widget_title"> Merci de vous noter dans la conversation skype quand vous utilisez le support en ligne : https://chat2.olark.com
					</header>

					<div class="widget__content">
						<?php if($staffs == true){ ?>
            <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <div class="media">
                <figure class="pull-left alert--icon">
                  <i class="pe-7s-attention"></i>
                </figure>
                
              </div>
            </div>
            <?php } ?>
            <?php if($grade == false && $error == true){ ?>
            <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="media"><figure class="pull-left alert--icon"><i class="pe-7s-close-circle"></i></figure><div class="media-body"><h3 class="alert--title">Erreur</h3><p class="alert--text">Le nom de l'utilisateur est introuvable.</p></div></div></div>
            <?php } ?>
						
						
<br>
            <form method="post">
						<table class="table">
							
							<tbody>
								<?php 
								$staff = mysql_query("SELECT * FROM users WHERE rank >= '4' ORDER BY rank DESC"); while($staff_user = mysql_fetch_array($staff)) { 
							    $grades = mysql_query("SELECT * FROM ranks WHERE id = '".$staff_user['rank']."'") or die(mysql_error());
								$grade = mysql_fetch_assoc($grades);
								?>
								
								<?php } ?>
							</tbody>
						</table>
					</form>
					</article>
				</div>

			</div>
<?php include("./templates/footer.php"); ?>