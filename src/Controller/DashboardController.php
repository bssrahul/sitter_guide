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
use Cake\I18n\Time;
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

    	 $captchErr="";
         $usersModel = TableRegistry::get('Users');
         
         $session = $this->request->session();
         $userId = $session->read('User.id');

         $user_info = $usersModel->get($userId,['fields'=>['id','password']]);
         $this->request->data = @$_REQUEST;
		if(isset($this->request->data['Users']) && !empty($this->request->data['Users']))
		{

             if(isset($this->request->data['g-recaptcha-response']) && !empty($this->request->data['g-recaptcha-response'])){
					//your site secret key
					$secret = CAPTCHA_SECRET_KEY;
					//get verify response data
					$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$this->request->data['g-recaptcha-response']);
					$responseData = json_decode($verifyResponse);
                    if($responseData->success)
                    {

			$countryCodesModel = TableRegistry::get('CountryCodes');
			/*pr($this->request->data['Users']['county_code']);die;
			 foreach($this->request->data['Users']['county_code'] as $key=>$val){
			 	$countryCodeData = $countryCodesModel->newEntity();
			 	//echo $val;die;
                  $countryCodeData->code = $val;
                 $countryCodesModel->save($countryCodeData);
			 }*/
			 
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
						$captchErr = $this->stringTranslate(base64_encode('Robot verification failed, please try again'));
					}

			}else{
					$captchErr = $this->stringTranslate(base64_encode('Please click on the reCAPTCHA box'));
				}
        }else{
		   $userData = $usersModel->get($userId);
		   unset($userData->id);
		  $this->set('userInfo', $userData);

	    }
	    $this->set('captchErr',@$captchErr);

        $countryCodesModel = TableRegistry::get('CountryCodes');
        $countrydata = $countryCodesModel->find('all')->toArray();
		 foreach($countrydata as $key=>$val){
                $country_info[$val['phonecode']] = $val['iso3']."(".$val['phonecode'].")"; 
		 }
		 $this->set('counry_info',$country_info);
          //pr($country_info);die;
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

		//$this->request->data = @$_REQUEST;
		//pr($this->request->data); die;
		if(isset($this->request->data['UserSitterHouses']) && !empty($this->request->data['UserSitterHouses']))
		{
			//pr($this->request->data['UserSitterHouses']);die;
			   $sitterHouseData = $sitterHousesModel->newEntity();
               $sitterHouseData = $sitterHousesModel->patchEntity($sitterHouseData, $this->request->data['UserSitterHouses'],['validate'=>true]);
                $sitterHouseData->user_id = $userId;
             // pr($sitterHouseData->errors());  die;
                if ($sitterHousesModel->save($sitterHouseData)){
               	     return $this->redirect(['controller'=>'dashboard','action'=>'about-sitter']);
				}else{
					//pr($sitterHouseData->errors());die;
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 	unset($sitterHouseData->id);
		       $this->set('sitterHouseData', $sitterHouseData);

		            //echo @$sitterHouseId;die;
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
		            



		}else{

		    $query = $usersModel->get($userId,['contain'=>'UserSitterHouses']);
		    if(isset($query->user_sitter_house) && !empty($query->user_sitter_house)){
                   $sitterHouseData = $query->user_sitter_house;
                   $this->set('sitterHouseId', $sitterHouseData->id);
                   $this->set('sitterHouseData', $sitterHouseData);
		    }
		    //echo @$sitterHouseId;die;
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

		if(isset($this->request->data['UserAboutSitters']))
		{
			    //pr($this->request->data); die;
			$aboutSitterData = $aboutSittersModel->newEntity();

            if(!empty($this->request->data['UserAboutSitters']['sh_pet_sizes']) || isset($this->request->data['UserAboutSitters']['sh_pet_sizes'][0])){
	              $petSizeArr = $this->request->data['UserAboutSitters']['sh_pet_sizes'];
	              $aboutSitterData->sh_pet_sizes = $this->request->data['UserAboutSitters']['sh_pet_sizes'] = implode(",",$petSizeArr);
	        }
	        if(!empty($this->request->data['UserAboutSitters']['gh_pet_sizes']) || isset($this->request->data['UserAboutSitters']['gh_pet_sizes'][0])){
	              $petSizeArr = $this->request->data['UserAboutSitters']['gh_pet_sizes'];
	             $aboutSitterData->gh_pet_sizes = $this->request->data['UserAboutSitters']['gh_pet_sizes'] = implode(",",$petSizeArr);
	        }
		       //pr($this->request->data); die;
               //$aboutSitterData = $aboutSittersModel->patchEntity($aboutSitterData, $this->request->data['UserAboutSitters'],['validate'=>false]);
               // pr($aboutSitterData);die;
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
               //return $this->redirect(['controller'=>'dashboard','action'=>'professional-accreditations']); 
        }else{
            $query = $usersModel->get($userId,['contain'=>'UserAboutSitters']);
          
           if(isset($query->user_about_sitter) && !empty($query->user_about_sitter)){
                   $aboutSitterData = $query->user_about_sitter;
                   $this->set('aboutSitterId', $aboutSitterData->id);
                   unset($aboutSitterData->id);
                   //pr($aboutSitterData);die;
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
							//pr($errors);die;
							//continue;
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
                  //pr($errors);die;
                  if($errors != ''){
                   $error ="";
                  	  foreach($errors as $key=>$val){
                  	  //echo "<em class='signup_error error'>".$val."</em>";die;
                  	  	
                           $error.= "<em class='signup_error error col-md-8 col-lg-8 col-sm-8'>".$val."</em>";
                      }
                  }
                 
                  //echo $error;die;
                  echo (json_encode(array($error,$html)));die;
                  //echo 'Success::'.$html; die;
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
					//$this->Flash->error(__($profileVideo[1]));
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
					//$this->Flash->error(__($profileBanner[1]));
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
			
			//pr($this->request->data['UserProfessionals']['check']['govt']); die;
			$UserProfessionalModel = TableRegistry::get('UserProfessionalAccreditations');
			$UserProfessionalDetailsModel = TableRegistry::get('userProfessionalAccreditationsDetails'); 

			$UserProfessionalModel->deleteAll(['user_id' => $userId]);
			$UserProfessionalDetailsModel->deleteAll(['user_id' => $userId]);
			
			//ADD FIRST FIELD START
			$userProfessionalData = $UserProfessionalModel->newEntity();
			$userProfessionalData->user_id = $userId;
			$userProfessionalData->type_professional = 'check';
			$userProfessionalData->sector_type = "govt";
			$userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['check']['govt']);
			$UserProfessionalModel->save($userProfessionalData);
			
			//ADD SECOND FIELD START
			$userProfessionalData = $UserProfessionalModel->newEntity();
			$userProfessionalData->user_id = $userId;
			$userProfessionalData->type_professional = 'pets';
			$userProfessionalData->sector_type = "private";
			$userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['pets']['private']);
			$userProfessionalData->qualification_date = Time::createFromFormat('Y-m-d', $this->request->data['UserProfessionals']['pets']['private']['qualification_date'], 'UTC');
			$userProfessionalData->expiry_date = Time::createFromFormat('Y-m-d', $this->request->data['UserProfessionals']['pets']['private']['expiry_date'], 'UTC');
			$UserProfessionalModel->save($userProfessionalData);
			
			//ADD THIRD FIELD START
			$userProfessionalData = $UserProfessionalModel->newEntity();
			$userProfessionalData->user_id = $userId;
			$userProfessionalData->type_professional = 'people';
			$userProfessionalData->sector_type = "private";

			$userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['people']['private']);
			$userProfessionalData->qualification_date = Time::createFromFormat('Y-m-d', $this->request->data['UserProfessionals']['people']['private']['qualification_date'], 'UTC');
			$userProfessionalData->expiry_date = Time::createFromFormat('Y-m-d', $this->request->data['UserProfessionals']['people']['private']['expiry_date'], 'UTC');
			$UserProfessionalModel->save($userProfessionalData);
			
			//ADD FOURTH FIELD START
			$userProfessionalData = $UserProfessionalModel->newEntity();
			$userProfessionalData->user_id = $userId;
			$userProfessionalData->type_professional = 'govt';
			$userProfessionalData->sector_type = "licence";

			$userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$this->request->data['UserProfessionals']['govt']['licence']);
			$UserProfessionalModel->save($userProfessionalData);

			for($i=0;$i<count($this->request->data['qualification_title']);$i++){

				 $userProfessionalData = $UserProfessionalModel->newEntity();

				 $userProfessionalData->user_id = $userId; 
				 $userProfessionalData->type_professional = 'other';
				 $userProfessionalData->sector_type = "other";

				 $userProfessional['qualification_title'] = $this->request->data['qualification_title'][$i];
				 $userProfessional['qualification_date'] = $this->request->data['qualification_date'][$i];
				 $userProfessional['expiry_date'] = $this->request->data['expiry_date'][$i];
				 $userProfessional['scanned_certification'] = $this->request->data['scanned_certification'][$i];

				 $userProfessionalData = $UserProfessionalModel->patchEntity($userProfessionalData,$userProfessional);
				 $userProfessionalData->qualification_date = $this->request->data['qualification_date'][$i];
				 $userProfessionalData->expiry_date = $this->request->data['expiry_date'][$i];
			
				 $UserProfessionalModel->save($userProfessionalData);
			}

			$userProfessionalDetailData = $UserProfessionalDetailsModel->newEntity();
			$userProfessionalDetailData->user_id = $userId;
			$userProfessionalDetailData->user_professional_accreditation_id = $userProfessionalData->id;
			$userProfessionalDetailData = $UserProfessionalDetailsModel->patchEntity($userProfessionalDetailData, $this->request->data['UserProfessionalsDetails']);

			if ($UserProfessionalDetailsModel->save($userProfessionalDetailData)){
				 return $this->redirect(['controller'=>'dashboard','action'=>'services-and-rates']);
			}else{
				$this->Flash->error(__('Error found, Kindly fix the errors.'));
			}

               
		}else{
			
            $query = $usersModel->get($userId,['contain'=>['UserProfessionalAccreditations','userProfessionalAccreditationsDetails']]);
         
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
        $serviceDetailsModel = TableRegistry::get('UserSitterServiceDetails');
       
		if(isset($this->request->data['UserSitterServices']) && !empty($this->request->data['UserSitterServices']))
		{

		$serviceDetailsModel->deleteAll(['user_id' => $userId]);          
			$accept = array("cancellation_policy","booking"); 
            foreach($accept as $val){ 
				if (!array_key_exists($val,$this->request->data['UserSitterServices'])){
					$this->request->data['UserSitterServices'][$val] = 0;
               	}
			}
			$serviceData = $sitterServicesModel->newEntity($this->request->data['UserSitterServices']);
			$serviceData->user_id = $userId;
			$serviceData =  $sitterServicesModel->save($serviceData);
			//LOOP FIRST POSTED FORM DATA
			$lastArrToSave = array();
			//pr($this->request->data['UserServiceDetail']);die;

			foreach($this->request->data['UserServiceDetail'] as $service_for){
				$customServiceArr = array();
               foreach($service_for['sd'] as $k=>$singleService){
					 unset($service_for['sd']);
					 $saveArr[] = array_merge($service_for,$singleService);
                        
				}
             $lastArrToSave[] = $saveArr;
             $saveArr = array();
            }
            //pr($lastArrToSave);die;
			foreach($lastArrToSave as $fetchArr){
            	foreach($fetchArr as $newarr){
                      $services_status = array("service_for_status","service_status","extended_stay_rate_status","additional_guest_rate_status","repeat_client_only_status","holiday_rate_status","small_guest_rate_status","large_guest_rate_status","cats_rate_status","puppy_rate_status"); 
						foreach($services_status as $val){ 
							if (!array_key_exists($val,$newarr)){
								$newarr[$val] = 0;
							}
						}
                       $serviceDetailData = $serviceDetailsModel->newEntity($newarr);
					   $serviceDetailData->user_id = $userId;
					   $serviceDetailsModel->save($serviceDetailData);		
				}
			}	
			   return $this->redirect(['controller'=>'dashboard','action'=>'services-and-rates']);
        }else{
        	$customArrForDisplayRec = array();
            $query = $usersModel->get($userId,['contain'=>['UserSitterServices','UserSitterServiceDetails']]);
            if(isset($query->user_sitter_service_details) && !empty($query->user_sitter_service_details)){
            	foreach($query->user_sitter_service_details as $displayArr){
            		$displayArr = $displayArr->toArray();
            		foreach($displayArr as $key=>$single_val){
            			//pr($displayArr);die;
            			$customArrForDisplayRec['UserServiceDetail'][$displayArr['service_for']][$displayArr['service_type']][$key] = $single_val;
            		}
            	//$finalDisplayArr[]  
            	}
            	//pr($customArrForDisplayRec);die;
            	$this->set('services_details',$customArrForDisplayRec);
            }
            //pr($query);die;
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
	    $t_width = 300; // Maximum thumbnail width
	    $t_height = 300;    // Maximum thumbnail height

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
	    $nw = ceil($w1 * $ratio);
	    $nh = ceil($h1 * $ratio);
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
}
?>
