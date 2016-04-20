<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class StaticStringsTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['value'],
            'translationTable' => 'I18n'
		]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            /*->notEmpty('page_name', 'Page name field is required.')*/
			->notEmpty('constant_slug', 'Slug field is required.')
            ->notEmpty('value', 'String field is required.');
			
		 return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		    /*->notEmpty('page_name', 'Page name field is required.')*/
			->notEmpty('constant_slug', 'Slug field is required.')
            ->notEmpty('value', 'String field is required.');
			
        return $validator;
    }
}
?>
