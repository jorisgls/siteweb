<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

$pageid = "ban";
include '../init.php';

$Auth::Logout();

$pagename = "Exclusion";
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
        <h1>Exclusion</h1>
        <div class="container">
            Tu as été exclu(e) de <?php print Settings('Name'); ?>.
        </div>
        <div class="clear"></div>
        <br>
        <footer>
<?php include("../templates/footer.php"); ?> 
        </footer>
    </div>
</body>
</html>