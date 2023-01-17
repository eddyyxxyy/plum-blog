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

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                Plum Blog
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link">
                            About us
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?= $this->cell('Categories')->render('menu') ?>

    <div class="container p-5">
        <div class="row">
            <div class="col-md-8">
                <?= $this->fetch('content') ?>
            </div>
            <div class="col-md-4">
                <?= $this->cell('Categories') ?>
            </div>
        </div>
    </div>

    <div class="p-5 bg-dark text-secondary">
        <p class="mb-0">Copyright &copy; <?= date('Y') ?></p>
    </div>

    <?= $this->Html->script([
        'jquery-slim.min',
        'popper.min',
        'bootstrap.min',
    ]) ?>
</body>
</html>
