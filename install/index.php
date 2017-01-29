<?php
define('INSTALL','INSTALL');
define('URL','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

require 'init.install.php';
require 'files/mysql.php';
require 'files/step.php';
?>
<!DOCTYPE html>
<html class="bootstrap-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RetroPHP - Installation</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
  <link type="text/css" href="<?php print URL; ?>assets/css/style.min.css" rel="stylesheet">

</head>

<body class="layout-container ls-top-navbar si-l3-md-up">

  <nav class="navbar navbar-dark bg-primary navbar-full navbar-fixed-top">

    <a href="<?php print URL; ?>" class="navbar-brand"><i class="material-icons">dvr</i> RetroPHP</a>

   <ul class="nav navbar-nav pull-xs-right">
    <small><b>RetroPHP</b> ne prend désormais pas en compte les divers problèmes que vous pouvez rencontrer sur votre CMS si celui-ci n'a pas été acheté sur le site.</small>
   </ul>


  </nav>
  <div class="sidebar sidebar-left sidebar-light sidebar-visible-md-up si-si-3 ls-top-navbar-xs-up sidebar-transparent-md" id="sidebarLeft" data-scrollable>
    <div class="sidebar-heading">Installation</div>
    <ul class="sidebar-menu">
          <li class="sidebar-menu-item active">
        <a class="sidebar-menu-button" href="<?php print URL; ?>">
          <i class="sidebar-menu-icon material-icons">home</i> Accueil
        </a>
      </li>
    </ul>
    <div class="sidebar-heading">RetroPHP</div>
    <ul class="sidebar-menu">
      <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="http://www.retrophp.com#cms" target="_black">
          <i class="sidebar-menu-icon material-icons">search</i> CMS
        </a>
      </li>

       <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="https://www.facebook.com/profile.php?id=100008418190586" target="_black">
          <i class="sidebar-menu-icon material-icons">mail</i> Contact
          <span class="sidebar-menu-label label label-info">Tyler</span>
        </a>
      </li>

      <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="http://www.retrophp.com/cms/<?php print $cms; ?>" target="_black">
          <i class="sidebar-menu-icon material-icons">shopping_cart</i> Acheter
          <span class="sidebar-menu-label label label-info"><?php print $cms; ?></span>
        </a>
      </li>

    </ul>

  </div>

  <div class="layout-content" data-scrollable>
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li><a href="<?php print URL; ?>">Accueil</a></li>
        <li class="active">Configuration</li>
      </ol>

      <div class="card">
        <ul class="nav nav-tabs">
          <li class="nav-item">
          	<?php if(@$VerifMySQL != true) { ?>
          	<a class="nav-link active" href="#etape1" data-toggle="tab">Base de données</a>
          	<?php } else { ?>
          	<a class="nav-link"><strike>Base de données</strike></a>
          	<?php } ?>
          </li>
          <li class="nav-item">
          <?php if(@$Etape == 2) { ?>
          <a class="nav-link active" href="#etape2" data-toggle="tab">Installation</a>
          <?php } else { ?>
          <a class="nav-link"><?php if(@$Etape > 2) { ?><strike><?php } ?>Installation<?php if(@$Etape > 2) { ?></strike><?php } ?></a>
          <?php } ?>
          </li>
          <li class="nav-item">
          <?php if(@$Etape == 3) { ?>
            <a class="nav-link active" href="#etape3" data-toggle="tab">Configuration du site</a>
            <?php } else { ?>
            <a class="nav-link"><?php if(@$Etape > 3) { ?><strike><?php } ?>Configuration du site<?php if(@$Etape > 4) { ?></strike><?php } ?></a>
            <?php } ?>
          </li>
          <!--<li class="nav-item">
          <?php if(@$Etape == 4) { ?>
            <a class="nav-link active" href="#etape4" data-toggle="tab">Création d'un compte</a>
            <?php } else { ?>
            <a class="nav-link"><?php if(@$Etape > 4) { ?><strike><?php } ?>Création d'un compte<?php if (@$Etape > 4) { ?></strike><?php } ?></a>
            <?php } ?>
          </li>-->
          <li class="nav-item">
          <?php if(@$Etape == 5) { ?>
            <a class="nav-link active" href="#etape5" data-toggle="tab">Vérification/Update</a>
            <?php } else { ?>
            <a class="nav-link"><?php if(@$Etape > 5) { ?><strike><?php } ?>Vérification/Update<?php if(@$Etape > 4) { ?></strike><?php } ?></a>
            <?php } ?>
          </li>
        </ul>
        <div class="p-a-2 tab-content">
          <div class="tab-pane<?php if($VerifMySQL != true) { ?> active<?php } ?>" id="etape1">
            <form class="form-horizontal" method="post">
            <?php if(isset($message)) { ?>
            <div class="alert alert-danger" role="alert">
            <strong>Attention!</strong> <?php print $message; ?>
          </div>
          <?php } ?>
              <div class="form-group row">
                <label for="website" class="col-sm-3 form-control-label">Adresse de la base de données</label>
                <div class="col-sm-6 col-md-8">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">language</i>
							</span>
                    <input type="text" class="form-control" name="host" <?php if(isset($_POST['host'])){ ?>value="<?php print $_POST['host']; ?>"<?php } else { ?>value="localhost"<?php } ?>>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="website" class="col-sm-3 form-control-label">Identifiant</label>
                <div class="col-sm-6 col-md-8">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">account_box</i>
							</span>
                    <input type="text" class="form-control" name="username" <?php if(isset($_POST['username'])){ ?>value="<?php print $_POST['username']; ?>"<?php } ?> placeholder="Identifiant">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="website" class="col-sm-3 form-control-label">Nom de la base de données</label>
                <div class="col-sm-6 col-md-8">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon2">
								<i class="material-icons md-18 text-muted">tab</i>
							</span>
                    <input type="text" class="form-control" name="database" <?php if(isset($_POST['database'])){ ?>value="<?php print $_POST['database']; ?>"<?php } ?> placeholder="Nom de la base de données">
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-sm-3 form-control-label">Mot de passe</label>
                <div class="col-sm-6 col-md-8">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
								<i class="material-icons md-18 text-muted">lock</i>
							</span>
                    <input type="password" class="form-control" name="password" <?php if(isset($_POST['password'])){ ?>value="<?php print $_POST['password']; ?>"<?php } ?> placeholder="Mot de passe">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-8 col-sm-offset-3">
                  <div class="media">
                    <div class="media-left">
                      <input type="submit" value="Installation" name="mysql" class="btn btn-success btn-rounded">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <?php if(@$Etape == 2) { ?>
          <div class="tab-pane active" id="etape2">
            <?php if(!tableExists('users') OR !tableExists('server_status')) { ?>
              <div class="card card-stats-danger">
        <div class="card-block">
          <div class="media">
            <div class="media-body media-middle">
              Votre base de données ne contient pas de <strong class="text-danger">tables</strong>. Importez les tables avant de continuer.
            </div>
            <div class="media-right">
              <a href="javascript:window.location.reload()" class="btn btn-success pull-xs-right btn-rounded">Actuiliser</a>
            </div>
          </div>
        </div>
      </div>
      <?php } else { ?>
      <script>  
function message(){    
document.getElementById('install').innerHTML = ('<div class="alert alert-danger" role="alert"><strong>Attention!</strong> Merci de patienter quelques instants...</div>'); 
return true;
}  
</script>
      <div id="install"></div>
      <form class="form-horizontal" method="post">
                 <button type="submit" class="btn btn-primary btn-block btn-rounded" onClick="message();" name="insert"><i class="material-icons md-36">get_app</i>
                <br> Installation</button>
            </form>
          </div>
      <?php } ?>
          <?php } ?>

          <?php if(@$Etape == 3) { ?>
          <div class="tab-pane active" id="etape3">
            <form class="form-horizontal" method="post">
              <div class="form-group row">
                <label for="address" class="col-sm-3 form-control-label">Nom</label>
                <div class="col-sm-6 col-md-8">
                  <input type="text" class="form-control" name="nom" value="Habbo">
                </div>
              </div>
              <div class="form-group row">
                <label for="country" class="col-sm-3 form-control-label">Emulateur</label>
                <div class="col-sm-6 col-md-8">
                  <select class="c-select form-control" name="emu">
                    <option value="Phoenix">Phoenix</option>
            <option value="Butterfly">Butterfly</option>
            <option value="Mercury">Mercury</option>
            <option value="Azure">Azure</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 col-md-4 col-sm-offset-3">
                  <input type="submit" value="Configurer" class="btn btn-success btn-rounded">
                </div>
              </div>
            </form>
          </div>
          <?php } ?>

          <?php if(@$Etape == 4) { ?>
          <div class="tab-pane active" id="etape4">
            <?php if(isset($messageErreur)) { ?>
            <div class="alert alert-danger" role="alert">
            <strong>Attention!</strong> <?php print $messageErreur; ?>
          </div>
          <?php } ?>
            <form class="form-horizontal" method="post">
            <div class="form-group row">
                <label for="password" class="col-sm-3 form-control-label">Pseudonyme</label>
                <div class="col-sm-6 col-md-8">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
								<i class="material-icons md-18 text-muted">account_box</i>
							</span>
                    <input type="text" class="form-control" name="userPseudonyme" placeholder="Pseudonyme">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-3 form-control-label">Email</label>
                <div class="col-sm-6 col-md-8">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
								<i class="material-icons md-18 text-muted">mail</i>
							</span>
                    <input type="mail" class="form-control" name="userMail" placeholder="Adresse email">
                  </div>
                </div>
              </div>
             <div class="form-group row">
                <label for="password" class="col-sm-3 form-control-label">Mot de passe</label>
                <div class="col-sm-6 col-md-8">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon3">
								<i class="material-icons md-18 text-muted">lock</i>
							</span>
                    <input type="password" class="form-control" name="userPassword" placeholder="Mot de passe">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 col-md-4 col-sm-offset-3">
                  <input type="submit" value="Créer votre compte" name="user" class="btn btn-success btn-rounded">
                </div>
              </div>
            </form>
          </div>
          <?php } ?>

          <?php if(@$Etape == 5) { ?>

          <div class="tab-pane active" id="etape5">
           <div class="card card-success center">
            <div class="card-block">
              <p>Installation terminée.</p>
            </div>
          </div>
          <a href="../" class="btn  btn-info  btn-block btn-rounded">Accéder à mon site</a>
          <br>
              <div class="card">
                <div class="card-block-half">
                  <a href="../"><?php print $cms; ?></a>
                  <small class="text-muted">message:</small>
                  <p class="m-b-0">Pour des raisons de sécurité, il est conseillé de supprimer le dossier(install) d'installation.</p>
                </div>
              </div> 
          </div>
          <?php } ?>

        </div>
      </div>

    </div>
  </div>

  <script src="<?php print URL; ?>assets/vendor/jquery.min.js"></script>
  <script src="<?php print URL; ?>assets/vendor/bootstrap.min.js"></script>
  <script src="<?php print URL; ?>assets/js/main.min.js"></script>

</body>
</html>
<?php $Install->Update($version,'true'); ?>