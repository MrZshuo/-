<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu 菜单', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Banner图管理',
                        'icon' => 'share', 
                        'url' => '#',
                        'items' => [
                            ['label' => '查看首页广告图','icon' => 'circle-o','url' => ['/banner/index']],
                            ['label' => '上传首页广告图','icon' => 'circle-o','url' => ['/banner/create']],
                        ]

                    ],
                    [
                        'label' => '账号管理',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => '管理员',
                                'icon' => 'share',
                                // 'url' => ['/admin-user/index'],
                                'items' => [
                                    ['label' => '账号列表', 'icon' => 'circle-o', 'url' => ['/admin-user/index'],],
                                    ['label' => '添加账号', 'icon' => 'circle-o', 'url' => ['/admin-user/create'],],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'label' => '会员',
                                'icon' => 'share',
                                'url' => '#'

                            ],
                        ],
                    ],
                        [
                            'label' => '权限管理',
                            'icon' => 'share',
                            'url' => '#',
                            'items' => [
                                ['label' => '路由列表', 'icon' => 'circle-o','url'=>['/admin/route']],
                                ['label' => '权限列表', 'icon' => 'circle-o','url'=>['/admin/permission']],
                                ['label' => '角色列表', 'icon' => 'circle-o','url'=>['/admin/role']],
                                ['label' => '规则列表', 'icon' => 'circle-o','url'=>['/admin/rule']],
                                ['label' => '分配', 'icon' => 'circle-o','url'=>['/admin/assignment']],
                                ['label' => '菜单列表', 'icon' => 'circle-o','url'=>['/admin/menu']],

                            ],
                        ],
                ],
            ]
        ) ?>

    </section>

</aside>
