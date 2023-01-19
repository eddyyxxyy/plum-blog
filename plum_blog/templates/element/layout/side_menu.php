<?= $this->cell('Categories') ?>

<h2 class="mt-4">Newsletter</h2>
<?php
echo $this->Form->create(null, ['url' => ['controller' => 'Newsletters', 'action' => 'add']]);
echo $this->Form->control('email', ['label' => 'E-mail']);
echo $this->Form->button('Submit');
echo $this->Form->end();
?>
