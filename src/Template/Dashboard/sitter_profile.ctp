 <div class="col-md-9 col-lg-10 col-sm-8 " id="content">
        <div class="row">

        <div class="profiletab-section">
          
  <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Profile')); ?></h3>
            <ul class="nav nav-pills">
              <li id="booking-active" class="active"><a data-toggle="pill" href="#home1"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Booking For product')); ?></a></li>
              <li id="house-active"><a data-toggle="pill" href="#sitter-guest-house"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitters House/Guest House')); ?></a></li>
              <li id="property-active"><a data-toggle="pill" href="#menu2"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Property')); ?></a></li>
              <li id="professional-active"><a data-toggle="pill" href="#menu3"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Professional Accreditation')); ?></a></li>

            </ul>
          <div class="tab-sectioninner book-pro">
            <div class="tab-content">
              <div id="home1" class="tab-pane fade in active tab-comm">
                <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Below')); ?> <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('4 features')); ?></span> <?php echo $this->requestAction('app/get-translate/'.base64_encode('update the calendar to show how many spaces are availble for booking for each product')); ?></h3>
                  <!--<form role="form">-->
                 <?php $session = $this->request->session();
                    $bookingSession = $session->read('bookingProduct');

               ?> 
                   <?php echo $this->Form->create(null, [
                    'url' => ['controller' => 'dashboard', 'action' => 'save-sitter-profile'],
                    'id'=>'bookingproducts',
                    'enctype'=>'multipart/form-data',
                    'role'=>'form',
					 'autocomplete'=>'off',
                  ]);?>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('1. Day Care P/day Limit')); ?></label>
                     <!-- <input type="text" class="form-control" id="">-->

                     <?php
                       echo $this->Form->input('UserBookingProducts.day_care_limit',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class'=>'form-control',
                        'value'=>$bookingSession['UserBookingProducts']['day_care_limit'] !=''?$bookingSession['UserBookingProducts']['day_care_limit']:'']);
                      ?>
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('2. Night Care P/day Limit')); ?></label>
                      <!--<input type="text" class="form-control" id="">-->
                        <?php 
                         

                        echo $this->Form->input('UserBookingProducts.night_care_limit',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class'=>'form-control',
                        'value'=>$bookingSession['UserBookingProducts']['day_care_limit'] !=''?$bookingSession['UserBookingProducts']['day_care_limit']:'']);
                      ?>
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('3. Visits P/day Limit')); ?>  
</label>
                      <!--<input type="text" class="form-control" id="">-->
                      <?php 
                        

                        echo $this->Form->input('UserBookingProducts.visits_limit',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class'=>'form-control',
                        'value'=>$bookingSession['UserBookingProducts']['visits_limit'] !=''?$bookingSession['UserBookingProducts']['visits_limit']:'']);
                      ?>
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('4. Hourly Services P/Day Limit')); ?> </label>
                      <!--<input type="text" class="form-control" id="">-->
                        <?php 
                        
                       echo $this->Form->input('UserBookingProducts.hourly_services_limit',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class'=>'form-control',
                        'value'=>$bookingSession['UserBookingProducts']['hourly_services_limit'] !=''?$bookingSession['UserBookingProducts']['hourly_services_limit']:'']);
                      ?>
                    </div>
                  <label class="error booking" for="product-price" generated="true"></label>
                  <p class="pull-right"><input name="booking_product" id="booking-btn" type="submit" class="btn Continue" value="Continue" ></p> 
                 
                  <!--</form>-->
                  <?php echo $this->Form->end(); ?>
              </div>
                <?php $session = $this->request->session();
                    $bookingSession = $session->read('bookingProduct');
                    if(isset($bookingSession)  && !empty($bookingSession)){
               ?>
              <div id="sitter-guest-house" class="tab-pane fade tab-comm">
               <h3><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitters House')); ?></span></h3>
                 <!-- <form role="form">-->
                   <?php 
                          $house_details = $session->read('house_details');
                          if(isset($house_details)  && !empty($house_details)){}
                    
                    ?>
              <?php echo $this->Form->create(null,[
                'url' => ['controller' => 'dashboard', 'action' => 'save-sitter-profile'],
                'id'=>'userHouse','role'=>'form']); ?>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accepted Pet Sizes')); ?></label>
                     <?php echo $this->Form->input('Houses.sitter.accepted_pet_size',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','small_pets'=>'I accept small pets(0-7kg)','medium_pets'=>'I accept Medium pets (8-18kg)','large_pets'=>'I accept Large dogs (18-45kg)','gaint_dogs'=>'I accept Giant dogs (45+kg)','cats'=>'I accept cats','puppies_under_1_year'=>'I accept puppies under 1 year','kittens_under_1_year'=>'I accept kittens under 1 year','ferrets'=>'I accept ferrets','small_animals'=>'I accept small animals (rodents, rabbits birds…)','other'=>'Other (specify)','any'=>'Any'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['sitter']['accepted_pet_size'] !=''?$house_details['Houses']['sitter']['accepted_pet_size']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    <div class="form-group col-lg-6 text-italic">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Mixed Familes(I look after pets from different families)')); ?></label>
                      <!--<label for="">Mixed Familes</label>-->
                      <!--<input type="text" class="form-control" id="" placeholder="I look after pets from different families">-->

                      <?php echo $this->Form->input('Houses.sitter.mixed_familes',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>['yes'=>'Yes','no'=>'No'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['sitter']['mixed_familes'] !=''?$house_details['Houses']['sitter']['mixed_familes']:'']);
                      ?>
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Preferred Guest Ages')); ?></label>
                       <?php echo $this->Form->input('Houses.sitter.preferred_age',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','<1 year'=>'<1 year','1-3 years'=>'1-3 years','4-8 years'=>'4-8 years','9+ years'=>'9+ years','Any'=>'Any'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['sitter']['preferred_age'] !=''?$house_details['Houses']['sitter']['preferred_age']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancellation Policy')); ?></label>
                       <?php echo $this->Form->input('Houses.sitter.cancellation_policy',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flexible'=>'Flexible','moderate'=>'Moderate','strict'=>'Strict'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['sitter']['cancellation_policy'] !=''?$house_details['Houses']['sitter']['cancellation_policy']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    

                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept Un-Neutered Pets')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="SitterHouse.un_neutered_pets">Yes</label>
                    <label class="radio-inline"><input type="radio" name="SitterHouse.un_neutered_pets">No</label>  -->
                    <?php echo $this->Form->radio(
                              'Houses.sitter.un_neutered_pets',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] ,
                               'value'=>$house_details['Houses']['sitter']['un_neutered_pets'] !=''?$house_details['Houses']['sitter']['un_neutered_pets']:''                             ]
                          ); ?>
                        </span> 
                    </div>

                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept un-spayed females')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="SitterHouse.un_spayed_females">Yes</label>
                    <label class="radio-inline"><input type="radio" name="SitterHouse.un_spayed_females">No</label> -->
                     <?php echo $this->Form->radio(
                              'Houses.sitter.un_spayed_females',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  ,
                        'value'=>$house_details['Houses']['sitter']['un_spayed_females'] !=''?$house_details['Houses']['sitter']['un_spayed_females']:''                            ]
                          ); ?> 
                  </span> 
                    </div>

                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept females on heat')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="SitterHouse.females_on_heat">Yes</label>
                    <label class="radio-inline"><input type="radio" name="SitterHouse.females_on_heat">No</label>-->
                       <?php echo $this->Form->radio(
                              'Houses.sitter.females_on_heat',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  ,
                        'value'=>$house_details['Houses']['sitter']['females_on_heat'] !=''?$house_details['Houses']['sitter']['females_on_heat']:''                            ]
                          ); ?> 
                     </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept un-toilet trained pets')); ?> </label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="SitterHouse.un_trained_pets">Yes</label>
                    <label class="radio-inline"><input type="radio" name="SitterHouse.un_trained_pets">No</label> -->
                       <?php echo $this->Form->radio(
                              'Houses.sitter.un_trained_pets',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] ,
                        'value'=>$house_details['Houses']['sitter']['un_trained_pets'] !=''?$house_details['Houses']['sitter']['un_trained_pets']:''                             ]
                          ); ?> 
                  </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Last Minute Bookings')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="SitterHouse.last_minute_booking">Yes</label>
                    <label class="radio-inline"><input type="radio" name="SitterHouse.last_minute_booking">No</label>-->
                     <?php echo $this->Form->radio(
                              'Houses.sitter.last_minute_booking',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] ,
                        'value'=>$house_details['Houses']['sitter']['last_minute_booking'] !=''?$house_details['Houses']['sitter']['last_minute_booking']:''                               ]
                          ); ?> 
                     </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Longer than 1 week stays')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="SitterHouse.longer_than_week">Yes</label>
                    <label class="radio-inline"><input type="radio" name="SitterHouse.longer_than_week">No</label> -->
                     <?php echo $this->Form->radio(
                              'Houses.sitter.longer_than_week',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] ,
                        'value'=>$house_details['Houses']['sitter']['longer_than_week'] !=''?$house_details['Houses']['sitter']['longer_than_week']:''                             ]
                          ); ?>     
                  </span> 
                    </div>


                    <!--<div class="form-group col-lg-6">
                      <label for="">Cancellation Policy On house drop-in visits</label>
                        <?php echo $this->Form->input('policy_for_visits',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flexible'=>'Flexible','moderate'=>'Moderate','strict'=>'Strict'],
                        'class'=>'form-control']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>-->
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Toilet Breaks provided - every')); ?>  </label>
                      <?php echo $this->Form->input('Houses.sitter.breaks_provided_every',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','0-2'=>'0-2 hours','2-4'=>'2-4 hours','4-8'=>'4-8 hours','8+'=>'8+ hours'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['sitter']['breaks_provided_every'] !=''?$house_details['Houses']['sitter']['breaks_provided_every']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

<!--</form>
<form role="form" class="menu-2part">-->

                  <h3><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Guests House')); ?></span></h3>
             

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accepted Pet Sizes')); ?></label>
                         <?php echo $this->Form->input('Houses.guest.accepted_pet_size',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','small_pets'=>'I accept small pets(0-7kg)','medium_pets'=>'I accept Medium pets (8-18kg)','large_pets'=>'I accept Large dogs (18-45kg)','gaint_dogs'=>'I accept Giant dogs (45+kg)','cats'=>'I accept cats','puppies_under_1_year'=>'I accept puppies under 1 year','kittens_under_1_year'=>'I accept kittens under 1 year','ferrets'=>'I accept ferrets','small_animals'=>'I accept small animals (rodents, rabbits birds…)','other'=>'Other (specify)','any'=>'Any'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['guest']['accepted_pet_size'] !=''?$house_details['Houses']['sitter']['accepted_pet_size']:'']);
                      ?>
                         <!-- <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    <div class="form-group col-lg-6 text-italic">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Maximum distance travelled to Guest House')); ?></label>
                      <!--<input type="text" class="form-control" id="" placeholder="I look after pets from different families">-->
                       <?php echo $this->Form->input('Houses.guest.maximum_distance',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['guest']['maximum_distance'] !=''?$house_details['Houses']['guest']['maximum_distance']:'']);
                      ?>
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Preferred Guest Ages')); ?></label>
                        <?php echo $this->Form->input('Houses.guest.preferred_age',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','<1 year'=>'<1 year','1-3 years'=>'1-3 years','4-8 years'=>'4-8 years','9+ years'=>'9+ years','Any'=>'Any'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['guest']['preferred_age'] !=''?$house_details['Houses']['guest']['preferred_age']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancellation Policy On house sitting')); ?></label>
                          <?php echo $this->Form->input('Houses.guest.cancellation_policy',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flexible'=>'Flexible','moderate'=>'Moderate','strict'=>'Strict'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['guest']['cancellation_policy'] !=''?$house_details['Houses']['guest']['cancellation_policy']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    <div class="form-group col-lg-6 radio-center">

                          <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept Un-Neutered Pets')); ?></label>

                          <span class="pull-right">
                            <!--<label class="radio-inline">
                              <input type="radio" name="GuestHouse.un_neutered_pets">Yes</label>
                            <label class="radio-inline">
                              <input type="radio" name="GuestHouse.un_neutered_pets">No</label> -->

                         <?php echo $this->Form->radio(
                              'Houses.guest.un_neutered_pets',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] ,
                        'value'=>$house_details['Houses']['guest']['un_neutered_pets'] !=''?$house_details['Houses']['guest']['un_neutered_pets']:''                             ]
                          ); ?>
                          </span> 
                    </div>

                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept un-spayed females')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="GuestHouse.un_spayed_females">Yes</label>
                    <label class="radio-inline"><input type="radio" name="GuestHouse.un_spayed_females">No</label>-->
                    <?php echo $this->Form->radio(
                              'Houses.guest.un_spayed_females',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']     ,
                        'value'=>$house_details['Houses']['guest']['un_spayed_females'] !=''?$house_details['Houses']['guest']['un_spayed_females']:''                         ]
                          ); ?>
                     </span> 
                    </div>

                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept females on heat')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="GuestHouse.females_on_heat">Yes</label>
                    <label class="radio-inline"><input type="radio" name="GuestHouse.females_on_heat">No</label>-->
                    <?php echo $this->Form->radio(
                              'Houses.guest.females_on_heat',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  ,
                        'value'=>$house_details['Houses']['guest']['females_on_heat'] !=''?$house_details['Houses']['guest']['females_on_heat']:''                            ]
                          ); ?>
                     </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Accept un-toilet trained pets')); ?> </label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="GuestHouse.un_trained_pets">Yes</label>
                    <label class="radio-inline"><input type="radio" name="GuestHouse.un_trained_pets">No</label> -->
                     <?php echo $this->Form->radio(
                              'Houses.guest.un_trained_pets',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'] ,
                        'value'=>$house_details['Houses']['guest']['un_trained_pets'] !=''?$house_details['Houses']['guest']['un_trained_pets']:''                             ]
                          ); ?>
                  </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Last Minute Bookings')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="GuestHouse.last_minute_booking">Yes</label>
                    <label class="radio-inline"><input type="radio" name="GuestHouse.last_minute_booking">No</label> -->
                     <?php echo $this->Form->radio(
                              'Houses.guest.last_minute_booking',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']   ,
                        'value'=>$house_details['Houses']['guest']['last_minute_booking'] !=''?$house_details['Houses']['guest']['last_minute_booking']:''                           ]
                          ); ?>
                  </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Longer than 1 week stays')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="GuestHouse.longer_than_week">Yes</label>
                    <label class="radio-inline"><input type="radio" name="GuestHouse.longer_than_week">No</label>--> 
                    <?php echo $this->Form->radio(
                              'Houses.guest.longer_than_week',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  ,
                        'value'=>$house_details['Houses']['guest']['longer_than_week'] !=''?$house_details['Houses']['guest']['longer_than_week']:''                            ]
                          ); ?>
                  </span> 
                    </div>


                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cancellation Policy On house drop-in visits')); ?></label>
                      <?php echo $this->Form->input('Houses.guest.cancellation_policy_visits',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flexible'=>'Flexible','moderate'=>'Moderate','strict'=>'Strict'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['guest']['cancellation_policy_visits'] !=''?$house_details['Houses']['guest']['cancellation_policy_visits']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Toilet Breaks provided - every')); ?>  </label>
                           <?php echo $this->Form->input('Houses.guest.breaks_provided_every',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','0-2'=>'0-2 hours','2-4'=>'2-4 hours','4-8'=>'4-8 hours','8+'=>'8+ hours'],
                        'class'=>'form-control',
                        'value'=>$house_details['Houses']['guest']['breaks_provided_every'] !=''?$house_details['Houses']['guest']['breaks_provided_every']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>
                    <p><button type="button" class="btn previous pull-left"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?></button> <input type="submit" name="house_details" id="house-details-btn" class="btn Continue pull-right" value="Continue"></p>
                  <!--</form>-->
                  <?php echo $this->Form->end(); ?>
              </div>
             <?php } 
             // $session = $this->request->session();
                    $house_details = $session->read('house_details');
                    if(isset($house_details)  && !empty($house_details)){
              
              ?>
              <div id="menu2" class="tab-pane fade tab-comm">
               <h3><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Property')); ?></span></h3>
                  <!--<form role="form">-->
                <?php 
                $sitter_property = $session->read('sitter_property');
                
                echo $this->Form->create(null,[
                        'url' => ['controller' => 'dashboard', 'action' => 'save-sitter-profile'],
                        'id'=>'sitterProperty','role'=>'form']); 
                ?>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Property Type')); ?></label>
                          <?php echo $this->Form->input('UserProperties.property_type',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','flat'=>'Flat','house'=>'House','farm'=>'Farm'],
                        'class'=>'form-control',
                        'value'=>$sitter_property['UserProperties']['property_type'] !=''?$sitter_property['UserProperties']['property_type']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Outdoor Area')); ?></label>
                            <?php echo $this->Form->input('UserProperties.outdoor_area',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','balcony'=>'Balcony','backyard'=>'Backyard'],
                        'class'=>'form-control',
                        'value'=>$sitter_property['UserProperties']['outdoor_area'] !=''?$sitter_property['UserProperties']['outdoor_area']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Outdoor Area Size')); ?></label>
                          <?php echo $this->Form->input('UserProperties.outdoor_area_size',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','small'=>'Small','medium'=>'Medium','large'=>'Large'],
                        'class'=>'form-control',
                        'value'=>$sitter_property['UserProperties']['outdoor_area_size'] !=''?$sitter_property['UserProperties']['outdoor_area_size']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Outing Area (allow multiple)')); ?></label>
                      <?php echo $this->Form->input('UserProperties.outing_allow_multiple',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','urban_streets'=>'Urban Streets','beach'=>'Beach','city_park'=>'City Park','country_side'=>'Country Side','bush'=>'Bush'],
                        'class'=>'form-control',
                        'value'=>$sitter_property['UserProperties']['outing_allow_multiple'] !=''?$sitter_property['UserProperties']['outing_allow_multiple']:'']);
                      ?>
                         <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>

                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Fully Fenced Outdoor Area')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="fully_fenced">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> -->
                     <?php echo $this->Form->radio(
                              'UserProperties.fully_fenced',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  ,
                        'value'=>$sitter_property['UserProperties']['fully_fenced'] !=''?$sitter_property['UserProperties']['fully_fenced']:''                            ]
                          ); ?>
                  </span> 
                    </div>

                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Smokers')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="smokers">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label>-->
                      <?php echo $this->Form->radio(
                              'UserProperties.smokers',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']     ,
                        'value'=>$sitter_property['UserProperties']['smokers'] !=''?$sitter_property['UserProperties']['smokers']:''                         ]
                          ); ?>
                     </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Dogs in home?')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="dogs_in_home">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label>-->
                     <?php echo $this->Form->radio(
                              'UserProperties.dogs_in_home',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']   ,
                        'value'=>$sitter_property['UserProperties']['dogs_in_home'] !=''?$sitter_property['UserProperties']['dogs_in_home']:''                           ]
                          ); ?>
                     </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Cats in home?')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="cats_in_home">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label>--> 
                   <?php echo $this->Form->radio(
                              'UserProperties.cats_in_home',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']  ,
                        'value'=>$sitter_property['UserProperties']['cats_in_home'] !=''?$sitter_property['UserProperties']['cats_in_home']:''                            ]
                          ); ?>
                  </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Birds in cages')); ?> </label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="birds_in_cages">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label>-->
                    <?php echo $this->Form->radio(
                              'UserProperties.birds_in_cages',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline']   ,
                        'value'=>$sitter_property['UserProperties']['birds_in_cages'] !=''?$sitter_property['UserProperties']['birds_in_cages']:''                           ]
                          ); ?>
                     </span> 
                    </div>
                    <div class="form-group col-lg-6 radio-center emp-mobile">
                  
                    </div>


                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Children')); ?></label>
                        <?php echo $this->Form->input('UserProperties.children',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','0-5'=>'0-5','6-12'=>'6-12','both'=>'Both','none'=>'None'],
                        'class'=>'form-control',
                        'value'=>$sitter_property['UserProperties']['children'] !=''?$sitter_property['UserProperties']['children']:'']);
                      ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div>
                    <!--<div class="form-group col-lg-6">
                      <label for="">Toilet Breaks provided - every  </label>
                          
                          <select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>
                    </div>-->
                    <!--</form>
                     <form role="form">-->
                    <h3><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('About Sitter')); ?></span></h3>
                    <p><div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Years of Sitting Experience')); ?> </label>
                          <?php echo $this->Form->input('Users.sitting_experience',['class'=>'form-control', 'templates' => ['inputContainer' => '{{content}}'],
                        'value'=>$sitter_property['Users']['sitting_experience'] !=''?$sitter_property['Users']['sitting_experience']:'']); ?>
                          <!--<select class="form-control" id="sel1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                          </select>-->
                    </div></p>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Why should you take care of their guest?')); ?>  </label>
                          <!--<textarea></textarea>-->
                          <?php echo $this->Form->input('Users.take_care_desc',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea',
                        'value'=>$sitter_property['Users']['take_care_desc'] !=''?$sitter_property['Users']['take_care_desc']:'' 
                                 ]); ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Describe yourself in 35 characters')); ?>     </label>
                          <!--<textarea></textarea>-->
                          <?php echo $this->Form->input('Users.your_self',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea' ,
                        'value'=>$sitter_property['Users']['your_self'] !=''?$sitter_property['Users']['your_self']:''
                                 ]); ?>
                    </div>
                    
