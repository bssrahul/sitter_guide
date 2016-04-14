<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserSitterHousesTable extends Table
{
   /* public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['name','phone','email','country','city','state','address','zip'],
            'translationTable' => 'I18n'
        ]);
    }*/
    public function validationDefault(Validator $validator)
    {
        $validator
             ->notEmpty('property_type', 'This field is required.')
             ->notEmpty('outdoor_area', 'This field is required.')
             ->notEmpty('outdoor_area_size', 'This field is required.')
             ->notEmpty('outing_allow_multiple', 'This field is required.')
             ->notEmpty('cancellation_policy', 'This field is required.')
             ->notEmpty('breaks_provided_every', 'This field is required.')
             ->notEmpty('fully_fenced', 'This field is required.')
             ->notEmpty('smokers', 'This field is required.');
              
               return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		    ->notEmpty('property_type', 'Property type field is required.');
		    //->notEmpty('last_name', 'Last name field is required.')
		   // ->notEmpty('country_code', 'Country code field is required.')
			//->notEmpty('phone', 'Phone number field is required.')
		return $validator;
    }
}
?>