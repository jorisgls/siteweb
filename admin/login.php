<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

if(isset($_POST['username']) && isset($_POST['password'])){
        if(!empty($_POST['username']) || !empty($_POST['password'])) {
            $password = isset($_POST['password']) ? Hashage($_POST['password']) : '';
            $username = isset($_POST['username']) ? safe($_POST['username'],'SQL') : '';
            $Auth::Login($username, $password, $admin = 'true');
        }else{
            $erreurmess = 'Merci de remplir les champs vides.' AND $erreurc = true;
        }
}
?>
<!DOCTYPE html> 
<html  lang="fr">
<head>

<meta charset="UTF-8">
<title>Administration</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>


    <body>
    <link href="<?php print Settings('Url'); ?>/admin/css/login/bootstrap.min.css?<?php print $update; ?>" rel="stylesheet">
    <link href="<?php print Settings('Url'); ?>/admin/css/login/bootstrap-reset.css?<?php print $update; ?>" rel="stylesheet">
    <link href="<?php print Settings('Url'); ?>/admin/css/login/style.css?<?php print $update; ?>" rel="stylesheet">

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading"><?php if($erreurc == true) { print $erreurmess; } else { ?>Connectez-vous...<?php } ?></h2>
                        <div class="login-wrap">
            <input type="text" name="username" class="form-control" placeholder="Adresse email" value="">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            <button class="btn btn-lg btn-login btn-block" name="submit" value="Connexion" type="submit">Connexion</button>
        </div>

      </form>

    </div>
