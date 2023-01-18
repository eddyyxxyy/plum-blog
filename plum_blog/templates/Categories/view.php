<?php foreach ($posts as $post) : ?>
    <?= $this->element('Posts/post', ['post' => $post])?>
<?php endforeach ?>

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
