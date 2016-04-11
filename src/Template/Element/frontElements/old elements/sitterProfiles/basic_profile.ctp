<?php echo $this->Form->create(null, [
									'url' => ['controller' => 'dashboard', 'action' => 'save-minder-details'],
									'role'=>'form',
									'id'=>'baseProfileForm',
									'enctype'=>'multipart/form-data'
									]);?>
				       <h2>Give your profile an awesome title *</h2>
					   <div class="form-group">
						<label for="awesome_title">First impressions count, and this is the first thing people read when they visit your profile.</label>
						  <?php
						$session = $this->request->session();
						$basicProfile = $session->read('basicProfile');
						
						  echo $this->Form->input('Users[awesome_title]',[
										'class'=>'form-control',
										'label'=>false,
										'value'=>
										isset($basicProfile)?$basicProfile['Users']['awesome_title']:""
										]);
									 ?>
						</div>
						<div class="form-group">
						<label for="your_story">Try to convince people that you are the best pet minder for the job. Talk about things like, what makes you different and why you love animals.</label>
						  <?php
						  echo $this->Form->input('Users[your_story]',[
											'class'=>'form-control',
											'label'=>false,
											'value'=>
										      isset($basicProfile)?$basicProfile['Users']['your_story']:""
											]);
									 ?>
						</div>
						<div class="form-group">
						<label for="image">Profile Pic</label>
								<?php 
									echo $this->Form->file('image',[
									  'class'=>'form-control',
									  'id'=>'image'
									  
									  ]);
								?>
						  <?php if($basicProfile){
						  ?>
								<img alt="Image not found" style="margin:5px" height="100px"; width="100px"; src="<?php echo HTTP_ROOT.'img/uploads/'.($basicProfile['Users']['image'] != ''?$basicProfile['Users']['image']:'prof_photo.png'); ?>"/>
								<?php } ?>
						</div>
					  <!-- <a data-toggle="tab" href="#extendedProfile"><button  class="btn btn-success">Continue</button></a>-->
					  <input type="submit" class="btn btn-success" id="submitBase" value="Continue"/>
					  
				       <a data-toggle="tab" href="#gettingStarted"><button  class="btn btn-success">Back</button></a>
					   
					<?php echo $this->Form->end();//echo 'baseProfile';//include('inc_exe_sum.ctp'); ?>