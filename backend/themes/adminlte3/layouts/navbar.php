<?php

use yii\helpers\Html; ?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

 <!-- Left navbar links -->
 <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=\yii\helpers\Url::home()?>" class="nav-link">หน้าหลัก</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a(
                'ปฏิทิน',
                ['/meeting/default/index'],
                ['class' => 'nav-link']
            ) ?>           
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a(
                'สรุปการใช้ห้อง',
                ['/meeting/report/report1'],
                ['class' => 'nav-link']
            ) ?>           
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?= Html::a(
                'สรุปรายปี',
                ['/meeting/report/report2'],
                ['class' => 'nav-link']
            ) ?>           
        </li>
        
</ul>

 <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">        
        <li class="nav-item">
            <?= Html::a(
                '<i class="fas fa-sign-out-alt"></i>',
                ['/site/logout'],
                ['data-method' => 'post', 'class' => 'nav-link']
            ) ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        </ul>
</nav>
<!-- /.navbar -->