<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

$pageid = "index";
require_once './init.php';

require_once './includes/files/register.php';

$Auth::Session_Connected($_SESSION);

$pagename = "Inscription";
?>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo Settings('Name'); ?>: <?php echo $pagename; ?> </title>

<link href="<?php echo URL; ?>/web/styles/style.css?1337" rel="stylesheet" type="text/css">
<link href="https://bootswatch.com/lumen/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/bootstrap-social.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/font-awesome.css" rel="stylesheet">
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">

</head>
<body style="background-color: rgba(232, 232, 232, 0.57);">
<div id="overlay"></div>
<div class="header" style="height: 56px;">
<div class="container" style="width: 950px;">
<a href="<?php echo URL; ?>"><div class="logotipo" style="width: 82px; float: left; height: 34px; font-size: 37px; font-family: 'Pacifico', cursive; top: 0px; position: absolute;"><?php echo Settings('Name'); ?></div></a>


<div class="clear"></div>
</div>
</div> <div style="clear:both;"></div>
<div class="container" style="width: 950px;">

<?php if(isset($erreurmess)) { ?>
<div class="alert alert-dismissible alert-warning" style="display:block;"><a href="<?php echo URL; ?>/register" type="button" class="close" data-dismiss="alert">x</a><strong>Oops!</strong> <?php echo $erreurmess; ?></div>
<?php } ?>
<div class="panel panel-default" style="padding: 8px;">
<form class="form-horizontal" method="POST">
                <fieldset>
                    
                    
                    <div class="form-group">
                        <label for="inputUsername" class="col-lg-4 control-label">Pseudo</label>
                        
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="bean_name" id="inputUsername" placeholder="Pseudonyme...">
                            <i class="glyphicon glyphicon-user form-control-feedback" style="right: 10px;"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-4 control-label">Mot de passe provisoire</label>
                        
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="bean_password" id="inputPassword" placeholder="Mot de passe...">
                            <i class="glyphicon glyphicon-lock form-control-feedback" style="right: 10px;"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword2" class="col-lg-4 control-label">Confirmation du mot de passe</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="bean_repassword" id="inputPassword2" placeholder="Confirme ton mot de passe...">
                            <i class="glyphicon glyphicon-lock form-control-feedback" style="right: 10px;"></i>
                        </div>
                    </div>
            
                    
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-4 control-label">Adresse email</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="bean_email" id="inputEmail" placeholder="Adresse email...">
                            <i class="glyphicon glyphicon-envelope form-control-feedback" style="right: 10px;"></i>
                        </div>
                    </div>
            
                        <div class="col-lg-8 col-lg-offset-4">
                            <a href="<?php echo URL; ?>" class="btn btn-default">Retour</a>
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </fieldset></form></div>

<div style="clear:both;"></div>
﻿
<?php include_once './templates/footer.php'; ?>

</div>
</body>
</html>