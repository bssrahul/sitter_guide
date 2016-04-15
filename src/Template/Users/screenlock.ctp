<div class="container body">

	<div class="main_container">

		<!-- page content -->
		<div class="col-md-12">
			<div class="col-middle">
				<div class="text-center text-center">
					<div style="width: 10%;margin: 0 auto;float: none !important" class="profile_pic">
						<?php 
						@$adminVal = $this->request->session()->read("Admin"); 
						 if($adminVal !=""){
							if($adminVal['admin_img'] != '' ){
							   $adminImg = $adminVal['admin_img']; 
							}else{
							   $adminImg = 'prof_photo.png';
							}
						}	
						?>

    

						<img  src="<?php echo HTTP_ROOT ;?>img/uploads/<?php echo $adminImg; ?>" alt="..." class="img-circle profile_img">
					</div>
					<h3 class="error-number lockedname"><?php echo $adminVal['full_name']; ?></h3>
					<!--<h2>Sorry but we couldnt find this page</h2>
					<p>This page you are looking for does not exsist <a href="#">Report this?</a>
					</p>-->
					<div class="mid_center">
						<h3 class="lockedname"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Locked')); ?></h3>
						<!--Login form -->
						<?php 
							echo $this->Form->create(null, [
								'url' => ['controller' => 'Users', 'action' => 'screenlock'],
								'id'=>'formsubmit'
							]);
						?>
						<?php if(isset($error) && $error!=""){ ?>
							<div>
								<p class="admin_error"><?php echo $error; ?></p>
							</div>
						<?php } ?>
							<div class="col-xs-12 form-group pull-right top_search">
								<div class="input-group">
									<?php
										echo $this->Form->password('password', ['label' => false,'autocomplete' => 'off','placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Enter password and hit enter to unlock...')),'class'=>'form-control']);
									?>
									<span class="input-group-btn">
										<button class="btn btn-default" id="submitLockForm" type="button"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Go!')); ?></button>
									</span>
								</div>
							</div>
						<?php echo $this->Form->end();?>
					</div>
				</div>
			</div>
		</div>
		<!-- /page content -->

	</div>
	<!-- footer content -->
</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
	<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
	</ul>
	<div class="clearfix"></div>
	<div id="notif-group" class="tabbed_notifications"></div>
</div>


   
<script>
$(document).ready(function(){

	$("#submitLockForm").click(function(){
			$("#formsubmit").submit();
	});
	
	$("input").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			$("#formsubmit").submit();
		}
	});
	$("#submit").click(function(){
	    $( "#formsubmit" ).submit();
	});
});

</script>
<style>
.img-circle.profile_img {
    width: 70%;
    background: #fff;
    margin-left: 0px !important;
    z-index: 1000;
    position: inherit;
    margin-top: 20px;
    border: 1px solid rgba(52, 73, 94, 0.44);
    padding: 4px;
}
.error-number {
    font-size: 50px !important;
    line-height: 80px !important;
    margin: 0 auto !important;
}
p.admin_error {
    color: #f25022;
}
</style>
