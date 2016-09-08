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
use Cake\Event\Event;
use Cake\I18n\Time;



/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class TransactionController extends AppController
{
	public $helpers = ['Form'];
	/**
	* Function which is call at very first when this controller load
	*/
	
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		if($this->CheckGuestSession()==false)
		{
		  return $this->redirect(['controller' => 'guests', 'action' => 'home']);
			exit();
		}
    }
	
	public function initialize()
    {
		parent::initialize();

       //GET LOCALE VALUE
		$session = $this->request->session();
		$setRequestedLanguageLocale  = $session->read('setRequestedLanguageLocale'); 
		I18n::locale($setRequestedLanguageLocale);
		
		//$currentLang = $session->read('requestedLanguage');
		$currentLocal = substr($setRequestedLanguageLocale,0,2);
		$this->set('currentLocal', $currentLocal);
		
		// Loaded EmailTemplate Model
		$SiteModel = TableRegistry::get('siteConfigurations');
		$siteConfiguration = $SiteModel->find('all')->first();
		$this->set('siteConfiguration', $siteConfiguration);
		
		$this->set('user_avail_bal', $this->getLoggedInUserBalance($session->read('User.id')));			
		

	}
	
    public function paidTransaction(){
		$session = $this->request->session();
        $userId = $session->read('User.id');
		
		
		$this->viewBuilder()->layout('profile_dashboard');
		//Fetch Data Leading-sitting
		$TransactionModel=TableRegistry :: get('Transactions');
		
		$transactionData = $TransactionModel->find('all')
											->where(['Transactions.user_id'=>$userId])
											->hydrate(false)
											->contain(['Users'=> 
															function ($q){
																return $q
																->select(['image','first_name','last_name','state','country','facebook_id','is_image_uploaded']);
															}])
											->contain(['BookingRequests'=> 
													function ($q){
														return $q
														->select('sitter_id');
													}
												])				
											->toArray();
		if(!empty($transactionData)){
			
			$userModel=TableRegistry :: get('Users');
			
			foreach($transactionData as $k=>$req){
				
				$transactionData[$k]['booking_request']['user'] = $userModel->find('all')
					->select(['image','first_name','last_name','state','country','facebook_id','is_image_uploaded'])
					->where(['Users.id'=>$req['booking_request']['sitter_id']])
					->hydrate(false)
					->first();
			}
			
		}
		//echo "<pre>"; print_r($transactionData);die;
		$this->set('transactionData',$transactionData);
	}
	
	public function recievedTransaction(){
		$session = $this->request->session();
        $userId = $session->read('User.id');
		
		
		$this->viewBuilder()->layout('profile_dashboard');
		//Fetch Data Leading-sitting
		$BookingRequestsModel = TableRegistry::get('BookingRequests');
		$TransactionModel=TableRegistry :: get('Transactions');
		$FavclientModel=TableRegistry :: get('FavClients');
		$FavclientData= $FavclientModel->find('all')->where(['user_id'=>$userId])->toArray();
		//echo "<pre>"; print_r($FavclientData); die;
		
		$get_requests = $BookingRequestsModel->find('all')
		->where(["BookingRequests.sitter_id = $userId"])
		->select(['user_id','sitter_id'])
		->hydrate(false)->toArray();
		//pr($get_requests); die;
		if(!empty($get_requests)){
			foreach($get_requests as $req){
				$transactionData = $TransactionModel->find('all')
					->where(['Transactions.user_id'=>$req['user_id']])
					->hydrate(false)
					->contain(['Users'=> 
									function ($q){
										return $q
										->select(['image','first_name','last_name','state','country','facebook_id','is_image_uploaded']);
									}])
					->contain(['BookingRequests'=> 
							function ($q){
								return $q
								->select(['sitter_id']);
							}
						])		
						->contain(['FavClients' => function($q) use ($userId){
                   				return $q
								->select(['user_id','sitter_id'])->where(['user_id'=>$userId]);
							}])					
					->toArray();
				if(!empty($transactionData)){
			
					$userModel=TableRegistry :: get('Users');
			
					foreach($transactionData as $k=>$req){
						
						$transactionData[$k]['booking_request']['user'] = $userModel->find('all')
							->select(['image','first_name','last_name','state','country','facebook_id','is_image_uploaded'])
							->where(['Users.id'=>$req['booking_request']['sitter_id']])
							->hydrate(false)
							->first();
					}
					
				}	
					
			}
			
		}
		//echo "<pre>"; print_r($transactionData);die;
		$this->set('userId',$userId);
		$this->set('transactionData',$transactionData);
		$this->set('FavclientData',$FavclientData);
	}
	
	
	
}
?>
