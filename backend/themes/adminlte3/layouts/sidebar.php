<?php
use yii\helpers\Html; ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link"> -->
        <!-- <img src="<?= $assetDir ?>/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <!-- <span class="brand-text font-weight-light"><?= Yii::$app->name ?></span> -->
    <!-- </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?= Html::img(
                    'uploads/person/' .
                        Yii::$app->user->identity->person->photo,
                    [
                        'class' => 'rounded-circle',
                        'alt' =>
                            Yii::$app->user->identity->person->firstname .
                            ' ' .
                            Yii::$app->user->identity->person->lastname,
                    ]
                ) ?>
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <p>
                        <?= Yii::$app->user->identity->person->firstname .
                        ' ' .
                        Yii::$app->user->identity->person->lastname . '<br>' 
                        //.Yii::$app->user->identity->person->user->username
                        ?> 
                    </p>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'ปฏิทิน',
                        'url' => ['/meeting/default/index'],
                        'icon' => 'fas fa-calendar text-red',
                    ],
                    [
                        'label' => 'การจองห้องประชุม',
                        'icon' => 'fas fa-calendar-check text-success',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            [
                                'label' => 'ตาราง',
                                'url' => ['/meeting/meeting/index'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                            [
                                'label' => 'เพิ่มข้อมูล',
                                'url' => ['/meeting/meeting/create'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                        ],
                    ],

                    [
                        'label' => 'ห้องประชุม',
                        'icon' => 'fas fa-columns text-success',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            [
                                'label' => 'ตาราง',
                                'url' => ['/meeting/room/index'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                            [
                                'label' => 'เพิ่มข้อมูล',
                                'url' => ['/meeting/room/create'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                        ],
                    ],

                    [
                        'label' => 'อุปกรณ์',
                        'icon' => 'fas fa-laptop text-success',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            [
                                'label' => 'ตาราง',
                                'url' => ['/meeting/equipment/index'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                            [
                                'label' => 'เพิ่มข้อมูล',
                                'url' => ['/meeting/equipment/create'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                        ],
                    ],
                    [
                        'label' => 'ต้นสังกัด',
                        'icon' => 'fa fa-address-card text-success',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            [
                                'label' => 'ตาราง',
                                'url' => ['/meeting/department/index'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                            [
                                'label' => 'เพิ่มข้อมูล',
                                'url' => ['/meeting/department/create'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                        ],
                    ],

                    [
                        'label' => 'ผู้ใช้งาน',
                        'icon' => 'fas fa-user text-success',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            [
                                'label' => 'ตาราง',
                                'url' => ['/personal/person/index'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                            [
                                'label' => 'เพิ่มข้อมูล',
                                'url' => ['/personal/person/create'],
                                'icon' => 'fas fa-angle-double-right text-red',
                            ],
                        ],
                    ],
                    [
                        'label' => 'รายงาน',
                        'icon' => 'fas fa-chart-bar text-success',
                        //'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            [
                                'label' => 'สรุปการใช้ห้อง',
                                'url' => ['/meeting/report/report1'],
                                'icon' => 'fas fa-chart-pie text-red',
                            ],
                            [
                                'label' => 'สรุปรายปี',
                                'url' => ['/meeting/report/report2'],
                                'icon' => 'fas fa-chart-pie text-red',
                            ],
                        ],
                    ],

                    [
                        'label' => 'Gii',
                        'icon' => 'file-code',
                        'url' => ['/gii'],
                        'target' => '_blank',
                    ],

                    //         [
                    //             'label' => 'Starter Pages',
                    //             'icon' => 'tachometer-alt',
                    //             'badge' => '<span class="right badge badge-info">2</span>',
                    //             'items' => [
                    //                 ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                    //                 ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                    //             ]
                    //         ],

                    //         ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    //         ['label' => 'Yii2 PROVIDED', 'header' => true],
                    //         ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    //         ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    //         ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    //         ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    //         ['label' => 'Level1'],
                    //         [
                    //             'label' => 'Level1',
                    //             'items' => [
                    //                 ['label' => 'Level2', 'iconStyle' => 'far'],
                    //                 [
                    //                     'label' => 'Level2',
                    //                     'iconStyle' => 'far',
                    //                     'items' => [
                    //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                         ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //                     ]
                    //                 ],
                    //                 ['label' => 'Level2', 'iconStyle' => 'far']
                    //             ]
                    //         ],
                    //         ['label' => 'Level1'],
                    //         ['label' => 'LABELS', 'header' => true],
                    //         ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    //         ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    //         ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                    //
                ],
            ]); ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>