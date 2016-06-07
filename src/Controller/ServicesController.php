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
use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */

class ServicesController extends AppController
{
	public $helpers = ['Form'];
	 //Function for check admin session
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		
		// check admin session
		if(!$this->CheckAdminSession() && !in_array($this->request->action,array('login','forgotPassword')))
		{
			return $this->redirect(['controller' => 'users', 'action' => 'login']);
			exit();
		}
		else if($this->CheckAdminSession() && ($this->request->action == 'login' || $this->request->action=="forgotPassword"))
		{
			return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
		}
    }
	/*public function initialize()
    {
        parent::initialize();
		
	}*/
    
	/**Function for add new user
	*/
	function addServices(){
		$this->viewBuilder()->layout('admin_dashboard');
		
		//Load Services model
		$ServicesModel = TableRegistry::get("Services");
		
		//Upload services image
	    if(isset($this->request->data) && !empty($this->request->data)) {
				   
			$ServicesData = $ServicesModel->newEntity($this->request->data['Services'],['validate' => true]);
			
			$imagename = $this->request->data['Services']['image']['name'];
				
			if(!$ServicesData->errors()){
				
				//Upload Services image
				if($imagename!=''){
					$ServicesImage = $this->admin_upload_file('ServicesImg',$this->request->data['Services']['image']);
					
					$ServicesImage = explode(':',$ServicesImage);
					if($ServicesImage[0]=='error'){
					   $this->Flash->error(__($ServicesImage[1]));
					   return $this->redirect($this->referer());
					}else{
						$ServicesData->image = $ServicesImage[1];
					}				
				}else{
				   unset($ServicesData->image);
				}
			
				//Save services data
		        //CODE FOR MULTILIGUAL START
				$this->i18translation($ServicesModel);
				$this->i18translation($ServicesData);
				//CODE FOR MULTILIGUAL END
				if($ServicesModel->save($ServicesData)){
				$this->Flash->success(__("Services has been added Successfully"));
				return $this->redirect(['controller' => 'Services', 'action' => 'Services-listing']);
				}	
			}else{
				//Set errors
				$this->set([
				'errors' => $ServicesData->errors(), 
				'_serialize' => ['errors']]);
				return;
			}
		}
	}
	
	/**Function for edit user
	*/
	function editServices($id = NULL){
		$this->viewBuilder()->layout('admin_dashboard');
		$id=convert_uudecode(base64_decode($id));
		$ServicesModel = TableRegistry::get("Services");
	 
		if(isset($this->request->data) && !empty($this->request->data)){
			//pr($this->request->data); die;
			$ServicesData = $ServicesModel->newEntity($this->request->data['Services'],['validate' => true]);
			$ServicesData->id = $servicesId = $this->request->data['Services']['id'];
			$imagename = $this->request->data['Services']['image']['name'];
			 
			if (!$ServicesData->errors()){
				//Upload user image
				if($imagename!=''){
					$servicesImg = $this->admin_upload_file('ServicesImg',$this->request->data['Services']['image']);
					
					$servicesImg = explode(':',$servicesImg);
					if($servicesImg[0]=='error'){
					  $this->Flash->error(__($servicesImg[1]));
					   return $this->redirect($this->referer());
					}else{
						$ServicesData->image = $servicesImg[1];
					}				
				}else{
				   unset($ServicesData->image);
				}

				//CODE FOR MULTILIGUAL START
				$this->i18translation($ServicesModel);
				$this->i18translation($ServicesData);
				//CODE FOR MULTILIGUAL END
				
				
				if($ServicesModel->save($ServicesData)){
					$this->Flash->success(__('Record has been added Successfully'));
					return $this->redirect(['action'=>'services-listing','controller'=>'Services']);
				}
			}else{
				$servicesInfo = $ServicesModel->get($servicesId);
				$this->set('servicesInfo',$servicesInfo);
				$this->set([
				'errors' => $ServicesData->errors(), 
				'_serialize' => ['errors']]);
				return;
			}
		}else{
			$servicesInfo = $ServicesModel->get($id);
			$this->set('ServicesInfo',$servicesInfo);
		}
	}
	
	/**Function for Services list*/
	function ServicesListing(){
		
		$this->viewBuilder()->layout('admin_dashboard');
		
		$this->loadComponent('Paginator');
		$this->set('modelName','Services');
		$ServicesModel = TableRegistry::get("Services");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($ServicesModel);
		//CODE FOR MULTILIGUAL END
		
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$Services_info = $this->Paginator->paginate($ServicesModel,[
			'conditions' => [
			'Services.id LIKE' => '%'.$data['Services']['id'].'%'],
			'limit' => 10,
			'order' => [
			'Services.id' => 'desc']]);
		}else{
			$Services_info = $this->Paginator->paginate($ServicesModel,[ 'limit' => 200,
			'order' => [
			'Services.id' => 'desc']]);
		}
		$this->set('Services_info',$Services_info);
	}

}
?>
