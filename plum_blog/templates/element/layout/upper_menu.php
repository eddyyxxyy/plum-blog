<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">
            Plum Blog
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?= $this->Html->link(
                        'About us',
                        ['controller' => 'about-us', 'action' => ''],
                        ['class' => 'nav-link']
                    ) ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?= $this->cell('Categories')->render('menu') ?>
