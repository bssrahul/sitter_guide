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

class ReferalbonusController extends AppController
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

	/**Function for Referal Bonus list
	*/
	public function referalbonusListing()
    {

		$this->viewBuilder()->layout('admin_dashboard');
		$this->loadComponent('Paginator');
		//$this->set('modelName','PromoCodes');
		$UserReferWalletsModel = TableRegistry::get("UserReferWallets");
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UserReferWalletsModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		$UserReferWalletsData=$UserReferWalletsModel->find('all')->contain(['Users'])->toArray();
		//echo"<pre>"; print_r($UserReferWalletsData);die;
		
		$this->set('UserReferWalletsData',$UserReferWalletsData);
	}
	public function transfer()
    {
		$this->viewBuilder()->layout('admin_dashboard');
		$UserReferWalletsModel = TableRegistry::get("UserReferWallets");
		$checkedBoxIds=$this->request->data['singlecheck'];
		$checkstatusIds=array();
		if(!empty($checkedBoxIds)){
			foreach($checkedBoxIds as $key => $val){
				$checkstatus=$UserReferWalletsModel->find('all')->where(['user_id'=>$val])->where(['status'=>'Pending'])->toArray();
				if(!empty($checkstatus[0]['user_id'])){
					$checkstatusIds[]=$checkstatus[0]['user_id'];
				}
				
			}
		}
		
		
		$flag=0;
		if(!empty($checkstatusIds)){
			foreach($checkstatusIds as $key => $val){
				
				$query = $UserReferWalletsModel->query();
				$query->update()
					->set(['status' => 'Paid'])
					->where(['user_id' => $val])
					->execute();
			}
			$flag=1;
		}else{
			$this->Flash->error(__("Money Already Transfred of This User"));
			return $this->redirect(['action'=>'referalbonus-listing','controller'=>'Referalbonus']);
		
		}
		if($flag == 1){
			$this->Flash->success(__("Money has been Transfred successfully"));
			return $this->redirect(['action'=>'referalbonus-listing','controller'=>'Referalbonus']);
			
		}
    }	
}
?>
