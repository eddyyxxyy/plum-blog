<h1>Change password</h1>

<?php
echo $this->Form->create(null, ['type' => 'file']);
echo $this->Form->control('password', ['type' => 'password', 'value' => '']);
?>
<div class="mt-3">
    <?php
    echo $this->Flash->render();
    echo $this->Form->button('Add');
    ?>
</div>
<?php echo $this->Form->end();?>
