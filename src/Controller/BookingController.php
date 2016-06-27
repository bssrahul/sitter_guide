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
		
		
	}
	
	function addCardDetails(){
		
		//$this->viewBuilder()->layout(false);		
		$this->request->data = $_REQUEST; 
		if(isset($this->request->data['Booking']) && !empty($this->request->data['Booking'])){
				
			$error=$this->validate_card_detail($this->request->data);
				
			if(count($error) == 0)
			{
				// Set your secret key: remember to change this to your live secret key in production
				// See your keys here https://dashboard.stripe.com/account/apikeys
				\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);
				
				$explodedDate = str_replace("/","",$this->request->data['Booking']['expiary_date']);
				
				$t = \Stripe\Token::create(array( "card" => array(
				"number" => $this->request->data['Booking']['card_number'],
				"exp_month" => str_replace(" ",'',$explodedDate[0]),
				"exp_year" => '2019',
				"cvc" => $this->request->data['Booking']['cvv_code']  )));
				pr($t);die;
				/*
				// Get the credit card details submitted by the form
				$token = $_POST['stripeToken'];

				// Create a Customer
				$customer = \Stripe\Customer::create(array(
				  "source" => $token,
				  "description" => "Example customer")
				);

				// Charge the Customer instead of the card
				\Stripe\Charge::create(array(
				  "amount" => 1000, // amount in cents, again
				  "currency" => "aud",
				  "customer" => $customer->id)
				);	
				
				\Stripe\Charge::create(array(
				  "amount"   => 1500, // $15.00 this time
				  "currency" => "aud",
				  "customer" => $customerId // Previously stored, then retrieved
				  ));*/
				
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
		
		if(isset($this->request->data) && !empty($this->request->data)){
			
		}
	}
	
	
	

}
?>
