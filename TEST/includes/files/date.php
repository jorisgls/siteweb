<?php 
$date = date('d F Y', time()); 
$date = str_replace("Monday", "Lundi", $date);
$date = str_replace("Tuesday", "Mardi", $date);
$date = str_replace("Wednesday", "Mercredi", $date);
$date = str_replace("Thursday", "Jeudi", $date);
$date = str_replace("Friday", "Vendredi", $date);
$date = str_replace("Saturday", "Samedi", $date);
$date = str_replace("Sunday", "Dimanche", $date);
$date = str_replace("January", "janv.", $date);
$date = str_replace("February", "fév.", $date);
$date = str_replace("March", "mars", $date);
$date = str_replace("April", "avr.", $date);
$date = str_replace("May", "mai", $date);
$date = str_replace("June", "juin", $date);
$date = str_replace("July", "juil.", $date);
$date = str_replace("August", "août", $date);
$date = str_replace("September", "sept.", $date);
$date = str_replace("October", "oct.", $date);
$date = str_replace("November", "nov.", $date);
$date = str_replace("December", "déc.", $date);
?>