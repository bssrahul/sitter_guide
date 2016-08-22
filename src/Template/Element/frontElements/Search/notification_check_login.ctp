
<!--Report popup ends--> 
<!--Start user check login pop up--> 
<!-- Modal -->
<div id="alertUserLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title ">
        
			 <strong class="text-danger"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Notification!')); ?></strong> 
		</h2>
      </div>
      <div class="modal-body">
        <p>
			<?php echo $this->requestAction('app/get-translate/'.base64_encode('Authentication Failed! You have to logged in before proceed to booking request')); ?>.
			</p>
      </div>
      <div class="modal-footer">
		  <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo HTTP_ROOT."guests/login"; ?>'" ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Continue')); ?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Close')); ?></button>
      </div>
    </div>

  </div>
</div>
<!--popup ends--> 
