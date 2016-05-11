<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriesTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['title','slug','description'],
           'translationTable' => 'I18n'
		]);
		$this->hasMany('faqs', ['dependent' => true]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title', 'Title field is required.')
			->notEmpty('slug', 'Slug field is required.')
            ->notEmpty('description', 'Description field is required.');
			
		 return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		    ->notEmpty('title', 'Title field is required.')
			->notEmpty('slug', 'Slug field is required.')
            ->notEmpty('description', 'Description field is required.');
			
        return $validator;
    }
}
?>
