<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Department */

$this->title = 'แก้ไข ฝ่าย: ' . $model->department;
$this->params['breadcrumbs'][] = ['label' => 'ตาราง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->department, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="department-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
