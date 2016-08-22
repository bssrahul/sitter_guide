<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserReferWalletsTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['amount','status'],
           'translationTable' => 'I18n'
		]);
		
	
		//$this->hasMany('Users');

		 $this->hasOne('Users', [
			 'foreignKey' => 'id',
			 'bindingKey' => 'user_id'
		 ]);
		 
	}
  
}
?>