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
use Cake\View\Helper\PaginatorHelper;
use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
use Cake\Network\Email\Email;
use Cake\Event\Event;
use Cake\I18n\Time;


require_once(ROOT . DS  . 'vendor' . DS  . 'Calendar' . DS . 'calendar.php');
require_once(ROOT . DS  . 'vendor' . DS  . 'Calendar' . DS . 'bookingCalendar.php');
use Calendar;
use Calendarbooking;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class DashboardController extends AppController
{
	public $helpers = ['Form'];
	/**
	* Function which is call at very first when this controller load
	*/
	public $paginate = [
        'limit' => 6,
        'order' => [
            'Users.id' => 'DESC'
        ]
    ];
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		if($this->CheckGuestSession()==false)
		{
		  return $this->redirect(['controller' => 'guests', 'action' => 'home']);
			exit();
		}
    }
	//public $paginate = ['favUsersdata'=>['limit' => 1]];
	public function initialize()
    {
		parent::initialize();
        //GET LOCALE VALUE
		$session = $this->request->session();
		$setRequestedLanguageLocale  = $session->read('setRequestedLanguageLocale'); 
		I18n::locale($setRequestedLanguageLocale);
		
		//$currentLang = $session->read('requestedLanguage');
		$currentLocal = substr($setRequestedLanguageLocale,0,2);
		$this->set('currentLocal', $currentLocal);
		
		// Loaded EmailTemplate Model
		$SiteModel = TableRegistry::get('siteConfigurations');
		$siteConfiguration = $SiteModel->find('all')->first();
		$this->set('siteConfiguration', $siteConfiguration);
		

		$sliderModel = TableRegistry::get('Sliders');
		$sliderVideo = $sliderModel->find('all')->first();
		$this->set('sliderVideo', $sliderVideo);
		
		//$this->loadComponent('Paginator');
		 $this->loadComponent('Paginator');
	}
	/**Function for landing page
	*/
	function home()
	{
	    $this->viewBuilder()->layout('profile_dashboard');

		$SiteConfigurationsModel = TableRegistry::get('SiteConfigurations');
        $siteInfo = $SiteConfigurationsModel->find('all')->first();

         $usersModel = TableRegistry::get('Users');
         $session = $this->request->session();
         $userId = $session->read('User.id');
            //For redirect on about guest tab
			$userData = $usersModel->find('all',['contain'=>[
															'UserSitterHouses',
															'UserPets'=>['UserPetGalleries'], 
															'UserSitterServices', 
															'UserProfessionalAccreditationsDetails',
															'UserProfessionalAccreditations',
															'UserAboutSitters',
															'UserSitterGalleries',
															'UserSitterAvailability'
													            ]
														]
												)
								   ->where(['Users.id' => $userId], ['Users.id' => 'integer[]'])
								   ->toArray();
				if(isset($userData[0]->user_sitter_house['dogs_in_home']) && !empty($userData[0]->user_sitter_house['dogs_in_home']))
				{
					if($userData[0]->user_sitter_house['dogs_in_home'] == 'yes'){
						 $session->write('dog_in_home_status','yes');
						
					}else{
						$session->write('dog_in_home_status','no');
					}
				}else{
					$session->write('dog_in_home_status','no');
					}
				
				$userInfo = $usersModel->get($userId)->toArray();
			   //End
          
          //For basic details
          $details_fields = array("first_name","last_name","email","password","gender","birth_date","address","country","city","state","zip","zone_id");
         
          $check_status = $this->check_fields_status($details_fields,$userInfo);
          if($check_status){
		     $profile_status['User']['basic_detail'] = "yes";
		  }else{
			 $profile_status['User']['basic_detail'] = "no";
		  }
		  //Contact detail
		  $contact_fields = array("country_code","phone");
         
          $check_status = $this->check_fields_status($contact_fields,$userInfo);
          if($check_status){
		     $profile_status['User']['contact_detail'] = "yes";
		  }else{
			 $profile_status['User']['contact_detail'] = "no";
		  }
		  //Emergency contact detail
		  $emergency_contact_field = array("emergency_contacts");
         
          $check_status = $this->check_fields_status($emergency_contact_field,$userInfo);
          if($check_status){
		     $profile_status['User']['emergency_contact_detail'] = "yes";
		  }else{
			 $profile_status['User']['emergency_contact_detail'] = "no";
		  }
          //media
          $media_fields = array("image","profile_video","profile_video_image","profile_banner");
          
          $check_status = $this->check_fields_status($media_fields,$userInfo);
          if($check_status){
		     $profile_status['User']['media'] = "yes";
		  }else{
			 $profile_status['User']['media'] = "no";
		  }
		  //House details
		  if(isset($userData[0]->user_sitter_house) && !empty($userData[0]->user_sitter_house)){
				  $houseInfo = $userData[0]->user_sitter_house->toArray();
				 //About Property 
				  $property_fields = array("about_home_desc","spaces_access_desc","home_pets_desc");
				  
				  $check_status = $this->check_fields_status($property_fields,$houseInfo);
				  if($check_status){
					 $profile_status['House']['house_description'] = "yes";
				  }else{
					 $profile_status['House']['house_description'] = "no";
				  }
				  //Pet in home
				  $property_fields = array("birds_in_cages","dogs_in_home","cats_in_home");
					 foreach($property_fields as $key=>$val){
						if($houseInfo[$val] == 'yes'){
							$profile_status['House']['pet_in_home'] = "yes";
						}else{
							$profile_status['House']['pet_in_home'] = "no";
						}
					  } 
				//Description
				  $description_fields = array("property_type","outdoor_area","outdoor_area_size","outing_allow_multiple","breaks_provided_every");
				  
				  $check_status = $this->check_fields_status($description_fields,$houseInfo);
				  if($check_status){
					 $profile_status['House']['about_property'] = "yes";
				  }else{
					 $profile_status['House']['about_property'] = "no";
				  }
					 //Photos
					if(isset($userData[0]->user_sitter_galleries) && !empty($userData[0]->user_sitter_galleries)){
						  $profile_status['House']['profile_gallery_photo'] = "yes";	
					}else{
						$profile_status['House']['profile_gallery_photo'] = "no";	
						}
					//Smokers
					if($houseInfo['smokers'] == 'yes'){
						$profile_status['House']['smokers'] = "yes";
					}else{
						$profile_status['House']['smokers'] = "no";
					}
						
			}else{
				$profile_status['House']['house_description'] = "no";
				$profile_status['House']['pet_in_home'] = "no";
				$profile_status['House']['profile_gallery_photo'] = "no";	
				$profile_status['House']['about_property'] = "no";
				$profile_status['House']['smokers'] = "no";
				
				}
		  
		  
		  //Guest details
		  if(isset($userData[0]->user_pets) && !empty($userData[0]->user_pets)){
			  
			  $guestInfo = $userData[0]->user_pets[0]->toArray();
			  
			  //Basic detail
			  $basic_fields = array("guest_name","guest_type","guest_breed","guest_weight","guest_age");
			  $check_status = $this->check_fields_status($basic_fields,$guestInfo);
			  if($check_status){
				 $profile_status['UserPets']['guest_basic_detail'] = "yes";
			  }else{
				 $profile_status['UserPets']['guest_basic_detail'] = "no";
			  }
			  //Description
			  $description_fields = array("guest_description");
			  $check_status = $this->check_fields_status($description_fields,$guestInfo);
			  if($check_status){
				 $profile_status['UserPets']['guest_description'] = "yes";
			  }else{
				 $profile_status['UserPets']['guest_description'] = "no";
			  }
			  //Guest Photos
			  if(isset($guestInfo['UserPets']['user_pet_galleries']) && !empty($guestInfo['user_pet_galleries'])){
				  $profile_status['UserPets']['guest_photos'] = "yes";
			  }else{
				  $profile_status['UserPets']['guest_photos'] = "no";
			  }
			  //Behaviour
			  $behaviour_fields = array("veterinary_name","friendly_with","care_instructions");
			  $check_status = $this->check_fields_status($behaviour_fields,$guestInfo);
			  if($check_status){
				 $profile_status['UserPets']['behaviour'] = "yes";
			  }else{
				 $profile_status['UserPets']['behaviour'] = "no";
			  }
          }else{
				 $profile_status['UserPets']['guest_basic_detail'] = "no";
				 $profile_status['UserPets']['guest_description'] = "no";
				 $profile_status['UserPets']['guest_photos'] = "no";
				 $profile_status['UserPets']['behaviour'] = "no";
		  }
		  //pr($profile_status);die;
		  //About Sitter
		   if(isset($userData[0]->user_about_sitter) && !empty($userData[0]->user_about_sitter)){
			  $aboutSitterInfo = $userData[0]->user_about_sitter->toArray();
			  //Sitter description
			  $description_fields = array("your_self","client_choose_desc");
			  $check_status = $this->check_fields_status($description_fields,$aboutSitterInfo);
			  if($check_status){
				 $profile_status['AboutSitter']['sitter_description'] = "yes";
			  }else{
				 $profile_status['AboutSitter']['sitter_description'] = "no";
			  }
			  //Accepted pet
			  $accepted_fields = array("sh_pet","sh_pet_sizes");
			  $check_status = $this->check_fields_status($accepted_fields,$aboutSitterInfo);
			  if($check_status){
				 $profile_status['AboutSitter']['accepted_pet'] = "yes";
			  }else{
				 $profile_status['AboutSitter']['accepted_pet'] = "no";
			  }
			  //Preferred guest ages pet
			  $preferred_fields = array("sh_guest_age");
			  $check_status = $this->check_fields_status($preferred_fields,$aboutSitterInfo);
			  if($check_status){
				 $profile_status['AboutSitter']['preferred_age'] = "yes";
			  }else{
				 $profile_status['AboutSitter']['preferred_age'] = "no";
			  }
			  
		   }else{
			   $profile_status['AboutSitter']['sitter_description'] = "no";
			   $profile_status['AboutSitter']['accepted_pet'] = "no";
			   $profile_status['AboutSitter']['preferred_age'] = "no";
			   }
		    if(isset($userData[0]->user_professional_accreditations_details) && !empty($userData[0]->user_professional_accreditations_details) && isset($userData[0]->user_professional_accreditations) && !empty($userData[0]->user_professional_accreditations)){
			  $skillsAccreditations =$userData[0]->user_professional_accreditations[0]->toArray();
			  $skillsAccreditationsDetailsInfo = $userData[0]->user_professional_accreditations_details[0]->toArray();
			 
			  foreach($userData[0]->user_professional_accreditations as $key=>$val){
				 if(($val->type_professional == "check") && ($val->sector_type == "govt") && !empty($val->scanned_certification)){
				     $profile_background_check['police_background_check'] = "yes";
			     }else{
					 $profile_background_check['police_background_check'] = "no";
				 } 
				 if(($val->type_professional == "govt") && ($val->sector_type == "licence") && !empty($val->scanned_certification)){
				  	 $profile_background_check['licence'] = "yes";
			     }else{
					 $profile_background_check['licence'] = "no";
				 }
			  }
			  if(($profile_background_check['police_background_check'] == 'yes') && ($profile_background_check['licence'] == 'yes')){
				   $profile_status['skillsAndAccreditationDetails']['background_check'] = "yes";
			  }else{
				   $profile_status['skillsAndAccreditationDetails']['background_check'] = "no";
			  }
			  //Experience
			  $experience_fields = array("experience");
			  $check_status = $this->check_fields_status($experience_fields,$skillsAccreditationsDetailsInfo);
			  if($check_status){
				 $profile_status['skillsAndAccreditationDetails']['experience'] = "yes";
			  }else{
				 $profile_status['skillsAndAccreditationDetails']['experience'] = "no";
			  }
			  //Language
			  $languages_fields = array("languages");
			  $check_status = $this->check_fields_status($languages_fields,$skillsAccreditationsDetailsInfo);
			  if($check_status){
				 $profile_status['skillsAndAccreditationDetails']['language'] = "yes";
			  }else{
				 $profile_status['skillsAndAccreditationDetails']['language'] = "no";
			  }
			}else{
				
				$profile_status['skillsAndAccreditationDetails']['background_check'] = "no";
				$profile_status['skillsAndAccreditationDetails']['background_check'] = "no";
				$profile_status['skillsAndAccreditationDetails']['experience'] = "no";
				$profile_status['skillsAndAccreditationDetails']['language'] = "no";
			}
			if(isset($userData[0]->user_sitter_services) && !empty($userData[0]->user_sitter_services)){
			     $servicesInfo = $userData[0]->user_sitter_services[0]->toArray();
			  //Terms
			  if(($servicesInfo['cancellation_policy_status'] == 1) && ($servicesInfo['booking_status'] == 1)){
				 $profile_status['servicesAndRates']['terms'] = "yes";
			  }else{
				 $profile_status['servicesAndRates']['terms'] = "no";
			  }
			  //Sitter House
			  if($servicesInfo['sitter_house_status'] == 1){
				 $profile_status['servicesAndRates']['sitter_house_status'] = "yes";
			  }else{
				 $profile_status['servicesAndRates']['sitter_house_status'] = "no";
			  }
			  //Guest House
			  if($servicesInfo['guest_house_status'] == 1){
				 $profile_status['servicesAndRates']['guest_house_status'] = "yes";
			  }else{
				 $profile_status['servicesAndRates']['guest_house_status'] = "no";
			  }
			  //Maket Place
			  if($servicesInfo['market_place_status'] == 1){
				 $profile_status['servicesAndRates']['market_place_status'] = "yes";
			  }else{
				 $profile_status['servicesAndRates']['market_place_status'] = "no";
			  }
			  //Calender
			  $calender_fields = array("sh_dc_additional_guest_limit","sh_nc_additional_guest_limit","	gh_dc_additional_guest_limit","gh_nc_additional_guest_limit");
			  $check_status = $this->check_fields_status($calender_fields,$servicesInfo);
			  if($check_status){
				 $profile_status['servicesAndRates']['calender'] = "yes";
				 //Set session for calendar limits
			     $session->write('calendar_limits','yes');
			  }else{
				 $profile_status['servicesAndRates']['calender'] = "no";
				 //Set session for calendar limits
			     $session->write('calendar_limits','no');
			  }
			  
		    }else{
				  $profile_status['servicesAndRates']['terms'] = "no";
				  $profile_status['servicesAndRates']['sitter_house_status'] = "no";
				  $profile_status['servicesAndRates']['guest_house_status'] = "no";
				  $profile_status['servicesAndRates']['market_place_status'] = "no";
				  $profile_status['servicesAndRates']['calender'] = "no";
				}
		    //Skills and Accreditations 
		 
		  //Calculate profiles percentage
		   $status_profile = 0;
			    $profile_count = count($profile_status['User']);
			    foreach($profile_status['User'] as $single_status){
					if($single_status == "yes"){
					  	$status_profile++;
				    }
				}
				$profile_percentage['User'] = ceil(($status_profile/$profile_count)*100);
				
			    $profile_count = count($profile_status['House']);
			    $status_profile = 0;
				foreach($profile_status['House'] as $single_status){
					if($single_status == "yes"){
					  	$status_profile++;
				    }
				}
				 $profile_percentage['House'] = ceil(($status_profile/$profile_count)*100);
				
				 $profile_count = count($profile_status['UserPets']);
			     $status_profile = 0;
				foreach($profile_status['UserPets'] as $single_status){
					if($single_status == "yes"){
					  	$status_profile++;
				    }
				}
				$profile_percentage['UserPets'] = ceil(($status_profile/$profile_count)*100);
				
				$profile_count = count($profile_status['AboutSitter']);
			    $status_profile = 0;
				foreach($profile_status['AboutSitter'] as $single_status){
					if($single_status == "yes"){
					  	$status_profile++;
				    }
				}
				$profile_percentage['AboutSitter'] = ceil(($status_profile/$profile_count)*100);
				
				$profile_count = count($profile_status['skillsAndAccreditationDetails']);
			    $status_profile = 0;
				foreach($profile_status['skillsAndAccreditationDetails'] as $single_status){
					if($single_status == "yes"){
					  	$status_profile++;
				    }
				}
				$profile_percentage['skillsAndAccreditationDetails'] = ceil(($status_profile/$profile_count)*100);
				
				$profile_count = count($profile_status['servicesAndRates']);
			    $status_profile = 0;
				foreach($profile_status['servicesAndRates'] as $single_status){
					if($single_status == "yes"){
					  	$status_profile++;
				    }
				}
				$profile_percentage['servicesAndRates'] = ceil(($status_profile/$profile_count)*100);
        if(isset($userData[0]->user_sitter_availability) && !empty($userData[0]->user_sitter_availability)){
		    $profile_percentage['calendar_setup'] = 100;
		}else{
		    $profile_percentage['calendar_setup'] = 0;
		}
		//pr($profile_status);die;
		
		  $this->set('profile_status',$profile_status);
		  $this->set('profile_percentage',$profile_percentage);
          //End
      
         if(isset($this->request->params['pass']) && !empty($this->request->params['pass'])){
			 if($this->request->params['pass'][0] == 'sitter'){
				 $session->write('profile','Sitter');
			 }else{
				 $session->write('profile','Guest');
			 }
		 }
		   
     }
	/**Function for check fields ampty or not
	*/
	function check_fields_status($fields = array(),$main_array = array()){
		
	   foreach($fields as $key=>$val){
			    if(!empty($main_array[$val])){
				   return true;
		        }else{
				   return false;
				}
		   } 
	}
    /**
    Function for dashboard sitter details
	*/
	function dashboardDetails()
	{
		$this->viewBuilder()->layout('profile_dashboard');

		$SiteConfigurationsModel = TableRegistry::get('SiteConfigurations');
        $siteInfo = $SiteConfigurationsModel->find('all')->first();
        $this->set('siteInfo',$siteInfo);

        $session = $this->request->session();
        $userId = $session->read('User.id');
        $userType = $session->read('User.user_type');

        $bookingRequestModel = TableRegistry::get('BookingRequests');
          
		$this->ajaxCalendarBooking();
	    $this->home();
	}
 	public function ajaxCalendarBooking()
    {
            $session=$this->request->session();
			$userId=$session->read('User.id');
			$userType = $session->read('User.user_type');
			
			$bookingRequestModel = TableRegistry :: get("BookingRequests");
			$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
			$fieldname = $userType == 'Sitter'?'sitter':'guest';
			$bookingData = $bookingRequestModel->find('all')
						->where(['BookingRequests.'.$condition_field => $userId,'BookingRequests.folder_status_guest' => "pending",'BookingRequests.read_status' => "unread"])
						->contain(['Users'=> ['queryBuilder' => function ($q) {
																			return $q->select(['Users.id','Users.first_name','Users.last_name','Users.image','Users.city','Users.state','Users.country']);
																		}
													]
								  ]
						)
						->hydrate(false)->toArray();
			$user_Data = $bookingRequestModel->find('all')
						->where(['BookingRequests.'.$condition_field => $userId,'BookingRequests.folder_status_guest' => "pending",'BookingRequests.read_status' => "unread"])
						->group('BookingRequests.user_id HAVING COUNT(BookingRequests.user_id) = 1')
					    ->hydrate(false)->toArray();
				    
			$client_stay_status["new_clients"] = count($user_Data);
			$user_current = $bookingRequestModel->find('all')
						->where(['BookingRequests.'.$condition_field => $userId,'BookingRequests.folder_status_guest' => "current",'BookingRequests.read_status' => "unread"])
						->hydrate(false)->count();
						
			$client_stay_status["events"] = $user_current;
		    
			$booking_arr = array();
			foreach($bookingData as $k=>$user_booking){
				$booking_arr[$k]["start_date"]= $user_booking['booknig_start_date'];
				$booking_arr[$k]["end_date"]= $user_booking['booking_end_date'];
				$booking_arr[$k]["avail_status"]= $user_booking['status'];
			}
			$client_stay_status["house_sitting"]=$client_stay_status["boarding"]=$client_stay_status["drop_in_visit"]=$client_stay_status["day_nigth_care"]=$client_stay_status["market_place"]=0;
			
	    $booking_count = count($bookingData);
	    
	    $client_stay_status["unread_message"] = $booking_count;
	    
	    if(isset($bookingData) && !empty($bookingData)){
			
			$house_sitting=$boarding=$drop_in_visit=$day_nigth_care=$market_place = 1;
			$events=0;
			
			foreach($bookingData as $single_booking){
				
			    if($single_booking['required_service'] == "house_sitting"){
					
					$client_stay_status["house_sitting"] = $house_sitting++;
					
				}else if($single_booking['required_service'] == "boarding"){
					
					 $client_stay_status["boarding"] = $boarding++;
					 
				}else if($single_booking['required_service'] == "drop_in_visit"){
					
					$client_stay_status["drop_in_visit"] = $drop_in_visit++;
					
				}else if($single_booking['required_service'] == "day_nigth_care"){
					
					$client_stay_status["day_nigth_care"] = $day_nigth_care++;
					
				}else if($single_booking['required_service'] == "market_place"){
					
					$client_stay_status["market_place"] = $market_place++;
				}
			}
		 $client_stay_status["house_sitting_clients"] = $client_stay_status["house_sitting"];
		 $client_stay_status["boarding_clients"] = $client_stay_status["boarding"];
		 $client_stay_status["drop_in_visit_clients"] = $client_stay_status["drop_in_visit"];
		 $client_stay_status["day_nigth_care_clients"] = $client_stay_status["day_nigth_care"];
		 $client_stay_status["market_place_clients"] = $client_stay_status["market_place"];
		 $client_stay_status["alerts"]= $booking_count;
		 
		 $client_stay_status["house_sitting"]  = number_format((float)(($client_stay_status["house_sitting"]/$booking_count)*100), 2, '.', '');
		 $client_stay_status["boarding"]  = number_format((float)(($client_stay_status["boarding"]/$booking_count)*100), 2, '.', '');
		 $client_stay_status["drop_in_visit"]  = number_format((float)(($client_stay_status["drop_in_visit"]/$booking_count)*100), 2, '.', '');
		 $client_stay_status["day_nigth_care"]  = number_format((float)(($client_stay_status["day_nigth_care"]/$booking_count)*100), 2, '.', '');
		 $client_stay_status["market_place"]  = number_format((float)(($client_stay_status["market_place"]/$booking_count)*100), 2, '.', ''); 
			
		}else{
				 $client_stay_status["house_sitting_clients"] = $client_stay_status["house_sitting"];
				 $client_stay_status["boarding_clients"] = $client_stay_status["boarding"];
				 $client_stay_status["drop_in_visit_clients"] = $client_stay_status["drop_in_visit"];
				 $client_stay_status["day_nigth_care_clients"] = $client_stay_status["day_nigth_care"];
				 $client_stay_status["market_place_clients"] = $client_stay_status["market_place"];
				 $client_stay_status["alerts"]= 0;
		}
		
		 $calendar = new  \Calendarbooking();
		 
         $this->set('calender',$calendar->show($booking_arr));
         $this->set('client_stay_status',$client_stay_status);
         $this->set('booking_requests_info',$bookingData);	 
		
	}
    /**
     Function for change booking status
    */
     function changeBookingStatus($bookingId = null ){
		 $bookingModel = TableRegistry :: get("BookingRequests");
		 $bookingId = convert_uudecode(base64_decode($bookingId));
		 $bookingData = $bookingModel->newEntity();
	     $bookingData->id =$bookingId;
	     $bookingData->folder_status_sitter = "current";
	     
	     $bookingModel->save($bookingData);
	      return $this->redirect(['controller' => 'dashboard', 'action' => 'dashboard-details']);
	 }
	/* send a reference to friend */
	function reference(){
		$this->request->data = @$_REQUEST;
		$session = $this->request->session();		
		$userId = $session->read('User.id');
	 if(isset($this->request->data['UserReferences']) && !empty($this->request->data['UserReferences'])){
			$UsersModel = TableRegistry::get('Users');
			
		if(!empty($this->request->data['UserReferences']['email'])){
			
			$checkUser = $UsersModel->find('all',['conditions'=>['Users.email'=>$this->request->data['UserReferences']['email']]])->toArray();
			if(!count($checkUser)) { // check if user is present in users table
				
				$references = TableRegistry::get('UserReferences');
				$checkReference = $references->find('all',['conditions'=>['UserReferences.email'=>$this->request->data['UserReferences']['email']]])->toArray();
				if(!count($checkReference)){ // check if code is already generated 
					
					$reference = $references->newEntity();
					
					
					$reference->user_id = $userId;
					$reference->email = $this->request->data['UserReferences']['email'];
					//$genReferCode = $this->RandomStringGenerator(6);
					//$reference->reference_code = $genReferCode;
					$reference->status = 0;
					if($references->save($reference)){
						/*$userData = $UsersModel->newEntity();
						$userData->id = $userId;
						$userData->reference_id = $userId;*/
						
						$link = $this->request->data['UserReferences']['refer_url'];
						$linkOnMail = '<a href="'.$link.'" target="_blank">Click Here For Sign Up With Reference Code</a>';
						
						$replace = array('{fullname}'/*,'{refcode}'*/,'{link}');
						
                        $referEmail = $this->request->data['UserReferences']['email'];
                        $referEmail =strcspn($referEmail,"@");
                        $referName = substr($this->request->data['UserReferences']['email'],'0',$referEmail);
                        
                        $with = array($referName/*,$genReferCode*/,$linkOnMail);
						$this->send_email('',$replace,$with,'reference_code',$this->request->data['UserReferences']['email']);
                        
                        echo 'Success:Reference link has been sent on the email.';
						$this->setSuccessMessage('Reference link has been sent on the email.');
						die;
					}else{
						 echo 'Error:Something Went Wrong Try again later';
                        $this->setErrorMessage('Something Went Wrong Try again later');
                        die;
					}
				}else{
					echo 'Error:You have already refered this member,Please try another.';
                    // $this->setErrorMessage('Reference Code already generated for this email');
					die;
				}
			}else{
				echo 'Error:User already exists, Please try any other email';
                $this->setErrorMessage('User already exists, Please try any other email');
				die;
			}
		}else{
			  echo 'Error:Something Went Wrong Try again later';
			  $this->setErrorMessage('Something Went Wrong Try again later');
			  die;
		}
	}
	
}
/**
function for promote
*/
function generatePromocode(){
			$this->request->data = @$_REQUEST;
			
			 $session = $this->request->session();
             $userId = $session->read('User.id');
         
			 if(isset($this->request->data['UserPromocode']['promocode']) && !empty($this->request->data['UserPromocode']['promocode'])){
		    //$regex = "/^[a-z][0-9]+$/";
			if(ctype_alnum($this->request->data['UserPromocode']['promocode'])){
				$UsersModel = TableRegistry::get('Users');
				 
				 $checkReferenceCode = $UsersModel->get($userId);
				 //pr($checkReferenceCode);die;
				 if(empty($checkReferenceCode->reference_code)){
					  $userData = $UsersModel->newEntity();
					  $userData->id = $userId;
					  $userData->reference_code = $this->request->data['UserPromocode']['promocode'];
					 if($UsersModel->save($userData)){
					    echo 'Success:You has been generated promocode';
				        die;
					 }else{
						echo 'Error:Something Went Wrong Try again later';die;
					 }
					
				 }else{
					 echo 'Error:You okoko have already generated promocode';die;
				 }
			}else {
								
					echo "Error:Please enter alphanumeric value only";die;
			   }
			}else{
				  echo 'Error:Something Went Wrong Try again later';die;
			}
}
/**
function for promote
*/
function promote(){
	   $this->viewBuilder()->layout('profile_dashboard');
	   /////////////////
	     $usersModel = TableRegistry :: get("Users");
	     $session = $this->request->session();
         $userId = $session->read('User.id');
          //For Update profile status
			    $userData = $usersModel->get($userId);
				//$session->write('User.user_type',$userData[0]->user_type);
				$userInfo =	array();
				$refer_code = substr($userData->email, 0, strpos($userData->email, '@'));
				//$userInfo['email'] = $userData->email;
				$userInfo['refer_url'] = HTTP_ROOT."share/".$refer_code."/promocode/";
				
				$this->set('refer_url', $userInfo['refer_url']);
				$this->set('reference_code', $userData->reference_code);
	  ////////////////
}
/**
* Function to generate random string
*/
	function RandomStringGenerator($length = 10)
	{              
	  $string = "";
	  $pattern = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		for($i=0; $i<$length; $i++)
		{
			$string .= $pattern{rand(0,61)};
		}
		return $string;
	}

	
    /*=================Validation For password=================*/
    function validate_password($data, $user_info)
	{
		$errors=array();
		if(trim($data['current_password'])=='')
		{
	            if(trim($data['password']) !='')
				{
					$errors['current_password'][]="Required field\n";
				}
				
				if(trim($data['re_password'])!='')
				{
					$errors['current_password'][]="Required field\n";
				}
				
		}else{

				if(trim(md5($data['current_password'])) != $user_info->password)
				{
					$errors['current_password'][]="Current password not matched\n";
				}else{
					    if(trim($data['password'])=='')
						{
							$errors['password'][]="Required field\n";
						}
						
						if(trim($data['re_password'])=='')
						{
							$errors['re_password'][]="Required field\n";
						}
						if(trim($data['password'])!='' && trim($data['re_password'])!=''){
							if(trim($data['password']) != trim($data['re_password'])){
								$errors['re_password'][]="Password not matched\n";
							}
						}
				}
		}
		return $errors;
	}
    /*=================End password validation========*/
    /**
Function for Front profile dashboard
    */
    function frontDashboard(){
		$this->viewBuilder()->layout('profile_dashboard');
		$usersModel = TableRegistry::get('Users');
		
		 $session = $this->request->session();
         $userId = $session->read('User.id');
          //For Update profile status
			  $userData = $usersModel->find('all',['contain'=>[
													'UserSitterServices', 
													'UserProfessionalAccreditationsDetails',
													'UserProfessionalAccreditations',
													'UserAboutSitters',
													'UserPets',
													'UserSitterHouses'
													]
												]
										)
						   ->where(['Users.id' => $userId], ['Users.id' => 'integer[]'])
						   ->toArray();
			  
			  if(isset($userData[0]->user_sitter_house['dogs_in_home']) && !empty($userData[0]->user_sitter_house['dogs_in_home']))
				{
					if($userData[0]->user_sitter_house['dogs_in_home'] == 'yes'){
						 $dog_in_home = 'yes';
					}else{
						$dog_in_home = 'no';
					}
					$this->set('dog_in_home',$dog_in_home);
				}else{
					$this->set('dog_in_home',"no");
				}
				if(isset($userData[0]->user_sitter_house) && empty($userData[0]->user_sitter_house) && isset($userData[0]->user_pets) && empty($userData[0]->user_pets) && empty($userData[0]->user_sitter_house) && empty($userData[0]->user_professional_accreditations_details) && empty($userData[0]->user_sitter_services)){
				      $this->set('profileStatus','both_create');
				}else if(!empty($userData[0]->user_professional_accreditations_details) || !empty($userData[0]->user_sitter_services)){
				     $this->set('profileStatus','sitter_update');
				}else if((!empty($userData[0]->user_sitter_house) || !empty($userData[0]->user_pets) ) && empty($userData[0]->user_professional_accreditations_details) && empty($userData[0]->user_sitter_services)){
				    $this->set('profileStatus','guest_update');
				}else{
					$this->set('profileStatus','');
				}
				$session->write('User.user_type',$userData[0]->user_type);
				
				$userInfo =	array();
				$refer_code = substr($userData[0]->email, 0, strpos($userData[0]->email, '@'));
				$userInfo['email'] = $userData[0]->email;
				$userInfo['refer_url'] = HTTP_ROOT."share/".$refer_code."/token/".base64_encode(convert_uuencode($userData[0]->id));
				//pr($userInfo);die;
				$this->set('refer_url', $userInfo['refer_url']);
				$this->set('user_email', $userInfo['email']);
				
				$metaTagForShare = '<meta name="description" content="Give $10 to your firends to use on their first stay You\'ll also get $10 when they complete their first booking." />

				<!-- Twitter Card data -->
				<meta name="twitter:card" value="summary">

				<!-- Open Graph data -->
				<meta property="og:title" content="Refer Friends & Get $10" />
				<meta property="og:type" content="article" />
				<meta property="og:url" content="'.$userInfo['refer_url'].'" />
				<meta property="og:image" content="'.HTTP_ROOT.'img/bg-family.png" />
				<meta property="og:description" content="Give $10 to your firends to use on their first stay You\'ll also get $10 when they complete their first booking." />'; 
				
			    $this->set('metaTag', $metaTagForShare);
				
	 }
	 
	/**
	 function for varification
	 */
	 function varificationMobileNumber(){
		 $usersModel = TableRegistry::get('Users');
		 
		 $session = $this->request->session();
         $userId = $session->read('User.id');
         $this->request->data = $_REQUEST;
           //pr($this->request->data['Userverify']);die;
           if(isset($this->request->data['Userverify']) && !empty($this->request->data['Userverify'])){
			   $user_verify = $usersModel->find('all')->select(["id","otp"])
						->where(['Users.id' => $userId])->toArray();
						 //echo "Success:".$this->request->data['Userverify']['otp_verify'];die;
				if($this->request->data['Userverify']['otp_verify'] == ""){	
					       echo "Error:This field is required.";die;
				}else{	 
				    if(!empty($user_verify[0]->otp) && ($user_verify[0]->otp == $this->request->data['Userverify']['otp_verify'])){
						
						    $userData = $usersModel->newEntity();
						    $userData->id = $userId;
							$userData->mobile_verification = 1;
							
							if($usersModel->save($userData)){
								 echo "Success:You mobile number has been verified.";die;
							}else{
								 echo "Error:Network not working, please try again.";die;
							}
					}else{
					    echo "Error:Your mobile number verification failed, please try again";die;
					}
				 }
					
					
		   }else{
			    $digits = 6;
				$four_digits = rand(pow(10, $digits-1), pow(10, $digits)-1);
				
				$userData = $usersModel->newEntity();
				$userData->id = $userId;
				$userData->otp = $four_digits;
				if($usersModel->save($userData)){
					 echo "Success:Verification code has been sent on your registered  mobile number.";die;
				}else{
				     echo "Error:Network not working, please try again.";die;
				}
		 }
     }
    /**
  Function for Profile
    */
    function profile(){
    	 $this->viewBuilder()->layout('profile_dashboard');

    	 $captchErr="";
         $usersModel = TableRegistry::get('Users');
         $countryCodesModel = TableRegistry::get('CountryCodes');
         
         $session = $this->request->session();
         $userId = $session->read('User.id');

         $user_info = $usersModel->get($userId,['fields'=>['id','password']]);
         $this->request->data = @$_REQUEST;
		
		if(isset($this->request->data['Users']) && !empty($this->request->data['Users']))
		{       
			//pr($this->request->data['Users']);die;
		  	if(isset($this->request->data['Usersp']['current_password']) && !empty($this->request->data['Usersp']['current_password'])){
			
				if(isset($this->request->data['g-recaptcha-response']) && !empty($this->request->data['g-recaptcha-response']))
				  {
						//your site secret key
						$secret = CAPTCHA_SECRET_KEY;
						//get verify response data
						$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$this->request->data['g-recaptcha-response']);
						$responseData = json_decode($verifyResponse);
					if($responseData->success)
					{
						$data=$this->request->data['Usersp'];

						$error=$this->validate_password($data,$user_info);
						if(count($error) > 0)
						{
								$userData = $usersModel->newEntity();
								$userData = $usersModel->patchEntity($userData, $this->request->data['Users'],['validate'=>'update']);
								$userData->id = $userId;
							    $usersModel->save($userData);
							    $userData = $usersModel->get($userId);
							    if(empty($userData->otp) && $userData->mobile_verification == 0 && !empty($userData->phone)){
									
										$msg_body = "Hi ".$userData->first_name.", Thanks for adding your phone number, Your verification code is ".$userData->otp;
										$this->genrateOtp($userData->country_code.$userData->phone,$msg_body);
							    }	
							unset($userData->id);
							$this->set('userInfo', $userData);
							$this->set('error',$error);
							$this->Flash->error(__('Error found, Kindly fix the errors.'));
						}else{
							    $userData = $usersModel->newEntity();
								$userData = $usersModel->patchEntity($userData, $this->request->data['Users'],['validate'=>'update']);
								$userData->id = $userId;
								 $userData->password = MD5($this->request->data['Usersp']['password']);
								 $userData->org_password = $this->request->data['Usersp']['password'];
								 if ($usersModel->save($userData)){
									 $userData = $usersModel->get($userId);
									if(empty($userData->otp) && $userData->mobile_verification == 0 && !empty($userData->phone)){
										$msg_body = "Hi ".$userData->first_name.", Thanks for adding your phone number, Your verification code is ".$userData->otp;
										$this->genrateOtp($userData->country_code.$userData->phone,$msg_body);
									 }
									 
									return $this->redirect(['controller'=>'dashboard','action'=>'house']);
								}else{
									$this->Flash->error(__('Error found, Kindly fix the errors.'));
								}
								unset($userData->id);
								$this->set('userInfo', $userData);
						}
					   }else{
								$captchErr = $this->stringTranslate(base64_encode('Robot verification failed, please try again'));
							}

					}else{
							$captchErr = $this->stringTranslate(base64_encode('Please click on the reCAPTCHA box'));
					}
				}else{

                     $userData = $usersModel->newEntity();
		                $userData = $usersModel->patchEntity($userData, $this->request->data['Users'],['validate'=>'update']);
		                $userData->id = $userId;
		                
		                if ($usersModel->save($userData)) {
							$userData = $usersModel->get($userId);
							if(empty($userData->otp) && $userData->mobile_verification == 0 && !empty($userData->phone)){
								  $msg_body = "Hi ".$userData->first_name.", Thanks for adding your phone number, Your verification code is ".$userData->otp;
									$this->genrateOtp($userData->country_code.$userData->phone,$msg_body);
							 }
							return $this->redirect(['controller'=>'dashboard','action'=>'house']);
		                }else{
							
                        $data=$this->request->data['Usersp'];
						$error=$this->validate_password($data,$user_info);
						if(count($error) > 0)
						{
								$userData = $usersModel->newEntity();
								$userData = $usersModel->patchEntity($userData, $this->request->data['Users'],['validate'=>'update']);
							   $userData->id = $userId;
							   $usersModel->save($userData);
							   $userData = $usersModel->get($userId);
							   
							   if(empty($userData->otp) && $userData->mobile_verification == 0 && !empty($userData->phone)){
								  
										$msg_body = "Hi ".$userData->first_name.", Thanks for adding your phone number, Your verification code is ".$userData->otp;
										$this->genrateOtp($userData->country_code.$userData->phone,$msg_body);
							    }		
							unset($userData->id);
							$this->set('userInfo', $userData);
							$this->set('error',$error);

							$this->Flash->error(__('Error found, Kindly fix the errors.'));
						}else{
							 $userData = $usersModel->newEntity();
								$userData = $usersModel->patchEntity($userData, $this->request->data['Users'],['validate'=>'update']);
								$userData->id = $userId;
								if ($usersModel->save($userData)) {
									$userData = $usersModel->get($userId);
									if(empty($userData->otp) && $userData->mobile_verification == 0 && !empty($userData->phone)){
										
										$msg_body = "Hi ".$userData->first_name.", Thanks for adding your phone number, Your verification code is ".$userData->otp;
										$this->genrateOtp($userData->country_code.$userData->phone,$msg_body);
							        }
									return $this->redirect(['controller'=>'dashboard','action'=>'house']);
								}else{
									$this->Flash->error(__('Error found, Kindly fix the errors.'));
								}
								unset($userData->id);
								$this->set('userInfo', $userData);
						}
					}
				}
        }else{
		   $userData = $usersModel->get($userId);
		   unset($userData->id);
		   $this->set('userInfo', $userData);
        }
	    
	    if($captchErr != ''){
	      $this->set('captchErr',@$captchErr);	
	    }else{
	    	 $this->set('captchErr','');
	    }
	    
        $countrydata = $countryCodesModel->find('all')->order(['CountryCodes.phonecode'=>"ASC"])->toArray();
		 foreach($countrydata as $key=>$val){
                $country_info[$val['phonecode']] = $val['iso']; 
		 }
		 $this->set('country_info',$country_info);
         $zonesModel = TableRegistry::get('Zones');
		 $zones_data = $zonesModel->find('all')->toArray();
		 foreach($zones_data as $key=>$val){
                $zones_info[$key] = $val['zone_name']; 
		 }
		 $this->set('zones_info',$zones_info);
	}
      /**
    Function for Sitter House
    */
    function house(){
    	  $this->viewBuilder()->layout('profile_dashboard');
          $usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');
   
        $sitterHousesModel = TableRegistry::get('UserSitterHouses');
        if(isset($this->request->data['UserSitterHouses']) && !empty($this->request->data['UserSitterHouses']))
		{
			$sitterHouseData = $sitterHousesModel->newEntity();
               $sitterHouseData = $sitterHousesModel->patchEntity($sitterHouseData, $this->request->data['UserSitterHouses'],['validate'=>true]);
                $sitterHouseData->user_id = $userId;
			    if ($sitterHousesModel->save($sitterHouseData)){
				//For redirect on about guest tab
				 $userData = $usersModel->find('all',['contain'=>[
															'UserSitterHouses' 
															]
														]
												)
								   ->where(['Users.id' => $userId], ['Users.id' => 'integer[]'])
								   ->toArray();
							  
				if(isset($userData[0]->user_sitter_house['dogs_in_home']) && !empty($userData[0]->user_sitter_house['dogs_in_home']))
				{
					if($userData[0]->user_sitter_house['dogs_in_home'] == 'yes'){
						 $session->write('dog_in_home_status','yes');
						 //echo $session->read("profile");die;
						return $this->redirect(['controller'=>'dashboard','action'=>'about-guest']);
					}else{
						$session->write('dog_in_home_status','no');
						return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);
					}
				}
			   //End
				}else{
				  $this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 	unset($sitterHouseData->id);
		       $this->set('sitterHouseData', $sitterHouseData);

		            $query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
		           if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
		                  $images_arr = $query->user_sitter_galleries;
		                  $sitterImg = array();
		                   $html = " ";
		                   foreach($images_arr as $key=>$val){
		                   	 $html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
		                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg zIndex-1" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
		                   	 $html .='</div></div>';
		                    }
		                $this->set('sitter_images', $html);
		            }
		}else{

		    $query = $usersModel->get($userId,['contain'=>'UserSitterHouses']);
		    if(isset($query->user_sitter_house) && !empty($query->user_sitter_house)){
                   $sitterHouseData = $query->user_sitter_house;
				  $this->set('sitterHouseId', $sitterHouseData->id);
                   $this->set('sitterHouseData', $sitterHouseData);
		    }
		    $query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
           if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
                  $images_arr = $query->user_sitter_galleries;
                  $sitterImg = array();
                   $html = " ";
                   foreach($images_arr as $key=>$val){
                   	 $html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg zIndex-1" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
                   	 $html .='</div></div>';
                    }
                $this->set('sitter_images', $html);
            }
            
            
        }
       
	}
    /**
    Function for Sitter House
    */
    function sitterHouse(){
    	  $this->viewBuilder()->layout('profile_dashboard');
          $usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');
   
        $sitterHousesModel = TableRegistry::get('UserSitterHouses');
        if(isset($this->request->data['UserSitterHouses']) && !empty($this->request->data['UserSitterHouses']))
		{
			$sitterHouseData = $sitterHousesModel->newEntity();
               $sitterHouseData = $sitterHousesModel->patchEntity($sitterHouseData, $this->request->data['UserSitterHouses'],['validate'=>true]);
                $sitterHouseData->user_id = $userId;
			    if ($sitterHousesModel->save($sitterHouseData)){
               	     return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);
				}else{
				  $this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 	unset($sitterHouseData->id);
		       $this->set('sitterHouseData', $sitterHouseData);

		            $query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
		           if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
		                  $images_arr = $query->user_sitter_galleries;
		                  $sitterImg = array();
		                   $html = " ";
		                   foreach($images_arr as $key=>$val){
		                   	 $html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
		                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg zIndex-1" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
		                   	 $html .='</div></div>';
		                    }
		                $this->set('sitter_images', $html);
		            }
		}else{

		    $query = $usersModel->get($userId,['contain'=>'UserSitterHouses']);
		    if(isset($query->user_sitter_house) && !empty($query->user_sitter_house)){
                   $sitterHouseData = $query->user_sitter_house;
				  $this->set('sitterHouseId', $sitterHouseData->id);
                   $this->set('sitterHouseData', $sitterHouseData);
		    }
		    $query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
           if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
                  $images_arr = $query->user_sitter_galleries;
                  $sitterImg = array();
                   $html = " ";
                   foreach($images_arr as $key=>$val){
                   	 $html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg zIndex-1" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
                   	 $html .='</div></div>';
                    }
                $this->set('sitter_images', $html);
            }
            
            
        }
	}
     /**
    Function for Sitter
    */
    function aboutSitter(){
    	 $this->viewBuilder()->layout('profile_dashboard');
         $usersModel = TableRegistry::get('Users');

         $session = $this->request->session();
         $userId = $session->read('User.id');

        $aboutSittersModel = TableRegistry::get('UserAboutSitters');
        $this->request->data = @$_REQUEST;

		if(isset($this->request->data['UserAboutSitters']) && !empty($this->request->data['UserAboutSitters']))
		{
			$aboutSitterData = $aboutSittersModel->newEntity();
           //pr($this->request->data['UserAboutSitters']);die;
            
           // if(!empty($this->request->data['UserAboutSitters']['sh_pet_sizes']) || isset($this->request->data['UserAboutSitters']['sh_pet_sizes'])){
           
				
		  //$petSizeArr = $this->request->data['UserAboutSitters']['sh_pet_sizes'];
		  //$aboutSitterData->sh_pet_sizes = $this->request->data['UserAboutSitters']['sh_pet_sizes'] = implode(",",$petSizeArr);
	       // }
	       // if(!empty($this->request->data['UserAboutSitters']['gh_pet_sizes']) || isset($this->request->data['UserAboutSitters']['gh_pet_sizes'])){
	              //$petSizeArr = $this->request->data['UserAboutSitters']['gh_pet_sizes'];
	             //$aboutSitterData->gh_pet_sizes = $this->request->data['UserAboutSitters']['gh_pet_sizes'] = implode(",",$petSizeArr);
	        //}
		     $aboutSitterData = $aboutSittersModel->patchEntity($aboutSitterData, $this->request->data['UserAboutSitters'],['validate'=>true]);
            $aboutSitterData->user_id = $userId;
            $aboutSitterData->sh_pet_sizes = str_replace(' ','',$this->request->data['UserAboutSitters']['sh_pet_sizes']);
			$aboutSitterData->gh_pet_sizes = str_replace(' ','',$this->request->data['UserAboutSitters']['gh_pet_sizes']);
			$aboutSitterData->sh_pet = str_replace(' ','',$this->request->data['UserAboutSitters']['sh_pet']);
			$aboutSitterData->gh_pet = str_replace(' ','',$this->request->data['UserAboutSitters']['gh_pet']);
                //pr($aboutSitterData);die;
			  if ($aboutSittersModel->save($aboutSitterData)){
                       //pr($aboutSitterData);die;
                      return $this->redirect(['controller'=>'dashboard','action'=>'professional-accreditations']);
				}else{

					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 	unset($aboutSitterData->id);
			 	if(isset($aboutSitterData->id) && !empty($aboutSitterData->id)){
			 		$this->set('aboutSitterId', $aboutSitterData->id);
			 	}
		       $this->set('sitter_info', $aboutSitterData);
        }else{
            $query = $usersModel->get($userId,['contain'=>'UserAboutSitters']);
          
           if(isset($query->user_about_sitter) && !empty($query->user_about_sitter)){
                   $aboutSitterData = $query->user_about_sitter;
				   //pr($aboutSitterData);die;
				   $sizeArr=$aboutSitterData['sh_pet_sizes'];
				   $ghSizeArr=$aboutSitterData['gh_pet_sizes'];
				   $shArr=$aboutSitterData['sh_pet'];
				   $ghArr=$aboutSitterData['gh_pet'];
					if(!empty($sizeArr)){
						$skillFlag=1;
					}
					else{
						$skillFlag=0;
					}
					if(!empty($ghSizeArr)){
						
						$gh_pet_sizesFlag=1;
					}
					else{
						$gh_pet_sizesFlag=0;
					}
					if(!empty($shArr)){
						
						$shFlag=1;
					}
					else{
						$shFlag=0;
					}
					if(!empty($ghArr)){
						
						$ghFlag=1;
					}
					else{
						$ghFlag=0;
					}
				   $this->set('shArr',$shArr);
				   $this->set('ghArr',$ghArr);
				   $this->set('shFlag',$shFlag);
				   $this->set('ghFlag',$ghFlag);
				   $this->set('skillFlag',$skillFlag);
				   $this->set('gh_pet_sizesFlag',$gh_pet_sizesFlag);
				   $this->set('sizeArr',$sizeArr);
				   $this->set('ghSizeArr',$ghSizeArr);
                   $this->set('aboutSitterId', $aboutSitterData->id);
                   unset($aboutSitterData->id);
                   $this->set('sitter_info', $aboutSitterData);
		    }
		   
        }
	     

    }
/**
	Function for about guest
*/
function aboutGuest(){
    $this->viewBuilder()->layout('profile_dashboard');
	$usersModel = TableRegistry::get('Users');
	$session = $this->request->session();
	$userId = $session->read('User.id');

	$userPetsModel = TableRegistry::get('UserPets');
	$petGalleryModel = TableRegistry::get('UserPetGalleries');

     if(isset($this->request->data['UserPets']) && !empty($this->request->data['UserPets'])) 
     {
		            $userPetsModel->deleteAll(['UserPets.user_id'=>$userId]);
					$petGalleryModel->deleteAll(['UserPetGalleries.user_id'=>$userId]);
					
					foreach($this->request->data['UserPets'] as $key=>$single_guest){
						    $guest_age = array($single_guest['guest_years'],$single_guest['guest_months']);
							if(!empty($guest_age)){
							$guest_age = implode(",",$guest_age);
							}else{
								 $guest_age = '';
							}
							$petsData = $userPetsModel->newEntity($single_guest);
							$petsData->user_id = $userId;
							$petsData->guest_age = $guest_age;
							//Save guest data
							$userPetsModel->save($petsData);
										 if(!empty($session->read('UserPets'))){
											 $guest_images['UserPets'] = $session->read('UserPets');
											 if(array_key_exists($key,$guest_images['UserPets'])){
												$flag = 1;
												foreach($guest_images['UserPets'][$key] as $guest_image){
													
												 $petGalleryData = $petGalleryModel->newEntity();
												 $petGalleryData->user_id = $userId;
												 $petGalleryData->user_pet_id = $petsData->id;
												 $petGalleryData->image = $guest_image;
												 $petGalleryModel->save($petGalleryData);
												 if($flag == 3){
													 break;
												 }
												}
											 }
										 }
				}
				if($session->read("profile") == "Guest"){
				     return $this->redirect(['controller'=>'dashboard','action'=>'about-guest']);
			    }else{
				     return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);
				}
		}else{
			         $session->write("UserPets",'');
					 $userPetsData = $usersModel->get($userId,['contain'=>['UserPets'=>['UserPetGalleries']]]);
					 
					 if(isset($userPetsData->user_pets) && !empty($userPetsData->user_pets)){
						 $count_pets = count($userPetsData->user_pets);
							if($count_pets == 1){
							$this->set('guest_data', $userPetsData->user_pets[0]);
							//For guest images
							$html = "no_image";
							if(isset($userPetsData->user_pets[0]->user_pet_galleries) && !empty($userPetsData->user_pets[0]->user_pet_galleries)){
							$images_arr = $userPetsData->user_pets[0]->user_pet_galleries;
							$html = '';
							$guest_images = array();
							foreach($images_arr as $key=>$val){
												 $guest_images[] = $val->image;
									 $html.='<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
													 <img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'" class="img-responsive center-block text-center thumbnail" alt="img">
													</div>';
							}
							$session->write('UserPets.Guest1',$guest_images);
							}
							$this->set('guest_images', $html);
							//End
							}else{
							$this->set('guests_data', $userPetsData->user_pets);
							//For guest images
								 $G = 1;
								foreach($userPetsData->user_pets as $single_data){
													 $single_data = $single_data->toArray();
													 $guest_images = array();
												 if(isset($single_data['user_pet_galleries']) && !empty($single_data['user_pet_galleries'])) {
														
													 foreach($single_data['user_pet_galleries'] as $key=>$val){
															$guest_images[] = $val['image'];
														}
													}
													 $guest_num = 'Guest'.$G;
													 $session->write("UserPets.$guest_num",$guest_images);
													
													 $G++;
				    }
				 //End
				 }
		}else{
								$session->write("UserPets",'');
							 $this->set('guest_images', 'no_image');
							 $this->set('guest1','guest1');
						 }
			$dogBreedsModel = TableRegistry::get('DogBreeds');
			 $dogBreeds = $dogBreedsModel->find("all")->toArray();
			 $allBreeds = array();
			 $i = 0;
			 foreach($dogBreeds as $key=>$val){
				 $allBreeds[$i]['value'] = "$val->id";
				 $allBreeds[$i]['label'] = "$val->breed_name";
				 $i++;
			}
			$this->set('dog_breeds',$allBreeds);
	}
}
   /**
    Function for add pets
*/
function addPets(){
		$petGalleryModel = TableRegistry::get('UserPetGalleries');
		$usersModel = TableRegistry::get('Users');
			$guest_num = 'Guest'.$_REQUEST['guest'];
			$session = $this->request->session();

			$session->write("UserPets.$guest_num",'');


			$userId = $session->read('User.id');
			$images_arr = array();
						 $errors = array();
						 for($i=0;$i<count($_FILES['images']['name']);$i++){
						 $FileArr['name'] = $_FILES['images']['name'][$i];
			$FileArr['type'] = $_FILES['images']['type'][$i];
			$FileArr['tmp_name'] = $_FILES['images']['tmp_name'][$i];
			$FileArr['error'] = $_FILES['images']['error'][$i];
			$FileArr['size'] = $_FILES['images']['size'][$i];

						 //upload and stored images
			$session->write('guest_images','');
			if($_FILES['images']['name'][$i]!=''){
									$Img = $this->admin_upload_file('sitterGallery',$FileArr);
									$Img = explode(':',$Img);
									if($Img[0]=='error'){
										$errors[] = 'File:'.$_FILES['images']['name'][$i].':'.$Img[1];
									}else{
									 
			
			$guest_images[] = $Img[1];
			$session->write('guest_images',$guest_images);

									}                
								}else{
								 unset($_FILES['images']);
								}
					 $FileArr = array();
					 if($i > 2){
						$errors = array();
						$errors[] = "You can select only three images for your pet";
					}
			}


			$query = $usersModel->get($userId,['contain'=>'UserPetGalleries']);

			$guest_images = $session->read('guest_images');
			$html = "";
			if(isset($errors[0]) && ($errors[0] == "You can select only three images for your pet")){
							
						}else{
							if(isset($guest_images) && !empty($guest_images)){
			$j = 1;
				 foreach($guest_images as $guest_image){
								 $new_n[] = $guest_image;
						  $html.='<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				 <img src="'.HTTP_ROOT.'img/uploads/'.$guest_image.'" class="img-responsive center-block text-center thumbnail" alt="img">
				 </div>';
				
				 if($j == 3){
				 break;
				 }
				 $j++;
				 }
				 $session->write("UserPets.$guest_num",$guest_images);
			}
						}

					
			$error ="";
				 if(!empty($errors)){
				 foreach($errors as $key=>$val){
								 $error.= "<em class='signup_error error col-md-8 col-lg-8 col-sm-8'>".$val."</em>";
				 }
				 }
				 echo (json_encode(array($error,$html)));die;
}
    /**
    Function for Delete guest record
	*/
	function deleteGuest($guestId = null){
			$userPetsModel = TableRegistry::get('UserPets');
			$petGalleryModel = TableRegistry::get('UserSitterGalleries');
			
			$guestId = convert_uudecode(base64_decode($guestId));
			$entity = $userPetsModel->get($guestId);
		    $result = $userPetsModel->delete($entity);

		  return $this->redirect(['controller'=>'dashboard','action'=>'about-guest']);
	}
    /**
    Function for Professional Accreditations
    */
    function sitterGallery(){
    	$sitterGallriesModel = TableRegistry::get('UserSitterGalleries');
    	$usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');
              $images_arr = array();
			    $errors = array();
			   for($i=0;$i<count($_FILES['images']['name']);$i++){
			       $FileArr['name'] = $_FILES['images']['name'][$i];
                   $FileArr['type'] = $_FILES['images']['type'][$i];
                   $FileArr['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                   $FileArr['error'] = $_FILES['images']['error'][$i];
                   $FileArr['size'] = $_FILES['images']['size'][$i];
                  
			        //upload and stored images
                  if($_FILES['images']['name'][$i]!=''){
						$Img = $this->admin_upload_file('sitterGallery',$FileArr);
						$Img = explode(':',$Img);
						if($Img[0]=='error'){
							
							$errors[] = 'File:'.$_FILES['images']['name'][$i].':'.$Img[1];
						}else{
						   $sitterGalleryData = $sitterGallriesModel->newEntity();
                           $sitterGalleryData->user_id = $userId;
                           $sitterGalleryData->image = $Img[1];
                           $sitterGallriesModel->save($sitterGalleryData);

						}				
					}else{
					   unset($_FILES['images']);
					}
		                $FileArr = array();      
                   }
         
            $query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
            if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
                   $images_arr = $query->user_sitter_galleries;
                   $sitterImg = array();
                   $html = " ";
                    foreach($images_arr as $key=>$val){
                      $html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
                      $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg zIndex-1" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
                       $html .='</div></div>';
                   	}
                  if($errors != ''){
                   $error ="";
                  	  foreach($errors as $key=>$val){
                  	     $error.= "<em class='signup_error error col-md-8 col-lg-8 col-sm-8'>".$val."</em>";
                      }
                  }
                 echo (json_encode(array($error,$html)));die;
            }
      }
      /**
      Function for remove gallery image
      */
      function removeGalleryImage(){
      	
      	$sitterGallriesModel = TableRegistry::get('UserSitterGalleries');
    	$usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');

            if( $this->request->is('ajax') ) {

			    if(isset($_REQUEST['imageId']) && !empty($_REQUEST['imageId'])){
			    	$record = $sitterGallriesModel->get($_REQUEST['imageId']);
					$deleteResult = $sitterGallriesModel->delete($record);
				}
            }

			$query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
            if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
                  $images_arr = $query->user_sitter_galleries;
                 
                   $html = " ";
                   foreach($images_arr as $key=>$val){
                    $html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
                   	$html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg zIndex-1" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
                   	$html .='</div></div>';
                  }
                  echo $html; die;
            }else{
            	echo $html = ''; die;
            }
      }
      /*End gallery image*/
      /**
         Function for save profile video
      */
     function saveProfileVideo(){
     	$usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');

       if(isset($_FILES['profile_video']) && !empty($_FILES['profile_video'])){
		$userData = $usersModel->newEntity();
     	$userData->id = $userId;
     	  //Upload video
			if($_FILES['profile_video']['name']!=''){
				$profileVideo = $this->admin_upload_file('video',$_FILES['profile_video']);
				$profileVideo = explode(':',$profileVideo);
				if($profileVideo[0]=='error'){
					echo $errors = 'Error::'.$profileVideo[1];die;
				}else{
					$userData->profile_video = $profileVideo[1];
                     if($usersModel->save($userData)){
		                   $userInfo = $usersModel->get($userId);
		                   echo 'Success::'.HTTP_ROOT.'files/video/'.$userInfo->profile_video;die;
			         }
				}				
			}else{
				 unset($_FILES['profile_video']);
			}
			 
		}

     }
      /**
         Function for save profile banner
      */
     function saveProfileBanner(){
     	$usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');

       if(isset($_FILES['profile_banner']) && !empty($_FILES['profile_banner'])){
        $userData = $usersModel->newEntity();
     	$userData->id = $userId;
     	  //Upload video
			if($_FILES['profile_banner']['name']!=''){
				$profileBanner = $this->admin_upload_file('profileBanner',$_FILES['profile_banner']);
				$profileBanner = explode(':',$profileBanner);
				if($profileBanner[0]=='error'){
					echo $errors = 'Error::'.$profileBanner[1];die;
				}else{
					$userData->profile_banner = $profileBanner[1];
                     if($usersModel->save($userData)){
		                   $userInfo = $usersModel->get($userId);
		                   echo 'Success::'.HTTP_ROOT.'img/uploads/'.$userInfo->profile_banner;die;
			         }
				}				
			}else{
				 unset($_FILES['profile_banner']);
			}
			 
		}
     }
      /**
         Function for save profile video image
      */
     function saveProfileVideoImage(){
     	$usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');

       if(isset($_FILES['profile_video_image']) && !empty($_FILES['profile_video_image'])){
        $userData = $usersModel->newEntity();
     	$userData->id = $userId;
     	//Upload video
			if($_FILES['profile_video_image']['name']!=''){
				$profileVideoImg = $this->admin_upload_file('profileVideoImg',$_FILES['profile_video_image']);
				$profileVideoImg = explode(':',$profileVideoImg);
				if($profileVideoImg[0]=='error'){
					echo $errors = 'Error::'.$profileVideoImg[1];die;
				}else{
					$userData->profile_video_image = $profileVideoImg[1];
                     if($usersModel->save($userData)){
		                   $userInfo = $usersModel->get($userId);
		                   echo 'Success::'.HTTP_ROOT.'img/uploads/'.$userInfo->profile_video_image;die;
			         }
				}				
			}else{
				 unset($_FILES['profile_video_image']);
			}
			 
		}
     }
    /**
    Function for Professional Accreditations
    */
    function professionalAccreditations(){
    	
    	$this->viewBuilder()->layout('profile_dashboard');

        $usersModel = TableRegistry::get('Users');

        $session = $this->request->session();
        $userId = $session->read('User.id');
   
        $this->request->data = @$_REQUEST;
		
		if(isset($this->request->data['UserProfessionals']) && !empty($this->request->data['UserProfessionals']))
		{
			
			$UserProfessionalModel = TableRegistry::get('UserProfessionalAccreditations');
			$UserProfessionalDetailsModel = TableRegistry::get('UserProfessionalAccreditationsDetails'); 

			$UserProfessionalModel->deleteAll(['user_id' => $userId]);
			$UserProfessionalDetailsModel->deleteAll(['user_id' => $userId]);
			
			//ADD FIRST FIELD START
			if(isset($this->request->data['UserProfessionals']['check']['govt']) && !empty($this->request->data['UserProfessionals']['check']['govt'])){
				$userProfessionalData = $UserProfessionalModel->newEntity();
				$userProfessionalData->user_id = $userId;
				$userProfessionalData->type_professional = 'check';
				$userProfessionalData->sector_type = "govt";
				$userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['check']['govt']);
				$UserProfessionalModel->save($userProfessionalData);
			}
			
			//ADD SECOND FIELD START
			if(isset($this->request->data['UserProfessionals']['pets']['private']) && !empty($this->request->data['UserProfessionals']['pets']['private'])){
				$userProfessionalData = $UserProfessionalModel->newEntity();
				$userProfessionalData->user_id = $userId;
				$userProfessionalData->type_professional = 'pets';
				$userProfessionalData->sector_type = "private";
				$userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['pets']['private']);
				if(isset( $this->request->data['UserProfessionals']['pets']['private']['qualification_date']) &&  $this->request->data['UserProfessionals']['pets']['private']['qualification_date'] !=''){
					$userProfessionalData->qualification_date = Time::createFromFormat('Y-m-d', $this->request->data['UserProfessionals']['pets']['private']['qualification_date'], 'UTC');
				}
				
				if(isset( $this->request->data['UserProfessionals']['pets']['private']['expiry_date']) &&  $this->request->data['UserProfessionals']['pets']['private']['expiry_date'] !=''){
					$userProfessionalData->expiry_date = Time::createFromFormat('Y-m-d', $this->request->data['UserProfessionals']['pets']['private']['expiry_date'], 'UTC');
				}
				
				
				$UserProfessionalModel->save($userProfessionalData);
			}
			//ADD THIRD FIELD START
			if(isset($this->request->data['UserProfessionals']['people']['private']) && !empty($this->request->data['UserProfessionals']['people']['private'])){
				$userProfessionalData = $UserProfessionalModel->newEntity();
				$userProfessionalData->user_id = $userId;
				$userProfessionalData->type_professional = 'people';
				$userProfessionalData->sector_type = "private";

				$userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['people']['private']);
				
				if(isset($this->request->data['UserProfessionals']['people']['private']['qualification_date']) &&  $this->request->data['UserProfessionals']['people']['private']['qualification_date'] !=''){
					$userProfessionalData->qualification_date = Time::createFromFormat('Y-m-d',$this->request->data['UserProfessionals']['people']['private']['qualification_date'], 'UTC');
				}
				
				if(isset($this->request->data['UserProfessionals']['people']['private']['expiry_date']) &&  $this->request->data['UserProfessionals']['people']['private']['expiry_date'] !=''){
					$userProfessionalData->qualification_date = Time::createFromFormat('Y-m-d',$this->request->data['UserProfessionals']['people']['private']['qualification_date'], 'UTC');
				}

				$UserProfessionalModel->save($userProfessionalData);
			}
			//ADD FOURTH FIELD START
			if(isset($this->request->data['UserProfessionals']['govt']['licence']) && !empty($this->request->data['UserProfessionals']['govt']['licence'])){
				$userProfessionalData = $UserProfessionalModel->newEntity();
				$userProfessionalData->user_id = $userId;
				$userProfessionalData->type_professional = 'govt';
				$userProfessionalData->sector_type = "licence";

				$userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['govt']['licence']);
				$UserProfessionalModel->save($userProfessionalData);
			}
			
			if(isset($this->request->data['qualification_title']) && !empty($this->request->data['qualification_title'])){
				for($i=0;$i<count($this->request->data['qualification_title']);$i++){

					 $userProfessionalData = $UserProfessionalModel->newEntity();

					 $userProfessionalData->user_id = $userId; 
					 $userProfessionalData->type_professional = 'other';
					 $userProfessionalData->sector_type = "other";

					 $userProfessional['qualification_title'] = $this->request->data['qualification_title'][$i];
					 
					 if(isset($this->request->data['qualification_date'][$i]) &&  $this->request->data['qualification_date'][$i] !=''){
						$userProfessional['qualification_date'] = $this->request->data['qualification_date'][$i];
					 }
					 
					 if(isset($this->request->data['qualification_date'][$i]) &&  $this->request->data['qualification_date'][$i] !=''){
						$userProfessional['expiry_date'] = $this->request->data['expiry_date'][$i];
					 }
					 					  
					 $userProfessional['scanned_certification'] = $this->request->data['scanned_certification'][$i];

					 $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$userProfessional);
					 $userProfessionalData->qualification_date = $this->request->data['qualification_date'][$i];
					 $userProfessionalData->expiry_date = $this->request->data['expiry_date'][$i];
				
					 $UserProfessionalModel->save($userProfessionalData);
				}
			}
			
			if(isset($this->request->data['UserProfessionalsDetails']) && !empty($this->request->data['UserProfessionalsDetails'])){
				$userProfessionalDetailData = $UserProfessionalDetailsModel->newEntity();
				$userProfessionalDetailData->user_id = $userId;
				$userProfessionalDetailData->user_professional_accreditation_id = $userProfessionalData->id;
				
				$userProfessionalDetailData = $UserProfessionalDetailsModel->patchEntity($userProfessionalDetailData, $this->request->data['UserProfessionalsDetails']);

				$userProfessionalDetailData->languages = str_replace(' ','',$this->request->data['UserProfessionalsDetails']['languages']);

				if ($UserProfessionalDetailsModel->save($userProfessionalDetailData)){
					      //For Update profile status
					   $userData = $usersModel->find('all',['contain'=>[
															'UserSitterServices', 
															'UserProfessionalAccreditations',
															]
														]
												)
								   ->where(['Users.id' => $userId], ['Users.id' => 'integer[]'])
								   ->toArray();
						if((isset($userData[0]->user_professional_accreditations) && !empty($userData[0]->user_professional_accreditations)) || (isset($userData[0]->user_sitter_services) && !empty($userData[0]->user_sitter_services))){
						   $UserData = $usersModel->newEntity();
						   $UserData->id =  $userId;
						   $UserData->user_type = 'Sitter';
						   
						   $usersModel->save($UserData);
						   $session->write('User.user_type','Sitter');
							
							
							$UserSitterAvailabilityDayModel = TableRegistry::get('user_sitter_availability_days');
							$userAvailablityCount = $UserSitterAvailabilityDayModel->find('all')
																	   ->where(['user_sitter_availability_days.user_id' => $userId])
																	    ->count();
														   
							if($userAvailablityCount < 1){
								
								$UserSitterAvailabilityDayModelData = $UserSitterAvailabilityDayModel->newEntity();
								
								$UserSitterAvailabilityDayModelData->available_days = 'sunday,monday,tuesday,wednesday,thursday,friday,saturday';
								$UserSitterAvailabilityDayModelData->user_id =  $userId;
								
								$UserSitterAvailabilityDayModel->save($UserSitterAvailabilityDayModelData);
							}   
							
						
						}else{
						   $UserData = $usersModel->newEntity();
						   $UserData->id =  $userId;
						   $UserData->user_type = 'Basic';
						   
						   $usersModel->save($UserData);
						   $session->write('User.user_type','Basic');
						}
					 //End
					 return $this->redirect(['controller'=>'dashboard','action'=>'services-and-rates']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			}
               
		}else{
			
            $query = $usersModel->get($userId,['contain'=>['UserProfessionalAccreditations','UserProfessionalAccreditationsDetails']]);
         
		     if(isset($query->user_professional_accreditations) && !empty($query->user_professional_accreditations)){
				 
				 if(!empty($query->user_professional_accreditations)){
						$customArrForDisplayRec = array();
						$i=1;
						foreach($query->user_professional_accreditations as $k=>$user_professional_accreditations){
							if($user_professional_accreditations->type_professional !='other'){
								$customArrForDisplayRec['UserProfessionals'][$user_professional_accreditations->type_professional][$user_professional_accreditations->sector_type]['qualification_title'] = $user_professional_accreditations->qualification_title;
								
								$customArrForDisplayRec['UserProfessionals'][$user_professional_accreditations->type_professional][$user_professional_accreditations->sector_type]['qualification_date'] = $user_professional_accreditations->qualification_date;
								
								$customArrForDisplayRec['UserProfessionals'][$user_professional_accreditations->type_professional][$user_professional_accreditations->sector_type]['expiry_date'] = $user_professional_accreditations->expiry_date;
								
								$customArrForDisplayRec['UserProfessionals'][$user_professional_accreditations->type_professional][$user_professional_accreditations->sector_type]['scanned_certification'] = $user_professional_accreditations->scanned_certification;
								
							}else{
								$customArrForDisplayRec['UserProfessionals'][$user_professional_accreditations->type_professional][$i][$user_professional_accreditations->sector_type]['qualification_title'] = $user_professional_accreditations->qualification_title;	
								
								$customArrForDisplayRec['UserProfessionals'][$user_professional_accreditations->type_professional][$i][$user_professional_accreditations->sector_type]['qualification_date'] = $user_professional_accreditations->qualification_date;	
								
								$customArrForDisplayRec['UserProfessionals'][$user_professional_accreditations->type_professional][$i][$user_professional_accreditations->sector_type]['expiry_date'] = $user_professional_accreditations->expiry_date;	
								
								$customArrForDisplayRec['UserProfessionals'][$user_professional_accreditations->type_professional][$i][$user_professional_accreditations->sector_type]['scanned_certification'] = $user_professional_accreditations->scanned_certification;	
								
								$i++;
							}
						
						}
				  }
				   if(!empty($query['user_professional_accreditations_details'])){
						$customArrForDisplayRec['user_professional_accreditations_details'] = $query['user_professional_accreditations_details'][0];
				   }
					$this->set('professional', $customArrForDisplayRec);
			 }
            $all_languages = [['value'=>'en','label'=>'English'],['value'=>'fr','label'=>'French'],['value'=>'de','label'=>'German'],['value'=>'hu','label'=>'Hungarian'],['value'=>'it','label'=>'Italian'],['value'=>'ro','label'=>'Romanian'],['value'=>'es','label'=>'spanish']];
          
            $this->set('all_languages',$all_languages);
        }
    }
     /**
    Function for Services & Rates
    */
    function servicesAndRates(){
    	 
		$this->viewBuilder()->layout('profile_dashboard');

    	$usersModel = TableRegistry::get('Users');

        $session = $this->request->session();
        $userId = $session->read('User.id');
        $this->request->data = @$_REQUEST;

		$sitterServicesModel = TableRegistry::get('UserSitterServices');
        if(isset($this->request->data['UserSitterServices']) && !empty($this->request->data['UserSitterServices']))
		{
			//pr($this->request->data['UserSitterServices']);die;
			    $accept = array("cancellation_policy_status","booking_status","sitter_house_status","sh_day_care_status","sh_dc_extended_stay_rate_status","sh_dc_additional_guest_rate_status","sh_dc_repeat_client_only_status","sh_night_care_status","sh_nc_extended_stay_rate_status","sh_nc_additional_guest_rate_status","sh_nc_repeat_client_only_status","sh_holiday_rate_status","sh_small_guest_rate_status","sh_large_guest_rate_status","sh_cat_rate_status","sh_puppy_rate_status","guest_house_status","gh_day_care_status","gh_dc_extended_stay_rate_status","gh_dc_additional_guest_rate_status","gh_dc_repeat_client_only_status","gh_drop_in_visit_status","gh_dv_extended_stay_rate_status","gh_dv_additional_guest_rate_status","gh_dv_repeat_client_only_status","gh_night_care_status","gh_nc_extended_stay_rate_status","gh_nc_additional_guest_rate_status","gh_nc_repeat_client_only_status","gh_small_guest_rate_status","gh_large_guest_rate_status","gh_cat_rate_status","gh_puppy_rate_status","market_place_status","mp_grooming_status","mp_gr_premium_grooming_rate_status","mp_gr_additional_guest_rate_status","mp_gr_repeat_client_only_status","mp_recreation_status","mp_rc_premium_recreation_rate_status","mp_rc_additional_guest_rate_status","mp_rc_repeat_client_only_status","mp_training_status","mp_tr_premium_training_rate_status","mp_tr_additional_guest_rate_status","mp_tr_repeat_client_only_status","mp_driver_service_status","mp_ds_return_trip_status","mp_ds_additional_guest_rate_status","mp_ds_repeat_client_only_status","mp_holiday_rate_status","mp_small_guest_rate_status","mp_large_guest_rate_status","mp_cat_rate_status","mp_puppy_rate_status","gh_holiday_rate_status"); 
	            foreach($accept as $val){ 
					if (!array_key_exists($val,$this->request->data['UserSitterServices'])){
						$this->request->data['UserSitterServices'][$val] = 0;
	               	}
				}
		        $serviceData = $sitterServicesModel->newEntity($this->request->data['UserSitterServices']);
				$serviceData->user_id = $userId;
				$sitterServicesModel->save($serviceData);

					  //For Update profile status
					  $userData = $usersModel->find('all',['contain'=>[
															'UserSitterServices', 
															'UserProfessionalAccreditations',
															]
														]
												)
								   ->where(['Users.id' => $userId], ['Users.id' => 'integer[]'])
								   ->toArray();
						if((isset($userData[0]->user_professional_accreditations) && !empty($userData[0]->user_professional_accreditations)) || (isset($userData[0]->user_sitter_services) && !empty($userData[0]->user_sitter_services))){
						   $UserData = $usersModel->newEntity();
						   $UserData->id =  $userId;
						   $UserData->user_type = 'Sitter';
						   
						   $usersModel->save($UserData);
						    $session->write('User.user_type','Sitter');
						}else{
						   $UserData = $usersModel->newEntity();
						   $UserData->id =  $userId;
						   $UserData->user_type = 'Basic';
						   
						   $usersModel->save($UserData);	
						    $session->write('User.user_type','Basic');
						}
					   //End
                    //Set session for calendar limits
                    if(isset($userData[0]->user_sitter_services) && !empty($userData[0]->user_sitter_services)){
			           $servicesInfo = $userData[0]->user_sitter_services[0]->toArray();
                    
                       $calender_fields = array("sh_dc_additional_guest_limit","sh_nc_additional_guest_limit","	gh_dc_additional_guest_limit","gh_nc_additional_guest_limit");
			            $check_status = $this->check_fields_status($calender_fields,$servicesInfo);
						  if($check_status){
							 $session->write('calendar_limits','yes');
						  }else{
							$session->write('calendar_limits','no');
						  }
				   }
				
            return $this->redirect(['controller'=>'dashboard','action'=>'services-and-rates']);
          }else{
          	$query = $usersModel->get($userId,['contain'=>'UserSitterServices']);
          	if(isset($query->user_sitter_services) && !empty($query->user_sitter_services)){
                   $sittersServiceData = $query->user_sitter_services[0];
                   $this->set('sitterServiceId', $sittersServiceData->id);
                   unset($sittersServiceData->id);
                   $this->set('sitter_service_info', $sittersServiceData);
		    }
			  //For Update profile status
			  $userData = $usersModel->find('all',['contain'=>[
													'UserSitterServices', 
													'UserProfessionalAccreditations',
													]
												]
										)
						   ->where(['Users.id' => $userId], ['Users.id' => 'integer[]'])
						   ->toArray();
				if((isset($userData[0]->user_professional_accreditations) && !empty($userData[0]->user_professional_accreditations)) || (isset($userData[0]->user_sitter_services) && !empty($userData[0]->user_sitter_services))){
				   $UserData = $usersModel->newEntity();
				   $UserData->id =  $userId;
				   $UserData->user_type = 'Sitter';
				   
				   $usersModel->save($UserData);
				   $session->write('User.user_type','Sitter');
				   
				   
					$UserSitterAvailabilityDayModel = TableRegistry::get('user_sitter_availability_days');
					$userAvailablityCount = $UserSitterAvailabilityDayModel->find('all')
															   ->where(['user_sitter_availability_days.user_id' => $userId])
																->count();
												   
					if($userAvailablityCount < 1){
						
						$UserSitterAvailabilityDayModelData = $UserSitterAvailabilityDayModel->newEntity();
						
						$UserSitterAvailabilityDayModelData->available_days = 'sunday,monday,tuesday,wednesday,thursday,friday,saturday';
						$UserSitterAvailabilityDayModelData->user_id =  $userId;
						
						$UserSitterAvailabilityDayModel->save($UserSitterAvailabilityDayModelData);
					}  
					
				}else{
				   $UserData = $usersModel->newEntity();
				   $UserData->id =  $userId;
				   $UserData->user_type = 'Basic';
				   
				   $usersModel->save($UserData);	
				   $session->write('User.user_type','Basic');
				}
			   //End
          }
	
    }
    function sitterProfile(){
         $this->viewBuilder()->layout('profile_dashboard');
         	$session = $this->request->session();
    }
    /**
	Function for profile report
	*/
	function profileReport(){
		 $fakeProfileReportModel = TableRegistry::get('UserFakeReports');
		 $usersModel = TableRegistry::get('Users');
		 $adminsModel = TableRegistry::get('Admins');
		 
		 $session = $this->request->session();
		 $userId = $session->read('User.id');
				 
		 if(isset($this->request->data['ProfileReport']) && !empty($this->request->data['ProfileReport'])){
			     $sitterId = convert_uudecode(base64_decode($_REQUEST['ProfileReport']['sitter_id']));
 			     $profileReportData = $fakeProfileReportModel->newEntity();
 			     $profileReportData->user_id = $userId;
 			     $profileReportData->sitter_id = $sitterId;
 			     $profileReportData->report_reason = $_REQUEST['ProfileReport']['report_reason'];
 			     if($fakeProfileReportModel->save($profileReportData)){
			
			$user_data = $usersModel->find('all')->select(['id','first_name','last_name','email'])->where(['id'=>$profileReportData->user_id])->toArray();
			
			$sitter_data = $usersModel->find('all')->select(['id','first_name','last_name','email'])->where(['id'=>$profileReportData->sitter_id])->toArray();
			
			$adminData = $adminsModel->find('all')->select(['id','email'])->first()->toArray();
			         $this->setSuccessMessage($this->stringTranslate(base64_encode('Your request has been sent to the admin.')));
					 $link = HTTP_ROOT.'view-profile/'.$_REQUEST['ProfileReport']['sitter_id'];
						$linkOnMail = '<a href="'.$link.'" target="_blank">Click Here to view sitter profile </a>';
						
						$replace = array('{user_name}','{user_email}','{sitter_name}','{sitter_email}','{profile_link}','{reason_report}');
						
                        $with = array($user_data[0]->first_name,$user_data[0]->email,$sitter_data[0]->first_name,$sitter_data[0]->email,$linkOnMail,$profileReportData->report_reason);
						
					$this->send_email('',$replace,$with,'fake_profile_report',$adminData['email']);
				}
				$this->redirect("/search/sitter-details/".$_REQUEST['ProfileReport']['sitter_id']);
		}
		 
	}
	/*********************************************************************
     Purpose            : update image.
     Parameters         : null
     Returns            : integer
     ***********************************************************************/
    public function changeAvatar() {
    	
    	$session = $this->request->session();
    	$userId = $session->read('User.id');
          if($_FILES['image']['name']!=''){
                    ob_start();
					$profilePic = $this->admin_upload_file('profilePic',$_FILES['image']);
					$profilePic = explode(':',$profilePic);
					if($profilePic[0]=='error'){
						echo "<em class='signup_error error clr'>".$profilePic[1]."</em>";die;
					}else{
					  ob_end_clean();
				    $res = $this->saveAvatar(array(
				                        'userId' => isset($userId) ? intval($userId) : 0,
				                                                'USERIMG' => isset($profilePic[1]) ? $profilePic[1] : '',
				                        ));

			          $src = HTTP_ROOT.'webroot/img/uploads/'.$profilePic[1];
				        echo "<img  id='photo' class='' src='".$src."' class='preview'/>";
				}				
			
	    }else
			 echo "<em class='signup_error error clr'>Please select image..!</em>"; die;
			
    }
	/*********************************************************************
	 Purpose            : update image.
	 Parameters         : null
	 Returns            : integer
	 ***********************************************************************/
	public function saveAvatarTmp() {
		$this->viewBuilder()->layout();
		 $UsersModel = TableRegistry::get('Users');
	    	$session = $this->request->session();
    	 $loggedInId = $session->read('User.id');
	    $post = isset($_POST) ? $_POST: array();

	    $session = $this->request->session();
    	
        $userId = $session->read('User.id');
	     $uploadFolder = 'uploads';
	     $path = realpath('../webroot/img/'.$uploadFolder);
	    
        $t_width = 328; // Maximum thumbnail width
	    $t_height = 184;    // Maximum thumbnail height

	if(isset($_POST['t']) and $_POST['t'] == "ajax")
	{
	    extract($_POST);
	   $user = $UsersModel->get($userId);
      
      
	    $img = $user->image; //'avatar_1.jpeg'; //get_user_meta($userId, 'user_avatar', true);
        list($txt, $ext) = explode(".", $img);
        $imagePath = $path.'/'.$img;
	    $ratio = ($t_width/$w1); 
	    $ratio1 = ($t_height/$h1); 
	    $nw = ceil($w1 * $ratio);
	    $nh = ceil($h1 * $ratio1);
	    $nimg = imagecreatetruecolor($nw,$nh);
	    if($ext=='png'){
	    	$im_src = imagecreatefrompng($imagePath);
		    imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
	    	$q=9/100;
			$quality=$q;
			imagepng($nimg,$imagePath,$quality);      
		}else if($ext == 'jpeg' || $ext == 'jpg'){
        	$im_src = imagecreatefromjpeg($imagePath);
		    imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
		    imagejpeg($nimg,$imagePath,90);
        }else if($ext == 'gif'){
        	$im_src = imagecreatefromgif($imagePath);
		    imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
		    imagegif($nimg,$imagePath,90);
        }else{
        	$im_src = imagecreatefromjpeg($imagePath);
		    imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
		    imagejpeg($nimg,$imagePath,90);
        }

	}
		exit(0);    
		die;
	}
			    
	/*********************************************************************
	 Purpose            : resize image.
	 Parameters         : null
	 Returns            : image
	 ***********************************************************************/
	function resizeImage($image,$width,$height,$scale) {
		    $newImageWidth = ceil($width * $scale);
		    $newImageHeight = ceil($height * $scale);
		    $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);

		if($ext=='png'){
			$source = imagecreatefrompng($image);
		    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
            $q=9/100;
			$quality=$q;
		    imagepng($newImage,$image,$quality);
        }else if($ext == 'jpeg' || $ext == 'jpg'){
        	 $source = imagecreatefromjpeg($image);
		    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		    imagejpeg($newImage,$image,90);
        
        }else if($ext == 'gif'){
        	 $source = imagecreatefromgif($image);
		    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		    imagegif($newImage,$image,90);
        }else{
        	 $source = imagecreatefromjpeg($image);
		    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		    imagejpeg($newImage,$image,90);
        }
		 
		    chmod($image, 0777);
		    return $image;
	}
	/*********************************************************************
	     Purpose            : get image height.
	     Parameters         : null
	     Returns            : height
	     ***********************************************************************/
	function getHeight($image) {
	    $sizes = getimagesize($image);
	    $height = $sizes[1];
	    return $height;
	}
	/*********************************************************************
	     Purpose            : get image width.
	     Parameters         : null
	     Returns            : width
	     ***********************************************************************/
	function getWidth($image) {
	    $sizes = getimagesize($image);
	    $width = $sizes[0];
	    return $width;
	}
	/*********************************************************************
     Purpose            : save avatar.
     Parameters         : $options 
     Returns            : true/false
     ***********************************************************************/
    function saveAvatar($options){
 
        if (isset($options) && !empty($options)){
                    $session = $this->request->session(); 
                	$UsersModel = TableRegistry::get('Users');
                       $userData = $UsersModel->newEntity();
                       $userData->id = $options['userId'];
                       $userData->image = $options['USERIMG'];
                       $userData->is_image_uploaded = 1;
                       $session = $this->request->session();
                       $session->write('User.is_image_uploaded', 1);
                       if($UsersModel->save($userData)){
                       	  $user = $session->write('User.image',$options['USERIMG']);
                       }

        }
             
    }
    /**
    Function for Professional Accreditations
    */
    function uploadDocuments(){
        $images_arr = array();
		$_FILES['document']['custom_name'] = $_REQUEST['valuefor'];
		//Upload Document
		if($_FILES['document']['name'] !=''){
			$Img = $this->admin_upload_document('document',$_FILES['document']);
			
			$Img = explode(':',$Img);
			
			if($Img[0]=='error'){
				echo $errors = 'Error:'.$_REQUEST['valuefor'].":".$Img[1];
			}else{
			   
			   echo $imageName = 'Success:'.$_REQUEST['valuefor'].":".$Img[1];
			}				
		}else{
		   unset($_FILES['document']);
		}
	}
	//Function for user rating
	public function review($bookingId=null,$user=null)
    {
		$session = $this->request->session();
		$UserModel=TableRegistry::get('Users');
		$UserData = $UserModel->find('all')->toArray();
		$userId = $session->read('User.id');
		//$userType = $session->read('User.user_type');
	    $userToId = convert_uudecode(base64_decode($user));
	    $bookingId = convert_uudecode(base64_decode($bookingId));
	    
	    //echo $bookingId."toId".$userToId;die;
	    
	    $this->set('user_to_id',$userToId);
	    $this->set('booking_id',$bookingId);
	    
		$this->set('UserData',$UserData);
		$this->viewBuilder()->layout('profile_dashboard');
		$reviewModel=TableRegistry::get('UserRatings');
		$bookingRequestModel = TableRegistry :: get("BookingRequests");
		
        $reviewData= $reviewModel->newEntity();
		
		if($this->request->is('POST')){
			$bookingId = $this->request->data["booking_id"];
            
            $accept = array("accuracy_rating","communication_rating","cleanliness_rating","location_rating","check_in_rating"); 
			foreach($accept as $val){ 
				if (!array_key_exists($val,$this->request->data['UserRatings'])){
					$this->request->data['UserRatings'][$val] = 1;
				}
			}
			$reviewData=$reviewModel->patchEntity($reviewData,$this->request->data["UserRatings"],['validate'=>"update"]);
			
	        $rating_data = $reviewModel->find('all')
			->where(["UserRatings.user_from = $userId","UserRatings.user_to = $userToId","UserRatings.booking_id = $bookingId"])
			->select(['id'])->toArray();
			    
			if(!empty($rating_data)){
				 $reviewData->id = $rating_data[0]->id;
			}	
			
			$accuracy = $this->request->data['UserRatings']['accuracy_rating'];
			$communication = $this->request->data['UserRatings']['communication_rating'];
			$cleanliness = $this->request->data['UserRatings']['cleanliness_rating'];
			$location = $this->request->data['UserRatings']['location_rating'];
			$checkin = $this->request->data['UserRatings']['check_in_rating'];
			
			$rating = ($accuracy + $communication + $cleanliness + $location + $checkin)/5;
	        
	        $reviewData->user_from = $userId;
			$reviewData->status = 0;
			$reviewData->rating = $rating;
			$reviewData->booking_id = $bookingId;
	      
	      if($reviewModel->save($reviewData)){
				
				$get_requests = $bookingRequestModel->find('all')
				->where(["BookingRequests.id = $bookingId"])
			    ->select(['message','read_status','read_status_posted_by','folder_status_sitter','folder_status_guest','created_date','id','user_id','sitter_id','request_by_sitter_id'])
				->hydrate(false)->toArray();
				
				if(!empty($get_requests)){
					  //SET WHICH IS ACT AS A SITTER AND WHICH IS ACT AS A GUEST IN THIS REQUEST
						if($userId==$get_requests[0]['request_by_sitter_id'] && $userId==$get_requests[0]['user_id']){
							
							$user_message_display_field = 'sitter_id'; // Set id for display user messages on each other threads
							$fieldname = 'sitter';
							$userType = 'Sitter';
							$userActas = 'Guest';
							
						}else if($userId != $get_requests[0]['request_by_sitter_id'] && $userId !=$get_requests[0]['user_id']){
							
							$user_message_display_field = 'user_id'; // Set id for display user messages on each other threads
							$fieldname = 'sitter';
							$userType = 'Sitter';
							$userActas = 'Sitter';
							
						}else if($userId != $get_requests[0]['request_by_sitter_id'] && $userId ==$get_requests[0]['user_id']){
							
							$user_message_display_field = 'sitter_id'; // Set id for display user messages on each other threads
							$fieldname = 'guest';
							$userType = 'Basic';
							$userActas = 'Guest';
						}	
					                $userActas = strtolower($userActas);
					              
									$bookingRequestData = $bookingRequestModel->newEntity();
									$bookingRequestData->id = $bookingId;
									$bookingRequestData['rating_given_by_'."$userActas"] = "done";
									$bookingRequestData['folder_status_'."$userActas"] = "past";
									
									$bookingRequestModel->save($bookingRequestData);
				}
				return $this->redirect(['controller' => 'rating', 'action' => 'shared-rating']);
				
				$this->Flash->success(__('Record has been added Successfully'));
	        }else{
				
				$to_user_info = $UserModel->find('all')
				   ->where(['Users.id'=>$userToId])->hydrate(false)->select(['id','image','first_name','last_name','city','is_image_uploaded','facebook_id'])->first();
				   
			 	
			  $this->set("to_user_info",$to_user_info);
			  $this->set("reviewData",$reviewData);
			}	
		}else{
			$to_user_info = $UserModel->find('all')
				   ->where(['Users.id'=>$userToId])->hydrate(false)->select(['id','image','first_name','last_name','city','is_image_uploaded','facebook_id'])->first();
				   
			 	
			  $this->set("to_user_info",$to_user_info);
		}	
		if( $this->request->is('ajax') ) {
            $userid=@$_REQUEST['user'];
			$reviewdata=$reviewModel->find('all')->where(['user_to'=>$userid])->toArray();

			$book_id=array();
			foreach($reviewdata as $review){
				$book_id[]=$review->booking_id;
			}?>
				<option value="">-- Select Booking --</option>
				<option value="1" <?php if(in_array(1,$book_id)){?> class="bk" <?php }?> > First Time </option>
				<option value="2"  <?php if(in_array(2,$book_id)){?> class="bk" <?php }?>> Second Time </option>
				<option value="3"  <?php if(in_array(3,$book_id)){?> class="bk" <?php }?>> Third Time </option>
				<option value="4"  <?php if(in_array(4,$book_id)){?> class="bk" <?php }?>> Forth Time </option>
				<option value="5"  <?php if(in_array(5,$book_id)){?> class="bk" <?php }?>> Fifth Time </option> 
				<?php
					die;
		}
		
		
		
    }
    
	public function editReview(){
		
		$this->viewBuilder()->layout('profile_dashboard');
		$session=$this->request->session();
		$user_id=$session->read('User.id');
		$reviewModel=TableRegistry::get('UserRatings');
		$reviewData= $reviewModel->find('all')->where(['user_from'=>$user_id])->where(['user_to'=>37])->toArray();
	
		$this->set('reviewData',$reviewData);
	
	}
	
	public function calendar()
    {
		
		$Session=$this->request->session();
		$user_id=$Session->read('User.id');
		$this->viewBuilder()->layout('profile_dashboard');
		$calendarModel=TableRegistry :: get("user_sitter_availability");
		
		$calenderData=$calendarModel->find('all')->where(['user_id'=>$user_id])->toArray();
		
		/*GET AVAILABLITY DAYS LIK SUNDAY, MONDAY ETC START*/
		
		$availDaysModel=TableRegistry :: get("user_sitter_availability_days");
		$calenderAvailValData=$availDaysModel->find('all')->select('available_days')->where(['user_id'=>$user_id])->hydrate(false)->first();
		if(!empty($calenderAvailValData)){
			$availblityDaysOfSitter = explode(",",$calenderAvailValData['available_days']);
			$this->set('avail_days',$availblityDaysOfSitter);
		}else{
			$availblityDaysOfSitter = array();
			$this->set('avail_days',$availblityDaysOfSitter);
		}
		
		/*GET AVAILABLITY DAYS LIK SUNDAY, MONDAY ETC END*/
		
		$calenderLastModifiedData=$calendarModel->find('all',['order' => ['id' => 'DESC']])->where(['user_id'=>$user_id])->limit(1)->toArray();
		$lastmodifieddate=array();
		foreach($calenderLastModifiedData as $calenderLastModified){
			$lastmodifieddate['day_care']=$calenderLastModified->day_care;
			$lastmodifieddate['night_care']=$calenderLastModified->night_care;
			$lastmodifieddate['visit']=$calenderLastModified->visit;
			$lastmodifieddate['market_place']=$calenderLastModified->market_place;
		}
		$this->set('lastmodifieddate',$lastmodifieddate);
		//pr($lastmodifieddate);die;	
		//pr($calenderLastModifiedData);die;	
		$unavailbe_array=array();
		foreach($calenderData as $k=>$UserServices){
			
			$unavailbe_array[$k]["start_date"]= $UserServices->start_date;
			$unavailbe_array[$k]["end_date"]= $UserServices->end_date;
			$unavailbe_array[$k]["day_care_limit"]= $UserServices->day_care;
			$unavailbe_array[$k]["night_care_limit"]= $UserServices->night_care;
			$unavailbe_array[$k]["visits_limit"]= $UserServices->visit;
			$unavailbe_array[$k]["marketplace_limit"]= $UserServices->market_place;
			$unavailbe_array[$k]["avail_status"]= $UserServices->avail_status;
		}

		$UserSitterServiceModel=TableRegistry::get("UserSitterServices");
		$UserServicesData=$UserSitterServiceModel->find('all')->where(['user_id'=>$user_id])->toArray();

		$services_array=array();
	
		foreach($UserServicesData as $UserServices){
			$services_array["day_care_limit"]= $UserServices->day_care_limit;
			$services_array["night_care_limit"]= $UserServices->night_care_limit;
			$services_array["visits_limit"]= $UserServices->visits_limit;
			$services_array["markeplace_limit"]= $UserServices->hourly_services_limit;
		}
		
		$calendar = new  \Calendar();

		$this->set('calender',$calendar->show($services_array,$unavailbe_array,$availblityDaysOfSitter));
		$this->set('services_array',$services_array);
		
    }
	
	public function setLimit(){
		
		$Session=$this->request->session();
		$user_id=$Session->read('User.id');
		$this->viewBuilder()->layout('profile_dashboard');
		$calendarModel=TableRegistry :: get("user_sitter_availability");
		$calenderData=$calendarModel->newEntity();
			
		if ($this->request->is(POST)) {
			
			$calenderData=$calendarModel->patchEntity($calenderData,$this->request->data);
			$calenderData->user_id=$user_id;
			
			$calenderData->avail_status=0;
			if($calendarModel->save($calenderData)){
			
				$this->Flash->success(__('Changes has been done.'));
				return $this->redirect(['controller' => 'dashboard', 'action' => 'calendar']);
			
			}else{
	
				$this->Flash->error(__('Changes has been done.'));
			
			}	
		}
		
	}
	
	public function ajaxSetLimit(){
		
		$this->request->data = $_REQUEST;
		$Session=$this->request->session();
		$user_id=$Session->read('User.id');
		
		$calendarModel=TableRegistry :: get("user_sitter_availability");
		$calenderData=$calendarModel->newEntity();
		
		$calenderData=$calendarModel->patchEntity($calenderData,$this->request->data);
		$calenderData->user_id=$user_id;
		
		$calenderData->avail_status=1;
		if($calendarModel->save($calenderData)){
		
			$this->Flash->success(__('Changes has been done'));
			die;
		}
		else{
			$this->Flash->error(__('Something went wrong'));
		
		}	
		die;
	}

	public function ajaxCalendar()
    {
            $Session=$this->request->session();
			$user_id=$Session->read('User.id');
			$calendarModel=TableRegistry :: get("user_sitter_availability");
			$calenderData=$calendarModel->find('all')->where(['user_id'=>$user_id])->toArray();
			
			
			$unavailbe_array=array();
			foreach($calenderData as $k=>$UserServices){
				
				$unavailbe_array[$k]["start_date"]= $UserServices->start_date;
				$unavailbe_array[$k]["end_date"]= $UserServices->end_date;
				$unavailbe_array[$k]["day_care_limit"]= $UserServices->day_care;
				$unavailbe_array[$k]["night_care_limit"]= $UserServices->night_care;
				$unavailbe_array[$k]["visits_limit"]= $UserServices->visit;
				$unavailbe_array[$k]["marketplace_limit"]= $UserServices->market_place;
				$unavailbe_array[$k]["avail_status"]= $UserServices->avail_status;
			}
		$UserSitterServiceModel=TableRegistry::get("UserSitterServices");
		$UserServicesData=$UserSitterServiceModel->find('all')->where(['user_id'=>$user_id])->toArray();

		$services_array=array();
		foreach($UserServicesData as $UserServices){
			$services_array["day_care_limit"]= $UserServices->day_care_limit;
			$services_array["night_care_limit"]= $UserServices->night_care_limit;
			$services_array["visits_limit"]= $UserServices->visits_limit;
			$services_array["markeplace_limit"]= $UserServices->hourly_services_limit;
		}
		
		/*GET AVAILABLITY DAYS LIK SUNDAY, MONDAY ETC START*/
		
		$availDaysModel=TableRegistry :: get("user_sitter_availability_days");
		$calenderAvailValData=$availDaysModel->find('all')->select('available_days')->where(['user_id'=>$user_id])->hydrate(false)->first();
		if(!empty($calenderAvailValData)){
			$availblityDaysOfSitter = explode(",",$calenderAvailValData['available_days']);
			$this->set('avail_days',$availblityDaysOfSitter);
		}else{
			$availblityDaysOfSitter = array();
			$this->set('avail_days',$availblityDaysOfSitter);
		}
		
		/*GET AVAILABLITY DAYS LIK SUNDAY, MONDAY ETC END*/
		
        $calendar = new  \Calendar();
        $this->set('calender',$calendar->show($services_array,$unavailbe_array,$availblityDaysOfSitter));

    }
    
    public function searchResultsFavourites(){
		$session = $this->request->session();
        $userId = $session->read('User.id');
		
		
		$this->viewBuilder()->layout('profile_dashboard');
		//Fetch Data Leading-sitting
		$UsersModel=TableRegistry :: get('Users');
		$FavourateModel=TableRegistry :: get('UserSitterFavourites');
		
		$favourateData = $FavourateModel->find('all', [
		'fields' => [
					'sitter_id' => 'UserSitterFavourites.sitter_id',
					'count_favourate' => 'COUNT(UserSitterFavourites.sitter_id)',
					
					],
					 'order' => ['count_favourate' => 'DESC'],
					 'group' => ['UserSitterFavourites.sitter_id'],
					])->where(['user_id'=>$userId])->hydrate(false)->contain(['Users'=> 
					function ($q){
						return $q
						->select(['id','image','first_name','last_name','city'])
						->contain(['UserRatings'])
						;
					}
					]);
		$this->set('FavUsersdata',$this->paginate($favourateData));
	}
	
	// for communications
	
	public function communication()
    {
		$session = $this->request->session();
        $userId = $session->read('User.id');
		$UsersModel=TableRegistry :: get('Users');
		$Userdata=$UsersModel->find('all')->where(['id'=>$userId])->toArray();
		$phone_no=$Userdata[0]->phone;
		$emer_phone_no=$Userdata[0]->emergency_contacts;
		$phone=array($phone_no,$emer_phone_no);
		$phoneArr=array();
		foreach($phone as $k=>$v){
			$phoneArr[$v]=$v;
		}
		//pr($phoneArr);die;
		$this->set('phoneArr',$phoneArr);
	
		$this->viewBuilder()->layout('profile_dashboard');
		$this->request->data = @$_REQUEST;
		$CommunicationModel=TableRegistry :: get('Communication');
		$CommunicationData=$CommunicationModel->newEntity();
		if(isset($this->request->data['Communication']) && !empty($this->request->data['Communication']))
		{
				$accept = array("quite_time","new_enquiries","new_message","new_booking_request","booking_declined","booking_confirmed","send_mms","in_area","marketing","hide_stay_image"); 
				foreach($accept as $val){ 
					if (!array_key_exists($val,$this->request->data['Communication'])){
						$this->request->data['Communication'][$val] = 0;
	               	}
				}
				$CommunicationData = $CommunicationModel->newEntity($this->request->data['Communication']);
				$CommunicationData->user_id = $userId;
				// pr($CommunicationData);die;
				if($CommunicationModel->save($CommunicationData)){
					 $this->Flash->success(__('Record has been added Successfully'));
					 return $this->redirect(['controller'=>'dashboard','action'=>'communication']);
				}
												
		} else{
				$query = $UsersModel->get($userId,['contain'=>'Communication']);
				if(isset($query->communication) && !empty($query->communication)){
					   $CommunicationData = $query->communication[0];
					   $this->set('communication_id', $CommunicationData->id);
					   unset($CommunicationData->id);
					   $this->set('communication_info', $CommunicationData);
				}
			
		} 
	}
	
	function setAvailablityDay(){
		$session = $this->request->session();
        $userId = $session->read('User.id');
        
        $UserSitterAvailabilityDayModel = TableRegistry::get('user_sitter_availability_days');
		
		$userAvailablity = $UserSitterAvailabilityDayModel->find('all')
												   ->where(['user_sitter_availability_days.user_id' => $userId]);
									   
		$userAvailData = $userAvailablity->first();
		
		$UserSitterAvailabilityDayModelData = $UserSitterAvailabilityDayModel->newEntity();
		
		$UserSitterAvailabilityDayModelData->available_days = $_REQUEST['selectedDay'];
		$UserSitterAvailabilityDayModelData->user_id = $userId;
		$UserSitterAvailabilityDayModelData->id =  $userAvailData->id;
		
		if($UserSitterAvailabilityDayModel->save($UserSitterAvailabilityDayModelData)){
			echo "success";	
		}else{
			echo "failed";	
		}
		die;
	   
        
	}
	
	function thankYou(){
		$this->viewBuilder()->layout('landing');  
				
		$SiteModel = TableRegistry::get('SiteConfigurations');
		$siteConfigurationData=$SiteModel->find('all')->toArray();
		$this->set('siteConfigurationData',$siteConfigurationData);
	}	
	
    function changeIdleStatus(){
		
		$session = $this->request->session();
        
        $userId = $session->read('User.id');
        /*		
		if($userId !=''){
			
			$UserModel = TableRegistry::get('Users');
		
			$userDataObj = $UserModel->find('all')->where(['Users.id' => $userId])->hydrate(false);
										   
			$userData = $userDataObj->first();
			
			$UserModelData = $UserModel->newEntity();
			
			$force_change =  isset($_REQUEST['force_change'])?$_REQUEST['force_change']:0;
		
				
				$UserModelData->user_id = $userId;
				
				$UserModelData->avail_status =  isset($_REQUEST['avail_status'])?$_REQUEST['avail_status']:'';
			
				if($UserModel->save($UserModelData)){
				
					echo "success";	
					
				}else{
					
					echo "failed";	
					
				}
		}*/
        
	
		die;
	   
    }	
	
}
?>
