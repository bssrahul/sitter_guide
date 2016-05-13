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

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\I18n\I18n;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
	/**
	* Function for cms pages
	*/ 
	public function initialize()
    {

		parent::initialize();
				
		
        //GET LOCALE VALUE
		$session = $this->request->session();
		$setRequestedLanguageLocale  = $session->read('setRequestedLanguageLocale'); 
		I18n::locale($setRequestedLanguageLocale);
		if($session->read("requestedLanguage")==""){

			$this->setGuestStore("en");
		}

		
	}
	function cms($url = NULL)
	{
		
		// load CMSPAGE Model
		$this->viewBuilder()->layout('cms_pages');
		$CmsPagesModel = TableRegistry::get('CmsPages');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CmsPagesModel);
		//CODE FOR MULTILIGUAL END
		
		$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> $url]])->first();
		//pr($CmsPageData); die;
		
		$this->pageTitle = $CmsPageData->meta_title;
		$this->pageKeyword = $CmsPageData->meta_keywords;
		$this->pageDescription = $CmsPageData->meta_description;
		
		$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, $url));
	}
	function contactUs(){
		
		$this->viewBuilder()->layout('cms_pages');
		
		$CmsPagesModel = TableRegistry::get('CmsPages');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CmsPagesModel);
		//CODE FOR MULTILIGUAL END
		
		$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> 'contact-us']])->first();
		//pr($CmsPageData); die;
		$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, 'contact-us'));
		$CategoriesModel=TableRegistry::get('Categories');
		$Categoriesdata=$CategoriesModel->find('all')->where(['slug'=>'Contact-us'])->toArray();
		//pr($Categoriesdata);die;
		$this->set('Categoriesdata',$Categoriesdata);
		$SiteModel = TableRegistry::get('SiteConfigurations');
		$SiteData=$SiteModel->find('all')->toArray();
		$AdminEmail=$SiteData[0]['site_contact_email'];
			
		$ContactModel=TableRegistry::get("Contact_requests");
		$Contactdata=$ContactModel->newEntity();
		if(isset($this->request->data) && !empty($this->request->data))
		{
			 $email=$this->request->data['email'];
			 $name=$this->request->data['name'];
			 $phone=$this->request->data['phone_no'];
			 $message=$this->request->data['message'];
			 $location=$this->request->data['location'];
			
			$Contactdata=$ContactModel->patchEntity($Contactdata,$this->request->data);
			if($ContactModel->save($Contactdata))
			{
				$replace = array('{fname}','{phone}','{location}','{message}');
				$with = array($name,$phone,$location, $message);
				$this->send_email('',$replace,$with,'contact_us_admin',$AdminEmail,'');
				$replace = array('{fname}','{phone}','{location}','{message}');
				$with = array($name,$phone, $location,$message);
				$this->send_email('',$replace,$with,'contact_us',$email,'');		
				echo 'Success:'.$this->stringTranslate(base64_encode("Email has been sent to your email address"));
				
						
			}
			
			
		}
		
		
	}
	function news(){

		$this->viewBuilder()->layout('cms_pages');
		$CmsPagesModel = TableRegistry::get('CmsPages');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CmsPagesModel);
		//CODE FOR MULTILIGUAL END
		
		$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> 'news']])->first();
		//pr($CmsPageData); die;
	
		
		$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, 'news'));
		
		$this->loadComponent('Paginator');
		$this->set('modelName','UserBlogs');
		$UserBlogsModel = TableRegistry::get("UserBlogs");
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($UserBlogsModel);
		$blogs_info = $UserBlogsModel->find('all',['order' => ['UserBlogs.modified' => 'desc']])->where(['status'=>1])->toArray();
		//pr($blogs_info);die;
		$this->set('blogs_info',$blogs_info);
				
	}
	function newsDetail(){
		
	}
	function help(){
		$this->viewBuilder()->layout('cms_pages');
		$CmsPagesModel = TableRegistry::get('CmsPages');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CmsPagesModel);
		//CODE FOR MULTILIGUAL END
		
		$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> 'help']])->first();
		$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, 'help'));
		
		$this->loadComponent('Paginator');
		$this->set('modelName','UserBlogs');
		$categoriesModel= TableRegistry::get('categories');
		$categoriesData=$categoriesModel->find('all')->where(['categories.slug'=>'faqs'])->contain(['faqs'])->toArray();
		$sitterArray=array();
		$guestArray=array();
		foreach($categoriesData as $key=>$categories){
			$sitterArray[$key]['title'][]= $categories['title'];
			$guestArray[$key]['title'][]= $categories['title'];
			if(is_array($categories['faqs']) && !empty($categories['faqs'])){
				
				foreach($categories['faqs'] as $k=>$faqData){
					if($faqData['faq_type']=='sitter'){
						
						$sitterArray[$key][]=$faqData;
					}
					else{
						
						$guestArray[$key][]=$faqData;
					}
				}	
			}

		}
		$this->set('sitter',$sitterArray);
		$this->set('guest',$guestArray);
	}
	public function helpListing($type=null,$tid=null,$qid=null)
    {
		$type_id=convert_uudecode(base64_decode($type));
		$title_id=convert_uudecode(base64_decode($tid));
		$que_id=convert_uudecode(base64_decode($qid));
		$this->set('cat_id',$title_id);
		if($type_id != 2){
			$this->set('type_id',$type_id);
		}
		$this->viewBuilder()->layout('cms_pages');
		$CmsPagesModel = TableRegistry::get('CmsPages');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CmsPagesModel);
		//CODE FOR MULTILIGUAL END
		
		$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> 'help']])->first();
		$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, 'help'));
		$this->loadComponent('Paginator');
		$this->set('modelName','UserBlogs');
		$questiondata=array();
		if(($title_id !="") and ($type_id == 2) and ($que_id != ""))
		{
			$categoriesModel= TableRegistry::get('categories');
			$categoriesData=$categoriesModel->find('all')->where(['slug'=>'faqs'])->where(['id'=>$title_id])->contain(['faqs'])->toArray();
			$questionData=$categoriesData[0]['faqs'];
			foreach($questionData as $que){
				if($que['id']==$que_id){
					$questiondata[]=$que;
				}
			}
			//pr($questiondata);die;
			$this->set('categoriesData',$categoriesData);
			$this->set('questionData',$questiondata);
		}
		else{
			
			if($type_id == 3){
				$type="guest";
			}
			else{
				$type="sitter";
			}
			$categoriesModel= TableRegistry::get('categories');
			$categoriesData=$categoriesModel->find('all')->where(['slug'=>'faqs'])->where(['id'=>$title_id])->contain(['faqs'])->toArray();
			$questionsData=$categoriesData[0]['faqs'];
			$questionsdata=array();
			foreach($questionsData as $que){
				
				if(($que['faq_type']== $type)and($type_id == 3)){
					$questionsdata[]=$que;
				}
				if(($que['faq_type']== $type)and($type_id == 1)){
					$questionsdata[]=$que;
				}
			}
			$this->set('questionData',$questionsdata);
			$this->set('categoriesData',$categoriesData);
		}		
    }
    public function helpSearchListing()
    {
		$this->viewBuilder()->layout('cms_pages');
		$CmsPagesModel = TableRegistry::get('CmsPages');
		//CODE FOR MULTILIGUAL START
		$this->i18translation($CmsPagesModel);
		//CODE FOR MULTILIGUAL END
		
		$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> 'help']])->first();
		//pr($CmsPageData); die;
	
		
		$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, 'help'));
		
		$this->loadComponent('Paginator');
		$this->set('modelName','UserBlogs');
		
		$category_id=$this->request->data['cat_id'];
		$this->set('cat_id',$category_id);
		$t_id=$this->request->data['type_id'];
		$this->set('type_id',$t_id);
		$search=$this->request->data['search'];
		$this->set('search',$search);
		if($t_id==3){
			$type="guest";
		}
		else{
			$type="sitter";
		}
		if(!empty($category_id) and !empty($search)){
			$faqsModel= TableRegistry::get('faqs');
			$faqsData=$faqsModel->find('all', array('conditions'=>array('question LIKE'=>'%'.$search.'%')))->where(['category_id'=>$category_id])->where(['faq_type'=>$type])->contain(['Categories'])->toArray();
			$title=@$faqsData[0]['category']['title'];
			$this->set('title',$title);
			$this->set('faqsData',$faqsData);
		}else if(!empty($search)){
			
			$faqsModel= TableRegistry::get('faqs');
			$faqsData=$faqsModel->find('all', array('conditions'=>array('question LIKE'=>'%'.$search.'%')))->toArray();
			$this->set('faqsData',$faqsData);
		}
    }
		
}
