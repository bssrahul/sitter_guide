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
use Cake\I18n\Time;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */

class PromocodeController extends AppController
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
	function addPromocode(){ 
	
			$this->viewBuilder()->layout('admin_dashboard');
		   //Load Categories model
			$PromocodesModel = TableRegistry::get("PromoCodes");
			$promocode = $PromocodesModel->newEntity();
			if ($this->request->is('post')) {
				$promocode = $PromocodesModel->patchEntity($promocode, $this->request->data);
				if ($PromocodesModel->save($promocode)) {
					$this->Flash->success(__('Promo code has been saved.'));
					return $this->redirect(['action'=>'promocodes-listing','controller'=>'promocode']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
				
			}
			$this->set('promocode', $promocode);
			
			
	}
	/**Function for edit user
	*/
	function editPromocode($id = NULL){
		$this->viewBuilder()->layout('admin_dashboard');
		$id=convert_uudecode(base64_decode($id));
		$PromocodesModel = TableRegistry::get("PromoCodes");
	 
		if(isset($this->request->data) && !empty($this->request->data)){
			$promocodeData = $PromocodesModel->newEntity($this->request->data['PromoCodes'],['validate' => true]);
			//echo "<pre>";print_r($this->request->data);die;
		    $promoId = $this->request->data['PromoCodes']['id'];
			if($this->request->data['PromoCodes']['coupon_type'] == 'fixed_coupon'){
                // $promocodeData->discounted_coupon = null;
			}else{
               //$promocodeData->fixed_coupon = null;
			}
        
			if (!$promocodeData->errors()){
				//Update user data
				//CODE FOR MULTILIGUAL START
				$this->i18translation($PromocodesModel);
				$this->i18translation($promocodeData);
				//CODE FOR MULTILIGUAL END
				//echo "<pre>";print_r($promocodeData);die;
				if($PromocodesModel->save($promocodeData)){
					$this->Flash->success(__("Records has been updated successfully"));
					return $this->redirect(['action'=>'promocodes-listing','controller'=>'promocode']);
				}
			}else{
			   $promocodeInfo = $PromocodesModel->get($promoId);
			    $this->set('promocodeInfo',$promocodeInfo);	
				
				$session = $this->request->session();
				$session->write("errors",$promocodeData->errors());
				
				return $this->redirect('/promocode/edit-promocode/'.base64_encode(convert_uuencode($promoId)));
			}
		}else{
			$promocodeInfo = $PromocodesModel->get($id);
			$this->set('promocodeInfo',$promocodeInfo);
		}
	}
	/**Function for Categories list
	*/
	function promocodesListing(){
		$this->viewBuilder()->layout('admin_dashboard');
		$this->loadComponent('Paginator');
		$this->set('modelName','PromoCodes');
		$PromocodesModel = TableRegistry::get("PromoCodes");
		//CODE FOR MULTILIGUAL START
		$this->i18translation($PromocodesModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$promocodes_info = $this->Paginator->paginate($PromocodesModel,[
			'conditions' => [
			'PromoCodes.id LIKE' => '%'.$data['PromoCodes']['id'].'%'],
			'limit' => 10,
			'order' => [
			'PromoCodes.modified' => 'desc']]);
		}else{
			$promocodes_info = $this->Paginator->paginate($PromocodesModel,[ 'limit' => 200,
			'order' => [
			'PromoCodes.modified' => 'desc']]);
		}
		$this->set('promocodes_info',$promocodes_info);
	}
		
}
?>
