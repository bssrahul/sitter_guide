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
		
}
	

