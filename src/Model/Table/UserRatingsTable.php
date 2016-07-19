<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserRatingsTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['name','phone','email','country','city','state','address','zip'],
           'translationTable' => 'I18n'
		]);
		
	
		//$this->hasMany('Users');

		 $this->hasOne('Users', [
			 'foreignKey' => 'id',
			 'bindingKey' => 'user_from'
		 ]);
		 
	}
    
    public function validationUpdate($validator)
    {
        $validator
			->notEmpty('comment', 'Your feedback is required.');
		
		return $validator;
    }
}
?>
