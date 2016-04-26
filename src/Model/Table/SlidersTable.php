<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class SlidersTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['title','description'],
            'translationTable' => 'I18n'
		]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title', 'Title field is required.')
			->notEmpty('description', 'Description field is required.');
			
		 return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		    ->notEmpty('title', 'Title field is required.')
			->notEmpty('description', 'Description field is required.');
			
        return $validator;
    }
}
?>
