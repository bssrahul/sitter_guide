<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserProfessionalAccreditationDetailsTable extends Table
{
    public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['name','phone','email','country','city','state','address','zip'],
           'translationTable' => 'I18n'
        ]);
        $this->hasMany('UserServiceDetails', ['dependent' => true]);
    }
}
?>
