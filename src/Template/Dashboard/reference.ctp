<?php 
echo $this->Form->create(null, [
    'url' => ['controller' => 'Dashboard', 'action' => 'reference'],
    'type' => 'post',
	 'autocomplete'=>'off',
]);
echo $this->Form->input('email', ['type' => 'email']);
echo $this->Form->submit();
echo $this->Form->end();
echo $message;
?>