<h1>Add post</h1>

<?php
echo $this->Form->create(null, ['type' => 'file']);
echo $this->Form->control('title');
echo $this->Form->control('category_id');
echo $this->Form->control('description', ['type' => 'textarea']);
echo $this->Form->control('body', ['type' => 'textarea', 'label' => false]);
echo $this->Form->control('image', ['type' => 'file']);
?>
<div class="mt-3">
    <?php
    echo $this->Flash->render();
    echo $this->Form->button('Add');
    ?>
</div>
<?php echo $this->Form->end();?>
