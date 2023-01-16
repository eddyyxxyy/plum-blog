<h1>Edit user <?= "$user->first_name $user->last_name" ?></h1>

<?php
echo $this->Form->create($user, ['type' => 'file']);
echo $this->Form->control('first_name');
echo $this->Form->control('last_name');
echo $this->Form->control('email', ['label' => 'E-Mail']);
echo $this->Form->control('password', ['type' => 'password']);
echo $this->Form->control('image', ['type' => 'file']);
?>
<div class="mt-3">
    <?php
    echo $this->Flash->render();
    echo $this->Form->button('Add');
    ?>
</div>
<?php echo $this->Form->end();?>
