<div class="col-md-9 col-lg-10 col-sm-8 lg-width80" >
  
  <div class="row db-top-bar-header no-padding-left no-padding-right bg-title">
    
    <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
      <h3>
        <img src="<?php echo HTTP_ROOT; ?>img/db-profile-home-icon.png" alt="db-profile-home-icon">&nbsp Communication 
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
        <li class="active">Communication
        </li>
      </ol>
    </div>
  
  </div>
  
  <div class="communication-wrap">
    <div class="row">
      <div class="col-xs-12 col-sm-12 xol-md-12">
        <h3 class="payment-heading1">Your Payment Methods
        </h3>
        <p class="payment-text">Select your default method for payments on Rover. Rover accepts all major credit and debit cards. 
        </p>
        <div class="pay-outside-wrap">
          <h5 class="baddress"> Billing Address
          </h5>
			<?php echo $this->Form->create(null, [
				'url' => ['controller' => 'booking', 'action' => 'add-personal-details'],
				'id'=>'addBillingDetail',
				'autocomplete'=>'off',
			]);?>
            
            <div class="form-group">
              <label>Address Line 1
              </label>
              <?php 
				echo $this->Form->input('Booking.address_1',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'Address line 1',
				]);
				?>
            </div>
           
            <div class="form-group">
              <label>Address Line 2
              </label>
              <?php 
				echo $this->Form->input('Booking.address_2',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'Address line 2',
				]);
				?>
            </div>
           
            <div class="row">
              <div class="col-lg-6 col-sm-4 col-md-6 col-xs-12 ">
                <div class="form-group">
                  <label>City
                  </label>
                  <?php 
				echo $this->Form->input('Booking.city',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'City',
				]);
				?>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 ">
                <div class="form-group">
                  <label>State
                  </label>
                                 
                  <select autocomplete="address-level1" required="" id="state" name="Booking[state]" class="form-control selectpicker">
                    <option selected="" disabled="" value="">State</option>
                    <option value="AL">AL</option>
                    <option value="AK">AK</option>
                    <option value="AZ">AZ</option>
                    <option value="AR">AR</option>
                    <option value="CA">CA</option>
                    <option value="CO">CO</option>
                    <option value="CT">CT</option>
                    <option value="DE">DE</option>
                    <option value="DC">DC</option>
                    <option value="FL">FL</option>
                    <option value="GA">GA</option>
                    <option value="HI">HI</option>
                    <option value="ID">ID</option>
                    <option value="IL">IL</option>
                    <option value="IN">IN</option>
                    <option value="IA">IA</option>
                    <option value="KS">KS</option>
                    <option value="KY">KY</option>
                    <option value="LA">LA</option>
                    <option value="ME">ME</option>
                    <option value="MD">MD</option>
                    <option value="MA">MA</option>
                    <option value="MI">MI</option>
                    <option value="MN">MN</option>
                    <option value="MS">MS</option>
                    <option value="MO">MO</option>
                    <option value="MT">MT</option>
                    <option value="NE">NE</option>
                    <option value="NV">NV</option>
                    <option value="NH">NH</option>
                    <option value="NJ">NJ</option>
                    <option value="NM">NM</option>
                    <option value="NY">NY</option>
                    <option value="NC">NC</option>
                    <option value="ND">ND</option>
                    <option value="OH">OH</option>
                    <option value="OK">OK</option>
                    <option value="OR">OR</option>
                    <option value="PA">PA</option>
                    <option value="RI">RI</option>
                    <option value="SC">SC</option>
                    <option value="SD">SD</option>
                    <option value="TN">TN</option>
                    <option value="TX">TX</option>
                    <option value="UT">UT</option>
                    <option value="VT">VT</option>
                    <option value="VA">VA</option>
                    <option value="WA">WA</option>
                    <option value="WV">WV</option>
                    <option value="WI">WI</option>
                    <option value="WY">WY</option>
                </select>
                  
                </div>
              </div>
              <div class="col-lg-2 col-sm-4 col-md-2 col-xs-12 ">
                <div class="form-group">
                  <label>Zip Code
                  </label>
                  <?php 
				echo $this->Form->input('Booking.zip',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => false,
							'type'=>'text',
							'class'=>'form-control',
							'placeholder'=>'Zip',
				]);
				?>
                </div>
              </div>
            </div>
            <div class="payment-last">
              <div class="checkbox">
                <label>
                  <?php 
				echo $this->Form->input('Booking.save_cards',[
							'templates' => ['inputContainer' => '{{content}}'],
							'label' => 'Save address for future use ',
							'type'=>'checkbox',
							
							
				]);
				?> 
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="pay-tpborder">
                  <ul class="list-inline">
                    <li>Step 2 of 2
                    </li>
                    <li class="pull-right">
                      <input type='submit' class="btn paybtn" value="Save Card" />
                    </li>
                  </ul>
                </div>
              </div>
            </div>
         <?php echo $this->Form->end(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
