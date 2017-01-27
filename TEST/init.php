<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

@session_start();

/*+===================================+
|   Importation des librarys          |
+===================================+*/

@include("./includes/settings.inc.php");
@include("../includes/settings.inc.php");

#### Installation du CMS ####
$install = mysql_query("SHOW TABLES LIKE 'retrophp_settings'")or die(mysql_error());
if(mysql_num_rows($install) == 0) { @header("Location: ./install/"); }

@include("./includes/functions.php");
@include("../includes/functions.php");

@include("./includes/core.php");
@include("../includes/core.php");

#### Update de la version 0.1 => ####
if ($version >= "0.2") {
$update0 = mysql_query("SHOW TABLES LIKE 'retrophp_hk'")or die(mysql_error());
if(mysql_num_rows($update0) == 0) { @header("Location: ./install/update0.2.php"); }
}
?>