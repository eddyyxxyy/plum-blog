<h1>Add users</h1>

<?php
echo $this->Form->create(null, ['type' => 'file']);
echo $this->Form->control('first_name');
echo $this->Form->control('last_name');
echo $this->Form->control('email', ['label' => 'E-Mail']);
echo $this->Form->control('password', ['type' => 'password']);
echo $this->Form->control('image', ['type' => 'file']);
echo $this->Flash->render();
echo $this->Form->button('Add');
echo $this->Form->end();
?>
