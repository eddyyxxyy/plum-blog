<div class="list-group">
    <?= $this->Html->link(
        'Home',
        ['controller' => 'Panel', 'action' => 'index'],
        [
            'class' => $this->request->getParam('controller') == 'Panel'
            ? 'list-group-item list-group-item-action active'
            : 'list-group-item list-group-item-action'
            ]
    ) ?>
    <?= $this->Html->link(
        'User',
        ['controller' => 'Users', 'action' => 'index'],
        [
            'class' => $this->request->getParam('controller') == 'Users'
            ? 'list-group-item list-group-item-action active'
            : 'list-group-item list-group-item-action'
            ]
    ) ?>
    <?= $this->Html->link(
        'Categories',
        ['controller' => 'Categories', 'action' => 'index'],
        [
            'class' => $this->request->getParam('controller') == 'Categories'
            ? 'list-group-item list-group-item-action active'
            : 'list-group-item list-group-item-action'
            ]
    ) ?>
    <?= $this->Html->link(
        'Posts',
        ['controller' => 'Posts', 'action' => 'index'],
        [
            'class' => $this->request->getParam('controller') == 'Posts'
            ? 'list-group-item list-group-item-action active'
            : 'list-group-item list-group-item-action'
            ]
    ) ?>
    <?= $this->Html->link(
        'Newsletters',
        ['controller' => 'Newsletters', 'action' => 'index'],
        [
            'class' => $this->request->getParam('controller') == 'Newsletters'
            ? 'list-group-item list-group-item-action active'
            : 'list-group-item list-group-item-action'
            ]
    ) ?>
</div>
