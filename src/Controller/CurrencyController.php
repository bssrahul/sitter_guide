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

class CurrencyController extends AppController
{
	//echo "currency controller";die;
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
	/**
	* Function to check admin session
	*/
	function checkAdminSession()
	{
		$session = $this->request->session();
		$AdminData  = $session->read('Admin');
		
		if(isset($AdminData['id']) && isset($AdminData['username']))
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
/**Function for add Currency
*/
function addCurrency(){
	$this->viewBuilder()->layout('admin_dashboard');
	//Load model
	    $CurrenciesModel = TableRegistry::get("Currencies");
	if(isset($this->request->data) && !empty($this->request->data)){
		
		
	   $currencyData = $CurrenciesModel->newEntity($this->request->data['Currencies'],['validate' => true]);
		if(!$currencyData->errors()){
			//Save Category data
			if($CurrenciesModel->save($currencyData)){
			   $this->Flash->success(__("Currency has been added Successfully"));
			   return $this->redirect(['controller' => 'currency', 'action' => 'currencies-listing']);
			}	
		}else{
			//Set errors
			$this->set([
			'errors' => $currencyData->errors(), 
			'_serialize' => ['errors']]);
			return;
		}
    }
}
/**Function for Currency
*/
function updateCurrencies(){
	$this->viewBuilder()->layout('admin_dashboard');
	//$id = convert_uudecode(base64_decode($id));
	$CurrenciesModel = TableRegistry::get("Currencies");
 
	if(isset($this->request->data) && !empty($this->request->data)){
		$curruncies = $this->request->data['Currencies'];
		$currencyData = $CurrenciesModel->newEntity();
		 
		 foreach($curruncies as $k=>$v){
			$currencyData->id =$k;
			$currencyData->price = $v['price']['0'];
			
			//Update currency data
			//echo "<pre>";print_r($currencyData);die;
			$CurrenciesModel->save($currencyData);
			//$CurrenciesModel->create();
		}
				
		$this->Flash->success(__("Records has been updated successfully"));
		return $this->redirect(['controller'=>'currency','action'=>'currencies-listing']);
		
	}else{
	   return $this->redirect(['controller'=>'currency','action'=>'currencies-listing']);
	}
}
/**Function for Categories list
*/
         
function currenciesListing(){
	$this->viewBuilder()->layout('admin_dashboard');
	
    $this->loadComponent('Paginator');
	$this->set('modelName','Currencies');
    $CategoriesModel = TableRegistry::get("Currencies");
	//for searching 
	if(!empty($_GET['data']) && isset($_GET['data'])){
		$data = $_GET['data'];
		$currencies_info = $this->Paginator->paginate($CategoriesModel,[
		'conditions' => [
		'Currencies.id LIKE' => '%'.$data['Currencies']['id'].'%'],
		'limit' => 10,
		'order' => [
		'Currencies.modified' => 'desc']]);
	}else{
		$currencies_info = $this->Paginator->paginate($CategoriesModel,[ 'limit' => 200,
		'order' => [
		'Currencies.modified' => 'desc']]);
	}
	$this->set('currencies_info',$currencies_info);
	//pr($currencies_info);die;
}
/**
* Function to generate random string
*/
function RandomStringGenerator($length = 10)
{              
	  $string = "";
	  $pattern = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		for($i=0; $i<$length; $i++)
		{
			$string .= $pattern{rand(0,61)};
		}
		return $string;
}
/**
* Function for Upload Image
*/
	function admin_upload_file($type = NULL, $FileArr = array())
	{
		//parent::initialize();
		//echo "<pre>";print_r($FileArr);die;
		$this->loadComponent('Resize');
		
		$this->viewBuilder()->layout('');
		$this->autoRender=false;
		
		if($FileArr['name']!="")
		{
			if($type == 'logo')
			{
				$uploadFolder="uploads";	
				$logoWidth="285";
				$logoHeight="82";
				$logoSize="2097152";
				$logoKb = "2 MB";
			}
			else if($type == 'favicon')
			{
				$uploadFolder="uploads";	
				$logoWidth = "16";
				$logoHeight = "16";
				$logoSize="204800";
				$logoKb = '200 KB';   
			}else if($type == 'profilePic')
			{
				$uploadFolder="uploads";	
				$logoWidth = "200";
				$logoHeight = "160";
				$logoSize="204800";
				$logoKb = '200 KB';
			}
			else if($type == 'categoryImg')
			{
				$uploadFolder="uploads";	
				$logoWidth = "200";
				$logoHeight = "160";
				$logoSize="204800";
				$logoKb = '200 KB';
			}
			else if($type == 'audio' || $type == 'video')
			{
				$imgName = pathinfo($FileArr['name']);
				$file = $FileArr;
				$fileName = $FileArr['name'];
				$ext = trim(substr($fileName, strrpos($fileName,'.')));
				
				$explodeExt = explode('.',$fileName);
				$explodeExt =  end($explodeExt);
				if($type == 'audio')
				{
					$uploadFolder="files/audio";	
					$fileSize="5242880";
					$fileKb = "5 MB";
					$extCheckArr = array('mp3','ogg','wma');	
				}
				else
				{
					$uploadFolder="files/video";	
					$fileSize="10485760";
					$fileKb = '10 MB';
					$extCheckArr = array('mp4','ogg','wmv');	
				}
				
				
				if(in_array($explodeExt,$extCheckArr))
				{
					if($FileArr['size'] <= $fileSize)
					{
						$fileName = $this->RandomStringGenerator(15);
						$destination = realpath('../webroot/'.$uploadFolder).'/'.$fileName.$ext;
						$src = $FileArr['tmp_name'];
						
						
						
						if(move_uploaded_file($FileArr['tmp_name'],$destination))
						{
							$return = "success:".$fileName.$ext.":uploaded";
							return $return;
						}
					}
					else
					{
						$return = "error:File size should be less than $fileKb";
						return $return;
					}
				}
				else
				{
					$extCheckStr = implode(',',$extCheckArr);
					$return = "error:Only ".strtoupper($extCheckStr)." files are allowed!";
					return $return;
				}
			}
			else
			{
				$uploadFolder="uploads";	
				$logoWidth = "16";
				$logoHeight = "16";
				$logoSize="204800";
				$logoKb = '200 KB';
			}
			
			
			
			$imgName = pathinfo($FileArr['name']);
			$file = $FileArr;
			$image = $FileArr['name'];
			$ext = trim(substr($image, strrpos($image,'.')));
			
			$explodeExt = explode('.',$image);
			$explodeExt =  end($explodeExt);
			//echo $logoSize;die;
			
			if($explodeExt=='jpg' || $explodeExt=='jpeg' || $explodeExt=='png' || $explodeExt=='gif' || $explodeExt=='bmp')
			{
				
				if($FileArr['size'] <= $logoSize)
				{
					$image = $this->RandomStringGenerator(15);
					$destination = realpath('../webroot/img/'.$uploadFolder).'/'.$image.$ext;
					$src = $FileArr['tmp_name'];
					//echo $destination;die;
					list( $width, $height, $source_type ) = getimagesize($src);	
					
					if($width == $logoWidth && $height == $logoHeight)
					{
						
						move_uploaded_file($FileArr['tmp_name'],$destination);
						$imgStatus = 1;
						
					}else{
						
						$this->Resize->resize($FileArr['tmp_name'],$destination,'as_define',$logoWidth,$logoHeight,0,0,0,0);
						$imgStatus = 2;
					}
					
					if($imgStatus == 1)
					{
						$return = "success:".$image.$ext.":uploaded";
						return $return;
					}else{
						$return = "success:".$image.$ext.":resize";
						return $return;
					}
				}else
				{
					$return = "error:File size should be less than $logoKb";
					return $return;
					//echo $return;die;
					
				}
			}else{
				$return = "error:Only JPG, PNG, BMP or GIF files are allowed!";
				return $return;
			}
		}else{
			$return = "error:Some error occured while saving to the database!";
			return $return;
		}
	}
	/** Function for display error message
	*/
	function displayErrorMessage($msg=null){
		$session = $this->request->session();
		$session->write('success','');
		$session->write('error',$msg);
	}
	/**Function for display success message
	*/
	function displaySuccessMessage($msg=null){
		$session = $this->request->session();  
		$session->write('error','');
		$session->write('success',$msg);
	}
	
	
}
?>
