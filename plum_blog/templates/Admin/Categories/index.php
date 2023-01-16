<h1>
    Categories
    <div class= "float-right">
        <?= $this->Html->link(
            'Add',
            ['action' => 'add'],
            ['class' => 'btn btn-success']
            ) ?>
    </div>
</h1>

<hr>

<?= $this->Form->create(null, ['type' => 'get']) ?>
<div class="row">
    <div class="col-md-3">
        <?= $this->Form->control('find', ['label' => false, 'placeholder' => $this->request->getQuery('find')]) ?>
    </div>
    <div class="col-md-3">
        <?= $this->Form->button('Find') ?>
    </div>
</div>
<?= $this->Form->end() ?>

<table class="table">
    <thead>
        <tr>
            <th width="40">
                <?= $this->Paginator->sort('id', '#') ?>
            </th>
            <th>
                <?= $this->Paginator->sort( 'name', 'Name') ?>
            </th>
            <th width="180">
                <?= $this->Paginator->sort('modified', 'Modified') ?>
            </th>
            <th width="40"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?= $category->id ?></td>
            <td>
                <?= $this->Html->link(
                "$category->name",
                ['action' => 'edit', $category->id]
                ) ?>
            </td>
            <td>
                <?= $category->modified->nice() ?>
            </td>
            <td>
                <?= $this->Form->postLink(
                    'Remove',
                    ['action' => 'remove', $category->id],
                    ['class' => 'btn btn-danger btn-sm', 'confirm' => 'Are you sure you want to remove this category?']
                ) ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php
    echo $this->Paginator->first('<< First');
    echo $this->Paginator->prev('< Previous');
    echo $this->Paginator->numbers();
    echo $this->Paginator->next('Next >');
    echo $this->Paginator->last('Last >>');
    ?>
  </ul>
</nav>
