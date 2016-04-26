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
                   	//echo $val->id;die;
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
		
		if(isset($this->request->data) && !empty($this->request->data))
		{
			//pr($this->request->data); die;
			   $aboutSitterData = $aboutSittersModel->newEntity();
			   $petSizeArr = $this->request->data['UserAboutSitters']['accepted_pet_size'];

			   $this->request->data['UserAboutSitters']['accepted_pet_size'] = implode(",",$petSizeArr);
               $aboutSitterData = $aboutSittersModel->patchEntity($aboutSitterData, $this->request->data['UserAboutSitters'],['validate'=>true]);
                $aboutSitterData->user_id = $userId;
                
              // pr($aboutSitterData->errors());  die;
                if ($aboutSittersModel->save($aboutSitterData)){

                      return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);
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
                   $this->set('aboutSitterId', $aboutSitterData->id);
                   unset($aboutSitterData->id);
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
                   	$html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a class="removeProfileImg"  data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle"></i></a>';
                   	 $html .='</div></div>';
                   }
                  
                   //json_encode($sitterImg);
                  echo $html; die;
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
					$this->Flash->success(__('Record has been deleted successfully.'));
			   }
            }

			$query = $usersModel->get($userId,['contain'=>'UserSitterGalleries']);
            //pr($query);die;
            if(isset($query->user_sitter_galleries) && !empty($query->user_sitter_galleries)) {
                  $images_arr = $query->user_sitter_galleries;
                  $sitterImg = array();
                   $html = " ";
                   foreach($images_arr as $key=>$val){
                    //echo $val->id;die;
                   	$html.='<div class="col-lg-1 col-md-2 col-xs-3"><div class="sitter-gal">';
                   	$html .= '<img src="'.HTTP_ROOT.'img/uploads/'.$val->image.'"><a class="removeProfileImg" data-rel="'.$val->id.'" href="javascript:void(0);"><i class="fa fa-minus-circle "></i></a>';
                   	 $html .='</div></div>';
                   }
                  
                   //json_encode($sitterImg);
                  echo $html; die;
            }
      }
      /*End gallery image*/
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