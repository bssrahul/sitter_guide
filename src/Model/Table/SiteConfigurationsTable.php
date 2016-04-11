<?php 
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SiteConfigurationsTable extends Table
{
	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['site_name','site_footer','meta_title','meta_keyword','meta_description'],
            'translationTable' => 'SiteConfigurationsI18n'
		]);
    }
	
    public function validationDefault(Validator $validator)
    {
		$validator
		    ->notEmpty('site_name', 'Site Name field is required.')
			->notEmpty('site_contact_email', 'Site Contact Email field is required.')
			->notEmpty('site_footer', 'Footer Content field is required.')
			->notEmpty('meta_title', 'Meta Title field is required.')
			->notEmpty('meta_keyword', 'Meta keyword field is required.')
			->notEmpty('meta_description', 'Meta Description field is required.')
			->notEmpty('facebook_link', 'Facebook URL field is required.')
			->notEmpty('twitter_link', 'Twitter URL field is required.')
			->notEmpty('google_link', 'Google+ URL field is required.')
			->notEmpty('instagram_link', 'Instagram URL field is required.')
			->notEmpty('youtube_link', 'Youtube URL field is required.')
			->add('site_contact_email', 'validFormat', [
			   'rule' => 'email',
			   'message' => 'E-mail must be valid'
			   ]);
         
        return $validator;
    }
}
?>