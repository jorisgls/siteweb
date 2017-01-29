<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />

<link href="../jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../sweetalert.css">
<link href="../bootstrap.min.css" rel="stylesheet">



<div class="header" style="z-index: 10;padding-top: 12px;">
<div class="container" style="width: 950px;">
</br>

<center><p><img src="/logo.png" alt="" /></p></center>


<div class="clear"></div>
<ul class="nav nav-tabs" style="top: 11px;position: relative;z-index: 10;">



<li class="<?php if($pageid == 'accueil' || $pageid == 'settings') { ?>active<?php } ?>">
	<a href="#" onclick="document.location.href='http://localhost/me'" data-toggle="tab" aria-expanded="false">
		<span class="glyphicon glyphicon-check" aria-hidden="true"></span> Accueil</a>
</li>

<li class="<?php if($pageid == 'community' || $pageid == 'news' || $pageid == 'staffs' || $pageid == 'site') { ?>active<?php } ?>">
	<a href="#" onclick="document.location.href='http://localhost/news'" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Citynews</a>
</li>

<li class="<?php if($pageid == 'staff') { ?>active<?php } ?>">
	<a href="#" onclick="document.location.href='http://localhost/staff.php'" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-education" aria-hidden="true"></span> Notre équipe</a>
</li>


<li class="<?php if($pageid == 'support') { ?>active<?php } ?>">
	<a href="#" onclick=" document.location.href='http://localhost/support/new.php'" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Support</a>
</li>

<li class="<?php if($pageid == 'recrutements') { ?>active<?php } ?>">
	<a href="#" onclick="document.location.href='http://localhost/recrutements'" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Recrutement</a>
</li>

<li class="<?php if($pageid == 'interviews') { ?>active<?php } ?>">
	<a href="#" onclick="document.location.href='http://localhost/interviews'" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Interviews</a>
</li>



<?php if ($User->rank >= '7') { ?>
<li class="">
	<a href="<?php echo URL; ?>/management" data-toggle="tab" aria-expanded="true">
		<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> <b>MANAGEMENT</b></a>
</li>
<?php } ?>




</ul>



</div>
</div>


<script src="../jquery-3.1.1.js"></script>
<script src="../jquery-ui.min.js"></script>
<script src="../bootstrap.min.js"></script>
<script src="../sweetalert.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
  $( "#image" ).draggable({
    start: function() {
     console.log('test');
    },
    drag: function() {
     console.log('toto');
    },
    stop: function() {

    }
  });
 });
</script>





