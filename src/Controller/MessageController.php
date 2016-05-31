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
	public $helpers = ['Form'];
	/**
	* Function which is call at very first when this controller load
	*/
    public function beforeFilter(Event $event)
    { 
        parent::beforeFilter($event);
		if($this->CheckGuestSession()==false)
		{
			$this->Flash->error(__('Kindly login before access this page.'));	
			return $this->redirect(['controller' => 'guests', 'action' => 'home']);
			exit();
		}
    }
    
	public function initialize()
    {

		parent::initialize();
		
		// Loaded EmailTemplate Model
		$SiteModel = TableRegistry::get('siteConfigurations');
		$siteConfiguration = $SiteModel->find('all')->first();
		$this->set('siteConfiguration', $siteConfiguration);
		
		$session = $this->request->session();
		$this->set('loggedin_user',$session->read('User.id'));
		
	}
	
	/**
	* Function to List the messages
	*/
	function chats($booking_id=''){
		
		
		$this->viewBuilder()->layout('profile_dashboard');
		$session = $this->request->session();
		
		$userType = $session->read('User.user_type');
		$class_user = $userType == 'Sitter'?'chat-me':'chat-user';
		$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
		
		$userId = $session->read('User.id');
		$this->set(compact('userId','userType','class_user'));
		
	
		//ADD MODEL
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		$BookingChatsModel = TableRegistry::get('BookingChats');
		$UsersModel = TableRegistry::get('Users');
			
		
		$get_requests = $BookingRequestsModel->find('all')
		->where(['BookingRequests.'.$condition_field => $session->read('User.id')])
		->contain(['BookingChats'])
		->select(['message','created_date','id','user_id','sitter_id'])
		->hydrate(false)->toArray();
		
		$user_message_display_field = $userType == 'Sitter'?'user_id':'sitter_id';
		if(!empty($get_requests)){
			foreach($get_requests as $booking_key=>$booking_records){
				$get_requests[$booking_key]['user'] = $UsersModel->find('all')
																->select(['Users.image','Users.first_name','Users.last_name','Users.facebook_id','Users.is_image_uploaded'])
																->where(['Users.id' => $booking_records[$user_message_display_field]])
																->limit(1)->hydrate(false)->first();
			}
		}
		
		$this->set('get_requests',$get_requests);
		
		if(count($get_requests)>0){
			$default_booking_id = $get_requests[0]['id'];
		}
		
		if($booking_id != ''){
			 
			$this->set('booking_id',$booking_id);
				
			$get_chats = $BookingChatsModel->find('all')
			->where(['BookingChats.booking_request_id' => $booking_id])
			->contain(['Users'])
			->select(['message','read_status','Users.image','created_at','user_role','user_id','Users.facebook_id','Users.is_image_uploaded'])
			->hydrate(false)->toArray();
			
			if(!empty($get_chats)){
					
				$BookingRequestsModel->query()
						->update()
						->set(['read_status' =>"read"])
						->where(['id' => $booking_id])
						->execute();
				
			}
			
				
			$this->set('get_chats',$get_chats);
		
		}else{
		
			$booking_id = $default_booking_id;
			$this->set('booking_id',$booking_id);
			$BookingRequestsModel = TableRegistry::get('BookingChats');
			
			$get_chats = $BookingRequestsModel->find('all')
			->where(['BookingChats.booking_request_id' => $booking_id])
			->contain(['Users'])
			->select(['message','read_status','Users.image','created_at','user_role','user_id','Users.facebook_id','Users.is_image_uploaded'])
			->hydrate(false)->toArray();
			
			if(!empty($get_chats)){
					
				$BookingRequestsModel->query()
						->update()
						->set(['read_status' =>"read"])
						->where(['id' => $booking_id])
						->execute();
				
			}
			
			$this->set('get_chats',$get_chats);
		
		}

	
	//pr($get_chats); die;
	}
		
	/**
	 * Funtion to get the chat detail
	*/
	
	function sendmessage(){
		
		$this->request->data = $_REQUEST;	
		$BookingChatsModel = TableRegistry::get('BookingChats');
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
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
			
			$this->request->data = $_REQUEST;	
			$id = $this->request->data['booking_message_id'];
			

			$get_chats = $BookingChatsModel->find('all')
			->where(['BookingChats.booking_request_id' => $id])
			->contain(['Users'])
			->select(['message','Users.image','created_at','user_role','user_id','Users.facebook_id','Users.is_image_uploaded'])
			->hydrate(false)->toArray();
			
			if($booking_msg_id !=''){
					
					//CHECK THAT PREVIOUS MESSAGE DONE BY THIS USER OR NOT, IF NOT THEN CHANGE STATUS UNREAD
				
						$BookingRequestsModel->query()
						->update()
						->set(['read_status' =>"unread",'read_status_posted_by' =>$user_type])
						->where(['id' => $booking_msg_id])
						->execute();	
					
					
			}
			$this->set('get_chats',$get_chats);
			
		}
		
	}
	
	/**
	 * Funtion to get the chat detail
	 */
	 function autoLoadChat(){
	
		$this->request->data = $_REQUEST;	
		$id = $this->request->data['booking_id'];
		$BookingChatsModelModel = TableRegistry::get('BookingChats');
	
		$get_chats = $BookingChatsModelModel->find('all')
		->where(['BookingChats.booking_request_id' => $id])
		->contain(['Users'])
		->select(['message','Users.image','created_at','user_role','user_id','Users.facebook_id','Users.is_image_uploaded'])
		->hydrate(false)->toArray();
		
		$this->set('get_chats',$get_chats);
		$this->render('sendmessage');	
	}
	
	/**
	 * Funtion to get the chat detail
	 */
	 function autoLoadThreads(){
	
		$this->request->data = $_REQUEST;	
		$id = $this->request->data['booking_id'];
		$session = $this->request->session();
		
		$userType = $session->read('User.user_type');
		$class_user = $userType == 'Sitter'?'chat-me':'chat-user';

		$userId = $session->read('User.id');
		$this->set(compact('userId','userType','class_user'));
		
		//ADD MODEL
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		$UsersModel = TableRegistry::get('Users');
		
		$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
		
		$get_requests = $BookingRequestsModel->find('all')
		->where(['BookingRequests.'.$condition_field => $session->read('User.id')])
		->contain(['BookingChats'=> ['queryBuilder' => function ($q) {
															return $q->order(['BookingChats.id' => 'DESC']);
														}
									]
		          ]
		)
		->select(['message','read_status','read_status_posted_by','created_date','id','user_id','sitter_id'])
		->hydrate(false)->toArray();
		
		$user_message_display_field = $userType == 'Sitter'?'user_id':'sitter_id';
		
		if(!empty($get_requests)){
			foreach($get_requests as $booking_key=>$booking_records){
				$get_requests[$booking_key]['user'] = $UsersModel->find('all')
															->select(['Users.image','Users.first_name','Users.last_name','Users.facebook_id','Users.is_image_uploaded'])
															->where(['Users.id' => $booking_records[$user_message_display_field]])
															->limit(1)->hydrate(false)->first();
			}
		}
		//pr($get_requests); die;
		$this->set('get_requests',$get_requests);
	}

}
?>
