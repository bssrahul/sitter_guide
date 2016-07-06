<?php 
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
use Cake\Network\Email\Email;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Core\Exception\Exception;

require_once(ROOT . DS  . 'vendor' . DS  . 'stripe' . DS . 'stripe-php' . DS . 'init.php');
use Stripe;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */

class BookingController extends AppController
{
	public $helpers = ['Form'];
	/**
	* Function which is call at very first when this controller load
	*/
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $session = $this->request->session();
		$this->set('logedInUserId', $session->read('User.id'));
		
		if(!$this->CheckGuestSession() && in_array($this->request->action,array('sitterDetails','thankYou','sitterContact'))){
			$this->setErrorMessage($this->stringTranslate(base64_encode('Authentication Failed! Please log in before.')));
			
			return $this->redirect(['controller' => 'Guests','action'=>'home']);
		}
		
		
    }
   
    public function initialize()
    {

		parent::initialize();
		// Loaded EmailTemplate Model
		$SiteModel = TableRegistry::get('siteConfigurations');
		$siteConfiguration = $SiteModel->find('all')->first();
		$this->set('siteConfiguration', $siteConfiguration);
		
		
	}
	
	/**
	* Function to Charge user card
	*/
	
	function addCard(){
				
		$this->viewBuilder()->layout('profile_dashboard');
		
		$UserCardsModel = TableRegistry::get('UserCards');
		$session = $this->request->session();
		
		$UserCardsObj = $UserCardsModel->find('all',['conditions' => ['UserCards.user_id' =>$session->read('User.id')]])->hydrate(false);
		$UserCardsData = $UserCardsObj->first();
		
		$this->set('UserCardsData',$UserCardsData);
		
	}
	
	function addCardDetails(){
		
		$this->request->data = $_REQUEST; 
		
		$UserCardsModel = TableRegistry::get('UserCards');
		$session = $this->request->session();
		
		$UserCardsObj = $UserCardsModel->find('all',['conditions' => ['UserCards.user_id' =>$session->read('User.id')]]);
		$UserCardsPrefilledData = $UserCardsObj->first();
		$this->set('UserCardsData',$UserCardsPrefilledData);
		if(isset($this->request->data['Booking']) && !empty($this->request->data['Booking'])){
			//Check Valid data	
			$error=$this->validate_card_detail($this->request->data);
			
			if(count($error) == 0)
			{
				try {
				// Set your secret key: remember to change this to your live secret key in production
				// See your keys here https://dashboard.stripe.com/account/apikeys
				\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);
				
				//Explod expiry date from slash
				
				$explodedDate = explode("/",str_replace(" ",'',$this->request->data['Booking']['expiary_date']));
				
				
				//if provided card details are valid then genrate token id
				$t = \Stripe\Token::create(array( "card" => array(
				"number" => $this->request->data['Booking']['card_number'],
				"exp_month" => str_replace(" ",'',$explodedDate[0]),
				"exp_year" => "20".str_replace(" ",'',$explodedDate[1]),
				"cvc" => $this->request->data['Booking']['cvv_code']  )));
				
				$token = $t->id; //Token genrated by stripe
				
					if (!isset($token))
						throw new Exception("The Stripe Token not generated correctly");
						
					//Check token id exists or not
					if(isset($t->id) && $t->id !=''){
						
						//Check details are saved into table or not
			
						if($UserCardsObj->count() <= 0){
							
							//Create user description for create user on stripe
							$user_description = ucwords($session->read('User.name'))."-".$session->read('User.id')." has been saved own card details for fast payment";
					
							// Create a Customer on stripe if user not exist in our database and stripe
							$customer = \Stripe\Customer::create(array(
							  "source" => $token,
							   "email" => $session->read('User.email'),
							  "description" => $user_description)
							);		
							
							if (!isset($customer->id))	
							throw new Exception("The Stripe customer not created correctly");
							
							if(isset($customer->id) && $customer->id !=''){
								
								$UserCardsSaveData = $UserCardsModel->newEntity();
								
								$UserCardsSaveData = $UserCardsModel->patchEntity($UserCardsSaveData, $this->request->data['Booking']);
								
								$UserCardsSaveData->stripe_customer_id = $customer->id;
								
								$UserCardsSaveData->user_id = $session->read('User.id');
								
								$UserCardsSaveData->expiary_date = $this->request->data['Booking']['expiary_date'];
								
								$UserCardsSaveData->cvv_code = $this->request->data['Booking']['cvv_code'];
								
								$UserCardsSaveData->card_number = $this->ccMasking(str_replace(" ",'',$this->request->data['Booking']['card_number'])); //Masking for card number
								
								//Save data into our database
								if($UserCardsModel->save($UserCardsSaveData)){
									$this->setSuccessMessage($this->stringTranslate(base64_encode('Your card details have been saved.')));
									echo "success:add_personal_details";die;
								
								}else{
									$this->setErrorMessage($this->stringTranslate(base64_encode('Something went wrong')));
									echo "error:Something went wrong";die;
								}
								
							}else{
								$this->setErrorMessage($this->stringTranslate(base64_encode('Kindly use valid card details.')));
								echo "error:Kindly use valid card details";die;
							}
							
						}else{
							
							//Create user description for create user on stripe
							$user_description = ucwords($session->read('User.name'))."-".$session->read('User.id')." has been updated own card details for fast payment";
							
							$cu = \Stripe\Customer::retrieve($UserCardsPrefilledData->stripe_customer_id);
							$cu->description = $user_description;
							$cu->source = $token; // obtained with Stripe.js
							
					    	 // Add additional error handling here as needed
					
							if($cu->save()){
								
								$UserCardsSaveData = $UserCardsModel->newEntity();
								
								$UserCardsSaveData = $UserCardsModel->patchEntity($UserCardsSaveData, $this->request->data['Booking']);
								
								$UserCardsSaveData->stripe_customer_id = $UserCardsPrefilledData->stripe_customer_id;
								
								$UserCardsSaveData->user_id = $session->read('User.id');
								
								$UserCardsSaveData->expiary_date = $this->request->data['Booking']['expiary_date'];
								
								$UserCardsSaveData->cvv_code = $this->request->data['Booking']['cvv_code'];
								
								$UserCardsSaveData->card_number = $this->ccMasking(str_replace(" ",'',$this->request->data['Booking']['card_number'])); //Masking for card number
							
								$UserCardsSaveData->id = $UserCardsPrefilledData->id;
								//Save data into our database
								$UserCardsModel->save($UserCardsSaveData);
									
								$this->setSuccessMessage($this->stringTranslate(base64_encode('Your card details have been updated.')));
								echo "success:add_personal_details";die;
								
							}else{
								$this->setErrorMessage($this->stringTranslate(base64_encode('Kindly use valid card details.')));
								echo "error:Kindly use valid card details";die;
							}
						}
						
					}else{
						$this->setErrorMessage($this->stringTranslate(base64_encode('Kindly use valid card details.')));
						echo "error:Kindly use valid card details";die;
					}
				
					
						
				}
				catch (\Exception $e) {
				
					$error = $e->getMessage();
					$errBody = $e->getJsonBody();
					$errMsg = $e->getMessage();
					
					if($errBody['error']['code']=='card_declined') {
						$errMsg = 'Your card was declined. We arn\'t saying you broke but maybe you got another card?';
						echo "error:$errMsg";die;
					}else if($errBody['error']['code']=='invalid_expiry_year') {
						$errMsg = 'Your card\'s expiration year is invalid.';
						echo "error:$errMsg";die;
					}else{
						echo "error:$errMsg";die;
					}
				}
					
			}else{
				$this->set('formError',$error);
				$this->set('totalError',count($error));
			}	
		
		}	
		
    }
	
	/**Function for Validate SIGN UP
	*/
	function validate_card_detail($data)
	{
	    $errors=array();
		//Validation for first name
		if(trim($data['Booking']['card_holder_name'])=='')
		{
			$errors['card_holder_name'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}else{
			if(is_numeric($data['Booking']['card_holder_name'])){
				$errors['card_holder_name'][]= $this->stringTranslate(base64_encode("Card holder name should be alphabatic"))."\n";
			}
		}
		
		//Validation for first name
		if(trim($data['Booking']['card_number'])=='')
		{
			$errors['card_number'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}else{
			
			if (!is_numeric(str_replace(' ', '', $data['Booking']['card_number']))) {
			  $errors['card_number'][]= $this->stringTranslate(base64_encode("Card number should be numeric"))."\n";
			}
			
		}
		
		//Validation for first name
		if(trim($data['Booking']['cvv_code'])=='')
		{
			$errors['cvv_code'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}else{
			if(!is_numeric($data['Booking']['cvv_code'])){
				$errors['cvv_code'][]= $this->stringTranslate(base64_encode("CVV should be numeric"))."\n";
			}
		}
		
		//Validation for first name
		if(trim($data['Booking']['expiary_date'])=='')
		{
			$errors['expiary_date'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}
		
		return $errors;
	}
	
	function addPersonalDetails(){
		
		
		$this->viewBuilder()->layout('profile_dashboard');
		
		$UserCardsModel = TableRegistry::get('UserCards');
		$session = $this->request->session();
		
		$UserCardsObj = $UserCardsModel->find('all',['conditions' => ['UserCards.user_id' =>$session->read('User.id')]])->hydrate(false);
		$UserCardsData = $UserCardsObj->first();
		
		$this->set('UserCardsData',$UserCardsData);
		
		if(isset($this->request->data['Booking']) && !empty($this->request->data['Booking'])){
			//Check Valid data	
			$error=$this->validate_personal_detail($this->request->data);
				
			if(count($error) == 0)
			{
				$UserCardsSaveData = $UserCardsModel->newEntity();
				$UserCardsSaveData = $UserCardsModel->patchEntity($UserCardsSaveData, $this->request->data['Booking']);
				$UserCardsSaveData->user_id = $session->read('User.id');
				
				if($UserCardsObj->count() > 0){
							
					$UserCardsSaveData->id =$UserCardsData['id'];
					
				}
				
				//Save data into our database
				if($UserCardsModel->save($UserCardsSaveData)){
					$this->setSuccessMessage($this->stringTranslate(base64_encode('Personal details has been saved.')));
				}
				
			}else{
				$this->set('formError',$error);
				$this->set('totalError',count($error));
			}
		}
	}
		
	function ccMasking($number, $maskingCharacter = 'X') {
		return str_repeat($maskingCharacter, strlen($number) - 4) . substr($number, -4);
	}
	
	
	/**Function for Validate SIGN UP
	*/
	function validate_personal_detail($data)
	{
	    $errors=array();
		
		//Validation for address 1
		if(trim($data['Booking']['address_1'])=='')
		{
			$errors['address_1'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}
		
		//Validation for address 2
		if(trim($data['Booking']['address_2'])=='')
		{
			$errors['address_2'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}
		
		//Validation for city
		if(trim($data['Booking']['city'])=='')
		{
			$errors['city'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}
		
		
		
		//Validation for first name
		if(trim($data['Booking']['zip'])=='')
		{
			$errors['zip'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}else{
			if(!is_numeric($data['Booking']['zip'])){
				$errors['zip'][]= $this->stringTranslate(base64_encode("Zip code should be numeric"))."\n";
			}
		}	
		
		return $errors;
	}
	//Function for book now
	function bookNow($request_booking_id= null,$type = null){
		
			$this->viewBuilder()->layout('landing');
			$session = $this->request->session();
			$BookingRequestsModel = TableRegistry::get('BookingRequests');
		    $UsersModel = TableRegistry::get('Users');
			
			$booking_id = convert_uudecode(base64_decode($request_booking_id));
		//GET BOOKING RECORDS FOR DISPLAY ON RIGHT HAND SIDE DIV
		$get_booking_requests_to_display = array();
		$total = 0;
		$userType = $session->read('User.user_type');
		$user_message_display_field = $userType == 'Sitter'?'user_id':'sitter_id';
		if(isset($booking_id) && $booking_id !=''){
		       
                 $get_booking_requests_to_display = $BookingRequestsModel->find('all')
				->where(['BookingRequests.id'=>$booking_id])
				->contain(['BookingChats'=> ['queryBuilder' => function ($q) {
																	return $q->order(['BookingChats.id' => 'DESC']);
																}
											]
						  ]
				)
				->hydrate(false)->first();
				
				if(!empty($get_booking_requests_to_display)){
					
					
					//pr($get_user_communications_details);die;
				    //$this->sendMessages();
				  if($type == "guest"){
					  $get_user_communications_details = $this->getUserCommunicationDetails($get_booking_requests_to_display["sitter_id"]);
					//Booking request message  
					if($get_user_communications_details['communication']['new_booking_request'] == 1){
					    $to_mobile_number = "+".$get_user_communications_details['country_code'].$get_user_communications_details['communication']['phone_notification'];
						$message_body = "You have been received new booking request";	
						//$send_message = $this->sendMessages($to_mobile_number, $message_body);   
				     } 
				  }
				  
					 $get_booking_requests_to_display['user'] = $UsersModel->find('all',['contain'=>[
															'UserSitterHouses'
															
													            ]
														])
																		->select(['Users.image','Users.first_name','Users.last_name','Users.facebook_id','Users.is_image_uploaded','Users.date_added','UserSitterHouses.about_home_desc','Users.user_type'])
																		//->contain(['UserSitterHouses','UserSitterServices'])
																		->where(['Users.id' => $get_booking_requests_to_display[$user_message_display_field]])
																		->limit(1)->hydrate(false)->first();
										
										
					if($type == "sitter"){
			   
					   $bookingRequestData = $BookingRequestsModel->newEntity();
					   $bookingRequestData->id = $booking_id;
					   $bookingRequestData->folder_status_sitter = 'current';
					   //Update sitter status
					   $BookingRequestsModel->save($bookingRequestData);
					  //Start send message
					   $get_user_communications_details = $this->getUserCommunicationDetails($get_booking_requests_to_display["user_id"]);
					
					 if($get_user_communications_details['communication']['new_booking_request'] == 1){
					    $to_mobile_number = "+".$get_user_communications_details['country_code'].$get_user_communications_details['communication']['phone_notification'];
						$message_body = $get_booking_requests_to_display['user']['first_name']." ".@$get_booking_requests_to_display['user']['last_name']." have accepted your request,kindly proceed for payment.";	
						//$send_message = $this->sendMessages($to_mobile_number, $message_body);   
				      } 
					   
					   
					   return $this->redirect("/Message/get-messages/current/".$request_booking_id);		
			        }
			        //end send message													
					$userData = $UsersModel->find('all',['contain'=>[
															    'UserSitterServices',
															    'UserPets'
															   ]
														]
												)
								   ->where(['Users.id' => $get_booking_requests_to_display['sitter_id']], ['Users.id' => 'integer[]'])
								   ->toArray();
				}
			  $selected_pets_count="";
			 if(!empty($userData[0]->user_pets) && isset($userData[0]->user_pets)){
				 $idPetsArr = explode(",",$get_booking_requests_to_display['guest_id_for_bookinig']);
				 $selected_pets = [];
				 foreach($idPetsArr as $single_pet_id){
					 foreach($userData[0]->user_pets as $single_pet){
						 if($single_pet_id == $single_pet->id){
							$selected_pets[] = $single_pet->guest_name;
						 }
					 }
				 }
			$selected_pets_count = count($selected_pets);
		    $this->set("pets_count",$selected_pets_count);
		     
		    }
		   if(!empty($userData[0]->user_sitter_services) && isset($userData[0]->user_sitter_services)){
				 
		        $date1 = @$get_booking_requests_to_display['booknig_start_date'];
				$date2 = @$get_booking_requests_to_display['booking_end_date'];
				$diff = abs(strtotime($date2) - strtotime($date1));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				$total_days = $days;
				
		       $selectedGuest = explode(",",@$get_booking_requests_to_display['guest_id_for_bookinig']);
			   $guest_num = count($selectedGuest);
			   
		     if($get_booking_requests_to_display['required_service'] == 'boarding'){
				 $day_rate = $userData[0]->user_sitter_services[0]->sh_day_rate;
				 $night_rate = $userData[0]->user_sitter_services[0]->sh_night_rate;
				 
				 $day_total = $day_rate*$total_days;
				 $night_total = $night_rate*$total_days;
				 $total = ($day_total+$night_total)*$guest_num;
		     }else
		     if($get_booking_requests_to_display['required_service']  == 'house_sitting'){
				$hs_day_rate = $userData[0]->user_sitter_services[0]->gh_day_rate;
				$hs_night_rate = $userData[0]->user_sitter_services[0]->gh_night_rate;
				
				//echo $hs_day_rate." ".$hs_night_rate;die;
				
				$day_total = $hs_day_rate*$total_days;
				$night_total = $hs_night_rate*$total_days;
				 
				$total = ($day_total+$night_total)*$guest_num;
			}else
			 if($get_booking_requests_to_display['required_service']  == 'day_nigth_care'){
				 $day_rate = $userData[0]->user_sitter_services[0]->sh_day_rate;
				 $night_rate = $userData[0]->user_sitter_services[0]->sh_night_rate;
				 
				 $day_total = $day_rate*$total_days;
				 $night_total = $night_rate*$total_days;
				 
				 $total = ($day_total+$night_total)*$guest_num;
			 }else
			  if($get_booking_requests_to_display['required_service']  == 'maket_place'){
				 $mp_grooming_rate = $userData[0]->user_sitter_services[0]->mp_grooming_rate;
				 $mp_training_rate = $userData[0]->user_sitter_services[0]->mp_training_rate;
				 $mp_recreation_rate = $userData[0]->user_sitter_services[0]->mp_recreation_rate;
				 $mp_driving_rate = $userData[0]->user_sitter_services[0]->mp_driving_rate;
				 
				  $mp_grooming_total = $mp_grooming_rate*$total_days;
				  $mp_training_total = $mp_training_rate*$total_days;
				  $mp_recreation_total = $mp_recreation_rate*$total_days;
				  $mp_driving_total = $mp_driving_rate*$total_days;
				 
				 $total = ($mp_grooming_total+$mp_training_total+$mp_recreation_total+$mp_driving_total)*$guest_num;
			 }else
			   if($get_booking_requests_to_display['required_service']  == 'drop_in_visit'){
				 $drop_visit_rate = $userData[0]->user_sitter_services[0]->dorp_in_visit;
				 
				 $total = $drop_visit_rate*$total_days*$guest_num;
			 }
			 $this->set("services_info",$userData[0]->user_sitter_services[0]);
			 $this->set('total_days',$total_days);
		  }
		}//END
		
		//pr($userData[0]);die;
		$this->set('get_booking_requests_to_display',$get_booking_requests_to_display);
		$this->set('total',$total);
		
		//Fetch data how works
		$worksModel = TableRegistry::get('HowWorks');
		$workdata = $worksModel->find('all', ['conditions' =>['HowWorks.category' => 'How_it_works']])->order(['modified'=>'desc']) ->limit(3)->where(['status' => 1])->toArray();
		$this->set('works_data',$workdata);

		//Fetch data why choose
		$chooseData = $worksModel->find('all',['conditions'=>['HowWorks.category'=>'why_choose_us']])->order(['modified'=>'desc']) ->limit(4)->where(['status' => 1])->toArray();
		$this->set('choose_data',$chooseData);

		//Fetch data news updates
		$news_data = $worksModel->find('all',['conditions'=>['HowWorks.category'=>'news_updates']])->order(['modified'=>'desc']) ->limit(3)->where(['status' => 1])->toArray();
		$this->set('news_data',$news_data);
		
		$servicesModel = TableRegistry::get('Services');
	    $servicesInfo = $servicesModel->find('all', ['order' => ['Services.created' => 'desc']]) ->limit(5)->where(['Services.status' =>1])->toArray();
		$this->set('servicesInfo',$servicesInfo);
		
	}
	

}
?>
