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
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
//require_once(ROOT . DS  . 'vendor' . DS  . 'Facebook' . DS . 'src' . DS . 'Facebook' . DS . 'autoload.php');
//use Facebook;

use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */

class SearchController extends AppController
{
	public $helpers = ['Form','GoogleMap'];
	/**
	* Function which is call at very first when this controller load
	*/
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		if($this->CheckGuestSession() && ($this->request->action == 'login' || $this->request->action == 'signup' || $this->request->action=="forgotPassword"))
		{
			$this->setErrorMessage($this->stringTranslate(base64_encode('You can not access this page because you are already loggedin.')));
			return $this->redirect(['controller' => 'Guests', 'action' => 'home']);
		}
		if(!$this->CheckGuestSession() && in_array($this->request->action,array('profile','profileEdit','addUserPet'))){
			return $this->redirect(['controller' => 'Guests','action'=>'home']);
			
		}
    }
    
	public function initialize()
    {

		parent::initialize();
		// Loaded EmailTemplate Model
		$SiteModel = TableRegistry::get('siteConfigurations');
		$siteConfiguration = $SiteModel->find('all')->first();
		$this->set('siteConfiguration', $siteConfiguration);
		

		$sliderModel = TableRegistry::get('Sliders');
		$sliderVideo = $sliderModel->find('all')->first();
		$this->set('sliderVideo', $sliderVideo);
		
	}
	
	/**
	* Function to search profiles
	*/
	function search(){
		
		$this->viewBuilder()->layout('landing');
		$this->request->data = $_REQUEST;	
        $session = $this->request->session();
		$currentLang = $session->read('requestedLanguage');
		
		//ADD MODEL
		$UsersModel = TableRegistry::get('Users');
		
		$conditions = array();
		
		if(!empty($this->request->data)){
			
			pr($this->request->data) ;
			//SET CONDITIONS FOR MARKET PLACES LIKE RECREATION, GROOMING, DRIVER, TRAINING ETC
			if(isset($this->request->data['Search']['marketplace']) && $this->request->data['Search']['marketplace'] !=""){
				
				$marketPlacesArr = explode(",",$this->request->data['Search']['marketplace']);
				
				if(!empty($marketPlacesArr)){
					$inStr = '';
					$totalMarketPlace = count($marketPlacesArr);
					$i=1;
					foreach($marketPlacesArr as $marketplaceVal){
						if($i != $totalMarketPlace){$commaAdded = ",";}else{$commaAdded='';}
						$inStr .="'".$marketplaceVal."'".$commaAdded;
						$conditions['OR'][] = 'UserSitterServiceDetails.'.$marketplaceVal.'=1';
						$i++;
					}
					$conditions['OR'][] = 'UserSitterServiceDetails.service_type IN(' . $inStr. ')'; //find service type from comma spareted value	
				}
			}
			
			//SET CONDITIONS FOR LANGUGE KNOW
			if(isset($this->request->data['Search']['languages']) && $this->request->data['Search']['languages'] !=""){
				
				$conditions['OR'][] = 'userProfessionalAccreditationsDetails.languages LIKE "%' .$this->request->data['Search']['languages'].'%"'; //find service type from comma spareted value
				
			}
			
			;		
			$query = $UsersModel->find('all')
			->where($conditions)
			->contain([
				'UserProfessionalAccreditations','userProfessionalAccreditationsDetails','UserSitterServiceDetails'
			])->toArray();
			pr($query);die;
			//$searchData = $UsersModel->find('all',['contain'=>['UserProfessionalAccreditations','userProfessionalAccreditationsDetails','UserSitterServiceDetails']])->where($conditions);
			//pr($searchData); die;
		}	
		
		
		if(!isset($currentLang) && empty($currentLang)){

			$this->setGuestStore("en","Guests","index");
		}
		
	}
	
	/**
	* Function to search profiles
	*/
	function searchByLocation(){
		
		$this->viewBuilder()->layout('landing');
		$session = $this->request->session();
		$currentLang = $session->read('requestedLanguage');
		
		//ADD MODEL
		$UsersModel = TableRegistry::get('Users');
		
		$conditions = array();
		
		if(!empty($this->request->data)){
			
			if($this->request->data['location_autocomplete_lat_long'] !=""){
				//EXPLODE LATITUDE LONGITUDE FROM SELECTED LOCATION
				$sourceSelectedLocation = str_replace(array("(",")"), array("",""), $this->request->data['location_autocomplete_lat_long']);
				$explodedArrayOfSourceLocation = explode(",",$sourceSelectedLocation);
				$sourceLocationLatitude = $explodedArrayOfSourceLocation[0];
				$sourceLocationLongitude = $explodedArrayOfSourceLocation[1];
			}else{
				//GET LATITUDE LONGITUDE FROM SELECTED LOCATION
				$sourceSelectedLocation = $this->request->data['location_autocomplete'];
				$url = "http://maps.google.com/maps/api/geocode/json?address=".urlencode($sourceSelectedLocation)."&sensor=false"; 
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				$response = curl_exec($ch);
				curl_close($ch);
				$response_a = json_decode($response);
				$sourceLocationLatitude = $response_a->results[0]->geometry->location->lat;
				$sourceLocationLongitude = $response_a->results[0]->geometry->location->lng;
			}
		
			$query='SELECT
						  id, (
							3959 * acos (
							  cos ( radians('.$sourceLocationLatitude.') )
							  * cos( radians( latitude ) )
							  * cos( radians( longitude ) - radians('.$sourceLocationLongitude.') )
							  + sin ( radians('.$sourceLocationLatitude.') )
							  * sin( radians( latitude ) )
							)
						  ) AS distance
						FROM users
						HAVING distance < 30
						ORDER BY distance';
			$connection = ConnectionManager::get('default');
			$results = $connection->execute($query)->fetchAll('assoc');	//RETURNS ALL USER ID WITH DISTANSE			
			
			if(!empty($results)){
				$idArr = array();
				$distanceAssociation = array();
				foreach($results as $resultsValue){
						$idArr[] = $resultsValue['id']; //STORE ALL ID INTO AN ARRAY
						$distanceAssociation[$resultsValue['id']] = $resultsValue['distance'];//STORE ALL DISTANCE ALONG WITH USER ID AS KEY INTO AN ARRAY
				}
				
				$userData = $UsersModel->find('all',['UserProfessionalAccreditations','userProfessionalAccreditationsDetails','UserSitterServiceDetails'])
							   ->where(['id' => $idArr], ['id' => 'integer[]'])
							   ->toArray();
				
				
			}
		}
		
		$this->set('resultsData',$userData);
		$this->set('distanceAssociation',$distanceAssociation);
		$this->render("search");
		
	}

}
?>
