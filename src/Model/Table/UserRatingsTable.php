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
		 
		 /* $this->hasMany('UserRatings', [
            'className' => 'Comments',
            'conditions' => ['Users.id' => 'UserRatings.user_from']
            
        ]); */

		
		
    }
}
?>