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
	public function initialize()
    {
		parent::initialize();
		
		
		if(!$this->CheckGuestSession())
		{
			return $this->redirect(['controller' => 'Guests', 'action' => 'home']);
		}
		
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
		

	}
	/**Function for landing page
	*/
	function home()
	{
		$this->viewBuilder()->layout('profile_dashboard');

		$SiteConfigurationsModel = TableRegistry::get('SiteConfigurations');
        $siteInfo = $SiteConfigurationsModel->find('all')->first();
        $this->set('siteInfo',$siteInfo);

        //$session = $this->request->session();
        //echo $session->read('User.id'); die;
	}

	/* send a reference to friend */
	function reference(){
		//echo "<pre>";print_r($this->request->data['email']);die;
		//$this->viewBuilder()->layout('profile_dashboard');
		$msg = '';
		$this->request->data = @$_REQUEST;
		if(isset($this->request->data) && !empty($this->request->data)) {
			
			$UsersModel = TableRegistry::get('Users');
			$checkUser = $UsersModel->find('all',['conditions'=>['Users.email'=>$this->request->data['email']]])->toArray();
			if(!count($checkUser)) { // check if user is present in users table
				
				$references = TableRegistry::get('UserReferences');
				$checkReference = $references->find('all',['conditions'=>['UserReferences.email'=>$this->request->data['email']]])->toArray();
				
				if(!count($checkReference)) { // check if code is already generated 
					
					$reference = $references->newEntity();
					$session = $this->request->session();		
					$reference->user_id = $session->read('User.id');
					$reference->email = $this->request->data['email'];
					$genReferCode = $this->RandomStringGenerator(6);
					$reference->reference_code = $genReferCode;
					$reference->status = 0;
					if($references->save($reference)) {
						//$msg = 'Reference Code sent on the email'; $type='success';
						

						$link = HTTP_ROOT.'guests/?refer=yes';
						$linkOnMail = '<a href="'.$link.'" target="_blank">Click Here For Sign Up With Reference Code</a>';
						
						$replace = array('{fullname}','{refcode}','{link}');
						

                        $referEmail = $this->request->data['email'];
                        $referEmail =strcspn($referEmail,"@");
                        $referName = substr($this->request->data['email'],'0',$referEmail);
                        //$referName = str_replace(array('_','.'),array(' ',' '),$referName); 

						$with = array($referName,$genReferCode,$linkOnMail);
						//$this->send_email('',$replace,$with,'reference_code',$this->request->data['email']);
                        
                        echo 'Success:Reference Code sent on the email';
						$this->setSuccessMessage('Reference Code sent on the email.');
						die;
						
					} else {
						//$msg = 'Something Went Wrong Try again later'; $type='error';
                        echo 'Error:Something Went Wrong Try again later';
                        $this->setErrorMessage('Something Went Wrong Try again later');
                        die;
					}
					  
				} else {
					//$msg = 'Reference Code already generated for this email'; $type='error';
					echo 'Error:Reference Code already generated for this email';
                     $this->setErrorMessage('Reference Code already generated for this email');
					die;
				}
			} else {
				//$msg = 'User already exists, Please try any other email'; $type='error';
				echo 'Error:User already exists, Please try any other email';
                $this->setErrorMessage('User already exists, Please try any other email');
				die;
			}
		}
		//echo json_encode(array('message'=>$msg, 'type'=>$type)); exit;
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
	/**
	Function for profile
	*/
	function profile(){
		$this->viewBuilder()->layout('profile_dashboard');
	}
	function sitterProfile(){
         $this->viewBuilder()->layout('profile_dashboard');
         	$session = $this->request->session();
         	//$session->write('bookingProduct','');
         	//$session->write('house_details','');
         	//$session->write('sitter_property','');
	}
	/**
	Function for sitter profile
	*/
	function saveSitterProfile(){
		$this->viewBuilder()->layout('profile_dashboard');

		$session = $this->request->session();
		$userId = $session->read('User.id');
        /*if(isset($this->request->data['product']) && !empty($this->request->data['product']))
		{
			echo "<pre>";print_r($this->request->data);die;

		}*/
		////////////////////////
		$session = $this->request->session();
		$userId = $session->read('User.id');

		$this->request->data = @$_REQUEST;
		//echo "<pre>";print_r($this->request->data);die;
         //echo "<pre>";print_r($this->request->data);die;
		if(isset($this->request->data['booking_product']) && !empty($this->request->data['booking_product'])){
			
		$session->write('bookingProduct', $this->request->data);
	    echo "<pre>";print_r($this->request->data);die;
	     //$data = $this->saveAllSessionsData();

         //echo "<pre>";print_r($data);die;
		}elseif(isset($this->request->data['house_details']) && !empty($this->request->data['house_details'])){
			
			/*$userImg['image'] = $this->request->data['Users']['image'];
	        //Upload user image
			if($userImg['image']['name']!=''){
				$userImg = $this->admin_upload_file('profilePic',$userImg['image']);
				$userImg = explode(':',$userImg);
				if($userImg[0]=='error'){
					//echo $userImg[1];die;
					$imgError = $this->displayErrorMessage($userImg[1]);
					$this->redirect($this->referer());
				}else{
					$this->request->data['Users']['image'] = $userImg[1];
				}				
			}else{
			   unset($this->request->data['Users']['image']);
			}*/
			
			$session->write('house_details', $this->request->data);
			//echo "Basic Profile session";
			echo "<pre>";print_r($this->request->data);die;
		}elseif(isset($this->request->data['sitter_property']) && !empty($this->request->data['sitter_property'])){
			
			$session->write('sitter_property', $this->request->data);
			//echo "Extended profile session";
			echo "<pre>";print_r($this->request->data);die;
		}elseif(isset($this->request->data['professional_accreditation']) && !empty($this->request->data['professional_accreditation'])){
			$session->write('professional_accreditation', $this->request->data);
			$this->saveAllSessionsData();
			echo "<pre>";print_r($this->request->data);die;
			return $this->redirect(['controller'=>'dashboard','action'=>'sitter-account']);
	    }
	    die;
	   //$this->redirect($this->referer());
		/////////////////////////

	}


/**
	Function for save sitter profile
	*/
	function saveAllSessionsData(){
		//echo "okoko";die;
		    //User Service data	
			//Read getting start session
			$session = $this->request->session();
			$userId = $session->read('User.id');
			$house_details = $session->read('house_details');
               echo "<pre>";print_r($house_details);die;
			
			    /*$bookingProduct = $session->read('bookingProduct');
                if (isset($bookingProduct) && !empty($bookingProduct)) {
              	    $userBookingProductsModel = TableRegistry::get('UserBookingProducts');
		            $userProductData = $userBookingProductsModel->newEntity();

                    $userProductData = $userBookingProductsModel->patchEntity($userProductData, $bookingProduct);
					$userBookingProductsModel->save($userProductData);
				}
                $house_details = $session->read('house_details');
               //echo "<pre>";print_r($house_details);die;
                if (isset($house_details) && !empty($house_details)) {
                	$userHousesModel = TableRegistry::get('UserHouses');
                    foreach($house_details['Houses'] as $key=>$val){
                       $house_details['UserHouses'] = $val;
                        //echo "<pre>";print_r($house_details['UserHouses']);die;

                       $userHouseData = $userHousesModel->newEntity();
                       $userHouseData->user_id = $userId;
                       $userHouseData->house_type = $key;
                       $userHouseData = $userHousesModel->patchEntity($userHouseData, $house_details);
					   $userHousesModel->save($userHouseData);

                    }
              	}
              	$sitter_property = $session->read('sitter_property');
               //echo "<pre>";print_r($sitter_property);die;

                if (isset($sitter_property) && !empty($sitter_property)) {

                	$UserPropertiesModel = TableRegistry::get('UserProperties');
                     $property['UserProperties'] = $sitter_property['UserProperties'];

                       $userPropertyData = $UserPropertiesModel->newEntity();
                       $userPropertyData->user_id = $userId;
                       $userPropertyData = $UserPropertiesModel->patchEntity($userPropertyData, $property);
					   $UserPropertiesModel->save($userPropertyData);

                       $UsersModel = TableRegistry::get('Users');
                       $user_info['Users'] = $sitter_property['Users'];

                       $userData = $UsersModel->newEntity();
                       $userData->id = $userId;
                       $userData = $UsersModel->patchEntity($userData, $user_info);
					   $UsersModel->save($userData);
                }*/
                $professional_accreditation = $session->read('professional_accreditation');
              //echo "<pre>";print_r($professional_accreditation);die;

                if (isset($professional_accreditation) && !empty($professional_accreditation)) {
                     $UserProfessionalModel = TableRegistry::get('UserProfessionalAccreditations');
                     $UserProfessionalDetailsModel = TableRegistry::get('UserProfessionalAccreditationDetails'); 
                      
                     foreach($professional_accreditation['UserProfessionals']['pets']['govt'] as $key=>$val){
                   	  $userProfessionalData = $UserProfessionalModel->newEntity();
                      $professional_accreditation_pets['UserProfessionalAccreditations'] = $val;
                       $userProfessionalData->user_id = $userId;
                       $userProfessionalData->type_professional = 'pets';
                       $userProfessionalData->sector_type = "govt";
                       $userProfessionalData->expert_level = $key;

                    
                       $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData, $professional_accreditation_pets);
					   $UserProfessionalModel->save($userProfessionalData);


					     
                     }
                     foreach($professional_accreditation['UserProfessionals']['people']['private'] as $key=>$val){
	                       $userProfessionalData = $UserProfessionalModel->newEntity();
	                       $userProfessionalData->user_id = $userId;
	                       $userProfessionalData->type_professional = 'people';
	                       $userProfessionalData->sector_type = "private";
	                       $userProfessionalData->expert_level = $key;
	                       $professional_accreditation_peoples['UserProfessionalAccreditations'] = $val;
	                       $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData, $professional_accreditation_peoples);
						   $UserProfessionalModel->save($userProfessionalData);   

					
                     }
                     foreach($professional_accreditation['UserProfessionals']['other']['other'] as $key=>$val){
                           $userProfessionalData = $UserProfessionalModel->newEntity();
	                       $userProfessionalData->user_id = $userId;
	                       $userProfessionalData->type_professional = 'other';
	                       $userProfessionalData->sector_type = "other";
	                       $userProfessionalData->expert_level = $key;
	                       $professional_accreditation_other['UserProfessionalAccreditations'] = $val;
	                       $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData, $professional_accreditation_other);
						   $UserProfessionalModel->save($userProfessionalData);


                     }

                          $professionalDetails['UserProfessionalAccreditationDetails'] = $professional_accreditation['UserProfessionalsDetails'];
		                   $userProfessionalDetailData = $UserProfessionalDetailsModel->newEntity();
		                   $userProfessionalDetailData->user_id = $userId;
		                   $userProfessionalDetailData->user_professional_accreditation_id = $userProfessionalData->id;
		                   $userProfessionalDetailData = $UserProfessionalDetailsModel->patchEntity($userProfessionalDetailData, $professionalDetails);
						  
						   $UserProfessionalDetailsModel->save($userProfessionalDetailData);
                }
			die;





			 
			
			
			//End user service data
			//START USER ACCEPTED
			/*$UserAcceptedPetsModel = TableRegistry::get('UserAcceptedPets');
			foreach($gettingStarted['pet_type'] as $value){
				$UserAcceptedPetData = $UserAcceptedPetsModel->newEntity();
				$UserAcceptedPetData->user_id = $userId;
				$UserAcceptedPetData->pet_type = $value;
				//Save Accepted pets
			 $UserAcceptedPetsModel->save($UserAcceptedPetData);
			}
			//END USER ACCEPTED
			//User work schedule
		   $UserWorkSchedulesModel = TableRegistry::get('UserWorkSchedules');
		   //echo "<pre>";print_r($gettingStarted['day_name']);die;
			foreach($gettingStarted['day_name'] as $value){
				$UserWorkScheduleData = $UserWorkSchedulesModel->newEntity();
				$UserWorkScheduleData->user_id = $userId;
				$UserWorkScheduleData->day_name = $value;
				//Save Accepted pets
		        $UserWorkSchedulesModel->save($UserWorkScheduleData);
				//echo "<pre>";print_r($UserWorkScheduleData);die;
			}
			//End work schedule
			//START USER EXTENDED PROFILES
			$extendedProfile = $session->read('extendedProfile');
			//echo "<pre>";print_r($extendedProfile);
			$UserExtendedProfilesModel = TableRegistry::get('UserExtendedProfiles');
		    $UserExtendedProfileData = $UserExtendedProfilesModel->newEntity(['UserExtendedProfiles']);
			
			$UserExtendedProfileData->user_id = $userId;
			/*$UserExtendedProfileData->pick_drop = $extendedProfile['UserExtendedProfiles']['pick_drop'];
			$UserExtendedProfileData->travel_fee_rate = $extendedProfile['UserExtendedProfiles']['travel_fee_rate'];
			$UserExtendedProfileData->access_car = $extendedProfile['UserExtendedProfiles']['access_car'];
			$UserExtendedProfileData->home_type = $extendedProfile['UserExtendedProfiles']['home_type'];
			$UserExtendedProfileData->garden_area = $extendedProfile['UserExtendedProfiles']['garden_area'];
			$UserExtendedProfileData->is_fanced = $extendedProfile['UserExtendedProfiles']['is_fanced'];
			$UserExtendedProfileData->under_13_child = $extendedProfile['UserExtendedProfiles']['under_13_child'];
			$UserExtendedProfileData->last_minute_booking = $extendedProfile['UserExtendedProfiles']['last_minute_booking'];
			$UserExtendedProfileData->short_term_type = $extendedProfile['UserExtendedProfiles']['short_term_type'];
			$UserExtendedProfileData->cancel_policy = $extendedProfile['UserExtendedProfiles']['cancel_policy'];*/
			//echo "<pre>";print_r($UserExtendedProfileData);die;
			/*$UserExtendedProfilesModel->save($UserExtendedProfileData);
			
			//END USER PROFILES
			//Start User Data
			$UsersModel = TableRegistry::get('Users');
			$UsersData = $UsersModel->newEntity();
			//Read basic profile session
			$basicProfile = $session->read('basicProfile');
			
			$UsersData->id = $userId; 
			$UsersData->awesome_title = $basicProfile['Users']['awesome_title'];
			$UsersData->your_story = $basicProfile['Users']['your_story'];
			$UsersData->image = isset($basicProfile['Users']['image'])?$basicProfile['Users']['image']:"";
			//Read personal info session
			$personal = $session->read('personal');
			
			$UsersData->user_type = "Sitter";
			$UsersData->address = $personal['Users']['address'];
			$UsersData->city = $personal['Users']['city'];
			$UsersData->state = $personal['Users']['state'];
			$UsersData->zip = $personal['Users']['zip'];
			$UsersData->phone = $personal['Users']['phone'];
			//Save User data
			$UsersModel->save($UsersData);*/
			//End User Data
			
				/*echo "gettingStarted<pre>";print_r($session->read('gettingStarted'));
				echo "basicProfile<pre>";print_r($session->read('basicProfile'));
				echo "extendedProfile<pre>";print_r($session->read('extendedProfile'));
				echo "personal<pre>";print_r($session->read('personal'));die;*/
				
	}




	/**
	Function for profile edit
	*/
	/*function profileEdit(){
		$this->viewBuilder()->layout('profile');
		$session = $this->request->session();
		$userId = $session->read('User.id');
		$UsersModel = TableRegistry::get('Users');
		$ZonesModel = TableRegistry::get('Zones');
		
		if(isset($this->request->data) && !empty($this->request->data))
		{
			 $UserData = $UsersModel->newEntity($this->request->data['Users'],['validate' => true]);
			
			 //Upload image
			if($_FILES['image']['name']!=''){
				$userimg = $this->admin_upload_file('profilePic',$_FILES['image']);
				$userimg = explode(':',$userimg);
				if($userimg[0]=='error'){
					$this->setErrorMessage($userimg[1]);
					$this->redirect($this->referer());
					
				}else{
					$UserData->image = $userimg[1];
				}				
			}else{
				 unset($_FILES['image']);
			}
			$UserData->id = $userId;
			$saveUserData = $UsersModel->save($UserData);
			if($saveUserData){
				$this->setSuccessMessage("Profile has been edit successfully");
				
				$session->write('User.email', $UserData->email);
				$session->write('User.name', $UserData->first_name." ".$UserData->last_name);
				
				$session->write('User.image', $UserData->image);
				
				return $this->redirect(['controller'=>'guests','action'=>'profile-edit']);
			}else{
				return $this->redirect(['controller'=>'guests']);
			}
		}else{
			$userInfo = $UsersModel->get($userId);
			$zonesData = $ZonesModel->find('list',[
				'keyField' => 'zone_id',
				'valueField' => 'zone_name'
			]);
            $zonesData = $zonesData->toArray();
			$this->set('userInfo',$userInfo);
			$this->set('zonesData',$zonesData);
		}
	}*/
	/**
	Function for Add pet
	*/
	/*function addUserPet(){
		
		$this->viewBuilder()->layout('profile');
		$session = $this->request->session();
		$userId = $session->read('User.id');
	
		$UserPetsModel = TableRegistry::get('UserPets');
		if(isset($this->request->data) && !empty($this->request->data))
		{
		
			
			 $UserPetData = $UserPetsModel->newEntity($this->request->data['UserPets'],['validate' => true]);
			 
			 $UserPetData->user_id = $userId; 
			 
			 $years = $this->request->data['years'];
			 $months = $this->request->data['months'];
			 $arr = array($years,$months);
             $UserPetData->pet_age   = implode(",",$arr);
			 
			if($_FILES['pet_image']['name']!=''){
				$petimg = $this->admin_upload_file('petImage',$_FILES['pet_image']);
				$petimg = explode(':',$petimg);
				if($petimg[0]=='error'){
				
					$this->displayErrorMessage($petimg[1]);
					$this->redirect($this->referer());
				}else{
					
					$UserPetData->pet_image = $petimg[1];
				}				
			}else{
				 unset($_FILES['pet_image']);
			}
			
			$saveUserPetData = $UserPetsModel->save($UserPetData);
			if($saveUserPetData){
				$this->setSuccessMessage("Pet has been added successfully");
				return $this->redirect(['controller'=>'guests','action'=>'profile']);
			}else{
				return $this->redirect(['controller'=>'guests']);
			}
		}
		
	}*/
	/**
	Function 
	*/
	/*function minderRegister(){
		$UsersModel = TableRegistry::get('Users');
		          
		$this->viewBuilder()->layout('profile');
		$session = $this->request->session();
		
		$userId = $session->read('User.id');
		$userInfo = $UsersModel->get($userId);
		if($userInfo->user_type == "Sitter"){
		return $this->redirect(['controller'=>'dashboard','action'=>'sitter-account']);
		}else{
			$this->redirect($this->referer());
		}
	}*/
	/*function saveMinderDetails(){
		$this->request->data = @$_REQUEST;
		$this->request->data['Users']['image']  = @$_FILES['image'];
		
		$session = $this->request->session();
		$userId = $session->read('User.id');
		
		if(isset($this->request->data['service']) && !empty($this->request->data['service'])){
			
		$session->write('gettingStarted', $this->request->data);
		//echo "Write getting session";
		//echo "<pre>";print_r($this->request->data);die;
		}elseif(isset($this->request->data['Users']['awesome_title']) && !empty($this->request->data['Users']['awesome_title'])){
			
			$userImg['image'] = $this->request->data['Users']['image'];
	        //Upload user image
			if($userImg['image']['name']!=''){
				$userImg = $this->admin_upload_file('profilePic',$userImg['image']);
				$userImg = explode(':',$userImg);
				if($userImg[0]=='error'){
					//echo $userImg[1];die;
					$imgError = $this->displayErrorMessage($userImg[1]);
					$this->redirect($this->referer());
				}else{
					$this->request->data['Users']['image'] = $userImg[1];
				}				
			}else{
			   unset($this->request->data['Users']['image']);
			}
			
			$session->write('basicProfile', $this->request->data);
			//echo "Basic Profile session";
			//echo "<pre>";print_r($this->request->data);die;
		}elseif(isset($this->request->data['UserExtendedProfiles']) && !empty($this->request->data['UserExtendedProfiles'])){
			
			$session->write('extendedProfile', $this->request->data);
			//echo "Extended profile session";
			//echo "<pre>";print_r($this->request->data);die;
		}elseif(isset($this->request->data['Users']['address']) && !empty($this->request->data['Users']['address'])){
			$session->write('personal', $this->request->data);
			$this->saveAllSessionsData();
			return $this->redirect(['controller'=>'dashboard','action'=>'sitter-account']);
	    }
	   $this->redirect($this->referer());
	}*/
	/**
	Function for sitter account
	*/
	/*function sitterAccount(){
	    $this->viewBuilder()->layout('profile');
		
		$UsersModel = TableRegistry::get("Users");
		$session = $this->request->session();
		$userId = $session->read('User.id');
		
		$userInfo = $UsersModel->get($userId, [
		'fields'=>['id','user_type','first_name','last_name','email','awesome_title','your_story','phone','image','address','city','state','zip','about_user']]);
		$session->write('User.name',($userInfo->first_name)." ".($userInfo->last_name));
		$session->write('User.email',$userInfo->email);
		$session->write('User.phone',$userInfo->phone);
		$session->write('User.image',$userInfo->image);
	}*/
	/**
	Function for save personal details
	*/
	/*function personalDetails(){
		$this->viewBuilder()->layout('profile');
		//$this->viewBuilder()->layout('personal_details_layout');
		$UsersModel = TableRegistry::get("Users");
		
		    $session = $this->request->session();
			$userId = $session->read('User.id');
			
		if($this->request->data){
	  //echo "<pre>";print_r($this->request->data);die;
		 $UserData = $UsersModel->newEntity($this->request->data['Users']);
		 $UserData->id = $userId;
		 
		 $UsersModel->save($UserData);
		
		 $this->redirect($this->referer());
		}else{
			
			$userInfo = $UsersModel->get($userId,[
			'fields'=>['id','user_type','first_name','last_name','email','awesome_title','your_story','phone','image','address','city','state','zip','about_user','birth_date','gender']]);
			
			$this->set('userInfo',$userInfo);
		}
	}*/
	/**
	Function for services
	*/
	/*function servicesAndRates(){
		$this->viewBuilder()->layout('profile');
		$UsersModel = TableRegistry::get("Users");
		//$UserServicesModel = TableRegistry::get("UserServices");
		//$UserAcceptedPetsModel = TableRegistry::get("UserAcceptedPets");
		
		    $session = $this->request->session();
			$userId = $session->read('User.id');
			$UserServiceDetailsModel = TableRegistry::get('UserServiceDetails');
			if(isset($this->request->data) && !empty($this->request->data)){
				$data = $this->request->data;
				//echo "<pre>";print_r($data);die;

			    foreach($data['service'] as $key=>$value){
					  $values[$key]['service'] = $value;
				}
			    foreach($data['service_price'] as $k=>$val){
				  $values[$k]['service_price'] = $val;
			    }
				$UserServicesModel = TableRegistry::get('UserServices');

				$UserServicesModel->deleteAll(['user_id' => $userId]);

				foreach($values as $single){
					  $UserServiceData = $UserServicesModel->newEntity();
					  $UserServiceData->user_id = $userId;
					  $UserServiceData->service = $single['service'];
					  $UserServiceData->service_price = $single['service_price'];
					//Save Service data
					$UserServicesModel->save($UserServiceData);
				}
				//End user service data
				//START USER ACCEPTED
				$UserAcceptedPetsModel = TableRegistry::get('UserAcceptedPets');
			    $UserAcceptedPetsModel->deleteAll(['user_id' => $userId]);
				foreach($data['pet_type'] as $value){
					$UserAcceptedPetData = $UserAcceptedPetsModel->newEntity();
					$UserAcceptedPetData->user_id = $userId;
					$UserAcceptedPetData->pet_type = $value;
					//Save Accepted pets
					
				 $UserAcceptedPetsModel->save($UserAcceptedPetData);
				}
				//END USER ACCEPTED
				//START USER SERVICES DETAILS
				
				foreach($data['user_service_id'] as $key=>$value){
					  $values[$key]['user_service_id'] = $value;
				}
			    foreach($data['additional_rate'] as $k=>$val){
				  $values[$k]['additional_rate'] = $val;
			    }
				 foreach($data['puppy_pet_rate'] as $k=>$val){
				  $values[$k]['puppy_pet_rate'] = $val;
			    }
				 foreach($data['extended_session'] as $k=>$val){
				  $values[$k]['extended_session'] = $val;
			    }
				 foreach($data['extended_discount'] as $k=>$val){
				  $values[$k]['extended_discount'] = $val;
			    }
				 foreach($data['spaces_available'] as $k=>$val){
				  $values[$k]['spaces_available'] = $val;
			    }
				//$UserAcceptedPetsModel->deleteAll();
				foreach($values as $single){
					
					  $UserServiceDetailsData = $UserServiceDetailsModel->newEntity();
					  //$UserServiceDetailsData->user_id = $userId;
					  $UserServiceDetailsData->user_service_id = $single['user_service_id'];
					  $UserServiceDetailsData->additional_rate = $single['additional_rate'];
					  $UserServiceDetailsData->puppy_pet_rate = $single['puppy_pet_rate'];
					  $UserServiceDetailsData->extended_session = $single['extended_session'];
					  $UserServiceDetailsData->extended_discount = $single['extended_discount'];
					  $UserServiceDetailsData->spaces_available = $single['spaces_available'];
					  $UserServiceDetailsData->spaces_available = $single['spaces_available'];
					  //echo "<pre>";print_r($UserServiceDetailsData);die;
					//Save Service data
					$UserServiceDetailsModel->deleteAll(['user_service_id' => $single['user_service_id']]);
					
					$UserServiceDetailsModel->save($UserServiceDetailsData);
				}
				//END SERVICES DETAILS
				$this->redirect($this->referer());
			}else{
		    $userInfo = $UsersModel->get($userId,[
				'fields'=>['id','user_type','first_name','last_name','email','awesome_title','your_story','phone','image','address','city','state','zip','about_user','birth_date','gender'],'contain'=>['UserExtendedProfiles','UserAcceptedPets','UserWorkSchedules','UserServices'=>['UserServiceDetails']]
				]);
			    //echo "<pre>";print_r($userInfo);die;
				$this->set('userInfo',$userInfo);
			}
			
	}*/
	/**
    functio n for basic profile
	*/
	/*function basicProfile(){
		//echo "okokokok";die;
		$this->viewBuilder()->layout('profile');
		$UsersModel = TableRegistry::get("Users");
        

			$session = $this->request->session();
			$userId = $session->read('User.id');
           

		    if(isset($this->request->data) && !empty($this->request->data)){
				$UserData = $UsersModel->newEntity($this->request->data['Users']);
				$UserData->id = $userId;
				 $userImg['image'] = $this->request->data['Users']['image'];
	                //Upload image
					if($userImg['image']['name']!=''){
						$userimg = $this->admin_upload_file('profilePic',$userImg['image']);
						$userimg = explode(':',$userimg);
						if($userimg[0]=='error'){
							$this->setErrorMessage($userimg[1]);
							$this->redirect($this->referer());
							
						}else{
							$UserData->image = $userimg[1];
						}				
					}else{
						 unset($this->request->data['Users']['image']);
					}
					
                $UsersModel->save($UserData);
                //echo "<pre>";print_r($UserData);die;
                $this->redirect($this->referer());
 
            }else{
                  $userInfo = $UsersModel->get($userId,[
				'fields'=>['id','user_type','first_name','last_name','email',
				'awesome_title','your_story','phone','image','address','city',
				'state','zip','about_user','birth_date','gender']]);
				
                $this->set('userInfo',$userInfo);
			}

	}*/
	/**
   Function for extended profile
	*/
   /*function extendedProfile(){
   	    $this->viewBuilder()->layout('profile');
            $UsersModel = TableRegistry::get('Users');
			

			$session = $this->request->session();
			$userId = $session->read('User.id');


		    if(isset($this->request->data) && !empty($this->request->data)){
		    	$UserExtendedProfilesModel = TableRegistry::get('UserExtendedProfiles');
				$UserExtendedProfileData = $UserExtendedProfilesModel->newEntity(['UserExtendedProfiles']);
				$UserExtendedProfileData->id = $userId;
				
					
               $UserExtendedProfilesModel->save($UserExtendedProfileData);
               $this->redirect($this->referer());
 
            }else{
            	//echo $userId;die;
            $userInfo = $UsersModel->get($userId,[
				'fields'=>['id','user_type','first_name','last_name','email','awesome_title','your_story','phone','image','address','city','state','zip','about_user','birth_date','gender'],'contain'=>['UserExtendedProfiles','UserAcceptedPets','UserWorkSchedules','UserServices'=>['UserServiceDetails']]
				]);

                     $this->set('userInfo',$userInfo);
                    // echo "<pre>";print_r($userInfo);die;
			}
   }*/
	
	/**
	Function for Invite Friend
	*/
	/*function inviteFriend(){
        $inviteFriendsModel = TableRegistry::get('InviteFriends');

	    if(isset($this->request->data) && !empty($this->request->data)){

            $inviteFriendsModel->find('all',['conditions'=>['']);

            $inviteFriendData = $inviteFriendsModel->newEntity($this->request->data['InviteFriends']);
            
            $inviteFriendsModel->save($inviteFriendData);

            echo "<pre>";print_r($inviteFriendData);die;
	    }
	}*/
}
?>