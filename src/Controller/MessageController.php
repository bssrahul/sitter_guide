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

//require_once(ROOT . DS  . 'vendor' . DS  . 'Facebook' . DS . 'src' . DS . 'Facebook' . DS . 'autoload.php');
//use Facebook;

use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */

class MessageController extends AppController
{
	public $helpers = ['Form','GoogleMap'];
	/**
	* Function which is call at very first when this controller load
	*/
    public function beforeFilter(Event $event)
    { 
        parent::beforeFilter($event);
		if($this->CheckGuestSession() && ($this->request->action == 'login' || $this->request->action == 'signup' || $this->request->action=="forgotPassword"))
		{
			$this->setErrorMessage($this->stringTranslate(base64_encode('You can not access this page because you are already loggedin.')));
			return $this->redirect(['controller' => 'Guests', 'action' => 'home']);
		}
		if(!$this->CheckGuestSession() && in_array($this->request->action,array('profile','profileEdit','addUserPet'))){
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
		

		$sliderModel = TableRegistry::get('Sliders');
		$sliderVideo = $sliderModel->find('all')->first();
		$this->set('sliderVideo', $sliderVideo);
		
	}
	
	/**
	* Function to List the messages
	*/
	function chats($booking_id=''){
		$session = $this->request->session();
		//print_r($session);
		$userType = $session->read('User.user_type');
		 $class_user = $userType == 'Sitter'?'chat-me':'chat-user';
		 
		 $userId = $session->read('User.id');
		//$userType = 'Sitter';
		$this->set(compact('userId','userType','class_user'));
		
	$this->viewBuilder()->layout('profile_dashboard');
	$session = $this->request->session();
	//print_r($this->request);
	//ADD MODEL
	$BookingRequestsModel = TableRegistry::get('BookingRequests');
	$get_requests = $BookingRequestsModel->find('all')
    ->where(['BookingRequests.sitter_id' => '37'])
    ->contain(['Users'])
    ->select(['message','Users.image','created_date','id','Users.facebook_id','Users.is_image_uploaded'])
    ->limit(10)->hydrate(false)->toArray();
    //print_r($get_requests);die;
    $this->set('get_requests',$get_requests);
    if(count($get_requests)>0){
		$default_booking_id = $get_requests[0]['id'];
		}
    if($booking_id != ''){
		$this->set('booking_id',$booking_id);
		$BookingRequestsModel = TableRegistry::get('BookingChats');
		$get_chats = $BookingRequestsModel->find('all')
		->where(['BookingChats.booking_request_id' => $booking_id])
		->contain(['Users'])
		->select(['message','Users.image','created_at','user_role'])
		->limit(10)->hydrate(false)->toArray();
		$this->set('get_chats',$get_chats);
		}
	else{
		$booking_id = $default_booking_id;
		$this->set('booking_id',$booking_id);
		$BookingRequestsModel = TableRegistry::get('BookingChats');
		$get_chats = $BookingRequestsModel->find('all')
		->where(['BookingChats.booking_request_id' => $booking_id])
		->contain(['Users'])
		->select(['message','Users.image','created_at','user_role'])
		->limit(10)->hydrate(false)->toArray();
		$this->set('get_chats',$get_chats);
		}
	//print_r($get_requests); die;
	}
	
		/**
	* Function to List the messages
	*/
	function chat($booking_id=''){
		$session = $this->request->session();
		//print_r($session);
		 $userType = $session->read('User.user_type');
		 $class_user = $userType == 'Sitter'?'chat-me':'chat-user';
		 
		 $userId = $session->read('User.id');
		//$userType = 'Sitter';
		$this->set(compact('userId','userType','class_user'));
	$this->viewBuilder()->layout('landing');
	$session = $this->request->session();
	//print_r($this->request);
	//ADD MODEL
	$BookingRequestsModel = TableRegistry::get('BookingRequests');
	$get_requests = $BookingRequestsModel->find('all')
    ->where(['BookingRequests.sitter_id' => '37'])
    ->contain(['Users'])
   // ->select(['message','Users.image','created_date','id'])
     ->select(['message','Users.image','created_date','id','Users.facebook_id','Users.is_image_uploaded'])
    ->limit(10)->hydrate(false)->toArray();
    
    $this->set('get_requests',$get_requests);
    if(count($get_requests)>0){
		$default_booking_id = $get_requests[0]['id'];
		}
    if($booking_id != ''){
		$this->set('booking_id',$booking_id);
		$BookingRequestsModel = TableRegistry::get('BookingChats');
		$get_chats = $BookingRequestsModel->find('all')
		->where(['BookingChats.booking_request_id' => $booking_id])
		->contain(['Users'])
		->select(['message','Users.image','created_at','user_role'])
		->limit(10)->hydrate(false)->toArray();
		$this->set('get_chats',$get_chats);
		}
	else{
		$booking_id = $default_booking_id;
		$this->set('booking_id',$booking_id);
		$BookingRequestsModel = TableRegistry::get('BookingChats');
		$get_chats = $BookingRequestsModel->find('all')
		->where(['BookingChats.booking_request_id' => $booking_id])
		->contain(['Users'])
		->select(['message','Users.image','created_at','user_role'])
		->limit(10)->hydrate(false)->toArray();
		$this->set('get_chats',$get_chats);
		}
	//print_r($get_requests); die;
	}
	
	
	
	 
	/**
	 * Funtion to get the chat detail
	 */
	 function bookingchat(){
		 $this->request->data = $_REQUEST;	
		 $id = $this->request->data['id'];
		 $BookingChatsModelModel = TableRegistry::get('BookingChats');
		$get_chats = $BookingRequestsModel->find('all')
		->where(['BookingChats.booking_request_id' => $id])
		->contain(['Users'])
		->select(['message','Users.image','created_at','user_role'])
		->limit(10)->hydrate(false)->toArray();
		$html = '<div><ul>';
		foreach($get_chats as $chat_data){
			$html .= "
			<li>".$chat_data['message']."</li>
			";
			}
			$html .="</ul></div>";
			echo $html; die;
		pr($get_chats); die;
		//$this->set('get_requests',$get_chats);
    
		 }
	
	/**
	 * Funtion to get the chat detail
	 */
	 function sendmessage(){
		
		 $this->request->data = $_REQUEST;	
		 $BookingChatsModel = TableRegistry::get('BookingChats');
		 $ChatData = $BookingChatsModel->newEntity();
		 $booking_msg_id = $this->request->data['booking_message_id'];
		 $chat_text = $this->request->data['chat_text'];
		 $user_type = $this->request->data['user_type'];
		 $user_id = $this->request->data['user_id'];
		 
		 $ChatData->message = $chat_text;
		 $ChatData->booking_request_id = $booking_msg_id;
		 $ChatData->user_role = $user_type;
		 $ChatData->user_id = $user_id;
					
					
		if($BookingChatsModel->save($ChatData)){
			echo "success";
			}              
		else{
			echo "failed";
			}
					
			
		 die;
		
		 }
	
	

}
?>
