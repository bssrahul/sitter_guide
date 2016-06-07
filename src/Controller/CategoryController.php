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

class CategoryController extends AppController
{
	public $helpers = ['Form'];
	 public function beforeFilter(Event $event)
    {
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
	function addCategory(){
		$this->viewBuilder()->layout('admin_dashboard');
		//Load Categories model
			$CategoriesModel = TableRegistry::get("Categories");
					//Upload category image
		   if(isset($this->request->data) && !empty($this->request->data)) {
		   
			$categoryData = $CategoriesModel->newEntity($this->request->data['Categories'],['validate' => true]);
			 $imagename = $this->request->data['Categories']['image']['name'];
				
			if(!$categoryData->errors()){
				//Upload category image
				if($imagename!=''){
					$categoryImg = $this->admin_upload_file('categoryImg',$this->request->data['Categories']['image']);
					
					$categoryImg = explode(':',$categoryImg);
					if($categoryImg[0]=='error'){
					   $this->Flash->error(__($categoryImg[1]));
					   return $this->redirect($this->referer());
					}else{
						$categoryData->image = $categoryImg[1];
					}				
				}else{
				   unset($categoryData->image);
				}
				//Save Category data
		
				//CODE FOR MULTILIGUAL START
				$this->i18translation($CategoriesModel);
				$this->i18translation($categoryData);
				//CODE FOR MULTILIGUAL END 
				if($CategoriesModel->save($categoryData)){
				$this->Flash->success(__('Record has been added Successfully'));
				return $this->redirect(['controller' => 'category', 'action' => 'categories-listing']);
				}	
			}else{
				//Set errors
				$this->set([
				'errors' => $categoryData->errors(), 
				'_serialize' => ['errors']]);
				return;
			}
		}
	}
	/**Function for edit user
	*/
	function editCategory($id = NULL){
		$this->viewBuilder()->layout('admin_dashboard');
		$id=convert_uudecode(base64_decode($id));
		$CategoriesModel = TableRegistry::get("Categories");
	 
		if(isset($this->request->data) && !empty($this->request->data)){
			
			$categoryData = $CategoriesModel->newEntity($this->request->data['Categories'],['validate' => true]);
			$categoryData->id = $categoryId = convert_uudecode(base64_decode($this->request->data['categoryId']));
			$imagename = $this->request->data['Categories']['image']['name'];
			 
			if (!$categoryData->errors()){
				//Upload user image
				if($imagename!=''){
					$categoryImg = $this->admin_upload_file('categoryImg',$this->request->data['Categories']['image']);
					
					$categoryImg = explode(':',$categoryImg);
					if($categoryImg[0]=='error'){
					  $this->Flash->error(__($categoryImg[1]));
					   return $this->redirect($this->referer());
					}else{
						$categoryData->image = $categoryImg[1];
					}				
				}else{
				   unset($categoryData->image);
				}

				//CODE FOR MULTILIGUAL START
				$this->i18translation($CategoriesModel);
				$this->i18translation($categoryData);
				//CODE FOR MULTILIGUAL END
				//Update user data
				$categoryData->date_modified = date('Y-m-d h:i:s');
				if($CategoriesModel->save($categoryData)){
					$this->Flash->success(__('Record has been added Successfully'));
					return $this->redirect(['action'=>'categories-listing','controller'=>'Category']);
				}
			}else{
				$categoryInfo = $CategoriesModel->get($categoryId);
				$this->set('categoryInfo',$categoryInfo);
				$this->set([
				'errors' => $categoryData->errors(), 
				'_serialize' => ['errors']]);
				return;
			}
		}else{
			$categoryInfo = $CategoriesModel->get($id);
			$this->set('categoryInfo',$categoryInfo);
		}
	}
	/**Function for Categories list
	*/
	function categoriesListing(){
		$this->viewBuilder()->layout('admin_dashboard');
		
		$this->loadComponent('Paginator');
		$this->set('modelName','Categories');
		$CategoriesModel = TableRegistry::get("Categories");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CategoriesModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$categories_info = $this->Paginator->paginate($CategoriesModel,[
			'conditions' => [
			'Categories.id LIKE' => '%'.$data['Categories']['id'].'%'],
			'limit' => 10,
			'order' => [
			'Categories.modified' => 'desc']]);
		}else{
			$categories_info = $this->Paginator->paginate($CategoriesModel,[ 'limit' => 200,
			'order' => [
			'Categories.modified' => 'desc']]);
		}
		$this->set('categories_info',$categories_info);
	}
	
}
?>
