<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $this->fetch('title') ?></title>

    <?= $this->Html->css([
        'bootstrap.min'
    ]) ?>
</head>
<body>

    <?= $this->fetch('content')?>

    <?= $this->Html->script([
        'popper.min',
        'bootstrap.min'
    ]) ?>
</body>
</html>
