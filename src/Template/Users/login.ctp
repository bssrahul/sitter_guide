    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
				<!--Login form -->
				<?php 
					echo $this->Form->create(null, [
						'url' => ['controller' => 'Users', 'action' => 'login'],
						'id'=>'formsubmit',
						'autocomplete' =>'off',
					]);
				?>
				<?php if(isset($error) && $error!=""){ ?>
					<div>
						<p class="admin_error"><?php echo $error; ?></p>
					</div>
				<?php } ?>
				
				<h1><?php echo $this->requestAction('app/get-translate/'.base64_encode('Administrator Login')); ?></h1>
				<div>
					<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Username')); ?></label>
					<?php echo $this->Form->input('username', ['label' => false,'class'=>'form-control']); ?>
					<label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Password')); ?></label>
					<?php echo $this->Form->password('password', ['label' => false,'id'=>'password','class'=>'form-control']);
					?>
					
					<div>
						<a class="btn btn-default submit" id="submit"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Login')); ?></a>
						<a class="reset_pass" title="Forgot Password ?" href="<?php echo HTTP_ROOT."Users/forgot-password"; ?>"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Lost your password?')); ?></a>
					</div>
                    <div class="clearfix"></div>
                    <div class="separator">
						<div>
                            <h1><i class="fa fa-paw" style="font-size: 26px;"></i> <?php echo SITE_TITLE; ?></h1>
							<p>©<?php echo CURRENT_YEAR; ?> <?php echo $this->requestAction('app/get-translate/'.base64_encode('All Rights Reserved')); ?>. <?php echo SITE_TITLE; ?>. <?php echo $this->requestAction('app/get-translate/'.base64_encode('Privacy and Terms')); ?></p>
                        </div>
                    </div>
					<?php echo $this->Form->end();?>
                    <!-- form -->
				</div>
			</section>
            <!-- content -->	
        </div>
    </div>
<script>
$(document).ready(function(){
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
.login_content h1::before, .login_content h1::after {
    width: 15%;
}
.admin_error{color:#C12529}
#register, #login {
    background: #f7f7f7 none repeat scroll 0 0;
    border-radius: 5px;
    padding: 10px;
    position: absolute;
    top: 0;
    border:4px solid #d3d3d3;
}
body {
    color: #73879C;
	background: #f7f7f7 none repeat scroll 0 0;
}
label {
    float: left;
    margin: 0 0 3px 3px;
}
#username,#password{
	float:left;
}
a#submit {
    float: left;
}
</style>
