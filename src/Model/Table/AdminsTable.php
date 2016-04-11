<?php 
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AdminsTable extends Table
{
	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['full_name'],
            'translationTable' => 'AdminsI18n'
		]);
    }
    public function validationDefault(Validator $validator)
    {
		$validator
		    ->notEmpty('full_name', 'Full Name field is required.')
			->notEmpty('username', 'User Name field is required.')
            ->notEmpty('email', 'Email Address field is required.')
			->add('email', 'validFormat', [
			   'rule' => 'email',
			   'message' => 'E-mail must be valid'
			   ]);
			
        return $validator;
    }
}
?>