<?php
if(!isset($_SESSION['username']))
{
Redirect(Settings('Url'));
}
?>