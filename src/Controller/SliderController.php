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

class SliderController extends AppController
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
	function addSlider(){
		$this->viewBuilder()->layout('admin_dashboard');
		//Load Sliders model
			$SlidersModel = TableRegistry::get("Sliders");
					//Upload category image
	    if(isset($this->request->data) && !empty($this->request->data)) {
		   //echo "<pre>";print_r($this->request->data);die;
		   
			$sliderData = $SlidersModel->newEntity($this->request->data['Sliders'],['validate' => true]);
			 $media_type = $this->request->data['Sliders']['slider_type'];
			 
			 $medianame = $this->request->data['Sliders']['media']['name'];
				
			if(!$sliderData->errors()){
				
				//Upload Slider media
			if($media_type == 'image'){	
				if($medianame!=''){
					$sliderImage = $this->admin_upload_file('sliderImg',$this->request->data['Sliders']['media']);
					
					$sliderImage = explode(':',$sliderImage);
					if($sliderImage[0]=='error'){
					   $this->Flash->error(__($sliderImage[1]));
					   return $this->redirect($this->referer());
					}else{
						$sliderData->media = $sliderImage[1];
					}				
				}else{
				   unset($sliderData->media);
				}
			}else{
				if($medianame!=''){
					$sliderVideo = $this->admin_upload_file('video',$this->request->data['Sliders']['media']);
					
					$sliderVideo = explode(':',$sliderVideo);
					if($sliderVideo[0]=='error'){
					   $this->Flash->error(__($sliderVideo[1]));
					   return $this->redirect($this->referer());
					
					}else{
						$sliderData->media = $sliderVideo[1];
					}				
				}else{
				   unset($sliderData->media);
				}
			}
				//Save Category data
		        //CODE FOR MULTILIGUAL START
				$this->i18translation($SlidersModel);
				$this->i18translation($sliderData);
				//CODE FOR MULTILIGUAL END
				if($SlidersModel->save($sliderData)){
				$this->Flash->success(__("Slider has been added Successfully"));
				return $this->redirect(['controller' => 'slider', 'action' => 'sliders-listing']);
				}	
			}else{
				//Set errors
				$this->set([
				'errors' => $sliderData->errors(), 
				'_serialize' => ['errors']]);
				return;
			}
		}
	}
	
	/**Function for edit user
	*/
	function editSlider($id = NULL){
		/*$this->viewBuilder()->layout('admin_dashboard');
		$id=convert_uudecode(base64_decode($id));
		$SlidersModel = TableRegistry::get("Sliders");
	 
		if(isset($this->request->data) && !empty($this->request->data)){
			$sliderData = $SlidersModel->newEntity($this->request->data['Sliders'],['validate' => true]);
			$medianame = $this->request->data['Sliders']['media']['name'];
			
			if (!$sliderData->errors()){
				//Upload user video
				if($medianame!=''){
					$sliderVideo = $this->admin_upload_file('video',$this->request->data['Sliders']['media']);
					
					$sliderVideo = explode(':',$sliderVideo);
					if($sliderVideo[0]=='error'){
					   $this->displayErrorMessage($sliderVideo[1]);
					   return $this->redirect($this->referer());
					}else{
						$sliderData->media = $sliderVideo[1];
					}				
				}else{
				   unset($sliderData->media);
				}

				//CODE FOR MULTILIGUAL START
				$this->i18translation($SlidersModel);
				$this->i18translation($sliderData);
				//CODE FOR MULTILIGUAL END
				//Update user data
				if($SlidersModel->save($sliderData)){
					$this->displaySuccessMessage("Records has been updated successfully");
					return $this->redirect(['action'=>'sliders-listing','controller'=>'Slider']);
				}
			}else{
				$this->displayErrorMessage('All fields are required');
				return $this->redirect($this->referer());
			}
		}else{
			$sliderInfo = $SlidersModel->get($id);
			$this->set('sliderInfo',$sliderInfo);
		}*/
		////////////////////////////////////////////////////////////////////////
		$this->viewBuilder()->layout('admin_dashboard');
		$slidersModel = TableRegistry::get("Sliders");
	    if(isset($this->request->data) && !empty($this->request->data))
		{
		   $sliderData = $slidersModel->newEntity();
            $sliderMedia = $this->request->data['Sliders']['slider_media']['name'];
			if($sliderMedia!=''){
					$sliderMed = $this->admin_upload_file('video',$this->request->data['Sliders']['slider_media']);
					$sliderMed = explode(':',$sliderMed);
					if($sliderMed[0]=='error'){
					   $this->Flash->error(__($sliderMed[1]));
					   return $this->redirect($this->referer());
					}else{
						$sliderData->media = $sliderMed[1];
					}				
				}else{
				   unset($this->request->data['Sliders']['slider_media']);
				}
				$sliderData = $slidersModel->patchEntity($sliderData, $this->request->data['Sliders'],['validate'=>'update']);
		        if ($slidersModel->save($sliderData)) {
					$this->Flash->success(__("Record has been updated Successfully"));
					return $this->redirect(['controller'=>'slider','action'=>'sliders-listing']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
	    }else{
		   $sliderData = $slidersModel->get($id);
	    }
	  $this->set('sliderInfo', $sliderData);
	}
	
	/**Function for Sliders list*/
	function slidersListing(){
		
		$this->viewBuilder()->layout('admin_dashboard');
		
		$this->loadComponent('Paginator');
		$this->set('modelName','Sliders');
		$SlidersModel = TableRegistry::get("Sliders");
		//echo "<pre>";print_r($SlidersModel);die;
		//CODE FOR MULTILIGUAL START
		$this->i18translation($SlidersModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$sliders_info = $this->Paginator->paginate($SlidersModel,[
			'conditions' => [
			'Sliders.id LIKE' => '%'.$data['Sliders']['id'].'%'],
			'limit' => 10,
			'order' => [
			'Sliders.id' => 'desc']]);
		}else{
			$sliders_info = $this->Paginator->paginate($SlidersModel,[ 'limit' => 200,
			'order' => [
			'Sliders.id' => 'desc']]);
		}
		$this->set('sliders_info',$sliders_info);
	}

}
?>
