<?php

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
class PartnersController extends AppController
{
  public $helpers = ['Form'];
   public $paginate = [
         'limit' => 25,
         'order' => [
         'Userss.email' => 'asc'
         ]];
   //$this->loadComponent('Resize');
   //Function for check admin session
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		if($this->checkAdminSession()==false)
		{
		  return $this->redirect(['controller' => 'users', 'action' => 'login']);
			exit();
		}
    }
    public function initialize()
    {
		parent::initialize();
        $this->loadComponent('Paginator');
	}
	/**
	* Function for Faqs pages
	*/ 

	function partnersListing()
	{
		
		$this->viewBuilder()->layout('admin_dashboard');
		$this->loadComponent('Paginator');
		$this->set('modelName','viewpartners-listing');
		$partnersModel = TableRegistry::get("Partners");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($partnersModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$partners_info = $this->Paginator->paginate($partnersModel,[
			'conditions' => [
			'Partners.id LIKE' => '%'.$data['partners']['id'].'%'],
			'limit' => 10,
			'order' => [
			'Partners.modified' => 'desc']]);
		}else{
			$partners_info = $this->Paginator->paginate($partnersModel,[ 'limit' => 200,
			'order' => [
			'Partners.modified' => 'desc']]);
		}
		$this->set('partners_info',$partners_info);
		
	}
	
	/*
	* Function Add Partners
	*/
	
	function addPartner()
	{
		 $this->viewBuilder()->layout('admin_dashboard');
		   //Load model
			$partnersModel = TableRegistry::get("Partners");
			$partnersData = $partnersModel->newEntity();
			if(isset($this->request->data) && !empty($this->request->data) )
		   {
			//pr($this->request->data); die;
			$partnersData = $partnersModel->patchEntity($partnersData,$this->request->data['Partners']);
			$imagename = $this->request->data['Partners']['image']['name'];
			//Upload image
				if($imagename!=''){
					$partnersImg = $this->admin_upload_file('partnersImg',$this->request->data['Partners']['image']);
				
					$partnersImg = explode(':',$partnersImg);
					if($partnersImg[0]=='error')
					{
					   $this->Flash->error(__($partnersImg[1]));
					   return $this->redirect($this->referer());
					}
					
					else{
						$partnersData->image = $partnersImg[1];
					}				
				}else{
				   unset($partnersData->image);
				}
				//CODE FOR MULTILIGUAL START
				$this->i18translation($partnersModel);
				$this->i18translation($partnersData);
				//CODE FOR MULTILIGUAL END
				//Save data
				if($partnersModel->save($partnersData)){
				   $this->Flash->success(__("Record has been added Successfully"));
				   return $this->redirect(['controller' => 'partners', 'action' => 'partners-listing']);
				}else{
				   $this->Flash->error(__('Error found, Kindly fix the errors.'));
			   }	
		}$this->set('partner_info', $partnersData);
	}
	
	/**
       Function for adit Works
	*/
	function editPartner($id=null)
	{
		$this->viewBuilder()->layout('admin_dashboard');
		//$id=convert_uudecode(base64_decode($id));
		$partnersModel = TableRegistry::get("Partners");
		if(isset($this->request->data) && !empty($this->request->data))
		{
		    $partnersData = $partnersModel->newEntity();
            $imagename = $this->request->data['Partners']['partner_image']['name'];
			//echo $imagename;die;
				if($imagename!=''){
					$partnersImg = $this->admin_upload_file('partnersImg',$this->request->data['Partners']['partner_image']);
					//echo $partnersImg;die;
					$partnersImg = explode(':',$partnersImg);
					if($partnersImg[0]=='error'){
					   $this->Flash->error(__($partnersImg[1]));
					   return $this->redirect($this->referer());
					}else{
						$partnersData->image = $partnersImg[1];
						//echo $partnersData->image;die;
					}				
				}else{
				   unset($partnersData->image);
				   //echo $partnersData->image;die;
				}
				//echo $imagename;die;
                $partnersData = $partnersModel->patchEntity($partnersData, $this->request->data['Partners'],['validate'=>'update']);
		       // $partnersData->id = $promocodeId = convert_uudecode(base64_decode($this->request->data['howId']));
				//pr($partnersData);die;
				if ($partnersModel->save($partnersData)) {
					$this->Flash->success(__('Record has been updated Successfully'));
					return $this->redirect(['controller'=>'partners','action'=>'partners-listing']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
	    }else{
		   $partnersData = $partnersModel->get($id);
	    }
	$this->set('partner_info', $partnersData);
   }
	
	
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*function addPartners()
	{
		$this->viewBuilder()->layout('admin_dashboard');
		$partnersModel= TableRegistry::get('partners');
		
		if(isset($this->request->data)&& !empty($this->request->data))
		{
			     $partnersData=$partnersModel->pathchEntity($this->request->data['partners'],['validate'=>true]);
				//$partnersData=$PartnersModel->newEntity($faqsdata,$this->request->data['faqs'],['validate'=>true]);
				$imagename = $this->request->data['partners']['image']['name'];
				
				//pr($PartnersData->errors());die; 
				if(!$partnersData->errors())
				{
					if($imagename!=''){
					$partnersImg = $this->admin_upload_file('partnersImg',$this->request->data['partners']['image']);
				
					$partnersImg = explode(':',$partnersImg);
					if($partnersImg[0]=='error')
					{
					   $this->displayErrorMessage($partnersImg[1]);
					   return $this->redirect($this->referer());
					}
					
					else{
						
						$partnersData->image = $partnersImg[1];
					}				
				}else{
				   unset($partnersData->image);
				}
					//Save Category data
			
					//CODE FOR MULTILIGUAL START
					$this->i18translation($partnersModel);
					$this->i18translation($partnersData);
					//CODE FOR MULTILIGUAL END
					if($partnersModel->save($partnersData))
					{
						$this->displaySuccessMessage("New faqs has been added Successfully");
						return $this->redirect(['controller' => 'partners', 'action' => 'viewpartners-listing']);
						
					}
				}
				 else
				{
						//Set errors
						//pr($partnersData->errors());die;
						$this->set('addpartners', $partnersData);
						$this->set([
						'errors' => $partnersData->errors(), 
						'_serialize' => ['errors']]);
						return;
				} 
				$this->set('partners', $partnersData);
		}
	}
			
		
	
	function editPartners($id=null)
	{
		$this->viewBuilder()->layout('admin_dashboard');
		$id=convert_uudecode(base64_decode($id));
		$partnersModel = TableRegistry::get("partners");
		
		
		if(isset($this->request->data) && !empty($this->request->data))
		{
			//pr($this->request->data);
			//pr($this->request->data['Faqs']); die;
			$partnersData = $partnersModel->newEntity($this->request->data['Partners'],['validate' => 'Update']);
			
			$partnersData->id = $promocodeId = convert_uudecode(base64_decode($this->request->data['howId']));
			$imagename = $this->request->data['partners']['image']['name'];
			//	pr($partnersData->errors());die;		
			 if (!$partnersData->errors()){
						
					if($imagename!=''){
					$partnersImg = $this->admin_upload_file('partnersImg',$this->request->data['Partners']['image']);
					
					$partnersImg = explode(':',$partnersImg);
					if($PartnersImg[0]=='error'){
					   $this->displayErrorMessage($partnersImg[1]);
					   return $this->redirect($this->referer());
					}else{
						$partnersData->image = $partnersImg[1];
					}				
				}else{
				   unset($partnersData->image);
				}						
				//CODE FOR MULTILIGUAL START
				$this->i18translation($partnersModel);
				$this->i18translation($partnersData);
				//CODE FOR MULTILIGUAL END
				//Update user data
				
				if($partnersModel->save($partnersData)){
					$this->displaySuccessMessage("Records has been updated successfully");
					return $this->redirect(['controller'=>'partners','action'=>'viewpartners-listing']);
				}
			 }else{
				 $partnersInfo = $partnersModel->get($categoryId);
				 $this->set('partnersInfo',$partnersInfo);
				 $this->set([
				 'errors' => $partnersInfo->errors(), 
				 '_serialize' => ['errors']]);
				 return;
			 } 
			
		}
		else
		{
			$partnersInfo = $partnersModel->get($id);
			$this->set('partners',$partnersInfo);
		}		
	}
		
}
	
	
	*/
