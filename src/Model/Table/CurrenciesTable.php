<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CurrenciesTable extends Table
{


    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('currency_name', 'Currency Name field is required.')
			->notEmpty('locale', 'Locale field is required.')
            ->notEmpty('currency', 'Currency field is required.')
			->notEmpty('price', 'Price field is required.');
			
		 return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		    ->notEmpty('currency_name', 'Currency Name field is required.')
			->notEmpty('locale', 'Locale field is required.')
            ->notEmpty('currency', 'Currency field is required.')
			->notEmpty('price', 'Price field is required.');
			
        return $validator;
    }
}
?>