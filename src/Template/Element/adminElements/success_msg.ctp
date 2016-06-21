<?php @$successVal = $this->request->session()->read("success"); 
if($successVal !=""){ ?>
			
						 <button class="seucc show-success-msg" aria-label="Close" data-dismiss="alert" type="button">
						 <strong>Success!</strong>
					<?php 
					 @$this->request->session()->write('error','');
					echo  @$this->request->session()->read("success");
					 @$this->request->session()->write("success","");
					?>
</button>			
			
<?php }
?>

<style>

button.seucc {
    padding: 3px 0px !important;
    cursor: pointer;
    background: transparent;
    font-weight: normal !important;
    font-size: 14px;
    border: 1px solid green;
    color: green !important;
    padding-left: 15px !important;
    opacity: 1 !important;
    width: 98%;
    float: left !important;
    margin-left: 10px;
}
</style>
