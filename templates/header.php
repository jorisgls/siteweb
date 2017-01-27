<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />

<link href="/jquery-ui.min.css" rel="stylesheet">
<script src="/jquery-ui.min.js"></script>

<div class="header" style="z-index: 10;padding-top: 12px;">
<div class="container" style="width: 950px;">
</br>

<center><p><img src="/logo.png" alt="" /></p></center>











<div class="clear"></div>
<ul class="nav nav-tabs" style="top: 11px;position: relative;z-index: 10;">





<li class="<?php if($pageid == 'accueil' || $pageid == 'settings') { ?>active<?php } ?>">
	<a href="<?php echo URL; ?>/me" data-toggle="tab" aria-expanded="false">
		<span class="glyphicon glyphicon-check" aria-hidden="true"></span> Accueil</a>
</li>

<li class="<?php if($pageid == 'community' || $pageid == 'news' || $pageid == 'staffs' || $pageid == 'site') { ?>active<?php } ?>">
	<a href="<?php echo URL; ?>/site" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Alphanews</a>
</li>

<li class="<?php if($pageid == 'staff') { ?>active<?php } ?>">
	<a href="<?php echo URL; ?>/staff.php" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-education" aria-hidden="true"></span> Notre équipe</a>
</li>


<li class="<?php if($pageid == 'support') { ?>active<?php } ?>">
	<a href="<?php echo URL; ?>/support/new.php" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Support</a>
</li>

<li class="<?php if($pageid == 'recrutements') { ?>active<?php } ?>">
	<a href="<?php echo URL; ?>/recrutements" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Recrutement</a>
</li>



<?php if ($User->rank >= '7') { ?>
<li class="">
	<a href="<?php echo URL; ?>/management" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> <b>MANAGEMENT</b></a>
</li>
<?php } ?>




</ul>





<script>
<?php
session_start();
// Connexion à MySQL
mysql_connect("localhost", "root", "");
mysql_select_db("siteweb");
 
// ÉTAPE 1 : vérifie si l'IP se trouve déjà dans la table.
// Pour faire ça, compter le nombre d'entrées dont le champ "ip" est l'adresse IP du visiteur.
$precedent = mysql_query('SELECT COUNT(*) AS entrees FROM connexions WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
$donnee = mysql_fetch_array($precedent);
$precedent = mysql_query('SELECT COUNT(*) AS entrees FROM connexions WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
 
if ($donnee['entrees'] == 0) // L'IP ne se trouve pas dans la table, ajouter IP.
{
    mysql_query('INSERT INTO connexions VALUES(\'' . $_SERVER['REMOTE_ADDR'] . '\', ' . time() . ')');
}
else 
{
    $requete = mysql_query('SELECT ban FROM connexions WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
$result = mysql_fetch_array($requete);
$ban = $result['ban']; // dans ban tu as la valeur
echo 'ban='.$ban;
if ( $ban == 1 ) { // Acces refuse

  header('Location: /index.html');
  exit();

}
}
// ÉTAPE 2 : compte le nombre d'IP stockées dans la table.
$precedent = mysql_query('SELECT COUNT(*) AS entrees FROM connexions');
$donnee = mysql_fetch_array($precedent);
 
 
?>
</script>









<a href="/admin"><img src="/tool1.png" alt="tool1.png" id="imageTool1" /></a>



 <style>
#imageTool1{
position : absolute;
top : 200px;
left : px;
bottom : 20px;
right : 1500px;
}
</style>


 
</div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
  $( "#imageTool1" ).draggable({
    start: function() {
     console.log('test');
    },
    drag: function() {
     console.log('toto');
    },
    stop: function() {

    }
  });
 });
</script>