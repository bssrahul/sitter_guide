<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserBlogsTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['name','phone','email','country','city','state','address','zip'],
          'translationTable' => 'I18n'
		]);
		
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('description', 'Description field is required.')
            ;
        return $validator;
    }
}
?>
