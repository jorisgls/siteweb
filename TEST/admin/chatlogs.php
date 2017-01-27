<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 9;
$pagename = "chatlogs";
  
include("./init.hk.php");

include("./templates/header.php");
?>
<div class="row">
<div class="col-md-12">
				<article class="widget">
					<header class="widget__header">
						<h3 class="widget__title">Chatlogs</h3>
					</header>
					<div class="widget__content">
<form method="post">
<input type="text" value="" name="pseudo" class="input-text" placeholder="Pseudo" />
<br/>
<input type="submit" value="Rechercher les messages d'un joueur" class="btn btn-light pull-right"/>
<div class="clearfix"></div>
</form>
<?php
if(isset($_POST['pseudo']))
{
$pseudo = $_POST['pseudo'];

$usid = mysql_query("SELECT * FROM users WHERE username = '".$pseudo."'");
$row = mysql_num_rows($usid);
if($row < 1) { ?>
<br>
<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="media"><figure class="pull-left alert--icon"><i class="pe-7s-close-circle"></i></figure><div class="media-body"><h3 class="alert--title">Erreur</h3><p class="alert--text">Le nom de l'utilisateur est introuvable.</p></div></div></div>
<?php } else {
$usid = mysql_fetch_assoc($usid);
?>
<br>
<table class="table">
<thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>Message</th>
                            <th>Appart</th>
                            <th>Date</th>
                        </tr>
                        </thead>
<tbody>
<?php
if(Settings('Emulator') != "Azure") {
$ms = mysql_query("SELECT * FROM chatlogs WHERE user_id = '".$usid['id']."' LIMIT 0,100");
} else {
$ms = mysql_query("SELECT * FROM users_chatlogs WHERE user_id = '".$usid['id']."' LIMIT 0,100");
}
while($ms1 = mysql_fetch_array($ms)) {

if(Settings('Emulator') != "Azure") {
$roomid = mysql_query("SELECT * FROM rooms WHERE id = '".$ms1['room_id']."'");
} else {
$roomid = mysql_query("SELECT * FROM rooms_data WHERE id = '".$ms1['room_id']."'");
}
$roomid1 = mysql_fetch_assoc($roomid);
?>
<tr>
<td><?php echo $usid['username']; ?></td>
<td><?php echo $ms1['message']; ?></td>
<?php if($roomid1['caption'] != '') { ?><td><?php echo $roomid1['caption']; ?> (ID: <?php echo $roomid1['id']; ?>)</td><?php } else { ?><td class="bg--red"><b>L'appart n'existe plus</b></td><?php } ?>
<td><?php echo $date." ".date('H:i:s', $ms1['timestamp']); ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php }} ?>
</article>
				</div></div>
<?php include("./templates/footer.php"); ?>