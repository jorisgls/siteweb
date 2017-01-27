<?php
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|
#|                                                                        #|
#|                Développement de RetroPHP par Tyler                     #|
#|                                                                        #|
#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|#|

include("./init.php");
 
$pagename = "Les Staffs";
$pageid = "communaute";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo Settings('Name'); ?>: <?php echo $pagename; ?></title>
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/jquery.slides.min.js?<?php echo $update; ?>"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/jquery.tipTip.minifiedA.js?<?php echo $update; ?>"></script>
	<script src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/lightbox-2.6.min.js?<?php echo $update; ?>"></script>
	<script type="text/javascript" src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/cycle.js?<?php echo $update; ?>"></script>
	<script type="text/javascript" src="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/js/general2.js?<?php echo $update; ?>"></script>
	
	<link href='http://fonts.googleapis.com/css?family=Roboto|Open+Sans:300italic,400,600,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Caesar+Dressing' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/grid.css?<?php echo $update; ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/slider.css?<?php echo $update; ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/general2.css?745" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/buttons.css?<?php echo $update; ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo Settings('Url'); ?>/web-gallery/v4/assets/css/lightbox.css?<?php echo $update; ?>" />
	<link rel="icon" type="image/png" href="favicon.ico" />
	<link href='//fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic|Ubuntu+Condensed' rel='stylesheet' type='text/css'>

	<?php include("./templates/meta.php"); ?>

	<script>
		$(function(){
			$(".tip").tipTip({defaultPosition:'top',delay:0});
										titlePage('<?PHP echo $pagename; ?>');
						
							subMenu('<?PHP echo $pageid; ?>');
						forumUpdate();
			forumClear();
			menu('<?PHP echo $pageid; ?>');
		});
	</script>


<style>
.staff{
	background:#fff;
	border-radius:4px;
	border:1px solid #f1f2f7;
	margin-left: 10px;
	margin-bottom: 20px;
}
.staff .top{
	background:#f1f2f7;
	padding:20px;
	height:170px!important;
	border-radius:4px 4px 0px 0px;
	-webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    font-size:24px;
    font-weight: 300;
    position:relative;
}
.astaff .top.hm .username{
	color:#f8d347;
}
.astaff .top.gm .username{
	color:#57c8f2;
}
.astaff .top.modo .username{
	background:#6ccac9;
}
.staff .avatar{
	background:#fff;
	width:100px;
	height:100px;
	border-radius:50%;
	overflow:hidden;
	margin-bottom:10px;
}

}
.staff .username{
	color:#505a6b;
	position:absolute;
	bottom:10px;
	width:180px;
	left:50%;
	margin-left:-90px;
}
.staff .avatar img{
	transition: all 0.3s ease;
}
/*.staff .avatar:hover img{
	width:100px;
	transition: all 0.3s ease;
}*/

</style>

<script>
$(function(){
	$(".staff").mouseenter(function(){
		$(this).find('.top').animate({padding:'10px'},100);
		$(this).find('.avatar').animate({width:'120px',height:'120px','margin-bottom':0},100);
	}).mouseleave(function(){
		$(this).find('.top').animate({padding:'20px'},100);
		$(this).find('.avatar').animate({width:'100px',height:'100px','margin-bottom':'10px'},100);
	});
});
</script>
</head>
<body>

<div id="details"></div>
<div id="all">
	<br>
	<?php include("./templates/header.php"); ?>

	
	<div id="corp">
	
	<?php include("./templates/dedicaces.php"); ?>
	

<link href="../bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap.css" rel="stylesheet">
	
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title"><b>RESPONSABLES LOUPS</b> <i>(ils gèrent tous les loups et les forment)</i></h3>
  </div>
  <div class="panel-body">
    
  
</div>
	
				
		<div class="clear"></div>
		
			<div class="row">

<?php
$sql = mysql_query("SELECT * FROM users WHERE rank = '10' ORDER BY rank DESC");
while($s = mysql_fetch_array($sql)) { 
?>
<div class="column grid_2"><div class="height"></div>
		<div class="staff">
			<div class="top ">

				<center>
					<div class="avatar">
												<img src="<?php echo Settings('Avatarimage'); ?>avatarimage?figure=<?php echo $s['look']; ?>&action=std&direction=3&head_direction=3&gesture=sml&img_format=gif">
											</div>
					<div class="username"><?php echo $s['username']; ?></div>
				
				</center>
			</div>
			<center>
				<div class="">
					<div class="height"></div>
					<span class="bold"><?php $gradesql = mysql_query("SELECT * FROM ranks WHERE id = '".$s['rank']."'"); while($grade = mysql_fetch_array($gradesql)) { ?><?php echo $grade['name']; ?><?php } ?></span>
					<i><div class="fonction"><?php echo $s['motto']; ?></div></i>
				</div>
				<div class="clear"></div>
			</center>


			<div class="height"></div>
		</div>


	</div>
<?php } ?>

</div>

</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title"><b>LOUPS</b> <i>(leur mission et de vous aider et de vous renseigner)</i></h3>
  </div>
  <div class="panel-body">
    
  
</div>
	
				
		<div class="clear"></div>
		
			<div class="row">

<?php
$sql = mysql_query("SELECT * FROM users WHERE rank = '6' ORDER BY rank DESC");
while($s = mysql_fetch_array($sql)) { 
?>
<div class="column grid_2"><div class="height"></div>
		<div class="staff">
			<div class="top ">

				<center>
					<div class="avatar">
												<img src="<?php echo Settings('Avatarimage'); ?>avatarimage?figure=<?php echo $s['look']; ?>&action=std&direction=3&head_direction=3&gesture=sml&img_format=gif">
											</div>
					<div class="username"><?php echo $s['username']; ?></div>
				
				</center>
			</div>
			<center>
				<div class="">
					<div class="height"></div>
					<span class="bold"><?php $gradesql = mysql_query("SELECT * FROM ranks WHERE id = '".$s['rank']."'"); while($grade = mysql_fetch_array($gradesql)) { ?><?php echo $grade['name']; ?><?php } ?></span>
					<i><div class="fonction"><?php echo $s['motto']; ?></div></i>
				</div>
				<div class="clear"></div>
			</center>


			<div class="height"></div>
		</div>


	</div>
<?php } ?>

</div>
</div>


				

	<div class="height"></div>
<div class="row">

	
</div>

</body>
</html>