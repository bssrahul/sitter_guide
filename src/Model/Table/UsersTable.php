<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['name','phone','email','country','city','state','address','zip'],
           'translationTable' => 'I18n'
		]);
		//$this->hasOne('UserExtendedProfiles', ['dependent' => true]);
		//$this->hasMany('UserAcceptedPets', ['dependent' => true]);
		//$this->hasMany('UserWorkSchedules', ['dependent' => true]);
		//$this->hasMany('UserServices', ['dependent' => true]);
		//$this->hasMany('UserBlogs', ['dependent' => true]);
		$this->hasOne('Users_badge', ['dependent' => true]);
		$this->hasOne('UserSitterHouses', ['dependent' => true]);
		$this->hasOne('UserAboutSitters', ['dependent' => true]);
		$this->hasMany('UserSitterGalleries', ['dependent' => true]);
		$this->hasMany('UserProfessionalAccreditations', ['dependent' => true]);
		$this->hasMany('UserProfessionalAccreditationsDetails', ['dependent' => true]);
		$this->hasMany('UserSitterServices', ['dependent' => true]);
		$this->hasMany('Communication', ['dependent' => true]);
		$this->hasMany('UserSitterServiceDetails', ['dependent' => true]);
		$this->hasMany('UserSitterAvailability', ['dependent' => true]);
		$this->hasMany('UserRatings', ['dependent' => true,
		 'foreignKey' => 'user_to']);
		 $this->belongsTo('BookingRequests', ['dependent' => true,
		 'foreignKey' => 'sitter_id']);

		 $this->hasMany('UserSitterFavourites', ['dependent' => true,
		 'foreignKey' => 'sitter_id']);

		$this->hasMany('UserPetGalleries', ['dependent' => true]);
		$this->hasMany('UserPets',['dependent' => true]);
		$this->hasOne('Communication',['dependent' => true]);
		$this->hasOne('UserCards',['dependent' => true]);
		

    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('first_name', 'First Name field is required.')
			->notEmpty('last_name', 'Last Name field is required.')
			->notEmpty('phone', 'Phone number field is required.')
            ->notEmpty('email', 'Email field is required.')
			
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
			->notEmpty('title', 'Title field is required.')
		    ->notEmpty('first_name', 'First name field is required.')
		 
		    ->notEmpty('country_code', 'Country code field is required.') 
			->notEmpty('create_password', 'Create Password field is required.')
		    ->notEmpty('re_password', 'Repeate Password field is required.')
		    ->notEmpty('country_code', 'Country code field is required.') 
			->notEmpty('birth_date', 'Birth Date field is required.')
		    ->notEmpty('term_condition', 'This field is required.') 
			->notEmpty('zip', 'Zip field is required.')
		    ->notEmpty('password', 'Password field is required.')
		    ->add('email', 'unique', [
						'rule' => 'validateUnique',
						'provider' => 'table',
						'message' => 'Email Id allready exist,Please try another.',
					])
			//->notEmpty('password', 'Password must be 6 character.')
			->add('password', [
			        'minLength' => [
			            'rule' => ['minLength', 6],
			            'last' => true,
			            'message' => 'Password must be 6 character.',
			        ]
			    ])
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
			->add('email', 'validFormat', [
			   'rule' => 'email',
			   'message' => 'E-mail must be valid'
			   ]);
           
        return $validator;
    }
}
?>
