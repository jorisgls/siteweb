<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include '../init.php';

$Auth::Session_Disconnected($_SESSION);

$pageid = 5;
$pagename = "new";
  
include './init.hk.php'; 

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
$Db->InsertSQL('retrophp_news', array(
    'id_page' => addslashes($str_id),
    'topstory_image' => $image,
    'title' => addslashes($str6),
    'snippet' => addslashes($str4),
    'body' => $article,
    'auteur' => $User->username,
    'date' => time(),
));
$User->AddLogs($User->username,'Ajoute d\'un article ('.$titre.').');
$post_new = true;
}
}

include './templates/header.php';
?>
<div class="row">

      <div class="col-md-12">
        <article class="widget">
          <header class="widget__header">
            <h3 class="widget__title">Poster un article</h3>
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
                  <p class="alert--text">Votre article a bien été publié.</p>
                </div>
              </div>
            </div>
            <?php } ?>
<form method="post">
<input type="text" class="input-text" name="titre" value="<?php print $titre; ?>" placeholder="Titre" />
<input type="text" class="input-text" name="desc" value="<?php print $desc; ?>" placeholder="Courte description" />
<input type="text" class="input-text" name="image" value="<?php print $image; ?>" placeholder="Exemple: http://www.[...].fr/images/topstory.png" />
<script src="ckeditor/ckeditor.js"></script>
  <script src="ckeditor/samples/js/sample.js"></script>
<textarea name="article" id="editor" style="width: 100%; height: 150px;"><?php print $article; ?></textarea>
<script>
  initSample();
</script>
<button class="btn btn-light pull-right" type="submit">Publier l'article</button>
</form>
            <div class="clearfix"></div>
          </article>
        </div>

      </div>
<?php include './templates/footer.php'; ?>