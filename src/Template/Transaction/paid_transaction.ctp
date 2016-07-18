
<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon"> Transaction
      </h3>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-6">
      <ol class="breadcrumb text-right">
        <li> You are here : 
        </li>
        <li>
          <a href="#">Home
          </a>
        </li>
        <li class="active">Transaction
        </li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="transaction-pills">
        <div class="transaction-top">
          
          <ul class="nav nav-pills nav-justified">
            <li class="active">
              <a href="<?php echo HTTP_ROOT;?>transaction/paid-transaction">Amount Paid</a>
            </li>
            
            <li>
              <a href="<?php echo HTTP_ROOT;?>transaction/recieved-transaction">Amount Recieved</a>
            </li>
            
          </ul>
          
        </div>
        
        <div class="tab-content">
          <div id="receive" >
            <div id="transaction-table">
              <?php 
				if(!empty($transactionData)){
				?>	
					<table class="col-md-12  table-condensed cf border1 nopad">
						
						<thead class="cf">
						  <tr class="title-bg border-bott">
							
							<th class="pad-l20">Member</th>
							
							<th class="pad-l20">Amount</th>
																			
							<th>Description</th>
							
							<th>Location</th>
							
							<th class="numeric">Time</th>
							
						  </tr>
						</thead>
						
						<tbody>
				<?php		
					foreach($transactionData as $rating){
						?>
						 <tr>
							<td data-title="Member" class="width220">
							  <span class="c-img">
								
								<?php if(($rating['booking_request']['user']['facebook_id']) !="" && ($rating['booking_request']['user']['is_image_uploaded'])==0){?>
									<img  width="45" height="45" class="img-circle"  src="<?php if($rating['booking_request']['user']['image'] != ""){echo $rating['user']['image'];}
									else{ echo $user['booking_request']['image']='prof_photo.png';} ?>"> 
							   
							   <?php }else{ ?>
								<img  width="45" height="45" class="img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.($rating['booking_request']['user']['image'] != ''?$rating['booking_request']['user']['image']:'prof_photo.png'); ?>"> 					   
									
								   
							 <?php  } ?>
							  </span> 
							  <span class="c-name"><?php echo isset($rating['booking_request']['user']['first_name'])?$rating['booking_request']['user']['first_name']." ".@$rating['booking_request']['user']['last_name']:''; ?>
							  </span>
							</td>
							
							<td data-title="Description"><?php echo isset($rating['amount'])?ucwords($rating['currency'])." <b>".$rating['amount']."</b>":'0'; ?>
							
							<td data-title="Description"><?php echo isset($rating['description'])?$rating['description']:'Description not added'; ?>
							</td>
							<td data-title="Location"><?php echo isset($rating['booking_request']['user']['state'])?$rating['booking_request']['user']['state']:''; ?> <?php isset($rating['user']['country'])?", ".$rating['user']['country']:''; ?>
							</td>
							<td data-title="Time" class="numeric"><?php echo isset($rating['created'])?date("F j, Y", strtotime($rating['created'])):'-----'; ?>
							</td>
						   
						  </tr>
						<?php
					}
				?>
					</tbody>
				</table>
				<?php	
				}else{ ?>
				<div class="col-md-12 col-lg-12 col-sm-12">
					<h5>No transaction recieved yet</h5>
				</div>
				<?php	
				}
              ?>
             
					
                 
               
               
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
