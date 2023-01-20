<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
        Plum Blog
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $this->request->getSession()->read('Auth.User.first_name'); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                            <?= $this->Html->link(
                                'Profile',
                                ['controller' => 'Users', 'action' => 'profile'],
                                ['class' => 'dropdown-item']
                            ); ?>
                        </a>
                        <a class="dropdown-item" href="#">
                            <?= $this->Html->link(
                                'Change Password',
                                ['controller' => 'Users', 'action' => 'password'],
                                ['class' => 'dropdown-item']
                            ); ?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link(
                            'Logout',
                            ['controller' => 'Users', 'action' => 'logout'],
                            ['class' => 'dropdown-item']
                        ); ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
