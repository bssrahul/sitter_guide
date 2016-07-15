<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BookingChatsTable extends Table
{
	public function initialize(array $config)
    { 
       $this->addBehavior('Translate', ['fields' => ['pagename','pagecontent'],
           'translationTable' => 'I18n'
		]);
		
		$this->belongsTo('Users');
		
    }
	
}
?>
