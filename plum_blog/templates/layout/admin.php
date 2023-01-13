<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->fetch('title') ?></title>

    <?= $this->Html->css([
        'bootstrap.min',
    ]) ?>
</head>

<body>

    <?= $this->element('layout/upper_menu') ?>

    <div class="p-3">
        <div class="row mt-3">
            <div class="col-md-3">
                <?= $this->element('layout/side_menu') ?>
            </div>
            <div class="col-md-9">
                <?= $this->fetch('content') ?>
                <?= $this->element('layout/footer') ?>
            </div>
        </div>
    </div>

    <?= $this->Html->script([
        'jquery-slim.min',
        'popper.min',
        'bootstrap.min',
    ]) ?>
</body>

</html>