<!--</form>
 <form role="form">-->

                    <h3><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Photo Library')); ?></span></h3>
                    <div class="form-group col-lg-6 upload-section">
                       <p> <img src="<?php echo HTTP_ROOT; ?>img/dm.png">
                         <span><?php echo $this->requestAction('app/get-translate/'.base64_encode('(Drag & Drop / Browse)')); ?>.<br/><?php echo $this->requestAction('app/get-translate/'.base64_encode('Scale, Trash, Order (???? pixels)')); ?> </span></p>
                         <button type="button" class="btn upload-but"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload Photos')); ?></button>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Sitter Guide Carers Package')); ?> </label>
                          <!--<textarea>Carer package description...</textarea>-->
                          <?php echo $this->Form->input('Users.carers_description',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'type'=>'textarea' ,
                        'value'=>$sitter_property['Users']['carers_description'] !=''?$sitter_property['Users']['carers_description']:''
                          ]); ?>
                    </div>
                    
                  
                    

                    <p><button type="button" class="btn previous pull-left"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Previous')); ?></button> <input type="submit" name="sitter_property" id="property-btn" class="btn Continue pull-right" value="Continue"></p>
<!--</form>-->
                 <?php echo $this->Form->end(); ?>
              </div>
              <?php }
              
             /// $session = $this->request->session();
                    $sitter_property = $session->read('sitter_property');
                    if(isset($sitter_property)  && !empty($sitter_property)){
              ?>
              <div id="menu3" class="tab-pane fade tab-comm">
                <h3><span><?php echo $this->requestAction('app/get-translate/'.base64_encode('Professional Accreditation')); ?></span></h3>
                <!--<form role="form">-->
                  <?php
                   $professional = $session->read('professional_accreditation');

                   echo $this->Form->create(null,[
                        'url' => ['controller' => 'dashboard', 'action' => 'save-sitter-profile'],
                        'id'=>'userProfessionals','role'=>'form']); 
                ?>
                  <h4><i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Physician (Pets)')); ?></i></h4>
                 
                    <div class="form-group col-lg-6">
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Government Issued Medical Certificate')); ?></h5>
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                      <?php echo $this->Form->input('UserProfessionals.pets.govt.expert.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_title']:''
                      ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.pets.govt.expert.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.pets.govt.expert.expiry_date',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                             'label'=>false,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['expert']['expiry_date']:''
                      ]); ?>
                    </div>

                    <div class="form-group col-lg-6">
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Student - Government Issued Medical Certificate')); ?></h5>
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                       <?php echo $this->Form->input('UserProfessionals.pets.govt.student.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['student']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['student']['qualification_title']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.pets.govt.student.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['pets']['govt']['student']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['student']['qualification_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.pets.govt.student.expiry_date',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                             'label'=>false,
                              'value'=>$professional['UserProfessionals']['pets']['govt']['student']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['govt']['student']['expiry_date']:''
                      ]); ?>
                    </div>

                    <div class="form-group col-lg-6">
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Private Sector Issued Medical Ceritficate')); ?></h5>
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                      <?php echo $this->Form->input('UserProfessionals.pets.private.expert.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['pets']['private']['expert']['qualification_title'] !=''?$professional['UserProfessionals']['pets']['private']['expert']['expiry_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.pets.private.expert.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['pets']['private']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['private']['expert']['qualification_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.pets.private.expert.expiry_date',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                             'label'=>false,
                              'value'=>$professional['UserProfessionals']['pets']['private']['expert']['expiry_date'] !=''?$professional['UserProfessionals']['pets']['private']['expert']['expiry_date']:''
                      ]); ?>
                    </div>

                    <div class="form-group col-lg-6">
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Student - Private Sector Issued Mediacal Ceritficate')); ?>   </h5>
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                       <?php echo $this->Form->input('UserProfessionals.pets.private.student.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['pets']['private']['student']['qualification_title'] !=''?$professional['UserProfessionals']['pets']['private']['student']['qualification_title']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.pets.private.student.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['pets']['private']['student']['qualification_date'] !=''?$professional['UserProfessionals']['pets']['private']['student']['qualification_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.pets.private.student.expiry_date',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                             'label'=>false,
                             'value'=>$professional['UserProfessionals']['pets']['private']['student']['expiry_date'] !=''?$professional['UserProfessionals']['pets']['private']['student']['expiry_date']:''
                      ]); ?>

                    </div>
