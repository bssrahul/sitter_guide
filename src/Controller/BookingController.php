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
	
	

}
?>
