 <style></style><link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"></style>
 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
                   <div class="row">
					 <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('users/get-translate/'.base64_encode('Review')); ?><small></small></h2>
									<div class="clearfix"></div>
							    </div>
								<div class="x_content">
							
							        <?php echo $this->Form->create($reviewData, [
										/*'url' => ['controller' => 'partners', 'action' => 'add-partner'],*/
										'class'=>'form-horizontal form-label-left',
										'id'=>'editrating',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate',
										'autocomplete' =>'off',
										
									]);?>
								<?php foreach($reviewData as $reviewInfo){ ?>	
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="comment"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Comment')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->input('comment',
											 ['type' => "textarea",
											 'label'=>false,
											 'required' => true,
											  'class'=>'form-control col-md-7 col-xs-12' ,
											  'value'=>$reviewInfo->comment != '' ?$reviewInfo->comment:'']);?>
											  <label class="error" for="comment" generated="true"></label>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rating"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Rating')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
									
											<fieldset class="rating" value="">
												<input type="radio" id="star5" name="rating" value="5" <?php if($reviewInfo->rating == 5){ echo "checked"; } ?> /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
												<input type="radio" id="star4half" name="rating" value="4.5" <?php if($reviewInfo->rating == 4.5){ echo "checked"; } ?>/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
												<input type="radio" id="star4" name="rating" value="4" <?php if($reviewInfo->rating == 4){ echo "checked"; } ?>/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
												<input type="radio" id="star3half" name="rating" value="3.5" <?php if($reviewInfo->rating == 3.5){ echo "checked"; } ?> /><label class="half" for="star3half" title=" 3.5 stars"></label>
												<input type="radio" id="star3" name="rating" value="3" <?php if($reviewInfo->rating == 3){ echo "checked"; } ?>/><label class = "full" for="star3" title=" 3 stars"></label>
												<input type="radio" id="star2half" name="rating" value="2.5" <?php if($reviewInfo->rating == 2.5){ echo "checked"; } ?>/><label class="half" for="star2half" title=" 2.5 stars"></label>
												<input type="radio" id="star2" name="rating" value="2" <?php if($reviewInfo->rating == 2){ echo "checked"; } ?> /><label class = "full" for="star2" title=" 2 stars"></label>
												<input type="radio" id="star1half" name="rating" value="1.5" <?php if($reviewInfo->rating == 1.5){ echo "checked"; } ?>/><label class="half" for="star1half" title=" 1.5 stars"></label>
												<input type="radio" id="star1" name="rating" value="1" <?php if($reviewInfo->rating == 1){ echo "checked"; } ?>/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
												<input type="radio" id="starhalf" name="rating" value="0.5" <?php if($reviewInfo->rating == 0.5){ echo "checked"; } ?> /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
											</fieldset>
										</div>
									</div>
								<?php } ?>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  ><?php echo $this->requestAction('users/get-translate/'.base64_encode('Cancel')); ?></button>
											<button id="send" type="submit" class="btn btn-success"><?php echo $this->requestAction('users/get-translate/'.base64_encode('Submit')); ?></button>
										</div>
									</div>
								</div>
                                    <?php echo $this->form->end(); ?>
                                <!-- end form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<style>
				.ct{
				display:none;
				}
                </style>			
		 <script>
		
		 $(document).ready(function(){
		 
				/* $( "#c_type" ).change(function() {
					$(".ct").hide();
					$("#"+$(this).val()).show();
				}); */
				
		       //Add date picker
		      /*  $( "#promocodes-start-date" ).datepicker({
				  showOtherMonths: true,
				  selectOtherMonths: true,
				  dateFormat: 'yy-mm-dd'
				});
				
				$( "#promocodes-expire-date" ).datepicker({
				  showOtherMonths: true,
				  selectOtherMonths: true,
				  dateFormat: 'yy-mm-dd'
				}); */ 
			   /*$('#promocodes-start-date').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4",
				format: 'YYYY-MM-DD'
				}, function (start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
		        $('#promocodes-expire-date').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4",
				format: 'YYYY-MM-DD'
				}, function (start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});*/
				// initialize the validator function
				//validator.message['date'] = 'not a real date';

				// validate a field on "blur" event, a 'select' on 'change' event & a 
			/* 	$('#addrating').submit(function (e) {
				
					e.preventDefault();
					var submit = true;
					// evaluate the form using generic validaing
					if (!validator.checkAll($(this))) {
						submit = false;
					}
					if (submit)
						this.submit();
					return false;
				}); */
 
				
	});
	</script>
</div></div>
