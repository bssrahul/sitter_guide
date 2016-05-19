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
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
use Cake\Network\Email\Email;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller{
     /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
		parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		
		 //GET LOCALE VALUE
		$session = $this->request->session();
		$setRequestedLanguageLocale  = $session->read('setRequestedLanguageLocale'); 
		I18n::locale($setRequestedLanguageLocale);
		if($session->read("requestedLanguage")==""){

			$this->setGuestStore("en");
		}

		//$setRequestedLanguageLocale  = $session->read('setRequestedLanguageLocale');
		$currentLocal = substr($setRequestedLanguageLocale,0,2);
		$this->set('currentLocal', $currentLocal);
		
		//FOR FAVICON AND SITE LOGO
		$ConfingModel=TableRegistry::get("site_configurations");
		$ConfingData=$ConfingModel->find('all')->toArray();
		$sitelogo=$ConfingData[0]['site_logo'];
		$sitefavicon=$ConfingData[0]['site_favicon'];
		$this->set('sitelogo',$sitelogo);
		$this->set('sitefavicon',$sitefavicon);
	}
	
	
     /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
	
	/** Function for display error message
	*/
	function setErrorMessage($msg=null){
		$session = $this->request->session();
		$session->write('success','');
		$session->write('error',$msg);
	}
	/**Function for display success message
	*/
	function setSuccessMessage($msg=null){

		$session = $this->request->session();  
		$session->write('error','');
		$session->write('success',$msg);
	}
	
	/** Function for set language locale as per language selection on front end
	*/
	public function setGuestStore($langCode=null,$controller='Guests',$action='index'){

		//CHANGES REQUEST LANGUAGE SESSION AND LOCALE
		$languageSession = $this->request->session();
		
		//$langCode return en|fr|de|es|hu|it|ro|ru
		if(isset($langCode) && $langCode !=""){
			
			
			$requestedLanguage = $langCode;
			
			if($requestedLanguage=="en"){
			
				$setRequestedLanguageLocale = $requestedLanguage."_US";
			
			}else if($requestedLanguage=="sp"){
			
				$setRequestedLanguageLocale = "es_ES";
			
			}else{
			
				$setRequestedLanguageLocale = $requestedLanguage."_".strtoupper($requestedLanguage);
			}
			$languageSession->write('Config.language', $requestedLanguage);
			$languageSession->write('requestedLanguage', $requestedLanguage);
			$languageSession->write('setRequestedLanguageLocale', $setRequestedLanguageLocale);		
			
		}else{
			$setRequestedLanguageLocale = "en_US";
			$requestedLanguage="en";
			$languageSession->write('Config.language', $requestedLanguage);
			$languageSession->write('requestedLanguage', $requestedLanguage);
			$languageSession->write('setRequestedLanguageLocale', $setRequestedLanguageLocale);
		}
		
		I18n::locale($setRequestedLanguageLocale);
		if (strpos($action,'edit') != false) {
			return $this->redirect(['controller'=>$controller,'action' => 'index' ]);
		}else{
		   return $this->redirect(['controller'=>$controller,'action' => $action]);
		}
	}	
	
	/** Function for display error message
	*/
	function displayErrorMessage($msg=null){
		//echo $msg;
		$session = $this->request->session();
		//$session->write('success','');
		$session->write('error',$msg);
	}
	/**Function for display success message
	*/
	function displaySuccessMessage($msg=null){
		$session = $this->request->session();  
		//$session->write('error','');
		$session->write('success',$msg);
	}
	
	/**Function for set language locale as per language selection on admin end
	*/
	public function setYourStore($langCode=null,$controller='users',$action='dashboard'){
	
		//CODE FOR MULTILIGUAL WEBSITE
		//CHANGES REQUEST LANGUAGE SESSION AND LOCALE
		$languageSession = $this->request->session();
		if(isset($langCode) && $langCode !=""){
			
			//$this->request->params['language'] return en|fr|de|es|hu|it|ro|ru
			$requestedLanguage = $langCode;
			
			if($requestedLanguage=="en"){
			
				$setRequestedLanguageLocale = $requestedLanguage."_US";
			
			}else if($requestedLanguage=="sp"){
			
				$setRequestedLanguageLocale = "es_ES";
			
			}else{
			
				$setRequestedLanguageLocale = $requestedLanguage."_".strtoupper($requestedLanguage);
			}
			$languageSession->write('Config.language', $requestedLanguage);
			$languageSession->write('requestedLanguage', $requestedLanguage);
			$languageSession->write('setRequestedLanguageLocale', $setRequestedLanguageLocale);		
			
		}else{
			$setRequestedLanguageLocale = "en_US";
			$requestedLanguage="en";
			$languageSession->write('Config.language', $requestedLanguage);
			$languageSession->write('requestedLanguage', $requestedLanguage);
			$languageSession->write('setRequestedLanguageLocale', $setRequestedLanguageLocale);
		}
		
		I18n::locale($setRequestedLanguageLocale);
		
		if ((strpos($action,'edit') === false) && (strpos($action,'add') === false)) {
		
			return $this->redirect(['controller'=>$controller,'action' => $action]);
		}
		else{
			$this->Flash->success(__('Kindly select language first, After that  try to add/edit action'));
			return $this->redirect(['controller'=>"users",'action' => 'dashboard' ]);
		}
	}
	
	/**
	* Function for Upload Image
	*/
	function admin_upload_file($type = NULL, $FileArr = array())
	{
	
		$this->loadComponent('Resize');
		$this->viewBuilder()->layout('');
		$this->autoRender=false;
		
		if($FileArr['name']!="")
		{
			if($type == 'logo')
			{
				$uploadFolder="uploads";	
				$logoWidth = "153";
				$logoHeight = "25";
				$logoSize="2097152";
				$logoKb = '2 MB';
			}
			else if($type == 'favicon')
			{
				$uploadFolder="uploads";	
				$logoWidth = "24";
				$logoHeight = "25";
				$logoSize="2097152";
				$logoKb = '2 MB';
			}else if($type == 'profilePic')
			{
				$uploadFolder="uploads";	
				$logoWidth = "400";
				$logoHeight = "400";
				$logoSize="4194304";
				$logoKb = '4 MB';
			}else if($type == 'profileBanner')
			{
				$uploadFolder="uploads";	
				$logoWidth = "1920";
				$logoHeight = "551";
				$logoSize="4194304";
				$logoKb = '4 MB';
			}
			else if($type == 'profileVideoImg')
			{
				$uploadFolder="uploads";	
				$logoWidth = "1000";
				$logoHeight = "372";
				$logoSize="4194304";
				$logoKb = '4 MB';
			}
			else if($type == 'petImage')
			{
				$uploadFolder="petImages";	
				$logoWidth = "400";
				$logoHeight = "400";
				$logoSize="4194304";
				$logoKb = '4 MB';
			}
			else if($type == 'sitterGallery')
			{
				$uploadFolder="uploads";	
				$logoWidth = "800";
				$logoHeight = "550";
				$logoSize="4194304";
				$logoKb = '4 MB';
			}
			else if($type == 'categoryImg')
			{
				$uploadFolder="uploads";	
				$logoWidth = "400";
				$logoHeight = "400";
				$logoSize="4194304";
				$logoKb = '4 MB';
			}
			else if($type == 'blogsImg')
			{
				$uploadFolder="uploads";	
				$logoWidth = "940";
				$logoHeight = "530";
				$logoSize="4194304";
				$logoKb = '4 MB';
			
			}else if($type == 'staticBannerImg')
			{
				$uploadFolder="uploads";	
				$logoWidth = "1920";
				$logoHeight = "350";
				$logoSize="5242880";
				$logoKb = '5 MB';
			}
			else if($type == 'sliderImg')
			{
				$uploadFolder="uploads";	
				$logoWidth = "400";
				$logoHeight = "400";
				$logoSize="4194304";
				$logoKb = '4 MB';
			}
			else if($type == 'audio' || $type == 'video')
			{
				//echo 'okokok'.$type;die;
				//pr($FileArr); die;
				$imgName = pathinfo($FileArr['name']);
				$file = $FileArr;
				$fileName = $FileArr['name'];
				$ext = trim(substr($fileName, strrpos($fileName,'.')));
				
				$explodeExt = explode('.',$fileName);
				$explodeExt =  end($explodeExt);
				if($type == 'audio')
				{
					$uploadFolder= "files/audio";	
					$fileSize= "5242880";
					$fileKb = "5 MB";
					$extCheckArr = array('mp3','ogg','wma');	
				}
				else
				{

					$uploadFolder="files/video";	
					$fileSize= "52428800"; //10485760";
					$fileKb = "50 MB"; //'10 MB';
					$extCheckArr = array('mp4','ogg','wmv');	
				}
				
				if(in_array($explodeExt,$extCheckArr))
				{
					
					if($FileArr['size'] <= $fileSize)
					{
						$fileName = $this->RandomStringGenerator(15);
						$destination = realpath('../webroot/'.$uploadFolder).'/'.$fileName.$ext;
						$src = $FileArr['tmp_name'];
												
						//echo "path".$destination;die;
						if(move_uploaded_file($FileArr['tmp_name'],$destination))
						{
							$return = "success:".$fileName.$ext.":uploaded";
							return $return;
						}
					}
					else
					{
						$return = "error:File size should be less than $fileKb";
						return $return;
					}
				}
				else
				{
					$extCheckStr = implode(',',$extCheckArr);
					$return = "error:Only ".strtoupper($extCheckStr)." files are allowed!";
					//echo "oko".$return;die;
					return $return;exit();
				}
			}
			else
			{
				$uploadFolder="uploads";	
				$logoWidth = "400";
				$logoHeight = "400";
				$logoSize="2097152";
				$logoKb = "2 MB";
			}
			
			
			
			$imgName = pathinfo($FileArr['name']);
			$file = $FileArr;
			$image = $FileArr['name'];
			$ext = trim(substr($image, strrpos($image,'.')));
			
			$explodeExt = explode('.',$image);
			$explodeExt =  end($explodeExt);
			
		
			if($explodeExt=='jpg' || $explodeExt=='jpeg' || $explodeExt=='png' || $explodeExt=='gif' || $explodeExt=='bmp')
			{
				
				if($FileArr['size'] <= $logoSize)
				{
					$image = $this->RandomStringGenerator(15);
					$destination = realpath('../webroot/img/'.$uploadFolder).'/'.$image.$ext;
					$src = $FileArr['tmp_name'];
					//echo $destination;die;
					list( $width, $height, $source_type ) = getimagesize($src);	
					
					if($width == $logoWidth && $height == $logoHeight)
					{
						
						move_uploaded_file($FileArr['tmp_name'],$destination);
						$imgStatus = 1;
						
					}else{
						
						$this->Resize->resize($FileArr['tmp_name'],$destination,'as_define',$logoWidth,$logoHeight,0,0,0,0);
						$imgStatus = 2;
					}
					
					if($imgStatus == 1)
					{
						$return = "success:".$image.$ext.":uploaded";
						return $return;
					}else{
						$return = "success:".$image.$ext.":resize";
						return $return;
					}
				}else
				{
					$return = "error:File size should be less than $logoKb";
					return $return;
				}
			}else{
				$return = "error:Only JPG, PNG, BMP or GIF files are allowed!";
				return $return;
			}
		}else{
			$return = "error:Some error occured while saving to the database!";
			return $return;
		}
	}
	
	/**
	* Common mail function
	*/	
	function send_email($process = "",$replace_fields=array(),$replace_with=array(),$email_template=null,$to=null,$extraTemplate = null)
	{
		
		// Loaded EmailTemplate Model
		$EmailsModel = TableRegistry::get('EmailTemplates');
		//CODE FOR MULTILIGUAL START
		  $session = $this->request->session();
		  $EmailsModel->_locale = $session->read('requestedLanguage');
		//CODE FOR MULTILIGUAL END
		$getTemplateData = $EmailsModel->find('all',['conditions' => ['EmailTemplates.alias' => trim($email_template)]]);
		$template =  $getTemplateData->first();
		
		if ($extraTemplate != '')
		{
			$template_data = $extraTemplate;
		}
		else
		{
			$template_data=$template->description;		
		}
		
		$replace_fields = array_merge($replace_fields, array('/sitterguide/img/logo.png','/sitterguide/img/front/mobile_nav_logo.png'));
		$logoSrc = HTTP_ROOT.'img/logo.jpg';
		
		$replace_with = array_merge($replace_with, array($logoSrc));
		$template_info=str_replace($replace_fields,$replace_with,$template_data);
		
		if($_SERVER['HTTP_HOST']=='localhost')
		{	
			pr($template_info); die;
		}
		$this->Email = new Email();
		try {
		
			ob_start();
            $res = $this->Email->from([$template->email_from => $template->email_name])
				  ->emailFormat('both')	
                  ->to([$to => $template->email_name])
                  ->subject($template->subject)                   
                  ->send($template_info);
			ob_end_clean();
        
		} catch (Exception $e) {

            echo 'Exception : ',  $e->getMessage(), "\n";

        }
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
	* Function to for add/edit data into translation table
	*/
	function i18translation($modelName=null){
		
		//CODE FOR MULTILIGUAL START
		  $session = $this->request->session();
		 return  $modelName->_locale = $session->read('setRequestedLanguageLocale');
		//CODE FOR MULTILIGUAL END
	}

	/**
	* Function to check admin session
	*/
	function checkAdminSession()
	{
		
		$session = $this->request->session();
		$AdminData  = $session->read('Admin');
		
		if(isset($AdminData['id']) && isset($AdminData['username']))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	/**
	* Function to check guest session
	*/
	function CheckGuestSession()
	{
		$session = $this->request->session();
		$UserData  = $session->read('User');
		
		if(isset($UserData['id']) && isset($UserData['email']))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
	function isValidEmail($email){ 
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
			// Run the preg_match() function on regex against the email address
			if (preg_match($regex, $email)) {
				 return 1;
			} else { 
				 return 0;
			} 
	}
		
	/**
	* Function used to set user session 
	*/	
	function userSessionSet($count = array())
	{
	
		if(!empty($count))
		{
			$session = $this->request->session();
			$session->write('User.id', $count->id);
			$session->write('User.name', ucwords($count->first_name.($count->last_name!=''?' '.$count->last_name:'')));
			$session->write('User.email',$count->email);
			
			$UsersModel = TableRegistry::get('Users');
			$UsersData= $UsersModel->newEntity();
			$UsersData->logged_intime = date('Y-m-d H:i:s');
			$UsersData->id = $count->id; 
			if($UsersModel->save($UsersData)){
				return true;		
			}
		}
		else
		{
			return false;
		}		
	}
	
	function isUniqueEmail($email){ 
		
		// Loaded EmailTemplate Model
		$UsersModel = TableRegistry::get('Users');
		$getTemplateData = $UsersModel->find('all',['conditions' => ['Users.email' => $email]])->count();
		if ($getTemplateData>0) {
			 return 0;
		} else { 
			 return 1;
		} 
	}
	
	//For Forgot Password
	function isEmailExists($email=null){ 
		
		// Loaded EmailTemplate Model
		$UsersModel = TableRegistry::get('Users');
		if(@$_GET['Users']['email']!='')
		{
			$email = $_GET['Users']['email'];
		}
		$getTemplateData = $UsersModel->find('all',['conditions' => ['Users.email' => $email]])->count();
		
		if ($getTemplateData>0) {
			 $ret = 'true';
		} else { 
			  $ret = 'false';//Email not exiting in out database error display 
		} 
		if($this->request->is('ajax')){
			echo $ret;die;
		
		}else{
			return $ret;
		
		}
		
	}
	
	function isUniqueEmailAjax($email=null){ 
		
		// Loaded EmailTemplate Model
		$UsersModel = TableRegistry::get('Users');
		if(@$_GET['Users']['email']!='')
		{
			$email = $_GET['Users']['email'];
		}
		$getTemplateData = $UsersModel->find('all',['conditions' => ['Users.email' => $email]])->count();
		if ($getTemplateData>0) {
			 $ret = 'false';
		} else { 
			 $ret = 'true';
		}
		
		if($this->request->is('ajax')){
			echo $ret;die;
		
		}else{
			return $ret;
		
		}
	}
	
	function getTranslate($strRequest=''){
		
		if($strRequest==''){
				return false;
		}else{
			$StaticStringsModel = TableRegistry::get('StaticStrings');
			//CODE FOR MULTILIGUAL START
			$this->i18translation($StaticStringsModel);
			//CODE FOR MULTILIGUAL END
			
			$decodedstrRequest = base64_decode($strRequest);
			$StaticStringData = $StaticStringsModel->find('all',['conditions'=>['StaticStrings.constant_slug'=>$decodedstrRequest]]);
			
			if($StaticStringData->count() > 0){
				$StaticStringRecord = $StaticStringData->first();
				 $finalvalue = $StaticStringRecord->value;
			}else{
				 $finalvalue = $decodedstrRequest;
			}
		}
		$this->set(compact('finalvalue'));
		$this->render("/Users/get_translate");
	}
	
	function stringTranslate($strRequest=''){
		
		if($strRequest==''){
				return false;
		}else{
			$StaticStringsModel = TableRegistry::get('StaticStrings');
			//CODE FOR MULTILIGUAL START
			$this->i18translation($StaticStringsModel);
			//CODE FOR MULTILIGUAL END
			
			$decodedstrRequest = base64_decode($strRequest);
			$StaticStringData = $StaticStringsModel->find('all',['conditions'=>['StaticStrings.constant_slug'=>$decodedstrRequest]]);
			
			if($StaticStringData->count() > 0){
				$StaticStringRecord = $StaticStringData->first();
				 $finalvalue = $StaticStringRecord->value;
			}else{
				 $finalvalue = $decodedstrRequest;
			}
		}
		return $finalvalue;
		
	}
	
	/**
	* Function for Upload Image
	*/
	function admin_upload_document($type = NULL, $FileArr = array())
	{
	
		
		//echo $type;print_r($FileArr);die;
		$this->viewBuilder()->layout('');
		$this->autoRender=false;
		
		if($FileArr['name']!="")
		{
			
			if($type == 'document')
			{
				$imgName = pathinfo($FileArr['name']);
				$file = $FileArr;
				$fileName = $FileArr['name'];
				$ext = trim(substr($fileName, strrpos($fileName,'.')));
				
				$explodeExt = explode('.',$fileName);
				$explodeExt =  end($explodeExt);
				if($type == 'document')
				{
					$uploadFolder= "files/scanned_doc";	
					$fileSize= "5242880";
					$fileKb = "5 MB";
					$extCheckArr = array('pdf','docx','doc','png','gif','jpeg','jpg','bmp');	
				}
				
				$session = $this->request->session();
				
				if(in_array($explodeExt,$extCheckArr))
				{
					if($FileArr['size'] <= $fileSize)
					{
						$fileName = $session->read('User.id')."_".$FileArr['custom_name'];//$this->RandomStringGenerator(15);
						$destination = realpath('../webroot/'.$uploadFolder).'/'.$fileName.$ext;
						$src = $FileArr['tmp_name'];
						
						if(file_exists($destination)){
							unlink($destination);						
						}
						
						if(move_uploaded_file($FileArr['tmp_name'],$destination))
						{
							$return = "success:".$fileName.$ext.":uploaded";
							return $return;
						}
					}
					else
					{
						$return = "error:File size should be less than $fileKb";
						return $return;
					}
				}
				else
				{
					$extCheckStr = implode(',',$extCheckArr);
					$return = "error:Only ".strtoupper($extCheckStr)." files are allowed!";
					return $return;
				}
			}
		}
	}
	
	//FOR FAVICON AND SITE LOGO
	/* public function faviconLogo(){
		
		$ConfingModel=TableRegistry::get("site_configuration");
		$ConfingData=$ConfingModel->find('all')->toArray();
		pr($ConfingData);die;
	} */
	
}
?>
