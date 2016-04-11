<div class="item form-group">
<?php 
   $session = $this->request->session();
   @$sessinError = $session->read("errors");

   $displayErrorMsg = isset($errors)?$errors:@$sessinError;	
   
   if(isset($displayErrorMsg) && !empty($displayErrorMsg)){
  
	    $newErrorArray=array();
		foreach($displayErrorMsg as $key => $value) {
			foreach($value as $newVal){
				$newErrorArray[] = $newVal;
			}
		}
		 //;
		foreach($newErrorArray as $displayError){
			echo '<button class="close show-errors" aria-label="Close" data-dismiss="alert" type="button">'.$displayError."</button><br/>";	
				
		}
	}
	$session->write("errors","");
?>
</div>
<style>

button.close {
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