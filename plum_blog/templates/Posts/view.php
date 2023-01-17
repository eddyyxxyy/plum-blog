<h1>
    <?= $post->title ?>
</h1>

<small class="d-block mb-3">
    <?= $post->category->name ?>
    <?= "| {$post->user->first_name} {$post->user->last_name}" ?>
</small>

<?= $post->body ?>
