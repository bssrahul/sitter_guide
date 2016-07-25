<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BookingRequestsTable extends Table
{
	public function initialize(array $config)
    { 
       $this->addBehavior('Translate', ['fields' => ['pagename','pagecontent'],
           'translationTable' => 'I18n'
		]);
		
		$this->belongsTo('Users');
		
		$this->hasMany('BookingChats', ['dependent' => true]);
		
		$this->hasOne('Users', [
            'foreignKey' => 'id',
            'bindingKey' => 'user_id'
        ]);
        
       /* $this->belongsTo('Users',
			['className' => 'Users',
			'foreignKey' => 'sitter_id',
            ]);
       */
        
    }
	
}
?>
