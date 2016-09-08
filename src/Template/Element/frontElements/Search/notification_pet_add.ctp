<?php    
$session = $this->request->session();    
if($session->read("User.user_type") == "Basic"){ ?>
	
	<div id="popPetAddNotification" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h2 class="modal-title">
				 <strong class="text-danger"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Notification!')); ?></strong> 
			</h2>
		  </div>
		  <div class="modal-body">
			 <p ><small> 
				 
				<?php echo $this->requestAction('app/get-translate/'.base64_encode("You didn't have any pet,Please click on")); ?>  <a style="color:#72A105" href="<?php echo HTTP_ROOT."dashboard/about-guest"; ?>"  ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add Pet')); ?></a> <?php echo $this->requestAction('app/get-translate/'.base64_encode('for proceed booking request')); ?>. </small></p>
			 
		  </div>
		  <div class="modal-footer">
			  <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/about-guest"; ?>'" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Continue')); ?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Close')); ?></button>
		  </div>
		</div>
	  </div>
	</div>

<?php }else{ ?>
	 <!--Model pop up -->
        <!-- Type Sitter -->
        
		<div id="popPetAddNotification" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title">
				    <strong class="text-danger"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Notification!')); ?></strong> 
				</h2>
			  </div>
			  <div class="modal-body">
				<?php if($dog_in_home == "no"){ ?>  
					<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Dear Sitter, your "dogs in home" status currently disabled,if you still want to add pet then you need to enable the pet status')); ?>.</p><br>
					<p><?php echo $this->requestAction('app/get-translate/'.base64_encode('Are you enable pet status then click on')); ?> <a style="color:#72A105" href="<?php echo HTTP_ROOT."dashboard/about-guest"; ?>"  ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add Pet')); ?></a> <?php echo $this->requestAction('app/get-translate/'.base64_encode('for proceed booking request')); ?>. </small></p>
				<?php }else{ ?>
					 <p ><small>
				        <?php echo $this->requestAction('app/get-translate/'.base64_encode("You didn't have any pet,Please click on")); ?>  <a style="color:#72A105" href="<?php echo HTTP_ROOT."dashboard/about-guest"; ?>"  ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add Pet')); ?></a> <?php echo $this->requestAction('app/get-translate/'.base64_encode('for proceed booking request')); ?>. </small></p>
				<?php } ?>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="location.href = '<?php echo HTTP_ROOT."dashboard/house#usersitterhouses-outdoor-area-size"; ?>'" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Continue')); ?></button><button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancel')); ?></button>
			  </div>
			</div>

		  </div>
		</div>
        <!--end pop up-->
<?php } ?>
