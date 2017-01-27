<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';



$pageid = 67;
$pagename = "support";
  
 

if(isset($_POST['titre']) || isset($_POST['desc']) || isset($_POST['image']) || isset($_POST['article'])) {
	session_start();
$SESSION['validate'] = 1;
$titre = safe($_POST['titre'],'HTML');
$desc = safe($_POST['desc'],'HTML');
$image = safe($_POST['image'],'SQL');
$article = $_POST['article'];
$str1 = str_replace (' ', '-', $titre);
$str2 = str_replace("'","&apos;", $str1);
$str3 = str_replace("'","&apos;", $article);
$str4 = str_replace("'","&apos;", $desc);
$str5 = ($str3); 
$str6 = str_replace("'","&apos;", $titre);
$str_id = preg_replace('#[^A-Za-z0-9]+#', '', suppr_accents($str2));
if(empty($titre) || empty($desc) || empty($image) || empty($article)) {
$post_new_erreur = true;
} else {
$Db->InsertSQL('support', array(
    'id_page' => addslashes($str_id),
    'topstory_image' => $image,
    'title' => addslashes($str6),
    'snippet' => addslashes($str4),
    'body' => $article,
    'date' => time(),
));
$User->AddLogs($User->username,'Ajoute d\'un article ('.$titre.').');
$post_new = true;
}
}

include './templates/header.php';
?>

  <script src="/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="/sweetalert.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<div class="row">


 <script>
$(document).ready(function() {
	var sessionId = '<?php echo $_SESSION["validate"]; ?>';
	console.log("test = "+sessionId);
 swal("SUPPORT", "Bienvenue sur le support ! Merci de ne pas spammer notre support sous peine d'être banni du site.", "success")
});
</script>
	  <?php if (isset($_SESSION['validated']) ) {
		  echo '<div hidden class="variable" var="'.$_SESSION['validated'].'"></div>';
	  } ?>
      <div class="col-md-12">
        <article class="widget">
          <header class="widget__header">
            <h3 class="widget__title">ENVOYER UN MESSAGE AU SUPPORT</h3>
          </header>

          <div class="widget__content">
            <?php if($post_new_erreur == true){ ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <div class="media">
                <figure class="pull-left alert--icon">
                  <i class="pe-7s-close-circle"></i>
                </figure>
                <div class="media-body">
                  <h3 class="alert--title">Erreur</h3>
                  <p class="alert--text">Merci de remplir tous les champs.</p>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php if($post_new == true){ ?>
            <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <div class="media">
                <figure class="pull-left alert--icon">
                  <i class="pe-7s-attention"></i>
                </figure>
                <div class="media-body">
                  <h3 class="alert--title">C'est fait !</h3> 
                  <p class="alert--text">Votre message a été envoyé au support.</p>
				  
                </div>
              </div>
            </div>
            <?php } ?>
<form method="post">
<input type="text" class="input-text" name="titre" value="" placeholder="Ton e-mail" />
<input type="text" class="input-text" name="desc" value="" placeholder="Ton pseudo sur HabboAlpha" />
<input type="text" class="input-text" name="image" value="" placeholder="Le sujet de ton message" />
<script src="ckeditor/ckeditor.js"></script>
  <script src="ckeditor/samples/js/sample.js"></script>
<textarea name="article" id="editor" style="width: 100%; height: 150px;"><?php print $article; ?></textarea>
<script>
  initSample();
</script>
<button class="btn btn-light pull-right" type="submit">Envoyer</button>
</form>
            <div class="clearfix"></div>
          </article>
        </div>

      </div>
<?php include './templates/footer.php'; ?>