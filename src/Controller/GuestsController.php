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



require_once(ROOT . DS  . 'vendor' . DS  . 'Facebook' . DS . 'src' . DS . 'Facebook' . DS . 'autoload.php');
use Facebook;

use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */

class GuestsController extends AppController
{
	public $helpers = ['Form'];
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
	/**Function for landing page
	*/
	function home(){
		
		$this->viewBuilder()->layout('landing');
		
        $session = $this->request->session();
		$currentLang = $session->read('requestedLanguage');
		if(!isset($currentLang) && empty($currentLang)){

			$this->setGuestStore("en","Guests","index");
		}

		

		$UserBlogsModel = TableRegistry::get('UserBlogs');
		//$blogsInfo = $UserBlogsModel->find('all',['contain'=>'Users']);//->toArray();
		/* $blogsInfo = $UserBlogsModel->find('all', ['conditions' =>['UserBlogs.featured' =>1],'order' => [
																	'UserBlogs.modified' => 'desc'
																]])->toArray(); */
		
		$blogsInfo = $UserBlogsModel->find('all', ['order' => ['UserBlogs.modified' => 'desc']]) ->limit(3)->where(['UserBlogs.featured' =>1])->where(['UserBlogs.status' =>1])->toArray();
		//pr($blogsInfo); die;
		$this->set('blogsInfo',$blogsInfo);
		
        

        //Fetch data how works
		$worksModel = TableRegistry::get('HowWorks');
		$workdata = $worksModel->find('all', ['conditions' =>['HowWorks.category' => 'How_it_works']])->order(['modified'=>'desc']) ->limit(3)->where(['status' => 1])->toArray();
		$this->set('works_data',$workdata);

		//Fetch data why choose
		$chooseData = $worksModel->find('all',['conditions'=>['HowWorks.category'=>'why_choose_us']])->order(['modified'=>'desc']) ->limit(4)->where(['status' => 1])->toArray();
		$this->set('choose_data',$chooseData);

		//Fetch data news updates
		$news_data = $worksModel->find('all',['conditions'=>['HowWorks.category'=>'news_updates']])->order(['modified'=>'desc']) ->limit(3)->where(['status' => 1])->toArray();
		$this->set('news_data',$news_data);
		
	}
	
	/**
	* Function of guest login
	*/
	function login()
	{
		$this->viewBuilder()->layout('landing');
		// Loaded Admin Model
		$UsersModel = TableRegistry::get('Users');
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UsersModel);
		//CODE FOR MULTILIGUAL END
		$UserData = $UsersModel->newEntity();
		$this->request->data = @$_REQUEST;
		
	    if(isset($this->request->data['Users']['email']) && !empty($this->request->data['Users']['email']))
		{
			
			$data=$this->request->data;
			$error=$this->validate_login($data);
			
			if(count($error) == 0)
			{
				$session = $this->request->session();
				$email = trim($this->request->data['Users']['email']);
				$password = md5(trim($this->request->data['Users']['password']));
				$getValidUserData = 	$UsersModel->find('all',
											['conditions' => ['Users.email' => $email,'Users.password' => $password,'status'=>'1']]
										);

				if($getValidUserData->count()>0)
				{
					$getUserData =  $getValidUserData->first();
					$UserData->id = $getUserData->id;
					$UserData->last_login = date('Y-m-d h:i:s');
					$UserData->avail_status = "Login";
				 
					$UsersModel->save($UserData);
				 
					$session->write('User.id', $getUserData->id);
					$session->write('User.email', $getUserData->email);
					$session->write('User.name', $getUserData->first_name." ".$getUserData->last_name);
					$session->write('User.facebook_id', $getUserData->facebook_id);
					$session->write('User.is_image_uploaded', $getUserData->is_image_uploaded);
					$session->write('User.image', $getUserData->image);
					$session->write('User.last_login', $getUserData->last_login);
					$this->setSuccessMessage($this->stringTranslate(base64_encode('You have successfully logged in.')));
					if ($this->request->is('ajax')) {
					  	echo 'Success:'.$this->stringTranslate(base64_encode('Successfully Authenticated, Please wait..'));
					  	 //echo "<pre>";print_r($session->read('User')); die;
					  	die;
					}else{
						return $this->redirect(['controller' => 'Guests', 'action' => 'home']);	
						}
				}else{
						if ($this->request->is('ajax')) {
						  	echo 'Error:'.$this->stringTranslate(base64_encode('Authentication Failed! Please try again.'));
						  	die;
						}else{
							$this->setErrorMessage($this->stringTranslate(base64_encode('Authentication Failed! Please try again.')));
						}
			
				}

			}else{
				$this->set('loginerror',$error);
				$this->set('totalError',count($error));
				$this->set('signupdata',$data);
			}

		}
			$fb = new \Facebook\Facebook([
			'app_id' => FACEBOOK_APP_ID, // Replace {app-id} with your app id
			'app_secret' => FACEBOOK_SECRET,
			'default_graph_version' => 'v2.2',
			]);

