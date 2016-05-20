<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BookingRequestsTable extends Table
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
             ->notEmpty('booking_start_date', 'This field is required.')
             ->notEmpty('booking_end_date', 'This field is required.')
             ->notEmpty('message', 'This field is required.')
             ->notEmpty('recieved_photo_during_stay', 'This field is required.');
            
             
              
               return $validator;
    }
	
}
?>