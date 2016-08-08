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
class RatingController extends AppController
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
	public function myRating($rating_id = null){
		$session = $this->request->session();
        $userId = $session->read('User.id');
		
		$this->viewBuilder()->layout('profile_dashboard');
		//Fetch Data Leading-sitting
		$ratingModel = TableRegistry :: get('UserRatings');
		$usersModel = TableRegistry :: get('Users');
		
		if(isset($rating_id) && !empty($rating_id)){
			 
		     $rating_id = convert_uudecode(base64_decode($rating_id));
		     
		     $ratingInfo = $ratingModel->newEntity();
		     $ratingInfo->id = $rating_id;
		     $ratingInfo->change_to_request = 1;
		     
		     $ratingModel->save($ratingInfo);
		     
		     $rating_data = $ratingModel->get($rating_id);
		     
		     $userToInfo = $usersModel->get($rating_data->user_to);
		     $userFromInfo = $usersModel->get($rating_data->user_from);
		     
		     $rating = $rating_data->rating;
		     $comment = $rating_data->comment;
		     $from_name = $userToInfo->first_name;
		     $from_email = $userToInfo->email;
		     $to_name = $userFromInfo->first_name;
		     $to_email = $userFromInfo->email;
		     
		       $to_replace = array('{to_name}','{from_name}','{from_email}','{rating}','{comment}');
			   
               $to_with = array($to_name,$from_name,$from_email,$rating,$comment);
               $from_with = array($to_name,$from_name,$from_email,$rating,$comment);
               
               $this->send_email('',$to_replace,$to_with,'rating_change_request_by',$to_email);
			   $this->send_email('',$to_replace,$from_with,'rating_change_request_to',$from_email);
			
		    return $this->redirect(['controller' => 'rating', 'action' => 'my-rating']); 
		}else{ 
			$ratingData = $ratingModel->find('all')->where(['user_to'=>$userId])->hydrate(false)->contain(['Users'=> 
						function ($q){
							return $q
							->select(['image','first_name','last_name','state','country','facebook_id','is_image_uploaded']);
						}
						])->toArray();
		//echo"<pre>"; print_r($ratingData);die;
			$ratingChangeStatus = 1;
			foreach($ratingData as $rating){
				
			   	if($rating['change_to_request'] == 0){
				    $ratingChangeStatus = 0;
				    break;
				}
			}	
			$this->set('ratingsdata',$ratingData);
			$this->set('ratingChangeStatus',$ratingChangeStatus);
	    }
	}
	
	 public function sharedRating(){
		$session = $this->request->session();
        $userId = $session->read('User.id');
		
		
		$this->viewBuilder()->layout('profile_dashboard');
		
		//Fetch Data Leading-sitting
		
		$ratingModel=TableRegistry :: get('UserRatings');
		
		//$usersModel = TableRegistry :: get('Users');
		
		/*if(isset($rating_id) && !empty($rating_id)){
			 
		     $rating_id = convert_uudecode(base64_decode($rating_id));
		     
		     $ratingInfo = $ratingModel->newEntity();
		     $ratingInfo->id = $rating_id;
		     $ratingInfo->change_to_request = 1;
		     
		     $ratingModel->save($ratingInfo);
		     
		     $rating_infodata = $ratingModel->get($rating_id);
			 $editRatingUserID=@$rating_infodata['user_to'];
			 $editRatingBookinId=@$rating_infodata['booking_id'];
		    // echo "<pre>"; print_r(@$rating_infodata);die;
		     $this->set('rating_infodata',$rating_infodata);
		    // $this->set('editRatingBookinId',$editRatingBookinId);
		}*/
		
		
		
						
		$ratingData = 	$ratingModel->find('all')
									->where(['user_from'=>$userId])
									->hydrate(false)
									->toArray();
		if(!empty($ratingData)){
			$userModel=TableRegistry :: get('Users');
			foreach($ratingData as $k=>$v){
				$ratingData[$k]['user'] = $userModel->find('all')->select(['image','first_name','last_name','state','country','facebook_id','is_image_uploaded'])->where(['Users.id'=>$v['user_to']])->hydrate(false)->first();
			}							
		}
		//echo $editRatingId=$ratingData[0]['user_from'];
		//echo"<pre>"; print_r($ratingData);die;
		$this->set('ratingsdata',$ratingData);
	}
	
	
	
}
?>
