<?= $this->element('Layout/head_html') ?>

    <div class="container p-5">
        <div class="row">
            <div class="col-md-8">
                <?= $this->fetch('content') ?>
            </div>
            <div class="col-md-4">
                <?= $this->element('Layout/side_menu') ?>
            </div>
        </div>
    </div>

<?= $this->element('Layout/foot_html') ?>
