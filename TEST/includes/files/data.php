<?php
$req = "SELECT COUNT(*) AS id FROM users"; $query = mysql_query($req); $nb_inscrit = mysql_fetch_array($query);
$req = "SELECT COUNT(*) AS id FROM bans"; $query = mysql_query($req); $nb_bans = mysql_fetch_array($query);
$req = "SELECT COUNT(*) AS id FROM retrophp_visites"; $query = mysql_query($req); $nb_visites = mysql_fetch_array($query);
$req = mysql_query("SELECT COUNT(*) AS id FROM users WHERE online = '1'");
$online = mysql_fetch_array($req);
$record = mysql_query("UPDATE server_status SET record_connect = '".$online['id']."' WHERE record_connect <= '".$online['id']."'");
?>