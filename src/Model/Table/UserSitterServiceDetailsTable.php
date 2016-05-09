<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserSitterServiceDetailsTable extends Table
{

    /*public function initialize(array $config)
    { 
        $this->addBehavior('Translate', ['fields' => ['name','phone','email','country','city','state','address','zip'],
            'translationTable' => 'UsersI18n'
        ]);
        $this->hasMany('UserServiceDetails', ['dependent' => true]);
    }*/
}
?>