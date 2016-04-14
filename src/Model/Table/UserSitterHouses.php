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
             ->notEmpty('property_type', 'Property type field is required.')
             ->notEmpty('outdoor_area', 'This field is required.')
             ->notEmpty('outdoor_area_size', 'Outdoor area size field is required.');
              
               return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		     ->notEmpty('property_type', 'Property ok type field is required.')
             ->notEmpty('outdoor_area', 'This fieldok  is required.')
             ->notEmpty('outdoor_area_size', 'Outdoor  ok area size field is required.');
		    //->notEmpty('last_name', 'Last name field is required.')
		   // ->notEmpty('country_code', 'Country code field is required.')
			//->notEmpty('phone', 'Phone number field is required.')
		return $validator;
    }
}
?>