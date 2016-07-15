<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ReviewTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['comment'],
           'translationTable' => 'I18n'
		]);
		
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('comment', 'Coment field is required.')
			->notEmpty('rating', 'Rating field is required.')
			
        return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
			 ->notEmpty('comment', 'Coment field is required.')
			->notEmpty('rating', 'Rating field is required.')
        return $validator;
    }
}
?>
