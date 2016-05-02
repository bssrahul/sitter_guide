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
             ->notEmpty('property_type', 'PP This field is required.')
             ->notEmpty('outdoor_area', 'ok This field is required.')
             ->notEmpty('outdoor_area_size', 'This field is required.')
             ->notEmpty('outing_allow_multiple', 'This field is required.')
             ->notEmpty('breaks_provided_every', 'This field is required.')
             ->notEmpty('fully_fenced', 'This field is required.')
             ->notEmpty('smokers', 'This field is required.')
             ->notEmpty('birds_in_cages', 'This field is required.')
             ->notEmpty('dogs_in_home', 'This field is required.')
             ->notEmpty('cats_in_home', 'This field is required.')
             ->notEmpty('about_home_desc', 'This field is required.')
             ->notEmpty('spaces_access_desc', 'This field is required.')
             ->notEmpty('home_pets_desc', 'This field is required.');
             /*->add('about_home_desc', [
                 'maxLength' => [
                    'rule' => ['maxLength', 75],
                    'message' => 'Max words 75.'
                ]
              ])
             ->add('spaces_access_desc', [
                 'maxLength' => [
                    'rule' => ['maxLength', 75],
                    'message' => 'Max words 75.'
                ]
              ])
             ->add('home_pets_desc', [
                 'maxLength' => [
                    'rule' => ['maxLength', 75],
                    'message' => 'Max words 75.'
                ]
              ]);*/
              
               return $validator;
    }
	public function validationUpdate($validator)
    {
       $validator
             ->notEmpty('property_type', 'PP This field is required.')
             ->notEmpty('outdoor_area', 'This field is required.')
             ->notEmpty('outdoor_area_size', 'This field is required.')
             ->notEmpty('outing_allow_multiple', 'This field is required.')
             ->notEmpty('breaks_provided_every', 'This field is required.')
             ->notEmpty('fully_fenced', 'This field is required.')
             ->notEmpty('smokers', 'This field is required.')
             ->notEmpty('birds_in_cages', 'This field is required.')
             ->notEmpty('dogs_in_home', 'This field is required.')
             ->notEmpty('cats_in_home', 'This field is required.')
             ->notEmpty('about_home_desc', 'This field is required.')
             ->notEmpty('spaces_access_desc', 'This field is required.')
             ->notEmpty('home_pets_desc', 'This field is required.');
             /*->add('about_home_desc', [
                 'maxLength' => [
                    'rule' => ['maxLength', 75],
                    'message' => 'Max words 75.'
                ]
              ])
             ->add('spaces_access_desc', [
                 'maxLength' => [
                    'rule' => ['maxLength', 75],
                    'message' => 'Max words 75.'
                ]
              ])
             ->add('home_pets_desc', [
                 'maxLength' => [
                    'rule' => ['maxLength', 75],
                    'message' => 'Max words 75.'
                ]
              ]);*/
    }
}
?>