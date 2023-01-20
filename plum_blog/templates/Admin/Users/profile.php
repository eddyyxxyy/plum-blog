<h1>Profile</h1>

<?php
echo $this->Form->create(null, ['type' => 'file']);
echo $this->Form->control('first_name');
echo $this->Form->control('last_name');
echo $this->Form->control('email', ['label' => 'E-Mail', 'disabled' => true]);
echo $this->Form->control('image', ['type' => 'file']);
?>
<div class="mt-3">
    <?php
    echo $this->Flash->render();
    echo $this->Form->button('Change profile info');
    ?>
</div>
<?php echo $this->Form->end();?>
