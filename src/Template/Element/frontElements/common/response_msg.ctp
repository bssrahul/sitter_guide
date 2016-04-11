<?php 
@$successVal = $this->request->session()->read("success"); 
if($successVal !=""){ ?>
	<div role="navigation" class="success_msg navbar navbar-custom">
		<div role="banner" class="drawer-navbar">
			<div class="response_msg_container drawer-container">
				<span><i class="fa fa-check-square"></i> 
 
					<?php echo  @$this->request->session()->read("success");
								@$this->request->session()->write("success","");
					?>
				</span>
			</div>
		</div>
	</div>
<?php } ?>

<?php 
@$errorVal = $this->request->session()->read("error"); 
if($errorVal !=""){ ?>
	<div role="navigation" class="error_msg navbar navbar-custom">
		<div role="banner" class="drawer-navbar">
			<div class="response_msg_container drawer-container">
				<span><i class="fa fa-exclamation-triangle"></i>  
					<?php echo  @$this->request->session()->read("error");
								@$this->request->session()->write("error","");
					?>
				</span>
			</div>
		</div>
	</div>
<?php } ?>
