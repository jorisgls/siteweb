<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Logout();

$pagename = "Sécurité";
?>
<html>
<head>
    <meta charset="utf-8">
    <title><?php print $pagename; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php print URL; ?>/templates/view/css/maintenance.css?<?php print UPDATE; ?>">
</head>
<body>
    <div class="center">
        <div class="logo"></div>
        <h1>Sécurité</h1>
        <div class="container">
            Tu n'as pas le droit de te connecter sur ce compte.
        </div>
        <div class="clear"></div>
        <br>
        <footer>
<?php include("../templates/footer.php"); ?> 
        </footer>
    </div>
</body>
</html>