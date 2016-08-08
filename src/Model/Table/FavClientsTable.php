<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class FavClientsTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['title','category','description'],
            'translationTable' => 'I18n'
		]);
		
		 $this->hasOne('Users', [
           
            'foreignKey' => 'id',
            'bindingKey' => 'sitter_id',
           
        ]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('image', 'Image field is required.')->add('image', 'file', [
				'rule' => ['mimeType', ['image/jpeg', 'image/png']],
				'on' => function ($context) {
					return !empty($context['data']['show_profile_picture']);
				}
			])
			->notEmpty('title', 'Title Type field is required.')
            ->notEmpty('description', 'Description field is required.')
			->notEmpty('category', 'Category field is required.');
			
			
		
			
		 return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		   
			->notEmpty('title', 'TItle Type field is required.')
            ->notEmpty('description', 'Description field is required.')
			->notEmpty('category', 'Category field is required.');
			
			
			
        return $validator;
    }
}
?>
