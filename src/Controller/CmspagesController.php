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
class CmspagesController extends AppController
{
	//echo "okokok";die;
  public $helpers = ['Form'];
   
   //Function for check admin session
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		if($this->checkAdminSession()==false)
		{
		  return $this->redirect(['controller' => 'users', 'action' => 'login']);
			exit();
		}
    }
    public function initialize()
    {
		parent::initialize();
        $this->loadComponent('Paginator');
	}
	/**
	* Function for CMS pages
	*/ 
	function cmsPages()
    {
		$this->viewBuilder()->layout("admin_dashboard");
		// load CMSPAGE Model
		$CmsPagesModel = TableRegistry::get('CmsPages');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CmsPagesModel);
		//CODE FOR MULTILIGUAL END
		$this->loadComponent('Paginator');
		$this->set('modelName','CmsPages');
		//for searching 
		 if(!empty($_GET['data']) && isset($_GET['data']))
		 {
			$data = $_GET['data'];
			$cmsPages = $this->Paginator->paginate($CmsPagesModel,[
			   'conditions' => [
					'CmsPages.pagename LIKE' => '%'.$data['CmsPage']['pagename'].'%',
			   ],
			   'limit' => 10,
			   'order' => [
					'CmsPages.modified' => 'desc'
				]
			]);
		 }
		else
		{
			$cmsPages = $this->Paginator->paginate($CmsPagesModel,[ 'limit' => 200,
			   'order' => [
					'CmsPages.modified' => 'desc'
				]
			]);
		}
		$this->set('cmsPages',$cmsPages);
	}
    /** 
	* Function to edit cms pages
	*/ 
	function cmsPagesEdit($id=null)
	{
		$this->viewBuilder()->layout("admin_dashboard");
		$id = convert_uudecode(base64_decode($id));
	
		// load CMSPAGE model
	    $CmsPagesModel = TableRegistry::get('CmsPages');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CmsPagesModel);
		//CODE FOR MULTILIGUAL END

		if (isset($this->request->data) && !empty($this->request->data)) 
		{
		   $cmsPageData = $CmsPagesModel->newEntity($this->request->data['CmsPages'],['validate' => true]);
			
			$cmsPage = (object)$this->request->data['CmsPages'];
			$imagename = $this->request->data['CmsPages']['banner_image']['name'];
			if (!$cmsPageData->errors()){
				
				if($imagename!=''){
					$pageBannerImg = $this->admin_upload_file('staticBannerImg',$this->request->data['CmsPages']['banner_image']);
					
					$pageBannerImg = explode(':',$pageBannerImg);
					if($pageBannerImg[0]=='error'){
					   $this->displayErrorMessage($pageBannerImg[1]);
					   return $this->redirect($this->referer());
					}else{
						$cmsPageData->banner_image = $pageBannerImg[1];
					}				
				}else{
				   unset($cmsPageData->banner_image);
				}
				
				if ($CmsPagesModel->save($cmsPageData)) 
				{
					$this->displaySuccessMessage('CMS Page updated successfully');
					return $this->redirect(['controller'=>'cmspages','action'=>'cms-pages']);
				}
			}else{
				$this->set('page',$cmsPage);
				$this->set([
				'errors' => $cmsPageData->errors(), 
				'_serialize' => ['errors']]);
				
				$this->displayErrorMessage('All fields are required');
				return $this->redirect($this->referer());
			}
        }else{
			$cmsPage = $CmsPagesModel->get($id);
			$this->set('page',$cmsPage);
		}
	}
    /**
	* Function for email templates
	*/ 
	function emailTemplates()
    {
		$this->viewBuilder()->layout("admin_dashboard");
		//echo "okokoooooooo";die;
		// load EmailTemplates Model
		$EmailTemplateModel = TableRegistry::get('EmailTemplates');
	
		//$EmailTemplateTable = $EmailTemplateModel->newEntity();
		$this->loadComponent('Paginator');
		$this->set('modelName','EmailTemplates');
		//for searching 
		//CODE FOR MULTILIGUAL START
		$this->i18translation($EmailTemplateModel);
		//CODE FOR MULTILIGUAL END
		 if(!empty($_GET['data']) && isset($_GET['data']))
		 {
			$data = $_GET['data'];
			$emailTemplates = $this->Paginator->paginate($EmailTemplateModel,[
			   'conditions' => [
					'EmailTemplates.title LIKE' => '%'.$data['EmailTemplates']['title'].'%',
			   ],
			   'order' => [
					'EmailTemplates.modified' => 'desc'
				]
			]);
		 }
		else
		{
			$emailTemplates = $this->Paginator->paginate($EmailTemplateModel,[ 'limit' => 200,
			   'order' => [
					'EmailTemplates.modified' => 'desc'
				]
			]);
		}
		$this->set('emailTemplates',$emailTemplates);
	}
    /**Function for email template edit
	*/
	function emailTemplateEdit($id = null)
	{
		$id=convert_uudecode(base64_decode($id));
		
		$this->viewBuilder()->layout("admin_dashboard");
		
		// Loading model
		$emailTemplateModel = TableRegistry::get('EmailTemplates');

		if (isset($this->request->data) && !empty($this->request->data)) 
		{
			$emailTemplateData = $emailTemplateModel->newEntity($this->request->data['EmailTemplates'],['validate' => true]);
			
				$emailTemp = (object)$this->request->data['EmailTemplates'];
				 
				 if (!$emailTemplateData->errors()){
					//CODE FOR MULTILIGUAL START
					$this->i18translation($emailTemplateModel);
					$this->i18translation($emailTemplateData);
					//CODE FOR MULTILIGUAL END
					$emailTemplateData->modified = date('Y-m-d h:i:s');
					if ( $emailTemplateModel->save($emailTemplateData)) 
					{
						//$this->displaySuccessMessage('Template has been updated Successfully');
						$this->Flash->success(__('Record has been updated Successfully.'));
						return $this->redirect(['controller'=>'cmspages','action'=>'email_templates']);
					}
				 }else{
					 $this->set('emailTemp',$emailTemp);
						$this->set([
						'errors' => $emailTemplateData->errors(), 
						'_serialize' => ['errors']]);
						
						//$this->displayErrorMessage('All fields are required');
						$this->Flash->error(__('All fields are required.'));
						return $this->redirect($this->referer());
				  }
		}else{
			$emailTemp = $emailTemplateModel->get($id);
		    $this->set(compact('emailTemp'));
		}
	}
	/**
	* Function for contact us
	*/ 
	function contactRequests()
    {
		$this->viewBuilder()->layout("admin_dashboard");
		
		// load EmailTemplates Model
		$ContactRequestModel = TableRegistry::get('ContactRequests');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($ContactRequestModel);
		//CODE FOR MULTILIGUAL END

		$this->loadComponent('Paginator');
		$this->set('modelName','ContactRequests');
		//for searching 
		 if(!empty($this->request->data) && isset($this->request->data))
		 {
			$data = $this->request->data;
			$contactRequests = $this->Paginator->paginate($ContactRequestModel,[
			   'conditions' => [
					'ContactRequests.title LIKE' => '%'.$data['ContactRequests']['title'].'%',
			   ],
			   'limit' => 10,
			   'order' => [
					'ContactRequests.title' => 'asc'
				]
			]);
		 }
		else
		{
			$contactRequests = $this->Paginator->paginate($ContactRequestModel,[ 'limit' => 200,
			   'order' => [
					'ContactRequests.title' => 'asc'
				]
			]);
		}
		$this->set('contactRequests',$contactRequests);
		//pr($contactRequests);die;
	}
	/**
	*	Function for view contact request
	*/
	function contactView($requestId = NULL)
	{
		$this->viewBuilder()->layout("admin_dashboard");
		$requestId = convert_uudecode(base64_decode($requestId));
		//load ContactRequest model
		$ContactRequestModel = TableRegistry::get('ContactRequests');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($ContactRequestModel);
		//CODE FOR MULTILIGUAL END

		$contactRequest = $ContactRequestModel->get($requestId);
		
	    $this->set('contactRequest', $contactRequest);
	}
	/**
		Function for contact reply
	*/
	function contactReply($requestId = NULL)
	{
	    $this->viewBuilder()->layout("admin_dashboard");
		$requestId = convert_uudecode(base64_decode($requestId));
		
		//load ContactRequest model
		$ContactRequestModel = TableRegistry::get('ContactRequests');
		
		if (isset($this->request->data) && !empty($this->request->data))
		{
			$data = $this->request->data;
			$contacReauestData	= $ContactRequestModel->newEntity($this->request->data['ContactRequests']);
			$contacReauestData->reply_status = 1;
			//CODE FOR MULTILIGUAL START
			$this->i18translation($ContactRequestModel);
			//CODE FOR MULTILIGUAL END
			if($ContactRequestModel->save($contacReauestData)){
			// sending email reply of contact request
			 $replace = array('{content}');
					$with = array($data['ContactRequests']['reply']);
					$this->send_email('',$replace,$with,'reply_contact',$data['ContactRequests']['email'],$data['ContactRequests']['reply']);
			  //$this->displaySuccessMessage('Reply sent successfully');
			  $this->Flash->success(__('Respond has been sent successfully.'));
			  return $this->redirect(['controller'=>'cmspages','action' => 'contact-requests']);
			}
		}else{
			    $contactRequest = $ContactRequestModel->get($requestId);
				//load model
				$EmailTemplates = TableRegistry::get('EmailTemplates');
				 
				$contactReplyContent = $EmailTemplates->find("all",["conditions"=>["EmailTemplates.alias"=>"reply_contact"]]);
				  $contactReplyContent = $contactReplyContent->first();
				  
				$contactReplyContent->description = str_replace(array('{to_name}', '{content}'), array($contactRequest->name, 'Write your message here...'), $contactReplyContent->description);
				
				$this->set('contactReplyContent', $contactReplyContent);
				$this->set('contactRequest', $contactRequest);
		}
	}
	
	/**
       Function for add blog
	*/
	function addBlog()
	{

		 $this->viewBuilder()->layout('admin_dashboard');
		   //Load model
			$UserBlogsModel = TableRegistry::get("UserBlogs");
			$UserBlogData = $UserBlogsModel->newEntity();
			if(isset($this->request->data) && !empty($this->request->data) )
		   {
			//pr($this->request->data); die;
			$UserBlogData = $UserBlogsModel->patchEntity($UserBlogData,$this->request->data['UserBlogs']);
			$imagename = $this->request->data['UserBlogs']['image']['name'];
			//Upload image
				if($imagename!=''){
					$blogImg = $this->admin_upload_file('blogsImg',$this->request->data['UserBlogs']['image']);
				
					$blogImg = explode(':',$blogImg);
					if($blogImg[0]=='error')
					{
					   $this->displayErrorMessage($blogImg[1]);
					   return $this->redirect($this->referer());
					}
					
					else{
						$UserBlogData->image = $blogImg[1];
					}				
				}else{
				   unset($UserBlogData->image);
				}
				//CODE FOR MULTILIGUAL START
				$this->i18translation($UserBlogsModel);
				$this->i18translation($UserBlogData);
				//CODE FOR MULTILIGUAL END
				//Save data
				
				if($UserBlogsModel->save($UserBlogData)){
				  $this->Flash->success(__('Record has been added Successfully'));
				   return $this->redirect(['controller' => 'cmspages', 'action' => 'blogs-listing']);
				}else{
				   $this->Flash->error(__('Error found, Kindly fix the errors.'));
			   }	
		}$this->set('blog_info', $UserBlogData);
	}
	/**
   function for listing blogs 
   */
   function blogsListing(){
        $this->viewBuilder()->layout("admin_dashboard");

        $this->loadComponent('Paginator');
		$this->set('modelName','UserBlogs');
		$UserBlogsModel = TableRegistry::get("UserBlogs");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UserBlogsModel);
		$blogs_info = $UserBlogsModel->find('all',['order' => ['UserBlogs.modified' => 'desc']]);
		$this->set('blogs_info',$blogs_info);
	}
	/**
       function for edit blog 
	*/
   function editBlog($id = null){

        $this->viewBuilder()->layout('admin_dashboard');
   	     //$blogId = convert_uudecode(base64_decode($blogId));

		$id=convert_uudecode(base64_decode($id));
		$UserBlogsModel = TableRegistry::get("UserBlogs");
	 
		if(isset($this->request->data) && !empty($this->request->data)){
			
			$UserBlogData = $UserBlogsModel->newEntity($this->request->data['UserBlogs'],['validate' => true]);
			$UserBlogData->id = $blogId = convert_uudecode(base64_decode($this->request->data['blogId']));

			$imagename = $this->request->data['UserBlogs']['image']['name'];
			if (!$UserBlogData->errors()){
				//Upload user image
				if($imagename!=''){
					$blogImg = $this->admin_upload_file('blogsImg',$this->request->data['UserBlogs']['image']);
					
					$blogImg = explode(':',$blogImg);
					if($blogImg[0]=='error'){
					   $this->Flash->error(__($blogImg[1]));
					   return $this->redirect($this->referer());
					}else{
						$UserBlogData->image = $blogImg[1];
					}				
				}else{
				   unset($UserBlogData->image);
				}

				//CODE FOR MULTILIGUAL START
				$this->i18translation($UserBlogsModel);
				$this->i18translation($UserBlogData);
				//CODE FOR MULTILIGUAL END
				//Update user data
				if($UserBlogsModel->save($UserBlogData)){
					$this->Flash->success(__('Record has been updated Successfully'));
					return $this->redirect(['controller'=>'cmspages','action'=>'blogs-listing']);
				}
			}else{
				$blogInfo = $UserBlogsModel->get($blogId);
				$this->set('blogInfo',$blogInfo);
				//echo "<pre>";print_r($UserBlogData->errors());die;
				/*$this->set([
				'errors' => $UserBlogData->errors(), 
				'_serialize' => ['errors']]);*/
                $session = $this->request->session();
				$session->write("errors",$UserBlogData->errors());
				return $this->redirect('/cmspages/edit-blog/'.base64_encode(convert_uuencode($blogId)));
			}
		}else{
			$blogInfo = $UserBlogsModel->get($id);
			$this->set('blogInfo',$blogInfo);
		}
   }
   /**
   function for listing subscribers 
   */
   function subscribesListing(){
   	//echo "okokok";die;
        $this->viewBuilder()->layout("admin_dashboard");
        $SubscribesModel = TableRegistry::get("Subscribes");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($SubscribesModel);
		$subscribes_info = $SubscribesModel->find('all',['order' => [
										'Subscribes.modified' => 'desc'
									]]);

		$this->set('subscribes_info',$subscribes_info);
		//pr($subscribes_info);die;
	}
	/**
    Function for send news latter
	*/
	function sendNewsletter(){
		$this->viewBuilder()->layout('admin_dashboard');
		//load ContactRequest model
		 $SubscribesModel = TableRegistry::get("Subscribes");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($SubscribesModel);
		
		/////////////////////////////
        if (isset($this->request->data) && !empty($this->request->data))
		{
			$data = $this->request->data;
			//echo "okok<pre>";print_r($data);die;
			if(isset($data['email']) && !empty($data['email'])){
				//$i = 0;
				foreach($data['email'] as $subscriber_email)
				{
					$replace = array('{content}');
					$with = array($data['Subscribes']['reply']);
					$this->send_email('',$replace,$with,'reply_contact',$subscriber_email,$data['Subscribes']['reply']);
                }
                //echo $subscriber_email.$data['Subscribes']['reply'];die;
                
			}
			//CODE FOR MULTILIGUAL START
			 $this->i18translation($SubscribesModel);
			//CODE FOR MULTILIGUAL END
				$this->Flash->success(__('News letter sent Successfully'));
	         //$this->displaySuccessMessage('News latter sent successfully');
			 return $this->redirect(['controller'=>'cmspages','action' => 'subscribes-listing']);
			                                                                
		}else{
			    //$contactRequest = $ContactRequestModel->get($requestId);
				//load model
				$EmailTemplates = TableRegistry::get('EmailTemplates');
				 
				$contactReplyContent = $EmailTemplates->find("all",["conditions"=>["EmailTemplates.alias"=>"reply_contact"]]);
				//echo "<pre>";print_r($contactReplyContent);die;
				$contactReplyContent = $contactReplyContent->first();
				  
				$contactReplyContent->description = str_replace(array('{to_name}', '{content}'), array('Subscriber', 'Write your message here...'), $contactReplyContent->description);
				$this->set('contactReplyContent', $contactReplyContent);

				$subscribesInfo = $SubscribesModel->find('all');
                $this->set('subscribesInfo',$subscribesInfo);
		}

	}
	/**
		===================CHOOSE US AND HOW WORKS=================
        */
	 /**
	    Function for works listing
	*/
	function worksListing()
	{
		        $this->viewBuilder()->layout('admin_dashboard');
				$this->loadComponent('Paginator');
				$this->set('modelName','HowWorks');
				$HowWorksModel = TableRegistry::get("HowWorks");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($HowWorksModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$works_info = $this->Paginator->paginate($HowWorksModel,[
			'conditions' => [
			'HowWorks.id LIKE' => '%'.$data['HowWorks']['id'].'%'],
			'limit' => 10,
			'order' => [
			'HowWorks.modified' => 'desc']]);
		}else{
			$works_info = $this->Paginator->paginate($HowWorksModel,[ 'conditions' => ['HowWorks.category'=>'how_it_works'],'limit' => 200,
			'order' => [
			'HowWorks.modified' => 'desc']]);
		}
		$this->set('works_info',$works_info);
	}
	/**
       Function for add works
	*/
	function addWorks()
	{

		 $this->viewBuilder()->layout('admin_dashboard');
		   //Load model
			$HowWorksModel = TableRegistry::get("HowWorks");
			$workData = $HowWorksModel->newEntity();
			if(isset($this->request->data) && !empty($this->request->data) )
		   {
			//pr($this->request->data); die;
			$workData = $HowWorksModel->patchEntity($workData,$this->request->data['HowWorks']);
			$imagename = $this->request->data['HowWorks']['image']['name'];
			//Upload image
				if($imagename!=''){
					$HowWorksImg = $this->admin_upload_file('categoryImg',$this->request->data['HowWorks']['image']);
				
					$HowWorksImg = explode(':',$HowWorksImg);
					if($HowWorksImg[0]=='error')
					{
					   $this->Flash->error(__($HowWorksImg[1]));
					   return $this->redirect($this->referer());
					}
					
					else{
						$workData->image = $HowWorksImg[1];
					}				
				}else{
				   unset($workData->image);
				}
				//CODE FOR MULTILIGUAL START
				$this->i18translation($HowWorksModel);
				$this->i18translation($workData);
				//CODE FOR MULTILIGUAL END
				//Save data
				echo "okokokok";die;
				if($HowWorksModel->save($workData)){
				   $this->Flash->success(__('Record has been added Successfully'));
				   return $this->redirect(['controller' => 'cmspages', 'action' => 'works-listing']);
				}else{
				   $this->Flash->error(__('Error found, Kindly fix the errors.'));
			   }	
		}$this->set('work_info', $workData);
	}
	/**
       Function for adit Works
	*/
	function editWorks($id=null)
	{
		$this->viewBuilder()->layout('admin_dashboard');
		//$id=convert_uudecode(base64_decode($id));
		$HowWorksModel = TableRegistry::get("HowWorks");
		if(isset($this->request->data) && !empty($this->request->data))
		{
			//pr($this->request->data);die;
		    $workData = $HowWorksModel->newEntity();
            $imagename = $this->request->data['HowWorks']['works_image']['name'];
				if($imagename!=''){
					$HowWorksImg = $this->admin_upload_file('categoryImg',$this->request->data['HowWorks']['works_image']);
					
					$HowWorksImg = explode(':',$HowWorksImg);
					if($HowWorksImg[0]=='error'){
					   //$this->displayErrorMessage($HowWorksImg[1]);
					   $this->Flash->error(__($HowWorksImg[1]));
					   return $this->redirect($this->referer());
					}else{
						$workData->image = $HowWorksImg[1];
					}				
				}else{
				   unset($workData->image);
				}
                $workData = $HowWorksModel->patchEntity($workData, $this->request->data['HowWorks'],['validate'=>'update']);
		        if ($HowWorksModel->save($workData)) {
					//$this->Flash->success(__('Record has been added Successfully'));
					$this->Flash->success(__('Record has been updated Successfully.'));
					return $this->redirect(['controller'=>'cmspages','action'=>'works-listing']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
	    }else{
		   $workData = $HowWorksModel->get($id);
	    }
	$this->set('work_info', $workData);
   }
  /**
      Function for choose us listing
  */
   function chooseUsListing()
	{
		 		$this->viewBuilder()->layout('admin_dashboard');
				$this->loadComponent('Paginator');
				$this->set('modelName','HowWorks');
				$HowWorksModel = TableRegistry::get("HowWorks");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($HowWorksModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$works_info = $this->Paginator->paginate($HowWorksModel,[
			'conditions' => [
			'HowWorks.id LIKE' => '%'.$data['HowWorks']['id'].'%'],
			'limit' => 10,
			'order' => [
			'HowWorks.modified' => 'desc']]);
		}else{
			$works_info = $this->Paginator->paginate($HowWorksModel,[ 'conditions' => ['HowWorks.category'=>'why_choose_us'],'limit' => 200,
			'order' => [
			'HowWorks.modified' => 'desc']]);
		}
		$this->set('works_info',$works_info);
	}
	/**
       Function for add choose us
	*/
	function addChooseUs()
	{
		 $this->viewBuilder()->layout('admin_dashboard');
		   //Load model
			$HowWorksModel = TableRegistry::get("HowWorks");
			$workData = $HowWorksModel->newEntity();
			if(isset($this->request->data) && !empty($this->request->data) )
		   {
		   
			$workData = $HowWorksModel->patchEntity($workData,$this->request->data['HowWorks']);
			$imagename = $this->request->data['HowWorks']['image']['name'];
			//echo "<pre>";print_r($this->request->data);die;
			//Upload image
				if($imagename!=''){
					$HowWorksImg = $this->admin_upload_file('categoryImg',$this->request->data['HowWorks']['image']);
				
					$HowWorksImg = explode(':',$HowWorksImg);
					if($HowWorksImg[0]=='error')
					{
					   $this->Flash->error(__($HowWorksImg[1]));
					   return $this->redirect($this->referer());
					}
					
					else{
						$workData->image = $HowWorksImg[1];
					}				
				}else{
				   unset($workData->image);
				}
				//CODE FOR MULTILIGUAL START
				$this->i18translation($HowWorksModel);
				$this->i18translation($workData);
				//CODE FOR MULTILIGUAL END
				//Save data
				$workData->category = trim($workData->category);
				if($HowWorksModel->save($workData)){
					// echo "<pre>";print_r($workData);die;
				   $this->Flash->success(__('Record has been added Successfully'));
				   return $this->redirect(['controller' => 'cmspages', 'action' => 'choose-us-listing']);
				}else{
				   $this->Flash->error(__('Error found, Kindly fix the errors.'));
			   }	
		}$this->set('work_info', $workData);
	}
	/**
  Function for adit choose us
	*/
	function editChooseUs($id=null)
	{
		$this->viewBuilder()->layout('admin_dashboard');
		$HowWorksModel = TableRegistry::get("HowWorks");
		if(isset($this->request->data) && !empty($this->request->data))
		{
		    $workData = $HowWorksModel->newEntity();
            $imagename = $this->request->data['HowWorks']['works_image']['name'];
            
				if($imagename!=''){
					$HowWorksImg = $this->admin_upload_file('categoryImg',$this->request->data['HowWorks']['works_image']);
					
					$HowWorksImg = explode(':',$HowWorksImg);
					if($HowWorksImg[0]=='error'){
					   $this->Flash->error(__($HowWorksImg[1]));
					   return $this->redirect($this->referer());
					}else{
						$workData->image = $HowWorksImg[1];
					}				
				}else{
				   unset($workData->image);
				}
                $workData = $HowWorksModel->patchEntity($workData, $this->request->data['HowWorks'],['validate'=>'update']);
		        if ($HowWorksModel->save($workData)) {
					$this->Flash->success(__('Record has been updated Successfully'));
					return $this->redirect(['controller'=>'cmspages','action'=>'choose-us-listing']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
	    }else{
		     $workData = $HowWorksModel->get($id);
	    }
	$this->set('work_info', $workData);
   }
		/**
		=======================END CHOOSE US AND HOW WORKS=====================
		*/
	/*===================NEWS UPDATES==============*/
		
	/**
	    Function for new updates listing
	*/
	function newsUpdatesListing()
	{
		        $this->viewBuilder()->layout('admin_dashboard');
				$this->loadComponent('Paginator');
				$this->set('modelName','HowWorks');
				$HowWorksModel = TableRegistry::get("HowWorks");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($HowWorksModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$works_info = $this->Paginator->paginate($HowWorksModel,[
			'conditions' => [
			'HowWorks.id LIKE' => '%'.$data['HowWorks']['id'].'%'],
			'limit' => 10,
			'order' => [
			'HowWorks.modified' => 'desc']]);
		}else{
			$works_info = $this->Paginator->paginate($HowWorksModel,[ 'conditions' => ['HowWorks.category'=>'news_updates'],'limit' => 200,
			'order' => [
			'HowWorks.modified' => 'desc']]);
		}
		$this->set('works_info',$works_info);
	}
	/**
       Function for add news updates
	*/
	function addNewsUpdates()
	{

		 $this->viewBuilder()->layout('admin_dashboard');
		   //Load model
			$HowWorksModel = TableRegistry::get("HowWorks");
			$workData = $HowWorksModel->newEntity();
			if(isset($this->request->data) && !empty($this->request->data) )
		   {
			//pr($this->request->data); die;
			$workData = $HowWorksModel->patchEntity($workData,$this->request->data['HowWorks']);
			$imagename = $this->request->data['HowWorks']['image']['name'];
			//Upload image
				if($imagename!=''){
					$HowWorksImg = $this->admin_upload_file('categoryImg',$this->request->data['HowWorks']['image']);
				
					$HowWorksImg = explode(':',$HowWorksImg);
					if($HowWorksImg[0]=='error')
					{
					   //$this->displayErrorMessage($HowWorksImg[1]);
					   $this->Flash->error(__($HowWorksImg[1]));
					   return $this->redirect($this->referer());
					}
					else{
						$workData->image = $HowWorksImg[1];
					}				
				}else{
				   unset($workData->image);
				}
				//CODE FOR MULTILIGUAL START
				$this->i18translation($HowWorksModel);
				$this->i18translation($workData);
				//CODE FOR MULTILIGUAL END
				//Save data
				//echo "okokokok";die;
				if($HowWorksModel->save($workData)){
				   //$this->displaySuccessMessage("Record has been added Successfully");
				    $this->Flash->success(__('Record has been added Successfully'));
				   return $this->redirect(['controller' => 'cmspages', 'action' => 'news-updates-listing']);
				}else{
				   $this->Flash->error(__('Error found, Kindly fix the errors.'));
			   }	
		}$this->set('work_info', $workData);
	}
	/**
       Function for adit news updates
	*/
	function editNewsUpdates($id=null)
	{
		$this->viewBuilder()->layout('admin_dashboard');
		//$id=convert_uudecode(base64_decode($id));
		$HowWorksModel = TableRegistry::get("HowWorks");
		if(isset($this->request->data) && !empty($this->request->data))
		{
			//pr($this->request->data);die;
		    $workData = $HowWorksModel->newEntity();
            $imagename = $this->request->data['HowWorks']['works_image']['name'];
				if($imagename!=''){
					$HowWorksImg = $this->admin_upload_file('categoryImg',$this->request->data['HowWorks']['works_image']);
					
					$HowWorksImg = explode(':',$HowWorksImg);
					if($HowWorksImg[0]=='error'){
					   
					   $this->Flash->error(__($HowWorksImg[1]));
					   return $this->redirect($this->referer());
					}else{
						$workData->image = $HowWorksImg[1];
					}				
				}else{
				   unset($workData->image);
				}
                $workData = $HowWorksModel->patchEntity($workData, $this->request->data['HowWorks'],['validate'=>'update']);
		        if ($HowWorksModel->save($workData)) {
					$this->Flash->success(__('Record has been updated Successfully'));
					return $this->redirect(['controller'=>'cmspages','action'=>'news-updates-listing']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
	    }else{
		   $workData = $HowWorksModel->get($id);
	    }
	$this->set('work_info', $workData);
   }	
	/*===============END NEWS UPDATES============*/	

	/*===============STATIC STRING MODULE============*/	
	 /**
      Function for Static Strings listing
  */
   function stringsListing()
	{
		 		$this->viewBuilder()->layout('admin_dashboard');
				$this->loadComponent('Paginator');
				$this->set('modelName','StaticStrings');
				$StaticStringsModel = TableRegistry::get("StaticStrings");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($StaticStringsModel);
		//CODE FOR MULTILIGUAL END
		//for searching 
		if(!empty($_GET['data']) && isset($_GET['data'])){
			$data = $_GET['data'];
			$works_info = $this->Paginator->paginate($StaticStringsModel,[
			'conditions' => [
			'StaticStrings.id LIKE' => '%'.$data['StaticStrings']['id'].'%'],
			'limit'=>500,
			'order' => [
			'StaticStrings.created_date' => 'desc']]);
		}else{
			$strings_info = $this->Paginator->paginate($StaticStringsModel,['limit'=>500,
			'order' => [
			'StaticStrings.created_date' => 'desc']]);
		}
		
		$this->set('strings_info',$strings_info);
	}
	/**
       Function for add static string
	*/
	function addString()
	{
		 $this->viewBuilder()->layout('admin_dashboard');
		   //Load model
			$StaticStringsModel = TableRegistry::get("StaticStrings");
			$stringData = $StaticStringsModel->newEntity();
			if(isset($this->request->data) && !empty($this->request->data) )
		   {
		   
			$stringData = $StaticStringsModel->patchEntity($stringData,$this->request->data['StaticStrings']);
			
				//CODE FOR MULTILIGUAL START
				$this->i18translation($StaticStringsModel);
				$this->i18translation($stringData);
				//CODE FOR MULTILIGUAL END
				
               	if($StaticStringsModel->save($stringData)){
					// echo "<pre>";print_r($stringData);die;
				   $this->Flash->success(__('Record has been added Successfully'));
				   return $this->redirect(['controller' => 'cmspages', 'action' => 'strings-listing']);
				}else{
				   $this->Flash->error(__('Error found, Kindly fix the errors.'));
			   }	
		}$this->set('string_info', $stringData);
		//echo "<pre>";print_r($stringData);die;

	}
	/**
  Function for adit choose us
	*/
	function editString($id=null)
	{
		$this->viewBuilder()->layout('admin_dashboard');
		$StaticStringsModel = TableRegistry::get("StaticStrings");
		if(isset($this->request->data) && !empty($this->request->data))
		{
		    $stringData = $StaticStringsModel->newEntity();
          
                $stringData = $StaticStringsModel->patchEntity($stringData, $this->request->data['StaticStrings'],['validate'=>'update']);
		        $stringData->modified = date('Y-m-d h:i:s');
		        if ($StaticStringsModel->save($stringData)) {
					$this->Flash->success(__('Record has been updated Successfully'));
					return $this->redirect(['controller'=>'cmspages','action'=>'choose-us-listing']);
				}else{
					$this->Flash->error(__('Error found, Kindly fix the errors.'));
				}
	    }else{
		     $stringData = $StaticStringsModel->get($id);
	    }
	$this->set('string_info', $stringData);
   }	
   /*=======================END STATIC STRING=================*/
}
