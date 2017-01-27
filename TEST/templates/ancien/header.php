<div id="header">
		<div id="header-in" >
<style>
#logo
{
	position:absolute;
	top:30px;
	left:143px;
}
</style>
<script type="text/javascript">
function titlePage(){}
</script>



			<div class="row" >
				
			   
               
           
			   			
  
			   				<div class="column" style="width:230px;float:left;margin-top:86px;">
					
				</div>
                            
                           
				
				<div class="clear"></div>
			</div>

                    
                   
			<div id="menu" style="display:block;">
				
				<?PHP if($user['rank'] >= 8){ ?>
				<ul class="menu dropit">
					<li>
						<a id="menu-admin" href="#" class="top-link" style="font-family:'Roboto'; font-size:17px; color: #F0FFFF; background-color: #B22222;">STAFF</a>
						<ul>
				            
				            <li onclick="link('<?php echo Settings('Url'); ?>/boutique-dedicaces');">Envoyer une alerte</li>
				            <li onclick="link('<?php echo Settings('Url'); ?>/admin');">Managements</li>
				            <li onclick="link('<?php echo Settings('Url'); ?>/admin/support');">Support</li>
							<li onclick="link('<?php echo Settings('Url'); ?>/dossier');">Mon dossier</li>
							<li onclick="link('<?php echo Settings('Url'); ?>/account/logout');">Deconnexion</li>
				        
				        </ul>
					</li>
				</ul>
				<?php } else ?> 
				 
	            

				

				<ul class="menu dropit">
				    <li>
				        <a id="menu-secu" href="#" class="top-link" style="font-family:'Roboto'; font-size:17px;">Sécurit&eacute; et règlements</a>
				        <ul>
				            
				            <li onclick="link('<?php echo Settings('Url'); ?>/safety/safety_tips');">Conseils Sécurité</li>
				            <li onclick="link('<?php echo Settings('Url'); ?>/disclaimer');">Conditions d'utilisation</li>
							<?PHP if($user['rank'] >= 2){ ?>
							<li onclick="link('<?php echo Settings('Url'); ?>/general');">Règlement staff</li>
							<?php } else ?> 
				        </ul>
				    </li>
				</ul>

				<ul class="menu dropit">
				    <li>
				        <a id="menu-communaute" href="#" class="top-link" style="font-family:'Roboto'; font-size:17px;">Le site</a>
				    <ul>
				            <li onclick="link('<?php echo Settings('Url'); ?>/community/socialmedia');">Réseaux sociaux</li>
				            <li onclick="link('<?php echo Settings('Url'); ?>/community/staffs');">L'équipe</li>
				        </ul>
				    </li>
				</ul>
				
				<ul class="menu dropit">
					<li>
						<a id="menu-tchat" href="<?php echo Settings('Url'); ?>/tchat" class="top-link" style="font-family:'Roboto'; font-size:17px;">Le tchat</a>
					</li>
				</ul>
				
				<ul class="menu dropit">
					<li>
						<a id="menu-recrutements" href="<?php echo Settings('Url'); ?>/recrutements" class="top-link" style="font-family:'Roboto'; font-size:17px;">Recrutements</a>
					</li>
				</ul>
				
				

				<ul class="menu dropit">
					<li>
						<a id="menu-news" href="<?php echo Settings('Url'); ?>/articles" class="top-link" style="font-family:'Roboto'; font-size:17px;">Les articles</a>
					</li>
				</ul>

                    <?php if(empty($user)) { ?>
                
                    <?PHP } else { ?>
                    <ul class="menu dropit">
				    <li>
				       
				</ul>
				<?php } ?>

				<div class="clear"></div>
				
			</div>
			
			
			
		
                    </div>
					
					
	</div>
