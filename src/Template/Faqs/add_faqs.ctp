<?php echo $this->element('adminElements/main_editor');?>
<div class="">
                   <div class="row">
					 <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add Faqs')); ?><small></small></h2>
									<div class="clearfix"></div>
							    </div>
								<div class="x_content">
							
							
                                    <?php echo $this->Form->create('$addfaqs', [
										'url' => ['controller' => 'faqs', 'action' => 'add_faqs'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'addpromocode',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate',
										 'autocomplete'=>'off',
										
									]);?>
									
									
									
									
									
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="promo_code"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Question')); ?> <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
										<?php 
										 echo $this->Form->input('faqs.question',[
												'label' => false,
												'required' => true,
												'class'=>'form-control col-md-7 col-xs-12']);
										 ?>
										 </div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Answer')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->input('faqs.answer',
											 ['type' => "textarea",
											 'label'=>false,
											 'required' => true,
											  'class'=>'form-control col-md-7 col-xs-12 tinymce' ]);?>
										</div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Category"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Faq Type')); ?><span class="required">*</span>
										</label>
										<div class='col-md-6 col-sm-6 col-xs-12'>
										 <?php /* echo $this->Form->radio(
												'faqs.faq_type',[												
												["value"=>'sitter','text'=>"Sitter" ,'checked'],
												["value"=>'guest','text'=>"Guest"]
												]); */
											echo $this->Form->input('faqs.faq_type', [
											'type' => 'radio',
											'label' => false,											
											'options' =>array ('sitter'=>'Sitter','guest'=>'Guest'),
										]
										);			
												 
												?>
										</div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Category"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Category')); ?><span class="required">*</span>
										</label>
										<div class='col-md-6 col-sm-6 col-xs-12'>
							<?php			 echo $this->Form->input(
												'faqs.category_id',[
												"type"=>"select",
												'label' => false,
												/* "options"=>['' => 'Select ','a'=>"A",'b'=>"B"], */
												
												"options"=> $CategoryData ,
												'class'=>'form-control col-md-7 col-xs-12','id'=>'c_type'
												
							]);//}?>
										</div>
									</div>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  ><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancel')); ?></button>
											<button id="send" type="submit" class="btn btn-success"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Submit')); ?></button>
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
		 
				$( "#c_type" ).change(function() {
					$(".ct").hide();
					$("#"+$(this).val()).show();
				});
				
		       //Add date picker
		       $( "#promocodes-start-date" ).datepicker({
				  showOtherMonths: true,
				  selectOtherMonths: true,
				  dateFormat: 'yy-mm-dd'
				});
				
				$( "#promocodes-expire-date" ).datepicker({
				  showOtherMonths: true,
				  selectOtherMonths: true,
				  dateFormat: 'yy-mm-dd'
				}); 
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
				$('#addpromocode').submit(function (e) {
				
					e.preventDefault();
					var submit = true;
					// evaluate the form using generic validaing
					if (!validator.checkAll($(this))) {
						submit = false;
					}
					if (submit)
						this.submit();
					return false;
				});
 
				
	});
	</script>
