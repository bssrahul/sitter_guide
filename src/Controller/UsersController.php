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
class UsersController extends AppController
{
	public $helpers = ['Form'];
	
	public function initialize()
    {
		//print_R($this->request->params);die;
        parent::initialize();
		
		//GET LOCALE VALUE
		$session = $this->request->session();
		$setRequestedLanguageLocale  = $session->read('setRequestedLanguageLocale'); 
		I18n::locale($setRequestedLanguageLocale);
		$AdminData  = $session->read('Admin');
		// check admin session
		if(!$this->CheckAdminSession() && !in_array($this->request->action,array('login','forgotPassword')))
		{
			return $this->redirect(['controller' => 'users', 'action' => 'login']);
			exit();
		}
		else if($this->CheckAdminSession() && ($this->request->action == 'login' || $this->request->action=="forgotPassword"))
		{
			
			if($AdminData['is_lock']==true){
				return $this->redirect(['controller' => 'users', 'action' => 'sleep']);
			}else{
				return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
			}
			
		}
		
		if($AdminData['is_lock']==true && $this->request->action != 'screenlock'){
			return $this->redirect(['controller' => 'users', 'action' => 'screenlock']);
		}
	}
	/**
	* Function of admin login
	*/
	function login()
	{
		$this->viewBuilder()->layout('admin_login');
		
		// Loaded Admin Model
		$AdminsModel = TableRegistry::get('Admins');
		$AdminData = $AdminsModel->newEntity();

		if (isset($this->request->data) && !empty($this->request->data))
		{
			
			if($this->request->data['username']!="" && $this->request->data['password']!="")
		    {   $session = $this->request->session();
				$username = trim($this->request->data['username']);
				$password = md5(trim($this->request->data['password']));
				$getValidAdminData = $AdminsModel->find('all',
										['conditions' => ['Admins.username' => $username,'Admins.password' => $password]]
									);

				if($getValidAdminData->count()>0)
				{
					$getAdminData =  $getValidAdminData->first();
					$AdminData->id = $getAdminData->id;
					$AdminData->last_login = date('Y-m-d h:i:s');
				 
					$AdminsModel->save($AdminData);
				 
					$session->write('Admin.id', $getAdminData->id);
					$session->write('Admin.email', $getAdminData->email);
					$session->write('Admin.username', $getAdminData->username);
					$session->write('Admin.full_name', $getAdminData->full_name);
					$session->write('Admin.admin_img', $getAdminData->admin_img);
					$session->write('Admin.type', $getAdminData->type);
					$session->write('Admin.last_login', $getAdminData->last_login);
					$session->write('Admin.join_date', $getAdminData->date_added);
					$session->write('Admin.is_lock', false);

					return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
				}
		    }
		     
            $this->set('error',AUTHENTICATION_FAILED);		 
			
		} 
	}
	/**
	* Function of admin wake up login
	*/
	function sleep()
	{
		$session = $this->request->session();
		$session->write('Admin.is_lock', true);
		return $this->redirect(['controller' => 'Users', 'action' => 'screenlock']);
	}
	/**
	* Function of admin wake up login
	*/
	function screenlock()
	{
		$this->viewBuilder()->layout('admin_sleep');
		
		// Loaded Admin Model
		$AdminsModel = TableRegistry::get('Admins');
		$AdminData = $AdminsModel->newEntity();

		if (isset($this->request->data) && !empty($this->request->data))
		{
			//echo $this->request->data['password']; die;
			if($this->request->data['password']!="")
		    {   $session = $this->request->session();
				$username = $session->read('Admin.username');
				if(!isset($username) && $username==""){
					return $this->redirect(['controller' => 'users', 'action' => 'login']);
				}
				$password = md5(trim($this->request->data['password']));
				$getValidAdminData = $AdminsModel->find('all',
										['conditions' => ['Admins.username' => $session->read('Admin.username'),'Admins.password' => $password]]
									);

				if($getValidAdminData->count()>0)
				{
					$getAdminData =  $getValidAdminData->first();
					$AdminData->id = $getAdminData->id;
					$AdminData->last_login = date('Y-m-d h:i:s');
				 
					$AdminsModel->save($AdminData);
				 
					$session->write('Admin.id', $getAdminData->id);
					$session->write('Admin.email', $getAdminData->email);
					$session->write('Admin.username', $getAdminData->username);
					$session->write('Admin.full_name', $getAdminData->full_name);
					$session->write('Admin.admin_img', $getAdminData->admin_img);
					$session->write('Admin.type', $getAdminData->type);
					$session->write('Admin.last_login', $getAdminData->last_login);
					$session->write('Admin.join_date', $getAdminData->date_added);
					$session->write('Admin.is_lock', false);

					return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
				}else{
					$this->set('error',AUTHENTICATION_FAILED);		 
				}
		    }else{
				$this->set('error',"Please enter your password.");		 
			}
		} 
	}
	/**Function for dashboard
	*/
	function dashboard(){
		
		$this->viewBuilder()->layout('admin_dashboard');

		$session = $this->request->session();
		$currentLang = $session->read('requestedLanguage');
		if(!isset($currentLang) && empty($currentLang)){

			$this->setYourStore("en","Users","dashboard");
		}
	  
		$UsersModel = TableRegistry::get('Users');
		$AdminsModel = TableRegistry::get('Admins');

		$userdata = $UsersModel->find('all');
		$usercount = $userdata->count();

		$admindata = $AdminsModel->find('all');
		$AllAdmins = $admindata->all(); 
		$this->set('admins_info',$AllAdmins);
		
		$activeuser = $UsersModel->find('all',['conditions'=>['Users.status'=>1]]);
		$activeuser = $activeuser->count();
		
		$deactiveuser = $UsersModel->find('all',['conditions'=>['Users.status'=>0]]);
		$deactiveuser = $deactiveuser->count();


		$usersdetail = ['total_user'=>$usercount,'active_user'=>$activeuser,'deactive_user'=>$deactiveuser];
		$this->set('UsersDetail',$usersdetail);
		
		$ContactRequest = TableRegistry::get('ContactRequests');
		$AllContactRequest = $ContactRequest->find('all');
		$contactRequestcount = $AllContactRequest->count();

		$total_reply = $ContactRequest->find('all',['conditions'=>['ContactRequests.reply_status'=>1]]);
		$total_reply = $total_reply->count();

		$no_reply = $ContactRequest->find('all',['conditions'=>['ContactRequests.reply_status'=>0]]);
		$no_reply = $no_reply->count();
		
		$contactRequestDetail = ['total_contact_request'=>$contactRequestcount,'reply'=>$total_reply,'no_reply'=>$no_reply];

		$this->set('ContactRequestDetail',$contactRequestDetail);
		
		$CmsPages = TableRegistry::get('CmsPages');
		$AllCmsPages = $CmsPages->find('all');
		
		$countCmsPages = $AllCmsPages->count();

		$activeCmsPages = $CmsPages->find('all',['conditions'=>['CmsPages.status'=>1]]);
		$activeCmsPages = $activeCmsPages->count();

		$deactiveCmsPages = $CmsPages->find('all',['conditions'=>['CmsPages.status'=>0]]);
		$deactiveCmsPages = $deactiveCmsPages->count();
		
		$cmsPagesDetail = ['total_cms_pages'=>$countCmsPages,'active'=>$activeCmsPages,'deactive'=>$deactiveCmsPages];

		$this->set('CmsPagesDetail',$cmsPagesDetail);
	}
	/** Function for edit admin details
	*/
	function adminEdit(){
		$this->viewBuilder()->layout('admin_dashboard');
		//Loaded Model
		$AdminsModel = TableRegistry::get('Admins');
		$SiteModel = TableRegistry::get('SiteConfigurations');

		$session = $this->request->session();
		$Adminid  = $session->read('Admin.id');
	   
		if(isset($this->request->data) && !empty($this->request->data)){
			
			$AdminData= $AdminsModel->newEntity($this->request->data['Admins'],['validate'=>true]);
			$admininfo = (object)$this->request->data['Admins'];
			
			$SiteConfigData = $SiteModel->newEntity($this->request->data['SiteConfigurations'],['validate'=>true]);	
			
			$siteinfo = (object)$this->request->data['SiteConfigurations'];

			//CODE FOR MULTILIGUAL START
			$this->i18translation($AdminsModel);
			$this->i18translation($AdminData);
			$this->i18translation($SiteModel);
			//CODE FOR MULTILIGUAL END
			 //Upload admin image
			if($_FILES['admin_img']['name']!=''){
				$adminimg = $this->admin_upload_file('profilePic',$_FILES['admin_img']);
				$adminimg = explode(':',$adminimg);
				if($adminimg[0]=='error'){
					//$this->displayErrorMessage($adminimg[1]);
					$this->Flash->error(__($adminimg[1]));
					$this->redirect($this->referer());
				}else{
					$AdminData->admin_img = $adminimg[1];
				}				
			}else{
				 unset($_FILES['admin_img']);
			}
			//Upload site logo
			if($_FILES['site_logo']['name']!=''){
				$siteLogo = $this->admin_upload_file('logo',$_FILES['site_logo']);
				$siteLogo = explode(':',$siteLogo);
				if($siteLogo[0]=='error'){
					//$this->displayErrorMessage($siteLogo[1]);
					$this->Flash->error(__($siteLogo[1]));
					$this->redirect($this->referer());
				}else{
					$Sitelogo = $siteLogo[1];
					$SiteConfigData->site_logo = $Sitelogo;
				}				
			}else{
			   unset($_FILES['site_logo']);
			}
			//Upload site favicon
			if($_FILES['site_favicon']['name']!=''){
				$favicon = $this->admin_upload_file('favicon',$_FILES['site_favicon']);
				$favicon = explode(':',$favicon);
				if($favicon[0]=='error'){
					//$this->displayErrorMessage($favicon[1]);
					$this->Flash->error(__($favicon[1]));
					$this->redirect($this->referer());
				}else{
				  $SiteConfigData->site_favicon = $favicon[1];
				}				
			}else{
				unset($_FILES['site_favicon']);
			}

			$AdminData->id = $Adminid;
			

			if (!$AdminData->errors() && !$SiteConfigData->errors()){
				if($AdminsModel->save($AdminData)){
					$page = $AdminsModel->get($Adminid);
				 
				  $SiteConfigurations = $SiteModel->find('all');
			      $SiteConfigurations = $SiteConfigurations->first();
			      $SiteConfigData->id = $SiteConfigurations->id;
				} 
				if($SiteModel->save($SiteConfigData)){
					$SiteConfigurations = $SiteModel->find('all');
					$SiteConfigurations = $SiteConfigurations->first();

					$session->write('Admin.username', $page->username);
					$session->write('Admin.full_name', $page->full_name);
					$session->write('Admin.admin_img', $page->admin_img);

				}
				//$this->displaySuccessMessage('Admin settings has been updated successfully');
                 $this->Flash->success(__('Admin settings has been updated successfully'));
				return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
				
		   }else{
			
			   $AdminsModel = $AdminsModel->get($Adminid);
			   $admininfo->admin_img = $AdminsModel->admin_img; 
			   
			   $SiteModel = $SiteModel->find('all');
			   $SiteConfigurations = $SiteModel->first();
			   $siteinfo->site_logo = $SiteConfigurations->site_logo;
			   $siteinfo->site_favicon = $SiteConfigurations->site_favicon;
			   
			   $this->set('admininfo',$admininfo);
		       $this->set('siteinfo',$siteinfo);
		
			   
			   $obj_merged = (object) array_merge((array) $AdminData->errors(), (array) $SiteConfigData->errors());
			   
			   $this->set([
				'errors' => $obj_merged, 
				'_serialize' => ['errors']]);
				return;
		   }
		}else{
			$admininfo = $AdminsModel->get($Adminid);
			$SiteModel = $SiteModel->find('all');
			$SiteConfigurations = $SiteModel->first();
			
			$this->set('admininfo',$admininfo);
		    $this->set('siteinfo',$SiteConfigurations);
		}
		
	}
	/**
	Function for admin change password
	*/
	function changePassword($id = NULL){
		$this->viewBuilder()->layout('admin_dashboard');

		// Loaded Admin Model
		$AdminsModel = TableRegistry::get('Admins');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($AdminsModel);
		//CODE FOR MULTILIGUAL END
		$Adminid = convert_uudecode(base64_decode($id));
		
		if(isset($this->request->data) && !empty($this->request->data)){
			$AdminData = $AdminsModel->newEntity($this->request->data['Admin']);
			$data=$this->request->data;
			if($data['Admin']['password'] != $data['Admin']['confirm_password']){
				//$this->displayErrorMessage('Your password and confirmation password do not match.');
				$this->Flash->error(__('Error Found, Kindly try later!.'));
				$this->redirect($this->referer());
			}else{

				$session = $this->request->session();
				$AdminData->id =  $session->read('Admin.id');
				
				$AdminData->password = md5($data['Admin']['password']);
				
				if($AdminsModel->save($AdminData)){
					
					$replace = array('{name}','{password}');
					$with = array($session->read('Admin.full_name'),$data['Admin']['password']);
					$this->send_email('',$replace,$with,'admin_change_password',$session->read('Admin.email'));
					//$this->displaySuccessMessage('Your password has been updated Successfully!.');
					//Flash
					$this->Flash->success(__('Your password has been updated Successfully!.'));
					
					return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
				}else{
					//$this->displayErrorMessage('Error Found, Kindly try later!.');
					$this->Flash->error(__('Error Found, Kindly try later!.'));
					$this->redirect($this->referer());
				}
			}
		}
	}
	/**Function for forgot password
	*/
	function forgotPassword(){
		$this->viewBuilder()->layout('admin_login');
		// Loaded Admin Model
		$AdminsModel = TableRegistry::get('Admins');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($AdminsModel);
		//CODE FOR MULTILIGUAL END
		$AdminData = $AdminsModel->newEntity();
		
		if($this->request->is('post')==1){
			if(isset($this->request->data['email']) && $this->request->data['email']!=''){
				$data=$this->request->data;	
				$user = $AdminsModel->find('all',['conditions' => ['Admins.email' => $data['email']]]);
				$getAdminData =  $user->first();
				
				if(empty($getAdminData)){
				   $this->set("error","Email id not register with us, try again");
				}else{
					$new_password = $this->RandomStringGenerator(8);
					$update_password = md5($new_password);
					$AdminData->id = $getAdminData->id;
					$AdminData->password = $update_password;
					//save adnin data		
					if($AdminsModel->save($AdminData)){
						$replace = array('{user}','{new_password}');
						$with = array($getAdminData->username,$new_password);
						$this->send_email('',$replace,$with,'admin_forgot_password',$getAdminData->email);
						$this->set('success',"Password sent on your email id.");		 
					}
				}
			}else{
				$this->set("error","Kindly enter email id");
			}
		}
	}
	/**Function for logout
	*/
	function logout(){
		// Loaded Session Component
		$session = $this->request->session();
		$session->delete('Admin');
		$session->delete('requestedLanguage');
		$session->delete('setRequestedLanguageLocale');
		return $this->redirect(['controller' => 'users', 'action' => 'login']);
	}
	/**Function for add new user
	*/
	/*function addNewUser(){
		$this->viewBuilder()->layout('admin_dashboard');
		//Load Users model
		$UsersModel = TableRegistry::get("Users");
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UsersModel);
		//CODE FOR MULTILIGUAL END
		if(isset($this->request->data) && !empty($this->request->data)) {
			$userData = $UsersModel->newEntity($this->request->data['Users'],['validate' => true]);
			if (!$userData->errors()){
				//Upload user image
				if($_FILES['image']['name']!=''){
					$userImg = $this->admin_upload_file('profilePic',$_FILES['image']);
					$userImg = explode(':',$userImg);
					if($userImg[0]=='error'){
					   $this->displayErrorMessage($userImg[1]);
					   $this->redirect($this->referer());
					}else{
					   $userData->image = $userImg[1];
					}				
				}else{
				   unset($_FILES['image']);
				}
				//Save user data
				if($UsersModel->save($userData)){
				$this->displaySuccessMessage("New user has been added Successfully");
				return $this->redirect(['controller' => 'users', 'action' => 'users-listing']);
				}	
			}else{
				//Set errors
				$this->set([
				'errors' => $userData->errors(), 
				'_serialize' => ['errors']]);
				return;
			}
		}
	}*/
	/**Function for edit user
	*/
	function editUser($id = NULL){
		$this->viewBuilder()->layout('admin_dashboard');
		$id=convert_uudecode(base64_decode($id));
		$UsersModel = TableRegistry::get("Users");       
		$ZonesModel = TableRegistry::get("Zones");
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UsersModel);
		//CODE FOR MULTILIGUAL END
		if(isset($this->request->data) && !empty($this->request->data)) {
			$userData = $UsersModel->newEntity($this->request->data['Users'],['validate' => true]);
			
			//echo "<pre>";print_r($this->request->data);die;
			
			$userId = $this->request->data['Users']['id'];
			$image['image'] = $this->request->data['Users']['image'];
			if (!$userData->errors()){
				
				//Upload user image
				if($image['image']['name']!=''){
					$userImg = $this->admin_upload_file('profilePic',$image['image']);
					$userImg = explode(':',$userImg);
					if($userImg[0]=='error'){
						//$this->displayErrorMessage($userImg[1]);
						$this->Flash->error(__($userImg[1]));
						$this->redirect($this->referer());
					}else{
						$userData->image = $userImg[1];
					}				
				}else{
				   unset($_FILES['image']);
				}
				//Update user data
				$userData->date_modified = date('Y-m-d h:i:s');
				$userData->modified = date('Y-m-d h:i:s');
				if($UsersModel->save($userData)){
					
				}
				//$this->displaySuccessMessage("Records has been updated successfully");
				$this->Flash->success(__('Records has been updated successfully'));
			    return $this->redirect(['controller'=>'users','action'=>'users-listing']);
			}else{
				$userInfo = $UsersModel->get($userId);
				$zonesData = $ZonesModel->find('list',[
			       'keyField' => 'zone_id',	
				   'valueField' => 'zone_name']);           
				$zonesData = $zonesData->toArray();	
				$this->set('userInfo',$userInfo);	
				$this->set('zonesData',$zonesData);	
				
				$session = $this->request->session();
				$session->write("errors",$userData->errors());
				
				return $this->redirect('/users/edit-user/'.base64_encode(convert_uuencode($userId)));
				/////////////////////
			}
		}else{
			$userInfo = $UsersModel->get($id);			           
			$zonesData = $ZonesModel->find('list',[
			       'keyField' => 'zone_id',	
				   'valueField' => 'zone_name']);           
			$zonesData = $zonesData->toArray();	
			$this->set('userInfo',$userInfo);	
			$this->set('zonesData',$zonesData);
		}
	}
	/**Function for users list
	*/
	function usersListing()
	{
		$this->viewBuilder()->layout('admin_dashboard');
		
		$this->loadComponent('Paginator');
		$this->set('modelName','Users');
		$UsersModel = TableRegistry::get("Users");
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UsersModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$users_info = $this->Paginator->paginate($UsersModel,[
			'conditions' => [
			'Users.date_modified' =>$data['Users']['user_id']],
			'limit' => 10,
			'order' => [
			'Users.modified' => 'desc']]);
		}else{
			$users_info = $this->Paginator->paginate($UsersModel,[ 'limit' => 200,
			'order' => [
			'Users.modified' => 'desc']]);
		}
		$this->set('users_info',$users_info);
		//pr($users_info);die;
	}
	/**Function for user pet view
	*/
	function userPetView($id = null)
	{
		$id=convert_uudecode(base64_decode($id));
		
		$this->viewBuilder()->layout('admin_dashboard');
		
		$this->loadComponent('Paginator');
		$this->set('modelName','UserPets');
		$UserPetsModel = TableRegistry::get("UserPets");
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UserPetsModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$user_pets_info = $this->Paginator->paginate($UserPetsModel,[
			'conditions' => [
			'UserPets.id' => '%'.$data['UserPets']['id'].'%'],
			'limit' => 10,
			'order' => [
			'UserPets.id' => 'asc']]);
		}else{
			$user_pets_info = $this->Paginator->paginate($UserPetsModel,[
            'conditions' =>['UserPets.user_id'=>$id],
			'limit' => 200,
			'order' =>[
			'UserPets.id' => 'asc']]);
		}
		$this->set('userId',$id);
		$this->set('user_pets_info',$user_pets_info);
	}
	/**Function for edit user pet
	*/
	function editUserPet($petId = NULL, $userId = NULL){
		$this->viewBuilder()->layout('admin_dashboard');
		$petId=convert_uudecode(base64_decode($petId));
		$userId=convert_uudecode(base64_decode($userId));
		//echo $userId;die;
		$UserPetsModel = TableRegistry::get("UserPets");       
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UserPetsModel);
		//CODE FOR MULTILIGUAL END

		if(isset($this->request->data['UserPets']) && !empty($this->request->data['UserPets'])) {
			$userPetData = $UserPetsModel->newEntity($this->request->data['UserPets'],['validate' => true]);
			$petImage['pet_image'] = $this->request->data['UserPets']['pet_image'];
			
			$petId = $this->request->data['UserPets']['id'];
			$userId = $this->request->data['UserPets']['user_id'];
			
			
			if (!$userPetData->errors()){
				//Upload image
				if($petImage['pet_image']['name']!=''){
					$petImg = $this->admin_upload_file('petImage',$petImage['pet_image']);
					$petImg = explode(':',$petImg);
					if($petImg[0]=='error'){
						//echo $petImg[1];die;
						$imgError = $this->displayErrorMessage($petImg[1]);
						$this->redirect($this->referer());
					}else{
						$userPetData->pet_image = $petImg[1];
					}				
				}else{
				   unset($_FILES['pet_image']);
				}
				$years = $this->request->data['years'];
			    $months = $this->request->data['months'];
			    $arr = array($years,$months);
                $userPetData->pet_age   = implode(",",$arr);
				//echo "<pre>";print_r($userPetData);die;
				if($UserPetsModel->save($userPetData)){
				
				
				}
				$this->displaySuccessMessage("Records has been updated successfully");
				return $this->redirect('/users/user-pet-view/'.base64_encode(convert_uuencode($userId)));
			}else{
				$petInfo = $UserPetsModel->get($petId);
				$this->set('petInfo',$petInfo);	
				$this->set('userId',$userId);	
				$session = $this->request->session();
				
				$session->write("errors",$userPetData->errors());
				return $this->redirect('/users/edit-user-pet/'.base64_encode(convert_uuencode($petId)).'/'.base64_encode(convert_uuencode($petId)));
				
				//return 
				
			}
		}else{
			$petInfo = $UserPetsModel->get($petId);			            
			$this->set('petInfo',$petInfo);	
			$this->set('userId',$userId);
		}
	}
	/**Function for forgot password
	*/
	function userForgotPassword(){
		$this->viewBuilder()->layout('admin_login');
		// Loaded Admin Model
		$UsersModel = TableRegistry::get('Users');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UsersModel);
		//CODE FOR MULTILIGUAL END
		$UserData = $UsersModel->newEntity();
		

		if(isset($this->request->data['email']) && !empty($this->request->data['email'])){
			$data=$this->request->data;	
			//echo "<pre>";print_r($data);die;
			$user = $UsersModel->find('all',['conditions' => ['Users.email' => $data['email']]]);
			$getUserData =  $user->first();
			
			if(empty($getUserData)){
			   $this->set("error","Email id not register with us, try again");
			}else{
				$new_password = $this->RandomStringGenerator(8);
				$update_password = md5($new_password);
				$UserData->id = $getUserData->id;
				$UserData->password = $update_password;
				//save user data		
				if($UsersModel->save($UserData)){
					$replace = array('{user}','{new_password}');
					$with = array($getUserData->username,$new_password);
					$this->send_email('',$replace,$with,'forgot_password',$getUserData->email);
					$this->set('success',"Password sent on your email id.");	
					return $this->redirect(['controller'=>'users','action'=>'users-reset-password']);
				}
			}
		}else{
			 $this->set("error","Kindly enter email id");
		}
	}
	/**
	* Common Function for multiple selection
	*/
	function deleteRow($model=NULL,$id =NULL){
		// Loaded Admin Model
		$id=convert_uudecode(base64_decode($id));
		$loadModel = TableRegistry::get($model);
		//CODE FOR MULTILIGUAL START
		  $session = $this->request->session();
		  $loadModel->_locale = $session->read('requestedLanguage');
		//CODE FOR MULTILIGUAL END
		// Loaded Session Component
		$session = $this->request->session();
		$AdminData  = $session->read('Admin');

		//Not allowing sub admin to delete, type => 1 for sub admin
		$adminType = $session->read('Admin.type');
		if ($adminType == 1){
			//$this->displayErrorMessage("You don't has the privilege to delete records. Only admin can perform this action.");
			$this->Flash->success(__('You don\'t has the privilege to delete records. Only admin can perform this action.'));
			$this->redirect($this->referer());
		}else{
			$record = $loadModel->get($id);
			$deleteResult = $loadModel->delete($record);
			$this->Flash->success(__('Record has been deleted successfully.'));
			//$this->displaySuccessMessage("Record has been deleted successfully");
			$this->redirect($this->referer());
		}
	}
	/**
	* Function for status update
	*/
	function updateStatusRow($model=NULL,$id,$target)
	{ 
	  // Loaded Model
		$id=convert_uudecode(base64_decode($id));
		//echo $model.$id."ok".$target;die;
		$loadModel = TableRegistry::get($model);
		//CODE FOR MULTILIGUAL START
		$this->i18translation($loadModel);
		//CODE FOR MULTILIGUAL END
		$modelEntity = $loadModel->newEntity();

		$modelEntity->id = $id;
		$modelEntity->status = $target;
		$modelEntity->modified = date('Y-m-d h:i:s');
		if($loadModel->save($modelEntity)){
			$this->Flash->success(__('Status has been updated Successfully'));
		}
		$this->redirect($this->referer());
	}
}
?>
