<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                 Développement de RetroPHP par Tyler                    #| 
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

/*+===================================+
|     Importation des librarys        |
+===================================+*/

include("./includes/files/session.php");
include("../includes/files/session.php");

include("./includes/files/ip.php");
include("../includes/files/ip.php");

include("./includes/files/key.php");
include("../includes/files/key.php");

include("./includes/files/data.php");
include("../includes/files/data.php");

include("./includes/files/retrophp.php");
include("../includes/files/retrophp.php");

include("./includes/files/date.php");
include("../includes/files/date.php");

include("./includes/files/savep.php");
include("../includes/files/savep.php");

include("./includes/files/expire.php");
include("../includes/files/expire.php");

include("./includes/files/expire.event.php");
include("../includes/files/expire.event.php");

include("./includes/files/banip.php");
include("../includes/files/banip.php");

include("./includes/files/visite.php");
include("../includes/files/visite.php");

include("./includes/files/staffip.php");
include("../includes/files/staffip.php");

include("./includes/files/maintenance.php");
include("../includes/files/maintenance.php");

include("./includes/files/update.php");
include("../includes/files/update.php");

/*+===================================+
|          Configuration PHP          |
+===================================+*/
ini_set("display_errors",0);
error_reporting(0);

/*+===================================+
|             Sécurité                |
+===================================+*/
$ipadmin = "::1"; // Autorisation de backup ( Indique ton adresse IP ) //


?>