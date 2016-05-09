<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserAboutSittersTable extends Table
{
    public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['sitting_experience','mixed_familes'],
            'translationTable' => 'I18n'
        ]);
    }
    public function validationDefault(Validator $validator)
    {
        $validator 
             ->notEmpty('your_self', 'This field is required.')
             ->notEmpty('client_choose_desc', 'This field is required.')
             ->notEmpty('sh_pet', 'This field is required.')
             ->notEmpty('sh_pet_sizes', 'This field is required.')
             ->notEmpty('sh_guest_age', 'This field is required.')
             ->notEmpty('sh_un_neutered_pets', 'This field is required.')
             ->notEmpty('sh_females_on_heat', 'This field is required.')
             ->notEmpty('sh_un_spayed_females', 'This field is required.')
             ->notEmpty('sh_un_toilet_trained', 'This field is required.')
             ->notEmpty('mixed_familes', 'This field is required.')
             ->notEmpty('gh_pet', 'This field is required.')
             ->notEmpty('gh_pet_sizes', 'This field is required.')
             ->notEmpty('gh_guest_age', 'This field is required.')
             ->notEmpty('gh_un_neutered_pets', 'This field is required.')
             ->notEmpty('gh_females_on_heat', 'This field is required.')
             ->notEmpty('gh_un_spayed_females', 'This field is required.')
             ->notEmpty('gh_un_toilet_trained', 'This field is required.');
             
             
         return $validator;
    }

}
?>