<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FaqsTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['title','category_id','description','faq_type'],
            'translationTable' => 'I18n'
		]);
		 $this->hasOne('Categories', [
           
            'foreignKey' => 'id',
            'bindingKey' => 'category_id',
           
        ]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
			->notEmpty('faq_type','Faq Type field is required.')
			->notEmpty('question', 'Title Type field is required.')
			->notEmpty('answer', 'Title Type field is required.')
           
			->notEmpty('category_id', 'Category field is required.');
			
			
		
			
		 return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		    ->notEmpty('faq_type','Faq Type field is required.')
			->notEmpty('question', 'TItle Type field is required.')
			->notEmpty('answer', 'TItle Type field is required.')
			->notEmpty('category', 'Category field is required.');
			
			
			
        return $validator;
    }
}
?>
