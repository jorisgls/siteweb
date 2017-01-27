<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("../init.php");
include("../includes/files/session.disconnect.php");

$pageid = 5;
$pagename = "new";
  
include("./init.hk.php");

function suppr_accents($chaine) { 
$accents = array('À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ'); 
$sans = array('A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y'); 
return str_replace($accents, $sans, $chaine); 
} 

if(isset($_POST['titre']) || isset($_POST['desc']) || isset($_POST['image']) || isset($_POST['article']) || isset($_POST['auteur'])) {
$titre = Securise($_POST['titre']);
$desc = Securise($_POST['desc']);
$image = Securise($_POST['image']);
$article = $_POST['article'];
$auteur = Securise($user['username']);
$str1 = str_replace (' ', '-', $titre);
$str3 = str_replace("'","&apos;",$article);
$str4 = str_replace("'","&apos;",$desc);
$str5 = ($str3); 
$str_id = preg_replace('#[^A-Za-z0-9]+#', '', suppr_accents($str1));
print $str5; 

if($titre != "" && $desc != "" && $image != "" && $article != "") {
mysql_query("INSERT INTO retrophp_news (`id_page`, `topstory_image`,`title`,`snippet`,`body`,`auteur`,`date`) VALUES ('".Securise(addslashes($str_id))."','".$image."','".Securise(addslashes($titre))."','".Securise(addslashes($str4))."','".$str5."','".$auteur."','".time()."')") or die(mysql_error());
mysql_query("INSERT INTO retrophp_stafflog (pseudo,action,date) VALUES ('".$user['username']."','Ajoute d\'un article (".$titre.").','".time()."')");
$post_new = true;
} else {
$post_new_erreur = true;
}
}

include("./templates/header.php");
?>
<script type="text/javascript" src="js/nicEdit.js?1"></script>
<script type="text/javascript">
  bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
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
<input type="text" class="input-text" name="titre" value="<?php echo $titre; ?>" placeholder="Titre" />
<input type="text" class="input-text" name="desc" value="<?php echo $desc; ?>" placeholder="Courte description" />
<input type="text" class="input-text" name="image" value="<?php echo $image; ?>" placeholder="Exemple: http://www.[...].fr/images/topstory.png" />
<textarea name="article" style="width: 100%; height: 150px;"><?php echo $article; ?></textarea>
<button class="btn btn-light pull-right" type="submit">Publier l'article</button>
</form>
            <div class="clearfix"></div>
          </article>
        </div>

      </div>
<?php include("./templates/footer.php"); ?>