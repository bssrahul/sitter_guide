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


require_once(ROOT . DS  . 'vendor' . DS  . 'Calender' . DS . 'calendar.php');
use Calendar;


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
        'limit' => 12,
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
															'UserSitterGalleries'
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
          //Profile Status
         // pr($userData[0]->user_sitter_house->toArray());die;
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
		  //pr($userData[0]);die;
		  if(isset($userData[0]->user_sitter_house) && !empty($userData[0]->user_sitter_house)){
				  $houseInfo = $userData[0]->user_sitter_house->toArray();
				// pr($houseInfo);die;
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
			 //pr($guestInfo);die;
		  }else{
			  $profile_status['UserPets']['guest_basic_detail'] = "no";
			  $profile_status['UserPets']['guest_description'] = "no";
			  $profile_status['UserPets']['guest_photos'] = "no";
			  $profile_status['UserPets']['behaviour'] = "no";
		  }
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
				     //echo $val->type_professional.$val->sector_type.$val->scanned_certification;
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
			//pr($userData[0]);die;
			if(isset($userData[0]->user_sitter_services) && !empty($userData[0]->user_sitter_services)){
			     $servicesInfo = $userData[0]->user_sitter_services[0]->toArray();
			     //pr($servicesInfo);die;
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
			  }else{
				 $profile_status['servicesAndRates']['calender'] = "no";
			  }
		    }else{
				  $profile_status['servicesAndRates']['terms'] = "no";
				  $profile_status['servicesAndRates']['sitter_house_status'] = "no";
				  $profile_status['servicesAndRates']['guest_house_status'] = "no";
				  $profile_status['servicesAndRates']['market_place_status'] = "no";
				  $profile_status['servicesAndRates']['calender'] = "no";
				}
		    //Skills and Accreditations 
		  $this->set('profile_status',$profile_status);
		  //pr($profile_status['skillsAndAccreditationDetails']);die;
		  
		 //pr($userData[0]->user_sitter_services);die;
		 // pr($profile_status);die;
          //End
         if(isset($this->request->params['pass']) && !empty($this->request->params['pass'])){
			 if($this->request->params['pass'][0] == 'sitter'){
				 $session->write('profile','sitter');
			 }else{
				 $session->write('profile','guest');
			 }
		 }
          //echo($session->read('profile'));die;


        //$session = $this->request->session();
        //echo $session->read('User.id'); die;
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

           //echo "type".$userType;die;
           $bookingRequestModel = TableRegistry::get('BookingRequests');
            if($userType == 'Sitter'){
            	$query_client = $bookingRequestModel
				    ->find()
				    ->where(['sitter_id' =>$userId,'status' =>0])
				    ->toArray();
				$sitter_data['message_status'] = $bookingRequestModel
				    ->find()
				    ->where(['sitter_id' =>$userId,'message_status' =>0])
				    ->count();    
                $sitter_data['alerts'] = $bookingRequestModel
				    ->find()
				    ->where(['sitter_id' =>$userId,'status' =>0])
				    ->count();
				$sitter_data['events'] = $bookingRequestModel
				    ->find()
				    ->where(['sitter_id' =>$userId,'status' =>1])
				    ->count();

				/*$unread_messages = $bookingRequestModel
				    ->find()
				    ->where(['sitter_id' =>$userId,'status' =>1])
				    ->count();    */     
			  if($query_client){
                $boarding = '';
                foreach($query_client as $client){
                	//pr($client['message']);die;
                    $sitter_clients[] = $client['user_id'];
                    $boarding .= $client['required_services'].','; 
                    $message[] = $client['message']; 
                }
                //pr($sitter_clients);
               // pr($message);die;

                 $sitter_data['clients'] = count(array_unique($sitter_clients));

                 $boarding = trim($boarding, ",");
                 $boarding = explode(",",$boarding); 

                     $counts = array_count_values($boarding);
               
	                 $total_stay = count($boarding);
	                 if(isset($counts['boarding'])){
	                    $boarding = $counts['boarding'];
	                    $sitter_data['boarding_stay']  = ($boarding/$total_stay)*100;
                     }else{
                     	$sitter_data['boarding_stay'] = "0";
                     }
	                 if(isset($counts['house_sitting'])){
	                    $house_sitting = $counts['house_sitting'];
	                    $sitter_data['day_stay']  = ($house_sitting/$total_stay)*100;

	                 }else{
                     	$sitter_data['day_stay'] = "0";
                     }
	                 if(isset($counts['market_place'])){
	                    $market_stay = $counts['market_place'];
	                    $sitter_data['market_place_stay']  = ($market_stay/$total_stay)*100;
                     }else{
                     	$sitter_data['market_place_stay'] = "0";
                     }
                     if(isset($counts['night_stay'])){
                     	//echo "okokok";die;
	                    $night_stay = $counts['night_stay'];
	                    $sitter_data['night_stay']  = ($night_stay/$total_stay)*100;
                     }else{
                     	$sitter_data['night_stay'] = "0";
                     }
                }
            }/*else{
               $query_client = $bookingRequestModel
				    ->find()
				    ->where(['user_id' =>$userId,'sitter_id' =>0])
				    ->count();
            }*/
             /*General profile completed*/
             /*$userAboutSitterHouseModel = TableRegistry::get('UserAboutSitters');
             $aboutSitterData = $userAboutSitterHouseModel
				    ->find()
				    ->where(['user_id' =>$userId,'status' =>1])
				    ->first();
			  if($aboutSitterData){
	            $aboutSitterData = $aboutSitterData->toArray();
		      	foreach($aboutSitterData as $single_val){
	                if(!empty($single_val)){
	                   $not_empty_about_count[] = $single_val;
			    	}
			    }
			    $total_about_count = count($aboutSitterData);
			    $not_empty_about_count = count($not_empty_about_count);
			    $about_sitter_completed = ($not_empty_about_count/$total_about_count)*100;
	            $sitter_data['about_sitter_completed'] = floor($about_sitter_completed);
		      }else{
	              $sitter_data['about_sitter_completed'] = '0';
		      }	*/		    
		    /*End general profile*/
            /*Sitter house completed*/
             $userSitterHouseModel = TableRegistry::get('UserSitterHouses');
             $sitterHouseData = $userSitterHouseModel
				    ->find()
				    ->where(['user_id' =>$userId,'status' =>1])
				    ->first();
			  if($sitterHouseData){
	            $sitterHouseData = $sitterHouseData->toArray();
		      	foreach($sitterHouseData as $single_val){
	                if(!empty($single_val)){
	                   $not_empty_count[] = $single_val;
			    	}
			    }
			    $total_house_count = count($sitterHouseData);
			    $not_empty_count = count($not_empty_count);
			    $sitter_house_completed = ($not_empty_count/$total_house_count)*100;
	            $sitter_data['sitter_house_completed'] = floor($sitter_house_completed);
		      }else{
	              $sitter_data['sitter_house_completed'] = '0';
		      }			    
		    /*End Sitter House*/
		      /*About Sitter completed*/
             $userAboutSitterHouseModel = TableRegistry::get('UserAboutSitters');
             $aboutSitterData = $userAboutSitterHouseModel
				    ->find()
				    ->where(['user_id' =>$userId,'status' =>1])
				    ->first();
			  if($aboutSitterData){
	            $aboutSitterData = $aboutSitterData->toArray();
		      	foreach($aboutSitterData as $single_val){
	                if(!empty($single_val)){
	                   $not_empty_about_count[] = $single_val;
			    	}
			    }
			    $total_about_count = count($aboutSitterData);
			    $not_empty_about_count = count($not_empty_about_count);
			    $about_sitter_completed = ($not_empty_about_count/$total_about_count)*100;
	            $sitter_data['about_sitter_completed'] = floor($about_sitter_completed);
		      }else{
	              $sitter_data['about_sitter_completed'] = '0';
		      }			    
		    /*End about sitter*/
		    //echo $sitter_data['about_sitter_completed'];die;    
	        $this->set('sitter_data',$sitter_data);
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
				//pr($userData);die;
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
				      //echo "both_create";die;
				      $this->set('profileStatus','both_create');
				}else if(!empty($userData[0]->user_professional_accreditations_details) || !empty($userData[0]->user_sitter_services)){
				     //echo "sitter_update";die;
				     $this->set('profileStatus','sitter_update');
				}else if((!empty($userData[0]->user_sitter_house) || !empty($userData[0]->user_pets) ) && empty($userData[0]->user_professional_accreditations_details) && empty($userData[0]->user_sitter_services)){
				    //echo "guest_update";die;
				     $this->set('profileStatus','guest_update');
				}else{
					$this->set('profileStatus','');
					}
				//pr($userData);die;	   
			//End
       				   
	 					   
							   
	}
    /**
  Function for Profile
    */
    function profile(){
    	 $this->viewBuilder()->layout('profile_dashboard');

    	 $captchErr="";
         $usersModel = TableRegistry::get('Users');
         
         $session = $this->request->session();
         $userId = $session->read('User.id');

         $user_info = $usersModel->get($userId,['fields'=>['id','password']]);
         $this->request->data = @$_REQUEST;
		if(isset($this->request->data['Users']) && !empty($this->request->data['Users']))
		{       
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
	            $countryCodesModel = TableRegistry::get('CountryCodes');
				$data=$this->request->data['Usersp'];

			    $error=$this->validate_password($data,$user_info);
				if(count($error) > 0)
				{
                        $userData = $usersModel->newEntity();
		                $userData = $usersModel->patchEntity($userData, $this->request->data['Users'],['validate'=>'update']);
		                $userData->id = $userId;
		               $usersModel->save($userData);
							
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
							return $this->redirect(['controller'=>'dashboard','action'=>'sitter-house']);
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
			$countryCodesModel = TableRegistry::get('CountryCodes');
				$data=$this->request->data['Usersp'];
				
			    $error=$this->validate_password($data,$user_info);
				if(count($error) > 0)
				{
                        $userData = $usersModel->newEntity();
		                $userData = $usersModel->patchEntity($userData, $this->request->data['Users'],['validate'=>'update']);
		                $userData->id = $userId;
		               $usersModel->save($userData);
							
                    unset($userData->id);
	                $this->set('userInfo', $userData);
                    $this->set('error',$error);
                    $this->Flash->error(__('Error found, Kindly fix the errors.'));
				}else{
                     $userData = $usersModel->newEntity();
		                $userData = $usersModel->patchEntity($userData, $this->request->data['Users'],['validate'=>'update']);
		                $userData->id = $userId;
		                if ($usersModel->save($userData)) {
		                	return $this->redirect(['controller'=>'dashboard','action'=>'sitter-house']);
						}else{
							$this->Flash->error(__('Error found, Kindly fix the errors.'));
						}
                        unset($userData->id);
		                $this->set('userInfo', $userData);
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
	   

        $countryCodesModel = TableRegistry::get('CountryCodes');
        $countrydata = $countryCodesModel->find('all')->toArray();
		 foreach($countrydata as $key=>$val){
                $country_info[$val['phonecode']] = $val['iso']."     (".$val['phonecode'].")"; 
		 }
		 $this->set('counry_info',$country_info);
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
		                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
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
                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
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
		                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
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
                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a  class="removeProfileImg" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
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

		if(isset($this->request->data['UserAboutSitters']))
		{
			$aboutSitterData = $aboutSittersModel->newEntity();

            if(!empty($this->request->data['UserAboutSitters']['sh_pet_sizes']) || isset($this->request->data['UserAboutSitters']['sh_pet_sizes'][0])){
	              $petSizeArr = $this->request->data['UserAboutSitters']['sh_pet_sizes'];
	              $aboutSitterData->sh_pet_sizes = $this->request->data['UserAboutSitters']['sh_pet_sizes'] = implode(",",$petSizeArr);
	        }
	        if(!empty($this->request->data['UserAboutSitters']['gh_pet_sizes']) || isset($this->request->data['UserAboutSitters']['gh_pet_sizes'][0])){
	              $petSizeArr = $this->request->data['UserAboutSitters']['gh_pet_sizes'];
	             $aboutSitterData->gh_pet_sizes = $this->request->data['UserAboutSitters']['gh_pet_sizes'] = implode(",",$petSizeArr);
	        }
		     $aboutSitterData = $aboutSittersModel->patchEntity($aboutSitterData, $this->request->data['UserAboutSitters'],['validate'=>true]);
            $aboutSitterData->user_id = $userId;
			  if ($aboutSittersModel->save($aboutSitterData)){

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
				  // $json_sizeArr=json_encode($sizeArr);
				  // pr($json_sizeArr);die;
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
			$guest_images['UserPets'] = $session->read('UserPets');
           // pr($guest_images); 
			//pr($this->request->data);die;
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

               if(array_key_exists($key,$guest_images['UserPets'])){
                  //$petGalleryModel->delete($record);
               	 if(isset($this->request->data['UserPets'][$key]['user_pet_id']) && !empty($this->request->data['UserPets'][$key]['user_pet_id'])){
               	  $petGalleryModel->deleteAll([
						   'user_id'=>$userId,
						   'user_pet_id'=>$this->request->data['UserPets'][$key]['user_pet_id']
						 ]);
               	}
                foreach($guest_images['UserPets'][$key] as $guest_image){
               		
               	   $petGalleryData = $petGalleryModel->newEntity();

                   $petGalleryData->user_id = $userId;
                   $petGalleryData->user_pet_id = $petsData->id;
                   $petGalleryData->image = $guest_image;

                   $petGalleryModel->save($petGalleryData);
                }    
               }
			}
			pr($petGalleryData);die;
			pr($petsData);die;

               //$petsData = $userPetsModel->patchEntity($petsData, $this->request->data['UserPets'],['validate'=>false]);
                
      
          return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);



			    /*if ($userPetsModel->save($petsData)){
               	     return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);
				}else{
				  $this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 	unset($petsData->id);
		       $this->set('guest_data', $guestData);
                  
		            $query = $usersModel->get($userId,['contain'=>'UserPetGalleries']);
		            if(isset($query->user_pet_galleries) && !empty($query->user_pet_galleries)) {
		                  $images_arr = $query->user_pet_galleries;
		                   $html = " ";
		                   foreach($images_arr as $key=>$val){
		                   	 $html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
		                   	 $html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a class="removeProfileImg"  data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle"></i></a>';
		                   	 $html .='</div></div>';
		                    }
		                $this->set('pet_images', $html);
		            }*/
		     $session->write("UserPets",'');
		}else{
             $session->write("UserPets",'');

		     $userPetsData = $usersModel->get($userId,['contain'=>'UserPets']);
		     //pr($userPetsData);die;

		     if(isset($userPetsData->user_pets) && !empty($userPetsData->user_pets)) {
		     	$count_pets = count($userPetsData->user_pets);
                if($count_pets == 1){
                   $this->set('guest_data', $userPetsData->user_pets[0]);
                }else{
                   $this->set('guests_data', $userPetsData->user_pets); 
		     	}
                 
		     }else{
		     	$this->set('guest1','guest1');
		     }
		  
   /*$query = $usersModel->find()->contain(['UserPetGalleries'=> ['queryBuilder' =>                            function ($q) {
                                        return $q->order(['UserPetGalleries.id' => 'DESC'])->limit(3);
                                    }
                                            ]
                         ]
                );*/
                       /*contain([
							        'queryBuilder' => function ($q){
							                return $q->order(['UserPetGalleries.created_date' =>'DESC'])->limit(3);
							            }
							    ]
							]);*/
           //pr($query);die;
        //pr($query);die;
           $query = $usersModel->get($userId,['contain'=>'UserPetGalleries']);
           if(isset($query->user_pet_galleries) && !empty($query->user_pet_galleries)) {
                  $images_arr = $query->user_pet_galleries;
                   $html = " ";
                   foreach($images_arr as $key=>$val){
                   	   	$html.='<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
                  <img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'" class="img-responsive center-block text-center" alt="img">
                </div>';
                    }
                $this->set('pet_images', $html);
            }
            
            
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
							//pr($errors);die;
						}else{

						   /*$petGalleryData = $petGalleryModel->newEntity();
                           $petGalleryData->user_id = $userId;
                           $petGalleryData->image = $Img[1];
                           $petGalleryModel->save($petGalleryData);*/
                           $guest_images[] = $Img[1];
                           //$guest_img[$guest_num][] = $Img[1];
                           $session->write('guest_images',$guest_images);
                             
						}				
					}else{
					   unset($_FILES['images']);
					}
		                $FileArr = array();      
                }
            $query = $usersModel->get($userId,['contain'=>'UserPetGalleries']);
            //pr($query);die;
             $guest_images = $session->read('guest_images');
             $html = "";
            if(isset($guest_images) && !empty($guest_images)){
             //pr($guest_images);die;
             	$i = 1;
	             foreach($guest_images as $guest_image){
	                   	   	$html.='<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> 
	                  <img src="'.HTTP_ROOT.'img/uploads/'.$guest_image.'" class="img-responsive center-block text-center" alt="img">
	                </div>';
	               
	               if($i == 3){
	                  break;
	               }
	               $i++;
	             }
	             $session->write("UserPets.$guest_num",$guest_images);
            }
            $error ="";
	        if(!empty($errors)){
	              foreach($errors as $key=>$val){
	          	     $error.= "<em class='signup_error error col-md-8 col-lg-8 col-sm-8'>".$val."</em>";
	            }
	        }
	        //pr($session->read("UserPets"));die;
	        echo (json_encode(array($error,$html)));die;
	      
            /*if(isset($query->user_pet_galleries) && !empty($query->user_pet_galleries)) {
                  $images_arr = $query->user_pet_galleries;
                  $sitterImg = array();
                   $html = " ";
                   foreach($images_arr as $key=>$val){
                   
                   	$html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
                   	$html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a class="removeProfileImg"  data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle"></i></a>';
                   	 $html .='</div></div>';
                   }
                  if($errors != ''){
                   $error ="";
                  	  foreach($errors as $key=>$val){
                  	     $error.= "<em class='signup_error error col-md-8 col-lg-8 col-sm-8'>".$val."</em>";
                      }
                  }

                 echo (json_encode(array($error,$html)));die;
            }*/
           
    }
    /**
    Function for Delete guest record
    */
    function deleteGuest($guestId = null){
    	$userPetsModel = TableRegistry::get('UserPets');
        $guestId = convert_uudecode(base64_decode($guestId));
        //echo $guestId;die;
        $userPetsModel->deleteAll($guestId);
       
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
                      $html.='<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">';
                   	  $html .= '<img class="img-responsive center-block text-center" alt="img" src="'.HTTP_ROOT.'img/uploads/'.$val->image.'">';
                   	  $html .='</div>';
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
			    	//echo $_REQUEST['imageId'];die;
			    	$record = $sitterGallriesModel->get($_REQUEST['imageId']);
					$deleteResult = $sitterGallriesModel->delete($record);
					//$this->Flash->success(__('Record has been deleted successfully.'));
			   }
            }

			$query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
            //pr($query);die;
            if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
                  $images_arr = $query->user_sitter_galleries;
                 
                   $html = " ";
                   foreach($images_arr as $key=>$val){
                    //echo $val->id;die;
                   	$html.='<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><div class="sitter-gal">';
                   	$html .= '<img class="img-responsive center-block text-center" alt="img"> src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a class="removeProfileImg" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
                   	 $html .='</div>';
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
		//pr($_FILES['profile_video']);
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
     	//pr($_FILES['profile_video_image']);die;
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
			//pr($this->request->data);die;

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

				if ($UserProfessionalDetailsModel->save($userProfessionalDetailData)){
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
					// $skillsData = $query->user_professional_accreditations;
					//  $this->set('skillId', $skillsData->id);
					// unset($skillsData->id); 
					//pr($customArrForDisplayRec); die;
					$this->set('professional', $customArrForDisplayRec);
					//pr($customArrForDisplayRec);die;
             }
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
            return $this->redirect(['controller'=>'dashboard','action'=>'services-and-rates']);
          }else{
          	$query = $usersModel->get($userId,['contain'=>'UserSitterServices']);
          	if(isset($query->user_sitter_services) && !empty($query->user_sitter_services)){
                   $sittersServiceData = $query->user_sitter_services[0];
                   $this->set('sitterServiceId', $sittersServiceData->id);
                   unset($sittersServiceData->id);
                   $this->set('sitter_service_info', $sittersServiceData);
		    }
          }
	
    }
    function sitterProfile(){
         $this->viewBuilder()->layout('profile_dashboard');
         	$session = $this->request->session();
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
	/*********************************************************************
     Purpose            : update image.
     Parameters         : null
     Returns            : integer
     ***********************************************************************/
    public function changeAvatar() {
    	
    	$session = $this->request->session();
    	$userId = $session->read('User.id');//$current_user->ID;

        //$post = isset($_POST) ? $_POST: array();
        //$max_width = "1024"; 
       // $userId = $loggedInId;//isset($post['hdn-profile-id']) ? intval($post['hdn-profile-id']) : 0;
        //$path = get_theme_root(). '\images\uploads\tmp';
        //$uploadFolder = 'uploads';
        //$path = realpath('../webroot/'.$uploadFolder);
    
        //$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
        //$name = $_FILES['image']['name'];
        //$size = $_FILES['image']['size'];
        /*if(strlen($name))
        {*/
        /*if(isset($_FILES['image']) && !empty($_FILES['image']))
        {*/
		        //$userData = $usersModel->newEntity();
		     	//$userData->id = $userId;
     	        //Upload video
     	        
	    if($_FILES['image']['name']!=''){
                    ob_start();
					$profilePic = $this->admin_upload_file('profilePic',$_FILES['image']);
					$profilePic = explode(':',$profilePic);
					if($profilePic[0]=='error'){
						//$this->Flash->error(__($profileBanner[1]));
					    echo "<em class='signup_error error clr'>".$profilePic[1]."</em>";die;//'Error::'.$profilePic[1];die;
					}else{
					 //$userData->profile_banner = $profilePic[1];
                    /* if($usersModel->save($userData)){
		                   $userInfo = $usersModel->get($userId);
		                   echo 'Success::'.HTTP_ROOT.'img/uploads/'.$userInfo->profile_banner;die;
			         }*/
                      ob_end_clean();
				    		/*chmod($filePath, 0755);
				        	//echo $filePath;die;
				        	$width = $this->getWidth($filePath);
				            $height = $this->getHeight($filePath);
				            //Scale the image if it is greater than the width set above
				            if ($width > $max_width){
				                $scale = $max_width/$width;
				                $uploaded = $this->resizeImage($filePath,$width,$height,$scale);
				            }else{
				                $scale = 1;
				                $uploaded = $this->resizeImage($filePath,$width,$height,$scale);
				            }*/

			         $res = $this->saveAvatar(array(
				                        'userId' => isset($userId) ? intval($userId) : 0,
				                                                'USERIMG' => isset($profilePic[1]) ? $profilePic[1] : '',
				                        ));

			          $src = HTTP_ROOT.'webroot/img/uploads/'.$profilePic[1];
				        echo "<img  id='photo' class='' src='".$src."' class='preview'/>";
				}				
			/*}else{
				 unset($_FILES['profile_banner']);
			}*/

	       /*list($txt, $ext) = explode(".", $name);
	        if(in_array(strtolower($ext),$valid_formats))
		    {
		        if($size<(2048*2048)) // Image size max 1 MB
			    {
			        $actual_image_name = 'user_img' .'_'.$this->RandomStringGenerator(15).'.'.$ext;
			        $filePath = realpath('../webroot/img/'.$uploadFolder).'/'.$actual_image_name;
			        $tmp = $_FILES['photoimg']['tmp_name'];
			        //echo $tmp.$filePath;die;
			        	ob_start();
			        if(move_uploaded_file($tmp, $filePath))
				    {
				    	ob_end_clean();
				    		chmod($filePath, 0755);
				        	//echo $filePath;die;
				        	$width = $this->getWidth($filePath);
				            $height = $this->getHeight($filePath);
				            //Scale the image if it is greater than the width set above
				            if ($width > $max_width){
				                $scale = $max_width/$width;
				                $uploaded = $this->resizeImage($filePath,$width,$height,$scale);
				            }else{
				                $scale = 1;
				                $uploaded = $this->resizeImage($filePath,$width,$height,$scale);
				            }
				      		//echo $filePath;die; 
				      		$res = $this->saveAvatar(array(
				                        'userId' => isset($userId) ? intval($userId) : 0,
				                                                'USERIMG' => isset($actual_image_name) ? $actual_image_name : '',
				                        ));
				           //echo "<pre>";print_r($res);die;           
				        //mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
				     //echo "<img id='photo' class='' src='".getCustomAvatar($userId, true).'?'.time()."' class='preview'/>";
				       $src = HTTP_ROOT.'webroot/img/uploads/'.$actual_image_name;
				        echo "<img height='150px' width='150px' id='photo' class='' src='".$src."' class='preview'/>";
			        }
			        else
			      echo "<em class='signup_error error clr'>Failed!</em>"; 
		        }
		        else
		       echo "<em class='signup_error error clr'>Image file size max 1 MB!</em>"; */
	       /* }
	        else
	        echo "<em class='signup_error error clr'>Only JPG, PNG, BMP or GIF files are allowed!</em>"; */
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
    	//echo "notototo";die;
        //global $current_user;
     //echo "<pre>";print_r($_POST);die;
        $loggedInId = $session->read('User.id');//$current_user->ID;
	    $post = isset($_POST) ? $_POST: array();

	    $session = $this->request->session();
    	
        $userId = $session->read('User.id');//$current_user->ID;
	    //$userId = isset($post['id']) ? intval($post['id']) : 0;
	    //$path = get_theme_root(). '\\images\uploads\tmp';
	     //$path = realpath('../webroot/'.$uploadFolder);
	     $uploadFolder = 'uploads';
	     $path = realpath('../webroot/img/'.$uploadFolder);
	    
//echo "okokovk";
	   // echo $path ;die;//= explode(".", $path);die;
	    $t_width = 328; // Maximum thumbnail width
	    $t_height = 184;    // Maximum thumbnail height

	if(isset($_POST['t']) and $_POST['t'] == "ajax")
	{
	    extract($_POST);
	   // echo "<pre>";print_r($_POST);die;
	   
        $user = $UsersModel->get($userId);
      
      
	    $img = $user->image; //'avatar_1.jpeg'; //get_user_meta($userId, 'user_avatar', true);
      // echo  $img;die;
        list($txt, $ext) = explode(".", $img);
        //echo $ext;die;
	    $imagePath = $path.'/'.$img;
	    $ratio = ($t_width/$w1); 
	    $ratio1 = ($t_height/$h1); 
	    $nw = ceil($w1 * $ratio);
	    $nh = ceil($h1 * $ratio1);
	    $nimg = imagecreatetruecolor($nw,$nh);
	    if($ext=='png'){
	    	//echo "okokoo";die;
	    	$im_src = imagecreatefrompng($imagePath);
		    imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
	    	$q=9/100;
			$quality=$q;
			imagepng($nimg,$imagePath,$quality);      
		    //imagepng($nimg,$imagePath,90);
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

	     //echo "<pre>";print_r($imageCopy);die;
	   // echo $user->image;die;
	}
		//echo getCustomAvatar($userId, true);
	 /*$src = HTTP_ROOT.'webroot/img/uploads/'.$img;
	 echo "<img id='photo' class='' src='".$src."' class='preview'/>";*/
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

		    /*$source = imagecreatefromjpeg($image);
		    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		    imagejpeg($newImage,$image,90);*/
		  
		if($ext=='png'){
			//echo "yes okok";die;
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
	
	// Function for user rating
	public function review($user=null)
    {
		$session = $this->request->session();
		$UserModel=TableRegistry::get('Users');
		$UserData=$UserModel->find('all')->toArray();
	
		$this->set('UserData',$UserData);
		$this->viewBuilder()->layout('profile_dashboard');
		$reviewModel=TableRegistry::get('UserRatings');
	
		$reviewData= $reviewModel->newEntity();
		if($this->request->is('POST')){

			$reviewData->user_from = $session->read('User.id');
			$accuracy = $this->request->data['accuracy_rating'];
			$communication = $this->request->data['communication_rating'];
			$cleanliness = $this->request->data['cleanliness_rating'];
			$location = $this->request->data['location_rating'];
			$checkin = $this->request->data['check_in_rating'];
			$rating=($accuracy + $communication + $cleanliness + $location + $checkin )/5;
	
			$reviewData->status = 0;
			$reviewData=$reviewModel->patchEntity($reviewData,$this->request->data,['validate'=>true]);
	
			$reviewData->rating=$rating;
	
			if($reviewModel->save($reviewData)){
				$this->Flash->success(__('Record has been added Successfully'));
	
			}	
			
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
	
	public function calender()
    {
			
		$Session=$this->request->session();
		$user_id=$Session->read('User.id');

		$this->viewBuilder()->layout('profile_dashboard');
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
			
		$calendar = new  \Calendar();

		$this->set('calender',$calendar->show($services_array,$unavailbe_array));
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
			
				$this->Flash->success(__('Record has been added by ajax Successfully'));
				return $this->redirect(['controller' => 'dashboard', 'action' => 'calender']);
			}
			else{
	
				$this->Flash->error(__('Record can not be added '));
			
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
		
			$this->Flash->success(__('Record has been added by ajax Successfully'));
			return $this->redirect(['controller' => 'dashboard', 'action' => 'calender']);
		}
		else{
			$this->Flash->error(__('Record can not be added '));
		
		}	
		die;
	}

	public function ajaxCalendar()
    {

			$Session=$this->request->session();
			$user_id=$Session->read('User.id');
			//pr($user_id);die;
			//$this->viewBuilder()->layout('profile_dashboard');
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
			//pr($unavailbe_array);die;
			//$this->set('pre_calender',$calendar->pre_data_show($pre_services_array));
			
			

	
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

		$this->set('calender',$calendar->show($services_array,$unavailbe_array));

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
		//	pr($favourateData);die;			
						
		/*		
	
		$favUsersdata=array();
		foreach($favourateData as $favourate){
			
			$sitter_id=$favourate->sitter_id;
			$fav_no=$favourate->count_favourate;
			//$favUsersdata[]=$UsersModel->find('all')->where(['id'=>$sitter_id])->contain(['UserRatings'])->toArray();
			$favUsersdata[] = $UsersModel->find('all',['contain'=>[
														'UserAboutSitters',
														'UserRatings','UserSitterServices'
													]]
											)
							   ->where(['Users.id' => $sitter_id])
							   ->toArray();
			}
										
		 */ 		
		//pr($favUsersdata);die;
		//$this->set('Posts',$this->paginate($Posts));
	
		$this->set('FavUsersdata',$this->paginate($favourateData));
	
		
	}
}
?>
