<?php
	@$errrVal = $this->request->session()->read("error");
	if($errrVal !=""){ 
 ?>
		<button class="close show-errors" aria-label="Close" data-dismiss="alert" type="button">
		<strong><?php echo $this->requestAction('app/get-translate/'.base64_encode('ERROR!')); ?></strong>
		<?php
			@$this->request->session()->read("success");
			echo  @$this->request->session()->read("error");
			@$this->request->session()->write("error","");
		?> 
		</button>
<?php } ?>
<style>
	button.close
	{
		padding: 3px 0px !important;
		cursor: pointer;
		background: transparent;
		font-weight: normal !important;
		font-size: 14px;
		border: 1px solid red;
		color: red !important;
		padding-left: 15px !important;
		opacity: 1 !important;
		width: 98%;
		float: left !important;
		margin-left: 10px;
	}
</style>
