<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TransactionsTable extends Table
{

	public function initialize(array $config)
    { 
		
		
		$this->hasOne('BookingRequests', [
			 'foreignKey' => 'id',
			 'bindingKey' => 'booking_id'
		 ]);
		 
		 $this->hasOne('Users', [
			 'foreignKey' => 'id',
			 'bindingKey' => 'user_id'
		 ]);
		 $this->hasMany('FavClients', [
			 'foreignKey' => 'sitter_id',
			 'bindingKey' => 'user_id'
		 ]);
		
	}
}
?>
