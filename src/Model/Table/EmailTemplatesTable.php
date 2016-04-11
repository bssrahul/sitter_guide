<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class EmailTemplatesTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['title','subject','email_from','email_name','description'],
            'translationTable' => 'EmailTemplatesI18n'
		]);
    }
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title', 'Title field is required.')
			->notEmpty('subject', 'Subject field is required.')
            ->notEmpty('allowed_vars', 'Short Code field is required.')
			
			->notEmpty('email_from', 'Email From field is required.')
			->notEmpty('email_name', 'Email Name field is required.')
			->notEmpty('description', 'Description field is required.');
			
        return $validator;
    }
}
?>