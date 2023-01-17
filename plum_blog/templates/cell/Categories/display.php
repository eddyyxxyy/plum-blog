<h2>Categories</h2>
<div class="list-group">
    <?php foreach ($categories as $category) : ?>
    <?= $this->Html->link(
        $category->name,
        ['controller' => $category->slug, 'action' => ''],
        [
            'class' => $this->request->getParam('category') == $category->slug
            ? 'list-group-item list-group-item-action active'
            : 'list-group-item list-group-item-action'
            ]
    ) ?>
    <?php endforeach ?>
</div>
