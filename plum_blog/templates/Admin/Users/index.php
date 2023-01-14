<h1>
    Users
    <div class= "float-right">
        <?= $this->Html->link(
            'Add',
            ['action' => 'add'],
            ['class' => 'btn btn-success']
            ) ?>
    </div>
</h1>

<table class="table">
    <thead>
        <tr>
            <th width="40">
                <?= $this->Paginator->sort('id', '#') ?>
            </th>
            <th>
                <?= $this->Paginator->sort( 'Name') ?>
            </th>
            <th width="180">
                <?= $this->Paginator->sort('Modified') ?>
            </th>
            <th width="40"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->id ?></td>
            <td>
                <?= $this->Html->link(
                "$user->first_name $user->last_name",
                ['action' => 'edit', $user->id]
                ) ?>
            </td>
            <td>
                <?= $user->modified->nice() ?>
            </td>
            <td>
                <?= $this->Form->postLink(
                    'Remove',
                    ['action' => 'remove', $user->id],
                    ['class' => 'btn btn-danger btn-sm', 'confirm' => 'Are you sure you want to remove this user?']
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
