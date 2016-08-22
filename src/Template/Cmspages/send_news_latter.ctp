<?php echo $this->element('adminElements/main_editor');
   
?>
<div class="">
                   
                    <div class="clearfix"></div>

                    <div class="row">
					    <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('News Letter')); ?></h2>
									<div class="clearfix"></div>
							     </div>
								 <?php echo $this->element('adminElements/success_msg');?>
			                     <?php echo $this->element('adminElements/error_msg');?>
								<div class="x_content">
                                  <!--site settings form-->
								    <?php echo $this->Form->create(null, [
										'url' => ['controller' => 'cmspages', 'action' => 'send-news-latter'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'sendNewsForm',
										'enctype'=>'multipart/form-data',
									]);?>
									<?php if(sizeof($subscribesInfo) > 0){

                                        foreach($subscribesInfo as $subscribeInfo){

                                           $options[$subscribeInfo->email] = $subscribeInfo->email;

                                        }
                                       ?>
									<div class="item form-group">
										<h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Subscribers List')); ?></h3>
										<div class="col-md-6 col-sm-6 col-xs-12 subcriberList">
											<?php
	                                        echo $this->Form->input('email',[
												'multiple' => 'checkbox',
												'options' => $options, 
												'value' => 1,
												'hiddenField'=>false,
												'label'=>false,
												'templates' => [
											        'inputContainer' => '<div class="input select row">{{content}}</div>'
										    ]
											]);?>
                                        </div>
									</div>
                                        
									<?php } ?>
							        <div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="reply"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->textarea('Subscribes.reply',
											 ['escape' => false,
											 'value'=>$contactReplyContent->description != ''?$contactReplyContent->description:'',
											 'class'=>'form-control col-md-7 col-xs-12 tinymce', 'id'=>'elm1']);?>
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
	.subcriberList {
	  border: 2px solid #efefef;
	  height: 250px;
	  overflow-y: auto;
	  padding: 15px 10px;
	  width: 100%;
	}
</style>
<script>
$(document).ready(function(){
	setTimeout(
			function(){
				$(".subcriberList > div.row > div").addClass("col-lg-3 col-md-3 col-sm-12");
			},500
	);	
});
</script>
