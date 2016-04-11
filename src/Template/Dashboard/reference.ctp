<?php 
echo $this->Form->create(null, [
    'url' => ['controller' => 'Dashboard', 'action' => 'reference'],
    'type' => 'post'
]);
echo $this->Form->input('email', ['type' => 'email']);
echo $this->Form->submit();
echo $this->Form->end();
echo $message;
?>