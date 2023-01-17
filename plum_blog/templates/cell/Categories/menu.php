<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <?php foreach ($categories as $category) : ?>
                <li class="nav-item">
                    <?= $this->Html->link(
                        $category->name,
                        ['controller' => $category->slug, 'action' => ''],
                        [
                            'class' => $this->request->getParam('category') == $category->slug
                            ? 'nav-link active'
                            : 'nav-link'
                            ]
                    ) ?>
                    <?php endforeach ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
