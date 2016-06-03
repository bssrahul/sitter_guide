<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserPetsTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['pet_name','pet_type','pet_breed','pet_gender','pet_weight','pet_age','pet_description'],
            'translationTable' => 'I18n'
		]);
		$this->hasMany('UserPetGalleries',['dependent' => true]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('pet_name', 'Name field is required.')
			->notEmpty('pet_type', 'Type number field is required.')
            ->notEmpty('pet_breed', 'Breed field is required.')
			
			->notEmpty('pet_gender', 'Gender field is required.')
			->notEmpty('pet_weight', 'Weight field is required.')
			->notEmpty('pet_description', 'Description field is required.');
			
        return $validator;
    }
}
?>
