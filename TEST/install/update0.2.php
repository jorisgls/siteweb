<?php
include("../includes/settings.inc.php");

if(isset($_POST['update'])) {
$requete = mysql_query("SHOW TABLES LIKE 'retrophp_settings'")or die(mysql_error());
if(mysql_num_rows($requete) == 1)
{
mysql_query("CREATE TABLE IF NOT EXISTS `retrophp_hk` (
`id` int(11) unsigned NOT NULL,
  `pagename` varchar(25) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '7',
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;");

mysql_query("INSERT INTO `retrophp_hk` (`id`, `pagename`, `rank`, `nom`) VALUES
(1, 'hk', 7, 'Accueil'),
(2, 'bans', 7, 'Banni'),
(3, 'chatlogs', 7, 'Chatlog'),
(4, 'delete_new', 8, 'Gestion d''article'),
(5, 'logs', 7, 'Historique'),
(6, 'new', 8, 'Post d''article'),
(7, 'config', 10, 'Configuration'),
(8, 'grade', 9, 'Rank'),
(9, 'users', 7, 'Utilisateur');");

mysql_query("ALTER TABLE `retrophp_hk`
 ADD PRIMARY KEY (`id`);");

mysql_query("ALTER TABLE `retrophp_hk`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;");

mysql_close();

$valide = true;
} else { 
$error = true;
}
}

$do2 = isset($_GET['supp']); if($do2 == "true") {
unlink("update0.2.php");
@header("Location: ../");
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mise à jour du CMS</title>

    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .box {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
      }

    </style>
  </head>

  <body>

    <div class="container">

      <div class="box">
        <?php if(isset($valide) == true) { ?><p style="color: green;">Félicitation !</p><?php } ?>
        <?php if(isset($error) == true) { ?><p style="color: red;">Votre base de donnée ne contient pas de tables. Importez les tables avant de continuer.</p><?php } ?>
         <?php if(isset($valide) == true) { ?> 
         Le SQL contenant les données pour le fonctionnement du CMS a bien été importer.
         <br><br>
         <center><a href="../" class="btn btn-large btn-warning" type="submit">Accéder à mon site</a><br><br><a href="?supp=true" class="btn btn-large btn-danger" type="submit">Supprimer le fichier</a></center>
         <?php } else { ?>
         Importation du SQL qui permettra l'utilisation du CMS.
        <center>
          <form method="post">
          <br>
          <input class="btn btn-large btn-primary" name="update" type="submit" value="Effectuer la mise à jour">
          </form>
        </center>
        <?php } ?>
      </div>

    </div> 

  </body>
</html>
