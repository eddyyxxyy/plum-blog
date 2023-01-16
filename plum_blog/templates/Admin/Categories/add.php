<h1>Add category</h1>

<?php
echo $this->Form->create(null);
echo $this->Form->control('name');
?>
<div class="mt-3">
    <?php
    echo $this->Flash->render();
    echo $this->Form->button('Add');
    ?>
</div>
<?php echo $this->Form->end();?>
