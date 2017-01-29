<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';

 
$pageid = "management";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="../bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="bootstrap.js"></script>




<link rel="shortcut icon" href="<?php echo URL; ?>/web/images/favicon.ico" type="image/vnd.microsoft.icon">
<link href="<?php echo URL; ?>/web/styles/style.css" rel="stylesheet" type="text/css">
<link href="https://bootswatch.com/lumen/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/bootstrap-social.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/font-awesome.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">

</head>
<body style="background-color: rgba(232, 232, 232, 0.57);">

<?php include_once './templates/header.php'; ?>


<center>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Bienvenue sur la page management <?php echo $User->username; ?></b></h3>
	
  </div>
  <div class="panel-body">
    <?php



?>



	
<b>Tu peux noter ton abscence en accédant à l'administration via "Signaler une abscence"</b>
	<div style=""><a href="<?php echo URL; ?>/admin/abs" class="btn btn-success" style="box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.48);text-transform: none;font-size: 13px;">
ABSCENCES</a>
</div>
</br>
</br>
<b>Tu peux accéder à ton dossier pour voir ton nombre de points, tes messages et ton statut </b>
	<div style=""><a href="<?php echo URL; ?>/dossier.php" class="btn btn-success" style="box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.48);text-transform: none;font-size: 13px;">
MON DOSSIER</a>
</div>

</br>
</br>
<b>Tu peux modifier ton mot de passe ici, il t'est conseillé d'utiliser un mot de passe inhabituel </b>
	<div style=""><a href="<?php echo URL; ?>/settings.php" class="btn btn-success" style="box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.48);text-transform: none;font-size: 13px;">
MODIFIER MON MOT DE PASSE</a>
</div>

  </div>
</div>
</br>


	
	
	
	
	
	
  </div>
</div>

</center>

<br>

<br>








</body>
</html>


<div id="image">
<a href="#"><img src="/1.png" alt="1.png" id="imageTool1" /></a>
<a href="/admin"><img src="/2.png" alt="2.png" id="imageTool2" /></a>
<a href="/settings"><img src="/3.png" alt="3.png" id="imageTool3" /></a>
<a href="/"><img src="/4.png" alt="4.png" id="imageTool4" /></a>
<img src="/5.png" alt="5.png" id="imageTool5" data-toggle="modal" data-target="#exampleModal" />
<a href="/account/logout"><img src="/6.png" alt="6.png" id="imageTool6" /></a>
<a href="#"><img src="/7.png" alt="7.png" id="imageTool7" /></a>
</div>

 <style>
#imageTool1{
position : absolute;
top : 220px;
left : 274px;
bottom : 40px;
right : 1500px;
}

#imageTool2{
position : absolute;
top : 255px;
left : px;
bottom : 40px;
right : 1500px;
}

#imageTool3{
position : absolute;
top : 280px;
left : px;
bottom : 40px;
right : 1500px;
}

#imageTool4{
position : absolute;
top : 305px;
left : px;
bottom : 40px;
right : 1500px;
}

#imageTool5{
position : absolute;
top : 330px;
left : px;
bottom : 40px;
right : 1500px;
}

#imageTool6{
position : absolute;
top : 355px;
left : px;
bottom : 40px;
right : 1500px;
}

#imageTool7{
position : absolute;
top : 380px;
left : 277px;
bottom : 40px;
right : 1500px;
}
</style>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

