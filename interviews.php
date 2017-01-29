<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

require_once './init.php';

 
$pageid = "interviews";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />


<link rel="shortcut icon" href="<?php echo URL; ?>/web/images/favicon.ico" type="image/vnd.microsoft.icon">
<link href="<?php echo URL; ?>/web/styles/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/bootstrap-social.css" rel="stylesheet" type="text/css">
<link href="<?php echo URL; ?>/web/styles/font-awesome.css" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">

</head>
<body style="background-color: rgba(232, 232, 232, 0.57);">

<?php include_once './templates/header.php'; ?>


<div class="container" style="width: 950px;">
</br>
<div style="clear:both;"></div>
<div class="after_banner" style="top:-14px;position:relative;"></div>


<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>INTERVIEWS : </strong>Tu retrouveras ici toutes les interviews inédites des STAFF d'HabboCity !
</div>
<script type="text/javascript">
	$('.close').click(function(){
	 $('.alert').fadeOut();
	});
</script>




<div class="panel panel-warning" style="width: 100%;position: relative;float: right; border-color:#058ce1;">
<div class="panel-heading" style="font-size: 17px;font-weight: 600; background-color:#058ce1; border-color:#058ce1"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true" style="float:right;font-size:25px;opacity:0.85;"></span> <center>INTERVIEWS</center></div>
</br>

<!--BLOC INTERVIEW A MODIFIER-->
<center><h5>INTERVIEW DE <b>SHIN</b> par Joris : Shin, de la simple modération au grade ultime <span style="margin-left:5px;" class="glyphicon glyphicon-plus openModal"></span></h5></center>



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
        <iframe width="554" height="480" src="https://www.youtube.com/embed/uEJuoEs1UxY" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>







</br>
</div>





<div style="clear:both;"></div>

﻿
<?php include_once './templates/footer.php'; ?>

</div>
</body>
</div>

</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('.openModal').click(function(){
      $('#myModal').modal('show');
    });
  });

</script>