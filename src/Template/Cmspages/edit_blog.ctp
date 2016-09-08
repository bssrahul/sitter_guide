<?php echo $this->element('adminElements/main_editor'); ?>
<div class="">
                   <div class="row">
					
					
					 <div class="col-md-12 col-sm-12 col-xs-12">
						    <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $this->requestAction('app/get-translate/'.base64_encode('Edit Blog')); ?><small></small></h2>
									<div class="clearfix"></div>
							 </div>
							 <?= $this->element('adminElements/error_msg'); ?>
							 <div class="x_content">
								<?= $this->element('adminElements/validations'); ?>
								<!--Form edit user -->
							        <?php echo $this->Form->create(null, [
										'url' => ['controller' => 'cmspages', 'action' => 'edit-blog'],
										'class'=>'form-horizontal form-label-left',
										'id'=>'editblog',
										'enctype'=>'multipart/form-data',
										'novalidate'=>'novalidate',
										 'autocomplete'=>'off',
										
									]);?>
							       <?php 
                                          $blogId = base64_encode(convert_uuencode($blogInfo->id));
									      echo $this->Form->input('blogId',[
									        'type'=>'hidden',
											'value'=>$blogId]);?>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Title')); ?>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->input('UserBlogs.title',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12',
												   'value'=>$blogInfo->title != '' ?$blogInfo->title:'']);
											?>
											
										</div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Category')); ?>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										    <?php 
													echo $this->Form->input('UserBlogs.category',[
													'templates' => ['inputContainer' => '{{content}}'],
													'type'=>'select',
													'label'=>false,
													'options'=>[''=>'-- Select Category -- ','sitter_guest'=>'Sitter Guide','timeout'=>'Timeout','event'=>'Event','news_desk'=>'News Desk'],
													'class' =>'form-control',
													 'value'=>$blogInfo->category != '' ?$blogInfo->category:''
													]);
											 ?>
											
										</div>
									</div>
									
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Description')); ?><span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											 <?php echo $this->Form->textarea('UserBlogs.description',
											 ['escape' => false,
											 'class'=>'form-control col-md-7   tinymce',
                                              'value'=>$blogInfo->description != '' ?$blogInfo->description:'']);?>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Image')); ?>
										</label>
										 <div class="col-md-6 col-sm-6 col-xs-12">
										   <?php 
												echo $this->Form->file('UserBlogs.image',[
												  'label' => false,
												  'class'=>'form-control col-md-7 col-xs-12']);
											?>
											<div class="text-centerimage view-first editImg customImg">
												<img class="img-circle profile_img catImg"  src="<?php echo HTTP_ROOT.'img/uploads/'.($blogInfo->image != ''?$blogInfo->image:'prof_photo.png'); ?>"/>
											</div>
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
				

