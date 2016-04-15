<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['name','phone','email','country','city','state','address','zip'],
            'translationTable' => 'UsersI18n'
		]);
		//$this->hasOne('UserExtendedProfiles', ['dependent' => true]);
		//$this->hasMany('UserAcceptedPets', ['dependent' => true]);
		//$this->hasMany('UserWorkSchedules', ['dependent' => true]);
		//$this->hasMany('UserServices', ['dependent' => true]);
		//$this->hasMany('UserBlogs', ['dependent' => true]);
		$this->hasOne('UserSitterHouses', ['dependent' => true]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('first_name', 'First Name field is required.')
			->notEmpty('last_name', 'Last Name field is required.')
			->notEmpty('phone', 'Phone number field is required.')
            //->notEmpty('email', 'Email field is required.')
			
			//->notEmpty('country', 'Country field is required.')
			//->notEmpty('city', 'City field is required.')
			//->notEmpty('state', 'State field is required.')
			//->notEmpty('address', 'Address field is required.')
			//->notEmpty('zip', 'Zip field is required.')
			->add('email', 'validFormat', [
			   'rule' => 'email',
			   'message' => 'E-mail must be valid'
			   ]);
        return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		    ->notEmpty('first_name', 'First name field is required.')
		    ->notEmpty('last_name', 'Last name field is required.')
		    ->notEmpty('country_code', 'Country code field is required.')
			->notEmpty('phone', 'Phone number field is required.')
			->add('phone', [
			        'minLength' => [
			            'rule' => ['minLength', 10],
			            'last' => true,
			            'message' => 'Phone no. 10 in digits',
			        ],
			        'maxLength' => [
			            'rule' => ['maxLength', 10],
			            'message' => 'Phone no. 10 in digits.'
			        ]
			    ])
            ->notEmpty('email', 'Email field is required.')
			
			->notEmpty('country', 'Country field is required.')
			->notEmpty('city', 'City field is required.')
			->notEmpty('state', 'State field is required.')
			->notEmpty('address', 'Address1 field is required.')
			->notEmpty('address2', 'Address2 field is required.')
			->notEmpty('zip', 'Zip field is required.');
			
		    /*->add('email', 'validFormat', [
			   'rule' => 'email',
			   'message' => 'E-mail must be valid'
			   ]);*/
           
        return $validator;
    }
}
?>