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
class FavclientController extends AppController
{
  public $helpers = ['Form'];
   public $paginate = [
         'limit' => 25,
         'order' => [
         'Userss.email' => 'asc'
         ]];
   //$this->loadComponent('Resize');
   //Function for check admin session
   
	function favoriteClient($sitterId = NULL, $userId = NULL)
	{
		
		if($userId==""){
			
			$this->setErrorMessage($this->stringTranslate(base64_encode('Kindly login before perform this action.')));
			echo "Error:not-loggedin";die;
			
		}else{
			
			$FavClientsModel = TableRegistry::get('FavClients');
			if($sitterId!='' || $userId!='')
			{
				$sitterId = convert_uudecode(base64_decode($sitterId)); 
				$userId = convert_uudecode(base64_decode($userId)); 
			
			
				$FavClients = $FavClientsModel->find('all',['conditions'=>['FavClients.sitter_id'=>$sitterId,'FavClients.user_id'=>$userId]])->first();
			
				
				$FavClientsRes = isset($FavClients->id)?$FavClients->id:0;
				
				if(count($FavClients) > 0){
				
					$entity = $FavClientsModel->get($FavClientsRes);
				
					$FavClientsModel->delete($entity);
					echo "Success:unlike";die;
				}
				else
				{	
					$FavClientsData = $FavClientsModel->newEntity();
					
					$FavClientsData->sitter_id = $sitterId;
					$FavClientsData->user_id = $userId;
					$FavClientsModel->save($FavClientsData);
					echo "Success:like";die;
				}
			}	
		}	
		
	} 
	
	public function favouriteClients(){
		$session = $this->request->session();
        $userId = $session->read('User.id');
		
		$this->viewBuilder()->layout('profile_dashboard');
		//Fetch Data Leading-sitting
		$UsersModel=TableRegistry :: get('Users');
		$FavourateModel=TableRegistry :: get('FavClients');
		
		$favourateData = $FavourateModel->find('all', [
		'fields' => [
					'sitter_id' => 'FavClients.sitter_id',
					'count_favourate' => 'COUNT(FavClients.sitter_id)',
					
					],
					 'order' => ['count_favourate' => 'DESC'],
					 'group' => ['FavClients.sitter_id'],
					])->where(['user_id'=>$userId])->hydrate(false)->contain(['Users'=> 
					function ($q){
						return $q
						->select(['id','image','first_name','last_name','city'])
						->contain(['UserRatings']);
					}
					]);
					//echo "<pre>"; print_r($favourateData);die;
		$this->set('FavUsersdata',$this->paginate($favourateData));
	}
		
}
	

