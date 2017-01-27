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

<?php
  header('Location: /recruts/recrutements');
  exit();
?>
<?php include './templates/footer.php'; } ?>