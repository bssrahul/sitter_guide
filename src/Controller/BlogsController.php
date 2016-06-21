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
use Cake\View\Helper\PaginatorHelper;
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
class BlogsController extends AppController
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
	public $paginate = [
		'limit' => 4,
		'order' => [
			'UserBlogs.id' => 'DESC'
		]
	];
	
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
		
		$servicesModel = TableRegistry::get('Services');
		
		$servicesInfo = $servicesModel->find('all', ['order' => ['Services.created' => 'desc']]) ->limit(5)->where(['Services.status' =>1])->toArray();
		
		$this->set('servicesInfo',$servicesInfo);

		 $this->loadComponent('Paginator');
	}
	
	function blogListing($category=null){

		$this->viewBuilder()->layout('blogs');
		$BlogsModel = TableRegistry::get('UserBlogs');
		
		//GET CMS PAGES DETAIL
		$CmsPagesModel = TableRegistry::get('CmsPages');
		$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> 'blog']])->first();
		$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, 'blog'));
		
		//CODE FOR MULTILIGUAL START
		$this->i18translation($BlogsModel);
		//CODE FOR MULTILIGUAL END
		
		$this->loadComponent('Paginator');
		$this->set('modelName','UserBlogs');
		$conditions=array('status'=>1);
		//CODE FOR MULTILIGUAL START
		if($category !="" && $category !="all"){
			
			$conditions = array_merge($conditions,array('category'=>$category));
			$heading = ucwords(str_replace("_",' ',$category));
		}else{
			$heading = 'Sitter Guide';
		}
		//pr($conditions); die;
		$blogs_info = $BlogsModel->find('all',['order' => ['UserBlogs.modified' => 'desc']])->where($conditions);
		
		$latest__blogs_info = $BlogsModel->find('all',['order' => ['UserBlogs.id' => 'desc']])->where(['status'=>1,'title !='=>""])->limit(5)->hydrate(false);
			
		$this->set('blogs_info',$this->paginate($blogs_info));
		$this->set('latest__blogs_info',$latest__blogs_info);		
		$this->set('blog_count',$blogs_info->count());		
		$this->set('blog_count',$blogs_info->count());		
		$this->set('heading',$heading);		
		$this->set('category',$category);		
		//pr($latest__blogs_info); die;
	}
	
	function blogDetails($blogID=''){
		//pr($_SERVER); die;
		if($blogID ==''){
	
			$this->Flash->success(__('Invalid URL entered.'));
			return $this->redirect(['controller' => 'Guests']);	
	
		}else{
			
			$blogID = convert_uudecode(base64_decode($blogID));
			
			$this->viewBuilder()->layout('blogs');
			$BlogsModel = TableRegistry::get('UserBlogs');
			
			//GET CMS PAGES DETAIL
			$CmsPagesModel = TableRegistry::get('CmsPages');
			$CmsPageData = $CmsPagesModel->find("all",["conditions"=>['CmsPages.pageurl'=> 'blog']])->first();
			$this->set(array('CmsPageData', 'pageurl'), array($CmsPageData, 'blog'));
			
			//CODE FOR MULTILIGUAL START
			$this->i18translation($BlogsModel);
			//CODE FOR MULTILIGUAL END
			
			$this->loadComponent('Paginator');
			$this->set('modelName','UserBlogs');
			
			//CODE FOR MULTILIGUAL START
			$blogs_info = $BlogsModel->find('all',['conditions' => ['UserBlogs.id' => $blogID]])->hydrate(false)->where(['status'=>1])->first();
			if(!empty($blogs_info)){
				$you_may_also_like = $BlogsModel->find('all',['conditions' => ['UserBlogs.category' => $blogs_info['category'],'UserBlogs.id !=' => $blogID]])->hydrate(false)->where(['status'=>1])->limit(4)->toArray();	
			}
			
			$blogData = $BlogsModel->newEntity();
			$blogData->id = $blogID;
			$blogData->view_count = ($blogs_info['view_count']+1);
			$BlogsModel->save($blogData);
						
			$latest__blogs_info = $BlogsModel->find('all',['order' => ['UserBlogs.id' => 'desc']])->where(['status'=>1])->limit(5)->hydrate(false);
			$popular__blogs_info = $BlogsModel->find('all',['order' => ['UserBlogs.view_count' => 'desc']])->where(['status'=>1])->limit(5)->hydrate(false);
			
			$this->set('blogs_info',$blogs_info);
			$this->set(compact('popular__blogs_info','latest__blogs_info','you_may_also_like'));
			
		}
		
		//pr($blogs_info); die;
	}
	
	
		
}
