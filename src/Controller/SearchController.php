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
		

			$or_condition = array();
			$and_condition = array();
			
			
			//SET CONDITIONS FOR LANGUGE KNOW (TABLE NAME : users_professional_accreditation_detail)	
			if(isset($this->request->data['Search']['languages']) && $this->request->data['Search']['languages'] !=""){
				
				$or_condition = array_merge($or_condition,array('userProfessionalAccreditationsDetails.languages="'.$this->request->data['Search']['languages'].'"'));
			
			}
			 
			//SET CONDITIONS FOR 2+ EXP (TABLE NAME : users_professional_accreditation_detail)	
			if(isset($this->request->data['Search']['experience']) && $this->request->data['Search']['experience'] ==1){
				
				$or_condition = array_merge($or_condition,array('userProfessionalAccreditationsDetails.experience >=2'));
				
			} 
			
			//SET CONDITION FOR FIRST AID (TABLE NAME : users_professional_accreditation_detail)	
			if(isset($this->request->data['Search']['first_aid']) && $this->request->data['Search']['first_aid'] ==1){
				
				$or_condition = array_merge($or_condition,array('userProfessionalAccreditationsDetails.injected_madications=1'));
				$or_condition = array_merge($or_condition,array('userProfessionalAccreditationsDetails.oral_madications=1'));
				
			} 
			//SET CONDITION PET IN HOME (TABLE NAME : users_sitter_house)	
			if(isset($this->request->data['Search']['sitter_info']['own_pet']) && $this->request->data['Search']['sitter_info']['own_pet'] ==1){
				
				$or_condition = array_merge($or_condition,array('UserSitterHouses.dogs_in_home=1'));
				$or_condition = array_merge($or_condition,array('UserSitterHouses.cats_in_home=1'));
			
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
				
				$or_condition = array_merge($or_condition,array('UserSitterHouses.property_type="house"'));
			
			} 
		
			//SET PRICE CONDITION (TABLE NAME : users_sitter_services)
			if(isset($this->request->data['Search']['start_price']) && isset($this->request->data['Search']['end_price'])){
				//Remove $ character from the start & end price
				$startPrice = str_replace("$","",$this->request->data['Search']['start_price']);
				$endPrice = str_replace("$","",$this->request->data['Search']['end_price']);
				
				if($this->request->data['Search']['selected_service']=='day_night_care' || $this->request->data['Search']['selected_service']=='house_sitting' || $this->request->data['Search']['selected_service'] == 'drop_visit'){
					//SET PRICE CONDITION FOR ONLY DAY OR NIGHT (TABLE NAME : users_sitter_services)
					if(isset($this->request->data['Search']['what_time']) && !empty($this->request->data['Search']['what_time'])){
						    if(array_key_exists ( 'day_care', $this->request->data['Search']['what_time']) && array_key_exists ( 'night_care', $this->request->data['Search']['what_time'])){
                        		
                        		$or_condition  = array_merge($or_condition,array("(UserSitterServices.sh_day_rate >= $startPrice AND UserSitterServices.sh_day_rate <=$endPrice)"));
					
								$or_condition   = array_merge($or_condition,array("(UserSitterServices.sh_night_rate >= $startPrice AND UserSitterServices.sh_night_rate <= $endPrice)"));
								
								$or_condition  = array_merge($or_condition,array("(UserSitterServices.gh_day_rate >= $startPrice AND UserSitterServices.gh_day_rate <=$endPrice)"));
								
								$or_condition   = array_merge($or_condition,array("(UserSitterServices.gh_night_rate >= $startPrice AND UserSitterServices.gh_night_rate <= $endPrice)"));

							}else if(array_key_exists ( 'day_care', $this->request->data['Search']['what_time'])){
                        	  $or_condition  = array_merge($or_condition,array("(UserSitterServices.sh_day_rate >= $startPrice AND UserSitterServices.sh_day_rate <=$endPrice)"));
                              $or_condition  = array_merge($or_condition,array("(UserSitterServices.gh_day_rate >= $startPrice AND UserSitterServices.gh_day_rate <=$endPrice)"));
                            }else{
                    		  $or_condition   = array_merge($or_condition,array("(UserSitterServices.sh_night_rate >= $startPrice AND UserSitterServices.sh_night_rate <= $endPrice)"));
                    		  $or_condition   = array_merge($or_condition,array("(UserSitterServices.gh_night_rate >= $startPrice AND UserSitterServices.gh_night_rate <= $endPrice)"));
                        	}
					}else{
						$or_condition  = array_merge($or_condition,array("(UserSitterServices.sh_day_rate >= $startPrice AND UserSitterServices.sh_day_rate <=$endPrice)"));
					
						$or_condition   = array_merge($or_condition,array("(UserSitterServices.sh_night_rate >= $startPrice AND UserSitterServices.sh_night_rate <= $endPrice)"));
						
						$or_condition  = array_merge($or_condition,array("(UserSitterServices.gh_day_rate >= $startPrice AND UserSitterServices.gh_day_rate <=$endPrice)"));
						
						$or_condition   = array_merge($or_condition,array("(UserSitterServices.gh_night_rate >= $startPrice AND UserSitterServices.gh_night_rate <= $endPrice)"));

						$or_condition  = array_merge($or_condition,array("(UserSitterServices.gh_drop_in_visit_rate >= $startPrice AND UserSitterServices.gh_drop_in_visit_rate <=$endPrice)"));
					}
				    //pr($or_condition);die;

                }
				if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'marketplace'))
				{
					$or_condition  = array_merge($or_condition,array("(UserSitterServices.mp_grooming_rate >= $startPrice AND UserSitterServices.mp_grooming_rate <=$endPrice)"));
					$or_condition  = array_merge($or_condition,array("(UserSitterServices.mp_recreation_rate >= $startPrice AND UserSitterServices.mp_recreation_rate <=$endPrice)"));
					$or_condition  = array_merge($or_condition,array("(UserSitterServices.mp_training_rate >= $startPrice AND UserSitterServices.mp_training_rate <=$endPrice)"));
					$or_condition  = array_merge($or_condition,array("(UserSitterServices.mp_driving_rate >= $startPrice AND UserSitterServices.mp_driving_rate <=$endPrice)"));
				}
		
			}
			//SET CONDITION FOR TOP TAB SELECTED (TABLE NAME : users_sitter_services)
			if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'house_sitting')){
				
				$or_condition = array_merge($or_condition,array('UserSitterServices.sitter_house_status=1'));
				$or_condition = array_merge($or_condition,array('UserSitterServices.guest_house_status=1'));
			
			}
			else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'drop_visit')){
				
				$or_condition = array_merge($or_condition,array('UserSitterServices.gh_drop_in_visit_status=1'));
			
			}else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'day_night_care')){
			
				$or_condition = array_merge($or_condition,array('UserSitterServices.sh_day_care_status=1'));
				$or_condition = array_merge($or_condition,array('UserSitterServices.sh_night_care_status=1'));
				$or_condition = array_merge($or_condition,array('UserSitterServices.gh_day_care_status=1'));
				$or_condition = array_merge($or_condition,array('UserSitterServices.gh_night_care_status=1'));
				
			}else if(isset($this->request->data['Search']['selected_service']) && ($this->request->data['Search']['selected_service'] == 'marketplace')){
				$or_condition = array_merge($or_condition,array('UserSitterServices.market_place_status=1'));
            }


			if(isset($this->request->data['Search']['marketplace']) && !empty($this->request->data['Search']['marketplace'])){
			
				 $marker_place_service = explode(",",$this->request->data['Search']['marketplace']);
			
				foreach($marker_place_service as $service_type)
				{
					if($service_type == 'training'){
					
						$or_condition = array_merge($or_condition,array('UserSitterServices.mp_training_status=1'));
					
					}else if($service_type == 'recreation'){
						
						$or_condition = array_merge($or_condition,array('UserSitterServices.mp_recreation_status=1'));
			
					}else if($service_type == 'grooming'){
						
						$or_condition = array_merge($or_condition,array('UserSitterServices.mp_grooming_status=1'));
					
					}else if($service_type == 'driver'){
						
						$or_condition = array_merge($or_condition,array('UserSitterServices.mp_driver_service_status=1'));
					} 
				}
			}
		
			//SET CONDITION FOR TOP TAB SELECTED (TABLE NAME : users_sitter_services)
			if(isset($this->request->data['Search']['sitter_info'])){
                if(isset($this->request->data['Search']['sitter_info']['pet_in_home']) || isset($this->request->data['Search']['sitter_info']['doesnt_own_dog']) ){
                    $or_condition = array_merge($or_condition,array('UserSitterHouses.dogs_in_home="no"'));
                }
                if(isset($this->request->data['Search']['sitter_info']['doesnt_own_caged_dog'])){
                	$or_condition = array_merge($or_condition,array('UserSitterHouses.birds_in_cages="no"'));
                }
                if(isset($this->request->data['Search']['sitter_info']['doesnt_own_cat'])){
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.cats_in_home="no"'));
                }


                if(isset($this->request->data['Search']['sitter_info']['housing_condition'])){
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.property_type="house"'));
                }
                 if(isset($this->request->data['Search']['sitter_info']['has_house'])){
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.property_type="house"'));
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.property_type="farm"'));
                }
                 if(isset($this->request->data['Search']['sitter_info']['outdoor_area'])){
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.outdoor_area="balcony"'));
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.outdoor_area="backyard"'));
                }
                 if(isset($this->request->data['Search']['sitter_info']['non_smoker'])){
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.smokers="no"'));
                }
                 if(isset($this->request->data['Search']['sitter_info']['outdoor_play_area'])){
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.outing_allow_multiple !=""'));
                }
                 if(isset($this->request->data['Search']['sitter_info']['has_fenced_yard'])){
                	 $or_condition = array_merge($or_condition,array('UserSitterHouses.fully_fenced="no"'));
                }

                if(isset($this->request->data['Search']['sitter_info']['medical_experience'])){
                	 $or_condition = array_merge($or_condition,array('UserProfessionalAccreditationsDetails.experience >=1'));
                }
                if(isset($this->request->data['Search']['sitter_info']['administer_cpr'])){
                	 $or_condition = array_merge($or_condition,array('UserProfessionalAccreditationsDetails.cpr_for="no"'));
                }
                 if(isset($this->request->data['Search']['sitter_info']['pet_training_experience'])){
                	 $or_condition = array_merge($or_condition,array('UserProfessionalAccreditationsDetails.ex_rescue_pets="no"'));
                }
                 if(isset($this->request->data['Search']['sitter_info']['administer_injections'])){
                	 $or_condition = array_merge($or_condition,array('UserProfessionalAccreditationsDetails.experience >=1'));
                }
                 if(isset($this->request->data['Search']['sitter_info']['begavioural_experience'])){
                	 $or_condition = array_merge($or_condition,array('UserProfessionalAccreditationsDetails.	ex_behavioural_problems !=""'));
                }
                if(isset($this->request->data['Search']['sitter_info']['certified_oral_medication'])){
                	 $or_condition = array_merge($or_condition,array('UserProfessionalAccreditationsDetails.oral_madications=0'));
                }
            }
            //pr($or_condition);die;
			$finalConditions = implode(" OR ",$or_condition); 
			
			$sourceLocationLatitude = '30.7399738';
			$sourceLocationLongitude = '76.7567368';
			$searchByDistance = isset($this->request->data['Search']['distance'])?$this->request->data['Search']['distance']:"200";
			
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
						users as Users JOIN user_professional_accreditations_details as userProfessionalAccreditationsDetails  
						
						ON  Users.id = userProfessionalAccreditationsDetails.user_id
						
						JOIN 
						user_sitter_houses as UserSitterHouses ON Users.id = UserSitterHouses.user_id
						
						JOIN 
						user_sitter_services as UserSitterServices ON Users.id = UserSitterServices.user_id
						
						WHERE 
						
						'.$finalConditions.'
						
						HAVING distance < '.$searchByDistance.'
						
						ORDER BY distance';
			//echo $query; die;			
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
				
				$userData = $UsersModel->find('all',['contain'=>['UserAboutSitters','UserSitterServices','UserSitterGalleries']])
							   ->where(['Users.id' => $idArr], ['Users.id' => 'integer[]'])
							   ->toArray();
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
	function searchByLocation(){
		
		$this->viewBuilder()->layout('landing');
		$session = $this->request->session();
		$currentLang = $session->read('requestedLanguage');
		
		//ADD MODEL
		$UsersModel = TableRegistry::get('Users');
		$UserSitterFavouriteModel = TableRegistry::get('UserSitterFavourites');
		$conditions = array();
		
		if(!empty($this->request->data)){
			
			$requiredDistance = isset($this->request->data['Search']['destination'])?$this->request->data['Search']['destination']:"100";
			
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
						HAVING distance < 300
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
				
				$userData = $UsersModel->find('all',['contain'=>['UserAboutSitters','UserSitterServices','UserSitterGalleries']])
							   ->where(['Users.id' => $idArr], ['Users.id' => 'integer[]'])
							   ->toArray();
				$loggedInUserID = $session->read('User.id');
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
		$this->set('resultsData',$userData);
		$this->set('distanceAssociation',$distanceAssociation);
		$this->set('sourceLocationLatitude',$sourceLocationLatitude);
		$this->set('sourceLocationLongitude',$sourceLocationLongitude);
		$this->set('headerSearchVal',$this->request->data['location_autocomplete']);
		
		
		
		}
		$this->render("search");
	}
	/**
    Function for sitter details
	*/	
	function sitterDetails($sitterId = null){
		$this->viewBuilder()->layout('landing');
		$sitterId = convert_uudecode(base64_decode($sitterId));

        $UsersModel = TableRegistry::get('Users');
        $userData = $UsersModel->get($sitterId,['contain'=>['UserAboutSitters','UserSitterHouses','UserSitterServices','UserSitterGalleries','UserProfessionalAccreditationsDetails']]);
			
		$this->set('userData',$userData);
		
		//pr($userData);die;
	}
	/**
    Function for booking requests
	*/	
	function sitterContact($sitterId = null){
		$sitterId = convert_uudecode(base64_decode($sitterId));
        
		$this->viewBuilder()->layout('landing');

        $session = $this->request->session();
        $userId = $session->read('User.id');
	
        $bookingRequestsModel = TableRegistry::get('BookingRequests');
		
		
		if(isset($this->request->data['BookingRequests']) && !empty($this->request->data['BookingRequests']))
		{
			//pr($this->request->data['BookingRequests']);die;
			$bookingRequestData = $bookingRequestsModel->newEntity();
               $bookingRequestData = $bookingRequestsModel->patchEntity($bookingRequestData, $this->request->data['BookingRequests'],['validate'=>true]);
                $bookingRequestData->user_id = $userId;
                $bookingRequestData->sitter_id = $sitterId;
                pr($bookingRequestData);die;
			    if ($bookingRequestsModel->save($bookingRequestData)){
			    	//echo "oko save";die;
               	     return $this->redirect(['controller'=>'search','action'=>'thankyou']);
				}else{
					//echo "not save";die;
				  $this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
			 $this->set('booking_data', $bookingRequestData);
		}else{
			$this->set('sitter_id',base64_encode(convert_uuencode($sitterId)));
		}
	}
	/**
	 Function for Thank you message
	*/
	function thankyou()
	{
          $this->viewBuilder()->layout('landing');
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

}
?>
