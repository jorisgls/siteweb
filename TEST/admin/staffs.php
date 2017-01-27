<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 3;
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
						<h3 class="widget__title">Gestion d'équipe</h3>
					</header>

					<div class="widget__content">
						<?php if($staffs == true){ ?>
            <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <div class="media">
                <figure class="pull-left alert--icon">
                  <i class="pe-7s-attention"></i>
                </figure>
                <div class="media-body">
                  <h3 class="alert--title">C'est fait !</h3> 
                  <?php if($retrograde == true){ ?>
                  <p class="alert--text">L'utilisateur à bien été rétrogradé.</p>
                  <?php } ?>
                  <?php if($grade == true){ ?>
                  <p class="alert--text">Grade attribué à l'utilisateur.</p>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php if($grade == false && $error == true){ ?>
            <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="media"><figure class="pull-left alert--icon"><i class="pe-7s-close-circle"></i></figure><div class="media-body"><h3 class="alert--title">Erreur</h3><p class="alert--text">Le nom de l'utilisateur est introuvable.</p></div></div></div>
            <?php } ?>
						<form method="post">
<input type="text" value="" name="User" class="input-text" placeholder="Pseudo" />
<br/>
						<div class="dropdown">
							<select name="Grade" class="dropdown-select">
								<?php $ranks = mysql_query("SELECT * FROM ranks LIMIT ".$user['rank'].""); while($rank = mysql_fetch_array($ranks)) { ?>
								<option value="<?php echo $rank['id']; ?>"><?php echo utf8_encode($rank['name']); ?></option>
								<?php } ?>
							</select>
						</div>
<input type="submit" value="Attribuer le grade" class="btn btn-light pull-right"/>
<div class="clearfix"></div>
</form>
<br>
            <form method="post">
						<table class="table">
							<thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>Grade</th>
                            <th>Dernière connexion</th>
                            <th>Action</th>
                        </tr>
                        </thead>
							<tbody>
								<?php 
								$staff = mysql_query("SELECT * FROM users WHERE rank >= '4' ORDER BY rank DESC"); while($staff_user = mysql_fetch_array($staff)) { 
							    $grades = mysql_query("SELECT * FROM ranks WHERE id = '".$staff_user['rank']."'") or die(mysql_error());
								$grade = mysql_fetch_assoc($grades);
								?>
								<tr>
									<td><?php echo $staff_user['username']; ?></td>
									<td><?php echo utf8_encode($grade['name']); ?> (<?php echo $staff_user['rank']; ?>)</td>
									<td><?php echo $date." ".date('H:i:s', $staff_user['last_offline']); ?></td>
									<?php if($user['rank'] >= 9 && $staff_user['rank'] <= 9) { ?>
									<td><button class="btn btn-red" type="submit" name="Retrograde" value="<?php echo $staff_user['id']; ?>">Retrograder</button></td>
									<?php } else { ?>
									<?php if($user['id'] != $staff_user['id']) { ?>
									<td><a class="btn btn-green">Admirer</a></td>
									<?php } else { ?>
									<td><button class="btn btn-red" type="submit" name="Retrograde" value="<?php echo $staff_user['id']; ?>">Quitter</button></td>
									<?php }} ?>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</form>
					</article>
				</div>

			</div>
<?php include("./templates/footer.php"); ?>