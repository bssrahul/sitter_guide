<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PromoCodesTable extends Table
{

	public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['promo_code','discount_rate','description'],
            'translationTable' => 'PromoCodesI18n'
		]);
    }
	
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('promo_code', 'Promo Code field is required.')
			->notEmpty('coupon_type', 'Coupon Type field is required.')
            ->notEmpty('discount_rate', 'Discount Rate field is required.')
			->notEmpty('start_date', 'Start Date field is required.')
			->notEmpty('expire_date', 'Expire Date field is required.')
			->notEmpty('description', 'Short Description field is required.');
			
		 return $validator;
    }
	public function validationUpdate($validator)
    {
        $validator
		    ->notEmpty('promo_code', 'Promo Code field is required.')
			->notEmpty('coupon_type', 'Coupon Type field is required.')
            ->notEmpty('discount_rate', 'Discount Rate field is required.')
			->notEmpty('start_date', 'Start Date field is required.')
			->notEmpty('expire_date', 'Expire Date field is required.')
			->notEmpty('description', 'Short Description field is required.');
			
        return $validator;
    }
}
?>