</br>
</br>
</br>

<div class="height"></div>
<div id="dedicaces-block" style="background:#eee;margin-left:10px;margin-right:10px;border-radius:5px;">
			<div style="float:left;border-right:2px solid #fff;padding:10px;">
				<div class="left" style="margin-right:7px;"></div>
				<div class="left"><b style="font-weight:600;">Messages</b></div></a>
				<div class="clear"></div>
			</div>
			<div style="float:left;width:83%;">
				<div style="margin-left:10px;margin-top:10px;width:100%;" id="dedi-in">
				<font><b><?php echo Settings('Name'); ?>:</a></b> Message des staffs</font>
				<?php 
				$sqldedi = mysql_query("SELECT * FROM retrophp_dedicaces ORDER BY id DESC LIMIT 20"); 
				while($dedicace = mysql_fetch_array($sqldedi)) { 
				$dediu = mysql_query("SELECT * FROM users WHERE id = '".$dedicace['uid']."'");
				$dediuser = mysql_fetch_assoc($dediu);
				?>
				<font><b><?php echo $dediuser['username']; ?>:</a></b> <?php echo stripslashes($dedicace['message']); ?></font>
				<?php } ?>

									</div>
			</div>
			<div class="right" style="padding-left:0;padding:4px;padding-bottom:0;font-size:26px; line-height:1;">
				<a href="javascript:void(0);" onclick="$('#dedi-in').cycle('prev');"><img src="<?php echo Settings('Url'); ?>/images/1_n.png"></a> 
				<a href="javascript:void(0);" onclick="$('#dedi-in').cycle('next');"><img src="<?php echo Settings('Url'); ?>/images/2_n.png"></a>
			</div>

			<div class="clear"></div>
		</div>