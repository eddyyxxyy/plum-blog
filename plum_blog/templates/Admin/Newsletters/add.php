<h1>Add e-mail</h1>

<?php
echo $this->Form->create(null);
echo $this->Form->control('email');
?>
<div class="mt-3">
    <?php
    echo $this->Flash->render();
    echo $this->Form->button('Add');
    ?>
</div>
<?php echo $this->Form->end();?>
