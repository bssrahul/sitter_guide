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
			//pr($this->request->data);die;
			$Contactdata=$ContactModel->patchEntity($Contactdata,$this->request->data);
			if($ContactModel->save($Contactdata))
			{
				$replace = array('{fname}','{phone}','{message}');
				$with = array($name,$phone, $message);
				$this->send_email('',$replace,$with,'contact_us_admin',$AdminEmail,'');
				$replace = array('{fname}','{phone}','{message}');
				$with = array($name,$phone, $message);
				$this->send_email('',$replace,$with,'contact_us',$email,'');		
				echo 'Success:'.$this->stringTranslate(base64_encode("Email has been sent to your email address"));
				
						
			}
			
			
		}
		
		
	}
}
