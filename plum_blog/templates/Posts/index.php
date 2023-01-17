<?php foreach ($posts as $post) : ?>
<div class="row">
    <div class="col-md-12">
        <a href="/<?= $post->category->slug ?>/<?= $post->slug ?>">
            <h2 class="mb-3">
                <?= $post->title ?>
            </h2>
        </a>
        <div class="row">
            <div class="col-md-4">
                    <?= $this->Html->image('../files/Posts/image/' . str_replace('\\', '/', $post->photo_dir) . '/' . $post->image, ['alt' => "$post->title", 'class' => "img-fluid"]) ?>
            </div>
            <div class="col-md-8">
                <p>
                    <small class="d-block mb-1"><?= $post->category->name ?> | <?= "{$post->user->first_name}  {$post->user->last_name}" ?></small>
                </p>
                <?= $this->Text->truncate(strip_tags($post->body), 250) ?>
            </div>
        </div>
        <hr>
    </div>
</div>
<?php endforeach ?>
