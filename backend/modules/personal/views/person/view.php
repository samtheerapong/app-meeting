<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Person */

$this->title = $model->firstname. ' ' .$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'ตาราง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="person-view">
<div class="button">
    <p>
        <?= Html::a(
            '<i class="fas fa-cog"></i> แก้ไข',
            ['update', 'user_id' => $model->user_id],
            ['class' => 'btn btn-primary']
        ) ?>
        <?= Html::a(
            '<i class="fas fa-trash"></i> ลบ',
            ['delete', 'user_id' => $model->user_id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
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
                    //'user_id',
                    [
                        'attribute' => 'photo',
                        'format' => [
                            'image',
                            //['width' => 'auto', 'height' => '350'],
                            [
                                'class' => 'img-thumbnail',
                                'height' => '350px',
                                'alt'=> 'Responsive image'
                            ],
                        ],
                        'value' => 'uploads/person/' . $model->photo,
                    ],
                    'user.username',
                    //'user.password_hash',
                    'user.email',
                    'firstname',
                    'lastname',
                    //'photo',
                    'address:ntext',
                    'tel',
                    //'department_id',
                    [
                        'attribute' => 'department_id',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->department->department;
                        },
                    ],
                ],
            ]) ?>
    </div>
</div>
</div>
