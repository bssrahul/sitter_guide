<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PartnersTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['title','short_description','description'],
           'translationTable' => 'I18n'
		]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
			->notEmpty('description','Description field is required.')
			 ->notEmpty('image', 'Image field is required.')->add('image', 'file', [
				'rule' => ['mimeType', ['image/jpeg', 'image/png']],
				'on' => function ($context) {
					return !empty($context['data']['show_profile_picture']);
				}
			])
			->notEmpty('title', 'Title field is required.')
			->notEmpty('short_description', 'Short Description field is required.');
		return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
			 ->notEmpty('title', 'Title field is required.')
			 ->notEmpty('description','Description field is required.')
			 ->notEmpty('short_description', 'Short Description field is required.');
		return $validator;
    }
}
?>
