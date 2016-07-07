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
		//echo $userType;die;
		$class_user = $userType == 'Sitter'?'chat-me':'chat-user';
		
		$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
		
		$fieldname = $userType == 'Sitter'?'sitter':'guest';
		
		$userId = $session->read('User.id');
		$this->set(compact('userId','userType','class_user','fieldname'));
		
		//echo "okokok".$userType;die;
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
		//pr($get_requests);
		//echo $user_message_display_field;die;
		if(!empty($get_requests)){
			foreach($get_requests as $booking_key=>$booking_records){
				$get_requests[$booking_key]['user'] = $UsersModel->find('all')
																->select(['Users.image','Users.first_name','Users.last_name','Users.facebook_id','Users.is_image_uploaded'])
																->where(['Users.id' => $booking_records[$user_message_display_field]])
																->limit(1)->hydrate(false)->first();
			}
		}
		//pr($get_requests);die;
		
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
			$this->set('sitter_id',$request_booking_id);
		
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
			$this->set('get_chats',$request_booking_id);
		}
		//GET BOOKING RECORDS FOR DISPLAY ON RIGHT HAND SIDE DIV
		$get_booking_requests_to_display = array();
		$total = 0;
		if(isset($booking_id) && $booking_id !=''){
			//echo $booking_id;die;
                 $get_booking_requests_to_display = $BookingRequestsModel->find('all')
				->where(['BookingRequests.id'=>$booking_id])
				->contain(['BookingChats'=> ['queryBuilder' => function ($q) {
																	return $q->order(['BookingChats.id' => 'DESC']);
																}
											]
						  ]
				)
				->hydrate(false)->first();
				//pr($get_booking_requests_to_display);die;
			if(!empty($get_booking_requests_to_display)){
				  $get_booking_requests_to_display['user'] = $UsersModel->find('all',['contain'=>[
															'UserSitterHouses'
															
													            ]
														])
														->select(['Users.image','Users.first_name','Users.last_name','Users.facebook_id','Users.is_image_uploaded','Users.date_added','UserSitterHouses.about_home_desc','Users.user_type'])
														//->contain(['UserSitterHouses','UserSitterServices'])
														->where(['Users.id' => $get_booking_requests_to_display[$user_message_display_field]])
														->limit(1)->hydrate(false)->first();
				    //Start sk				
					$userData = $UsersModel->find('all',['contain'=>[
															    'UserSitterServices',
															    'UserPets'=>['UserPetGalleries']
															   ]
														]
												)
								   ->where(['Users.id' => $get_booking_requests_to_display['sitter_id']], ['Users.id' => 'integer[]'])
								   ->toArray();
					//end sk
					 //pr($userData);die;
					 
					 
					 
					 
					 
					 
			  }
			  //pr($get_booking_requests_to_display);die;
			  //Start sk	
			 //pr($get_booking_requests_to_display['guest_id_for_bookinig']);die;
			 if(!empty($userData[0]->user_pets) && isset($userData[0]->user_pets)){
				 $idPetsArr = explode(",",$get_booking_requests_to_display['guest_id_for_bookinig']);
				 $selected_pets = [];
				 $pets_name = [];
				 foreach($idPetsArr as $single_pet_id){
					 foreach($userData[0]->user_pets as $single_pet){
						 if($single_pet_id == $single_pet->id){
							$pets_name[] = $single_pet->guest_name;
							$selected_pets[] = $single_pet;
						 }
					 }
				 }
		      $this->set("pets",$pets_name);
		      $this->set("selected_pets",$selected_pets);
		      //End sk
		    }
		   
		    //Start sk	
			if(!empty($userData[0]->user_sitter_services) && isset($userData[0]->user_sitter_services)){
				 
		        $date1 = @$get_booking_requests_to_display['booknig_start_date'];
				$date2 = @$get_booking_requests_to_display['booking_end_date'];
				$diff = abs(strtotime($date2) - strtotime($date1));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				$total_days = $days;
		    //echo $total_days;die;
		 
			   $selectedGuest = explode(",",@$get_booking_requests_to_display['guest_id_for_bookinig']);
			   $guest_num = count($selectedGuest);
			   //pr($guest_num);die;
			 
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
				
				$day_total = $hs_day_rate*$total_days;
				$night_total = $hs_night_rate*$total_days;
				  //echo $hs_day_rate." ".$hs_night_rate;die;
				 $total = ($day_total+$night_total)*$guest_num;
				 //echo $total;die; 
				// echo $total;die; 
				 //echo "guest_num:".$guest_num."total_days:".$total_days."hs_day_rate:".$hs_day_rate."hs_night_rate:".$hs_night_rate;die;
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
				
				
			}
				 //End sk
				
		}//END
		$this->set('get_booking_requests_to_display',$get_booking_requests_to_display);
		$this->set('total',$total);
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
