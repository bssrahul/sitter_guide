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
use Cake\Event\Event;
require_once(ROOT . DS  . 'vendor' . DS  . 'Calendar' . DS . 'availabilityCalendar.php');
use availabilityCalendar;
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
        
        $categoryModel = TableRegistry::get('Categories');
		$categoryData = $categoryModel->find('list',['fields' => ['title'],'conditions'=>['Categories.slug'=>'distance']])->toArray();
		$distancearray = array(''=>'Distance');
		
		if(!empty($categoryData)){
			foreach($categoryData as $k=>$v){
				$distancearray[$v]= $v." Kms";
			}
		}
		$this->set('distancearray', $distancearray);
		$session = $this->request->session();
		$this->set('logedInUserId', $session->read('User.id'));
		
		if(!$this->CheckGuestSession() && in_array($this->request->action,array('thankYou','sitterContact'))){
			$this->setErrorMessage($this->stringTranslate(base64_encode('Authentication Failed! Please log in before.')));
			
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
		//For fun and news
		$UserBlogsModel = TableRegistry::get('UserBlogs');
		$servicesModel = TableRegistry::get('Services');
		
		$blogsInfo = $UserBlogsModel->find('all', ['order' => ['UserBlogs.modified' => 'desc']]) ->limit(3)->where(['UserBlogs.featured' =>1])->where(['UserBlogs.status' =>1])->toArray();
		$this->set('blogsInfo',$blogsInfo);
		
		$servicesInfo = $servicesModel->find('all', ['order' => ['Services.created' => 'desc']]) ->limit(5)->where(['Services.status' =>1])->toArray();
		$this->set('servicesInfo',$servicesInfo);
		
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
		$UserSitterFavouriteModel = TableRegistry::get('UserSitterFavourites');
		
		$conditions = array();
		
		if(!empty($this->request->data)){
		
		
		    $or_condition = array();
			$and_condition = array();
			//pr($this->request->data); die;
			//SET CONDITION FOR TOP TAB SELECTED (TABLE NAME : users_sitter_services)
			
			/*PET COUNT CONDITION START*/
			if(isset($this->request->data['Search']['pet_count']) && ($this->request->data['Search']['pet_count'] != 0)){
				
				if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'house_sitting')){
				
					$and_condition = array_merge($and_condition,array('UserSitterServices.visits_limit <= '.$this->request->data['Search']['pet_count']));
				
				}
				
				if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'drop_visit' || $this->request->data['Search']['selected_service'] == 'day_night_care')){
				
					$or_condition = array_merge($or_condition,array('UserSitterServices.day_care_limit <= '.$this->request->data['Search']['pet_count']));
					$or_condition = array_merge($or_condition,array('UserSitterServices.night_care_limit <= '.$this->request->data['Search']['pet_count']));
				
				}
				
				if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'marketplace')){
				
					$and_condition = array_merge($and_condition,array('UserSitterServices.hourly_services_limit <= '.$this->request->data['Search']['pet_count']));
				
				}
				
			}/*PET COUNT CONDITION END*/
			
			/*SERVICES CONDITION START*/
			if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'house_sitting')){
				
				$and_condition = array_merge($and_condition,array('UserSitterServices.guest_house_status=1'));
			
			}
			else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'drop_visit')){
				
				$and_condition = array_merge($and_condition,array('UserSitterServices.gh_drop_in_visit_status=1'));
			
			}else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'day_night_care')){
				/*WHAT TIME DAY/NIGHT CONDITION START*/	
				if(isset($this->request->data['Search']['what_time']) && !empty($this->request->data['Search']['what_time'])){
					
					if(isset($this->request->data['Search']['what_time']['day_care']) && !empty($this->request->data['Search']['what_time']['day_care'])){
						
						$and_condition = array_merge($and_condition,array('(UserSitterServices.sh_day_care_status=1 OR UserSitterServices.gh_day_care_status=1)'));
						
					}
					
					if(isset($this->request->data['Search']['what_time']['night_care']) && !empty($this->request->data['Search']['what_time']['night_care'])){
						
						$and_condition = array_merge($and_condition,array('(UserSitterServices.sh_night_care_status=1 OR UserSitterServices.gh_night_care_status=1)'));
						
					}
				}else{
						$and_condition = array_merge($and_condition,array('(UserSitterServices.sh_day_care_status=1 OR UserSitterServices.gh_day_care_status=1) '));
						$and_condition = array_merge($and_condition,array('(UserSitterServices.sh_night_care_status=1 OR UserSitterServices.gh_night_care_status=1) '));
				
				}
				/*WHAT TIME DAY/NIGHT CONDITION END*/	
				
				
			}else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'marketplace')){
				$and_condition = array_merge($and_condition,array('UserSitterServices.market_place_status=1'));
            }
            else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'bording')){
				$and_condition = array_merge($and_condition,array('UserSitterServices.sitter_house_status=1'));
            }
			/*SERVICES CONDITION END*/

			/*MARKETPLACE CONDITION START*/
			if(isset($this->request->data['Search']['marketplace']) && !empty($this->request->data['Search']['marketplace'])){
			
				 $marker_place_service = explode(",",$this->request->data['Search']['marketplace']);
			
				foreach($marker_place_service as $service_type)
				{
					if($service_type == 'training'){
					
						$and_condition = array_merge($and_condition,array('UserSitterServices.mp_training_status=1'));
					
					}else if($service_type == 'recreation'){
						
						$and_condition = array_merge($and_condition,array('UserSitterServices.mp_recreation_status=1'));
			
					}else if($service_type == 'grooming'){
						
						$and_condition = array_merge($and_condition,array('UserSitterServices.mp_grooming_status=1'));
					
					}else if($service_type == 'driver'){
						
						$and_condition = array_merge($and_condition,array('UserSitterServices.mp_driver_service_status=1'));
					} 
				}
			}
			/*MARKETPLACE CONDITION END*/
			
			/*START - END DATE CONDITION START*/
			if((isset($this->request->data['Search']['from_date']) && isset($this->request->data['Search']['to_date'])) && ($this->request->data['Search']['from_date'] !='' && $this->request->data['Search']['to_date'] !="")){
			
				$startDate = $this->request->data['Search']['from_date'];
				$endDate = $this->request->data['Search']['to_date'];
				
				$and_condition  = array_merge($and_condition,array("(UserSitterAvailability.start_date >= $startDate AND UserSitterAvailability.end_date <=$startDate)"));
				$and_condition  = array_merge($and_condition,array("(UserSitterAvailability.start_date >= $endDate AND UserSitterAvailability.end_date <=$endDate)"));
				$and_condition  = array_merge($and_condition,array("UserSitterAvailability.avail_status=1"));
				
			}else if(isset($this->request->data['Search']['from_date']) && $this->request->data['Search']['from_date'] !=''){
				
				$startDate = $this->request->data['Search']['from_date'];
							
				$and_condition  = array_merge($and_condition,array("(UserSitterAvailability.start_date >= $startDate AND UserSitterAvailability.end_date <=$startDate)"));
				$and_condition  = array_merge($and_condition,array("UserSitterAvailability.avail_status=1"));
			
			}else if(isset($this->request->data['Search']['to_date']) && $this->request->data['Search']['to_date'] !=''){
				
				$endDate = $this->request->data['Search']['to_date'];
				
				$and_condition  = array_merge($and_condition,array("(UserSitterAvailability.start_date >= $endDate AND UserSitterAvailability.end_date <=$endDate)"));
				$and_condition  = array_merge($and_condition,array("UserSitterAvailability.avail_status=1"));
			}
			/*START - END DATE CONDITION END*/
			
			/*DOGSIZE CONDITION START*/
			if(isset($this->request->data['Search']['dog_size']) && ($this->request->data['Search']['dog_size'] != '')){
				
				$and_condition = array_merge($and_condition,array('FIND_IN_SET("'.$this->request->data['Search']['dog_size'].'", UserAboutSitters.sh_pet_sizes)'));
				
			
			}
			/*DOGSIZE CONDITION END*/
			
			/*WEEK DAY CONDITION START*/
			if(isset($this->request->data['Search']['booking_days']) && ($this->request->data['Search']['booking_days'] != '')){
				
				$and_condition = array_merge($and_condition,array('UserSitterAvailabilityDays.available_days LIKE "%'.$this->request->data['Search']['booking_days'].'%"'));
				
			
			}
			/*DOGSIZE CONDITION END*/
			
			//SET WHERE OPPRANDS INTO MYSQL 
			if(!empty($or_condition) || !empty($and_condition)){
				$where_finalConditions =' WHERE ';
			}else{
				$where_finalConditions ='';
			}
						          
			if(!empty($or_condition)){
				$final_OR_Conditions = implode(" OR ",$or_condition); 
				 $where_finalConditions .= '('.$final_OR_Conditions.")";
			}
			
			if(!empty($and_condition)){
				if(!empty($or_condition)){
					
					$final_AND_Conditions = implode(" AND ",$and_condition); 
					$where_finalConditions .= ' AND ('.$final_AND_Conditions.")";	
				
				}else{
					$final_AND_Conditions = implode(" AND ",$and_condition); 
					$where_finalConditions .= '('.$final_AND_Conditions.")";	
				}
					
				
			}
			
			
			
			if($this->request->data['Search']['zip_code'] ==""){
				
				//SET LAT LONG AS PER IP ADDRESS
				$sourceLocationLatitude = '30.7399738';
				$sourceLocationLongitude = '76.7567368';
			}else{
				
				//GET LATITUDE LONGITUDE FROM SELECTED ZIP CODE
				$url = "http://maps.google.com/maps/api/geocode/json?address=".urlencode($this->request->data['Search']['zip_code'])."&sensor=false"; 
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				$response = curl_exec($ch);
				curl_close($ch);
				$response_a = json_decode($response);
				@$sourceLocationLatitude = $response_a->results[0]->geometry->location->lat;
				@$sourceLocationLongitude = $response_a->results[0]->geometry->location->lng;
			}

		
			$searchByDistance = isset($this->request->data['Search']['distance'])?$this->request->data['Search']['distance']:DEFAULT_RADIUS;
		
			 $query='SELECT
						  Users.id, (
							3959 * acos (
							  cos ( radians('.$sourceLocationLatitude.') )
							  * cos( radians( latitude ) )
							  * cos( radians( longitude ) - radians('.$sourceLocationLongitude.') )
							  + sin ( radians('.$sourceLocationLatitude.') )
							  * sin( radians( latitude ) )
							)
						  ) AS distance
						
						FROM 
						users as Users 
						
						LEFT JOIN  user_professional_accreditations_details as userProfessionalAccreditationsDetails  
						ON  Users.id = userProfessionalAccreditationsDetails.user_id
						
						LEFT JOIN 
						user_sitter_houses as UserSitterHouses 
						ON Users.id = UserSitterHouses.user_id
						
						LEFT JOIN 
						user_about_sitters as UserAboutSitters 
						ON Users.id = UserAboutSitters.user_id
						
						LEFT JOIN 
						user_sitter_availability as UserSitterAvailability 
						ON Users.id = UserSitterAvailability.user_id
						
						LEFT JOIN 
						user_sitter_availability_days as UserSitterAvailabilityDays 
						ON Users.id = UserSitterAvailabilityDays.user_id
						
						LEFT JOIN 
						user_sitter_services as UserSitterServices 
						ON Users.id = UserSitterServices.user_id
						
						'.$where_finalConditions.'
						
						HAVING distance < '.$searchByDistance.'
						
						ORDER BY distance';
		
			$connection = ConnectionManager::get('default');
			$results = $connection->execute($query)->fetchAll('assoc');	//RETURNS ALL USER ID WITH DISTANSE 			
			
			if(!empty($results)){
				$idArr = array();
				$distanceAssociation = array();
				foreach($results as $resultsValue){
						
						$idArr[] = $resultsValue['id']; //STORE ALL ID INTO AN ARRAY
						
						//STORE ALL DISTANCE ALONG WITH USER ID AS KEY INTO AN ARRAY
						$distanceAssociation[$resultsValue['id']] = $resultsValue['distance'];
				}
				$userData = $UsersModel->find('all',['contain'=>['UserAboutSitters','UserRatings'=>['Users'],'UserSitterServices','UserSitterGalleries','Users_badge']])
							   ->where(['Users.id' => $idArr], ['Users.id' => 'integer[]'])
							   ->toArray();
							   
				/*CHECK IN ARRAY, IS USER HAVE SET SERVICES AND RATES VALUE OR NOT, IF NOT THEN DELETE THIS INDEX START*/
				
				if(!empty($userData)){
					$customArray=array();
					foreach($userData as $arrK=>$arrayAdjust){
						
						if(isset($arrayAdjust['user_sitter_services']) && !empty($arrayAdjust['user_sitter_services'])){
							$customArray[] = $arrayAdjust;
						}else{
							unset($userData[$arrK]);
						}
					}	
				}
				$userData = $customArray;
				/*CHECK IN ARRAY, IS USER HAVE SET SERVICES AND RATES VALUE OR NOT, IF NOT THEN DELETE THIS INDEX END*/
				
				$loggedInUserID = $session->read('User.id');
				if($loggedInUserID !=''){
					if(!empty($userData)){
						foreach($userData as $k=>$eachRow){
								
							$UserSitterFavourite = $UserSitterFavouriteModel->find('all',['conditions'=>['UserSitterFavourites.sitter_id'=>$eachRow->id,'UserSitterFavourites.user_id'=>$loggedInUserID]])->count();
							if($UserSitterFavourite>0){
								$userData[$k]['is_favourite'] =  "yes";
							}else{
								$userData[$k]['is_favourite'] =  "no";
							}
								
						}	 
					}
				}
				
			
				$this->set('resultsData',$userData);
				$this->set('searchByDistance',$searchByDistance);
				$this->set('distanceAssociation',($distanceAssociation)?$distanceAssociation:'');
				$this->set('sourceLocationLatitude',($sourceLocationLatitude)?$sourceLocationLatitude:'');
				$this->set('sourceLocationLongitude',($sourceLocationLongitude)?$sourceLocationLongitude:'');
				$this->set('headerSearchVal',(@$this->request->data['location_autocomplete'])?@$this->request->data['location_autocomplete']:'');
			}		
			
		}		
		
		
		
		
		
		if(!isset($currentLang) && empty($currentLang)){

			$this->setGuestStore("en","Guests","index");
		}
		
	}
	
	
	/**
	* Function to search profiles
	*/
	function AjaxSearch(){
		
	
		$this->request->data = $_REQUEST;	
        $session = $this->request->session();
		$currentLang = $session->read('requestedLanguage');
		
		//ADD MODEL
		$UsersModel = TableRegistry::get('Users');
		$UserSitterFavouriteModel = TableRegistry::get('UserSitterFavourites');
		
		$conditions = array();
		
		if(!empty($this->request->data)){
		
		 //pr($this->request->data);die;
		    $or_condition = array();
			$and_condition = array();
			
			
			//SET CONDITIONS FOR LANGUGE KNOW (TABLE NAME : users_professional_accreditation_detail)	
			if(isset($this->request->data['Search']['languages']) && $this->request->data['Search']['languages'] !=""){
				
				$and_condition = array_merge($and_condition,array('FIND_IN_SET("'.$this->request->data['Search']['languages'].'", userProfessionalAccreditationsDetails.languages)'));
			
			}
			 
			//SET CONDITIONS FOR 2+ EXP (TABLE NAME : users_professional_accreditation_detail)	
			if(isset($this->request->data['Search']['experience']) && $this->request->data['Search']['experience'] ==1){
				
				$and_condition = array_merge($and_condition,array('userProfessionalAccreditationsDetails.experience >=2'));
				
			} 
			
			//SET CONDITION FOR FIRST AID (TABLE NAME : users_professional_accreditation_detail)	
			if(isset($this->request->data['Search']['first_aid']) && $this->request->data['Search']['first_aid'] ==1){
				
				$and_condition = array_merge($and_condition,array('(userProfessionalAccreditationsDetails.injected_madications=1 OR userProfessionalAccreditationsDetails.oral_madications=1)'));
				
				
			} 
			
			//SET CONDITION FOR SITTER HOUSE TYPE FARM (TABLE NAME : users_sitter_house)
			if(isset($this->request->data['Search']['sitter_info']['farm']) && $this->request->data['Search']['sitter_info']['farm'] ==1){
				
				$or_condition = array_merge($or_condition,array('UserSitterHouses.property_type="farm"'));
			
			} 
			
			//SET CONDITION FOR SITTER HOUSE TYPE FLAT (TABLE NAME : users_sitter_house)
			if(isset($this->request->data['Search']['sitter_info']['flat']) && $this->request->data['Search']['sitter_info']['flat'] ==1){
				
				$or_condition = array_merge($or_condition,array('UserSitterHouses.property_type="flat"'));
				
			} 
			
			//SET CONDITION FOR SITTER HOUSE TYPE HOUSE (TABLE NAME : users_sitter_house)
			if(isset($this->request->data['Search']['sitter_info']['house']) && $this->request->data['Search']['sitter_info']['house'] ==1){
				 
				if(isset($this->request->data['Search']['sitter_info']['has_house'])){
                	 $or_condition = array_merge($or_condition,array('(UserSitterHouses.property_type="house" OR UserSitterHouses.property_type="farm")'));
				}else{
					 $or_condition = array_merge($or_condition,array('UserSitterHouses.property_type="house"'));	
				}	
			
			} 
			
			/*PET COUNT CONDITION START*/
			if(isset($this->request->data['Search']['pet_count']) && ($this->request->data['Search']['pet_count'] != 0)){
				
				if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'house_sitting')){
				
					$and_condition = array_merge($and_condition,array('UserSitterServices.visits_limit <= '.$this->request->data['Search']['pet_count']));
				
				}
				
				if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'drop_visit' || $this->request->data['Search']['selected_service'] == 'day_night_care')){
				
					$and_condition = array_merge($and_condition,array('(UserSitterServices.day_care_limit <= '.$this->request->data['Search']['pet_count'].' OR UserSitterServices.night_care_limit <= '.$this->request->data['Search']['pet_count'].')'));
					
				
				}
				
				if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'marketplace')){
				
					$and_condition = array_merge($and_condition,array('UserSitterServices.hourly_services_limit <= '.$this->request->data['Search']['pet_count']));
				
				}
				
			}/*PET COUNT CONDITION END*/
			
			/*MARKETPLACE CONDITION START*/
			if(isset($this->request->data['Search']['marketplace']) && !empty($this->request->data['Search']['marketplace'])){
			
				 $marker_place_service = explode(",",$this->request->data['Search']['marketplace']);
			
				foreach($marker_place_service as $service_type)
				{
					if($service_type == 'training'){
					
						$and_condition = array_merge($and_condition,array('UserSitterServices.mp_training_status=1'));
					
					}else if($service_type == 'recreation'){
						
						$and_condition = array_merge($and_condition,array('UserSitterServices.mp_recreation_status=1'));
			
					}else if($service_type == 'grooming'){
						
						$and_condition = array_merge($and_condition,array('UserSitterServices.mp_grooming_status=1'));
					
					}else if($service_type == 'driver'){
						
						$and_condition = array_merge($and_condition,array('UserSitterServices.mp_driver_service_status=1'));
					} 
				}
			}
			/*MARKETPLACE CONDITION END*/
			
			/*START - END DATE CONDITION START*/
			if((isset($this->request->data['Search']['from_date']) && isset($this->request->data['Search']['to_date'])) && ($this->request->data['Search']['from_date'] !='' && $this->request->data['Search']['to_date'] !="")){
			
				$startDate = $this->request->data['Search']['from_date'];
				$endDate = $this->request->data['Search']['to_date'];
				
				$and_condition  = array_merge($and_condition,array("Users.id NOT IN (SELECT USAvail.user_id from user_sitter_availability AS USAvail WHERE (USAvail.start_date <= '$startDate' AND USAvail.end_date >='$startDate') AND (USAvail.start_date <= '$endDate' AND USAvail.end_date >='$endDate') AND  USAvail.avail_status='0')"));
				
				
				
			}else if(isset($this->request->data['Search']['from_date']) && $this->request->data['Search']['from_date'] !=''){
				
				$startDate = $this->request->data['Search']['from_date'];
							
				$and_condition  = array_merge($and_condition,array("Users.id NOT IN (SELECT USAvail.user_id from user_sitter_availability AS USAvail WHERE (USAvail.start_date <= '$startDate' AND USAvail.end_date >='$startDate') AND  USAvail.avail_status='0')"));
			
			}else if(isset($this->request->data['Search']['to_date']) && $this->request->data['Search']['to_date'] !=''){
				
				$endDate = $this->request->data['Search']['to_date'];
				
				$and_condition  = array_merge($and_condition,array("Users.id NOT IN (SELECT USAvail.user_id from user_sitter_availability AS USAvail WHERE (USAvail.start_date <= '$endDate' AND USAvail.end_date >='$endDate') AND  USAvail.avail_status='0')"));
			}
			/*START - END DATE CONDITION END*/
			
			//SET CONDITION PET IN HOME (TABLE NAME : users_sitter_house) START	
			
			 //STEP 1
			 //pr($this->request->data['Search']); die;
			 if((isset($this->request->data['Search']['sitter_pet_info']['pet_in_home']) || isset($this->request->data['Search']['sitter_pet_info']['doesnt_own_dog'])) && @$this->request->data['Search']['sitter_info']['own_pet'] !=1){
                    
                    $and_condition = array_merge($and_condition,array('(UserSitterHouses.dogs_in_home="no")')); 
                    
              }else{
					
					if(isset($this->request->data['Search']['sitter_info']['own_pet']) && $this->request->data['Search']['sitter_info']['own_pet'] ==1){
						$and_condition = array_merge($and_condition,array('(UserSitterHouses.cats_in_home="no" AND UserSitterHouses.birds_in_cages="no")'));
					}
			  }
			  
			  //STEP 2
			  if((isset($this->request->data['Search']['sitter_pet_info']['pet_in_home']) || isset($this->request->data['Search']['sitter_pet_info']['doesnt_own_caged_dog'])) && @$this->request->data['Search']['sitter_info']['own_pet'] !=1){
                    
                    $and_condition = array_merge($and_condition,array('(UserSitterHouses.birds_in_cages="no")'));
                    
              }else{
				  
				  if(isset($this->request->data['Search']['sitter_info']['own_pet']) && @$this->request->data['Search']['sitter_info']['own_pet'] ==1){
					$and_condition = array_merge($and_condition,array('(UserSitterHouses.dogs_in_home="no" AND UserSitterHouses.cats_in_home="no")'));
				 }
				 	
			  }
			  
			  //STEP 3
			  if((isset($this->request->data['Search']['sitter_pet_info']['pet_in_home']) || isset($this->request->data['Search']['sitter_pet_info']['doesnt_own_cat'])) && @$this->request->data['Search']['sitter_info']['own_pet'] !=1){
                    
                    $and_condition = array_merge($and_condition,array('(UserSitterHouses.cats_in_home="no")'));
                    
              }else{
					
					if(isset($this->request->data['Search']['sitter_info']['own_pet']) && $this->request->data['Search']['sitter_info']['own_pet'] ==1){
						$and_condition = array_merge($and_condition,array('(UserSitterHouses.dogs_in_home="no" AND UserSitterHouses.birds_in_cages="no")'));
					}
			  }                
              //SET CONDITION PET IN HOME (TABLE NAME : users_sitter_house) END
			
			
			//SET CONDITION FOR TOP TAB SELECTED (TABLE NAME : users_sitter_services)
			if(isset($this->request->data['Search']['sitter_info'])){
               
                //BALCONY OR BACKYARD
                if(isset($this->request->data['Search']['sitter_info']['outdoor_area_balcony']) && isset($this->request->data['Search']['sitter_info']['outdoor_area_backyard'])){
                	 $and_condition = array_merge($and_condition,array('(UserSitterHouses.outdoor_area="balcony" || UserSitterHouses.outdoor_area="backyard")'));
                	 
                }else if(isset($this->request->data['Search']['sitter_info']['outdoor_area_balcony'])){
					
					$and_condition = array_merge($and_condition,array('UserSitterHouses.outdoor_area="balcony"'));
                }else if(isset($this->request->data['Search']['sitter_info']['outdoor_area_backyard'])){
					
					$and_condition = array_merge($and_condition,array('UserSitterHouses.outdoor_area="backyard"'));
                }
                
                //NON SMOKER HOME
                if(isset($this->request->data['Search']['sitter_info']['non_smoker'])){
                	 $and_condition = array_merge($and_condition,array('UserSitterHouses.smokers="no"'));
                }
                
                //HAS FENCED
                if(isset($this->request->data['Search']['sitter_info']['has_fenced_yard'])){
                	 $and_condition = array_merge($and_condition,array('UserSitterHouses.fully_fenced="yes"'));
                }

                
                //CONDITIONS FOR user_professional_accreditations_details
                if(isset($this->request->data['Search']['sitter_info']['administer_cpr'])){
                	 $and_condition = array_merge($and_condition,array('UserProfessionalAccreditationsDetails.cpr_for="yes"'));
                }
                
                if(isset($this->request->data['Search']['sitter_info']['pet_training_experience'])){
                	 $and_condition = array_merge($and_condition,array('UserProfessionalAccreditationsDetails.training_techniques !=""'));
                }
                
                if(isset($this->request->data['Search']['sitter_info']['administer_injections'])){
                	 $and_condition = array_merge($and_condition,array('UserProfessionalAccreditationsDetails.injected_madications=1'));
                }
                
                if(isset($this->request->data['Search']['sitter_info']['begavioural_experience'])){
                	 $and_condition = array_merge($and_condition,array('UserProfessionalAccreditationsDetails.ex_behavioural_problems !=""'));
                }
                
                if(isset($this->request->data['Search']['sitter_info']['certified_oral_medication'])){
                	 $and_condition = array_merge($and_condition,array('UserProfessionalAccreditationsDetails.oral_madications=1'));
                }
            }
			/*WEEK DAY CONDITION START*/
			if(isset($this->request->data['Search']['booking_days']) && ($this->request->data['Search']['booking_days'] != '')){
				$explodedDays =  explode(",",$this->request->data['Search']['booking_days']);
			   if(!empty($explodedDays)){
					foreach($explodedDays as $days){
							$and_condition = array_merge($and_condition,array('FIND_IN_SET("'.$days.'", UserSitterAvailabilityDays.available_days)'));
					}
			   }
			}
			/*DOGSIZE CONDITION END*/
			/*SERVICES CONDITION START*/
			if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'house_sitting')){
				
				$and_condition = array_merge($and_condition,array('UserSitterServices.guest_house_status=1'));
			
			}
			else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'drop_visit')){
				
				$and_condition = array_merge($and_condition,array('UserSitterServices.gh_drop_in_visit_status=1'));
			
			}else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'day_night_care')){
				
				/*WHAT TIME DAY/NIGHT CONDITION START*/	
				if(isset($this->request->data['Search']['what_time']) && !empty($this->request->data['Search']['what_time'])){
					
					if(isset($this->request->data['Search']['what_time']['day_care']) && !empty($this->request->data['Search']['what_time']['day_care'])){
						
						$and_condition = array_merge($and_condition,array('(UserSitterServices.sh_day_care_status=1 OR UserSitterServices.gh_day_care_status=1)'));
						
					}
					
					if(isset($this->request->data['Search']['what_time']['night_care']) && !empty($this->request->data['Search']['what_time']['night_care'])){
						
						$and_condition = array_merge($and_condition,array('(UserSitterServices.sh_night_care_status=1 OR UserSitterServices.gh_night_care_status=1)'));
						
						
					}
				}else{
						$and_condition = array_merge($and_condition,array('(UserSitterServices.sh_day_care_status=1 OR UserSitterServices.gh_day_care_status=1) '));
						$and_condition = array_merge($and_condition,array('(UserSitterServices.sh_night_care_status=1 OR UserSitterServices.gh_night_care_status=1) '));
				
				}
				/*WHAT TIME DAY/NIGHT CONDITION END*/	
				
				
			}else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'marketplace')){
				$and_condition = array_merge($and_condition,array('UserSitterServices.market_place_status=1'));
            }
            else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'bording')){
				$and_condition = array_merge($and_condition,array('UserSitterServices.sitter_house_status=1'));
            }
			/*SERVICES CONDITION END*/
			
			//SET PRICE CONDITION (TABLE NAME : users_sitter_services)
			if(isset($this->request->data['Search']['start_price']) && isset($this->request->data['Search']['end_price'])){
				
				//Remove $ character from the start & end price
				$startPrice = str_replace("$","",$this->request->data['Search']['start_price']);
				$endPrice = str_replace("$","",$this->request->data['Search']['end_price']);
				
				if($this->request->data['Search']['selected_service']=='day_night_care' || $this->request->data['Search']['selected_service']=='house_sitting' || $this->request->data['Search']['selected_service'] == 'drop_visit' || $this->request->data['Search']['selected_service'] == 'bording'){
					
					//SET PRICE CONDITION FOR ONLY DAY OR NIGHT (TABLE NAME : users_sitter_services)
					if(isset($this->request->data['Search']['what_time']) && !empty($this->request->data['Search']['what_time'])){
						   
						    if(array_key_exists ( 'day_care', $this->request->data['Search']['what_time']) && array_key_exists ('night_care', $this->request->data['Search']['what_time'])){
                        		
                        		$and_condition  = array_merge($and_condition,array("(UserSitterServices.sh_day_rate >= $startPrice AND UserSitterServices.sh_day_rate <=$endPrice)"));
					
								$and_condition   = array_merge($and_condition,array("(UserSitterServices.sh_night_rate >= $startPrice AND UserSitterServices.sh_night_rate <= $endPrice)"));
								
								$and_condition  = array_merge($and_condition,array("(UserSitterServices.gh_day_rate >= $startPrice AND UserSitterServices.gh_day_rate <=$endPrice)"));
								
								$and_condition   = array_merge($and_condition,array("(UserSitterServices.gh_night_rate >= $startPrice AND UserSitterServices.gh_night_rate <= $endPrice)"));

							}else if(array_key_exists ( 'day_care', $this->request->data['Search']['what_time'])){
								
                        	  $and_condition  = array_merge($and_condition,array("(UserSitterServices.sh_day_rate >= $startPrice AND UserSitterServices.sh_day_rate <=$endPrice)"));
                             
                              $and_condition  = array_merge($and_condition,array("(UserSitterServices.gh_day_rate >= $startPrice AND UserSitterServices.gh_day_rate <=$endPrice)"));
                            
                            }else{
                    		  $and_condition   = array_merge($and_condition,array("(UserSitterServices.sh_night_rate >= $startPrice AND UserSitterServices.sh_night_rate <= $endPrice)"));
                    		  $and_condition   = array_merge($and_condition,array("(UserSitterServices.gh_night_rate >= $startPrice AND UserSitterServices.gh_night_rate <= $endPrice)"));
                        	}
                        	
					}else{
						if($this->request->data['Search']['selected_service'] == 'bording'){
							
							$and_condition  = array_merge($and_condition,array("(UserSitterServices.sh_day_rate >= $startPrice AND UserSitterServices.sh_day_rate <=$endPrice)"));
					
							$and_condition   = array_merge($and_condition,array("(UserSitterServices.sh_night_rate >= $startPrice AND UserSitterServices.sh_night_rate <= $endPrice)"));
						
						}else{

							$and_condition  = array_merge($and_condition,array("(UserSitterServices.gh_day_rate >= $startPrice AND UserSitterServices.gh_day_rate <=$endPrice)"));
							
							$and_condition   = array_merge($and_condition,array("(UserSitterServices.gh_night_rate >= $startPrice AND UserSitterServices.gh_night_rate <= $endPrice)"));

							$and_condition  = array_merge($and_condition,array("(UserSitterServices.gh_drop_in_visit_rate >= $startPrice AND UserSitterServices.gh_drop_in_visit_rate <=$endPrice)"));
						}
						
					}
				    //pr($or_condition);die;
                 }
                if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'marketplace'))
				{
					$and_condition  = array_merge($and_condition,array("(UserSitterServices.mp_grooming_rate >= $startPrice AND UserSitterServices.mp_grooming_rate <=$endPrice)"));
					$and_condition  = array_merge($and_condition,array("(UserSitterServices.mp_recreation_rate >= $startPrice AND UserSitterServices.mp_recreation_rate <=$endPrice)"));
					$and_condition  = array_merge($and_condition,array("(UserSitterServices.mp_training_rate >= $startPrice AND UserSitterServices.mp_training_rate <=$endPrice)"));
					$and_condition  = array_merge($and_condition,array("(UserSitterServices.mp_driving_rate >= $startPrice AND UserSitterServices.mp_driving_rate <=$endPrice)"));
				}
		     }
			//SET WHERE OPPRANDS INTO MYSQL 
			if(!empty($or_condition) || !empty($and_condition)){
				$where_finalConditions =' WHERE ';
			}else{
				$where_finalConditions ='';
			}
			if(!empty($or_condition)){
				$final_OR_Conditions = implode(" OR ",$or_condition); 
				 $where_finalConditions .= '('.$final_OR_Conditions.")";
			}
			if(!empty($and_condition)){
				if(!empty($or_condition)){
					$final_AND_Conditions = implode(" AND ",$and_condition); 
					$where_finalConditions .= ' AND ('.$final_AND_Conditions.")";	
				}else{
					$final_AND_Conditions = implode(" AND ",$and_condition); 
					$where_finalConditions .= '('.$final_AND_Conditions.")";	
				}
			}
			//SET LAT LONG AS PER IP ADDRESS
			if(isset($this->request->data['location']) && $this->request->data['location'] !=''){
				$sourceSelectedLocation = $this->request->data['location'];
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
				
				@$sourceLocationLatitude = $response_a->results[0]->geometry->location->lat;
				@$sourceLocationLongitude = $response_a->results[0]->geometry->location->lng;
			}else{
				$sourceLocationLatitude = '30.7399738';
				$sourceLocationLongitude = '76.7567368';
			}	
			$searchByDistance = isset($this->request->data['Search']['distance'])?$this->request->data['Search']['distance']:DEFAULT_RADIUS;
		    $query='SELECT
						  Users.id, (
							3959 * acos (
							  cos ( radians('.$sourceLocationLatitude.') )
							  * cos( radians( latitude ) )
							  * cos( radians( longitude ) - radians('.$sourceLocationLongitude.') )
							  + sin ( radians('.$sourceLocationLatitude.') )
							  * sin( radians( latitude ) )
							)
						  ) AS distance
						
						FROM 
						users as Users 
						
						LEFT JOIN  user_professional_accreditations_details as userProfessionalAccreditationsDetails  
						ON  Users.id = userProfessionalAccreditationsDetails.user_id
						
						LEFT JOIN 
						user_sitter_houses as UserSitterHouses 
						ON Users.id = UserSitterHouses.user_id
						
						LEFT JOIN 
						user_about_sitters as UserAboutSitters 
						ON Users.id = UserAboutSitters.user_id
						
						LEFT JOIN 
						user_sitter_availability as UserSitterAvailability 
						ON Users.id = UserSitterAvailability.user_id
						
						LEFT JOIN 
						user_sitter_availability_days as UserSitterAvailabilityDays 
						ON Users.id = UserSitterAvailabilityDays.user_id
						
						LEFT JOIN 
						user_sitter_services as UserSitterServices 
						ON Users.id = UserSitterServices.user_id
						
						'.$where_finalConditions.'
						
						HAVING distance < '.$searchByDistance.'
						
						ORDER BY distance';
			//echo  $query; die;
			$connection = ConnectionManager::get('default');
			$results = $connection->execute($query)->fetchAll('assoc');	//RETURNS ALL USER ID WITH DISTANSE 			
			
			if(!empty($results)){
				$idArr = array();
				$distanceAssociation = array();
				foreach($results as $resultsValue){
						
						$idArr[] = $resultsValue['id']; //STORE ALL ID INTO AN ARRAY
						
						//STORE ALL DISTANCE ALONG WITH USER ID AS KEY INTO AN ARRAY
						$distanceAssociation[$resultsValue['id']] = $resultsValue['distance'];
				}
				
				$userData = $UsersModel->find('all',['contain'=>['UserAboutSitters','UserRatings'=>['Users'],'UserSitterServices','UserSitterGalleries','Users_badge']])
							   ->where(['Users.id' => $idArr], ['Users.id' => 'integer[]'])
							   ->toArray();
							   
				/*CHECK IN ARRAY, IS USER HAVE SET SERVICES AND RATES VALUE OR NOT, IF NOT THEN DELETE THIS INDEX START*/
				
				if(!empty($userData)){
					$customArray=array();
					foreach($userData as $arrK=>$arrayAdjust){
						
						if(isset($arrayAdjust['user_sitter_services']) && !empty($arrayAdjust['user_sitter_services'])){
							$customArray[] = $arrayAdjust;
						}else{
							unset($userData[$arrK]);
						}
					}	
				}
				$userData = $customArray;
				/*CHECK IN ARRAY, IS USER HAVE SET SERVICES AND RATES VALUE OR NOT, IF NOT THEN DELETE THIS INDEX END*/
							   
				$loggedInUserID = $session->read('User.id');
				if($loggedInUserID !=''){
					if(!empty($userData)){
						foreach($userData as $k=>$eachRow){
							$UserSitterFavourite = $UserSitterFavouriteModel->find('all',['conditions'=>['UserSitterFavourites.sitter_id'=>$eachRow->id,'UserSitterFavourites.user_id'=>$loggedInUserID]])->count();
							if($UserSitterFavourite>0){
								$userData[$k]['is_favourite'] =  "yes";
							}else{
								$userData[$k]['is_favourite'] =  "no";
							}
								
						}	 
					}
				}
				
				$this->set('resultsData',$userData);
				$this->set('market_place_type',@$market_place_type);
				$this->set('selected_services',$this->request->data['Search']['selected_service']);
				$this->set('searchByDistance',$searchByDistance);
				$this->set('distanceAssociation',($distanceAssociation)?$distanceAssociation:'');
				$this->set('sourceLocationLatitude',($sourceLocationLatitude)?$sourceLocationLatitude:'');
				$this->set('sourceLocationLongitude',($sourceLocationLongitude)?$sourceLocationLongitude:'');
				$this->set('headerSearchVal',(@$this->request->data['location_autocomplete'])?@$this->request->data['location_autocomplete']:'');
			}		
		}		
		if(!isset($currentLang) && empty($currentLang)){

			$this->setGuestStore("en","Guests","index");
		}
		
	}
	
	/**
	* Function to search profiles
	*/
	function searchByLocation(){
		
		$this->viewBuilder()->layout('landing'); /*CALL LAYOUT*/
		/*SET SESSION VARIABLES*/
		$session = $this->request->session();
		$currentLang = $session->read('requestedLanguage');
		$userId = $session->read('User.id');
		
		/*ADD MODEL*/
		$UsersModel = TableRegistry::get('Users');
		$UserSitterFavouriteModel = TableRegistry::get('UserSitterFavourites');
		$conditions = array();
		
		/*GET USER PETS FOR DISPLAY ON FORM*/
		$userPetInfo = $UsersModel->find('all',['contain'=>[
														'UserPets'
											   ]]
											)
							   ->where(['Users.id' => $userId])
							   ->toArray();
		//pr($userPetInfo);die;
		
		if(isset($userPetInfo[0]->user_pets) && !empty($userPetInfo[0]->user_pets)){
			
		   $this->set('guests_Info',$userPetInfo[0]->user_pets);	
		}else{
			$this->set('guests_Info','');
		}	
		
		if(!empty($this->request->data)){
			
			$requiredDistance = isset($this->request->data['Search']['destination'])?$this->request->data['Search']['destination']:DEFAULT_RADIUS;
		
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
				@$sourceLocationLatitude = $response_a->results[0]->geometry->location->lat;
				@$sourceLocationLongitude = $response_a->results[0]->geometry->location->lng;
			}
			/*FIND USER ID AND DISTANCE AS PER SELECTDE LOCATION*/
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
						HAVING distance < '.DEFAULT_RADIUS.'
						ORDER BY distance';
						
			$connection = ConnectionManager::get('default');
			$results = $connection->execute($query)->fetchAll('assoc');	//RETURNS ALL USER ID WITH DISTANSE 			
			
			if(!empty($results)){
				$idArr = array();
				$distanceAssociation = array();
				foreach($results as $resultsValue){
						$idArr[] = $resultsValue['id']; //STORE ALL ID INTO AN ARRAY
						//STORE ALL DISTANCE ALONG WITH USER ID AS KEY INTO AN ARRAY
						$distanceAssociation[$resultsValue['id']] = $resultsValue['distance'];
				}
				
				$userData = $UsersModel->find('all',['contain'=>['UserAboutSitters','UserRatings'=>['Users'],'UserSitterServices','UserSitterGalleries','Users_badge','UserProfessionalAccreditationsDetails','UserSitterHouses']])
							   ->where(['Users.id' => $idArr], ['Users.id' => 'integer[]'])
							   ->toArray();
				
				$loggedInUserID = $session->read('User.id');
			   
			    if(!empty($userData)){
					
					$bookingRequestModel = TableRegistry :: get("BookingRequests");
					$sitterAvailabilityDaysModel = TableRegistry :: get("UserSitterAvailabilityDays");
					$sitterAvailabilityModel = TableRegistry :: get("UserSitterAvailability");
					//Get repeat client
					foreach($userData as $udK =>$udV){
						$totalClient =  $bookingRequestModel->find('all')
						->where(['BookingRequests.sitter_id' => $udV->id,'BookingRequests.payment_status' => "Paid"])
						->group('BookingRequests.user_id HAVING COUNT(BookingRequests.user_id) != 1')
					    ->hydrate(false)->count();
					   
					$userData[$udK]['repeatClient'] = $totalClient;
					//Get last booking
					 $last_booking = $bookingRequestModel->find('all',['order' => ['BookingRequests.created_date' => 'desc']])
						->where(['BookingRequests.sitter_id' => $udV->id,'BookingRequests.payment_status' => "Paid"])
						->hydrate(false)->first();//->toArray();
						
					  $userData[$udK]['last_booking_date'] = $last_booking["created_date"];
					   
					//Start check weekend available   
					$sitter_days_availability = $sitterAvailabilityDaysModel->find('all')
									->where(['UserSitterAvailabilityDays.user_id' => $udV->id])
									->hydrate(false)->toArray();
					$weekend_availaibility = false;
					if(!empty($sitter_days_availability)){ 		
						 $day_availability = explode(",",$sitter_days_availability[0]['available_days']);
						 $saturday_available = false;
						 $sanday_available = false;
						
					     foreach($day_availability as $single_day){
							if($single_day == 'sunday'){
								$sanday_available = true;
							}
							if($single_day == 'saturday'){
								$saturday_available = true;
							}
						}
						if($sanday_available && $saturday_available){
							$weekend_availaibility = true;
						}
					}
				    $sitter_availability = $sitterAvailabilityModel->find('all')
						->where(['UserSitterAvailability.user_id' => $udV->id])
						->hydrate(false)->toArray();
					$userData[$udK]['weekend_availaibility'] = "no";
					$userData[$udK]['availaibility_on_new_year'] = "no";	
					if(!empty($sitter_availability)){	
						$next_sat = date('Y-m-d',strtotime('saturday'));
						$next_sun = date('Y-m-d',strtotime('sunday'));
						
						$date_25_dec = date('Y')."-12-25";
						$date_1_Jan = (date('Y')+1)."-01-01";
						
						$next_sat_sun = false;
						$available_onnewyear = false;
						
		                foreach($sitter_availability as $date_val){
							if((($next_sat >= $date_val['start_date']) && ($next_sat <= $date_val['end_date'])) && (($next_sun >= $date_val['start_date']) && ($next_sun <= $date_val['end_date']))){
								$next_sat_sun = true;
							}
							if((($date_25_dec >= $date_val['start_date']) && ($date_25_dec <= $date_val['end_date'])) && (($date_1_Jan >= $date_val['start_date']) && ($date_1_Jan <= $date_val['end_date']))){
								$available_onnewyear  = true;
							}
						}
						if($weekend_availaibility && $next_sat_sun){
						    $userData[$udK]['weekend_availaibility'] = "yes";
					    }
					    if($available_onnewyear){
						    $userData[$udK]['availaibility_on_new_year'] = "yes";
					    }
					 }   
					}
					
					//die;
				 }
               				
			  /*CHECK IN ARRAY, IS USER HAVE SET SERVICES AND RATES VALUE OR NOT, IF NOT THEN DELETE THIS INDEX START*/
				
				if(!empty($userData)){
					$customArray=array();
					foreach($userData as $arrK=>$arrayAdjust){
						
						if(isset($arrayAdjust['user_sitter_services']) && !empty($arrayAdjust['user_sitter_services'])){
							$customArray[] = $arrayAdjust;
						}else{
							unset($userData[$arrK]);
						}
					}	
				}
				$userData = $customArray;
				/*CHECK IN ARRAY, IS USER HAVE SET SERVICES AND RATES VALUE OR NOT, IF NOT THEN DELETE THIS INDEX END*/
				
				if($loggedInUserID !=''){
					if(!empty($userData)){
						foreach($userData as $k=>$eachRow){
							
							if(isset($eachRow['user_sitter_services']) && !empty($eachRow['user_sitter_services'])){
								//echo $eachRow->id."<hr><br/>";
							}
								
							$UserSitterFavourite = $UserSitterFavouriteModel->find('all',['conditions'=>['UserSitterFavourites.sitter_id'=>$eachRow->id,'UserSitterFavourites.user_id'=>$loggedInUserID]])->count();
							
							if($UserSitterFavourite > 0){
								$userData[$k]['is_favourite'] =  "yes";
							}else{
								$userData[$k]['is_favourite'] =  "no";
							}
								
						}	 
					}
				}
			
			}
	       // pr(@$userData);die;
	        
			$this->set('resultsData',@$userData);
			$this->set('distanceAssociation',@$distanceAssociation);
			$this->set('sourceLocationLatitude',$sourceLocationLatitude);
			$this->set('sourceLocationLongitude',$sourceLocationLongitude);
			$this->set('headerSearchVal',$this->request->data['location_autocomplete']);
		
		}
		$this->render("search");
		
	}
	
   /**
	* Function to search profiles
	*/
	function searchByCities($city=null){
	
		$this->viewBuilder()->layout('landing');
		$session = $this->request->session();
		$currentLang = $session->read('requestedLanguage');
		
		//ADD MODEL
		$UsersModel = TableRegistry::get('Users');
		$UserSitterFavouriteModel = TableRegistry::get('UserSitterFavourites');
		$conditions = array();
		if(!empty($city)){
		
				//GET LATITUDE LONGITUDE FROM SELECTED LOCATION
				$sourceSelectedLocation =$city;
				//pr($sourceSelectedLocation);die;
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
				//pr($response_a); die;
				@$sourceLocationLatitude = $response_a->results[0]->geometry->location->lat;
				@$sourceLocationLongitude = $response_a->results[0]->geometry->location->lng;
			
		
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
						HAVING distance < '.DEFAULT_RADIUS.'
						ORDER BY distance';
			$connection = ConnectionManager::get('default');
			$results = $connection->execute($query)->fetchAll('assoc');	//RETURNS ALL USER ID WITH DISTANSE 			
		}
			if(!empty($results)){
				$idArr = array();
				$distanceAssociation = array();
				foreach($results as $resultsValue){
						$idArr[] = $resultsValue['id']; //STORE ALL ID INTO AN ARRAY
						//STORE ALL DISTANCE ALONG WITH USER ID AS KEY INTO AN ARRAY
						$distanceAssociation[$resultsValue['id']] = $resultsValue['distance'];
				}
				
				$userData = $UsersModel->find('all',['contain'=>['UserAboutSitters','UserRatings'=>['Users'],'UserSitterServices','UserSitterGalleries','Users_badge']])
							   ->where(['Users.id' => $idArr], ['Users.id' => 'integer[]'])
							   ->toArray();
							   
				$loggedInUserID = $session->read('User.id');
				
				/*CHECK IN ARRAY, IS USER HAVE SET SERVICES AND RATES VALUE OR NOT, IF NOT THEN DELETE THIS INDEX START*/
				
				if(!empty($userData)){
					$customArray=array();
					foreach($userData as $arrK=>$arrayAdjust){
						
						if(isset($arrayAdjust['user_sitter_services']) && !empty($arrayAdjust['user_sitter_services'])){
							$customArray[] = $arrayAdjust;
						}else{
							unset($userData[$arrK]);
						}
					}	
				}
				$userData = $customArray;
				/*CHECK IN ARRAY, IS USER HAVE SET SERVICES AND RATES VALUE OR NOT, IF NOT THEN DELETE THIS INDEX END*/
				
				if($loggedInUserID !=''){
					if(!empty($userData)){
						foreach($userData as $k=>$eachRow){
								
							$UserSitterFavourite = $UserSitterFavouriteModel->find('all',['conditions'=>['UserSitterFavourites.sitter_id'=>$eachRow->id,'UserSitterFavourites.user_id'=>$loggedInUserID]])->count();
							
							if($UserSitterFavourite > 0){
								$userData[$k]['is_favourite'] =  "yes";
							}else{
								$userData[$k]['is_favourite'] =  "no";
							}
								
						}	 
					}
				}
			}
		
		//pr($userData); die;
		$this->set('resultsData',@$userData);
		$this->set('distanceAssociation',@$distanceAssociation);
		$this->set('sourceLocationLatitude',@$sourceLocationLatitude);
		$this->set('sourceLocationLongitude',@$sourceLocationLongitude);
		//$this->set('headerSearchVal',$this->request->data['location_autocomplete']);
		$this->render("search");
	}
	
	/**
	 Function for sitter details
	*/	
	
	function sitterDetails($sitterId = null){
		$session = $this->request->session();
		$this->viewBuilder()->layout('landing');
		$sitterId = convert_uudecode(base64_decode($sitterId));
		
		$UserSitterFavouriteModel = TableRegistry::get('UserSitterFavourites');
        $UsersModel = TableRegistry::get('Users');
        
        $userId = $session->read('User.id');
        $userType = $session->read('User.user_type');
        $userEmail = $session->read('User.email');
        $userName = $session->read('User.name');
	    $bookingRequestsModel = TableRegistry::get('BookingRequests');
        
		if(isset($this->request->data['BookingRequests']) && !empty($this->request->data['BookingRequests']))
		{
			$sitter_id = convert_uudecode(base64_decode($this->request->data['BookingRequests']['sitter_id']));
            $bookingRequestData = $bookingRequestsModel->newEntity();
            
              if(!empty($this->request->data['guest_id_for_booking'])){
				  $booking_guests = implode(",",$this->request->data['guest_id_for_booking']);
				  $bookingRequestData->guest_id_for_bookinig = $booking_guests;
			  }
			    
                $bookingRequestData = $bookingRequestsModel->patchEntity($bookingRequestData, $this->request->data['BookingRequests'],['validate'=>false]);
                $bookingRequestData->user_id = $userId;
                $bookingRequestData->sitter_id = $sitter_id;
                if($userType == "Sitter"){
				  $bookingRequestData->request_by_sitter_id = $userId;
				}
                $bookingRequestData->booknig_start_date = $this->request->data['BookingRequests']['booking_start_date'];
                $bookingRequestData->booking_end_date = $this->request->data['BookingRequests']['booking_end_date'];
                
                if(!empty($this->request->data['additional_services'])){
				  $additional_services = implode(",",$this->request->data['additional_services']);
				  $bookingRequestData->additional_services = $additional_services;
				}
                if($bookingRequestsModel->save($bookingRequestData)){
                	$replace = array('{name}','{email}');
					$with = array($userName,$userEmail);
					//$this->send_email('',$replace,$with,'booking_request',$userEmail);
					//Start Send message
					$get_booking_requests_to_display = $bookingRequestsModel->find('all')
								->where(['BookingRequests.id'=>$bookingRequestData->id])
								->hydrate(false)->first();
				
				
					   $get_user_communications_details = $this->getUserCommunicationDetails($get_booking_requests_to_display["sitter_id"]);
					 if($get_user_communications_details['communication']['new_booking_request'] == 1){
					    $to_mobile_number = $get_user_communications_details['communication']['phone_notification'];
						$message_body = "You have been received new booking request"; 
						
						//$send_message = $this->sendMessages($to_mobile_number, $message_body);   
				      }
				     //End send message
					
				}
				 return $this->redirect(['controller'=>'search','action'=>'thank-you']);
		}else{
					$userData = $UsersModel->get($sitterId,['contain'=>['Users_badge','UserAboutSitters','UserSitterHouses','UserSitterServices','UserSitterGalleries','UserProfessionalAccreditationsDetails','UserRatings','UserPets'=>['UserPetGalleries']]]);
					$UserFavData=$UserSitterFavouriteModel->find('all')->toArray();
					$user_sitter_id_Arr=array();
					foreach($UserFavData as $UserFav){
						$user_sitter_id_Arr[]=$UserFav->sitter_id;
					}
					if(in_array($userData->id,$user_sitter_id_Arr)){
							$userData['is_favourite'] =  "yes";
					}else{
						$userData['is_favourite'] =  "no";
					}
					$loggedInUserID = $session->read('User.id');
					
					$Userratingdata=$userData->user_ratings;
					$userFromArr=array();
					foreach($Userratingdata as $Userrating){
						$userFromArr[]=$Userrating->user_from;
					}
					
					
					$gettingUserData=$UsersModel->find('all',['contain'=>['UserAboutSitters','UserSitterHouses','UserSitterServices','UserSitterGalleries','UserProfessionalAccreditationsDetails','UserRatings']])->toArray();
					 $commentUserData=array();
					foreach($gettingUserData as $gettingUser){
							if(in_array($gettingUser->id,$userFromArr)){
								$commentUserData[]=$gettingUser;
							} 
					}
					$sourceLocationLatitude =$userData->latitude;
					$sourceLocationLongitude =$userData->longitude;
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
									HAVING distance < '.DEFAULT_RADIUS.'
									ORDER BY distance';
				$connection = ConnectionManager::get('default');
				$results = $connection->execute($query)->fetchAll('assoc');	//RETURNS ALL USER ID WITH DISTANSE 			
				$finalDistanceArr=array();
				foreach($results as $result){
					foreach($gettingUserData as $favData){
							$selUserData=$favData->id;
							if(in_array($selUserData,$result)){
								
								$finalDistanceArr[]=$result;
							} 
					} 
				}
				if(!empty($finalDistanceArr)){
					$idArr = array();
					$distanceAssociation = array();
					foreach($finalDistanceArr as $resultsValue){
							$idArr[] = $resultsValue['id']; //STORE ALL ID INTO AN ARRAY
							//STORE ALL DISTANCE ALONG WITH USER ID AS KEY INTO AN ARRAY
							$distanceAssociation[$resultsValue['id']] = $resultsValue['distance'];
				}}
				$nearUseridArr=array();	
				foreach($distanceAssociation as $key=>$diatance){
						if($diatance != 0){
								$nearUseridArr[]=$key;
						}
				}	
				$this->set('distanceAssociation',$distanceAssociation);	
				$getUsersArr=array();$flag=0;
				foreach($gettingUserData as $gettingUser){
						if(in_array($gettingUser->id,$nearUseridArr)){
							$flag++;
							if($flag < 7){
								$getUsersArr[]=$gettingUser;
							}
							
						}
				}
				$this->set('nearbyUsers',$getUsersArr);	
				$this->set('loggedInUserID',$loggedInUserID);	
				$this->set('userData',$userData);
				$this->set('commentUserData',@$commentUserData);
			
			$Session=$this->request->session();
			$user_id=$Session->read('User.id');
			$calendarModel=TableRegistry :: get("user_sitter_availability");
			$calenderData=$calendarModel->find('all')->where(['user_id'=>$user_id])->toArray();
				
			$unavailbe_array=array();
			foreach($calenderData as $k=>$UserServices){
				
				$unavailbe_array[$k]["start_date"]= $UserServices->start_date;
				$unavailbe_array[$k]["end_date"]= $UserServices->end_date;
				$unavailbe_array[$k]["avail_status"]= $UserServices->avail_status;
			}
						
			$calendar = new  \Calendar();
			$this->set('calender',$calendar->show($unavailbe_array));
			//For booking request
			if(!empty($session->read("User.id"))){
				 $userId = $session->read("User.id");
				 $userPetsModel = TableRegistry::get('UserPets');
				 $userPetsData = $userPetsModel->find('all')->where(['user_id'=>$userId])->toArray();
				 $this->set("sitter_guests_info",$userPetsData);
			}
			$this->set('sitter_id',base64_encode(convert_uuencode($sitterId)));
			
			$currencyModel = TableRegistry::get('Currencies');
			$currencies = $currencyModel->find("all")->toArray();
			$this->set('currencies',$currencies);
			
			 //Count Repeat client
				$bookingRequestModel = TableRegistry :: get("BookingRequests");
				$condition_field = $userType == 'Sitter'?'sitter_id':'user_id';
				$fieldname = $userType == 'Sitter'?'sitter':'guest';
				
				$repeatClient = $bookingRequestModel->find('all')
							->where(['BookingRequests.'.$condition_field => $userId/*,'BookingRequests.folder_status_guest' => "pending"*//*,'BookingRequests.read_status' => "unread"*/])
							->group('BookingRequests.user_id HAVING COUNT(BookingRequests.user_id) != 1' )
							->hydrate(false)->toArray();
							
				$this->set('repeat_client',count($repeatClient));    
			//end repeat client
			//For check user pet
			/*GET USER PETS FOR DISPLAY ON FORM*/
			$userPetInfo = $UsersModel->find('all',['contain'=>[
															'UserPets'
												   ]]
												)
								   ->where(['Users.id' => $userId])
								   ->toArray();
			//pr($userPetInfo);die;
			
			if(isset($userPetInfo[0]->user_pets) && !empty($userPetInfo[0]->user_pets)){
				
			   $this->set('guests_Info',$userPetInfo[0]->user_pets);	
			}else{
				$this->set('guests_Info','');
			}
		}
	}
	
	/**
    Function for booking requests
	*/	
	
	function sitterContact($sitterId = null){
		
		$sitterId = convert_uudecode(base64_decode($sitterId));
        
		$this->viewBuilder()->layout('landing');

        $session = $this->request->session();
        $userId = $session->read('User.id');
        $userEmail = $session->read('User.email');
        $userName = $session->read('User.name');
	
        $bookingRequestsModel = TableRegistry::get('BookingRequests');
		
		
		if(isset($this->request->data['BookingRequests']) && !empty($this->request->data['BookingRequests']))
		{
			$sitter_id = convert_uudecode(base64_decode($this->request->data['BookingRequests']['sitter_id']));
            $bookingRequestData = $bookingRequestsModel->newEntity();
               $bookingRequestData = $bookingRequestsModel->patchEntity($bookingRequestData, $this->request->data['BookingRequests'],['validate'=>false]);
                $bookingRequestData->user_id = $userId;
                $bookingRequestData->sitter_id = $sitter_id;
                $bookingRequestData->booking_start_date = $this->request->data['BookingRequests']['booking_start_date'];
                $bookingRequestData->booking_end_date = $this->request->data['BookingRequests']['booking_end_date'];
                if ($bookingRequestsModel->save($bookingRequestData)){
                	
                	$replace = array('{name}','{email}');
					$with = array($userName,$userEmail);
					$this->send_email('',$replace,$with,'booking_request',$userEmail);
				    
				     return $this->redirect(['controller'=>'search','action'=>'thank-you']);
				}else{
				     $this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 $this->set('booking_data', $bookingRequestData);
		}else{
			$this->set('sitter_id',base64_encode(convert_uuencode($sitterId)));

			$UsersModel = TableRegistry::get('Users');
            $userData = $UsersModel->get($sitterId,['contain'=>['UserAboutSitters','UserSitterHouses','UserSitterServices','UserSitterGalleries','UserProfessionalAccreditationsDetails']]);
			$this->set('userData',$userData);

		}
	}
	
	/**
	 Function for Thank you message
	*/
	function thankYou()
	{
          $this->viewBuilder()->layout('landing');  
          //echo "Thoank You";die;
	}
		
	function favoriteSitter($sitterId = NULL, $userId = NULL)
	{
		
		if($userId==""){
			
			$this->setErrorMessage($this->stringTranslate(base64_encode('Kindly login before perform this action.')));
			echo "Error:not-loggedin";die;
			
		}else{
			$UserSitterFavouriteModel = TableRegistry::get('UserSitterFavourites');
			if($sitterId!='' || $userId!='')
			{
				$sitterId = convert_uudecode(base64_decode($sitterId)); 
				$userId = convert_uudecode(base64_decode($userId)); 
				
			
				$UserSitterFavourite = $UserSitterFavouriteModel->find('all',['conditions'=>['UserSitterFavourites.sitter_id'=>$sitterId,'UserSitterFavourites.user_id'=>$userId]]);
				
				$UserSitterFavouriteRes = $UserSitterFavourite->first();
				
				if($UserSitterFavourite->count() > 0){
				
					$entity = $UserSitterFavouriteModel->get($UserSitterFavouriteRes->id);
					$UserSitterFavouriteModel->delete($entity);
					echo "Success:unlike";die;
				}
				else
				{
					$UserSitterFavouriteData = $UserSitterFavouriteModel->newEntity();
					
					$UserSitterFavouriteData->sitter_id = $sitterId;
					$UserSitterFavouriteData->user_id = $userId;
					$UserSitterFavouriteModel->save($UserSitterFavouriteData);
					echo "Success:like";die;
				}
			}	
		}	
		
	}
	
	/*weekend calender */
	public function ajaxCalendar()
    {

			$Session=$this->request->session();
			$user_id=$Session->read('User.id');
			//pr($user_id);die;
			//$this->viewBuilder()->layout('profile_dashboard');
			$calendarModel=TableRegistry :: get("user_sitter_availability");
			$calenderData=$calendarModel->find('all')->where(['user_id'=>$user_id])->toArray();
			
			
			$unavailbe_array=array();
			foreach($calenderData as $k=>$UserServices){
				
				$unavailbe_array[$k]["start_date"]= $UserServices->start_date;
				$unavailbe_array[$k]["end_date"]= $UserServices->end_date;
				$unavailbe_array[$k]["avail_status"]= $UserServices->avail_status;
			}
		
		$calendar = new  \Calendar();

		$this->set('calender',$calendar->show($unavailbe_array));
       
    }
	
	/**
	 Function for sitter details
	*/	
	function viewProfile($sitterId = null){
		
		$this->viewBuilder()->layout('landing');
		
		$session = $this->request->session();
		$sitterId = convert_uudecode(base64_decode($sitterId));
		
        $UsersModel = TableRegistry::get('Users');
                
		$userData = $UsersModel->get($sitterId,['contain'=>['Users_badge','UserAboutSitters','UserSitterHouses','UserSitterServices','UserSitterGalleries','UserProfessionalAccreditationsDetails','UserRatings']]);
		
		$Userratingdata=$userData->user_ratings;
		
		$userFromArr=array();
		foreach($Userratingdata as $Userrating){
			
			$userFromArr[]=$Userrating->user_from;
		}
		
		$gettingUserData=$UsersModel->find('all',['contain'=>['UserAboutSitters','UserSitterHouses','UserSitterServices','UserSitterGalleries','UserProfessionalAccreditationsDetails','UserRatings']])->toArray();
		 $commentUserData=array();
		
		foreach($gettingUserData as $gettingUser){
		
			if(in_array($gettingUser->id,$userFromArr)){
				
				$commentUserData[]=$gettingUser;
			} 
		}
		
		$sourceLocationLatitude =$userData->latitude;
		$sourceLocationLongitude =$userData->longitude;
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
						HAVING distance < '.DEFAULT_RADIUS.'
						ORDER BY distance';
			$connection = ConnectionManager::get('default');
			$results = $connection->execute($query)->fetchAll('assoc');	//RETURNS ALL USER ID WITH DISTANSE 			
			//pr($results);die;
			$finalDistanceArr=array();
			foreach($results as $result){
				foreach($gettingUserData as $favData){
						$selUserData=$favData->id;
						if(in_array($selUserData,$result)){
							
							$finalDistanceArr[]=$result;
						} 
				} 
			}
			
			if(!empty($finalDistanceArr)){
				$idArr = array();
				$distanceAssociation = array();
				foreach($finalDistanceArr as $resultsValue){
						$idArr[] = $resultsValue['id']; //STORE ALL ID INTO AN ARRAY
						//STORE ALL DISTANCE ALONG WITH USER ID AS KEY INTO AN ARRAY
						$distanceAssociation[$resultsValue['id']] = $resultsValue['distance'];
			}}
			$nearUseridArr=array();	
			foreach($distanceAssociation as $key=>$diatance){
					if($diatance != 0){
							$nearUseridArr[]=$key;
					}
			}
		
		$getUsersArr=array();$flag=0;
		foreach($gettingUserData as $gettingUser){
				if(in_array($gettingUser->id,$nearUseridArr)){
					$flag++;
					if($flag < 7){
						$getUsersArr[]=$gettingUser;
					}
					
				}
		}
			
		$this->set('nearbyUsers',$getUsersArr);	

		$this->set('userData',$userData);
		$this->set('commentUserData',@$commentUserData);

		$Session=$this->request->session();
		$user_id=$Session->read('User.id');


		$calendarModel=TableRegistry :: get("user_sitter_availability");
		$calenderData=$calendarModel->find('all')->where(['user_id'=>$sitterId])->toArray();

		$unavailbe_array=array();
		foreach($calenderData as $k=>$UserServices){
			
			$unavailbe_array[$k]["start_date"]= $UserServices->start_date;
			$unavailbe_array[$k]["end_date"]= $UserServices->end_date;
			$unavailbe_array[$k]["avail_status"]= $UserServices->avail_status;
		}

						
		$calendar = new  \Calendar();

		$this->set('calender',$calendar->show($unavailbe_array));
		//$this->set('services_array',$services_array);
		if(!empty($session->read("User.id"))){
			$userId = $session->read("User.id");
			 $userPetsModel = TableRegistry::get('UserPets');
			 $userPetsData = $userPetsModel->find('all')->where(['user_id'=>$userId])->toArray();
			 $this->set("sitter_guests_info",$userPetsData);
		}
		
		$this->set('sitter_id',$sitterId);
	}
	function sitterGallery(){
		$this->viewBuilder()->layout('');
		//if($this->request->is('ajax')) {
				$sitterId = $_REQUEST["sitter"];
				$UsersModel = TableRegistry::get('Users');
						
				$userData = $UsersModel->get($sitterId,['contain'=>["UserSitterGalleries"]])->toArray();
				
			    $sitter_gal = [];
				if(!empty($userData['image'])){
					 if (file_exists(WEBROOT_PATH.'img/uploads/'.$userData['image'])){
						  $sitter_gal[] =  $userData['image'];
					 }
				}
				/*if(){
				}*/
				if(!empty($userData["user_sitter_galleries"])){
					foreach($userData["user_sitter_galleries"] as $single_gal){
						$sitter_gal[] = $single_gal["image"];
					}
				}
				$this->set("sitter_gallery",$sitter_gal);
				//echo $userData["id"];
				//pr($sitter_gal);die;
			//die;
      }
	//}
}
?>