<!--</form>
<form role="form">-->
                     <h4><i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Physician (People)')); ?></i></h4>
                 
                    <div class="form-group col-lg-6">
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Government Issued Medical Certificate')); ?>  </h5>
                     <!-- <input type="text" placeholder="Qualification Title" id="" class="form-control">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                       <?php echo $this->Form->input('UserProfessionals.people.govt.expert.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                'value'=>$professional['UserProfessionals']['people']['govt']['expert']['qualification_title'] !=''?$professional['UserProfessionals']['people']['govt']['expert']['qualification_title']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.people.govt.expert.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['people']['govt']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['people']['govt']['expert']['qualification_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.people.govt.expert.expiry_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['people']['govt']['expert']['expiry_date'] !=''?$professional['UserProfessionals']['people']['govt']['expert']['expiry_date']:''
                      ]); ?>
                    </div>

                    <div class="form-group col-lg-6">
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Student - Government Issued Medical Certificate')); ?>    </h5>
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                      <?php echo $this->Form->input('UserProfessionals.people.govt.student.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['people']['govt']['student']['qualification_title'] !=''?$professional['UserProfessionals']['people']['govt']['student']['qualification_title']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.people.govt.student.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['people']['govt']['student']['qualification_date'] !=''?$professional['UserProfessionals']['people']['govt']['student']['qualification_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.people.govt.student.expiry_date',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                             'label'=>false,
                              'value'=>$professional['UserProfessionals']['people']['govt']['student']['expiry_date'] !=''?$professional['UserProfessionals']['people']['govt']['student']['expiry_date']:''
                      ]); ?>
                    </div>

                    <div class="form-group col-lg-6">
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Private Sector Issued Medical Ceritficate')); ?></h5>
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                       <?php echo $this->Form->input('UserProfessionals.people.private.expert.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['people']['private']['expert']['qualification_title'] !=''?$professional['UserProfessionals']['people']['private']['expert']['qualification_title']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.people.private.expert.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['people']['private']['expert']['qualification_date'] !=''?$professional['UserProfessionals']['people']['private']['expert']['qualification_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.people.private.expert.expiry_date',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                             'label'=>false,
                             'value'=>$professional['UserProfessionals']['people']['private']['expert']['expiry_date'] !=''?$professional['UserProfessionals']['people']['private']['expert']['expiry_date']:''
                      ]); ?>
                    </div>

                    <div class="form-group col-lg-6">
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode('Student - Private Sector Issued Mediacal Ceritficate')); ?>   </h5>
                      <!--<input type="text" placeholder="Qualification Title" id="" class="form-control">
                      <input type="text" placeholder="Graduation Date" id="" class="form-control">
                      <input type="text" placeholder="Expiry Date of Certification" id="" class="form-control">-->
                        <?php echo $this->Form->input('UserProfessionals.people.private.student.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['people']['govt']['student']['qualification_title'] !=''?$professional['UserProfessionals']['people']['govt']['student']['qualification_title']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.people.private.student.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['people']['private']['student']['qualification_date'] !=''?$professional['UserProfessionals']['people']['private']['student']['qualification_date']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.people.private.student.expiry_date',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                             'label'=>false,
                             'value'=>$professional['UserProfessionals']['people']['private']['student']['expiry_date'] !=''?$professional['UserProfessionals']['people']['private']['student']['expiry_date']:''
                      ]); ?>
                    </div>
                    
                    

                <!--</form>
                
                
                <form role="form" class="menu-3part">-->
                     <h4><i><?php echo $this->requestAction('app/get-translate/'.base64_encode('Other Qualifications & Specific Skills')); ?> </i></h4>
                     <h5><?php echo $this->requestAction('app/get-translate/'.base64_encode(' Please specify')); ?></h5>
                     <div class="form-group col-lg-6">
                     <!--<input type="text" id="" class="form-control" placeholder="Qualification Title">
                      <input type="text" id="" class="form-control" placeholder="Expiry Date of Certification">-->
                        <?php echo $this->Form->input('UserProfessionals.other.other.other.qualification_title',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Qualification Title')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['other']['other']['other']['qualification_title'] !=''?$professional['UserProfessionals']['other']['other']['other']['qualification_title']:''
                          ]); ?>
                      <?php echo $this->Form->input('UserProfessionals.other.other.other.qualification_date',[
                                 'class'=>'form-control',
                                 'templates' => ['inputContainer' => '{{content}}'],
                                 'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Graduation Date')),
                                 'label'=>false,
                                 'value'=>$professional['UserProfessionals']['other']['other']['other']['qualification_date'] !=''?$professional['UserProfessionals']['other']['other']['other']['qualification_date']:''
                          ]); ?>
                      
                    </div>
                    <div class="form-group col-lg-6">
                     <!--<input type="text" id="" class="form-control" placeholder="Graduation Date">-->
                        <?php echo $this->Form->input('UserProfessionals.other.other.other.expiry_date',[
                             'class'=>'form-control',
                             'templates' => ['inputContainer' => '{{content}}'],
                             'placeholder'=>$this->requestAction('app/get-translate/'.base64_encode('Expiry Date of Certification')),
                             'label'=>false,
                             'value'=>$professional['UserProfessionals']['other']['other']['other']['expiry_date'] !=''?$professional['UserProfessionals']['other']['other']['other']['expiry_date']:''
                      ]); ?>
                    </div>
                   <div class="add-more-div">
                    <p class="add-more-expand
                     one"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Add More')); ?> <i class="fa fa-plus-circle pull-right"></i></p>
                    <div class="add-more-inner" id="one" style="display:none;">
                    
                    <div class="form-group">
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Do you know First Aid for')); ?> </label>
                          <!--<select id="sel1" class="form-control">
                          <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                        
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.first_aid_for',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>$professional['UserProfessionalsDetails']['first_aid_for'] !=''?$professional['UserProfessionalsDetails']['first_aid_for']:'']);
                      ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Do you know CPR for')); ?> </label>
                          <!--<select id="sel1" class="form-control">
                           <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                     <?php echo $this->Form->input('UserProfessionalsDetails.cpr_for',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                         'value'=>$professional['UserProfessionalsDetails']['cpr_for'] !=''?$professional['UserProfessionalsDetails']['cpr_for']:'']);
                      ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('I can administer Oral Medications')); ?> </label>
                          <!--<select id="sel1" class="form-control">
                           <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.oral_medications',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                         'value'=>$professional['UserProfessionalsDetails']['oral_medications'] !=''?$professional['UserProfessionalsDetails']['oral_medications']:'']);
                      ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('I canadminister Injected Medications')); ?></label>
                          <!--<select id="sel1" class="form-control">
                        <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.injected_medications',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>$professional['UserProfessionalsDetails']['injected_medications'] !=''?$professional['UserProfessionalsDetails']['injected_medications']:'']);
                      ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Familiar with Pet Training Techniques')); ?></label>
                         <!--<select id="sel1" class="form-control">
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.training_techniques',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','cat'=>'Cat','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>$professional['UserProfessionalsDetails']['training_techniques'] !=''?$professional['UserProfessionalsDetails']['training_techniques']:'']);
                      ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Experience with Behavioural Problems')); ?></label>
                          <!--<select id="sel1" class="form-control">
                            <option>Adults</option>
                          <option>Children</option>
                          <option>Infants</option>
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.ex_behavioural_problems',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','adults'=>'Adults','children'=>'Children','infants'=>'Infants','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>$professional['UserProfessionalsDetails']['ex_behavioural_problems'] !=''?$professional['UserProfessionalsDetails']['ex_behavioural_problems']:'']);
                      ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Experience with Rescue Pets')); ?> </label>
                          <!--<select id="sel1" class="form-control">
                          <option>Dog</option>
                          <option>Cat</option>
                          <option>Other (specify)</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.ex_rescue_pets',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>[''=>'---','cat'=>'Cat','dog'=>'Dog','other'=>'Other (specify)'],
                        'class'=>'form-control',
                        'value'=>$professional['UserProfessionalsDetails']['ex_rescue_pets'] !=''?$professional['UserProfessionalsDetails']['ex_rescue_pets']:'']);
                      ?>
                    </div>
                    <div class="form-group col-lg-6">
                      <label for=""><?php echo $this->requestAction('app/get-translate/'.base64_encode('Languages')); ?></label>
                          <!--<select id="sel1" class="form-control">
                            <option>English</option>
                            <option>Chinese</option>
                            <option>Czech</option>
                            <option>Danish</option>
                            <option>Dutch</option>
                            <option>Finnish</option>
                            <option>French</option>
                            <option>German</option>
                            <option>Italian</option>
                            <option>Japanese</option>
                            <option>Maori</option>
                            <option>Norwegian</option>
                            <option>Portugese</option>
                            <option>Russian</option>
                            <option>Spanish</option>
                            <option>Swedish</option>
                            <option>Other</option>
                          </select>-->
                      <?php echo $this->Form->input('UserProfessionalsDetails.language',[
                        'templates' => ['inputContainer' => '{{content}}'],
                        'label' => false,
                        'type'=>'select',
                        'options'=>['en'=>'English','fr'=>'French','de'=>'German','hu'=>'Hungarian','it'=>'Italian','ro'=>'Romanian','ru'=>'Russion','es'=>'spanish'],
                        'class'=>'form-control',
                        'value'=>$professional['UserProfessionalsDetails']['language'] !=''?$professional['UserProfessionalsDetails']['language']:'']);
                      ?>
                    </div>
                    <div class="form-group col-lg-6 radio-center">
                    <label><?php echo $this->requestAction('app/get-translate/'.base64_encode('Experience as Volunteer with Animal Welfare')); ?></label>
                    <span class="pull-right"><!--<label class="radio-inline"><input type="radio" name="optradio">Yes</label>
                    <label class="radio-inline"><input type="radio" name="optradio">No</label> -->
                    <?php echo $this->Form->radio(
                              'UserProfessionalsDetails.ex_volunteer',
                              [
                                  ['value' => 'yes', 'text' => 'Yes'],
                                  ['value' => 'no', 'text' => 'No']
                              ],[
                                'label'=>['class'=>'radio-inline'],
                                'value'=>$professional['UserProfessionalsDetails']['ex_volunteer'] != ''?$professional['UserProfessionalsDetails']['ex_volunteer']:''      
                                 ]
                               
                          ); ?>
                  </span> 
                    </div>
                        
                      
                    </div>
                    
                    </div>
                   
                   </div>
                     <p> <input name="professional_accreditation" id="professional-btn" class="btn Continue pull-right" type="submit" value="Submit"></p>
                     
                     <!--</form>-->
                     <?php echo $this->Form->end(); ?>
              </div>
              <?php } ?>
            </div>
        
          </div>
        </div>

        </div>
      </div>
