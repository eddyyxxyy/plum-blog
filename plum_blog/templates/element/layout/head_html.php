<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->fetch('title') ?></title>
    <meta name="description" content="<?= $this->fetch('description') ?>">

    <?= $this->Html->css([
        'bootstrap.min',
    ]) ?>
</head>
<body>

    <?= $this->Flash->render() ?>

    <?= $this->element('layout/upper_menu') ?>
