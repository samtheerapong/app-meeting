<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Department */

$this->title = $model->department;
$this->params['breadcrumbs'][] = ['label' => 'ตาราง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="department-view">
    <div class="button">
            <p>
                <?= Html::a(
                    '<i class="fas fa-cog"></i> แก้ไข',
                    ['update', 'id' => $model->id],
                    ['class' => 'btn btn-primary']
                ) ?>
                <?= Html::a(
                    '<i class="fas fa-trash"></i> ลบ',
                    ['delete', 'id' => $model->id],
                    [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' =>
                                'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]
                ) ?>
            </p>
        </div>
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
    </div> <!-- end div card-header-->
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'department',
                ],
            ]) ?>

        </div>
    </div>
</div>
