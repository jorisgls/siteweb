<?php
include("../init.php");
include("../includes/files/session.disconnect.php");

$do2 = $_GET['s']; if($do2 == "1") { 
echo $nb_inscrit['id'];
}
$do2 = $_GET['s']; if($do2 == "2") { 
echo $nb_bans['id'];
}
$do2 = $_GET['s']; if($do2 == "3") { 
echo $nb_visites['id'];
}
$do2 = $_GET['s']; if($do2 == "4") { 
echo $online['id'];
}
$do2 = $_GET['s']; if($do2 == "5") { 
echo SystemConfig('record_connect');
} 

$do2 = $_GET['progress']; if($do2 == "inscrit") { ?>
<div class="progress-bar progress-bar--skyblue" role="progressbar" aria-valuenow="<?php echo $nb_inscrit['id']; ?>" aria-valuemin="0" aria-valuemax="1000" style="width: <?php echo $nb_inscrit['id'] / 50; ?>%;"></div>
<?php } $do2 = $_GET['progress']; if($do2 == "online") { ?>
<div class="progress-bar progress-bar--anzac" role="progressbar" aria-valuenow="<?php echo $online['id']; ?>" aria-valuemin="0" aria-valuemax="<?php echo SystemConfig('record_connect'); ?>" style="width: <?php echo $online['id']; ?>%;"></div>
<?php } $do2 = $_GET['progress']; if($do2 == "visite") { ?>
<div class="progress-bar progress-bar--green" role="progressbar" aria-valuenow="<?php echo $nb_visites['id']; ?>" aria-valuemin="0" aria-valuemax="50000" style="width: <?php echo $nb_visites['id'] / 50; ?>%;"></div>
<?php } $do2 = $_GET['progress']; if($do2 == "record") { ?>
<div class="progress-bar progress-bar--red" role="progressbar" aria-valuenow="<?php echo SystemConfig('record_connect'); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo SystemConfig('record_connect'); ?>%;"></div>
<?php } ?>