			$helper = $fb->getRedirectLoginHelper();

			$permissions = ['email']; // Optional permissions
			$loginUrl = $helper->getLoginUrl(HTTP_ROOT.'guests/signup-with-facebook', $permissions);


			$this->set('loginWithFacebook', '<a class="signup-fb" href="' . htmlspecialchars($loginUrl) . '"><i class="fa fa-facebook-square"></i> Signup with Facebook!</a>');
	        $this->set('facebookUrl',$loginUrl);
	        
	
	}
	
	/**Function for Validate Lgon data
	*/
	function validate_login($data)
	{
		$errors=array();
		//Validation for email
		if(trim($data['Users']['email'])=='')
		{
			$errors['email'][]=$this->stringTranslate(base64_encode("This is required field"))."\n";
		}
		else
		{
			$checkEmail=explode('@',$data['Users']['email']);
			if($this->isValidEmail($data['Users']['email'])==0){
				$errors['email'][] = $this->stringTranslate(base64_encode("Please enter a valid email address"))."\n";
			}
		}
		
		//Validation for password
		if(trim($data['Users']['password'])=='')
		{
			$errors['password'][]=$this->stringTranslate(base64_encode("This is required field"))."\n";
		}		
		return $errors;
	}
	
	/**Function for forgot password
	*/
	function forgotPassword(){
		
		$this->viewBuilder()->layout('landing');
		// Loaded Admin Model
		$UsersModel = TableRegistry::get('Users');
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UsersModel);
		//CODE FOR MULTILIGUAL END
		
		$this->request->data = @$_REQUEST;
				//echo "<pre>";print_r($this->request->data['Users']['email']);die;
		if(isset($this->request->data['Users']['email']) && !empty($this->request->data['Users']['email'])){
	
			$getUserData = $UsersModel->find('all',['conditions' => ['Users.email' => $this->request->data['Users']['email']]])->first();
			//echo "<pre>";print_r($getUserData);die;	
              
			if(empty($getUserData)){
				$this->setErrorMessage($this->stringTranslate(base64_encode("Email id not register with us, try again")));

			    echo "Error:".$this->stringTranslate(base64_encode("Email id not register with us, try again")); die;
			}else{
			    $UserData = $UsersModel->newEntity();
			    $UserData->id = $getUserData->id;
				$new_password = $this->RandomStringGenerator(8);
				$UserData->pwd_token = md5($new_password);
				
             
					//echo "<pre>";print_r($UserData);die;
                if($UsersModel->save($UserData))
				{
					
					$uid = base64_encode($getUserData->email);
					$link = HTTP_ROOT.'Guests/reset-password/'.$uid.'/'.$UserData->pwd_token;
					$linkOnMail = '<a href="'.$link.'" target="_blank">'.$this->stringTranslate(base64_encode("Click Here For Reset Password")).'.</a>';
					
					$replace = array('{fullname}','{email}','{link}');
					if($getUserData->first_name !='' || $getUserData->last_name !=""){
						$name = $getUserData->first_name." ".$getUserData->last_name;
					}else{
						$name = "Guest";
					}
					$with = array($name,$getUserData->email, $linkOnMail);
					
					$this->send_email('',$replace,$with,'forgot_password',$getUserData->email);		
				        echo 'Success:'.$this->stringTranslate(base64_encode("Email has been sent to your email address"));
						$this->setSuccessMessage($this->stringTranslate(base64_encode('Password reset link has been sent over registered email address.')));
	                    die;			     
				}
                //return $this->redirect(['controller' => 'Guests', 'action' => 'home']);
			}
		}/*else{
			 echo "Error:Kindly enter email id";
			 die;
		}*/
	}
	
	/**Function for Reset Password
	*/ 
	function resetPassword($uid=null,$key = null)
	{
		$this->viewBuilder()->layout('landing');
		// Loaded Admin Model
		//echo $uid.'ok'.$key;die;
		$UsersModel = TableRegistry::get('Users');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UsersModel);
		//CODE FOR MULTILIGUAL END
		
		$UserData = $UsersModel->newEntity();
		$this->request->data = @$_REQUEST;
		//echo "<pre>";print_r(@$_REQUEST);die;
		$uid = base64_decode($uid);
		//pr($uid);die;
		if($uid !=""){
			$this->set("email",$uid);
		}else{
			$uid = $this->request->data['Users']['email'];
			$this->set("email",$uid);
		}
		
		if($key !=""){
			$this->set("key",$key);
		}else{
			$key = $this->request->data['Users']['key'];
			$this->set("key",$key);
		}
		
		$count=$UsersModel->find("all",["conditions"=>['Users.email'=>$uid,'Users.pwd_token'=>$key]])->first();
		
		if(isset($count->email) &&  $count->pwd_token==$key)
		{

			if(isset($this->request->data['Users']) && !empty($this->request->data['Users'])){
			
				$data = $this->request->data;
				$error=$this->validate_resetPwd($data);
				if(count($error) == 0)
				{
				
					$UserData->password = md5($this->request->data['Users']['password']);
					$UserData->org_password =$this->data['Member']['password'];
					$UserData->status = 1;
					$UserData->pwd_token = '';
					$UserData->id = $count->id;
					
					$UsersModel->save($UserData);              
					
					$replace = array('{full_name}');
					$with = array($count->first_name." ".$count->last_name);
					$this->send_email('',$replace,$with,'user_reset_password',$count->email);
					
					$this->setSuccessMessage($this->stringTranslate(base64_encode("Password has been reset successfully")));
					echo "Success:".$this->stringTranslate(base64_encode("Password has been reset successfully")); die;
			       //return $this->redirect(['controller' => 'Guests', 'action' => 'home']);
				
				}else{
					$this->set('loginerror',$error);
					$this->set('totalError',count($error));
					$this->set('signupdata',$data);
				}
			}	
		}else{
			$this->setErrorMessage($this->stringTranslate(base64_encode("Reset password link has been expired")));
			return $this->redirect(['controller' => 'Guests', 'action' => 'home']);
		}
		//$this->render('home');
	}
	
	/**
	* Function for Validate RESET PASSWORD
	*/
	function validate_resetPwd($data)
	{
		
		$errors=array();
				
		if(trim($data['Users']['password'])=="")
		{
			$errors['password'][]=$this->stringTranslate(base64_encode("Please enter your password"))."\n";
		}
		else 
		{
			$length=strlen($data['Users']['password']);
			if($length < 6)
			{
				$errors['password'][]=$this->stringTranslate(base64_encode("Please enter minimum 6 characters"))."\n";
			}
		}
		if(trim($data['Users']['re_password'])=="")
		{
			$errors['re_password'][]=$this->stringTranslate(base64_encode("Please enter your Confirm password"))."\n";
		}
		else 
		{
			if($data['Users']['password'] != $data['Users']['re_password'])
			{
				$errors['re_password'][]=$this->stringTranslate(base64_encode("Password does not match"));
			}
		}	
		
		return $errors;
	}
	
	/**Function for logout
	*/	
	function logout(){
		
		// Loaded Session Component
		$session = $this->request->session();
		
		$UsersModel = TableRegistry::get('Users');
		
		$getUserData = $UsersModel->find('all',['conditions' => ['Users.id' => $session->read('User.id')]])->first();
		
		$UserData = $UsersModel->newEntity();
		$UserData->id = $getUserData->id;
		$UserData->last_login = date('Y-m-d h:i:s');
		$UserData->avail_status = "Logout";
		
		$UsersModel->save($UserData);
		
		$session->delete('User');
		$session->delete('requestedLanguage');
		$session->delete('setRequestedLanguageLocale');
		return $this->redirect(['controller' => 'guests']);
	}
		
	/**Function for Login page
	*/
	function signup()
	{
		$this->viewBuilder()->layout('landing');
		$error=array();
		$captchErr="";
		$this->request->data = @$_REQUEST;

		if(isset($this->request->data['signup-submit']) && $this->request->data['signup-submit']=='Sign Up')
		{ 
			
			
			  if(isset($this->request->data['g-recaptcha-response']) && !empty($this->request->data['g-recaptcha-response'])){
					//your site secret key
					$secret = CAPTCHA_SECRET_KEY;
					//get verify response data
					$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$this->request->data['g-recaptcha-response']);
					$responseData = json_decode($verifyResponse);
                    if($responseData->success){

						$this->request->data['Users']['password'] = $this->request->data['Users']['create_password'];
						unset($this->request->data['Users']['create_password']);

						$data=$this->request->data;
						
						$error=$this->validate_register($data);
						//echo "<pre>";print_r($error);die;
						if(count($error) == 0)
						{
							// Loaded Users Model
							$UsersModel = TableRegistry::get('Users');
							
							// Code for Reference Code Activation
							$referenceCodeFlag = false;
							if(!empty($this->request->data['Users']['reference_code'])){
								$referenceCode = $this->request->data['Users']['reference_code'];
								$referenceCodeFlag = true;
								unset($this->request->data['Users']['reference_code']);
							}else{
								unset($this->request->data['Users']['reference_code']);	
							}
							
							$UsersData = $UsersModel->newEntity($this->request->data['Users'],['validate' => true]);
							//CODE FOR MULTILIGUAL START
							$session = $this->request->session();
							$UsersModel->_locale = $session->read('requestedLanguage');
							//CODE FOR MULTILIGUAL END

							$passwordOrg = $this->request->data['Users']['password'];
							
							$activation_key = md5(microtime());							
							$UsersData->password = md5($passwordOrg);
							//SET CUSTOM VARIABLES FOR SAVE
							$UsersData->org_password = $passwordOrg;
							$UsersData->activation_key = $activation_key;								
							$UsersData->date_added=date('Y-m-d H:i:s');	
							$UsersData->date_modified = date('Y-m-d h:i:s');				
							$latitude = $this->request->data['Users']['country'];				
							$longitude = $this->request->data['Users']['zip'];	
							//echo $latitude.$longitude;die;
							// get latitude and longitude from country and zip start	
							$sourceSelectedLocation = $latitude." ".$longitude;
							$url = "http://maps.google.com/maps/api/geocode/json?address=".urlencode($sourceSelectedLocation)."&sensor=false";
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
							$response = curl_exec($ch);
							curl_close($ch);
							$response_a = json_decode($response);
							$sourceLocationLatitude = $response_a->results[0]->geometry->location->lat;
							$sourceLocationLongitude = $response_a->results[0]->geometry->location->lng;
							$UsersData->latitude=$sourceLocationLatitude;					
							$UsersData->longitude=$sourceLocationLongitude;					
							// end get latitude and longitude from country and zip start			
							$UsersData->status = 0;
							//pr($UsersData);die;
							if($UsersModel->save($UsersData))
							{
								$getUsersTempId1 = $UsersData->id;
								
								$uid = base64_encode($this->request->data['Users']['email']);
								$link = HTTP_ROOT.'guests/activation/'.$uid.'/'.$activation_key.'/success:registerSuccess';
								$linkOnMail = '<a href="'.$link.'" target="_blank">'.$this->stringTranslate(base64_encode('Click Here For Activate Your Account')).'</a>';
								
								$replace = array('{full_name}','{email}','{link}');
								$with = array($this->request->data['Users']['first_name'],$this->request->data['Users']['email'],$linkOnMail);
								
								// Code for Reference Code Activation
								if ($referenceCodeFlag) {
									$referencesModel = TableRegistry::get('UserReferences');
									$checkReference = $referencesModel->find('all',[
										'conditions'=>[
											'UserReferences.reference_code' => $referenceCode, 
											'UserReferences.status' => 0, 
											'UserReferences.email' => $this->request->data['Users']['email']
										]])->toArray();
										
									if (count($checkReference)) { // if reference code present change status to 1
										$referenceData = $referencesModel->newEntity();
										$referenceData -> id = $checkReference[0]->id; 
										$referenceData -> status = 1;		
										$referencesModel->save($referenceData);
										
										// updating the reference money
										$referenceMoneyData = $UsersModel->newEntity();
										$referUserData = $UsersModel->get($checkReference[0]->user_id);
										$referConfigAmount = 20;
										$newReferAmount = $referUserData->refer_amount + $referConfigAmount;
										
										$referenceMoneyData->id = $checkReference[0]->user_id;
										$referenceMoneyData->refer_amount = $newReferAmount;
										$UsersModel->save($referenceMoneyData);
										
									}
									
							
								}
								
								$this->send_email('',$replace,$with,'new_registration',$this->request->data['Users']['email'],'');
								
								$userInfo = $UsersModel->get($getUsersTempId1);
								//$this->UsersessionSet($userInfo);
								
								
								if ($this->request->is('ajax')) {
										echo "Success:".$this->stringTranslate(base64_encode(SIGN_UP)).":guests/login";
										$this->setSuccessMessage($this->stringTranslate(base64_encode(SIGN_UP)));
										die;
									}else{
										$this->setSuccessMessage($this->stringTranslate(base64_encode(SIGN_UP)));
								return $this->redirect(['controller' => 'guests', 'action' => 'login']);		
								//die;
									}
							 
								
							} else{
								
								$this->set('loginerror',$this->Member->validationErrors);
								$this->set('totalError',count($this->Member->validationErrors));
								$this->set('signupdata',$data);
							} 
						}
					}else{
						$captchErr = $this->stringTranslate(base64_encode('Robot verification failed, please try again'));
					}
				}else{
					$captchErr = $this->stringTranslate(base64_encode('Please click on the reCAPTCHA box'));
				}
			}else{
					
				$this->set('loginerror',$error);
				$this->set('totalError',count($error));
				$this->set('signupdata',@$data);
			}
			$this->set('captchErr',@$captchErr);
			
			$fb = new \Facebook\Facebook([
			'app_id' => FACEBOOK_APP_ID, // Replace {app-id} with your app id
			'app_secret' => FACEBOOK_SECRET,
			'default_graph_version' => 'v2.2',
			]);

			$helper = $fb->getRedirectLoginHelper();

			$permissions = ['email']; // Optional permissions
			$loginUrl = $helper->getLoginUrl(HTTP_ROOT.'guests/signup-with-facebook', $permissions);


			$this->set('signupWithFacebook', '<a href="' . htmlspecialchars($loginUrl) . '"><i class="fa fa-facebook-square"></i> Signup with Facebook!</a>');
	        $this->set('facebookUrl',$loginUrl);
	}
	/**
    Function for signin
	*/	
	/*function signin(){
		$this->viewBuilder()->layout('landing');
	}*/
	
	
	//dummy
	/* function dummy(){
		
		echo $cdate= date("Y-m-d");
     $your_date = strtotime("1998-04-29");
     $datediff =strtotime($cdate)-$your_date;
     $days=floor($datediff/(60*60*24));
	 echo $days;
	if($days < 6574){
		echo "<br>";
		echo "You are under eighteen";
	}
	else{
		echo "<br>";
		echo "You are above eighteen";
	}
	} */
	
	
    /**Function for Validate SIGN UP
	*/
	function validate_register($data)
	{
	//echo "okok"; pr($data);die;
		$errors=array();
		//Validation for first name
		if(trim($data['Users']['first_name'])=='')
		{
			//echo "empty";die;
			$errors['first_name'][]= $this->stringTranslate(base64_encode("This is required field"))."\n";
		}else{
			if(is_numeric($data['Users']['first_name'])){
				$errors['first_name'][]= $this->stringTranslate(base64_encode("First name should be alphabatic"))."\n";
			}
		}
		
		//Validation for last name
		if(trim($data['Users']['last_name'])=='')
		{
			$errors['last_name'][]=$this->stringTranslate(base64_encode("This is required field"))."\n";
		}else{
			if(is_numeric($data['Users']['last_name'])){
				$errors['last_name'][]=$this->stringTranslate(base64_encode("Last name should be alphabatic"))."\n";
			}
		}

		//Validation for email
		if(trim($data['Users']['email'])=='')
		{
			$errors['email'][]=$this->stringTranslate(base64_encode("This is required field"))."\n";
		}
		else
		{
			$checkEmail=explode('@',$data['Users']['email']);
			if($this->isValidEmail($data['Users']['email'])==0){
				$errors ['email'] [] =$this->stringTranslate(base64_encode("Please enter valid email"))."\n";
			}else{
				if($this->isUniqueEmail($data['Users']['email'])=='false'){
					$errors ['email'] [] = $this->stringTranslate(base64_encode("Email already exists"))."\n";
				}
			}
		}
		//Validation for password
		if(trim($data['Users']['password'])=='')
		{
			$errors['password'][]=$this->stringTranslate(base64_encode("This is required field"))."\n";
		}
		
		if(trim($data['Users']['re_password'])=='')
		{
			$errors['re_password'][]=$this->stringTranslate(base64_encode("This is required field"))."\n";
		}
		if(trim($data['Users']['password'])!='' && trim($data['Users']['re_password'])!=''){
			if(trim($data['Users']['password']) != trim($data['Users']['re_password'])){
				$errors['re_password'][]=$this->stringTranslate(base64_encode("Password does not matched"))."\n";
			}
		}
		//pr($errors);die;
		return $errors;
	}
		
	/**Function for member activation
	*/ 
	function activation($uid=null,$key = null)
	{
		$session = $this->request->session();
		$this->viewBuilder()->layout('landing');
		
		$uid = base64_decode($uid);
		$UsersModel = TableRegistry::get('Users');
		$userData= $UsersModel->newEntity();
		$countRec = $UsersModel->find('all',['conditions' => ['Users.email' => $uid,'Users.activation_key' => $key]])->count();
		$count = $UsersModel->find('all',['conditions' => ['Users.email' => $uid,'Users.activation_key' => $key]])->first();
		
		if($countRec>0){
			if($count->email !="" &&  $count->activation_key==$key)
			{   
				
				$userData->logged_intime = date('Y-m-d H:i:s');
				$userData->id = $count->id;
				$userData->status=1;
				$userData->activation_key="";
				
				$UsersModel->save($userData);
			   
				$replace = array('{full_name}');
				$with = array($count->first_name." ".$count->last_name);
				$this->send_email('',$replace,$with,'account_activated',$count->email);
				//$session->write('success', ACTIVATE_ACCT);
				$this->setSuccessMessage($this->stringTranslate(base64_encode(ACTIVATE_ACCT)));
				
			}
		}else{
			$this->setErrorMessage($this->stringTranslate(base64_encode("Activation link has been expired")));
			 //$session->write('error', "Activation link has been expired.");
		}
		return $this->redirect(['controller' => 'guests', 'action' => 'home']);			
	}
	/**
      function for subscribe 
	*/	
     function subscribe(){
     	//echo "ok result";die;
       $SubscribesModel = TableRegistry::get('Subscribes');

		$this->request->data = @$_REQUEST;
		
		if(isset($this->request->data['Subscribes']['email']) && !empty($this->request->data['Subscribes']['email'])){
			//echo $this->request->data['Subscribes']['email'];die;
			$getSubscribeData = $SubscribesModel->find('all',['conditions' => ['Subscribes.email' => $this->request->data['Subscribes']['email']]])->first();
				
			if(!empty($getSubscribeData)){

			   echo "Error:".$this->stringTranslate(base64_encode("Email already exists"));
               $this->setErrorMessage($this->stringTranslate(base64_encode("Email already exists")));
			   die;
			}else{
				$SubscribeData = $SubscribesModel->newEntity();
                $SubscribeData->email = $this->request->data['Subscribes']['email']; 
                if($SubscribesModel->save($SubscribeData))
				{
					$replace = array('{message}');
				    $with = array($this->request->data['Subscribes']['email']);
						
					echo 'Success:'.$this->stringTranslate(base64_encode("You have been subscribe successfully"));
					$this->setSuccessMessage($this->stringTranslate(base64_encode("You have been subscribe successfully")));
					$this->send_email('',$replace,$with,'subscribe_confirmation',$this->request->data['Subscribes']['email'],'');
				}
				die;
            }
		
     } 
  }/**
                 
  */
  function subscriberEmailExists(){

		$SubscribesModel = TableRegistry::get('Subscribes');
		if(@$_REQUEST['Subscribes']['email']!='')
		{
			$email = $_REQUEST['Subscribes']['email'];
		}
		$getData = $SubscribesModel->find('all',['conditions' => ['Subscribes.email' => $email]])->count();
		
		if ($getData>0) {
			 $ret = 'false';
		} else { 
			  $ret = 'true';//Email not exiting in out database error display 
		} 
		if($this->request->is('ajax')){
			echo $ret;die;
		
		}else{
			return $ret;
		
		}
  }
  function verifySite($recaptcha)
  {
	 $recaptchaAuthUrl="https://www.google.com/recaptcha/api/siteverify";
	 $secret='6Led9RkTAAAAAJ_YhXH6_jy-9bkTFZFph5nRB9l3';
	 $remoteip=$_SERVER['REMOTE_ADDR'];
	 $url=$recaptchaAuthUrl."?secret=".$secret."&response=".$recaptcha."&remoteip=".$remoteip;
	 $curl = curl_init();
	 curl_setopt($curl, CURLOPT_URL, $url);
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	 curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
	 $res = curl_exec($curl);
	 curl_close($curl);
	 return $res;
	}
	
	/**Function for Login page
	*/
	function signupWithFacebook()
	{
		if(isset($this->request->query['error'])){
			$this->setErrorMessage($this->request->query['error_description'].", Kindly try later.");
			return $this->redirect(['controller' => 'guests', 'action' => 'home']);			
		}
		
		$fb = new \Facebook\Facebook([
		  'app_id' => FACEBOOK_APP_ID, // Replace {app-id} with your app id
		  'app_secret' => FACEBOOK_SECRET,
		  'default_graph_version' => 'v2.5',
		  ]);
		
		$helper = $fb->getRedirectLoginHelper();
		$accessToken = $helper->getAccessToken();
		$fb->setDefaultAccessToken($accessToken);
		
		$response = $fb->get('/me?fields=first_name, last_name, picture, email');
		$userNode = $response->getGraphUser();
		
		
		$UsersModel = TableRegistry::get('Users');
		$UsersData = $UsersModel->newEntity();
		
		$passwordOrg = $this->RandomStringGenerator(15);
		$UsersData->password = md5($passwordOrg);
		
		//SET CUSTOM VARIABLES FOR SAVE
		$UsersData->org_password = $passwordOrg;
		$UsersData->date_added=date('Y-m-d H:i:s');					
		$UsersData->status = 0;
		
		$fname = $userNode->getProperty('first_name');
		$lname = $userNode->getProperty('last_name');
		$email = $userNode->getProperty('email');
		$fbId  = $userNode->getProperty('id');
		
		$UsersData->first_name = $fname;
		$UsersData->last_name = $lname;
		$UsersData->is_image_updated = 0;
		$UsersData->email = $email;
		$UsersData->is_image_uploaded = 0;
		$UsersData->facebook_id = $fbId;
		$UsersData->image = "https://graph.facebook.com/".$fbId."/picture";
		
		if($this->isUniqueEmail($email)==1){
			if($UsersModel->save($UsersData))
			{
				$getUsersTempId1 = $UsersData->id;
									
				$replace = array('{full_name}','{email}','{password}');
				$with = array($fname." ".$lname,$email,$passwordOrg);
				
				
				$this->send_email('',$replace,$with,'signup_with_facebook',$email,'');
				
				$userInfo = $UsersModel->get($getUsersTempId1);
				$this->UsersessionSet($userInfo);
				$this->setSuccessMessage(SIGN_UP);
				return $this->redirect(['controller' => 'guests', 'action' => 'home']);		
				
			}
		}else{
			
				$session = $this->request->session();
				$email = trim($email);
				$getValidUserData = $UsersModel->find('all',
											['conditions' => ['Users.email' => $email]]
									);

				if($getValidUserData->count()>0)
				{
					$getUserData =  $getValidUserData->first();
					$myLoginInfo = $UsersModel->newEntity();
					
					$myLoginInfo->id = $getUserData->id;
					$myLoginInfo->last_login = date('Y-m-d h:i:s');
				 	$UsersModel->save($myLoginInfo);
				 
					$session->write('User.id', $getUserData->id);
					$session->write('User.email', $getUserData->email);
					$session->write('User.name', $getUserData->first_name." ".$getUserData->last_name);
					$session->write('User.image', $getUserData->image);
					$session->write('User.last_login', $getUserData->last_login);
					$this->setSuccessMessage($this->stringTranslate(base64_encode('You have successfully logged in')));
					return $this->redirect(['controller' => 'Guests', 'action' => 'home']);	
					
				}else{
					$this->setErrorMessage($this->stringTranslate(base64_encode('Authentication Failed! Please try again')));
				}
			
		}
		$this->render("signup");
		
	}
	
	public function checkDevice() {
		
		$this->loadComponent('MobileDetect');
		
		// Any mobile device (phones or tablets).
		if( $this->MobileDetect->isMobile() ){
			$detect= "mobile";	
		} else {
			$detect= "desktop";
		}
		$this->set('detect',$detect);
	}


}
?>
