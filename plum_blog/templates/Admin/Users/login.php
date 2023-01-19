<div class="card">
    <div class="card-body">
        <?php
        echo $this->Form->create(null);
        echo $this->Form->control('email');
        echo $this->Form->control('password', ['type' => 'password']);
        echo $this->Form->button('Submit');
        echo $this->Form->end();
        ?>
    </div>
</div>
