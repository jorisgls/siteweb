<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';



$pageid = 67;
$pagename = "recrutements";
  
 

if(isset($_POST['titre']) || isset($_POST['desc']) || isset($_POST['image']) || isset($_POST['article'])) {
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
$Db->InsertSQL('recruts', array(
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
</br>
<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>[POSTES DISPONIBLES] :</strong> journaliste, correcteur, helpeur support
</div>
<script type="text/javascript">
	$('.close').click(function(){
	 $('.alert').fadeOut();
	});
</script>

 <script>

swal({
  title: "RECRUTEMENTS",
  text: "Nous devons vérifier si tu es éligible pour participer aux recrutements.",
  type: "info",
  showCancelButton: false,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
},
function(){
  setTimeout(function(){
    swal("VERIFICATION TERMINE");
  }, 2000);
});






</script>

<link href="../bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap.css" rel="stylesheet">

      <div class="col-md-12">
        <article class="widget">
          <header class="widget__header">
            <h3 class="widget__title">ENVOYER MA CANDIDATURE AUX RECRUTEMENTS</h3>
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
                  <h3 class="alert--title">Oops !</h3>
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
                  <h3 class="alert--title">Bonne chance !</h3> 
                  <p class="alert--text">Votre candidature a été envoyé au support.</p>
				  
                </div>
              </div>
            </div>
            <?php } ?>
<form method="post">
<input type="text" class="input-text" name="titre" value="" placeholder="Ton pseudo sur HabboAlpha" />
<input type="text" class="input-text" name="desc" value="" placeholder="Ton pseudo skype" />
<input type="text" class="input-text" name="image" value="" placeholder="Le poste pour lequel tu posutles" />
<script src="ckeditor/ckeditor.js"></script>
  <script src="ckeditor/samples/js/sample.js"></script>
<textarea name="article" id="editor" style="width: 100%; height: 150px;"><?php print $article; ?></textarea>
<script>
  initSample();
</script>
<button class="btn btn-light pull-right" type="submit">Envoyer ma candidature</button>
</form>
            <div class="clearfix"></div>
          </article>
        </div>

      </div>
<?php include './templates/footer.php'; ?>