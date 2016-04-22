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
use Cake\Event\Event;
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

	
    /*=================Validation For password=================*/
    function validate_password($data, $user_info)
	{
		$errors=array();
		if(trim($data['current_password'])=='')
		{
			//$errors['current_password'][]="Required field\n";
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
    Function for Profile
    */
    function profile(){
    	 $this->viewBuilder()->layout('profile_dashboard');
         $usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
         $userId = $session->read('User.id');

         $user_info = $usersModel->get($userId,['fields'=>['id','password']]);
         
        

        $this->request->data = @$_REQUEST;
		if(isset($this->request->data) && !empty($this->request->data))
		{
			 //pr($this->request->data);die;
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
		                	//echo "koko";die;
							//$this->Flash->success(__('Profile has been saved Successfully'));

							return $this->redirect(['controller'=>'dashboard','action'=>'sitter-house']);
						}else{
							$this->Flash->error(__('Error found, Kindly fix the errors.'));
						}

						unset($userData->id);
		                $this->set('userInfo', $userData);

				}
        }else{
		   $userData = $usersModel->get($userId);
		   unset($userData->id);
		  $this->set('userInfo', $userData);

	    }
	    


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
    function sitterHouse(){
    	  $this->viewBuilder()->layout('profile_dashboard');
          $usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');
   
        $sitterHousesModel = TableRegistry::get('UserSitterHouses');

		$this->request->data = @$_REQUEST;
		//pr($this->request->data); die;
		if(isset($this->request->data) && !empty($this->request->data))
		{
			   $sitterHouseData = $sitterHousesModel->newEntity();
               $sitterHouseData = $sitterHousesModel->patchEntity($sitterHouseData, $this->request->data['UserSitterHouses'],['validate'=>true]);
                $sitterHouseData->user_id = $userId;
              // pr($sitterHouseData->errors());  die;
                if ($sitterHousesModel->save($sitterHouseData)){
               	     return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 	unset($sitterHouseData->id);
		       $this->set('sitterHouseData', $sitterHouseData);

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
                   	$html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a href="#"><i class="fa fa-minus-circle"></i></a>';
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
		
		if(isset($this->request->data) && !empty($this->request->data))
		{
			pr($this->request->data); die;
			   $aboutSitterData = $aboutSittersModel->newEntity();
               $aboutSitterData = $aboutSittersModel->patchEntity($aboutSitterData, $this->request->data['UserAboutSitters'],['validate'=>true]);
                $aboutSitterData->user_id = $userId;
                
              // pr($aboutSitterData->errors());  die;
                if ($aboutSittersModel->save($aboutSitterData)){

                      return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 	unset($aboutSitterData->id);
		       $this->set('sitter_info', $aboutSitterData);

		}else{
            $query = $usersModel->get($userId,['contain'=>'UserAboutSitters']);
          
           if(isset($query->user_about_sitter) && !empty($query->user_about_sitter)){
                   $aboutSitterData = $query->user_about_sitter;
                   //$this->set('sitterHouseId', $aboutSitterData->id);
                   $this->set('sitter_info', $aboutSitterData);
		    }
		   
        }
	     

    }
    /**
    Function for Professional Accreditations
    */
    function sitterGallery(){
    	//echo "<pre>";print_r($_FILES);die;
    	$sitterGallriesModel = TableRegistry::get('UserSitterGalleries');
    	$usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');
      //echo "<pre>";print_r($_FILES);die;
               $images_arr = array();
			    
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
							$errors[] = array();
							$errors[] = $_FILES['images']['name'][$i].':'.$Img[1];
							//pr($errors);die;
							continue;
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

                  //pr($FileArr);die;


			        /*$target_dir = "uploads/";
			        $target_file = $target_dir.$_FILES['images']['name'][$key];
			        if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
			            $images_arr[] = $target_file;
			        }*/
			    }
         
            $query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
            //pr($query);die;
            if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
                  $images_arr = $query->user_sitter_galleries;
                  $sitterImg = array();
                   $html = " ";
                   foreach($images_arr as $key=>$val){

                   	$html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
                   	$html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a href="#"><i class="fa fa-minus-circle"></i></a>';
                   	 $html .='</div></div>';
                   }
                  
                   //json_encode($sitterImg);
                  echo $html; die;
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
   
        //$professionalModel = TableRegistry::get('UserProfessionalAccreditations');
        
// echo  $userId;die; 
		$this->request->data = @$_REQUEST;
		//pr($this->request->data); die;
		if(isset($this->request->data) && !empty($this->request->data))
		{
			 
             
              // pr($this->request->data); die;
			   //if (isset($professional_accreditation) && !empty($professional_accreditation)) {
                     $UserProfessionalModel = TableRegistry::get('UserProfessionalAccreditations');
                     $UserProfessionalDetailsModel = TableRegistry::get('userProfessionalAccreditationsDetails'); 
                      
                      
                       $userProfessionalData = $UserProfessionalModel->newEntity();
                       $userProfessionalData->user_id = $userId;
                       $userProfessionalData->type_professional = 'check';
                       $userProfessionalData->sector_type = "govt";
                       $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['check']['govt']);
					   $UserProfessionalModel->save($userProfessionalData);

                       $userProfessionalData = $UserProfessionalModel->newEntity();
                       $userProfessionalData->user_id = $userId;
                       $userProfessionalData->type_professional = 'pets';
                       $userProfessionalData->sector_type = "private";
                       $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['pets']['private']);
					   $UserProfessionalModel->save($userProfessionalData);

					   $userProfessionalData = $UserProfessionalModel->newEntity();
                       $userProfessionalData->user_id = $userId;
                       $userProfessionalData->type_professional = 'people';
                       $userProfessionalData->sector_type = "private";
                       
                       $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['people']['private']);
					   $UserProfessionalModel->save($userProfessionalData);

                     //foreach($this->request->data as $key=>$val)
                   for($i=0;$i<count($this->request->data['qualification_title']);$i++){

                     	 $userProfessionalData = $UserProfessionalModel->newEntity();

                         $userProfessionalData->user_id = $userId; 
                         $userProfessionalData->type_professional = 'other';
                         $userProfessionalData->sector_type = "other";

                         $userProfessional['qualification_title'] = $this->request->data['qualification_title'][$i];
                         $userProfessional['qualification_date'] = $this->request->data['qualification_date'][$i];
                         $userProfessional['expiry_date'] = $this->request->data['expiry_date'][$i];


                       $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$userProfessional);
					   $UserProfessionalModel->save($userProfessionalData);
                      }
                           //pr($this->request->data); die;
                           
		                   $userProfessionalDetailData = $UserProfessionalDetailsModel->newEntity();
		                   $userProfessionalDetailData->user_id = $userId;
		                   $userProfessionalDetailData->user_professional_accreditation_id = $userProfessionalData->id;
		                   $userProfessionalDetailData = $UserProfessionalDetailsModel->patchEntity($userProfessionalDetailData, $this->request->data['UserProfessionalsDetails']);
						  
						   $UserProfessionalDetailsModel->save($userProfessionalDetailData);
						  // echo "<pre>";print_r($this->request->data);die;
               
		}/*else{
            $query = $usersModel->get($userId,['contain'=>'UserProfessionalAccreditations']);
           // pr($query->user_professional_accreditations);die;
           
		     if(isset($query->user_professional_accreditations) && !empty($query->user_professional_accreditations)){
                   $skillsData = $query->user_professional_accreditations;
                   $this->set('skillId', $skillsData->id);
                   unset($skillsData->id);
                   $this->set('skill_info', $skillsData);
		    }
            
        }*/


    	

    }
     /**
    Function for Services & Rates
    */
    function servicesAndRates(){
    	 $this->viewBuilder()->layout('profile_dashboard');

    	  $this->viewBuilder()->layout('profile_dashboard');


          $usersModel = TableRegistry::get('Users');

          $session = $this->request->session();
          $userId = $session->read('User.id');
   
        $sitterServicesModel = TableRegistry::get('UserSitterServices');
        

		$this->request->data = @$_REQUEST;
		//pr($this->request->data); die;
		if(isset($this->request->data) && !empty($this->request->data))
		{
			
           $customAllServices = array("day_care_sitters","day_care_guests","visits_sitters","visits_guests","night_care_sitters","night_care_guests"); 
                foreach($customAllServices as $val){ 
               		if (!array_key_exists($val,$this->request->data['UserSitterServices'])){
	           			$this->request->data['UserSitterServices'][$val] = 0;
               		}
               	}
                 //pr($this->request->data['UserSitterServices']);
               $sittersServiceData = $sitterServicesModel->newEntity();



               $sittersServiceData = $sitterServicesModel->patchEntity($sittersServiceData, $this->request->data['UserSitterServices']/*,['validate'=>true]*/);
                $sittersServiceData->user_id = $userId;
               if ($sitterServicesModel->save($sittersServiceData)){
                     // pr($this->request->data);die;
                      return $this->redirect(['controller'=>'dashboard','action'=>'services-and-rates']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 	unset($sittersServiceData->id);
		       $this->set('sitter_info', $sittersServiceData);

		}else{
            $query = $usersModel->get($userId,['contain'=>'UserSitterServices']);
          // pr($query);die;
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
         	//$session->write('bookingProduct','');
         	//$session->write('house_details','');
         	//$session->write('sitter_property','');
	}
    /**
	Function for sitter profile
	*/
	/*function saveSitterProfile(){
		$this->viewBuilder()->layout('profile_dashboard');

		$session = $this->request->session();
		$userId = $session->read('User.id');
        /*if(isset($this->request->data['product']) && !empty($this->request->data['product']))
		{
			echo "<pre>";print_r($this->request->data);die;

		}*/
		////////////////////////
	/*	$session = $this->request->session();
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
			
		/*	$session->write('house_details', $this->request->data);
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

	}*/


/**
	Function for save sitter profile
	*/
	/*function saveAllSessionsData(){
		//echo "okoko";die;
		    //User Service data	
			//Read getting start session
			$session = $this->request->session();
			$userId = $session->read('User.id');
			$house_details = $session->read('house_details');
               //echo "<pre>";print_r($house_details);die;
			
			    $bookingProduct = $session->read('bookingProduct');
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
                }
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
		}*/
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
	/*********************************************************************
     Purpose            : update image.
     Parameters         : null
     Returns            : integer
     ***********************************************************************/
    public function changeAvatar() {
    	
    	$session = $this->request->session();
    	
        //global $current_user;
       //echo "<pre>";print_r();
        $loggedInId = $session->read('User.id');//$current_user->ID;

        $post = isset($_POST) ? $_POST: array();
        $max_width = "1024"; 
        $userId = $loggedInId;//isset($post['hdn-profile-id']) ? intval($post['hdn-profile-id']) : 0;
        //$path = get_theme_root(). '\images\uploads\tmp';
        $uploadFolder = 'uploads';
        //$path = realpath('../webroot/'.$uploadFolder);
    
        $valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
        $name = $_FILES['photoimg']['name'];
        $size = $_FILES['photoimg']['size'];
        if(strlen($name))
        {
	        list($txt, $ext) = explode(".", $name);
	        if(in_array(strtolower($ext),$valid_formats))
		    {
		        if($size<(2048*2048)) // Image size max 1 MB
			    {
			        $actual_image_name = 'USERIMG' .'_'.$this->RandomStringGenerator(7).'.'.$ext;
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
				        echo "<img id='photo' class='' src='".$src."' class='preview'/>";
			        }
			        else
			        echo "failed";
		        }
		        else
		        echo "Image file size max 1 MB"; 
	        }
	        else
	        echo "Invalid file format.."; 
	    }
        else
        echo "Please select image..!";
        exit;
        
        die;
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
	    $t_width = 300; // Maximum thumbnail width
	    $t_height = 300;    // Maximum thumbnail height

	if(isset($_POST['t']) and $_POST['t'] == "ajax")
	{
	    extract($_POST);
	   // echo "<pre>";print_r($_POST);die;
	   
        $user = $UsersModel->get($userId);
      
      
	    $img = $user->image; //'avatar_1.jpeg'; //get_user_meta($userId, 'user_avatar', true);

	    $imagePath = $path.'/'.$img;
	    $ratio = ($t_width/$w1); 
	    $nw = ceil($w1 * $ratio);
	    $nh = ceil($h1 * $ratio);
	    $nimg = imagecreatetruecolor($nw,$nh);
	    $im_src = imagecreatefromjpeg($imagePath);
	    imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);

	    imagejpeg($nimg,$imagePath,90);
	     //echo "<pre>";print_r($imageCopy);die;
	   // echo $user->image;die;
	}
		//echo getCustomAvatar($userId, true);
	 /*$src = HTTP_ROOT.'webroot/img/uploads/'.$img;
	 echo "<img id='photo' class='' src='".$src."' class='preview'/>";*/
		exit(0);    
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
		    $source = imagecreatefromjpeg($image);
		    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		    imagejpeg($newImage,$image,90);
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
                       if($UsersModel->save($userData)){
                       	  $user = $session->write('User.image',$options['USERIMG']);
                       }

        }
                 // echo "<pre>";print_r($options);
    }
}
?>