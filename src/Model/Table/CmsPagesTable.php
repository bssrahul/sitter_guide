<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CmsPagesTable extends Table
{
	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['pagename','pagecontent'],
            'translationTable' => 'CmsPagesI18n'
		]);
    }
	public function validationDefault(Validator $validator)
    {
		$validator
		    ->notEmpty('pagename', 'Page Name field is required.')
			->notEmpty('pageurl', 'Page URL field is required.')
            ->notEmpty('pagecontent', 'Email field is required.');
		
		return $validator;
    }
}
?>