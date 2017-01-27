<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Session_Disconnected($_SESSION);

$pageid = 9;
$pagename = "chatlogs";
  
include './init.hk.php';

include './templates/header.php';
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
$pseudo = safe($_POST['pseudo'],'SQL');

$usid = $bdd->query("SELECT * FROM users WHERE username = '".safe($pseudo,'SQL')."'");
$row = $usid->rowCount();
if($row < 1) {
?>
<br>
<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><div class="media"><figure class="pull-left alert--icon"><i class="pe-7s-close-circle"></i></figure><div class="media-body"><h3 class="alert--title">Erreur</h3><p class="alert--text">Le nom de l'utilisateur est introuvable.</p></div></div></div>
<?php } else {
$usid = $usid->fetch(PDO::FETCH_ASSOC);
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
$ms = $bdd->query("SELECT * FROM ".$ChatLogSQL." WHERE user_id = '".safe($usid['id'],'SQL')."' LIMIT 0,100");
while($ms1 = $ms->fetch()) {

$roomid = $bdd->query("SELECT * FROM ".$RoomSQL." WHERE id = '".safe($ms1['room_id'],'SQL')."'");
$roomid1 = $roomid->fetch(PDO::FETCH_ASSOC);
?>
<tr>
<td><?php print $usid['username']; ?></td>
<td><?php print $ms1['message']; ?></td>
<?php if($roomid1['caption'] != '') { ?><td><?php print $roomid1['caption']; ?> (ID: <?php print $roomid1['id']; ?>)</td><?php } else { ?><td class="bg--red"><b>L'appart n'existe plus</b></td><?php } ?>
<td><?php print date_fr("d M. Y H:i:s", $ms1['timestamp']); ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php }} ?>
</article>
</div></div>
<?php include './templates/footer.php'; ?>