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
        //echo "<pre>";print_r($validator);die;
        $validator
             ->notEmpty('property_type', 'This field is required.')
             ->notEmpty('outdoor_area', 'This field is required.')
             ->notEmpty('outdoor_area_size', 'This field is required.')
             ->notEmpty('outing_allow_multiple', 'This field is required.')
             ->notEmpty('cancellation_policy', 'This field is required.')
             ->notEmpty('breaks_provided_every', 'This field is required.')
             ->notEmpty('birds_in_cages', 'This field is required.')
             ->notEmpty('dogs_in_home', 'This field is required.')
             ->notEmpty('cats_in_home', 'This field is required.')
             ->requirePresence('fully_fenced') ->notEmpty('fully_fenced', 'This field is required.')
             ->requirePresence('fully_fenced') ->notEmpty('smokers', 'This field is required.');
             return $validator;
    }

}
?>