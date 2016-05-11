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
class FaqsController extends AppController
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

	function faqsListing()
	{
		
		$this->viewBuilder()->layout('admin_dashboard');
		$this->loadComponent('Paginator');
		$this->set('modelName','viewfaqs');
		$faqsModel = TableRegistry::get("faqs");
		$faqData=$faqsModel->find('all')->contain(['Categories'])->toArray();
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($faqsModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		/* if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$faqs_info = $this->Paginator->paginate($faqsModel,[
			'conditions' => [
			'faqs.id LIKE' => '%'.$data['faqs']['id'].'%'],
			'limit' => 10,
			'order' => [
			'faqs.id' => 'desc']]);
		}else{
			$faqs_info = $this->Paginator->paginate($faqsModel,[ 'limit' => 200,
			'order' => [
			'faqs.id' => 'desc']]);
		} */
		
		$this->set('faqs_info',$faqData);
		
	}
	function addFaqs()
	{
		$this->viewBuilder()->layout('admin_dashboard');
		$faqsModel= TableRegistry::get('Faqs');
		$CategoriesModel= TableRegistry :: get("categories");
		$CategoryData=$CategoriesModel->find('all')->where(['slug ' => 'Faqs' ])->toArray();
		$CategoryArr[0]="--Select Category--";
		foreach($CategoryData as $Category){
			
			
			$CategoryArr[$Category['id']]=$Category['title'];
		}
		
		
		$this->set('CategoryData',$CategoryArr);
		if(isset($this->request->data)&& !empty($this->request->data))
		{
				//pr($this->request->data);die;
			     $faqsData=$faqsModel->newEntity($this->request->data['faqs'],['validate'=>true]);
				//$faqsdata=$faqsModel->newEntity($faqsdata,$this->request->data['faqs'],['validate'=>true]);
				//pr($faqsData->errors());die;
				if(!$faqsData->errors())
				{
					//Save Category data
			
					//CODE FOR MULTILIGUAL START
					$this->i18translation($faqsModel);
					$this->i18translation($faqsData);
					//CODE FOR MULTILIGUAL END
					if($faqsModel->save($faqsData))
					{
						$this->displaySuccessMessage("New faqs have been added Successfully");
						return $this->redirect(['controller' => 'faqs', 'action' => 'faqs-listing']);
						
					}
				}
				 else
				{
						//Set errors
						//pr($faqsData->errors());die;
						$this->set('addfaqs', $faqsData);
						$this->set([
						'errors' => $faqsData->errors(), 
						'_serialize' => ['errors']]);
						return;
				} 
				$this->set('addfaqs', $faqsData);
		}
	}
			
		
	
	function editFaqs($id=null)
	{
		$this->viewBuilder()->layout('admin_dashboard');
		$id=convert_uudecode(base64_decode($id));
		$faqsModel = TableRegistry::get("Faqs");
		$CategoriesModel= TableRegistry :: get("categories");
		$CategoryData=$CategoriesModel->find('all')->toArray();
		foreach($CategoryData as $Category){
			
			
			$CategoryArr[$Category['id']]=$Category['title'];
		}
		$sel[]='---Select Category---';
		$CategoryArr=$sel+$CategoryArr;
		//pr($CategoryArr);die;
		//pr($CategoryData);die;
		$this->set('CategoryData',$CategoryArr);
		if(isset($this->request->data) && !empty($this->request->data))
		{
			//pr($this->request->data);
			//pr($this->request->data['Faqs']); die;
			$faqsData = $faqsModel->newEntity($this->request->data['Faqs'],['validate' => true]);
			
			$faqsData->id = $promocodeId = convert_uudecode(base64_decode($this->request->data['howId']));
			//	pr($faqsData->errors());die;		
			 if (!$faqsData->errors()){
										
				//CODE FOR MULTILIGUAL START
				$this->i18translation($faqsModel);
				$this->i18translation($faqsData);
				//CODE FOR MULTILIGUAL END
				//Update user data
				//pr($faqsData); die;
				if($faqsModel->save($faqsData)){
					$this->displaySuccessMessage("Records have been updated successfully");
					return $this->redirect(['controller'=>'faqs','action'=>'faqs-listing']);
				}
			 }else{
				 $faqsInfo = $faqsModel->get($category_id);
				 $this->set('faqsInfo',$faqsInfo);
				 $this->set([
				 'errors' => $faqsData->errors(), 
				 '_serialize' => ['errors']]);
				 return;
			 } 
			
		}
		else
		{
			$faqsInfo = $faqsModel->get($id);
			$this->set('faqs',$faqsInfo);
		}		
	}
		
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/* 	function howitworks()
	{
		 		$this->viewBuilder()->layout('admin_dashboard');
				$this->loadComponent('Paginator');
				$this->set('modelName','Howitworks');
				$HowitworksModel = TableRegistry::get("Howitworks");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($HowitworksModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$Howitworks_info = $this->Paginator->paginate($HowitworksModel,[
			'conditions' => [
			'Howitworks.id LIKE' => '%'.$data['Howitworks']['id'].'%'],
			'limit' => 10,
			'order' => [
			'Howitworks.id' => 'desc']]);
		}else{
			$Howitworks_info = $this->Paginator->paginate($HowitworksModel,[ 'limit' => 200,
			'order' => [
			'Howitworks.id' => 'desc']]);
		}
		$this->set('Howitworks_info',$Howitworks_info);
	}
	
	///////////////////////////////////////ADD WORKS////////
	function addworks()
	{
		 $this->viewBuilder()->layout('admin_dashboard');
		//Load Categories model
			$howitworksModel = TableRegistry::get("Howitworks");
			$howitworksData = $howitworksModel->newEntity();
					//Upload category image
		   if(isset($this->request->data) && !empty($this->request->data) )
		   {
		
			$howitworksData = $howitworksModel->patchEntity($howitworksData,$this->request->data['Howitworks']);
			$imagename = $this->request->data['Howitworks']['image']['name'];
			//pr($howitworksData->errors())	; die;
			if(!$howitworksData->errors()){
				//Upload category image
				if($imagename!=''){
					$howitworksImg = $this->admin_upload_file('howitworksImg',$this->request->data['Howitworks']['image']);
				
					$howitworksImg = explode(':',$howitworksImg);
					if($howitworksImg[0]=='error')
					{
					   $this->displayErrorMessage($howitworksImg[1]);
					   return $this->redirect($this->referer());
					}
					
					else{
						$howitworksData->image = $howitworksImg[1];
					}				
				}else{
				   unset($howitworksData->image);
				}
				//Save Category data
		
				//CODE FOR MULTILIGUAL START
				$this->i18translation($howitworksModel);
				$this->i18translation($howitworksData);
				//CODE FOR MULTILIGUAL END
				if($howitworksModel->save($howitworksData)){
				$this->displaySuccessMessage("New Category have been added Successfully");
				return $this->redirect(['controller' => 'extras', 'action' => 'howitworks']);
				}	
			}
			
			else{
				//Set errors
				$this->set('addworks', $howitworksData);
				$this->set([
				'errors' => $howitworksData->errors(), 
				'_serialize' => ['errors']]);
				return;
			}
		}$this->set('addworks', $howitworksData);
	}
	
	
	//////////////////////EDIT//////////
	
	function editworks($id=null)
	{
		$this->viewBuilder()->layout('admin_dashboard');
		$id=convert_uudecode(base64_decode($id));
		
		$HowitworksModel = TableRegistry::get("Howitworks");
		
		
		if(isset($this->request->data) && !empty($this->request->data))
		{
		
			$HowitworksData = $HowitworksModel->newEntity($this->request->data['Howitworks'],['validate' => true]);
			 
			$HowitworksData->id = $promocodeId = convert_uudecode(base64_decode($this->request->data['howId']));
			
			$imagename = $this->request->data['Howitworks']['image']['name'];
			 pr($HowitworksData->errors()); die;
			if (!$HowitworksData->errors()){
				//Upload user image
				if($imagename!=''){
					$HowitworksImg = $this->admin_upload_file('HowitworksImg',$this->request->data['Howitworks']['image']);
					
					$HowitworksImg = explode(':',$HowitworksImg);
					if($HowitworksImg[0]=='error'){
					   $this->displayErrorMessage($HowitworksImg[1]);
					   return $this->redirect($this->referer());
					}else{
						$HowitworksData->image = $HowitworksImg[1];
					}				
				}else{
				   unset($HowitworksData->image);
				}

				//CODE FOR MULTILIGUAL START
				$this->i18translation($HowitworksModel);
				$this->i18translation($HowitworksData);
				//CODE FOR MULTILIGUAL END
				//Update user data
				if($HowitworksModel->save($HowitworksData)){
					$this->displaySuccessMessage("Records have been updated successfully");
					return $this->redirect(['controller'=>'extras','action'=>'howitworks']);
				}
			}else{
				$HowitworksInfo = $HowitworksModel->get($categoryId);
				$this->set('HowitworksInfo',$HowitworksInfo);
				$this->set([
				'errors' => $HowitworksData->errors(), 
				'_serialize' => ['errors']]);
				return;
			}
		
			
	
		}
		else{
			$HowitworksInfo = $HowitworksModel->get($id);
			$this->set('Howitwork',$HowitworksInfo);
		}		
	}
 */
