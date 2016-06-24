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
	function getMessages($folder_status='pending',$request_booking_id=''){
		
		$this->viewBuilder()->layout('profile_dashboard');
		$session = $this->request->session();
		
		//ADD MODEL
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		$BookingChatsModel = TableRegistry::get('BookingChats');
		$UsersModel = TableRegistry::get('Users');
		
		$booking_id = convert_uudecode(base64_decode($request_booking_id));
		
		$userType = $session->read('User.user_type');
		$class_user = $userType == 'Sitter'?'chat-me':'chat-user';
		$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
		$fieldname = $userType == 'Sitter'?'sitter':'guest';
		
		$userId = $session->read('User.id');
		$this->set(compact('userId','userType','class_user','fieldname'));
		
		$get_requests = $BookingRequestsModel->find('all')
		->where(['BookingRequests.'.$condition_field => $session->read('User.id'),'BookingRequests.folder_status_'.$fieldname => $folder_status])
		->contain(['BookingChats'=> ['queryBuilder' => function ($q) {
															return $q->order(['BookingChats.id' => 'DESC']);
														}
									]
		          ]
		)
		->select(['message','read_status','read_status_posted_by','folder_status_sitter','folder_status_guest','created_date','id','user_id','sitter_id'])
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
		}else{
			$default_booking_id = '';
		}
		
		if($booking_id != ''){
			 
			$this->set('booking_id',$booking_id);
			$this->set('folder_status',$folder_status);
				
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
			$this->set('folder_status',$folder_status);		
				
			$get_chats = $BookingChatsModel->find('all')
						->where(['BookingChats.booking_request_id' => $booking_id])
						->contain(['Users'])
						->select(['message','read_status','Users.image','created_at','user_role','user_id','Users.facebook_id','Users.is_image_uploaded','Users.first_name','Users.last_name'])
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
		
		//GET BOOKING RECORDS FOR DISPLAY ON RIGHT HAND SIDE DIV
		$get_booking_requests_to_display=array();
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
					
						$get_booking_requests_to_display['user'] = $UsersModel->find('all')
																		->select(['Users.image','Users.first_name','Users.last_name','Users.facebook_id','Users.is_image_uploaded','Users.date_added','UserSitterHouses.about_home_desc'])
																		->contain(['UserSitterHouses'])
																		->where(['Users.id' => $get_booking_requests_to_display[$user_message_display_field]])
																		->limit(1)->hydrate(false)->first();
					
				}
		}//END
		//pr($get_booking_requests_to_display); die;
		$this->set('get_booking_requests_to_display',$get_booking_requests_to_display);
		
	}
		
	/**
	 * Funtion to get the chat detail
	*/
	
	function sendmessage(){
		
		$BookingChatsModel = TableRegistry::get('BookingChats');
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		
		$this->request->data = $_REQUEST;	
		
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
		$folder_status = $this->request->data['folder_status'];
		$session = $this->request->session();
		
		$userType = $session->read('User.user_type');
		$class_user = $userType == 'Sitter'?'chat-me':'chat-user';
		$fieldname = $userType == 'Sitter'?'sitter':'guest';
		
		$userId = $session->read('User.id');
		$this->set(compact('userId','userType','class_user','fieldname'));
		
		//ADD MODEL
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		$UsersModel = TableRegistry::get('Users');
		
		$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
		
		
		
		
		
		$get_requests = $BookingRequestsModel->find('all')
		->where(['BookingRequests.'.$condition_field => $session->read('User.id'),'BookingRequests.folder_status_'.$fieldname => $folder_status])
		->contain(['BookingChats'=> ['queryBuilder' => function ($q) {
															return $q->order(['BookingChats.id' => 'DESC']);
														}
									]
		          ]
		)
		->select(['message','read_status','read_status_posted_by','folder_status_sitter','folder_status_guest','created_date','id','user_id','sitter_id'])
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
	
	/**
	 * Funtion to get the chat detail
	 */
	 function moveFolder(){
	
		$this->request->data = $_REQUEST;	
		
		$booking_msg_id = $this->request->data['booking_id'];
		$folder_status = $this->request->data['folder_status'];
		
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		
		$session = $this->request->session();
		$userType = $session->read('User.user_type');
		$fieldname = $userType == 'Sitter'?'sitter':'guest';
		
		if($BookingRequestsModel->query()
						->update()
						->set(['folder_status_'.$fieldname =>$folder_status])
						->where(['id' => $booking_msg_id])
						->execute()){
			echo "success";
		}else{
			echo "failed";	
		}
					
		die;
	}
	
	
	/**
	 * Funtion to get the chat detail
	 */
	 function getUserMessageCount(){
	
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		$UsersModel = TableRegistry::get('Users');
		
		$session = $this->request->session();
		$userType = $session->read('User.user_type');
		
		$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
		$fieldname = $userType == 'Sitter'?'folder_status_sitter':'folder_status_guest';
		
		$get_requests = $BookingRequestsModel->find('all')
		->where(['BookingRequests.'.$condition_field => $session->read('User.id'),'BookingRequests.read_status' => 'unread'])
		->contain(['BookingChats'=> ['queryBuilder' => function ($q) {
															return $q->order(['BookingChats.id' => 'DESC']);
														}
									]
		          ]
		)
		->select(['id'])
		->hydrate(false)->toArray();
	
		$displayMessage = array();
		$html='';
		if(!empty($get_requests)){
			echo count($get_requests);
		}else{
			echo 0;
		}
		die;
			
		
	}
	
	/**
	 * Funtion to get the chat detail
	
	 function getUserMessageCount(){
	
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		$UsersModel = TableRegistry::get('Users');
		
		$session = $this->request->session();
		$userType = $session->read('User.user_type');
		
		$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
		$fieldname = $userType == 'Sitter'?'folder_status_sitter':'folder_status_guest';
		
		$get_requests = $BookingRequestsModel->find('all')
		->where(['BookingRequests.'.$condition_field => $session->read('User.id'),'BookingRequests.read_status' => 'unread'])
		->contain(['BookingChats'=> ['queryBuilder' => function ($q) {
															return $q->order(['BookingChats.id' => 'DESC']);
														}
									]
		          ]
		)
		->select(['message','read_status','read_status_posted_by',$fieldname,'created_date','id','user_id','sitter_id'])
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
		
		$displayMessage = array();
		$html='';
		if(!empty($get_requests)){
			$html .= count($get_requests).':::';
			
			foreach($get_requests as $msgKey=>$msgVal){
				 
				 if(($msgVal['user']['facebook_id']) !="" && ($msgVal['user']['is_image_uploaded'])==0)
				 { 
					
					if($msgVal['user']['image'] != ""){
					
						$img = $msgVal['user']['image'];
					
					}else{
					
						$img =HTTP_ROOT.'img/uploads/prof_photo.png';
					
					} 
		   
				}else{
			
					$img= HTTP_ROOT.'img/uploads/'.($msgVal['user']['image'] != ''?$msgVal['user']['image']:'prof_photo.png'); 					   
				}
				
				
				
				if(isset($msgVal['booking_chats']) && !empty($msgVal['booking_chats'])){
					$msg =  substr($msgVal['booking_chats'][0]['message'],0.20)."..."; 
				}else{
					$msg = substr($msgVal['message'],0.20)."..."; 
				}
				
				
				$html .='<li>
							  <a href="'.HTTP_ROOT.'Message/get-messages/'.$msgVal[$fieldname].'/'.base64_encode(convert_uuencode($msgVal['id'])).'">
								<div class="book-now-setion-inner li-p ">
								  <div class="row">
									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
									  <div class="book-now-img ">
										<img alt="img" class="img-responsive img-circle text-center center-block mCS_img_loaded" src="'.$img.'"> 
									  </div>
									</div>
									
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 message-pad-left-0 message-pad-right-0">
									  <div class="book-now-name">
										<div class="new-badge">NEW
										</div>
										<p>'.$msgVal['user']['first_name']." ".substr($msgVal['user']['last_name'],0,1).'
										</p>
										<p>'.date("h:i A",strtotime($msgVal['created_date'])).'
										</p>
									  </div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0 message-pad-right-0 ">
									  <div class="book-now-name">
										<p>'.$msg.'
										</p>
									  </div>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 message-pad-left-0">
									  <div class="book-now-name">
										<p class="text-right">'.date("M d",strtotime($msgVal['created_date'])).'
										</p>
									  </div>
									</div>
								  </div>
								</div>
							  </a>
							</li>';         
			}
			
			echo $html .='<li class="text-center pad10">
			  <a href="'.HTTP_ROOT.'Message/get-messages/pending" class="colr-grn">See more
			  </a>
			</li>';
		}die;
	}*/
	

}
?>
