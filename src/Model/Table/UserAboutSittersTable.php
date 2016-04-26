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
             ->notEmpty('accepted_pet_size', 'This field is required.')
             ->notEmpty('preferred_age', 'This field is required.')
             ->notEmpty('sitting_experience', 'This field is required.')
             ->notEmpty('mixed_familes', 'This field is required.')
             ->requirePresence('un_neutered_pets') ->notEmpty('un_neutered_pets', 'This field is required.')
             ->requirePresence('un_spayed_females') ->notEmpty('un_spayed_females', 'This field is required.')
             ->requirePresence('females_on_heat') ->notEmpty('females_on_heat', 'This field is required.')
             ->requirePresence('un_trained_pets') ->notEmpty('un_trained_pets', 'This field is required.')
             ->requirePresence('last_minute_booking') ->notEmpty('last_minute_booking', 'This field is required.')
             ->requirePresence('longer_than_week') ->notEmpty('longer_than_week', 'This field is required.');
         return $validator;
    }

}
?>