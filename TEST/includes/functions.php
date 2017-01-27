<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                 Développement de RetroPHP par Tyler                    #| 
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

function SystemConfig($str)
{
$tmp = mysql_query("SELECT ".$str." FROM server_status LIMIT 1") or die(mysql_error());
$tmp = mysql_fetch_assoc($tmp);
return $tmp[$str];
}

function Settings($str)
{
$tmp = mysql_query("SELECT ".$str." FROM retrophp_settings LIMIT 1") or die(mysql_error());
$tmp = mysql_fetch_assoc($tmp);
return $tmp[$str];
}

function Serveur($str)
{
$tmp = mysql_query("SELECT ".$str." FROM retrophp_swfs LIMIT 1") or die(mysql_error());
$tmp = mysql_fetch_assoc($tmp);
return $tmp[$str];
}
			
function  Redirect($url)
{
@header("Location: ".$url."");
}
			
function Hashage($str)
{
$config_hash = "xCg532%@%gdvf^5DGaa6&*rFTfg^FD4\$OIFThrR_gh(ugf*/";
$str = Securise(sha1($str . $config_hash));
return $str;
}
		
function SecuriseSQL($str, $avancee=false) 
{
if($avancee== true){ return mysql_real_escape_string($str); }
$str = mysql_real_escape_string(htmlspecialchars($str));
return $str;
}
		
function Securise($str)
{
$str = mysql_real_escape_string(htmlspecialchars(stripslashes(nl2br(trim($str)))));
return $str;
}
			
function SecuriseText($str, $avancee=false, $codeforum=false) 
{
if($avancee == true){ return stripslashes($str); }
$str = stripslashes(nl2br(htmlspecialchars($str)));
if($codeforum == true){$str = bbcode_format($str); }
return $str;
}
		
function FullDate($str)
{
$H = date('H');
$i = date('i');
$s = date('s');
$m = date('m');
$d = date('d');
$Y = date('Y');
$j = date('j');
$n = date('n');
				
switch ($str)
{
case "day":
$str = $j;
break;
case "month":
$str = $m;
break;
case "year":
$str = $Y;
break;
case "today":
$str = $d;
break;
case "full":
$str = date('d-m-Y H:i:s',mktime($H,$i,$s,$m,$d,$Y));
break;
case "datehc":
$str = "".$j."-".$n."-".$Y."";
break;
default:
$str = date('d-m-Y',mktime($m,$d,$Y));
break;
}
					
return $str;
}
			
function IsEven($int)
{
if($int % 2 == 0)
{
return true;
} 
else 
{
return false;
}
}
			
function TicketRefresh($username)
{
for($i = 1; $i <= 3; $i++):
{
$base = $base . rand(0,99);
$base = uniqid($base);
}
endfor;
$request = mysql_query("UPDATE users SET auth_ticket = '".$base."' WHERE username = '".$username."' LIMIT 1") or die(mysql_error());
return $base;
}
?>